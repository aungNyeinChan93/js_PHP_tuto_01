<?php

$server = "localhost" ; 
$databaseName = "blog_page";
$userName = "root" ; 
$password = "Anc@123" ;

try{
    $pdo = new PDO("mysql:host=$server;dbname=$databaseName",$userName,$password); 
    // echo "connectin success";
}catch(PDOException $error){
    echo "connection fail..." . $error;
}