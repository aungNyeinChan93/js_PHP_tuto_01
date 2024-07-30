<?php

echo "test.php<br>";

echo "<pre>";
var_dump($_POST);

if (!empty(isset($_POST["email"])) && !empty(isset($_POST["password"]))) {
    print_r($_REQUEST);
    print_r($_POST["password"]);
    print_r($_POST["gender"]);
    print_r($_FILES);
    $tem_files = $_FILES["file"]["tmp_name"];
    echo $tem_files;
} else {
    echo "<h1>PLZ Input information fill!</h1>";
}