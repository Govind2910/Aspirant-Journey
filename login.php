<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            header("Location: " . ($user['role'] == 'admin' ? 'admin_dashboard.php' : 'student_dashboard.php'));
            exit();
        } else {
            $message = "Invalid password.";
        }
    } else {
        $message = "No user found with that username.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>Login</title>
    <style>.signup-container .signup-btn {
    display: inline-block;
    padding: 10px 20px;
    border-radius: 4px;
    background-color: #008CBA;
    color: white;
    text-decoration: none;
    font-size: 16px;
}

.signup-container .signup-btn:hover {
    background-color: #007B9A;
}</style>
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

    <!-- Login Section -->
    <section id="login-section">
        <div class="login-container">
            <h1>Login</h1>
            <?php if (!empty($message)) { echo "<div class='error-message'>$message</div>"; } ?>
            <form method="post" class="login-form">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Login" class="login-btn">
                </div>
                <div class="signup-container">
            <p>Don't have an account?</p>
            <a href="register.php" class="signup-btn">Sign Up</a>
        </div>
            </form>
        </div>
    </section>

    <!-- Footer -->
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
