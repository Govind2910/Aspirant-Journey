<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];
    $message = $_POST['message'];

    $sql = "INSERT INTO enrollments (name, email, phone, course, message) VALUES ('$name', '$email', '$phone', '$course', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Enrollment successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
