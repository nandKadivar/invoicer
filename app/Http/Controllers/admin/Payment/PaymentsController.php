<?php

namespace App\Http\Controllers\Admin\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Jobs\GeneratePaymentPdfJob;

class PaymentsController extends Controller
{
    public function index(){
        
        $payments = Payment::with(['customer','company','invoice','creator','currency','paymentMethod'])->where('company_id',1)->get();
        
        return view('admin.payments', ['payments' => $payments]);
    }

    public function store(Request $request){
        $invoice = Invoice::findOrFail($request->invoice_id);
        
        $amount = $request->amount;
        $exchangeRate = $invoice->exchange_rate;
        $currencyId = $invoice->currency_id;
        
        $request->merge([
            'creator_id' => Auth::user()->id,
            'exchange_rate' => $exchangeRate,
            'base_amount' => $amount*$exchangeRate,
            'currency_id' => $currencyId
        ]);

        $payment = Payment::create($request->all());

        $payment->unique_hash = Hash::make($payment->id);
        $paymentId = $payment->id;
        $payment->save();

        if($invoice->due_amount == $amount){
            $invoice->paid_status = 'PAID';
        }elseif(($amount > 0) && ($invoice->due_amount > $amount)){
            $invoice->paid_status = 'PARTIALLY_PAID';
        }else{
            $invoice->paid_status = 'UNPAID';
        }

        $invoice->due_amount = $invoice->due_amount - $amount;
        $invoice->base_due_amount = $invoice->base_due_amount - $amount*$exchangeRate;

        $invoice->save();
        // print_r($request->all());

        GeneratePaymentPdfJob::dispatch($payment);
        
        return response()->json([
            'payment' => $payment,
            'id' => $paymentId
        ], 200);
        
    }
}
