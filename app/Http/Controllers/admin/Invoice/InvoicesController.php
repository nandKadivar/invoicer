<?php

namespace App\Http\Controllers\Admin\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Unit;
use App\Models\Invoice;
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

    public function store(Request $request){
        // $request->creator_id = user()->id;
        // print_r($request->input('creator_id'));
        // echo $request->input('customer_id');
        // $request->merge([
        //     'creator_id' => $this->user()->id,
        // ]);
        // print_r($request->all());
        $invoice = Invoice::createInvoice($request);
        // return $request;
        // return response()->json([
        //     'user' => 'Nand',
        //     'message' => 'Success'
        //   ], 200);
    }

    public function newInvoicePage(){
        // $customers = Customer::where('company_id', 1)->get();
        $items = Item::with(['unit'])->where('company_id', 1)->get();
        // $units = Unit::where('company_id', 1)->get();
        // print_r($items[0]);
        $items = ItemResource::collection($items);
        
        $customers = Customer::with(['billingAddress','shippingAddress','creator'])->where('company_id',1)->get();
        // $temp = new CustomerResource(Customer::findOrFail(1));
        // print_r($temp[0]);
        $customers = CustomerResource::collection($customers);
        
        return view('admin.invoices-create',['customers' => $customers, 'items' => $items]);
    }
}
