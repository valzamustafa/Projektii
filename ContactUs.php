<?php

include('db_connection.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

 
    if (!empty($name) && !empty($email) && !empty($message)) {
      
        $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute()) {
            $success_message = "Mesazhi juaj u dërgua me sukses!";
        } else {
            $error_message = "Kishte një problem gjatë dërgimit të mesazhit.";
        }
        $stmt->close();
    } else {
        $error_message = "Ju lutemi plotësoni të gjitha fushat e formularit.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="ContactUs.css">
</head>
<body>

    <!-- Navbar -->
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
    </nav>

    <!-- Contact Us Section -->
    <section class="contact">
        <div class="container">
            <h2>Contact Us</h2>
            <div class="container-wrapper">
                <div class="contactform">
                    <h3>Send us a message</h3>
                    <form method="POST" action="">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Your Email" required>
                        </div>
                        <div class="form-group">
                            <textarea name="message" placeholder="Your Message" required></textarea>
                        </div>
                        <button type="submit">Send Message</button>
                    </form>

                    <!-- Display success or error message -->
                    <?php if (isset($success_message)) { ?>
                        <div class="success-message">
                            <?php echo $success_message; ?>
                        </div>
                    <?php } ?>
                    <?php if (isset($error_message)) { ?>
                        <div class="error-message">
                            <?php echo $error_message; ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="contact-info">
                    <h3>Our Information</h3>
                    <div class="info-item">
                        <img src="images/location.png" alt="Location" height="24" width="24">
                        <p>Prishtine-Ferizaj Kolegji Fama</p>
                    </div>
                    <div class="info-item">
                        <img src="images/phoneicon.png" alt="Phone" height="24" width="24">
                        <p>044 111 000</p>
                    </div>
                    <div class="info-item">
                        <img src="images/mailicon.png" alt="Email" height="24" width="24">
                        <p>autosallonmaidonn@gmail.com</p>
                    </div>
                    <div class="info-item">
                        <img src="images/time.png" alt="Working hours" height="24" width="24">
                        <p>Mon - Sat: 9:00 AM - 5:00 PM</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-box locations">
            <h2>Our Locations</h2>
            <div class="location">
                <h4>Prishtine</h4>
                <p>Magjistralja Prishtine-Ferizaj</p>
            </div>
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=..."></iframe>
            </div>
        </div>

        <div class="footer-box social">
            <h2>Join the Maidonn Social Community</h2>
            <div class="social-links">
                <a href="https://m.facebook.com/100070756819509/"><img src="images/facebook.png" alt="Facebook"></a>
                <a href="https://www.instagram.com/autosallonimaidonn"><img src="images/instagram.png" alt="Instagram"></a>
                <a href="https://www.tiktok.com/@autosallonmaidonn5"><img src="images/tiktok.png" alt="TikTok"></a>
            </div>
        </div>

        <div class="footer-box navigation">
            <h2>Quick Links</h2>
            <p><a href="AboutUs.php">About Us</a></p>
            <p><a href="ContactUs.php">Contact</a></p>
            <p><a href="#">Privacy Policy</a></p>
            <p><a href="#">Terms of Service</a></p>
        </div>
    </div>

    <div class="footer-bottom">
        <p>© 2024 Maidonn. All rights reserved.</p>
    </div>
    <script src="Contact.js"></script>

</body>
</html>
