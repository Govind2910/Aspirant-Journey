<?php
include('config.php');
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Fetch exercises
$sql = "SELECT * FROM exercises";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Exercises</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f5f5f5;
        }
        li:hover {
            background-color: #e0e0e0;
        }
        a {
            text-decoration: none;
            color: #007bff;
            margin-left: 10px;
        }
        .add-link {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
        .add-link a {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Manage Exercises</h1>
        <a href="add_exercise.php" class="add-link">Add Exercise</a>
        <ul>
            <?php while($row = $result->fetch_assoc()): ?>
                <li>
                    <?php echo $row['question']; ?>
                    <a href="edit_exercise.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="delete_exercise.php?id=<?php echo $row['id']; ?>">Delete</a>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
</body>
</html>
