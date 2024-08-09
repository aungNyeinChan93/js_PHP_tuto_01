<?php 
require_once "../db/connection.php";

echo "<pre>";

print_r($_REQUEST);


$sql = "delete from category where id=?";
$res= $pdo->prepare($sql);
$res->execute([$_REQUEST["id"]]);

header("Location:./list.php");