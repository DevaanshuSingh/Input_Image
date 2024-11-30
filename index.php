<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload and Display</title>
    <style>
        input {
            border: 1px solid;
        }

        img {
            margin-top: 20px;
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="img" id="inpt" accept="image/*">
        <label for="inpt">Choose Image</label>
        <button type="submit" name="upload">Upload</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['img'])) {
        $targetDir = "uploads/"; // Directory to save uploaded files
        $targetFile = $targetDir . basename($_FILES["img"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the file is an actual image
        if (isset($_POST["upload"])) {
            $check = getimagesize($_FILES["img"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check file size
        if ($_FILES["img"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
            echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // Save file to the server
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $targetFile)) {
                echo "The file " . htmlspecialchars(basename($_FILES["img"]["name"])) . " has been uploaded.";
                echo "<img src='$targetFile' alt='Uploaded Image'>";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    ?>
</body>

</html>



<!-- 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload and Preview</title>
    <style>
        input {
            border: 1px solid;
        }

        #preview {
            margin-top: 20px;
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="img" id="inpt" accept="image/*">
        <label for="inpt">Enter Image</label>
        <button type="submit">Upload</button>
    </form>

    <img id="preview" alt="Image Preview" style="display: none;">

    <script>
        const input = document.getElementById('inpt');
        const preview = document.getElementById('preview');

        input.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };

                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
                preview.src = '';
            }
        });
    </script>

    <?php
    // echo date("Y-m-d H:i:s", time());
    echo time();
    ?>
</body>

</html> -->
