<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view("Product.index", compact("products"));
    }

    public function create()
    {
        return view("Product.create");
    }


    public function store(Request $request)
    {
        $validate_data = $request->validate([
            "name" => "required",
            "price" => "required",
        ]);
        Product::create($validate_data);
        return to_route("product.index")->with("create", "Create success!");

    }

    //product{product}
    public function show(Product $product)
    {
        // $product = $product->toArray();
        return view("Product.show", compact("product"));
    }


    public function edit(Product $product)
    {
        return view("Product.edit", compact("product"));
    }


    public function update(Request $request, Product $product)
    {
        $product->update([
            "name" => $request->name,
            "price" => $request->price,
        ]);
        return redirect()->route("product.index")->with("update", "Update success!");

    }

    public function destroy(Product $product)
    {
        //
        $product->delete();
        return to_route("product.index")->with("delete", "Delete success!");
    }
}
