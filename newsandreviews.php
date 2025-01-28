<?php

class News {
    protected $title;

    public function __construct($title = "") {
        $this->title = $title;
    }

    public function render() {
       
    }
}

class Header extends News {
    public function render() {
        echo "<header>\n";
        echo "    <h1>{$this->title}</h1>\n";
        echo "</header>\n";
    }
}

class Navbar extends News {
    private $links;

    public function __construct($links) {
        $this->links = $links;
    }

    public function render() {
        echo "<nav>\n";
        echo "    <ul class='navbar'>\n";
        foreach ($this->links as $linkText => $linkHref) {
            echo "        <li><a href=\"$linkHref\">$linkText</a></li>\n";
        }
        echo "    </ul>\n";
        echo "</nav>\n";
    }
}

class NewsSection extends News {
    private $articles;

    public function __construct($title, $articles) {
        parent::__construct($title);
        $this->articles = $articles;
    }

    public function render() {
        echo "<section class='news-section'>\n";
        echo "    <h2>{$this->title}</h2>\n";
        foreach ($this->articles as $article) {
            echo "    <div class='news-item'>\n";
            echo "        <img src=\"{$article['image']}\" alt=\"{$article['title']}\">\n";
            echo "        <h3><a href=\"{$article['link']}\">{$article['title']}</a></h3>\n";
            echo "        <p>{$article['description']}</p>\n";
            echo "    </div>\n";
        }
        echo "</section>\n";
    }
}

class Footer extends News {
    private $sections;

    public function __construct($sections) {
        $this->sections = $sections;
    }

    public function render() {
        echo "<footer>\n";
        foreach ($this->sections as $sectionTitle => $links) {
            echo "    <div class='footer-section'>\n";
            echo "        <h2>$sectionTitle</h2>\n";
            foreach ($links as $linkText => $linkHref) {
                echo "        <p><a href=\"$linkHref\">$linkText</a></p>\n";
            }
            echo "    </div>\n";
        }
        echo "</footer>\n";
    }
}

class Page {
    private $header;
    private $navbar;
    private $content;
    private $footer;

    public function __construct($header, $navbar, $content, $footer) {
        $this->header = $header;
        $this->navbar = $navbar;
        $this->content = $content;
        $this->footer = $footer;
    }

    public function render() {
        echo "<!DOCTYPE html>\n<html lang='en'>\n<head>\n";
        echo "    <meta charset='UTF-8'>\n";
        echo "    <meta name='viewport' content='width=device-width, initial-scale=1.0'>\n";
        echo "    <title>Maidonn</title>\n";
        echo "    <link rel='stylesheet' href='style.css'>\n";

      
        echo "    <script>\n";
        echo "        document.addEventListener('DOMContentLoaded', function () {\n";
        echo "            const slides = document.querySelectorAll('.slide');\n";
        echo "            const prevButton = document.querySelector('.prev');\n";
        echo "            const nextButton = document.querySelector('.next');\n";
        echo "            let currentIndex = 0;\n";
        echo "            \n";
        echo "            function showSlide(index) {\n";
        echo "                slides.forEach((slide, i) => {\n";
        echo "                    slide.classList.toggle('active', i === index);\n";
        echo "                });\n";
        echo "            }\n";
        echo "            \n";
        echo "            function nextSlide() {\n";
        echo "                currentIndex = (currentIndex + 1) % slides.length;\n";
        echo "                showSlide(currentIndex);\n";
        echo "            }\n";
        echo "            \n";
        echo "            function prevSlide() {\n";
        echo "                currentIndex = (currentIndex - 1 + slides.length) % slides.length;\n";
        echo "                showSlide(currentIndex);\n";
        echo "            }\n";
        echo "            \n";
        echo "            // Add Event Listeners\n";
        echo "            nextButton.addEventListener('click', nextSlide);\n";
        echo "            prevButton.addEventListener('click', prevSlide);\n";
        echo "            \n";
        echo "            // Auto Slide\n";
        echo "            setInterval(nextSlide, 5000);\n";
        echo "        });\n";
        echo "\n";
        echo "        function showSidebar() {\n";
        echo "            const sidebar = document.querySelector('.slidebar');\n";
        echo "            sidebar.style.display = 'flex';\n";
        echo "        }\n";
        echo "\n";
        echo "        function hideSideBar() {\n";
        echo "            const sidebar = document.querySelector('.slidebar');\n";
        echo "            sidebar.style.display = 'none';\n";
        echo "        }\n";
        echo "    </script>\n";

        echo "</head>\n<body>\n";

        $this->header->render();
        $this->navbar->render();
        foreach ($this->content as $section) {
            $section->render();
        }
        $this->footer->render();

        echo "</body>\n</html>\n";
    }
}

$header = new Header("Maidonn - News and Reviews");

$navbarLinks = [
    "Home" => "home.html",
    "About Us" => "AboutUs.html",
    "Contact Us" => "ContactUs.html",
    "News and Reviews" => "newsandreviews.html",
    "My Account" => "MyAccount.html",
];
$navbar = new Navbar($navbarLinks);

$newsArticles = [
    [
        "image" => "images/foto1.webp",
        "title" => "Nine electric estates available now",
        "link" => "news1.html",
        "description" => "Because everyone knows an estate is infinitely cooler than an SUV",
    ],
    [
        "image" => "images/foto2.jpg",
        "title" => "Lamborghini Temerario with over 1,000 hp",
        "link" => "news2.html",
        "description" => "Lamborghini Temerario already spits out 907 hp but more power is likely",
    ],
    [
        "image" => "images/foto3.jpg",
        "title" => "Modern Alfa Romeo hits 207 mph",
        "link" => "news3.html",
        "description" => "Alfa Romeo's modern 33 Stradale is just weeks out from deliveries",
    ],
];
$newsSection = new NewsSection("Latest News", $newsArticles);

$footerSections = [
    "Quick Links" => [
        "About Us" => "AboutUs.html",
        "Contact" => "ContactUs.html",
        "Privacy Policy" => "#",
        "Terms of Service" => "#",
    ],
    "Follow Us" => [
        "Facebook" => "https://facebook.com",
        "Instagram" => "https://instagram.com",
        "TikTok" => "https://tiktok.com",
    ],
];
$footer = new Footer($footerSections);

$page = new Page($header, $navbar, [$newsSection], $footer);
$page->render();