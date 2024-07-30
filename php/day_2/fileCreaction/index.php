<?php 
echo"<pre>";
// write file 
$file = fopen("filename.txt","w");
// add data 
fwrite($file,"hello world!");
fwrite($file,"hello world!");
// read file
$read_file = fopen("filename.txt","r");
echo fread($read_file,filesize("filename.txt"))."<br>";
$_GET["name"]= "test";
$_GET["hack"] = "<h1 style='color:red'>Helloworld</h1><script>alert('hi');</script>";
var_dump($GLOBALS["_GET"]["name"]);
var_dump($_SERVER["REQUEST_TIME"]);

print_r($_SERVER);
print_r($GLOBALS);
print_r($_FILES);
print_r($read_file);
print_r($file);

// https://www.youtube.com/watch?v=bIYTpbfhpkQ
// http://localhost:8000/?key=%22hello%22&test=hihi&v=bIYTpbfhpkQ&html=%3Ch1%3Etest%3C/h1%3E

echo $_GET["hack"];

if(isset($_GET["v"])){
    echo $_GET["v"]; // bIYTpbfhpkQ
}

if(isset($_GET["ggg"])){
    echo "ggg";
}else{
    echo "return false";
}
echo"<hr>";
// $_REQUEST
var_dump($_REQUEST); //only get parameter in the browser of request bar, eg::have not -> $_GET["name"]= "test";