<?php

use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("mail",function(){
    Mail::raw("mail body!",function($mess){
        $mess->to("anc@gmail.com")->subject("subject title");
    });
});

Route::get("mail/smtp",function(){
    Mail::to("Anc@gmail.com")->send(new TestMail());
    return "Mail success!";
});
