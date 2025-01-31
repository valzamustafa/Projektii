<?php
require_once 'db_connection.php';
session_start();


if (!isset($_SESSION['email']) || strpos($_SESSION['email'], '@admin.com') === false) {
    header("Location: MyAccount.php");
    exit;
}


$db = new Database();
$conn = $db->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_content"])) {
    $content = htmlspecialchars($_POST["content"]);

    $stmt = $conn->prepare("INSERT INTO about_us (content) VALUES (?)");
    $stmt->bind_param("s", $content);
    $stmt->execute();
    $stmt->close();

    header("Location: add_content.php");
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_content"])) {
    $content_id = $_POST["content_id"];

    $stmt = $conn->prepare("DELETE FROM about_us WHERE id = ?");
    $stmt->bind_param("i", $content_id);
    $stmt->execute();
    $stmt->close();

    header("Location: delete_content.php");
    exit;
}

$result = $conn->query("SELECT * FROM about_us");
$content = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menaxho Përmbajtjen e "About Us"</title>
    <link rel="stylesheet" href="dashboard.css">
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
    background-color: #e74c3c;
    color: white;
    border: none;
    padding: 10px 18px;
    cursor: pointer;
    border-radius: 8px;
    transition: all 0.3s ease;
    font-weight: bold;
}

.content-table td form button:hover {
    background-color: #c0392b;
}

.content-table td form .edit-button {
    background-color: #27ae60;
    padding: 10px 18px;
    color: white;
    border-radius: 8px;
    transition: all 0.3s ease;
    font-weight: bold;
    border: none;
}

.content-table td form .edit-button:hover {
    background-color: #219150;
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


    </style>
    <script>
        function showAddContentForm() {
            var form = document.getElementById("addContentForm");
            var btn = document.getElementById("addContentButton");

            if (form.style.display === "none") {
                form.style.display = "block";
                btn.textContent = "Fshih Formën";
            } else {
                form.style.display = "none";
                btn.textContent = "Shto Përmbajtje";
            }
        }
    </script>
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

    <div id="addContentForm">
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
        <?php foreach ($content as $item): ?>
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

<script src="dashboard.js"></script>
</body>
</html>
