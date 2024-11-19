<?php
include('config.php');
session_start();
if ($_SESSION['role'] !== 'student') {
    header("Location: login.php");
    exit();
}

$quiz_id = $_GET['id'];

// Fetch quiz question
$sql = "SELECT * FROM exercises WHERE id = '$quiz_id'";
$result = $conn->query($sql);
$quiz = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selected_option = $_POST['selected_option'];
    $is_correct = $selected_option == $quiz['correct_option'];
    
    // Store result in a variable or database as needed
    $result_message = $is_correct ? "Correct!" : "Wrong!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Take Quiz</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        form {
            margin-top: 20px;
        }
        .options {
            margin-bottom: 20px;
        }
        .options label {
            display: block;
            margin-bottom: 10px;
        }
        .options input[type="radio"] {
            margin-right: 10px;
        }
        .result {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo $quiz['question']; ?></h1>
        <form method="post">
            <div class="options">
                <?php
                $options = json_decode($quiz['options']);
                foreach ($options as $index => $option) {
                    echo '<label><input type="radio" name="selected_option" value="'.$index.'"> '.$option.'</label>';
                }
                ?>
            </div>
            <input type="submit" value="Submit">
        </form>
        <?php if (isset($result_message)) { ?>
            <div class="result"><?php echo $result_message; ?></div>
        <?php } ?>
    </div>
</body>
</html>
