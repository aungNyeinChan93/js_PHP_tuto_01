<?php


$titleStatus_empty = $description_empty = false;
if (isset($_POST["edit_btn"])) {
    $titleStatus_empty = $_POST["title"] == "" ?? false;
    $description_empty = $_POST["description"] == "" ?? false;
    if (!$titleStatus_empty && !$description_empty) {
        if ($_FILES["image"]["name"] == "") {
            $id = $_POST["hidden"];
            $edit_sql = "update posts set title=?,description=?,category_id=? where id=?";
            $res = $pdo->prepare($edit_sql);
            $res->execute([$_POST['title'], $_POST['description'], $_POST['category'], $id]);
        } else {
            $id = $_POST["hidden"];
            $remove_image = $_POST["hide_image"];
            unlink("../image/$remove_image");
            $imageName = uniqid() . "_chan_ " . $_FILES["image"]["name"];
            $tempName = $_FILES["image"]["tmp_name"];
            $target_image = "../image/".$imageName;
            move_uploaded_file($tempName, $target_image);
            $update_sql = "update posts set title=?,description=?,image=?,category_id=? where id=?";
            $responce= $pdo->prepare($update_sql);
            $responce->execute([$_POST['title'],$_POST['description'],$imageName,$_POST['category'],$id]);

        }
        header("Location:./list.php");
    }
}