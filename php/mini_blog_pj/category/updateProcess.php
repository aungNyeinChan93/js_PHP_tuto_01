<?php
require_once "../db/connection.php";

// print_r($_POST);

if (!empty($_POST["category"])) {
    $sql = "update category set name=? where id=?";
    $res = $pdo->prepare($sql);
    $res->execute([$_POST["category"], $_POST["id"]]);
    header("Location:./list.php");
}else{
    header("Location:./list.php");
}


