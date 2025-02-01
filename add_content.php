<?php
require_once 'db_connection.php';
session_start();

if (!isset($_SESSION['email']) || strpos($_SESSION['email'], '@admin.com') === false) {
    header("Location: MyAccount.php");
    exit;
}

class AboutUsManager {
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db->getConnection();
    }

    public function addContent($content) {
        $stmt = $this->conn->prepare("INSERT INTO about_us (content) VALUES (?)");
        $stmt->bind_param("s", $content);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteContent($content_id) {
        $stmt = $this->conn->prepare("DELETE FROM about_us WHERE id = ?");
        $stmt->bind_param("i", $content_id);
        $stmt->execute();
        $stmt->close();
    }

    public function getAllContent() {
        $result = $this->conn->query("SELECT * FROM about_us");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

$db = new Database();
$aboutUsManager = new AboutUsManager($db);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_content"])) {
    $content = htmlspecialchars($_POST["content"]);
    $aboutUsManager->addContent($content);
    header("Location: add_content.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_content"])) {
    $content_id = $_POST["content_id"];
    $aboutUsManager->deleteContent($content_id);
    header("Location: delete_content.php");
    exit;
}

$contentList = $aboutUsManager->getAllContent();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menaxho Përmbajtjen e "About Us"</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
<nav>
    <ul class="navbar">
        <li><a href="#">Maidon</a></li>
        <li><a href="home.php">Home</a></li>
        <li><a href="AboutUs.php">About Us</a></li>
        <li><a href="ContactUs.php">Contact Us</a></li>
        <li><a href="newsandreviews.php">News and Reviews</a></li>
        <li><a href="MyAccount.php">My Account</a></li>
    </ul>
    <style>
        .add-content-btn {
            background-color: #f0a500;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 400px;
            transition: background-color 0.3s;
            
        }

        .add-content-btn:hover {
            background-color: #f1c40f;
}

        #addContentForm {
            display: none;
            margin-top: 20px;
        }
        .content-table {
    background: rgba(255, 255, 255, 0.15);
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
    width: 80%;
    max-width: 1200px;
    margin: 30px auto;
    border-spacing: 0;
    table-layout: auto;
}

.content-table th, .content-table td {
    padding: 15px;
    text-align: left;
    font-size: 16px;
    word-wrap: break-word;
    color: white;
}

.content-table th {
    background: rgba(255, 255, 255, 0.3);
    color: black;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 17px;
    text-align: center;
}

.content-table tr:nth-child(even) {
    background: rgba(255, 255, 255, 0.1);
}

.content-table tr:hover {
    background: rgba(255, 255, 255, 0.3);
    transition: 0.3s;
}

.content-table td form button {
    background-color: #f0a500;
    color: white;
    border: none;
    padding: 10px 18px;
    cursor: pointer;
    border-radius: 8px;
    transition: all 0.3s ease;
    font-weight: bold;
}

.content-table td form button:hover {
    background-color: #f1c40f;
}

.content-table td form .edit-button {
    background-color: #f0a500;
    padding: 10px 18px;
    color: white;
    border-radius: 8px;
    transition: all 0.3s ease;
    font-weight: bold;
    border: none;
}

.content-table td form .edit-button:hover {
    background-color: #f1c40f;
}

@media (max-width: 900px) {
    .content-table {
        width: 95%;
        overflow-x: auto;
    }

    .content-table th, .content-table td {
        padding: 10px;
        font-size: 14px;
    }
}
.add-content-form {
    display: grid;
    grid-template-columns: 1fr 1fr; 
    gap: 20px;
    max-width: 100%;
    margin: 0;
}

.add-content-form label {
    font-weight: bold;
}

form input,
form select,
form textarea {
    width: 100%;
    padding: 10px; 
    border: 1px solid #ccc;
    border-radius: 6px;
    background: rgba(255, 255, 255, 0.2);
}

.add-content-formtextarea {
    height: 420px;
    grid-column: span 2; 
}

.add-content-form button {
    grid-column: span 2;
    background-color: #f0a500; 
    color: white;
    padding: 12px; 
    border: none;
    cursor: pointer;
    font-size: 1.1rem;
    border-radius: 6px; 
}

form button:hover {
    background-color: #f1c40f;
}


@media (max-width: 600px) {
    form {
        grid-template-columns: 1fr; 
    }
}


    </style>
</nav>

<div class="sidebar">
    <h2>Admin Panel - About Us</h2>
    <ul>
        <li><a href="users.php">Menaxho Përdoruesit</a></li>
        <li><a href="cars.php">Menaxho Makinat</a></li>
        <li><a href="manage_contacts.php">Menaxho Mesazhet</a></li>
        <li><a href="add_content.php">Menaxho Përmbajtjen e About Us</a></li>
        <li><a href="manage_news.php">Menaxho News</a></li>
    </ul>
</div>

<div class="content">
    <h1>Menaxho Përmbajtjen e "About Us"</h1>

    <button id="addContentButton" class="add-content-btn" onclick="showAddContentForm()">Shto Përmbajtje</button>

    <div id="addContentForm" class="add-content-form" style="display: none;">
        <h2>Shto Përmbajtje të Re</h2>
        <form method="POST">
            <textarea name="content" placeholder="Përmbajtja" required></textarea>
            <button type="submit" name="add_content">Shto Përmbajtjen</button>
        </form>
    </div>

    <table class="content-table">
        <tr>
            <th>Përmbajtja</th>
            <th>Veprimi</th>
        </tr>
        <?php foreach ($contentList as $item): ?>
        <tr>
            <td><?= htmlspecialchars($item['content']) ?></td>
            <td>
                <form action="delete_content.php" method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                    <button type="submit">Fshij</button>
                </form>
                <form action="edit_content.php" method="GET" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                    <button type="submit" class="edit-button">Edito</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<script>
    function showAddContentForm() {
        var form = document.getElementById("addContentForm");
        var btn = document.getElementById("addContentButton");
        form.style.display = form.style.display === "none" ? "block" : "none";
        btn.textContent = form.style.display === "none" ? "Shto Përmbajtje" : "Fshih Formën";
    }
</script>

<script src="dashboard.js"></script>
</body>
</html>
