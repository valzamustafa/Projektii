<?php
class Page {
    private string $title;

    public function __construct(string $title) {
        $this->title = $title;
    }

    public function render(callable $navbar, callable $content, callable $footer): void {
        echo "<!DOCTYPE html>";
        echo "<html lang='en'>";
        echo "<head>";
        echo "<meta charset='UTF-8'>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "<title>{$this->title}</title>";
        echo "<link rel='stylesheet' href='About.css'>";
        echo "</head>";
        echo "<body>";
        $navbar();
        $content();
        $footer();
        echo "</body></html>";
    }
}

class Navbar {
    private array $links;

    public function __construct(array $links) {
        $this->links = $links;
    }

    public function render(): void {
        echo "<nav><ul class='navbar'>";
        foreach ($this->links as $link => $url) {
            echo "<li><a href='{$url}'>{$link}</a></li>";
        }
        echo "</ul></nav>";
    }
}

class Footer {
    private string $location;
    private string $address;

    public function __construct(string $location, string $address) {
        $this->location = $location;
        $this->address = $address;
    }

    public function render(): void {
        echo "<div class='footer'>";
        echo "<h2>Our Locations</h2>";
        echo "<p>{$this->location} - {$this->address}</p>";
        echo "</div>";
    }
}


$navbar = new Navbar([
    'Home' => 'home.html',
    'About Us' => 'AboutUs.html',
    'Contact Us' => 'ContactUs.html',
]);

$footer = new Footer("Prishtine", "Magjistralja Prishtine-Ferizaj");

$content = function () {
    echo "<section class='front'><div class='front-text'>";
    echo "<h1>Your journey to the perfect ride begins here.</h1>";
    echo "</div></section>";
    echo "<div class='container'>";
    echo "<div class='box'><p>Buying a car should be an exciting and enjoyable experience.</p></div>";
    echo "<div class='box'><p>We started with a simple goal: to make car buying easy.</p></div>";
    echo "<div class='box'><p>To make your car buying journey smooth and hassle-free.</p></div>";
    echo "</div>";
};


$page = new Page("About Us");
$page->render([$navbar, 'render'], $content, [$footer, 'render']);
?>
