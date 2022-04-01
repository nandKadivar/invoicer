<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Invoice extends Model
{
    use HasFactory;

    public static function createInvoice($request){
        $invoice = Invoice::create($request->all());
        $invoice->unique_hash = Hashids::connection(Invoice::class)->encode($invoice->id);

    }
}
