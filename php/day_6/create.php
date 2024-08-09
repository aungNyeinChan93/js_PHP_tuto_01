<?php 
echo "<pre>";
require_once("./database.php");

$sql = "insert into users (name,email,address) values (?,?,?)";

$res = $pdo->prepare($sql);
$res->execute(["mumu","mumu@gmail.com","bago"]);

echo "inset data success!<br>";

include_once("./show.php");
// header("Location:read.php");

