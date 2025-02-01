<?php
require_once 'db_connection.php';
require_once 'User.php';
session_start();

if (!isset($_SESSION['email']) || strpos($_SESSION['email'], '@admin.com') === false) {
    header("Location: MyAccount.php");
    exit;
}

if (isset($_GET['id'])) {
    $email = $_GET['id'];

    
    $database = new Database();
    $conn = $database->getConnection();
    $user = new User($conn);

   
    if ($user->deleteUser($email)) {
        echo "Përdoruesi është fshirë me sukses.";
    } else {
        echo "Ka ndodhur një gabim gjatë fshirjes.";
    }

    $conn->close();

   
    header("Location: users.php");
    exit;
} else {
    echo "Nuk është dhënë një ID për fshirje.";
}
?>
