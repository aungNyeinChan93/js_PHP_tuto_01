<?php
echo "<pre>";
require_once ("./database.php");

$sql = "select * from users";

$res = $pdo->prepare($sql);
$res->execute([]);

$data = $res->fetchAll(PDO::FETCH_ASSOC);

var_dump($data);


