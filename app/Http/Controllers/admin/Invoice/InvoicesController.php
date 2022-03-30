<?php

namespace App\Http\Controllers\Admin\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Item;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\ItemResource;

class InvoicesController extends Controller
{
    public function index(){
        // $customers = Customer::where('company_id', 1)->get();

        // $customers = new CustomerResource($customers);

        // print_r($customers[0]->shippingAddress->name);

        return view('admin.invoices');
    }

    public function newInvoicePage(){
        // $customers = Customer::where('company_id', 1)->get();
        $items = Item::where('company_id', 1)->get();
        $items = ItemResource::collection($items);
        
        $customers = Customer::with(['billingAddress','shippingAddress','creator'])->where('company_id',1)->get();
        // $temp = new CustomerResource(Customer::findOrFail(1));
        // print_r($temp[0]);
        $customers = CustomerResource::collection($customers);
        
        return view('admin.invoices-create',['customers' => $customers, 'items' => $items]);
    }
}
