<?php
include('Car.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $year = $_POST['year'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $car = new Car();
    if ($car->addCar($name, $description, $year, $price, $image)) {
        echo "Car added successfully!";
    } else {
        echo "Failed to add car.";
    }
}
?>

<form method="POST" action="add_car.php">
    <input type="text" name="name" placeholder="Car Name" required><br>
    <textarea name="descripaaaaaaaaaaaaaaaaaaaation" placeholder="Description" required></textarea><br>
    <input type="number" name="year" placeholder="Year" required><br>
    <input type="number" name="price" placeholder="Price" required><br>
    <input type="text" name="image" placeholder="Image URL" required><br>
    <button type="submit">Add Car</button>
</form>
