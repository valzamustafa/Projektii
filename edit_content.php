<?php
require_once 'db_connection.php';
session_start();


if (!isset($_SESSION['email']) || strpos($_SESSION['email'], '@admin.com') === false) {
    header("Location: MyAccount.php");
    exit;
}

$db = new Database();
$conn = $db->getConnection();


if (isset($_GET['id'])) {
    $content_id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM about_us WHERE id = ?");
    $stmt->bind_param("i", $content_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $content = $result->fetch_assoc();
    $stmt->close();

    if (!$content) {
        echo "⚠️ Përmbajtja nuk u gjet.";
        exit;
    }
} else {
    echo "⚠️ ID e përmbajtjes nuk është e vlefshme.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_content"])) {
    $content_text = trim(htmlspecialchars($_POST["content"]));

    if (!empty($content_text)) {
        $stmt = $conn->prepare("UPDATE about_us SET  content = ? WHERE id = ?");
        $stmt->bind_param("ssi",  $content_text, $content_id);
        $stmt->execute();
        $stmt->close();

        header("Location: add_content.php"); 
        exit;
    } else {
        echo "⚠️ Përmbajtja nuk mund të jenë bosh!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edito Përmbajtjen - About Us</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
<div class="sidebar">
    <h2>Admin Panel</h2>
    <ul>
        <li><a href="users.php">Menaxho Përdoruesit</a></li>
        <li><a href="about_us.php">Menaxho About Us</a></li>
        <li><a href="manage_contacts.php">Menaxho Mesazhet</a></li>
        <li><a href="add_content.php">Menaxho Përmbajtjen e About Us</a></li>
    </ul>
</div>

<div class="content">
    <h1>Edito Përmbajtjen</h1>
    
    <form method="POST">
      
        <label for="content">Përmbajtja:</label>
        <textarea id="content" name="content" rows="4" required><?= htmlspecialchars($content['content']) ?></textarea>

        <button type="submit" name="edit_content">Përditëso Përmbajtjen</button>
    </form>
</div>

<script src="dashboard.js"></script>
</body>
</html>
