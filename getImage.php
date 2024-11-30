<?php
// getImage.php
include 'config/db_connection.php'; 

$id = $_GET['id'];

$query = $conn->prepare("SELECT image, image_type FROM products WHERE id = ?");
$query->bind_param("i", $id);
$query->execute();
$query->bind_result($imageData, $imageType);
$query->fetch();
$query->close();

if ($imageData) {
    header("Content-Type: $imageType"); // Тип зображення, наприклад, "image/jpeg"
    echo $imageData;
} else {
    echo "Зображення не знайдено.";
}
