<?php
require_once 'db_connection.php';

class User {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    public function register($firstName, $lastName, $email, $birthdate, $password, $role) {
       
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        
        $sql = "INSERT INTO manage_users (first_name, last_name, email, birthdate, password, role) 
                VALUES (?, ?, ?, ?, ?, ?);";
    
      
        $stmt = $this->conn->prepare($sql);
        if ($stmt) {
            
            $stmt->bind_param("ssssss", $firstName, $lastName, $email, $birthdate, $hashedPassword, $role);
            if ($stmt->execute()) {
             
                if ($role === 'admin') {
                    header("Location: dashboard.php");
                } else {
                    header("Location: home.php");
                }
                exit;
            } else {
                echo "Gabim gjatë regjistrimit: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Gabim gjatë përgatitjes së query: " . $this->conn->error;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $db = new Database();
    $user = new User($db->getConnection());

    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $email = $_POST['email'];
    $birthdate = $_POST['birthdate'];
    $password = $_POST['password'];

 
    $role = (substr($email, -10) === '@admin.com') ? 'admin' : 'user';

    var_dump($firstName, $lastName, $email, $birthdate, $password, $role);
    $user->register($firstName, $lastName, $email, $birthdate, $password, $role);

    $db->closeConnection();
}
?>
