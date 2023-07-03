<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form data
    $name = $_POST['imageName'];
    $image = $_FILES['image'];

    // Validate image upload
    if ($image['error'] === UPLOAD_ERR_OK) {

        if ($image['size'] <= 1048576) {
            $tmp_name = $image['tmp_name'];

            // Read the image file content
            $image_data = file_get_contents($tmp_name);
    
            // Insert the name and image data into the database table
            $stmt = $pdo->prepare("INSERT INTO images (name, image) VALUES (:name, :image)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':image', $image_data, PDO::PARAM_LOB);
    
            //Excute the request in database
            $stmt->execute();
    
            header('Location: index.php');
        } else {
            echo "Error: The selected image must be less than 1MB in size.";
        }
        
        
    } else {
        echo "Error uploading image.";
    }
}
?>
