<?php
session_start();
require_once 'db_connection.php';
require_once 'FavoriteManager.php';

$db = new Database();
$conn = $db->getConnection();

$favoriteManager = new FavoriteManager($conn);

$favorites = isset($_SESSION['favorites']) ? $_SESSION['favorites'] : [];
$cars = $favoriteManager->getFavorites($favorites);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove_id'])) {
    $remove_id = $_POST['remove_id'];
    $favoriteManager->removeFavorite($remove_id);
    header("Location: MyFavorites.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Të Preferuarat</title>
    <link rel="stylesheet" href="MyFavorites.css">
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
        <li id="dashboard-link" style="display: none;"><a href="dashboard.html">Dashboard</a></li> 
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

<div class="favorites-container">
    <?php if (!empty($cars)): ?>
        <?php foreach ($cars as $car): ?>
            <div class="favorite-product">
                <h3><?php echo $car['name']; ?></h3>
                <p><?php echo $car['description']; ?></p>
                <div class="image-container">
                    <img src="uploads/<?php echo $car['image']; ?>" class="car-image">
                </div>
                <p>Viti: <?php echo $car['year']; ?></p>
                <div class="price">Çmimi: <?php echo $car['price']; ?>€</div>

                <form method="post">
                    <input type="hidden" name="remove_id" value="<?php echo $car['id']; ?>">
                    <button type="submit" class="remove-button">Remove</button>
                </form>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="no-products">Nuk keni asnjë makinë në të preferuarat!</p>
    <?php endif; ?>
</div>

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

<script src="MyFavorites.js"></script>
</body>
</html>