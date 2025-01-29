<?php
session_start();

class News {
    public function render() {
       
        echo '
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>About Us</title>
            <link rel="stylesheet" href="newsandreviews.css"> <!-- Link to the CSS file -->
        </head>
        <nav>
            <ul class="slidebar" style="display: none;">
                <li onclick="hideSideBar()">
                    <a href="#">
                        <img src="images/close_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="Close Sidebar" height="24" width="24">
                    </a>
                </li>
                <li><a href="home.php">Home</a></li>
                <li><a href="AboutUs.php">About Us</a></li>
                <li><a href="ContactUs.php">Contact Us</a></li>
                <li><a href="newsandreviews.php">News and Reviews</a></li>
                <li><a href="MyAccount.php">My Account</a></li>
                <li><a href="Register.php">Sign Up</a></li>
                <li><a href="LogIn.php">Log In</a></li>
                <li><a href="MyFavorites.php">My Favorites</a></li>
                <hr>
            </ul>
            <ul class="navbar">
                <li><a href="#">Maidon</a></li>
                <li class="hideOnMobile"><a href="home.php">Home</a></li>
                <li class="hideOnMobile"><a href="AboutUs.php">About Us</a></li>
                <li class="hideOnMobile"><a href="ContactUs.php">Contact Us</a></li>
                <li class="hideOnMobile"><a href="newsandreviews.php">News and Reviews</a></li>
                <li class="hideOnMobile"><a href="MyAccount.php">My Account</a></li>
                <li class="menubutton" onclick="showSidebar()">
                    <a href="#">
                        <img src="images/menuwhite.png" alt="Menu" height="24" width="24">
                    </a>
                </li>
            </ul>
        </nav>';

    
        echo '
        <main class="main-container">
    <!-- Featured News Slider -->
    <section class="featured">
      <h2>Featured News</h2>
      <div class="slider-container" id="slider-container">
        <div class="slide active">
          <img src="images/foto kryesore te news.webp" alt="Featured Car 1">
          <div class="article-details">
            <span class="category"> CARS</span>
            <h1><a href="news1.php
              ">Nine electric estates available now or in the near future</a></h1>
            <p>Because everyone knows an estate is infinitely cooler than an SUV</p>
          </div>
        </div>
        <div class="slide">
          <img src="images/lamborghini-temerario_100951093.jpg"Featured Car 2">
          <div class="article-details">
            <span class="category">Lamborghini</span>
            <h1><a href="news2.php">Lamborghini Temerario with over 1,000 hp probably in the pipeline</a></h1>
            <p>The Lamborghini Temerario already spits out 907 hp but more power is likely for future variants of the car.</p>
          </div>
        </div>
        <div class="slide">
          <img src="images/alfa-romeo-33-stradale_100950484.jpg" alt="Modern Alfa Romeo">
          <div class="article-details">
            <span class="category">Super Cars</span>
            <h1><a href="news3.php">Modern Alfa Romeo 33 Stradale hits 207 mph at Nardò</a></h1>
            <p>Alfa Romeos modern 33 Stradale is just weeks out from starting customer deliveries.</p>
          </div>
        </div>
        <button class="prev">❮</button>
    <button class="next">❯</button>
      </div>
    </section>

    <!-- Popular News Sidebar -->
    <aside class="sidebar">
        <h3>Popular News</h3>
        <ul>
            <li><a href="News4.php">Subaru Tops Consumer Reports Annual Auto Reliability Survey</a></li>
            <li><a href="News5.php">2025 Mazda MX-5 Miata: Pure Driving Joy Priced From $30,515, 35th Anniversary Edition Inbound</a></li>
          <li><a href="News6.php">317,000-Plus Ram HD Trucks Recalled for Potential Loss of Antilock Brakes</a></li>
          <li><a href="News7.php">Plug & Charge Tech Is Coming to Public EV Chargers to Free Us From Apps and Cards</a></li>
          <li><a href="News8.php">What’s New for the 2025 Jeep Wagoneer?</a></li>
        </ul>
      </aside>
      
    
    <section class="more-news">
      <h2>Latest News</h2>
      <div class="news-item">
        <img src="images/mercedes-benz-glc-350e-2025-01-exterior-front-angle.webp" alt="Tesla Model">
        <h3><a href="News9.php">2025 Mercedes-Benz GLC350e Review: Use It or Lose It</a></h3>
        <p>The Tesla Model 2 promises to be an affordable, efficient, and innovative compact car.</p>
      </div>
   
  

  
        <div class="news-item">
          <img src="images/gmc-hummer-ev-3x-2024-03-exterior-dynamic-front.webp" alt="Tesla Model">
          <h3><a href="News10.php">2024 GMC Hummer EV SUV Review: (4) Tons of Fun!</a></h3>
          <p>The Tesla Model 2 promises to be an affordable, efficient, and innovative compact car.</p>
        </div>
        
 
      
        <div class="news-item">
          <img src="images/ford-f-150-lightning-flash-2024-02-exterior-front-angle.webp" alt="Tesla Model">
          <h3><a href="News11.php">2024 Ford F-150 Lightning Quick Spin: Flash Forward</a></h3>
          <p>The Tesla Model 2 promises to be an affordable, efficient, and innovative compact car.</p>
        </div>
       
      </section>
  

   
  </main>';

        // Render Footer
        echo '
        <footer class="footer">
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
                <p><a href="AboutUs.php">About Us</a></p>
                <p><a href="ContactUs.php">Contact</a></p>
                <p><a href="#">Privacy Policy</a></p>
                <p><a href="#">Terms of Service</a></p>
            </div>
        </footer>
        <div class="footer-bottom">
            <p>© 2024 Maidonn. All rights reserved.</p>
        </div>
        <script src="newsandreviews.js"></script>
        ';
    }
}


$newsandreviewsPage = new News();
$newsandreviewsPage->render();
?> 
