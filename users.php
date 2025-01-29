<?php
// Përfshirja e klasës që lidh me databazën
require_once 'db_connection.php'; 
session_start();

if (!isset($_SESSION['email']) || strpos($_SESSION['email'], '@admin.com') === false) {
    header("Location: MyAccount.php"); // Redirect if not admin
    exit;
}

// Krijo instancën e klasës Database
$database = new Database();
$conn = $database->getConnection();

// Fetch users from the database
$sql = "SELECT first_name, last_name, email, role FROM manage_users";  // Emri i tabelës është manage_users
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
    <div class="content">
        <h1>Menaxho Përdoruesit</h1>
        <table>
            <thead>
                <tr>
                    <th>Emri</th>
                    <th>Mbiemri</th>
                    <th>Email</th>
                    <th>Roli</th>
                    <th>Akcija</th>
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
    <a href="delete_user.php?id=<?php echo $row['email']; ?>" class="delete-btn">Fshi</a>
</td>

                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

