<?php 
echo "<pre>";
require_once("./database.php");

$userID = $_GET["id"];

$data = $pdo->query("select * from users where id = $userID")->fetchAll(PDO::FETCH_ASSOC);
$data2 = $pdo->query("select * from users")->fetch(PDO::FETCH_ASSOC);

print_r($data2);


foreach($data as $val){
    echo $val["name"] ."<br>";
}