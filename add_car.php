<?php
require_once 'db_connection.php';
require_once 'Car.php'; 


$db = new Database();
$conn = $db->getConnection();

$name = $_POST['name'];
$year = $_POST['year'];
$image = file_get_contents($_FILES['image']['tmp_name']); 

$car = new Car($conn, $name, $year, $image);


if ($car->save()) {
    header("Location: dashboard.php"); 
} else {
    echo "Error: Ndodhi një problem gjatë ruajtjes së makinës.";
}


$db->closeConnection();
?>