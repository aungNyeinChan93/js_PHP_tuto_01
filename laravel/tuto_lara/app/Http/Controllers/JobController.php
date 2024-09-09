<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;


class JobController extends Controller
{
    public function job(){
        $jobs = Job::orderBy("id","desc")->get();
        dd($jobs->toArray());
    }
}
