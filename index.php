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

    <form action="" method="GET">
        <input type="file" name="img" id="inpt">
        <label for="inpt">Enter Image</label>
        <button type="submit">Ok</button>
    </form>
    <?php
    $file = $_POST["img"];
    echo "<img src='$file' alt='Did Not Got Image From index.html'>";
    echo "<br>image is: " . $_POST["img"];
    ?>
</body>

</html>