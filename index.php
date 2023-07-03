<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Image Upload Form</h1>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="imageName">Name:</label>
        <input type="text" name="imageName" id="imageName" required>
        <br><br>
        <label for="image">Image:</label>
        <input type="file" name="image" id="image" accept=".png, .jpg, .jpeg" required>
        <br><br>
        <input type="submit" value="Upload">
    </form>

    <h1>Image Gallery</h1>
    <?php include 'display.php'; ?>
</body>
</html>