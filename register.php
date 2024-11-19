<?php
include('config.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collecting and sanitizing input
    $username = $conn->real_escape_string($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $conn->real_escape_string($_POST['email']);
    $role = 'student'; // Change to 'admin' if creating an admin user

    // Using prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (username, password, email, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $password, $email, $role);

    if ($stmt->execute()) {
        $message = "Registration successful!";
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href ="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>Register</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        justify-content: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        min-height: 100vh;
        margin: 0;
    }

    nav{
        position: relative;
    }
    .register-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px;
        text-align: center;
    }
    .register-container h2 {
        margin-bottom: 20px;
    }
    .message {
        margin-bottom: 20px;
        padding: 10px;
        border: 1px solid #ccc;
        background-color: #e0e0e0;
        border-radius: 4px;
        color: #333;
    }
    .form-group {
        margin-bottom: 15px;
        text-align: left;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
    }
    .form-group input[type="text"],
    .form-group input[type="password"],
    .form-group input[type="email"] {
        width: calc(100% - 20px);
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .register-btn {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 4px;
        background-color: #4CAF50;
        color: white;
        font-size: 16px;
        cursor: pointer;
    }
    .register-btn:hover {
        background-color: #45a049;
    }
    </style>
</head>
<body>
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
                <li><a href="login.php">Login</a></li>
            </ul>
            <img id="menu-btn" src="images/menu.png" alt="">
        </div>
    </nav>
    <div class="register-container">
        <h2>Register</h2>
        <?php if (!empty($message)): ?>
            <div class="message"><?php echo $message; ?></div>
        <?php endif; ?>
        <form method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>
            <button type="submit" class="register-btn">Register</button>
        </form>
    </div>
    <footer>
        <div class="footer-col">
            <h3>Top Courses</h3>
            <li><a href="polity.html">Political Science</a></li>
            <li><a href="current.html">Current Affairs and IR</a></li>
            <li><a href="history.html">History</a></li>
            <li><a href="geography.html">Geography</a></li>
            <li><a href="indianart.html">Indian Art&Culture</a></li>
        </div>
        <div class="footer-col">
            <h3>Customer Support</h3>
            <li><a href="#">FAQs</a></li>
            <li><a href="contact.html">Contact Us</a></li>
            <li><a href="contact.html">Help Center</a></li>
            <li><a href="contact.html">Feedback</a></li>
        </div>
        <div class="footer-col">
            <h3>Resources</h3>
            <li><a href="blog.html">Blog</a></li>
            <li><a href="contact.html">Guides</a></li>
            <li><a href="#">Research</a></li>
            <li><a href="contact.html">Webinars</a></li>
        </div>
        <div class="footer-col">
            <h3>About Us</h3>
            <li><a href="#">Company</a></li>
            <li><a href="#" onclick="scrollToExperts()">Team</a></li>
            <li><a href="#">Mission</a></li>
            <li><a href="#">Partnerships</a></li>
        </div>
        <div class="footer-col">
            <h3>Newsletter</h3>
            <p>You can trust us. we only sends prome offers,</p>
            <div class="subscribe">
                <input type="text" placeholder="Your Email Address">
                <a href="#" class="yellow">SUBSCRIBE</a>
            </div>
        </div>
        <div class="copyright"> 
            <p>Copyright © 2024 All rights reserved</p>
            <div class="pro-links">
                <a href="https://www.instagram.com/your_instagram_id"><i class="fab fa-instagram"></i></a>
                <a href="https://www.linkedin.com/in/your_linkedin_id"><i class="fab fa-linkedin-in"></i></a>
                <a href="https://www.facebook.com/your_facebook_id"><i class="fab fa-facebook-f"></i></a>
            </div>
        </div>
    </footer>
    <script>
        $('#menu-btn').click(function(){
            $('nav .navigation ul').addClass('active')
        });
        $('#menu-close').click(function(){
            $('nav .navigation ul').removeClass('active')
        });
    </script>
    <script>
        function scrollToExperts() {
            var expertsSection = document.getElementById("experts");
            expertsSection.scrollIntoView({ behavior: 'smooth' });
        }
    </script>
    <script>
        function updateCountdown() {
            const now = new Date().getTime();
            const targetDate = new Date('2024-07-01T00:00:00').getTime();
            const timeDifference = targetDate - now;

            const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
            const hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

            document.getElementById('days').innerHTML = days + " <br> Days";
            document.getElementById('hours').innerHTML = hours + " <br> Hours";
            document.getElementById('minutes').innerHTML = minutes + " <br> Minutes";
            document.getElementById('seconds').innerHTML = seconds + " <br> Seconds";
        }

        setInterval(updateCountdown, 1000);
    </script>
    <script>
        $(document).ready(function() {
            const urlParams = new URLSearchParams(window.location.search);
            const message = urlParams.get('message');
            if (message) {
                alert(message);
            }
        });
    </script>
</body>
</html>
