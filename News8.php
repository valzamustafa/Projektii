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
        echo '<li><a href="home.html">Home</a></li>';
        echo '<li><a href="AboutUs.html">About Us</a></li>';
        echo '<li><a href="ContactUs.html">Contact Us</a></li>';
        echo '<li><a href="newsandreviews.html">News and Reviews</a></li>';
        echo '<li><a href="MyAccoutn.html">My Account</a></li>';
        echo '<li><a href="Register.html">Sign Up</a></li>';
        echo '<li><a href="LogIn.html">Log In</a></li>';
        echo '<li><a href="MyFavorites.html">My Favorites</a></li>';
        echo '</ul>';
        echo '<ul class="navbar">';
        echo '<li><a href="#">Maidon</a></li>';
        echo '<li class="hideOnMobile"><a href="home.html">Home</a></li>';
        echo '<li class="hideOnMobile"><a href="AboutUs.html">About Us</a></li>';
        echo '<li class="hideOnMobile"><a href="ContactUs.html">Contact Us</a></li>';
        echo '<li class="hideOnMobile"><a href="newsandreviews.html">News and Reviews</a></li>';
        echo '<li class="hideOnMobile"><a href="MyAccoutn.html">My Account</a></li>';
        echo '<li class="menubutton" onclick="showSidebar()"><a href="#"><img src="images/menuwhite.png" alt="Menu" height="24" width="24"></a></li>';
        echo '</ul>';
        echo '</nav>';
    }
}


class Content {
    public function render() {
        echo '<section class="singlepost">';
        echo '<div class="container singlepost_container">';
        echo '<h2> What’s New for the 2025 Jeep Wagoneer?</h2>';
        echo '<div class="singlepost_thumbnail">  <img src="images/jeep-wagoneer-2025-exterior-oem-02.jpg" alt="foto1-news1"></div>';
        echo '<p> The Jeep Wagoneer and its extended-length Wagoneer L sibling are mostly unchanged for the 2025 model year, but they receive additional equipment and substantial price cuts across their lineups. The Wagoneer debuted for 2022; 2023 brought the addition of the L variant as well as a twin-turbocharged 3.0-liter inline-six engine that mostly supplanted the 5.7-liter Hemi V-8 (the Hemi was discontinued completely for 2024). Note that Jeep also offers full-luxury Grand Wagoneer versions of both the Wagoneer and Wagoneer L, which largely mirror the Wagoneer’s changes for 2025. Read on to see if a 2025 or 2024 Wagoneer is best for you.  </p>';
        echo '<h2>What’s New for 2025?</h2>     ';
        echo '<p>For the new model year, the Wagoneer and Wagoneer L gain 20-inch wheels, adaptive cruise control and lane departure steering assist as standard equipment. Power-folding mirrors are newly optional; they’re standard on the top-line Series III trim. Prices drop significantly across the line — the decreases range from $3,000 to more than $11,680, depending on the trim.</p>';
        echo '<h2>Trim Levels and Pricing</h2>';
        echo '<p>The Wagoneer’s trim levels (base, Series II, Series II Carbide and Series III) carry over for 2025; the Carbide is a blacked-out version of the regular Series II. The Series III comes standard with four-wheel drive, while the rest come standard with rear-wheel drive and offer 4WD as a $3,000 option. Pricing is as follows (all prices include $2,000 destination charge); changes from 2024 pricing are in parentheses.
        <li> Base: $61,945 ($3,000 decrease)</li>
        <li> Series II: $65,945 ($5,185 decrease)</li>
        The Wagoneer L essentially mirrors the regular Wagoneer’s trim levels and features. The L comes standard with 4WD on all but the base trim, where it’s a $3,000 option in place of RWD. Choosing a Wagoneer L over a comparable Wagoneer adds $3,000; the 2025 Wagoneer L’s price cuts are the same as the regular 2025 Wagoneer’s. 
        </p>';
        echo '<p>The Wagoneer’s paint colors are Baltic-Gray Metallic, Bright White, Diamond Black Crystal Pearl, Midnight Sky (late availability), River Rock, Silver-Zynith and Velvet Red. Every color but Bright White costs $695 extra. </p>';
   

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
        echo '<p><a href="AboutUs.html">About Us</a></p>';
        echo '<p><a href="ContactUs.html">Contact</a></p>';
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