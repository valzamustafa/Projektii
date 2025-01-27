<?php
class Car {
    private string $name;
    private string $year;
    private string $image;

    public function __construct(string $name, string $year, string $image) {
        $this->name = $name;
        $this->year = $year;
        $this->image = $image;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getYear(): string {
        return $this->year;
    }

    public function getImage(): string {
        return $this->image;
    }

    public static function getAllCars(): array {
        return [
            new Car("Porsche Panamera", "2019", "images/car1.png"),
            new Car("BMW Series", "2021", "images/car2.png"),
            new Car("BMW X7", "2022", "images/car3.png"),
            new Car("Mercedes-Benz", "2020", "images/car4.png"),
            new Car("Porsche Cayenne", "2021", "images/car5.png"),
            new Car("BMW X5", "2023", "images/car5 (2).png"),
        ];
    }
}

$cars = Car::getAllCars();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maidonn</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <section class="front">
        <div class="front-text">
            <h1>Let's get you to the Road</h1>
            <a href="filter.html" class="button">Discover Now</a>
        </div>
    </section>

    <div class="featured-cars-container">
        <h1>FEATURED CARS</h1>
        <div class="cars-grid">
            <?php foreach ($cars as $car): ?>
                <div class="car-card">
                    <span class="badge">New</span>
                    <img src="<?php echo $car->getImage(); ?>" alt="<?php echo $car->getName(); ?>">
                    <h3><?php echo $car->getName(); ?></h3>
                    <p><?php echo $car->getYear(); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="video-container">
        <video autoplay muted loop>
            <source src="videos/Untitled video - Made with Clipchamp.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>