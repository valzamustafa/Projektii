<?php
class Database {
    private $host = "localhost";  
    private $db_name = "projektii";  
    private $username = "root";  
    private $password = "";  
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
            if ($this->conn->connect_error) {
                throw new Exception("Lidhja dështoi: " . $this->conn->connect_error);
            }
        } catch (Exception $e) {
            die("Gabim gjatë lidhjes me databazën: " . $e->getMessage());
        }
        return $this->conn;
    }

    public function closeConnection() {
        $this->conn->close();
    }
}

?>
