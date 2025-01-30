<?php
class FavoritesPage {
    private $username;

    public function __construct($username = null) {
        $this->username = $username;
    }

    public function displayFavorites() {
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>My Favorites</title>
            <link rel='stylesheet' href='MyFavorites.css'>
        </head>
        <body>
            <nav>
                <ul class='slidebar' style='display: none;'>
                    <li onclick='hideSideBar()'>
                        <a href='#'>
                            <img src='images/close_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png' alt='Close Sidebar' height='24' width='24'>
                        </a>
                    </li>
                    <li><a href='home.php'>Home</a></li>
                    <li><a href='AboutUs.php'>About Us</a></li>
                    <li><a href='ContactUs.php'>Contact Us</a></li>
                    <li><a href='newsandreviews.php'>News and Reviews</a></li>
                    <li><a href='MyAccoutn.php'>My Account</a></li>
                    <li><a href='Register.php'>Sign Up</a></li>
                    <li><a href='LogIn.php'>Log In</a></li>
                    <li><a href='MyFavorites.php'>My Favorites</a></li>
                    <hr>
                </ul>  

                <ul class='navbar'>
                    <li><a href='#'>Maidon</a></li>
                    <li class='hideOnMobile'><a href='home.php'>Home</a></li>
                    <li class='hideOnMobile'><a href='AboutUs.php'>About Us</a></li>
                    <li class='hideOnMobile'><a href='ContactUs.php'>Contact Us</a></li>
                    <li class='hideOnMobile'><a href='newsandreviews.php'>News and Reviews</a></li>
                    <li class='hideOnMobile'><a href='MyAccoutn.php'>My Account</a></li>
                    <li class='menubutton' onclick='showSidebar()'>
                        <a href='#'>
                            <img src='images/menuwhite.png' alt='Menu' height='24' width='24'>
                        </a>
                    </li>
                </ul>  
            </nav>
            <main class='favorites-container' id='favorites-container'>
                <p class='no-products' id='no-products'>You have no favorite products.</p>
            </main>

            <footer class='footer'>
                <div class='footer-box locations'>
                    <h2>Our Locations</h2>
                    <div class='location'>
                        <h4>Prishtine</h4>
                        <p>Magjistralja Prishtine-Ferizaj</p>
                    </div>
                    <div class='map-container'>
                        <iframe src='https://www.google.com/maps/embed?...'></iframe>
                    </div>
                </div>
                <div class='footer-box social'>
                    <h2>Join the Maidonn Social Community</h2>
                    <div class='social-links'>
                        <a href='https://m.facebook.com/100070756819509/'><img src='images/Download Facebook logo png, Facebook logo transparent png, Facebook icon transparent free png (1).png' alt='Facebook'></a>
                        <a href='https://www.instagram.com/autosallonimaidonn'><img src='images/Download Instagram logo png, Instagram icon transparent.png' alt='Instagram'></a>
                        <a href='https://www.tiktok.com/@autosallonmaidonn5'><img src='images/tiktok-logo-tiktok-logo-transparent-tiktok-icon-transparent-free-free-png.png' alt='TikTok'></a>
                    </div>
                </div>
            
                <div class='footer-box navigation'>
                    <h2>Quick Links</h2>
                    <p><a href='AboutUs.php'>About Us</a></p>
                    <p><a href='ContactUs.php'>Contact</a></p>
                    <p><a href='#'>Privacy Policy</a></p>
                    <p><a href='#'>Terms of Service</a></p>
                </div>
            </footer>
            <div class='footer-bottom'>
                <p>© 2024 Maidonn. All rights reserved.</p>
            </div>
            <script src='MyFavorites.js'></script>
        </body>
        </html>";
    }
}

$favoritesPage = new FavoritesPage();
$favoritesPage->displayFavorites();
?>
