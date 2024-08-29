<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //admin create
    public function create(){
        return view("admin.create");
    }

    public function store(Admin $admin , AdminRequest $adminRequest ){
        $file = $adminRequest->file("photo");
        $fileName = uniqid() ."anc_".$file->getClientOriginalName();
        $file->move(public_path()."/adminImage/",$fileName);
        
        $admin->create([
            "name"=>$adminRequest->name,
            "email"=>$adminRequest->email,
            "photo"=>$fileName,
        ]);
        return redirect("admin/index");
    }

    public function index(){
        $admins= Admin::orderBy("id","desc")->get();
        return view("admin.index",compact("admins"));
    }
}
