<?php

class Car {
    private string $name;
    private string $year;
    private string $image;

    public function __construct(string $name, string $year, string $image) {
        $this->name = $name;
        $this->year = $year;
        $this->image = $image;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getYear(): string {
        return $this->year;
    }

    public function getImage(): string {
        return $this->image;
    }

    public static function getAllCars(): array {
        return [
            new Car("Porsche Panamera", "2019", "images/car1.png"),
            new Car("BMW Series", "2021", "images/car2.png"),
            new Car("BMW X7", "2022", "images/car3.png"),
            new Car("Mercedes-Benz", "2020", "images/car4.png"),
            new Car("Porsche Cayenne", "2021", "images/car5.png"),
            new Car("BMW X5", "2023", "images/car5 (2).png"),
        ];
    }
}


$cars = Car::getAllCars();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maidonn</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <!-- Navbar Section -->
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
    <!-- Front Section -->
    <section class="front">
        <div class="front-text">
            <h1>Let's get you to the Road</h1>
            <a href="filter.php" class="button">Discover Now</a>
        </div>
    </section>

    <!-- Featured Cars Section -->
    <div class="featured-cars-container">
        <h1>FEATURED CARS</h1>
        <div class="cars-grid">
            <?php foreach ($cars as $car): ?>
                <div class="car-card">
                    <span class="badge">New</span>
                    <img src="<?php echo $car->getImage(); ?>" alt="<?php echo $car->getName(); ?>">
                    <h3><?php echo $car->getName(); ?></h3>
                    <p><?php echo $car->getYear(); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Video Section -->
    <div class="video-container">
        <video autoplay muted loop>
            <source src="videos/Untitled video - Made with Clipchamp.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <!-- Footer Section -->
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
    <script src="style.js"></script>
</body>
</html>
