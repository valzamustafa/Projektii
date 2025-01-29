<?php
require_once 'db_connection.php'; 
session_start();

if (!isset($_SESSION['email']) || strpos($_SESSION['email'], '@admin.com') === false) {
    header("Location: MyAccount.php"); 
    exit;
}


if (isset($_GET['id'])) {
    $email = $_GET['id'];

    
    $database = new Database();
    $conn = $database->getConnection();


    $sql = "DELETE FROM manage_users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email); 

    
    if ($stmt->execute()) {
        echo "Përdoruesi është fshirë me sukses.";
    } else {
        echo "Ka ndodhur një gabim gjatë fshirjes.";
    }

   
    $stmt->close();
    $conn->close();

   
    header("Location: users.php");
    exit;
} else {
    echo "Nuk është dhënë një ID për fshirje.";
}
?>
