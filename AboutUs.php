<?php
session_start();

class AboutUs {
    public function render() {
        // Render Navbar
        echo '
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>About Us</title>
            <link rel="stylesheet" href="About.css"> <!-- Link to the CSS file -->
        </head>
        <nav>
            <ul class="slidebar" style="display: none;">
                <li onclick="hideSideBar()">
                    <a href="#">
                        <img src="images/close_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="Close Sidebar" height="24" width="24">
                    </a>
                </li>
                <li><a href="home.php">Home</a></li>
                <li><a href="AboutUs.php">About Us</a></li>
                <li><a href="ContactUs.php">Contact Us</a></li>
                <li><a href="newsandreviews.php">News and Reviews</a></li>
                <li><a href="MyAccount.php">My Account</a></li>
                <li><a href="Register.php">Sign Up</a></li>
                <li><a href="LogIn.php">Log In</a></li>
                <li><a href="MyFavorites.php">My Favorites</a></li>
                <hr>
            </ul>
            <ul class="navbar">
                <li><a href="#">Maidon</a></li>
                <li class="hideOnMobile"><a href="home.php">Home</a></li>
                <li class="hideOnMobile"><a href="AboutUs.php">About Us</a></li>
                <li class="hideOnMobile"><a href="ContactUs.php">Contact Us</a></li>
                <li class="hideOnMobile"><a href="newsandreviews.php">News and Reviews</a></li>
                <li class="hideOnMobile"><a href="MyAccount.php">My Account</a></li>
                <li class="menubutton" onclick="showSidebar()">
                    <a href="#">
                        <img src="images/menuwhite.png" alt="Menu" height="24" width="24">
                    </a>
                </li>
            </ul>
        </nav>';

        // Main content of About Us
        echo '
        <section class="front">
            <div class="front-text">
                <h1>Your journey to the perfect ride begins here.</h1>
            </div>
        </section>

        <div class="container">
            <div class="box">
                <p>Buying a car should be an exciting and enjoyable experience. 
                Our passion for cars and customer service drives everything we do. 
                Whether you\'re a first-time buyer or a seasoned car enthusiast,
                 we\'re here to help you find your perfect match.</p>
            </div>
            <div class="box">
                <p>We started with a simple goal: to make car 
                buying easy, transparent, and fun for everyone.
                Over the years, we\'ve built a trusted reputation for providing quality 
                vehicles at great prices, all backed by a team that cares.</p>
            </div>
            <div class="box">
                <p>To make your car buying journey smooth, hassle-free, and filled with joy. 
                We\'re committed to offering the best selection of vehicles, exceptional service, and a friendly environment for all our customers.</p>
            </div>
            <div class="box">
                <p>We promise to always put you first.
                No pressure, no stress—just honest advice and personalized recommendations 
                to help you find the car of your dreams.</p> 
            </div>
        </div>

        <section class="owners-quotes">
            <div class="quote-box">
                <blockquote>
                    <p>"At us, we do not just sell cars
                    we help you find your perfect match. It\'s not just about the ride, it\'s about the experience.
                     I am here to make sure your journey starts with a smile and ends with joy!"</p>
                </blockquote>
                <footer>Valza Mustafa, Founder</footer>
            </div>

            <div class="quote-box">
                <blockquote>
                    <p>"We believe in building lasting relationships,
                         not just making sales. Every car
                          we offer comes with our promise of quality and service
                          , because you deserve the best!"</p>
                </blockquote>
                <footer>Altina Krapi, Founder</footer>
            </div>
        </section>';

        // Render Footer
        echo '
        <footer class="footer">
            <div class="footer-box locations">
                <h2>Our Locations</h2>
                <div class="location">
                    <h4>Prishtine</h4>
                    <p>Magjistralja Prishtine-Ferizaj</p>
                </div>
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2936.5585414513607!2d21.136597699999996!3d42.607108999999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13549d850013cd65%3A0xdcf85db2fff2afc9!2sAutoSallon%20Maidonn!5e0!3m2!1sen!2s!4v1733581276957!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <div class="footer-box social">
                <h2>Join the Maidonn Social Community</h2>
                <div class="social-links">
                    <a href="https://m.facebook.com/100070756819509/"><img src="images/Download Facebook logo png, Facebook logo transparent png, Facebook icon transparent free png (1).png" alt="Facebook"></a>
                    <a href="https://www.instagram.com/autosallonimaidonn"><img src="images/Download Instagram logo png, Instagram icon transparent.png" alt="Instagram"></a>
                    <a href="https://www.tiktok.com/@autosallonmaidonn5"><img src="images/tiktok-logo-tiktok-logo-transparent-tiktok-icon-transparent-free-free-png.png" alt="TikTok"></a>
                </div>
            </div>

            <div class="footer-box navigation">
                <h2>Quick Links</h2>
                <p><a href="AboutUs.php">About Us</a></p>
                <p><a href="ContactUs.php">Contact</a></p>
                <p><a href="#">Privacy Policy</a></p>
                <p><a href="#">Terms of Service</a></p>
            </div>
        </footer>
        <div class="footer-bottom">
            <p>© 2024 Maidonn. All rights reserved.</p>
        </div>
         <script src="AboutUs.js"></script>
        ';
    }
}

// Instantiate and render the page
$aboutUsPage = new AboutUs();
$aboutUsPage->render();
?> 
