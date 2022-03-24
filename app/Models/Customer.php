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

    public function addresses(){

        return $this->hasMany(Address::class);
    }

    public static function createCustomer($request){

        // print_r($request['email']);
        // $customer = Customer::create($request);
        // print_r($request->getCustomerPayload());
        // echo "model";
        $customer = Customer::create($request->getCustomerPayload());

        if($request->shipping) {
            if($request->hasAddress($request->shipping)){
                $customer->addresses()->create($request->getShippingAddress());
                // print_r($request->getShippingAddress());
            }
        }

        if($request->billing){
            if($request->hasAddress($request->billing)){
                $customer->addresses()->create($request->getBillingAddress());
                // print_r($request->getBillingAddress());
            }
        }

        $customer = Customer::with('billingAddress', 'shippingAddress')->find($customer->id);

        return $customer;
        // echo $customer->id;
    }
}
