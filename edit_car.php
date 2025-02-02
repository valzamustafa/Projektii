<?php
require_once 'db_connection.php';
require_once 'Car.php';
session_start();

if (!isset($_SESSION['email']) || strpos($_SESSION['email'], '@admin.com') === false) {
    header("Location: MyAccount.php");
    exit;
}

$db = new Database();
$conn = $db->getConnection();

// Krijo një instancë të klasës Car
$car = new Car($conn);

if (isset($_GET['id'])) {
    $car_id = $_GET['id'];
   
    // Merr makinen nga ID
    $carData = $car->getCarById($car_id);

    if (!$carData) {
        echo "Makina nuk u gjet.";
        exit;
    }

    // Përshtat objektin Car me të dhënat nga baza e të dhënave
    $car = new Car($conn, $carData['id'], $carData['name'], $carData['description'], $carData['image'], $carData['year'], $carData['price']);
} else {
    echo "ID e makinës nuk është e vlefshme.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_car"])) {
    // Përdorim metodën e klasës për të përditësuar vlerat
    $car->name = $_POST["name"];
    $car->description = $_POST["description"];
    $car->year = $_POST["year"];
    $car->price = $_POST["price"];

    // Përdor emrin aktual të imazhit, përderisa përdoruesi nuk ngarkon një tjetër
    $imageName = $car->image;

    if ($_FILES["image"]["name"]) {
        // Nëse ngarkohet një imazh i ri, përdorim metodën uploadImage
        $imageName = $car->uploadImage($_FILES["image"]);

        // Nëse ngarkohet një imazh i ri, fshi imazhin e vjetër
        if ($imageName && file_exists("uploads/" . $car->image)) {
            unlink("uploads/" . $car->image);
        } else {
            echo "Gabim gjatë ngarkimit të imazhit.";
            exit;
        }
    }

    $car->image = $imageName;

    // Përdorim metodën updateCar për të përditësuar makinën
    if ($car->updateCar()) {
        header("Location: cars.php");
        exit;
    } else {
        echo "Gabim gjatë përditësimit të makinës.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redakto Makina</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<style>
      * {
    margin: 0;
    padding: 0;
}
body {
    min-height: 100vh;
    margin: 0;
    display: flex;
    flex-direction: column;
    background: linear-gradient(
        rgba(0, 0, 0, 0.5),
        rgba(0, 0, 0, 0.5)
    ), url('images/backgroundLogIn.jpg') no-repeat center center fixed;
    background-size: cover;
    color: white;
    padding-top: 100px;
    overflow-x: hidden;
    overflow-y: auto;
}

nav {
    box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.1);
}

nav ul {
    width: 100%;
    list-style: none;
    justify-content: flex-end;
    display: flex;
    align-items: center;
}

nav a {
    height: 100%;
    padding: 0px 60px;
    text-decoration: none;
    display: flex;
    align-items: center;
    color:white;
    font-size: 18px;
}

nav li:first-child {
    margin-right: auto;
}

.slidebar {
    position: fixed;
    top: 0;
    right: 0;
    height: 100vh;
    width: 250px;
    z-index: 999;
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
    display: flex; 
    backdrop-filter: blur(10px);
    flex-direction: column;
    align-items: flex-start;
    justify-content: flex-start;
    font-size: 12px;
    margin-top: 4px;
    
}

.slidebar li {
    width: 100%;
}

.slidebar a {
    width: 100%;
    padding: 10px 30px;
}
@media (max-width: 1200px) {
    
   nav a {
       height: 100%;
       padding: 30px 40px;
       text-decoration: none;
       display: flex;
       align-items: center;
       color: white;
       font-size: 16px;
    }
}
@media (max-width: 1000px) {
    
    nav a {
        height: 100%;
        padding: 30px 40px;
        text-decoration: none;
        display: flex;
        align-items: center;
        color: white;
        font-size: 14px;
     }
 }
@media (max-width: 900px) {
    nav a {
        height: 100%;
        padding: 30px 40px;
        text-decoration: none;
        display: flex;
        align-items: center;
        color: white;
        font-size: 12px;
     }
    
}
@media (max-width: 700px) {
    nav ul {
        justify-content: flex-start; 
    }

    .hideOnMobile {
        display: none; 
    }

    .slidebar {
        width: 250px;
    }
}

.sidebar {
    width: 250px;
   background-color: #555;

    padding: 20px;
    color: white;
    display: flex;
    flex-direction: column;
    align-items: center;
    position: fixed;
    height: 100%;
    left: 0;
    top: 0;
    box-shadow: 4px 0px 10px rgba(0, 0, 0, 0.2);
}

.sidebar h2 {
    text-align: center;
    margin-bottom: 30px;
}

.sidebar ul {
    list-style: none;
    padding: 0px;
    margin-top: 100px;
}

.sidebar ul li {
    margin: 20px 0;
}

.sidebar ul li a {
    color: white;
    text-decoration: none;
    padding: 10px;
    display: block;
    transition: 0.3s;
}

.sidebar ul li a:hover {
    background-color: #555;
    border-radius: 5px;
}
.edit-form {
    border: 1px solid #ddd;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
    border: 1px solid rgba(0, 0, 0, 0.2); 
    width: 100%;
    max-width: 800px;
    margin: 0 auto;
    background: rgba(255, 255, 255, 0.15);
}


form {
    display: grid;
    grid-template-columns: 1fr 1fr; 
    gap: 20px;
    max-width: 100%;
    margin: 0;
}

form label {
    font-weight: bold;
}

form input,
form select,
form textarea {
    width: 100%;
    padding: 10px;  
    border: 1px solid #ccc;
    border-radius: 6px; 
    background: rgba(255, 255, 255, 0.2);
}

form textarea {
    height: 120px; 
    grid-column: span 2; 
}

form button {
    grid-column: span 2;
    background-color: #f0a500; 
    color: white;
    padding: 12px;  
    border: none;
    cursor: pointer;
    font-size: 1.1rem;
    border-radius: 6px;
}

form button:hover {
    background-color: #f1c40f;
}

@media (max-width: 600px) {
    form {
        grid-template-columns: 1fr;
    }
}



    </style>
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
<div class="sidebar">
    <h2>Car Dealership - Admin Panel</h2>
    <ul>
   
    <li><a href="users.php">Menaxho Përdoruesit</a></li>
            <li><a href="cars.php">Menaxho Makinat</a></li>
            <li><a href="manage_contacts.php">Menaxho Mesazhet</a></li>
            <li><a href="add_content.php">Menaxho Përmbajtjen e About Us</a></li>
            <li><a href="manage_news.php">Menaxho News</a></li>
    </ul>
</div>

        <div class="edit-form">
            <h2>Redakto Makina</h2>
            <form action="edit_car.php?id=<?php echo $car->id; ?>" method="post" enctype="multipart/form-data">
                <label for="name">Emri</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($car->name); ?>" required>

                <label for="description">Përshkrimi</label>
                <textarea id="description" name="description" required><?php echo htmlspecialchars($car->description); ?></textarea>

                <label for="year">Viti</label>
                <input type="text" id="year" name="year" value="<?php echo htmlspecialchars($car->year); ?>" required>

                <label for="price">Çmimi</label>
                <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($car->price); ?>" required>

                <label for="image">Imazhi (Lini i hapur për të ngarkuar një tjetër imazh)</label>
                <input type="file" id="image" name="image">

                <button type="submit" name="edit_car">Përditëso</button>
            </form>
        </div>
    </div>
    <script src="dashboard.js"></script>
</body>
</html>
