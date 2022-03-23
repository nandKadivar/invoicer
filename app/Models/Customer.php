<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public static function createCustomer($request){

        // print_r($request['email']);
        // $customer = Customer::create($request);
        print_r($request->getCustomerPayload());
        // echo "model";
        // $customer = Customer::create($request->getCustomerPayload());

        // echo $customer->id;
    }
}
