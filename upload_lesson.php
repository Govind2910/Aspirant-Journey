<?php
include('config.php');
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';

    // Check if a file was uploaded
    if(isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_destination = 'uploads/' . $file_name; // Specify the folder where you want to store the uploaded file
        move_uploaded_file($file_tmp, $file_destination); // Move the uploaded file to the specified folder
        $file_path = $file_destination; // Set the file path to store in the database
    } else {
        $file_path = ''; // If no file was uploaded, set the file path to empty
    }

    if ($title !== '' && $description !== '') { // Check if title and description are not empty
        $sql = "INSERT INTO lessons (title, description, file_path) VALUES ('$title', '$description', '$file_path')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Lesson uploaded successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Title and description are required.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Lesson</title>
</head>
<body>
    <h1>Upload Lesson</h1>
    <form method="post" enctype="multipart/form-data">
        Title: <input type="text" name="title" required><br>
        Description: <textarea name="description"></textarea><br>
        File: <input type="file" name="file"><br>
        <input type="submit" value="Upload">
    </form>
</body>
</html>
