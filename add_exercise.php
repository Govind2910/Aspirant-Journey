<?php
include('config.php');
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES['csv_file'])) {
        $csv_file = $_FILES['csv_file']['tmp_name'];
        
        // Validate CSV file
        if ($_FILES['csv_file']['error'] !== UPLOAD_ERR_OK) {
            $errors[] = "Error uploading file.";
        } else {
            // Read CSV file
            $handle = fopen($csv_file, "r");
            if ($handle !== false) {
                while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                    $lesson_id = $data[0];
                    $question = $data[1];
                    $options = explode(',', $data[2]);
                    $correct_option = $data[3];

                    // Validate inputs
                    if (empty($lesson_id) || empty($question) || empty($options) || empty($correct_option)) {
                        $errors[] = "All fields are required for each question.";
                    } elseif ($correct_option < 0 || $correct_option >= count($options)) {
                        $errors[] = "Invalid correct option index for question: $question";
                    } else {
                        // Prepare and execute SQL statement
                        $options_json = json_encode($options);
                        $sql = "INSERT INTO exercises (lesson_id, question, options, correct_option) VALUES ('$lesson_id', '$question', '$options_json', '$correct_option')";
                        if ($conn->query($sql) !== TRUE) {
                            $errors[] = "Error adding question: $question. " . $conn->error;
                        }
                    }
                }
                fclose($handle);
            } else {
                $errors[] = "Error opening CSV file.";
            }
        }
    } else {
        $errors[] = "Please upload a CSV file.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Exercises from CSV</title>
</head>
<body>
    <h1>Add Exercises from CSV</h1>
    <?php if (!empty($errors)) { ?>
        <div style="color: red;">
            <?php foreach ($errors as $error) { ?>
                <p><?php echo $error; ?></p>
            <?php } ?>
        </div>
    <?php } ?>
    <form method="post" enctype="multipart/form-data">
        <label for="csv_file">Upload CSV File:</label>
        <input type="file" id="csv_file" name="csv_file" accept=".csv" required><br><br>
        <input type="submit" value="Upload">
    </form>
</body>
</html>
