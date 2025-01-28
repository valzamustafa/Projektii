<?php
class User {
    private $conn;
    private $table_name = 'manage_users'; 

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($first_name, $last_name, $email, $password) {
        $query = "INSERT INTO {$this->table_name} (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt->bind_param('ssss', $first_name, $last_name, $email, $hashed_password);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function login($email, $password) {
        $query = "SELECT first_name, last_name, email, password, role FROM {$this->table_name} WHERE email = ?";
    
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('s', $email); 
    
        $stmt->execute();
        $result = $stmt->get_result();
    
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
              
                session_start();
                $_SESSION['email'] = $row['email'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['last_name'] = $row['last_name'];
    
              
                if (strpos($email, '@admin.com') !== false) {
                    // Përdoruesi është administrator
                    header("Location: dashboard.php");
                    exit;
                } else if (strpos($email, '@gmail.com') !== false) {
                  
                    header("Location: home.php");
                    exit;
                }
            }
        }
        return false;
    }
}    
?>
