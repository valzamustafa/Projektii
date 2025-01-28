<?php
class Navigation {
    private $links = [
        'home' => 'home.php',
        'about' => 'AboutUs.php',
        'contact' => 'ContactUs.php',
        'news' => 'newsandreviews.php',
        'account' => 'MyAccoutn.php',
        'signup' => 'Register.php',
        'login' => 'LogIn.php',
        'favorites' => 'MyFavorites.php',
    ];

    public function render() {
        echo '<nav>';
        echo '<ul class="navbar">';
        echo '<li><a href="#">Maidon</a></li>';
        foreach ($this->links as $name => $url) {
            echo "<li class='hideOnMobile'><a href='$url'>" . ucfirst($name) . "</a></li>";
        }
        echo '<li class="menubutton" onclick="showSidebar()">';
        echo '<a href="#"><img src="images/menuwhite.png" alt="Menu" height="24" width="24"></a>';
        echo '</li>';
        echo '</ul>';
        echo '</nav>';
    }
}
class Sidebar {
    private $links = [
        'home' => 'home.php',
        'about' => 'AboutUs.php',
        'contact' => 'ContactUs.php',
        'news' => 'newsandreviews.php',
        'account' => 'MyAccoutn.php',
        'signup' => 'Register.php',
        'login' => 'LogIn.php',
        'favorites' => 'MyFavorites.php',
    ];

    public function render() {
        echo '<ul class="slidebar" style="display: none;">';
        echo '<li onclick="hideSideBar()"><a href="#"><img src="images/close_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="Close Sidebar" height="24" width="24"></a></li>';
        foreach ($this->links as $name => $url) {
            echo "<li><a href='$url'>" . ucfirst($name) . "</a></li>";
        }
        echo '<hr>';
        echo '</ul>';
    }
}

class Footer {
    private $locations = [
        'Prishtine' => 'Magjistralja Prishtine-Ferizaj',
    ];
    private $socialLinks = [
        'facebook' => 'https://m.facebook.com/100070756819509/',
        'instagram' => 'https://www.instagram.com/autosallonimaidonn',
        'tiktok' => 'https://www.tiktok.com/@autosallonmaidonn5',
    ];

    public function render() {
        echo '<div class="footer">';
        echo '<div class="footer-box locations">';
        echo '<h2>Our Locations</h2>';
        foreach ($this->locations as $city => $address) {
            echo "<div class='location'><h4>$city</h4><p>$address</p></div>";
        }
        echo '<div class="map-container"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2936.5585414513607!2d21.136597699999996!3d42.607108999999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13549d850013cd65%3A0xdcf85db2fff2afc9!2sAutoSallon%20Maidonn!5e0!3m2!1sen!2s!4v1733581276957!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>';
        echo '</div>';

        echo '<div class="footer-box social">';
        echo '<h2>Join the Maidonn Social Community</h2>';
        echo '<div class="social-links">';
        foreach ($this->socialLinks as $platform => $link) {
            echo "<a href='$link'><img src='images/Download {$platform} logo png, {$platform} icon transparent.png' alt='$platform'></a>";
        }
        echo '</div>';
        echo '</div>';

        echo '<div class="footer-box navigation">';
        echo '<h2>Quick Links</h2>';
        echo '<p><a href="AboutUs.php">About Us</a></p>';
        echo '<p><a href="ContactUs.php">Contact</a></p>';
        echo '<p><a href="#">Privacy Policy</a></p>';
        echo '<p><a href="#">Terms of Service</a></p>';
        echo '</div>';

        echo '<div class="footer-bottom"><p>© 2024 Maidonn. All rights reserved.</p></div>';
        echo '</div>';
    }
}

class Content {
    public function render() {
        echo '<section class="singlepost"><div class="container singlepost_container">';
        echo '<h2>MG5</h2>';
        echo '<div class="singlepost_thumbnail"><img src="images/alfa-romeo-33-stradale_100950484.jpg" alt="foto1-news2"></div>';
        echo '<p>Testing of Alfa Romeo\'s modern 33 Stradale reached a high point...</p>';
        echo '</div></section>';
    }
}

class Page {
    private $title;
    private $navigation;
    private $sidebar;
    private $footer;
    private $content;

    public function __construct($title) {
        $this->title = $title;
        $this->navigation = new Navigation();
        $this->sidebar = new Sidebar();
        $this->footer = new Footer();
        $this->content = new Content();
    }

    public function renderHeader() {
        echo '<!DOCTYPE html><html lang="en"><head>';
        echo "<meta charset='UTF-8'><meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "<title>{$this->title}</title>";
        echo "<link rel='stylesheet' href='newsandreviews.css'>";
        echo '</head><body>';
    }

    public function renderFooter() {
        $this->footer->render();
        echo "<script src='newsandreviews.js'></script>";
        echo "</body></html>";
    }

    public function renderPage() {
        $this->renderHeader();
        $this->navigation->render();
        $this->sidebar->render();
        $this->content->render();
        $this->renderFooter();
    }
}

$page = new Page('Maidonn');
$page->renderPage();

?>