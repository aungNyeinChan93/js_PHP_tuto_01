<?php

use App\Events\UserEventTest;
use App\Mail\WelcomeMail;
use App\Models\User;
use App\Mail\TestMail;
use App\Mail\MarkdownMail;
use App\Notifications\MyNoti;
use App\Notifications\UserNoti;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Notification;

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

Route::get("welcomeMail",function(){
    Mail::to("test@gmail.com")->send(new WelcomeMail());
    return "Success welcome Mail!";
});

// notifiaction by mail
Route::get("noti",function(){
    $user = User::find(1);
    $user->notify(new MyNoti());
    // Notification::send(User::find(2),new MyNoti());
    return "noti send!";
});

// noti from database
Route::get("noti/user",function(){
    Notification::send(User::find(1),new UserNoti());
    echo "success noti";
});

Route::get("testnoti",function(){
    Notification::send(User::findOrFail(1),new UserNoti());
    print("Noti Success! <br>");
    $user = User::find(3);
    $user->notify(new MyNoti());
    echo "Mynoti class -> send to user";
});


// manually event & Listiner
Route::get("eventlistener",function(){
    $user = User::find(1);
    event(new UserEventTest($user));
    echo "run event -> listener ";
});



