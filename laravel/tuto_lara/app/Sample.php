<?php

namespace App;

class Sample{
    public $name;
    public function __construct($name){
        $this->name =$name;
    }
    public function hello(){
        return "Helloworld!!!";
    }
    public function name(){
        return $this->name;
    }
}
