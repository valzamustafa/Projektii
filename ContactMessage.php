<?php
class ContactMessage {
    private $conn;
    private $table = 'contact_messages';

    public function __construct($db) {
        $this->conn = $db;
    }

    // Method to insert a message (using MySQLi)
    public function sendMessage($name, $email, $message) {
        // MySQLi insert query
        $query = "INSERT INTO " . $this->table . " (name, email, message) VALUES (?, ?, ?)";

        // Prepare the query
        $stmt = $this->conn->prepare($query);

        if ($stmt === false) {
            // Check if preparation failed
            die('MySQL prepare failed: ' . $this->conn->error);
        }

        // Bind the parameters
        $stmt->bind_param("sss", $name, $email, $message);

        // Execute the query
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Method to get all messages (using MySQLi)
    public function getMessages() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>
