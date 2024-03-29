<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $appends = [
        'formattedCreatedAt',
    ];

    public function getFormattedCreatedAtAttribute($value)
    {
        $dateFormat = CompanySetting::getSetting('carbon_date_format', $this->company_id);

        return Carbon::parse($this->created_at)->format($dateFormat);
    }

    public function addresses(){

        return $this->hasMany(Address::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function billingAddress()
    {
        return $this->hasOne(Address::class)->where('type', Address::BILLING_TYPE);
    }

    public function shippingAddress()
    {
        return $this->hasOne(Address::class)->where('type', Address::SHIPPING_TYPE);
    }

    public function scopeWhereCompany($query)
    {
        return $query->where('customers.company_id', 1);
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
        
        // $customer = Customer::where('id', $customer->id)->get();
        $customer = Customer::findOrFail($customer->id);
        // $customer = Customer::with('billingAddress', 'shippingAddress')->find($customer->id);

        return $customer;
        // echo $customer->id;
    }
}
