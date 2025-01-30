<?php
require_once 'db_connection.php'; 
require_once 'User.php'; 

$db = new Database();
$conn = $db->getConnection();

$user = new User($conn);

session_start();
if (!isset($_SESSION['email'])) {
    header("Location: LogIn.php"); 
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <link rel="stylesheet" href="MyAccount.css">
</head>
<body>
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
            <li><a href="log.out.php">Log Out</a></li>
            
         
            <?php if (isset($_SESSION['email']) && strpos($_SESSION['email'], '@admin.com') !== false): ?>
                <li id="MyAccount-link">
                    <a href="MyAccount-admin.php">Dashboard</a>
                    
                </li>
            <?php endif; ?>

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
    <div class="container">
        <h1>Mirësevini në llogarinë tuaj, <?php echo htmlspecialchars($_SESSION['first_name']); ?>!</h1>

        <div class="sidebar">
            <ul>
                <li>Account Information</li>
                <li><a href="MyFavorites.php">My Favorites</a></li>
                <li><a href="Register.php">Create Account</a></li>
                <li><a href="log.out.php">Log Out</a></li>
               
                <?php if (isset($_SESSION['email']) && strpos($_SESSION['email'], '@admin.com') !== false): ?>
                    <li><a href="dashboard.php">Dashboard</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

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

    <script>
        function showSidebar() {
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
