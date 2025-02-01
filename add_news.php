<?php
session_start();
require_once 'db_connection.php';

class NewsManager {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

   
    public function addNews($title, $content, $image, $category) {
       
        $imageName = time() . '-' . basename($image['name']);
        $targetDir = "uploads/";
        $targetFile = $targetDir . $imageName;

       
        if (move_uploaded_file($image['tmp_name'], $targetFile)) {
        
            $stmt = $this->conn->prepare("INSERT INTO news (title, content, image, category) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $title, $content, $imageName, $category);
            return $stmt->execute();
        } else {
            return false;
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $image = $_FILES['image'];

 
    if (empty($title) || empty($content) || empty($category) || empty($image)) {
        echo "All fields are required.";
    } else {
     
        $database = new Database();
        $conn = $database->getConnection();
        $newsManager = new NewsManager($conn);
        
        if ($newsManager->addNews($title, $content, $image, $category)) {
            echo "News added successfully!";
        } else {
            echo "Failed to upload news. Please try again.";
        }

     
        $database->closeConnection();
    }
} else {
    echo "Invalid request method.";
}
?>
