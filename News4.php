<?php
class Header {
    public function render() {
        echo '<!DOCTYPE html>';
        echo '<html lang="en">';
        echo '<head>';
        echo '<meta charset="UTF-8">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<title>Maidonn</title>';
        echo '<link rel="stylesheet" href="newsandreviews.css">';
        echo '</head>';
        echo '<body>';
    }
}
class Navigation {
    public function render() {
        echo '<nav>';
        echo '<ul class="slidebar" style="display: none;">';
        echo '<li onclick="hideSideBar()"><a href="#">';
        echo '<img src="images/close_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="Close Sidebar" height="24" width="24">';
        echo '</a></li>';
        echo '<li><a href="home.php">Home</a></li>';
        echo '<li><a href="AboutUs.php">About Us</a></li>';
        echo '<li><a href="ContactUs.php">Contact Us</a></li>';
        echo '<li><a href="newsandreviews.php">News and Reviews</a></li>';
        echo '<li><a href="MyAccount.php">My Account</a></li>';
        echo '<li><a href="Register.php">Sign Up</a></li>';
        echo '<li><a href="LogIn.php">Log In</a></li>';
        echo '<li><a href="MyFavorites.php">My Favorites</a></li>';
        echo '</ul>';
        echo '<ul class="navbar">';
        echo '<li><a href="#">Maidon</a></li>';
        echo '<li class="hideOnMobile"><a href="home.php">Home</a></li>';
        echo '<li class="hideOnMobile"><a href="AboutUs.php">About Us</a></li>';
        echo '<li class="hideOnMobile"><a href="ContactUs.php">Contact Us</a></li>';
        echo '<li class="hideOnMobile"><a href="newsandreviews.php">News and Reviews</a></li>';
        echo '<li class="hideOnMobile"><a href="MyAccount.php">My Account</a></li>';
        echo '<li class="menubutton" onclick="showSidebar()"><a href="#"><img src="images/menuwhite.png" alt="Menu" height="24" width="24"></a></li>';
        echo '</ul>';
        echo '</nav>';
    }
}


class Content {
    public function render() {
        echo '<section class="singlepost">';
        echo '<div class="container singlepost_container">';
        echo '<h2>MG5</h2>';
        echo '<div class="singlepost_thumbnail"><img src="images/subaru-impreza-2024-exterior-01.webp" alt="foto1-news1"></div>';
        echo '<p>Testing of Alfa Romeo\'s modern 33 Stradale reached a high point recently when a prototype was taken to a top speed of 207 mph on the high-speed oval...</p>';
        echo '<h2>Most Reliable Car Brands</h2>';
        echo '<p>In claiming the top spot in CR’s reliability rankings, Subaru dethrones Lexus and Toyota...</p>';
        echo '</div>';
        echo '</section>';
    }
}

class Footer {
    public function render() {
        echo '<div class="footer">';
        echo '<div class="footer-box locations">';
        echo '<h2>Our Locations</h2>';
        echo '<div class="location"><h4>Prishtine</h4><p>Magjistralja Prishtine-Ferizaj</p></div>';
        echo '<div class="map-container"><iframe src="https://www.google.com/maps/embed?pb=..."></iframe></div>';
        echo '</div>';
        echo '<div class="footer-box social">';
        echo '<h2>Join the Maidonn Social Community</h2>';
        echo '<div class="social-links">';
        echo '<a href="https://m.facebook.com/100070756819509/"><img src="images/Download Facebook logo png.png" alt="Facebook"></a>';
        echo '<a href="https://www.instagram.com/autosallonimaidonn"><img src="images/Download Instagram logo png.png" alt="Instagram"></a>';
        echo '<a href="https://www.tiktok.com/@autosallonmaidonn5"><img src="images/tiktok-logo.png" alt="TikTok"></a>';
        echo '</div>';
        echo '</div>';
        echo '<div class="footer-box navigation">';
        echo '<h2>Quick Links</h2>';
        echo '<p><a href="AboutUs.php">About Us</a></p>';
        echo '<p><a href="ContactUs.php">Contact</a></p>';
        echo '<p><a href="#">Privacy Policy</a></p>';
        echo '<p><a href="#">Terms of Service</a></p>';
        echo '</div>';
        echo '</div>';
        echo '<div class="footer-bottom"><p>© 2024 Maidonn. All rights reserved.</p></div>';
    }
}


class Page {
    private $header;
    private $navigation;
    private $content;
    private $footer;


    public function __construct() {
        $this->header = new Header();
        $this->navigation = new Navigation();
        $this->content = new Content();
        $this->footer = new Footer();
    }

    public function render() {
        $this->header->render();
        $this->navigation->render();
        $this->content->render();
        $this->footer->render();
        echo "<script src='newsandreviews.js'></script>";
        echo '</body></html>';
    }
}
$page = new Page();
$page->render();

?>