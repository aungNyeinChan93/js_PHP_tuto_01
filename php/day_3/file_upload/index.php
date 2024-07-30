<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single File Upload</title>
</head>

<body>
    <h3>Single File Upload!</h3>
    <br>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image" id="">
        <br><br>
        <input type="submit" name="upload" value="upload">
        <br>
    </form>

    <?php
    
    //https://www.php.net/manual/en/features.file-upload.errors.php
    echo "<pre>";
    print_r($GLOBALS);
    define("DD", realpath("./"));
    print_r(DD);

    if (isset($_POST["upload"])) {
        print_r($_FILES);
        // print_r($_FILES["image"]["name"]);
        // print_r($_FILES["image"]["error"]); 
        // print_r($_FILES["image"]["tmp_name"]); 
        echo "<br>";
        foreach ($_FILES["image"] as $data) {
            echo $data . "<br>";
        }
        $fileName = $_FILES["image"]["name"];
        $tmp_file = $_FILES["image"]["tmp_name"];
        $target_file = DD . "/imageStorage/" . $fileName;
        if (move_uploaded_file($tmp_file, $target_file)) {
            echo "File upload success!";
        } else {
            echo "File upload Fail!";
        }
    }

    ?>
</body>

</html>