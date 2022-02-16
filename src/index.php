<?php
    session_start();

    if (!isset($_SESSION["img"])) {
        $_SESSION["img"] = array();
    }

    if (move_uploaded_file($_FILES["picture"]["tmp_name"], "uploads/" . $_FILES["picture"]["name"])) {
        // echo "File is uploaded";
        array_push($_SESSION["img"], $_FILES["picture"]["name"]);
    } else {
        echo "Sorry, there was an error";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Image Gallery</title>
</head>
<body>
    <h1 class="title">Image Gallery</h1>
    <p>This page displays the list of uploaded images.</p>
    <form action="" method="post" enctype="multipart/form-data">
      <input type="file" name="picture" />
      <input type="submit" name="submit" value="Upload More" class="btn" />
    </form>

    <?php
        foreach($_SESSION["img"] as $key => $val) {
            echo "<img src='uploads/$val' />";
        } 
    ?>
</body>
</html>