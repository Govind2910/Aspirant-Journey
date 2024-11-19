<?php
include('config.php');
session_start();
if ($_SESSION['role'] !== 'student') {
    header("Location: login.php");
    exit();
}

// Fetch lessons
$sql = "SELECT id, title, subject FROM lessons";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lessons - Aspirant Journey</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .lesson-list {
            list-style-type: none;
            padding: 0;
        }

        .lesson-item {
            background-color: #fff;
            margin-bottom: 15px;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .lesson-item h3 {
            margin: 0;
            color: #333;
        }

        .lesson-item p {
            margin: 5px 0;
            color: #777;
        }

        .lesson-item a {
            color: #4CAF50;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 4px;
            background-color: #f2f2f2;
            transition: background-color 0.3s;
        }

        .lesson-item a:hover {
            background-color: #ddd;
        }

        .actions {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lessons</h1>
        <ul class="lesson-list">
            <?php while($row = $result->fetch_assoc()): ?>
                <li class="lesson-item">
                    <div>
                        <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                        <p>Subject: <?php echo isset($row['subject']) ? htmlspecialchars($row['subject']) : 'N/A'; ?></p>
                    </div>
                    <div class="actions">
                        <a href="view_video.php?id=<?php echo $row['id']; ?>">View</a>
                        <a href="download_lesson.php?id=<?php echo $row['id']; ?>">Download</a>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
</body>
</html>
