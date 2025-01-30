<?php
class Car {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Shtimi i makinës
    public function addCar($name, $description, $year, $price, $image) {
        $sql = "INSERT INTO cars (name, description, year, price, image) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bind_param("ssids", $name, $description, $year, $price, $image);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Editimi i makinës
    public function editCar($id, $name, $description, $year, $price, $image) {
        $sql = "UPDATE cars SET name=?, description=?, year=?, price=?, image=? WHERE id=?";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bind_param("ssidsi", $name, $description, $year, $price, $image, $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Fshirja e makinës
    public function deleteCar($id) {
        $sql = "DELETE FROM cars WHERE id=?";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Merr të gjitha makinat
    public function getAllCars() {
        $sql = "SELECT * FROM cars";
        $result = $this->db->conn->query($sql);

        $cars = [];
        while ($row = $result->fetch_assoc()) {
            $cars[] = $row;
        }
        return $cars;
    }

    // Merr makinën nga ID
    public function getCarById($id) {
        $sql = "SELECT * FROM cars WHERE id=?";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
?>
