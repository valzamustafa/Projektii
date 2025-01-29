<?php
require_once 'db_connection.php'; // Përfshin klasën për lidhjen me bazën e të dhënave

session_start();

// Kontrollo që përdoruesi të jetë admin
if (!isset($_SESSION['email']) || strpos($_SESSION['email'], '@admin.com') === false) {
    header("Location: MyAccount.php"); // Redirect if not admin
    exit;
}

// Kontrollo nëse id e përdoruesit (email) është dërguar
if (isset($_GET['id'])) {
    $email = $_GET['id'];

    // Krijo instancën e klasës Database dhe lidhje me bazën e të dhënave
    $database = new Database();
    $conn = $database->getConnection();

    // Query për fshirjen e përdoruesit nga tabela
    $sql = "DELETE FROM manage_users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email); // Parametri për email është string

    // Ekzekutoje query-n dhe kontrollo nëse është fshirë me sukses
    if ($stmt->execute()) {
        echo "Përdoruesi është fshirë me sukses.";
    } else {
        echo "Ka ndodhur një gabim gjatë fshirjes.";
    }

    // Mbyll lidhjen me bazën e të dhënave
    $stmt->close();
    $conn->close();

    // Redirigjo pas fshirjes
    header("Location: users.php");
    exit;
} else {
    echo "Nuk është dhënë një ID për fshirje.";
}
?>
