<?php
echo "<pre>";

// var_dump($pdo);

try {
    //DB connection get::
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=cars", "root", "Anc@123"); //  <<--  :-)
    echo "DB connection success!<br> ";
} catch (PDOException $error) {
    // echo "connection error..." . $error . " <br>";
    $exp = new PDOException("DB::connection erros $error");
    echo $exp->getMessage();
}


