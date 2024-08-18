<?php

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("helloworld", function () {
    dd("hello world");
})->name("hw");

//Route changing **
Route::redirect("/hello", "/helloworld");

//status code 302 Found is a common way of performing URL redirection
Route::redirect("/error", "/helloworld", 302);

//name route
Route::get("nameRoute", function () {
    return redirect()->route("hw");
});

Route::get("/product/{productName?}", function ($productName = "default parameter") {
    dd("Product name is $productName");
})->name("product");

// name route with parameter
Route::get("test", function () {
    return redirect()->route("product", "parameter");
    // return redirect()->route("product",["productName"=>"something"]);
});

//download test **
Route::get("/cv/download", function () {
    return response()->download("../public/image/unnamed.jpg");
})->name("downloadImg");

Route::get("/cv", function () {
    echo "
        <a href='" . route("downloadImg") . "'>Download</a>
        <a href='" . to_route("yt") . "'>YouTube</a>
    ";
});

//away route
Route::get("yt", function () {
    return redirect()->away("https://www.youtube.com/");
})->name("yt");

// response header data
Route::get("header", function () {
    $data = [
        "name" => "chan",
        "age" => 30
    ];
    return response()->json($data, 200)
        ->withHeaders([
            "Content-type" => "text/plain",
            "key1" => "val-1"
        ]);
});

// Route with controller
Route::get("controller/{id}",[TestController::class,"test"])->name("test");

// view check condation;
Route::get("check",function(){
    $html = "<h1>HTML</h1>";

    // if(view()->exists("Test.sec")){
    //     return view("Test.sec")->with(["data"=>$html]);
    // }else{
    //     dd("Not have");
    // }

    if(View::exists("Test.sec")){
       return view("Test.sec",["data"=>$html]);
    }else{
        dd("Not have");
    }
});
