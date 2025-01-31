<?php
require_once 'db_connection.php';

class AboutUsManager {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function deleteContent($id) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("DELETE FROM about_us WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {

            header("Location:add_content.php"); 
            exit;
        } else {
            echo "Gabim gjatë fshirjes së përmbajtjes: " . $stmt->error;
        }

        $this->db->closeConnection();
    }
}


if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    $id = $_POST['id'];
    $aboutUsManager = new AboutUsManager();
    $aboutUsManager->deleteContent($id);
} else {
    echo "Gabim: Parametri ID është i munguar ose jo i vlefshëm!";
}
?>