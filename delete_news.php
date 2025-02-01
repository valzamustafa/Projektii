<?php
include('db_connection.php');

$database = new Database();
$conn = $database->getConnection();

$news = new News($conn);

if (isset($_GET['delete'])) {
    $content_id = $_GET['delete'];

    if ($news->deleteNews($content_id)) {
        header("Location: manage_news.php");
        exit;
    } else {
        echo "Error deleting the news item.";
    }
} else {
    echo "No news ID specified for deletion.";
}
?>
