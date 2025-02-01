<?php
include('db_connection.php');
$database = new Database();
$conn = $database->getConnection();

class News {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getNewsById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM news WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateNews($id, $title, $content, $category, $position, $created_at, $image, $link) {
        if (!empty($image)) {
            $target = "uploads/" . basename($image);
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
            $stmt = $this->conn->prepare("UPDATE news SET title=?, content=?, category=?, position=?, created_at=?, image=?, link=? WHERE id=?");
            $stmt->bind_param("sssssssi", $title, $content, $category, $position, $created_at, $image, $link, $id);
        } else {
            $stmt = $this->conn->prepare("UPDATE news SET title=?, content=?, category=?, position=?, created_at=?, link=? WHERE id=?");
            $stmt->bind_param("ssssssi", $title, $content, $category, $position, $created_at, $link, $id);
        }
        return $stmt->execute();
    }
}

$newsManager = new News($conn);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $news = $newsManager->getNewsById($id);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $position = $_POST['position'];
    $created_at = $_POST['created_at'];
    $link = $_POST['link'];
    $image = !empty($_FILES['image']['name']) ? $_FILES['image']['name'] : null;
    
    if ($newsManager->updateNews($id, $title, $content, $category, $position, $created_at, $image, $link)) {
        echo "News updated successfully!";
        header("Location: manage_news.php");
        exit();
    } else {
        echo "Failed to update news.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <title>Edit News</title>
</head>
<style>
        form {
            display: grid;
            grid-template-columns: 1fr 1fr; 
            gap: 20px;
            max-width: 800px;
            margin: 20px auto;
        }

        form label {
            font-weight: bold;
        }

        form input,
        form select,
        form textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form textarea {
            height: 100px;
            grid-column: span 2; 
        }

        form button {
            grid-column: span 2;
            background-color: #f0a500; 
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
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
    </nav>'
<body>
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

    <h2>Edit News</h2>
    <form action="edit_news.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $news['id']; ?>">
        
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo $news['title']; ?>" required>
        
        <label for="content">Content:</label>
        <textarea id="content" name="content" required><?php echo $news['content']; ?></textarea>
        
        <label for="category">Category:</label>
        <input type="text" id="category" name="category" value="<?php echo $news['category']; ?>" required>
        
        <label for="position">Position:</label>
        <select id="position" name="position" required>
            <option value="slider" <?php echo ($news['position'] == 'slider') ? 'selected' : ''; ?>>Slider</option>
            <option value="latestnews" <?php echo ($news['position'] == 'latestnews') ? 'selected' : ''; ?>>Latest News</option>
            <option value="others" <?php echo ($news['position'] == 'others') ? 'selected' : ''; ?>>Others</option>
        </select>
        
        <label for="image">Current Image:</label>
        <img src="uploads/<?php echo $news['image']; ?>" width="100">
        
        <label for="image">Change Image:</label>
        <input type="file" id="image" name="image" accept="image/*">
        
        <label for="created_at">Date Created:</label>
        <input type="date" id="created_at" name="created_at" value="<?php echo $news['created_at']; ?>" required>
        
        <label for="link">News Link (Optional):</label>
        <input type="text" id="link" name="link" value="<?php echo $news['link']; ?>">
        
        <button type="submit">Update</button>
    </form>
    <script src="dashboard.js"></script>
</body>
</html>