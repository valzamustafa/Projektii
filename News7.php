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
        echo '<li><a href="MyAccoutn.php">My Account</a></li>';
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
        echo '<li class="hideOnMobile"><a href="MyAccoutn.php">My Account</a></li>';
        echo '<li class="menubutton" onclick="showSidebar()"><a href="#"><img src="images/menuwhite.png" alt="Menu" height="24" width="24"></a></li>';
        echo '</ul>';
        echo '</nav>';
    }
}


class Content {
    public function render() {
        echo '   <section class="singlepost">';
        echo '   <div class="container singlepost_container">';
        echo '   <h2>Plug & Charge Tech Is Coming to Public EV Chargers to Free Us From Apps and Cards</h2>';
        echo '   <div class="singlepost_thumbnail"><img src="images/plug and charge.webp" alt="foto1-news1"> </div>';
        echo '  <p>One of the major frustrations with charging an electric vehicle at a public charger — especially in frigid winter weather and extreme summer heat — is juggling the various cards and mobile apps required to pay. Not even the most dedicated masochists I know enjoy getting soaked in the rain while hoping (pretty please) that a charger responds to their phones. That’s about to change, as SAE International and the federal Joint Office of Energy and Transportation announced that Plug & Charge technology will soon be added to all public charging stations, with initial testing of the program starting in 2025. </p>';
        echo '<p>Plug & Charge is genuinely convenient, as it lets you start charging your car as soon as you plug into a public charger. No pressing buttons, fiddling with phone apps, or swiping or tapping a card required. It does exactly what it says in the name: You plug your EV in, and it charges. Some manufacturers already have EVs that can use this technology, but as InsideEVs notes in its roundup of which models have it, many of these existing Plug & Charge systems only work on certain charging networks (such as EVgo or Electrify America).</p>';
        echo '<p>The implementation of universal Plug & Charge will also get rid of these limitations, allowing any EV with the ability to do so to plug in to any public charger, authenticate itself with that charging station and automatically start charging. It all builds upon SAE’s Electric Vehicle Public Key Infrastructure, which will become the shared means of authenticating vehicles and payments. The main goal is to lead to a less fragmented charging landscape where EVs, charging networks and chargers are all able to communicate with each other, thus expanding and simplifying charging options for all EV owners.</p>';
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