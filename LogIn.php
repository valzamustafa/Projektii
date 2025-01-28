<?php
session_start();
require_once 'db_connection.php'; 

class UserAuth {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function login($email, $password) {
        if (empty($email) || empty($password)) {
            return "empty_fields";
        }

        $stmt = $this->pdo->prepare("SELECT * FROM manage_users WHERE email = :email LIMIT 1");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];

            return $user['role'] === 'admin' ? 'admin' : 'user';
        } else {
            return "invalid_credentials";
        }
    }
}

$db = new Database();
$pdo = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $auth = new UserAuth($pdo);
    $result = $auth->login($email, $password);

    echo $result;
}
?>
