<?php
require_once 'db_connection.php';
session_start();


if (!isset($_SESSION['email']) || strpos($_SESSION['email'], '@admin.com') === false) {
    header("Location: MyAccount.php");
    exit;
}


$db = new Database();
$conn = $db->getConnection();


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_car"])) {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $year = $_POST["year"];
    $price = $_POST["price"];

  
    $targetDir = "uploads/";
    
    
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $imageName = time() . "_" . basename($_FILES["image"]["name"]);
    $targetFile = $targetDir . $imageName;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        $stmt = $conn->prepare("INSERT INTO cars (name, description, image, year, price) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssii", $name, $description, $imageName, $year, $price);
        $stmt->execute();
        $stmt->close();
        
        header("Location: cars.php");
        exit;
    } else {
        echo "Gabim gjatë ngarkimit të imazhit.";
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_car"])) {
    $car_id = $_POST["car_id"];

    
    $stmt = $conn->prepare("SELECT image FROM cars WHERE id = ?");
    $stmt->bind_param("i", $car_id);
    $stmt->execute();
    $stmt->bind_result($image);
    $stmt->fetch();
    $stmt->close();

    if ($image && file_exists("uploads/" . $image)) {
        unlink("uploads/" . $image);
    }

    $stmt = $conn->prepare("DELETE FROM cars WHERE id = ?");
    $stmt->bind_param("i", $car_id);
    $stmt->execute();
    $stmt->close();

    header("Location: cars.php");
    exit;
}

$result = $conn->query("SELECT * FROM cars");
$cars = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menaxho Makinat</title>
    <link rel="stylesheet" href="dashboard.css">
    <style>
       
        .add-car-btn {
            background-color:#f0a500;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .add-car-btn:hover {
            background-color:#f1c40f;
        }

        
        #addCarForm {
            display: none;
            margin-top: 20px;
        }
    </style>
    <script>
        
        function showAddCarForm() {
            var form = document.getElementById("addCarForm");
            var btn = document.getElementById("addCarButton");

            
            if (form.style.display === "none") {
                form.style.display = "block";
                btn.textContent = "Fshih Formën";
            } else {
                form.style.display = "none";
                btn.textContent = "Shto Makinë";
            }
        }
    </script>
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

<div class="content">
    <h1>Menaxho Makinat</h1>

   
    <button id="addCarButton" class="add-car-btn" onclick="showAddCarForm()">Shto Makinë</button>

 
    <div id="addCarForm">
        <h2>Shto Makinë të Re</h2>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Emri i makinës" required>
            <textarea name="description" placeholder="Përshkrimi" required></textarea>
            <input type="file" name="image" accept="image/*" required>
            <input type="number" name="year" placeholder="Viti" required>
            <input type="number" name="price" placeholder="Çmimi (€)" required>
            <button type="submit" name="add_car">Shto Makinën</button>
        </form>
    </div>

    <h2>Lista e Makinave</h2>
    <table class="cars" border="1">
        <tr>
            <th>Emri</th>
            <th>Përshkrimi</th>
            <th>Viti</th>
            <th>Çmimi (€)</th>
            <th>Imazhi</th>
            <th>Veprimi</th>
        </tr>
        <?php foreach ($cars as $car): ?>
        <tr>
            <td><?= htmlspecialchars($car['name']) ?></td>
            <td><?= htmlspecialchars($car['description']) ?></td>
            <td><?= htmlspecialchars($car['year']) ?></td>
            <td><?= number_format($car['price'], 2) ?>€</td>
            <td><img src="uploads/<?= htmlspecialchars($car['image']) ?>" width="100"></td>
            <td>
                <form method="POST">
                    <input type="hidden" name="car_id" value="<?= $car['id'] ?>">
                    <button type="submit" name="delete_car">Fshij</button>
                </form>
                <a href="edit_car.php?id=<?= $car['id'] ?>">Edito</a>

            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<script src="dashboard.js"></script>
</body>
</html>
