<?php
class News {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function addNews($title, $content, $category, $position, $created_at, $image, $link) {
        $target = "uploads/" . basename($image);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $stmt = $this->conn->prepare("INSERT INTO news (title, content, category, position, created_at, image, link) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $title, $content, $category, $position, $created_at, $image, $link);
            $stmt->execute();
            return "News added successfully!";
        } else {
            return "Failed to upload image.";
        }
    }

    public function deleteNews($id) {
        $stmt = $this->conn->prepare("DELETE FROM news WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return "News deleted successfully!";
    }

    public function getAllNews() {
        return $this->conn->query("SELECT * FROM news ORDER BY created_at DESC");
    }
}



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_news"])) {
    $content_id = $_POST["news_id"];

    $stmt = $conn->prepare("DELETE FROM news WHERE id = ?");
    $stmt->bind_param("i", $content_id);
    $stmt->execute();
    $stmt->close();

    header("Location: delete_.php");
    exit;
}
// Include the database connection file
include('db_connection.php');
$database = new Database();
$conn = $database->getConnection();

// Initialize the NewsManager class
$newsManager = new News($conn);

// Add News functionality
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $position = $_POST['position'];
    $created_at = $_POST['created_at'];
    $link = $_POST['link'];
    $image = $_FILES['image']['name'];

    $message = $newsManager->addNews($title, $content, $category, $position, $created_at, $image, $link);
    echo $message;
}

// Delete News functionality
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $message = $newsManager->deleteNews($id);
    echo $message;
}

// Get all news
$result = $newsManager->getAllNews();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="dashboard.css">
    <title>Manage News</title>
</head>
<body>
    
    <style>
   table {
            width: 100%;
            max-width: 800px;
            border-collapse: collapse;
            margin: 20px auto;
            font-size: 14px;
        }

        form {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            max-width: 800px;
            margin: 20px auto;
        }

        form label {
            grid-column: span 2;
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

        textarea {
            height: 100px;
            grid-column: span 2;
        }

        form button {
            grid-column: span 2;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

        form button:hover {
            background-color: #45a049;
        }

        th, td {
            padding: 6px 8px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        td img {
            width: 60px;
            height: auto;
        }

        @media (max-width: 600px) {
            form {
                grid-template-columns: 1fr;
            }

            table {
                font-size: 12px;
            }

            td, th {
                padding: 4px;
            }

            td img {
                width: 40px;
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


    <h2>Manage News</h2>

    <form action="manage_news.php" method="POST" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>

        <label for="content">Content:</label>
        <textarea id="content" name="content" required></textarea>

        <label for="category">Category:</label>
        <input type="text" id="category" name="category" required>

        <label for="position">Position:</label>
        <select id="position" name="position" required>
            <option value="slider">Slider</option>
            <option value="latestnews">Latest News</option>
            <option value="others">Others</option>
        </select>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image" accept="image/*" required>

        <label for="created_at">Date Created:</label>
        <input type="date" id="created_at" name="created_at" value="<?php echo date('Y-m-d'); ?>" required>

        <label for="link">News Link (Optional):</label>
        <input type="text" id="link" name="link">

        <button type="submit" name="submit">Submit</button>
    </form>

    <hr>

    <h2>Existing News</h2>
    <table border="1">
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Category</th>
            <th>Position</th>
            <th>Image</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo substr($row['content'], 0, 50) . '...'; ?></td>
                <td><?php echo $row['category']; ?></td>
                <td><?php echo $row['position']; ?></td>
                <td><img src="uploads/<?php echo $row['image']; ?>" width="100"></td>
                <td><?php echo $row['created_at']; ?></td>
                <td>
                    <a href="manage_news.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    <form action="edit_news.php" method="GET" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <button type="submit" class="edit-button">Edit</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
