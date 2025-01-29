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
        echo '<h2>2024 Ford F-150 Lightning Quick Spin: Flash Forward</h2>';
        echo '  <div class="singlepost_thumbnail">
        <img src="images/ford-f-150-lightning-flash-2024-02-exterior-front-angle.webp" alt="foto1-news1">
       </div>';
       echo '<p> What a difference a couple of years makes. 
       The Ford F-150 Lightning debuted for the 2022 model year as the first regular-production, all-electric pickup truck from a mainstream manufacturer. When it first went on sale, the Lightning’s only electric pickup competitor was the Rivian R1T, which beat it to market by about six months. Now it has more rivals, including the Chevrolet Silverado EV and GMC’s Hummer EV Pickup and Sierra EV. We’ve tested those rival pickups, and while they all have strong points, 
       the Lightning still stacks up well against them despite not having seen any major changes since its debut.</p>';
       echo ' <h2>Here in a Flash</h2>';
       echo '<p>Ford cooked up a new Lightning trim level for 2024, the Flash, that seems intended to allow buyers to take advantage of a $7,500 federal tax credit for EVs. The Flash bundles several of the Lightning’s desirable available features —
       including a 131-kilowatt-hour extended-range battery, a 15.5-inch infotainment touchscreen 
       (instead of the base 12-inch touchscreen), a wireless charging pad, an eight-speaker B&O audio system and a heated steering wheel — at a starting price $9,000 below the Lightning’s penultimate Lariat trim (which the Flash slots beneath).</p>';
       echo '<p>We’ve already evaluated the Lightning in multiple ways beyond our original review, 
       including testing its towing and fast-charging capabilities and seeing how its cargo bed compares with its rivals. 
       Those impressions hold true for 2024 (and for next year given the 2025 Lightning receives no significant changes), 
       and here we’ll add some quick impressions of the new 2024 F-150 Lightning Flash.</p>';
       echo '<h2>Conventionality Is a Plus</h2>';
       echo '<p>One of the F-150 Lightning’s biggest strengths is simply that it’s an F-150. 
       The automaker’s F-Series trucks have been America’s bestselling vehicle for more than 40 years, and Ford saw no need to reinvent 
       the wheel to make an electric version of the F-150. All of the Lightning’s rivals veer at least a little from 
       conventional controls and pickup truck design — and the Tesla Cybertruck veers a lot — but the Lightning shares most of its design with the
       standard F-150. It’s easy to acclimate to this truck, especially if you’re already familiar with the conventional F-150. 
       The Lightning also offers standout F-150 features like Ford’s BlueCruise hands-free driving system, an onboard scale function and an EV
       version of the Pro Power Onboard integrated generator.</p>';
       echo '<p>n terms of both price and equipment, the Flash trim hits a sweet spot in the F-150 Lightning lineup. 
       It starts at $70,090 (including a $2,095 destination fee), so even with a few options, the sticker price will almost certainly fall 
       under the $80,000 retail price cap that makes domestically produced EVs eligible for a $7,500 federal tax credit. Our test vehicle was 
       equipped with Ford’s 9.6-kilowatt Pro Power Onboard generator ($1,200), BlueCruise with a three-year subscription ($2,100), 
       Max Trailer Tow Package ($1,100), spray-in bedliner ($595) 
       and a couple of other options, and its as-tested price was $75,745. </p>';
       echo '<h2>Smooth, Strong, Silent</h2>';
       echo '<p>When equipped with the extended-range battery, the Lightning’s horsepower rating rises from an already-impressive 452 to 580 hp; 
       torque rating — 775 pounds-feet — is the same whether you get the standard- or extended-range battery. 
       In our acceleration testing, a 2022 Lightning Lariat, which has the same powertrain as the Flash, accelerated from 0-60 mph in just
       4.19 seconds. With 1,220 pounds of sandbags in the bed, it did the run in 4.79 seconds. 
       That’s really moving, especially for a full-size pickup that weighs almost 7,000 pounds.</p>';
       echo '<p>In addition to being quick, the Lightning is smooth and exceptionally quiet. Its electric powertrain 
       has no gears to shift, and conventional engine noises are absent. Its smooth accelerator- and brake-pedal responses 
       make the Lightning very pleasant to drive and help its close-quarters maneuverability. In general, the Lightning rides and handles well for a full-size pickup, 
       but you still feel its substantial heft in corners even with the bulk of its weight sitting low in the chassis. </p>';

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