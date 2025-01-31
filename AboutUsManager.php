<?php
require_once 'db_connection.php';

class AboutUsManager {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

   
    public function saveContentToDatabase( $content) {
        $conn = $this->db->getConnection();

        $stmt = $conn->prepare("INSERT INTO about_us (content) VALUES (?, ?)");
        $stmt->bind_param("ss",  $content);

        
        if ($stmt->execute()) {
            echo "Përmbajtja u shtua me sukses!";
        } else {
            echo "Gabim gjatë shtimit të përmbajtjes: " . $stmt->error;
        }

        $this->db->closeConnection();
    }

  
    public function renderAddForm() {
        echo '
        <h2>Shto Përmbajtje të Re</h2>
        <form action="" method="POST">
            <label for="content">Përmbajtja:</label>
            <textarea id="content" name="content" rows="4" required></textarea>
            <input type="submit" value="Shto">
        </form>';

        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          
            $content = htmlspecialchars($_POST['content']); 
            $this->saveContentToDatabase( $content);
        }
    }
}

$aboutUsManager = new AboutUsManager();
$aboutUsManager->renderAddForm();
?>
