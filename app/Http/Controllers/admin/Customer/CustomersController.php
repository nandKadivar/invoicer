<?php

namespace App\Http\Controllers\admin\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;

class CustomersController extends Controller
{
    public function index(){
        return view('admin.customers');
    }

    public function store(CustomerRequest $request){
        // $request->validate();
        // print_r($request->all());
        $customer = Customer::createCustomer($request);
        // echo "Store method";
        // print_r($request->all());
        
    }

    public function createCustomer(){
        
    }
}
