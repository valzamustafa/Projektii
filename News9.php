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
        echo '<h2> 2025 Mercedes-Benz GLC350e Review: Use It or Lose It</h2>';
        echo '<div class="singlepost_thumbnail"><img src="images/mercedes-benz-glc-350e-2025-01-exterior-front-angle.webp" alt="foto1-news1"></div>';
        echo '<p> The verdict: As long as you have consistent access to a charger to make full use of its 54 miles of EPA-rated electric range, the 2025 Mercedes-Benz GLC350e is one of the more compelling luxury plug-in hybrids available.
        Versus the competition: For the moment, the GLC350e has the best electric driving range in its class, beating the Audi Q5 plug-in, the Lexus NX 450h Plus and Volvo’s XC60 Recharge — and it’s still competitively priced.
        I try to split my use of a test car evenly between the automaker’s intended use and what I perceive to be the most common actual use. Outside of standard sedans and SUVs, this is a folly; I wouldn’t know how to hitch a gooseneck trailer to a dually if you offered me the truck as a prize. In the case of the new 2025 Mercedes-Benz GLC350e, though, I reckon I know exactly how folks will use the brand’s newest plug-in hybrid. </p>';
        echo '<h2>Charging Challenges</h2>      ';
        echo '<p>Drivers who live in an apartment or condo that doesn’t allow for consistent overnight charging, for example, are unlikely to bother topping that battery up with any sort of frequency (ask me how I know). And in the case of the new GLC350e, that’s a shame: Brimming its 23.3-kilowatt-hour battery returns up to 54 miles of EPA-rated electric-only range, with a lofty top electric speed of 87 mph.</p>';
        echo '<p>I planned to cycle at least two full charges through the GLC’s battery during my test starting from the first day, when I received a test vehicle with a 95% state of charge. When there’s appreciable battery-only range to be utilized, every ignition cycle defaults to electric-only drive mode; Hybrid and Battery Hold modes are available, as are Comfort, Sport and Off-Road profiles. I spent my first two days with this Mercedes in electric serenity, whooshing around town and generally enjoying the GLC’s marshmallowy ride and mostly upscale appointments.
        The battery finally burned off halfway to a burrito, and the GLC’s turbocharged 2.0-liter four-cylinder engine took over. It was hardly a jarring experience: The engine is well isolated; it’s no more intrusive than the four-cylinder engine in the gas-only GLC300. I drove the GLC350e another 60 or so miles after that, until the night before I left on a 110-mile cruise down to San Diego, at which point I planned to put at least an 80% charge in it to maximize efficiency — and, again, to use it like I presume an owner would.</p>';
        echo '<h2>A Different Type of Range Anxiety</h2>';
        echo '<p>Now, this isn’t the use case of most GLC350e owners — at least, I hope not. Adding a battery to this Mercedes hasn’t affected its power, refinement or drivability, though the 350e’s 13-gallon fuel tank is understandably smaller than the 300’s 17.4-gallon tank. This meant that at highway speeds, I saw a total cruising range of no more than 370 miles — a far cry from the GLC300’s hypothetical 539-mile highway range. That’s an ideal figure, of course, but it’s not uncommon to get 500 miles of range from a non-hybrid SUV on a road trip.</p>';
        echo '<p>Is this coming off a bit persnickety? Maybe, but consider this: The GLC350e is EPA-rated 25 mpg combined when its gas engine is operating, and after driving 110 miles to San Diego and then driving in the city all weekend, I had to fill up the tank before heading home because I was concerned I wouldn’t be able to make it on the fuel I had.
       This is not an indictment of the GLC350e, but consider it a warning: It doesn’t make much sense to purchase a GLC PHEV over a GLC300 if you’re not going to plug it in at least once or twice a week. The math only checks out when you use it as Mercedes intends. </p>';
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