<?php 

//uncode || decode

$my_array = [
    "name" => "aung nyein chan",
    "age" =>18,
    "gender"=> "male"
];

$my_obj = new stdClass();
$my_obj->name = "chan";
$my_obj->age = 30;
$my_obj->address = ["ygn","mm"];

// json_encode method -> array,stdclass to change json object;
$my_json = json_encode($my_array);
$json_obj = json_encode($my_obj);
echo "<pre>";

print_r($my_array);
print_r($my_obj);
print_r($my_json);
print_r($json_obj);

// json_decode method -> jsonObj change to stdclass object 
print_r(json_decode($my_json)->name); // note -> array was changed to obj
print_r(json_decode($json_obj)->address); 