<?php

namespace App;

class MyContainer{
    protected $binding =[];
    public function bind($key ,$val){
        $this->binding[$key] = $val;
    }
    public function resolve($key){
        return call_user_func($this->binding[$key]);
    }
}


