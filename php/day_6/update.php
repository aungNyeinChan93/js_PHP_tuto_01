<?php 
echo "<pre>";
require_once "./database.php";

$sql = "update users set name=?,email=?,address=? where id=?";

$res = $pdo->prepare($sql);
$res->execute(["anc","anc@gmail.com","ygn",2]);

echo "update success";

include_once "./show.php";