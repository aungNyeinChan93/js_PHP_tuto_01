<?php

use Illuminate\Support\Facades\Route;


Route::group(["prefix"=>"custome","middleware" => "guest"], function () {
    Route::get('login', function () {
        return view("custome.login");
    })->name("custome.login");

    Route::get("register", function () {
        return view("custome.register");
    });
});


Route::middleware("auth")->group(function () {
    Route::prefix("custome")->group(function () {

        Route::get("/admin", function () {
            return view("custome.admin");
        })->middleware("admin")->name("adminPage");

        Route::get("/home", function () {
            return view("custome.home");
        })->middleware("user")->name("home");

        Route::any("gift", function () {
            return " Top Ten Gift !!! ";
        })->middleware("first_10")->name("gift");
    });
});

