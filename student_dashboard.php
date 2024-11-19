<?php
session_start();
if ($_SESSION['role'] !== 'student') {
    header("Location: login.php");
    exit();
}

// Assume $courses is an array containing course names and IDs fetched from the database
$courses = array(
    1 => "Social Studies",
    2 => "General Science",
    3 => "Current Affairs & IR"
);

// You can fetch playlists or categories for videos from the database as well
$playlists = array(
    "Social Studies" => array(
        "Political Science",
        "History",
        "Art & Culture",
        "Geography"

    ),
    "General Science" => array(
        "Physics",
        "Biology",
        "Chemistry"
    ),
    "Current Affairs & IR" => array(
        
        "National and international events", 
        "Government policies",
         "Socio-economic issues", 
         "Scientific advancements"

    )
);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        h1 {
            margin-top: 0;
        }
        h2 {
            margin-bottom: 10px;
        }
        .courses {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .course {
            width: 30%;
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .course h3 {
            margin-top: 0;
        }
        .playlist {
            margin-left: 20px;
        }
        .playlist ul {
            list-style: none;
            padding: 0;
        }
        .playlist li {
            margin-bottom: 5px;
        }
        a {
            text-decoration: none;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Welcome, Student</h1>
            <p><a href="logout.php">Logout</a></p>
        </div>
        <h2>Video Playlists</h2>
        <div class="courses">
            <?php foreach ($courses as $courseId => $courseName): ?>
                <div class="course">
                    <h3><?php echo $courseName; ?></h3>
                    <div class="playlist">
                        <ul>
                            <?php foreach ($playlists[$courseName] as $playlist): ?>
                                <li><a href="#"><?php echo $playlist; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <hr>
        <h2>Quick Links</h2>
        <ul>
            <li><a href="student_lessons.php">View Lessons</a></li>
            <li><a href="student_quizzes.php">Take Quizzes</a></li>
        </ul>
    </div>
</body>
</html>
