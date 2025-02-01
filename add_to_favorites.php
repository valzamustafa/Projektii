<?php
session_start();
require_once 'db_connection.php';
require_once 'Favorite.php';

if (isset($_SESSION['user_id'])) {
    $db = new Database();
    $conn = $db->getConnection();

    $favorite = new Favorite($_SESSION['user_id'], $_POST['car_id'], $conn);

    if ($favorite->addToFavorites()) {
        echo "Car added to favorites!";
    } else {
        echo "Error adding car to favorites.";
    }

    $db->closeConnection();
} else {
    echo "Please log in first.";
}
?>