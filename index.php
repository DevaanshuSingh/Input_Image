<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input {
            border: 1px solid;
        }
    </style>
</head>

<body>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="img" id="inpt">
    <label for="inpt">Enter Image</label>
    <button type="submit">Upload</button>
</form>

<?php
if (isset($_FILES["img"]) && $_FILES["img"]["error"] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES["img"]["tmp_name"];
    $fileName = $_FILES["img"]["name"];
    $uploadDir = "uploads/";

    // Ensure the upload directory exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    // Sanitize file name
    $safeFileName = basename($fileName);
    $destPath = $uploadDir . $safeFileName;

    // Move file to upload directory
    if (move_uploaded_file($fileTmpPath, $destPath)) {
        echo "<img src='$destPath' alt='Uploaded Image'>";
        echo "<br>Image name is: " . htmlspecialchars($safeFileName);
    } else {
        echo "Error moving the uploaded file.";
    }
} else {
    echo "No file uploaded or there was an error.";
}
?>

</body>

</html>