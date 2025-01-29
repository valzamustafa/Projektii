<?php
require_once 'db_connection.php'; 
session_start();

if (!isset($_SESSION['email']) || strpos($_SESSION['email'], '@admin.com') === false) {
    header("Location: MyAccount.php"); // Redirect if not admin
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
<nav>
        <ul class="slidebar" style="display: none;">
            <li onclick="hideSideBar()">
                <a href="#">
                    <img src="images/close_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="Close Sidebar" height="24" width="24">
                </a>
            </li>
            <li><a href="home.php">Home</a></li>
            <li><a href="AboutUs.php">About Us</a></li>
            <li><a href="ContactUs.php">Contact Us</a></li>
            <li><a href="newsandreviews.php">News and Reviews</a></li>
            <li><a href="MyAccount.php">My Account</a></li>
            <li><a href="Register.php">Sign Up</a></li>
            <li><a href="LogIn.php">Log In</a></li>
            <li><a href="MyFavorites.php">My Favorites</a></li>
            <hr>
    
        </ul>  
    

    </nav>


    
    <div class="sidebar">
        <h2>Car Dealership - Admin Panel</h2>
        <ul>
            <li><a href="users.php">Menaxho Përdoruesit</a></li>
            <li><a href="cars.php">Menaxho Makinat</a></li>
            <li><a href="news.php">Menaxho Lajmet</a></li>
            <li><a href="messages.php">Menaxho Mesazhet</a></li>
        </ul>
    </div>
    <div class="content">
        <h1>Mirësevini në Dashboard</h1>
        <p>Këtu mund të menaxhoni përdoruesit, makinat, lajmet dhe mesazhet.</p>
    </div>
    <script src="dashboard.js"></script>
</body>
</html>