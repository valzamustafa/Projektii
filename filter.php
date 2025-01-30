<?php
// db_connection.php is already included for database access
include('db_connection.php');
session_start();

// Function to fetch products based on the selected price range
function getProductsByPrice($priceFilter) {
    $db = new Database();
    $conn = $db->getConnection();

    $query = "SELECT * FROM cars";
    
    // Apply the price filter if selected
    if ($priceFilter == 'under10000') {
        $query .= " WHERE price < 10000";
    } elseif ($priceFilter == '10000to30000') {
        $query .= " WHERE price BETWEEN 10000 AND 30000";
    } elseif ($priceFilter == 'above30000') {
        $query .= " WHERE price > 30000";
    }

    $result = $conn->query($query);
    $cars = [];
    
    while ($row = $result->fetch_assoc()) {
        $cars[] = $row;
    }

    return $cars;
}

// Handle the filter selection
$priceFilter = isset($_GET['priceFilter']) ? $_GET['priceFilter'] : 'all';
$products = getProductsByPrice($priceFilter);

// Add to favorites functionality
if (isset($_POST['add_to_favorites'])) {
    $carName = $_POST['carName'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    // Insert into the favorites table or session (based on your logic)
    $_SESSION['favorites'][] = [
        'carName' => $carName,
        'price' => $price,
        'image' => $image,
    ];
    header("Location: ".$_SERVER['PHP_SELF']); // Refresh page to show updated favorites
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maidonn</title>
    <link rel="stylesheet" href="filter.css">
</head>
<body>
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
</nav>

<div class="Reklama">
    <div class="Reklamat">
        <?php foreach ($products as $product): ?>
        <div class="products">
            <h3><?php echo $product['car_name']; ?></h3>
            <p><?php echo $product['description']; ?></p>
            <div class="image-container">
                <img src="<?php echo $product['image']; ?>" class="BMW">
            </div>
            <p>Viti <?php echo $product['year']; ?></p>
            <div class="price">Price: <?php echo $product['price']; ?>€</div>
            <form method="POST">
                <input type="hidden" name="carName" value="<?php echo $product['car_name']; ?>">
                <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                <input type="hidden" name="image" value="<?php echo $product['image']; ?>">
                <button type="submit" name="add_to_favorites" class="button">Add to Favorite</button>
            </form>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="filter">
    <label for="priceFilter">Filter by Price: </label>
    <form method="GET" action="">
        <select id="priceFilter" name="priceFilter" onchange="this.form.submit()">
            <option value="all" <?php echo $priceFilter == 'all' ? 'selected' : ''; ?>>All</option>
            <option value="under10000" <?php echo $priceFilter == 'under10000' ? 'selected' : ''; ?>>Under 10000€</option>
            <option value="10000to30000" <?php echo $priceFilter == '10000to30000' ? 'selected' : ''; ?>>10000€ - 30000€</option>
            <option value="above30000" <?php echo $priceFilter == 'above30000' ? 'selected' : ''; ?>>Above 30000€</option>
        </select>
    </form>
</div>

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
  </div>

<script src="filter.js"></script>
</body>
</html>
