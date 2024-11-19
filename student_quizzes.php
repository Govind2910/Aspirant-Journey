<?php
include('config.php');
session_start();
if ($_SESSION['role'] !== 'student') {
    header("Location: login.php");
    exit();
}

// Fetch exercises
$sql = "SELECT * FROM exercises";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Quizzes</title>
</head>
<body>
    <h1>Quizzes</h1>
    <ul>
        <?php while($row = $result->fetch_assoc()): ?>
            <li>
                <?php echo $row['question']; ?>
                <a href="take_quiz.php?id=<?php echo $row['id']; ?>">Take Quiz</a>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
