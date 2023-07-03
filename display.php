<?php
include 'connection.php';

// Retrieve images and names from the database
$stmt = $pdo->query("SELECT name, image FROM images");
$images = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Display images and names in a table
echo '<table style="border-collapse: collapse;">';
echo '<tr>';
echo '<th style="border: 1px solid black; padding: 8px;">Name</th>';
echo '<th style="border: 1px solid black; padding: 8px;">Image</th>';
echo '</tr>';

foreach ($images as $image) {
    $name = $image['name'];
    $imageData = base64_encode($image['image']);
    $src = 'data:image/jpeg;base64,' . $imageData;

    echo '<tr>';
    echo '<td>' . $name . '</td>';
    echo '<td><img src="' . $src . '" alt="' . $name . '"></td>';
    echo '</tr>';
}

echo '</table>';
?>
