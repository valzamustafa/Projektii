<?php
session_start();
if (!isset($_SESSION['favorites'])) {
    $_SESSION['favorites'] = [];
}


if (isset($_POST['car_id'])) {
    $car_id = $_POST['car_id'];


    if (!in_array($car_id, $_SESSION['favorites'])) {
        $_SESSION['favorites'][] = $car_id;
        echo "Makina u shtua në të preferuarat!";
    } else {
        echo "Makina tashmë është në të preferuarat!";
    }
}
?>