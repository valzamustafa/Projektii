<?php
session_start();
$conn = new mysqli("localhost", "root", "", "projektii");


if ($conn->connect_error) {
    die("Lidhja dështoi: " . $conn->connect_error);
}

if (!isset($_SESSION['favorites'])) {
    $_SESSION['favorites'] = [];
}

$result = $conn->query("SELECT * FROM cars");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_favorite'])) {
    $car_id = $_POST['car_id'];

    if (!in_array($car_id, $_SESSION['favorites'])) {
        $_SESSION['favorites'][] = $car_id;
        echo "<script>alert('Makina u shtua në të preferuarat!');</script>";
    } else {
        echo "<script>alert('Kjo makinë është tashmë në të preferuarat!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maidonn</title>
    <link rel="stylesheet" href="filter.css">
</head>
<body>

<nav>
        <ul class="slidebar" style="display: none;">
            <li onclick="hideSideBar()">
                <a href="#"><img src="images/close_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="Close Sidebar" height="24" width="24"></a>
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
                <a href="#"><img src="images/menuwhite.png" alt="Menu" height="24" width="24"></a>
            </li>
        </ul>  
    </nav>
<div class="Reklama">
    <div class="Reklamat">
        <?php
        while ($row = $result->fetch_assoc()) {
            echo '<div class="products">
                    <h3>' . $row['name'] . '</h3>
                    <p>' . $row['description'] . '</p>
                    <div class="image-container">
                        <img src="uploads/' . $row['image'] . '" class="car-image">
                    </div>
                    <p>Viti ' . $row['year'] . '</p>
                    <div class="price">Çmimi: ' . $row['price'] . '€</div>
                    <form method="post">
                        <input type="hidden" name="car_id" value="' . $row['id'] . '">
                        <button type="submit" name="add_favorite" class="button">Add to Favorites</button>
                    </form>
                  </div>';
        }
        ?>
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
<script src="filter.js"></script>
</body>
</html>