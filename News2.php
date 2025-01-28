<?php
// Klasat për çdo element të faqes

class Navigation {
    public function render() {
        echo '
        <nav>
            <ul class="slidebar" style="display: none;">
                <li onclick="hideSideBar()">
                    <a href="#">
                        <img src="images/close_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="Close Sidebar" height="24" width="24">
                    </a>
                </li>
                <li><a href="home.html">Home</a></li>
                <li><a href="AboutUs.html">About Us</a></li>
                <li><a href="ContactUs.html">Contact Us</a></li>
                <li><a href="newsandreviews.html">News and Reviews</a></li>
                <li><a href="MyAccoutn.html">My Account</a></li>
                <li><a href="Register.html">Sign Up</a></li>
                <li><a href="LogIn.html">Log In</a></li>
                <li><a href="MyFavorites.html">My Favorites</a></li>
                <hr>
            </ul>
            <ul class="navbar">
                <li><a href="#">Maidon</a></li>
                <li class="hideOnMobile"><a href="home.html">Home</a></li>
                <li class="hideOnMobile"><a href="AboutUs.html">About Us</a></li>
                <li class="hideOnMobile"><a href="ContactUs.html">Contact Us</a></li>
                <li class="hideOnMobile"><a href="newsandreviews.html">News and Reviews</a></li>
                <li class="hideOnMobile"><a href="MyAccoutn.html">My Account</a></li>
                <li class="menubutton" onclick="showSidebar()">
                    <a href="#">
                        <img src="images/menuwhite.png" alt="Menu" height="24" width="24">
                    </a>
                </li>
            </ul>  
        </nav>';
    }
}

class Article {
    private $title;
    private $content;
    private $image;

    public function __construct($title, $content, $image) {
        $this->title = $title;
        $this->content = $content;
        $this->image = $image;
    }

    public function render() {
        echo '<section class="singlepost">';
        echo '<div class="container singlepost_container">';
        echo "<h2>{$this->title}</h2>";
        echo "<div class='singlepost_thumbnail'><img src='{$this->image}' alt='article-image'></div>";
        echo "<p>{$this->content}</p>";
        echo '</div>';
        echo '</section>';
    }
}

class Footer {
    public function render() {
        echo '
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
                <p><a href="AboutUs.html">About Us</a></p>
                <p><a href="ContactUs.html">Contact</a></p>
                <p><a href="#">Privacy Policy</a></p>
                <p><a href="#">Terms of Service</a></p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2024 Maidonn. All rights reserved.</p>
        </div>';
    }
}

class Page {
    private $navigation;
    private $footer;
    private $article;

    public function __construct($articleTitle, $articleContent, $articleImage) {
        $this->navigation = new Navigation();
        $this->footer = new Footer();
        $this->article = new Article($articleTitle, $articleContent, $articleImage);
    }

    public function render() {
        echo '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Maidonn</title><link rel="stylesheet" href="newsandreviews.css"></head><body>';

        $this->navigation->render();

        $this->article->render();

        $this->footer->render();

        echo '<script src="newsandreviews.js"></script></body></html>';
    }
}

$page = new Page('MG5', 'The Lamborghini Temerario debuted in August as the successor to the Huracán...', 'images/lamborghini-temerario_100951093.jpg');
$page->render();
?>
