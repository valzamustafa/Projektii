<?php
session_start();

class FavoriteCars {
    public function __construct() {
        if (!isset($_SESSION['favorites'])) {
            $_SESSION['favorites'] = [];
        }
    }

    public function addToFavorites($car_id) {
        if (!in_array($car_id, $_SESSION['favorites'])) {
            $_SESSION['favorites'][] = $car_id;
            echo "Makina u shtua në të preferuarat!";
        } else {
            echo "Makina tashmë është në të preferuarat!";
        }
    }
}


$favorites = new FavoriteCars();

if (isset($_POST['car_id'])) {
    $favorites->addToFavorites($_POST['car_id']);
}
?>
