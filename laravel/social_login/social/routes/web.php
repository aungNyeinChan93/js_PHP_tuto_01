<?php

use App\Http\Controllers\SocialLoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('test.home');
});


Route::get("auth/{provider}/redirect",[SocialLoginController::class,"redirect"]);
Route::get("auth/{provider}/callback",[SocialLoginController::class,"callback"]);

