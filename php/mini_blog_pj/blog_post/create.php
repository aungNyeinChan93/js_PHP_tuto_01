<?php
require_once "../db/connection.php";
$imageValidation = $titleValidation = $descriptionValidation = $categoryValidation = true;

if (isset($_POST["post_btn"])) {
    $imageValidation = $_FILES["image"]["name"] != "" ?? false;
    $titleValidation = $_POST["title"] != "" ?? false;
    $descriptionValidation = $_POST["description"] != "" ?? false;
    $categoryValidation = $_POST["category"] != "" ?? false;
    if ($imageValidation && $titleValidation && $descriptionValidation && $categoryValidation) {
        $image_name = uniqid()."_anc_". $_FILES["image"]["name"];
        $tmp_name = $_FILES["image"]["tmp_name"];
        $desitination = "../image/" . $image_name;
        move_uploaded_file($tmp_name, $desitination);
        // print_r($_FILES);
        $postSql = "insert into posts (title,description,image,category_id) values (?,?,?,?)";
        $res = $pdo->prepare($postSql);
        $res->execute([$_POST["title"],$_POST["description"],$image_name,$_POST["category"]]);
        // echo "success adding";
    } 
}
