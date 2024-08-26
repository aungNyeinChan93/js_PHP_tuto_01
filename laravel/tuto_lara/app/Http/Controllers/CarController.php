<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    //old method / key-value set from instance obj
    public function old()
    {
        $car = new Car();
        $car->model = "BMW";
        $car->year = 2000;
        $car->make = "USA";
        $car->save();
        $cars = Car::all();
        return view("Car.show", compact("cars"));
    }

    // new method / use static create fn of model /need to permmsion fillable
    public function new()
    {
        Car::create([
            "model"=>"toyota",
            "year"=>1990,
            "make"=>"JPN",
        ]);
        $cars = Car::all();
        dd($cars);
    }


    public function all(){
        // use query
        $res= DB::select("select * from cars");
        // dd($res);

        // use table
        $res = DB::table("cars")->get();
        // dd($res);

        // use Model | mvc
        $cars = Car::get();
        dd($cars->toArray()); //block SHOW  year field
    }
    // select
    public function select(){
        $cars = Car::select("model","make")->get();
        dd($cars->toArray());
    }
    // where
    public function where(){
        $cars = Car::where("make","=","JPN")->get();
        dd($cars->toArray());
    }
    // value
    public function value(){
        $make = Car::find(11)->value("year");
        dd($make);
    }
    // find id
    public function find(){
        $car = Car::find(1);
        dd($car->toArray());
    }
    // findOrFail
    public function findOrFail(){
        $car = Car::findOrFail(10);
        dd($car->toArray());
    }
    // combine
    public function combine(){
        $cars =Car::select("year","make")->where("id",">=",5)->get();
        dd($cars->toArray());
    }

    // pulck
    function pluck(){
        $car = Car::find(11)->pluck("model","year");
        dd($car->toArray());
    }

    public function count(){
        $count = Car::count();
        for($i=0; $i<= $count; $i++ ){
            echo "<pre>";
            echo Car::find($i);
        };
    }

     // get method
     public function get( ){
        $cars = Car::all();
        // dd($cars->toArray());
        return view("Test.post",compact("cars"));
    }

    // post method
    public function post(Request $request ,$id){
        dd(Car::find($id)->toArray());
    }
    // whereAny
    public function whereAny(){
        $whereAny = Car::whereAny(["model","year","make"],"LIKE","BMW")->get()->toArray();
        dd($whereAny);
    }

    // orderBy
    public function orderBy(){
        $cars = Car::orderBy("id","desc")->get()->toArray();
        dd($cars);
    }
}
