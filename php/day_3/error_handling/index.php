<?php 

function division ($num1 , $num2){
    if($num2 === 0){
        throw new Exception("Divider is ZERO!...");
    }else{
        echo $num1/$num2;
    }
}

try {
    division(10,0);
} catch (Exception $error) {
    echo  "Error => " .$error ." <br>";
    $exp = new Exception("custome error");
    print_r($exp->getMessage());
}

    // try {
    //     division(10,0);
    // } catch (\Throwable $th) {
    //     echo "$th";
    // }

// https://www.php.net/manual/en/class.throwable.php
// https://php.net/manual/en/class.exception.php
// https://www.php.net/manual/en/class.stringable.php
