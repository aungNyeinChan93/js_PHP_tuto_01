<?php 
require_once "../db/connection.php";
echo '<pre>';

$postID = $_REQUEST["id"];
$remove_img = $_REQUEST["image"];
// print_r($_REQUEST);

$delete_post_sql = "delete from posts where id=?";
$res=$pdo->prepare($delete_post_sql);
$res->execute([$postID]);
unlink("../image/$remove_img");
header("Location:list.php");