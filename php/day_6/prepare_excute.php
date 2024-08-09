<?php 
echo "<pre>";
require_once("./database.php");

    $userID = $_GET["id"];
    $userName = $_GET["name"];
    $userEmail = $_GET["email"];

$sql = "select * from users where id=? or name=? or email=?";

$res = $pdo->prepare($sql);
$res->execute([$userID,$userName,$userEmail]);
$data= $res->fetchAll(PDO::FETCH_ASSOC);
print_r($data); //http://localhost:8000/?id=4&name=mgmg&email=kyaw@gmail.com