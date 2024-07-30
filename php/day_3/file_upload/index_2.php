<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi File Upload</title>
</head>

<body>
    <h3>Multi File Upload!</h3>
    <br>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="images[]" id="" multiple>
        <br><br>
        <input type="submit" name="upload" value="upload">
        <br>
    </form>

    <?php

    echo "<pre>";
    // print_r($GLOBALS);
    define("DD", realpath("./"));
    // print_r(DD);
    
    if (isset($_POST["upload"])) {
        print_r($_FILES);
        echo "<br>";
        foreach ($_FILES as $image) {
            foreach ($image["name"] as $key => $value) {
                // echo"$value";
                // echo $image["tmp_name"][$key];
                $fileName = $value;
                $tmp_name = $image["tmp_name"][$key];
                $target_file = DD . "/imageStorage/" . $fileName;
                if (move_uploaded_file($tmp_name, $target_file)) {
                    echo "Multi files upload complete!<br>";
                }
            }
        }
    }

    ?>
</body>

</html>