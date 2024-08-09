<?php 
echo "<pre>";
include_once("./database.php");

$sql = "delete from users where name=?";
$res = $pdo->prepare($sql);
$res->execute(["mumu"]);

echo "Delete sucess!";

include_once "./show.php";
