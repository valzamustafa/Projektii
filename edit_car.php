<?php
require_once 'db_connection.php';
session_start();


if (!isset($_SESSION['email']) || strpos($_SESSION['email'], '@admin.com') === false) {
    header("Location: MyAccount.php");
    exit;
}


$db = new Database();
$conn = $db->getConnection();


if (isset($_GET['id'])) {
    $car_id = $_GET['id'];
   
    $stmt = $conn->prepare("SELECT * FROM cars WHERE id = ?");
    $stmt->bind_param("i", $car_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $car = $result->fetch_assoc();
    $stmt->close();


    if (!$car) {
        echo "Makina nuk u gjet.";
        exit;
    }
} else {
    echo "ID e makinës nuk është e vlefshme.";
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_car"])) {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $year = $_POST["year"];
    $price = $_POST["price"];

 
    $imageName = $car['image']; 

    if ($_FILES["image"]["name"]) {
        $targetDir = "uploads/";

       
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $imageName = time() . "_" . basename($_FILES["image"]["name"]);
        $targetFile = $targetDir . $imageName;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            
            if (file_exists("uploads/" . $car['image'])) {
                unlink("uploads/" . $car['image']);
            }
        } else {
            echo "Gabim gjatë ngarkimit të imazhit.";
            exit;
        }
    }

    
    $stmt = $conn->prepare("UPDATE cars SET name = ?, description = ?, image = ?, year = ?, price = ? WHERE id = ?");
    $stmt->bind_param("sssiii", $name, $description, $imageName, $year, $price, $car_id);
    $stmt->execute();
    $stmt->close();

    header("Location: cars.php");
    exit;
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
<body>
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
    <h1>Edito Makina</h1>
    
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Emri i makinës" value="<?= htmlspecialchars($car['name']) ?>" required>
        <textarea name="description" placeholder="Përshkrimi" required><?= htmlspecialchars($car['description']) ?></textarea>
        <input type="file" name="image" accept="image/*">
        <input type="number" name="year" placeholder="Viti" value="<?= htmlspecialchars($car['year']) ?>" required>
        <input type="number" name="price" placeholder="Çmimi (€)" value="<?= htmlspecialchars($car['price']) ?>" required>
        <button type="submit" name="edit_car">Përditëso Makinën</button>
    </form>
</div>

<script src="dashboard.js"></script>
</body>
</html>
