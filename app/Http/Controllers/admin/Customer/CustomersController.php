<?php

namespace App\Http\Controllers\admin\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index(){
        return view('admin.customers');
    }
}
