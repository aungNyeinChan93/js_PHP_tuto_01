<?php

use App\Test;
use App\Sample;
use App\Service;
use App\Container;
use Carbon\Carbon;
use App\Models\Car;
use App\MyContainer;
use App\SampleFacade;
use Faker\Guesser\Name;
use App\Models\Customer;
use App\Models\UuidTest;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\ValidateRequest;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Resource\ResourceController;

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
    // dd(session()->has("key2"));                  //return true:false
    session()->forget("key");                       //session delete
    Session::flush();                               //all session del
    Session::flash("key", "new value");              //session create
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
    // $data = Session::all();
    // dd($data);
    if (session()->exists("data")) {
        if (!empty($data["title"] && $data["description"])) {
            return view("test.view", compact("data"));
        } else {
            dd("data is empty");
        }
    }
})->name("views");


// date/carbon
Route::get("date", function () {
    // dd(Carbon::now());
    $date = Carbon::now();
    echo $date;
});


// form|csrf_token
Route::get("/form", function () {
    echo "CSRF_token  :: " . csrf_token() . "<br>";          // Cross-site request forgeries
    print_r($_REQUEST);
    return view("test.form");
});

Route::post("/form", function (Request $request) {
    // dd($request->all());
    // dd($request->number);
    $res = $request->number + $request->number2;
    dd($res);
});


//validation
Route::get("form/validation", function () {
    return view("Form.validation");
});

Route::post("form/validation", function (ValidateRequest $request) {
    // $validation = $request->validate([
    //     "name" => "required|max:20|min:3",
    //     "email" => "required",
    //     "password" => "required|numeric|min:5|same:passwordsec",
    //     "passwordsec" => "required|numeric|same:password",
    //     "message" => "required|max:255|min:3",
    //     "language" => "required",
    //     "gender" => "required",
    //     "lvl" => "required",
    // ], [
    //     "name.required" => "Поле name является обязательным для заполнения.",
    //     "password.numeric" => "Password must be numeric type and min:3 and max:20 only!",
    // ]);
    $validateData = $request->all();
    // dd($validateData);
    return back()->with(["message" => "Form success!"]);
})->name("validation");


// fileupload
Route::get("fileupload", function () {
    return view("Test.fileupload");
});

Route::post("fileupload", function (Request $request) {
    $validation = $request->validate([
        "image" => "required|file|mimes:png,jpg"
    ]);
    // php
    // $file = $_FILES["image"];
    // $fileName = uniqid() . $file["name"];
    // $tmp_name = $file["tmp_name"];
    // $target = public_path() . "/image/" .$fileName;
    // move_uploaded_file($tmp_name, $target);

    //laravel
    // dd(storage_path());
    $file = $request->file("image");
    $fileName = uniqid() . "_anc_" . $file->getClientOriginalName();
    $file->move(public_path() . "/image/", $fileName);
    dd("success!");

});

// resource Route
Route::resource("test", ResourceController::class);

// collect -> map ,filter
Route::get("collect", function () {
    $data = ["mgmg", "aung", "chan"];
    $map = collect($data)->map(function ($item) {
        return strtoupper($item);
    });
    $filter = collect($data)->filter(function ($item) {
        return $item == "aung";
    });
    dd($filter);
});

//pluck
Route::get("pluck", function () {
    dd(Customer::pluck("name", "id"));
});

// flatten
Route::get("flatten", function () {
    $data = [
        [1, 2, 3, 4, 5],
        ["aa", "bb", "cc"],
        ["name" => "chan", "age" => 20],
    ];
    $flatten = Arr::flatten($data);
    dd($flatten);
    //a multi-dimensional array into a single level array:
    /* result
        0 => 1
        1 => 2
        2 => 3
        3 => 4
        4 => 5
        5 => "aa"
        6 => "bb"
        7 => "cc"
        8 => "chan"
        9 => 20
        ]
    */
});

// Container
Route::get("container", function () {
    $container = new MyContainer;

    $container->bind("key", function () {
        return new Test();
    });
    $res = $container->resolve("key");
    dd($res->hello());
});

Route::get("laravelContainer", function () {
    // app()->singleton("key","val");   // same instance return
    app()->bind("test", function () {      // diff instance return
        return new Test();
    });
    $res = resolve("test");  //  resolve = check key>> || class instance -> return
    dd($res->hello());
});

//bind and resolve form appserviceprovider
Route::get("myservice", function (Test $service_1, Service $service_2) {
    dd($service_1, $service_2);
});

// facades
Route::get("facades", function (Request $request) {
    // dd(resolve("view"));
    // dd(resolve("redirect"));
    // dd(resolve("request"));
    // dd(request()->name);
    // dd(request("name"));
    dd($request->name);
    // return View::make("Test.make");
});

Route::get("sampleServiceProvider", function (Service $sample_2) {
    // dd(resolve("test")->hello());
    // return SampleFacade::hello();
    // dd(resolve("sample")->name);
    dd($sample_2->name(), resolve("sample")->name);
});

// temporary session
Route::get("session/flash", function () {
    session()->flash("message", config("mail.from.name")); //use config method
    return view("Test.overallTest")->with("status", "helloworld");
});

//config
Route::get("config", function () {
    dd(config("mail.from.name"), config("app.aliases.DB"), config("mail.from.address"));
});

Route::get("config/anc", function () {
    dd(config("anc.about.age"));
});

// mail->raw
Route::get("mail", function () {
    Mail::raw("Mail Body ...!", function ($mess) {
        $mess->to("anc@gmail.com")->subject("ANC Subject ");
    });
    return "mail success";
});


// MVC
Route::get("cars/old", [CarController::class, "old"]);
Route::get("cars/new", [CarController::class, "new"]);
Route::get("cars/all", [CarController::class, "all"]);
Route::get("cars/select", [CarController::class, "select"]);
Route::get("cars/where", [CarController::class, "where"]);
Route::get("cars/value", [CarController::class, "value"]);
Route::get("cars/find", [CarController::class, "find"]);
Route::get("cars/findOrFail", [CarController::class, "findOrFail"]);
Route::get("cars/combine", [CarController::class, "combine"]);
Route::get("cars/pluck", [CarController::class, "pluck"]);
Route::get("cars/count", [CarController::class, "count"]);
Route::get("cars/get", [CarController::class, "get"]);
Route::post("cars/post/{id}", [CarController::class, "post"]);
Route::get("cars/whereAny", [CarController::class, "whereAny"]);
Route::get("cars/orderBy", [CarController::class, "orderBy"]);


//The refresh method will re-hydrate the existing model using fresh data from the database.
Route::get("refresh", function () {
    $id = UuidTest::create([
        "title" => "This is title",
    ]);
    $id->title = "new";
    $id->refresh();
    dd($id->toArray());  // this is title back
});

// chunk
/*
    The chunk method in Laravel is a useful tool
    for processing large datasets
    by breaking them into smaller,more manageable pieces.
    This can help improve performance and avoid memory issues.
*/
Route::get("chunk", function () {
    Car::chunkById(10, function ($cars) {
        foreach ($cars as $car) {
            echo "$car->id <br>";
        }
    });

    $collection = collect([1, 2, 3, 4, 5, 6, 7]);
    $chunks = $collection->chunk(3);
    dd($chunks->all());
    // Output: [[1, 2, 3], [4, 5, 6], [7]]

});
