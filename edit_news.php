<?php
include('db_connection.php');

class News {
    private $conn;


    public function __construct($database) {
        $this->conn = $database->getConnection();
    }


    public function getNewsById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM news WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

   
    public function updateNews($id, $title, $content, $category, $position, $created_at, $link, $image = null) {
     
        $imageQuery = "";
        $params = [];
        
 
        if ($image) {
            $imageQuery = ", image = ?";
            $params[] = $image;
        }

        $stmt = $this->conn->prepare("UPDATE news SET title = ?, content = ?, category = ?, position = ?, created_at = ?, link = ? $imageQuery WHERE id = ?");
    
      
        $params = array_merge([$title, $content, $category, $position, $created_at, $link, $id], $params);
        
       
        $types = str_repeat('s', count($params) - 1) . 'i'; 
    
        $stmt->bind_param($types, ...$params);

        $stmt->execute();
        return true;
    }
    
    

    public function uploadImage($file) {
        $target = "uploads/" . basename($file['name']);
        if (move_uploaded_file($file['tmp_name'], $target)) {
            return $file['name'];
        }
        return null;
    }
}

$database = new Database();
$news = new News($database);


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $newsItem = $news->getNewsById($id);
}

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $position = $_POST['position'];
    $created_at = $_POST['created_at'];
    $link = $_POST['link'];

    $image = null;
    if ($_FILES['image']['name'] != "") {
        $image = $news->uploadImage($_FILES['image']);
    }

    $news->updateNews($id, $title, $content, $category, $position, $created_at, $link, $image);
    echo "News updated successfully!";
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
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

        form button:hover {
            background-color: #45a049;
        }

        @media (max-width: 600px) {
            form {
                grid-template-columns: 1fr; 
            }
        }
    </style>

    <h2>Edit News</h2>

    <form action="edit_news.php?id=<?php echo $newsItem['id']; ?>" method="POST" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo $newsItem['title']; ?>" required>

        <label for="content">Content:</label>
        <textarea id="content" name="content" required><?php echo $newsItem['content']; ?></textarea>

        <label for="category">Category:</label>
        <input type="text" id="category" name="category" value="<?php echo $newsItem['category']; ?>" required>

        <label for="position">Position:</label>
        <select id="position" name="position" required>
            <option value="slider" <?php if ($newsItem['position'] == 'slider') echo 'selected'; ?>>Slider</option>
            <option value="latestnews" <?php if ($newsItem['position'] == 'latestnews') echo 'selected'; ?>>Latest News</option>
            <option value="others" <?php if ($newsItem['position'] == 'others') echo 'selected'; ?>>Others</option>
        </select>

        <label for="image">Image (Leave empty to keep current image):</label>
        <input type="file" id="image" name="image" accept="image/*">

        <label for="created_at">Date Created:</label>
        <input type="date" id="created_at" name="created_at" value="<?php echo $newsItem['created_at']; ?>" required>

        <label for="link">News Link (Optional):</label>
        <input type="text" id="link" name="link" value="<?php echo $newsItem['link']; ?>">

        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
