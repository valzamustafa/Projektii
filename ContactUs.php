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
        echo "<link rel='stylesheet' href='ContactUs.css'>";
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
    'Contact Us' => 'ContactUs.php',
]);

$footer = new Footer("Prishtine", "Magjistralja Prishtine-Ferizaj");


$content = function () {
    echo "<section class='contact'>";
    echo "<div class='container'>";
    echo "<h2>Contact Us</h2>";
    echo "<form method='post'>";
    echo "<div class='form-group'><input type='text' name='name' placeholder='Your Name' required></div>";
    echo "<div class='form-group'><input type='email' name='email' placeholder='Your Email' required></div>";
    echo "<div class='form-group'><textarea name='message' placeholder='Your Message' required></textarea></div>";
    echo "<button type='submit'>Send Message</button>";
    echo "</form>";
    echo "</div>";
    echo "</section>";

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);
        
      
        echo "<p>Thank you, {$name}! Your message has been sent.</p>";
    }
};

$page = new Page("Contact Us");
$page->render([$navbar, 'render'], $content, [$footer, 'render']);
?>