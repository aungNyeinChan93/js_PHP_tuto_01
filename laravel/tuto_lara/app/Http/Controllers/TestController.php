<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function test($id){
        // dd("Testing");
        $data = $id;
        return view('Test.test',compact("data"));
    }
}
