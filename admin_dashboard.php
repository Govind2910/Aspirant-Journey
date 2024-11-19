<?php
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }
        header {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
        }
        nav {
            background-color: #444;
            overflow: hidden;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
        }
        nav ul li {
            margin: 0 10px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            padding: 14px 20px;
            display: block;
        }
        nav ul li a:hover {
            background-color: #555;
        }
        main {
            flex: 1;
            padding: 20px;
            max-width: 1200px;
            margin: auto;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .profile-pic {
            border-radius: 50%;
            width: 400px;
            height: 170px;
            /* object-fit: cover; */
            object-fit: fill;
            margin: 20px 0;
        }
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome, Admin</h1>
    </header>
    <nav>
        <ul>
            <li><a href="admin_lessons.php">Manage Lessons</a></li>
            <li><a href="admin_exercises.php">Manage Exercises</a></li>
            <li><a href="admin_users.php">Manage Users</a></li>
        </ul>
    </nav>
    <main>
        <h2>Admin Dashboard</h2>
        <!-- <img src="" alt="Admin Photo" class="profile-pic"> -->
        <img src="images/ourlogo.png" alt="Admin Photo" class="profile-pic">
        <p>Use the navigation menu to manage lessons, exercises, and users.</p>
    </main>
    <footer>
        <p>&copy; 2024 Your Company. All rights reserved.</p>
    </footer>
</body>
</html>
