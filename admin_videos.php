<?php
include('config.php');
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Fetch videos
$sql = "SELECT * FROM lessons";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Videos - Aspirant Journey</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
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
            color: #333;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
            border-bottom: 1px solid #eee;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        li:last-child {
            border-bottom: none;
        }
        .btn {
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Manage Videos</h1>
        <a href="upload_video.php" class="btn">Upload Video</a>
        <ul>
            <?php while($row = $result->fetch_assoc()): ?>
                <li>
                    <span><?php echo $row['title']; ?></span>
                    <div>
                        <a href="edit_video.php?id=<?php echo $row['id']; ?>" class="btn">Edit</a>
                        <a href="view_video.php?id=<?php echo $row['id']; ?>" class="btn">View</a>
                        <a href="delete_video.php?id=<?php echo $row['id']; ?>" class="btn">Delete</a>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
</body>
</html>
