<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
    <style>
        img {
            margin-top: 20px;
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <form action="register.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/*">
        <button type="submit">Upload</button>
    </form>
</body>

</html>


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