<!-- footer.php -->
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
        <p>You can trust us. We only send promotional offers.</p>
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
    $('#menu-btn').click(function() {
        $('nav .navigation ul').addClass('active')
    });

    $('#menu-close').click(function() {
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
