<?php 

$cookieName = "cookieOne"; //key
$cookieValue = "hello world"; //value
$expire = time()+3600;   //1day
$path = "/";
$domian = "localhost";
$secure = false;
$httpOnly = true;

$my_cookie = setcookie($cookieName,$cookieValue,$expire,$path,$domian,$secure,$httpOnly);

if($my_cookie){
    echo "<h1>Cookie is set</h1>";
}else{
    echo "<h1>something wrong</h1>";
}

echo"<pre>";
print_r($GLOBALS);
var_dump($_COOKIE);