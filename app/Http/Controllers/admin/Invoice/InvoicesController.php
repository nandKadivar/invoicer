<?php

namespace App\Http\Controllers\Admin\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Unit;
use App\Models\Invoice;
use App\Http\Requests\InvoicesRequest;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\InvoiceResource;
use App\Http\Resources\ItemResource;
use App\Jobs\GenerateInvoicePdfJob;

class InvoicesController extends Controller
{
    public function index(){
        // $customers = Customer::where('company_id', 1)->get();
        $invoices = Invoice::with(['items','customer','creator','company'])->where('company_id',1)->get();
        // $customers = new CustomerResource($customers);
        $invoices = InvoiceResource::collection($invoices);
        // print_r($invoices[0]->items[0]->gst_type);

        return view('admin.invoices',['invoices'=>$invoices]);
    }

    public function viewInvoicePage(){
        $invoices = Invoice::with(['items','customer','creator','company'])->where('company_id',1)->get();
        $invoices = InvoiceResource::collection($invoices);
        
        return view('admin.invoices-view', ['invoices'=>$invoices]);
    }

    public function store(InvoicesRequest $request){
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
        GenerateInvoicePdfJob::dispatch($invoice);
        // print_r($invoice);
        return response()->json([
            'invoice' => $invoice,
            'id' => $invoice->id 
        ], 200); 
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

    public function sendInvoice(Request $request){
        $invoice = Invoice::findOrFail($request->invoice_id);

        // print_r($request->all());
        $invoice->send($request->all());

        $invoice->sent = 1;
        $invoice->status = 'SENT';

        $invoice->save();

        return response()->json([
            'success' => true,
        ], 200);
    }

    public function markSend(Request $request){
        // print_r($request->all());
        $invoice = Invoice::findOrFail($request->id);
        
        $invoice->sent = 1;
        $invoice->status = 'SENT';

        $invoice->save();

        return response()->json([
            'success' => true
        ], 200);

    }

    public function delete(Request $request)
    {
        // $this->authorize('delete multiple invoices');
        // print_r($request->all());
        Invoice::deleteInvoice($request->id);

        return response()->json([
            'success' => true,
            'msg' => 'Invoice deleted successfully'
        ]);
    }
}
