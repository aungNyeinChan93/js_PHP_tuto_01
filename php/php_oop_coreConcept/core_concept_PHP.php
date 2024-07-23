<?php 
 
$ternary = 5>4?">":"<";
echo $ternary;

echo $conditional = 5>1??"this is true";
echo $conditional;      // 1

$test= 1;
if($test == 1 and $test <10){
    echo "<br> true ";
}

if($test == 1 && $test <10){
    echo "<br> true <br>";
}

if($test == 1 or $test <10){
    echo " true <br>";
}
if(!$test == 1 || $test <10){
    echo " true <br>";
}


// array 
$my_arrays = array("My string",12,0.2,true);
$my_arrays[] = ["hello World!"];
$my_arrays[16]= new stdClass();
$my_arrays[16]->name = "obj";
$my_arrays[] = ["key"=>"value","properties"=>["a","b","c","d"]];

foreach($my_arrays as $values){
    echo gettype($values);
    print "<pre>";
    var_dump($values);
    echo "<br>";
};