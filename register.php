<?php
// if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
//     $fileTmpPath = $_FILES['image']['tmp_name'];
//     $fileName = $_FILES['image']['name'];
//     $fileSize = $_FILES['image']['size'];
//     $fileType = $_FILES['image']['type'];
//     $fileNameCmps = explode(".", $fileName);
//     $fileExtension = strtolower(end($fileNameCmps));

//     // Define allowed file extensions
//     $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];

//     if (in_array($fileExtension, $allowedExts)) {
//         // Define upload path
//         $uploadFileDir = './uploaded_files/';
//         $dest_path = $uploadFileDir . $fileName;

//         // Create directory if it doesn't exist
//         if (!is_dir($uploadFileDir)) {
//             mkdir($uploadFileDir, 0755, true);
//         }

//         // Move the file to the upload directory
//         if (move_uploaded_file($fileTmpPath, $dest_path)) {
//             $imagePath = $dest_path;
//         } else {
//             echo "Error moving the uploaded file.";
//             exit;
//         }
//     } else {
//         echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
//         exit;
//     }
// } else {
//     echo "No file uploaded or there was an upload error.";
//     exit;
// }


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