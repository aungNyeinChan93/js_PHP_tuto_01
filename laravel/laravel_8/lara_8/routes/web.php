<?php

use App\Mail\TestMail;
use App\Mail\MarkdownMail;
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

// mail->raw -->Raw file
Route::get("mail",function(){
    Mail::raw("mail body!",function($mess){
        $mess->to("anc@gmail.com")->subject("subject title");
    });
});

// mail->to --> HTML
Route::get("mail/smtp",function(){
    $data = [
        "name"=>"aung nyein chan",
        "age"=>30,
        "phone"=>"123213123"
    ];
    Mail::to("Anc@gmail.com")->send(new TestMail($data));
    return "Mail success!";
});

//mail -->markdown mail     
Route::get("mail/markdown",function(){
    Mail::to("chan@gmail.com")->send(new MarkdownMail());
    return "Mail success!";
});
