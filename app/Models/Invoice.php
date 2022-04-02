<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Invoice extends Model
{
    use HasFactory;

    public const STATUS_DRAFT = 'DRAFT';
    public const STATUS_SENT = 'SENT';
    public const STATUS_VIEWED = 'VIEWED';
    public const STATUS_OVERDUE = 'OVERDUE';
    public const STATUS_COMPLETED = 'COMPLETED';

    public const STATUS_DUE = 'DUE';
    public const STATUS_UNPAID = 'UNPAID';
    public const STATUS_PARTIALLY_PAID = 'PARTIALLY_PAID';
    public const STATUS_PAID = 'PAID';

    protected $guarded = ['id'];

    protected $fillable = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'invoice_date',
        'due_date'
    ];

    protected $casts = [
        'total' => 'integer',
        'tax' => 'integer',
        'sub_total' => 'integer',
        'discount' => 'float',
        'discount_val' => 'integer',
        'exchange_rate' => 'float'
    ];

    public function items(){
        return $this->hasMany('App\Models\InvoiceItem');
    }

    public static function createInvoice($request){
        $data = $request->getInvoicePayload();
        $invoice = Invoice::create($data);
        $invoice->unique_hash = Hash::make($invoice->id);
        $invoice->save();
        // $invoice->creator_id = Auth::user()->id;
        // $invoice->unique_hash = Hashids::connection(Invoice::class)->encode($invoice->id);
        self::createItems($invoice, $request->items);
        // print_r($request->all());
    }

    public static function createItems($invoice, $invoiceItems){
        $exchange_rate = $invoice->exchange_rate;

        foreach($invoiceItems as $invoiceItem){
            $invoiceItem['company_id'] = $invoice->company_id;
            $invoiceItem['exchange_rate'] = $exchange_rate;
            $invoiceItem['base_price'] = $invoiceItem['price'] * $exchange_rate;
            // $invoiceItem['base_discount_val'] = $invoiceItem['discount_val'] * $exchange_rate;
            $invoiceItem['base_tax'] = $invoiceItem['tax'] * $exchange_rate;
            $invoiceItem['base_total'] = $invoiceItem['total'] * $exchange_rate;
            
            $item = $invoice->items()->create($invoiceItem);
        }

    }
}
