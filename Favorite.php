<?php
class Favorite {
    private $user_id;
    private $car_id;
    private $conn;

    public function __construct($user_id, $car_id, $conn) {
        $this->user_id = $user_id;
        $this->car_id = $car_id;
        $this->conn = $conn;
    }

    public function addToFavorites() {
        $stmt = $this->conn->prepare("INSERT INTO favorites (user_id, car_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $this->user_id, $this->car_id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getFavorites() {
        $stmt = $this->conn->prepare("SELECT car_id FROM favorites WHERE user_id = ?");
        $stmt->bind_param("i", $this->user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $favorites = [];
        while ($row = $result->fetch_assoc()) {
            $favorites[] = $row['car_id'];
        }
        return $favorites;
    }
}
?>
