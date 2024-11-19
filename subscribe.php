<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: index.html?message=Invalid email format");
        exit;
    }

    // Prepare an SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO newsletter_subscriptions (email) VALUES (?)");
    $stmt->bind_param("s", $email);

    // Execute the statement and check for errors
    if ($stmt->execute()) {
        header("Location: index.html?message=Subscription successful");
    } else {
        header("Location: index.html?message=Error: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
}
?>

