<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $targetFile = basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        echo "Image uploaded successfully!";
        echo "<img style='border: 10px solid green !important;' src='$targetFile' alt='Uploaded Image'>";
    } else {
        echo "Failed to upload image.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img{
            border: 10px solid;
        }
    </style>
</head>
<body>
    <img src="<?php echo $targetFile;?>" alt="This Is">
</body>
</html>