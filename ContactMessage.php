<?php
class ContactMessage {
    private $conn;
    private $table = 'contact_messages';

    public function __construct($db) {
        $this->conn = $db;
    }

 
    public function sendMessage($name, $email, $message) {
        
        $query = "INSERT INTO " . $this->table . " (name, email, message) VALUES (?, ?, ?)";

       
        $stmt = $this->conn->prepare($query);

        if ($stmt === false) {
           
            die('MySQL prepare failed: ' . $this->conn->error);
        }

        $stmt->bind_param("sss", $name, $email, $message);

      
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

   
    public function getMessages() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>
