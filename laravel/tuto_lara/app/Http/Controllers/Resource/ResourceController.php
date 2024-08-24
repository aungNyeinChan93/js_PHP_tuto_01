<?php

namespace App\Http\Controllers\Resource;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::all();
        dd($customer[1]->name);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // get -> test/create
        dd("create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // post ->test
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // get ->test/{test}
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // get -> test/{test}/edit
        dd("edit => ".$id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // put/patch ->test/{test}
        $data =$request->find($id);
        dd("update => " . $id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete ->test/{test}
        // exampleModel::delete($id);
    }
}
