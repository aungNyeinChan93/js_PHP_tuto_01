<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
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
Route::get("controller/{id}", [TestController::class, "test"])->name("test");

// view check condation;
Route::get("check", function () {
    $html = "<h1>HTML</h1>";

    // if(view()->exists("Test.sec")){
    //     return view("Test.sec")->with(["data"=>$html]);
    // }else{
    //     dd("Not have");
    // }

    if (View::exists("Test.sec")) {
        return view("Test.sec", ["data" => $html]);
    } else {
        dd("Not have");
    }
});

Route::get("anc/test_1", function () {
    return view("url_route_asset");
})->name("test1");


// api call by php
Route::get("api/php", function () {
    $url = file_get_contents("https://fakestoreapi.com/products"); //return array[object]
    $res = json_decode($url);
    // dd($res);
    $filter = array_filter($res, fn($res) => $res->price < 100); //price<100;
    // dd($filter);    // array->obj
    foreach ($filter as $item) {
        echo "
            <small> " . $item->title . " || " . $item->price . "  <br></small>
        ";
    }
});

//api call with laravel //collect
Route::get("api/laravel", function () {
    $data = Http::get("https://fakestoreapi.com/products")->json(); // return array[array]
    // dd($data);
    $collection = collect($data); // json array to >> collection array
    $filter = $collection->where("price", "<", 100); //filter
    // dd($filter);    // array->array
    foreach ($filter as $item) {
        echo "<pre>";
        // print_r($item["title"]);
        echo $item["title"];
    }
});

// to_route
Route::get("user/to_route", function () {
    return to_route("test1");
});



// products
Route::get("products", function () {
    $products = Http::get("https://fakestoreapi.com/products")->json();
    $filter = collect($products);
    // dd($filter);
    // $filter = $products_collection->where("id", "<=", 10);
    return view("Test.products", compact("filter"));
});

Route::get("products/{id}", function ($id) {
    $products = Http::get("https://fakestoreapi.com/products")->json();
    // $res= array_filter($products,fn($product)=> $product["id"] ==$id);
    $res = collect($products)->where("id", "==", $id);
    // dd($res);
    return view("test.detail", compact("res"));
});





// session
Route::get("session", function (Request $request) {
    $request->session()->put("key", "value");       //session create
    session()->put("key2", "value2");               //session create
    session()->put("key3", "value3");               //session create
    session()->forget("key");                       //session delete
    Session::flush();                               //all session del
    dd(session()->get("key"), session()->get("key2"), session()->get("key3"));       // session get
});

Route::get("make", function () {
    // dd(session()->get("data"));
    return view("Test.make");

});

Route::post("make", function (Request $request) {
    $data = [
        "title" => $request["title"],
        "description" => $request["description"]
    ];
    Session::put("data", $data);
    // dd(Session::get("data"));
    return to_route("views");
});

Route::get("/views", function () {
    $data = Session::get("data");
    // dd($data);
    if (session()->exists("data")) {
        if (!empty($data["title"] && $data["description"])) {
            return view("test.view", compact("data"));
        } else {
            dd("data is empty");
        }
    }
})->name("views");



