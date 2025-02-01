<?php
require_once 'db_connection.php';
session_start();

if (!isset($_SESSION['email']) || strpos($_SESSION['email'], '@admin.com') === false) {
    header("Location: MyAccount.php");
    exit;
}

class AboutUs {
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db->getConnection();
    }

    public function getContentById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM about_us WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_assoc();
    }

    public function updateContent($id, $content)
    {
        $stmt = $this->conn->prepare("UPDATE about_us SET content = ? WHERE id = ?");
        $stmt->bind_param("si", $content, $id);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }
}

$db = new Database();
$aboutUs = new AboutUs($db);

if (isset($_GET['id'])) {
    $content_id = intval($_GET['id']);
    $content = $aboutUs->getContentById($content_id);
    if (!$content) {
        echo "⚠️ Përmbajtja nuk u gjet.";
        exit;
    }
} else {
    echo "⚠️ ID e përmbajtjes nuk është e vlefshme.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_content"])) {
    $content_text = trim($_POST["content"]);
    if (!empty($content_text)) {
        if ($aboutUs->updateContent($content_id, $content_text)) {
            header("Location: add_content.php");
            exit;
        } else {
            echo "⚠️ Ndodhi një gabim gjatë përditësimit!";
        }
    } else {
        echo "⚠️ Përmbajtja nuk mund të jetë bosh!";
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
    <style>
          .content {
    display: grid;
    grid-template-columns: 1fr 1fr; 
    gap: 20px;
    max-width: 100%;
    margin: 0;
}

.content label {
    font-weight: bold;
    
}

.content input,
.content select,
.content textarea {
    width: 100%;
    padding: 10px; 
    border: 1px solid #ccc;
    border-radius: 6px;
    background: rgba(255, 255, 255, 0.2);
}

.content textarea {
    height: 420px;
    grid-column: span 2; 
}

.content button {
    grid-column: span 2;
    background-color: #f0a500; 
    color: white;
    padding: 12px; 
    border: none;
    cursor: pointer;
    font-size: 1.1rem;
    border-radius: 6px; 
}




@media (max-width: 600px) {
   .content {
        grid-template-columns: 1fr; 
    }
}
    </style>
  <nav>
        <ul class="slidebar" style="display: none;">
            <li onclick="hideSideBar()">
                <a href="#"><img src="images/close_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.png" alt="Close Sidebar" height="24" width="24"></a>
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
                <a href="#"><img src="images/menuwhite.png" alt="Menu" height="24" width="24"></a>
            </li>
        </ul>  
    </nav>

    <div class="sidebar">
        <h2>Car Dealership - Admin Panel</h2>
        <ul>

            <li><a href="users.php">Menaxho Përdoruesit</a></li>
            <li><a href="cars.php">Menaxho Makinat</a></li>
            <li><a href="manage_contacts.php">Menaxho Mesazhet</a></li>
            <li><a href="add_content.php">Menaxho Përmbajtjen e About Us</a></li>
            <li><a href="manage_news.php">Menaxho News</a></li>
        </ul>
    </div>
<div class="content">
    <h1>......................Edito Përmbajtjen</h1>
    <form method="POST">
        <label for="content">Përmbajtja:</label>
        <textarea id="content" name="content" rows="4" required><?= htmlspecialchars($content['content']) ?></textarea>
        <button type="submit" name="edit_content">Përditëso Përmbajtjen</button>
    </form>
</div>

<script src="dashboard.js"></script>
</body>
</html>