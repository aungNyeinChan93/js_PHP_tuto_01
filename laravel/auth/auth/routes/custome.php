<?php

use Illuminate\Support\Facades\Route;

Route::get('custome/login', function () {
    return view("custome.login");
});

Route::get("custome/register",function(){
    return view("custome.register");
});

Route::get("/home",function(){
    return view("custome.home");
})->name("home");
