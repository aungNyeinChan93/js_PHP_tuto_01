<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Http\Request;


class CustomerController extends Controller
{

    //create customer ~~ | r- customers/create
    public function create(){
        $customer = [
            "name"=>"aung nyein chan",
            "email"=>"anc@mail.com",
            "created_at"=>Carbon::now("Asia/yangon"),
        ];
        Customer::create($customer);
        dd("create success!");
    }

    // customer lists -> r-customers/list
    public function list(){
        $customers = Customer::orderBy("id","desc")->get();
        dd($customers->toArray());
    }

    // customer detail / r-customers/detail/{customer}
    public function detail(Customer $customer ){
        dd($customer->toArray()); //route model bind
    }

    // customer update | r-customers/update/{customer}
    public function update(Customer $customer){
        $updateCustomer = [
            "name"=>"aung nyein chan update",
            "email"=>"anc@mail.comup",
            "created_at"=>Carbon::now("Asia/yangon"),
        ];
        $customer->update($updateCustomer);
        dd("update success!");
    }

    // customer delete |r-customers/delete/{customer}
    public function delete(Customer $customer){
        $customer->delete();
        dd("delete success!");
    }

}
