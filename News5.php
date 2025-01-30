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
        echo '<li><a href="log.out.php">Log Out</a></li>';
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
        echo ' <section class="singlepost">';
        echo ' <div class="container singlepost_container">';
        echo '  <h2>MG5</h2>';
        echo ' <div class="singlepost_thumbnail"> <img src="images/mazda-mx-5-miata-2025-exterior-oem-01.webp" alt="foto1-news1"></div>';
        echo  '<p> There’s a joke often credited to either Kenny Powers or comedian Daniel Tosh: They say money can’t buy happiness, but have you ever seen a sad person on a jet ski? The same could be said for the Mazda MX-5 Miata, an elemental roadster that is, like a jet ski, designed purely for enjoyment. For 2025, happiness starts at $30,515. </p>';
        echo ' <p>Mazda fine-tuned the Miata last year, tweaking the steering, adding a newly available limited-slip differential and upgrading the infotainment system. Most of the Miata line is unchanged for 2025, although a 35th Anniversary edition will wear exclusive Artisan Red paint and a tan Nappa leather interior. Mazda will reveal more information about this special edition on Jan. 24, 2025, following the MX-5 Cup series race held during the Rolex 24 at Daytona.</p>';
        echo '<h2>Powertrain Specs and MPG</h2>';
        echo '  <p> Available as either a soft-top roadster or with a folding “retractable fastback” hardtop on the MX-5 Miata RF, the lightweight, rear-wheel-drive Miata doesn’t need a lot of power to generate big smiles. Its 2.0-liter four-cylinder generates just 181 horsepower and 151 pounds-feet of torque. A six-speed manual transmission comes standard, with a six-speed automatic transmission available on the soft-top Grand Touring for $920 and $970 on the RF.
        While official EPA figures haven’t been released yet, Mazda claims the 2025 MX-5 Miata gets the same fuel economy as the 2024 model, and with no changes between model years, they’re probably right. It achieves 26/34/29 mpg city/highway/combined with a manual transmission and 26/35/29 mpg with an automatic transmission. </p>';
        echo ' <h2>Safety Features</h2>';
        echo ' <p> As basic as the MX-5 is, every 2025 Miata is fitted with Mazda’s i-Activsense advanced safety suite. Standard features include forward collision warning with automatic emergency braking, blind spot monitors, rear cross-traffic alert and lane departure warning.</p>';
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