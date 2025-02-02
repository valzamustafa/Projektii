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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);
    $year = filter_var($_POST['year'], FILTER_VALIDATE_INT);
    $price = filter_var($_POST['price'], FILTER_VALIDATE_INT);

    if ($year && $price && isset($_FILES["image"])) {
        $car = new Car($conn);


        $imageName = $car->uploadImage($_FILES["image"]);

        if ($imageName) {
           
            if ($car->addCar($name, $description, $year, $price, $imageName)) {
                header("Location: cars.php");
                exit;
            } else {
                echo "Gabim gjatë ruajtjes së makinës.";
            }
        } else {
            echo "Gabim gjatë ngarkimit të imazhit.";
        }
    } else {
        echo "Të dhënat nuk janë të sakta!";
    }
}

$db->closeConnection();
?>