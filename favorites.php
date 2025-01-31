<?php
session_start();
$conn = new mysqli("localhost", "root", "", "projektii");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['car_id'])) {
    $car_id = $_POST['car_id'];
    $user_id = $_SESSION['user_id']; 

    $stmt = $conn->prepare("INSERT INTO favorites (user_id, car_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $user_id, $car_id);

    if ($stmt->execute()) {
        echo "Car added to favorites!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
