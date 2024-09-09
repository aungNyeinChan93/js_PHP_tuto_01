<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;



class Job{
    public static function all(){
        return [
            [
                "id" => 1,
                "title" => "manager",
                "salary" => "5000$"
            ],
            [
                "id" => 2,
                "title" => "pm",
                "salary" => "15000$"
            ],
            [
                "id" => 3,
                "title" => "programmer",
                "salary" => "4000$"
            ],
        ];
    }
}

Route::get("jobs/{id}", function ($id) {

    // $job = Arr::first($jobs, fn($job) => $job["id"] == $id);

    $job = collect(Job::all())->filter(function($job) use($id){
        return $job["id"] == $id;
    });
    dd($job->toArray());

});


Route::get("jobss",[JobController::class,"job"]);

