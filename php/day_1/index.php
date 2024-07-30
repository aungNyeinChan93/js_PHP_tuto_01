<?php
echo "<pre>";

$arr = [1, 2, 3, 4];

echo $arr[0];

$res = 4 > 0 ?? "true";
echo $res;//1

$token = "valid";
$responce = $token ?? "invalid";
echo $responce;// valid


//------------scope in function------------------//
$global_scope = "<br>hello<br>";

$call = function () use ($global_scope) {

    echo "$global_scope";
};
echo $call();

function call2()
{
    global $global_scope;
    echo "$global_scope";
}
;
call2();

$call3 = fn() => $global_scope;
echo $call3();
//------------------------------//

// date_default_timezone_set("Asia/Rangoon");
echo date("y-m-d | h-m-s") ."<br>";
echo date("Y-M-D");
echo "<br>";


$currentDate = date('d-m-y');
$updateDate = strtotime("+1 day",strtotime($currentDate));
echo $currentDate;
echo "<br>";
echo date("d-m-y",$updateDate);