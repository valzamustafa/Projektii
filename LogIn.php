<?php
session_start();
require_once 'db_connection.php';
require_once 'User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];


    $db = new Database();
    $connection = $db->getConnection();

  
    $user = new User($connection);


    if ($user->login($email, $password)) {
     
        if ($_SESSION['role'] === 'admin') {
            header("Location: MyAccount.php"); 
        } else {
            header("Location: home.php"); 
        }
        exit; 
    } else {
      
        $error_message = "Invalid login credentials!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="LogIn.css"> <!-- Shtoni stilin tuaj të personalizuar -->
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

    <!-- Formulari i kyçjes -->
    <div class="login-container">
        <div class="login-box">
            <h2>Log In</h2>
            
            <!-- Formulari për kyçje -->
            <form action="LogIn.php" method="POST">
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" required>
                </div>
                
                <!-- Shfaq mesazhin e gabimit nëse kyçja ka dështuar -->
                <?php if (isset($error_message)): ?>
                    <div class="error-message" style="color: red;">
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>

                <button type="submit">Log In</button>
                <p>Don't have an account? <a href="Register.php">Register</a></p>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
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
    </div>
    <div class="footer-bottom">
        <p>© 2024 Maidonn. All rights reserved.</p>
    </div>
<script>
<<<<<<< HEAD
     function showSidebar() {
=======
	 function showSidebar() {
>>>>>>> cb5b85869774ee38feb5b1c242f841629c1b17bd
const sidebar = document.querySelector('.slidebar');
sidebar.style.display = 'flex'; 
}

function hideSideBar() {
const sidebar = document.querySelector('.slidebar');
sidebar.style.display = 'none'; 
}
</script>
    

</body>
</html>
