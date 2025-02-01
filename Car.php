<?php
class Car {
    public $id;
    public $name;
    public $description;
    public $image;
    public $year;
    public $price;
    private $conn;

    public function __construct($conn, $id = null, $name = null, $description = null, $image = null, $year = null, $price = null) {
        $this->conn = $conn; 
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->year = $year;
        $this->price = $price;
        $this->image = $image;


    }
    public function addCar() {
        $query = "INSERT INTO cars (name, description, image, year, price) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssii", $this->name, $this->description, $this->image, $this->year, $this->price);
        return $stmt->execute();
    }


    public function getCarById($car_id) {
        $query = "SELECT * FROM cars WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $car_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $car = $result->fetch_assoc();
        $stmt->close();
        return $car;
    }


    public function updateCar() {
        $query = "UPDATE cars SET name = ?, description = ?, image = ?, year = ?, price = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssiii", $this->name, $this->description, $this->image, $this->year, $this->price, $this->id);
        return $stmt->execute();
    }

    public function uploadImage($imageFile) {
        $targetDir = "uploads/";


        if (!isdir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $imageName = time() . "" . basename($imageFile["name"]);
        $targetFile = $targetDir . $imageName;

        if (move_uploaded_file($imageFile["tmp_name"], $targetFile)) {

            return $imageName;
        }
        return false;
    }
}
?>