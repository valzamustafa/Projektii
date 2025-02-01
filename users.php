<?php

require_once 'db_connection.php'; 
session_start();

if (!isset($_SESSION['email']) || strpos($_SESSION['email'], '@admin.com') === false) {
    header("Location: MyAccount.php");
    exit;
}


$database = new Database();
$conn = $database->getConnection();


$sql = "SELECT first_name, last_name, email, role FROM manage_users"; 
$result = $conn->query($sql);

if (!$result) {
    die("Error fetching users: " . $conn->error);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <style>
       
.action-btn {
    display: inline-block;
    padding: 8px 16px;
    margin-right: 10px; 
    border-radius: 5px;
    text-decoration: none;
    text-align: center;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.3s ease;
}


.delete-btn {
    background-color: #f0a500; 
    color: white;
}

.delete-btn:hover {
    background-color: #f1c40f;
}



    </style>
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
        <ul class="navbar">
            <li><a href="#">Maidon</a></li>
            <li class="hideOnMobile"><a href="home.php">Home</a></li>
            <li class="hideOnMobile"><a href="AboutUs.php">About Us</a></li>
            <li class="hideOnMobile"><a href="ContactUs.php">Contact Us</a></li>
            <li class="hideOnMobile"><a href="newsandreviews.php">News and Reviews</a></li>
            <li class="hideOnMobile"><a href="MyAccount.php">My Account</a></li>
            <li class="menubutton" onclick="showSidebar()">
                <a href="#">
                    <img src="images/menuwhite.png" alt="Menu" height="24" width="24">
                </a>
            </li>
        </ul>
    </nav>

    
    <div class="sidebar">
        <h2>Car Dealership - Admin Panel</h2>
        <ul>
            <li><a href="users.php">Menaxho Përdoruesit</a></li>
            <li><a href="cars.php">Menaxho Makinat</a></li>
     
            <li><a href="manage_contacts.php">Menaxho Mesazhet</a></li>
        </ul>
    </div>
  
    <div class="content">
        <h1>Menaxho Përdoruesit</h1>
        <table>
            <thead>
                <tr>
                    <th>Emri</th>
                    <th>Mbiemri</th>
                    <th>Email</th>
                    <th>Roli</th>
                    <th>Veprimi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo ucfirst($row['role']); ?></td>
                        <td>
    <a href="delete_user.php?id=<?php echo $row['email']; ?>" class="action-btn delete-btn">Fshi</a>
   
</td>

                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

