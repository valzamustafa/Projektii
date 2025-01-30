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
        echo '<section class="singlepost">';
        echo '<div class="container singlepost_container">';
        echo '<h2> 2024 GMC Hummer EV SUV Review: (4) Tons of Fun!</h2>';
        echo '  <div class="singlepost_thumbnail"><img src="images/gmc-hummer-ev-3x-2024-03-exterior-dynamic-front.webp" alt="foto1-news1"></div>';
        echo ' <p>The verdict: It feels irresponsible to love something this big, inefficient, expensive and vulgar, but we can’t help falling for the GMC Hummer EV SUV’s ability to entertain.
        Versus the competition: For the same money, a Rivian R1S is far nicer inside, more space-efficient and easier to maneuver, but it’s not as much fun to drive — and it’s certainly not as much of a crazy spectacle. 
        GM’s reinvention of the Hummer — from a gas-guzzling, military-inspired, road-hogging SUV into the flagship electric vehicle of its Ultium EV program — has been fascinating to watch. Now a distinct model line under the GMC truck brand, the Hummer EV Pickup and SUV were slow to get out of the gate due to some production snags. Now, they’re arriving en masse at dealerships and appearing on public roads with increasing frequency. Our exposure to the pickup truck and now the SUV has been eye-opening for us all: We’re almost ashamed to say that despite the undeniable lunacy of this new EV, everyone on the editorial staff who’s driven it has fallen in love with it. </p>';
        echo '<h2>A Brilliant Styling Update</h2> ';
        echo '<p>One look at this Hummer EV SUV and you know exactly 
        what it is even if you aren’t old enough to have been aware of the Hummer brand’s popularity 20 years ago. This SUV’s distinctive look is key to its audacity. Sitting on a super-wide body, you get balloon-like off-road tires if you 
        opt for the Extreme Off-Road Package or blingy-but-gorgeous 22-inch multispoke wheels wrapped in all-terrain SUV tires if you don’t. </p>';
        echo '<p>The Hummer EV SUV’s proportions work better than those 
        of the pickup thanks to a shorter wheelbase that tidies things up a bit. All of the traditional Hummer styling cues are still there, like a windshield so impossibly short it necessitates three wipers, a multibar grille that’s now a signature lighting element, and beefy flanks with a slim, tanklike greenhouse. It’s visibly a Hummer, and its styling makes it look as if there wasn’t a 12-year gap between the demise of the Hummer brand after GM’s 2009 bankruptcy and its rebirth as an EV in 2022. It simply looks proper; it’s clear this is not a poser. With visible off-road-ready styling cues, like high front bumper cutouts for putting tires on boulders,
        you know from looking at it that it’s ready to tackle the trails … even if its owner is unlikely to ever take it into the rough.</p>';
        echo '<h2>A Different Type of Range Anxiety</h2>';
        echo '<p>Now, this isn’t the use case of most GLC350e owners — at least,
        I hope not. Adding a battery to this Mercedes hasn’t affected its power, refinement or drivability, though the 350e’s 13-gallon fuel tank is understandably smaller than the 300’s 17.4-gallon tank. This meant that at highway speeds, I saw a total cruising range of no more than 370 miles — a far cry from the GLC300’s hypothetical 539-mile highway range. 
        That’s an ideal figure, of course, but it’s not uncommon to get 500 miles of range from a non-hybrid SUV on a road trip.</p>';
        echo '<h2>Equipped Like No Hummer Before It</h2>';
        echo '<p>The Hummer EV SUV is powered a little differently from the longer pickup. Its shorter wheelbase means 
        it has a smaller battery, with fewer of the modules that comprise the pack. This SUV, then, has a 170-kilowatt-hour
        battery instead of the pickup’s 200-kWh-plus pack. Two- and three-motor drivetrains are available; our 3X test vehicle was equipped with three (one motor for the front wheels, two for the rears). This powertrain is good for 830 horsepower and an unknown amount of torque because GMC insists on reporting these Hummers’ torque numbers using a calculation nobody else in the auto industry uses; it’s a marketing gimmick we won’t bother to repeat here because it’s meaningless from a comparison standpoint. The two-motor variant produces 570 hp, 
        but both the 2X and 3X SUVs have similar driving ranges: up to 303 miles for the 2X and up to 314 miles for the 3X. </p>';
        echo '<p>The 3X pickup actually makes 1,000 hp, 
        while the 2X pickup still makes 570 hp, but the SUV can otherwise be equipped just like the pickup. 
        That includes the Hummer’s four-wheel-steering feature — which, frankly, is a must-have for a truck this big.
        Yes, it can do the CrabWalk gimmick, but I’ve yet to discover a proper use for the ability to slide diagonally left or right,
        other than TikTok silliness. More useful is the ability to maneuver this big Hummer EV into urban parking spaces with ease
        or turn corners in tight situations. Four-wheel steering makes this big, 4-ton Hummer feel like a much smaller and more nimble SUV. 
        Also helping in this regard is an adaptive air suspension, 
        which lets you adjust the vehicle’s ride height to different levels depending on terrain and situation. </p>';
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