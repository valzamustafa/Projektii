<?php
class Car {
    public $id;
    public $name;
    public $description;
    public $image;
    public $year;
    public $price;

    public function __construct($id, $name, $description, $image, $year, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
        $this->year = $year;
        $this->price = $price;
    }
}
?>