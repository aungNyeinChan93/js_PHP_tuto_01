<?php

use App\Mail\MarkdownMail;
use App\Mail\PromotionMail;
use App\Mail\WelcomeMail;
use Illuminate\Mail\Markdown;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


// config
Route::any("config",function(){
    dd(config("mail.from.name"));
});


// Mail::raw
Route::any("mailRaw",function (){
    Mail::raw("hello",function($message){
        $message->to("chan@gmail.com")->subject("this is subject");
    });
});

// Mail::to
Route::any("mailTo",function(){
    Mail::to(Auth::user()->email)->send( new WelcomeMail);
    return "Mail success!";
});

// Mail with parameter
Route::any("mailWithParameter",function(){
    $message= [
        "title"=>"Promotion",
        "body"=>"Promotion mess, ads ......"
    ];
    Mail::to(Auth::user()->email)->send(new PromotionMail($message));
    return "Mail success!";
});

// markDown type
Route::any("markDown",function(){
    Mail::to(Auth::user()->email)->send(new MarkdownMail);
    return "Success!";
});

