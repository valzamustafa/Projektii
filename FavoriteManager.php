<?php
require_once 'db_connection.php';

class FavoriteManager {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getFavorites($favorites) {
        if (!empty($favorites)) {
            $placeholders = implode(',', array_fill(0, count($favorites), '?'));
            $query = "SELECT * FROM cars WHERE id IN ($placeholders)";
            $stmt = $this->conn->prepare($query);

            $types = str_repeat('i', count($favorites));
            $stmt->bind_param($types, ...$favorites);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }
        return [];
    }

    public function removeFavorite($favorite_id) {
        if (isset($_SESSION['favorites'])) {
            $_SESSION['favorites'] = array_diff($_SESSION['favorites'], [$favorite_id]);
        }
    }
}
?>