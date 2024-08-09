<?php 

try {
    //code...
    $pdo = new PDO("mysql:host=localhost;dbname=test2","root","Anc@123");
    echo "connection success!<br>";
} catch (PDOException $error) {
    //throw $th;
    echo "$error";
}