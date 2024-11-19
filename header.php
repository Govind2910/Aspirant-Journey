<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title><?php echo isset($title) ? $title : "Untitled"; ?></title>
    <!-- Any additional styles or scripts -->
</head>
<body>
    <!-- Navigation -->
    <nav>
        <img src="images/ourlogo.png" alt="" class="logo">
        <div class="navigation">
            <ul>
                <i id="menu-close" class="fas fa-times"></i>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="course.html">Courses</a></li>
                <li><a href="contact.html">Contacts</a></li>
                <li><a class="active" href="login.php">Login</a></li>
            </ul>
            <img id="menu-btn" src="images/menu.png" alt="">
        </div>
    </nav>
