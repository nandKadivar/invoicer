<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade as PDF;
use App\Traits\GeneratesPdfTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendInvoiceMail;

class Invoice extends Model
{
    use HasFactory;
    use GeneratesPdfTrait;

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

    protected $appends = [
        'formattedCreatedAt',
        'formattedInvoiceDate',
        'formattedDueDate',
        'invoicePdfUrl',
    ];

    public function items(){
        return $this->hasMany('App\Models\InvoiceItem');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function getCompanyAddress()
    {
        if ($this->company && (! $this->company->address()->exists())) {
            return false;
        }

        $format = CompanySetting::getSetting('invoice_company_address_format', $this->company_id);

        return $this->getFormattedString($format);
    }

    public function getCustomerShippingAddress()
    {
        if ($this->customer && (! $this->customer->shippingAddress()->exists())) {
            return false;
        }

        $format = CompanySetting::getSetting('invoice_shipping_address_format', $this->company_id);

        return $this->getFormattedString($format);
    }

    public function getCustomerBillingAddress()
    {
        if ($this->customer && (! $this->customer->billingAddress()->exists())) {
            return false;
        }

        $format = CompanySetting::getSetting('invoice_billing_address_format', $this->company_id);

        return $this->getFormattedString($format);
    }

    public function getNotes()
    {
        return $this->getFormattedString($this->notes);
    }

    public function getFormattedInvoiceDateAttribute($value)
    {
        $dateFormat = CompanySetting::getSetting('carbon_date_format', $this->company_id);

        return Carbon::parse($this->invoice_date)->format($dateFormat);
    }

    public function getFormattedDueDateAttribute($value)
    {
        $dateFormat = CompanySetting::getSetting('carbon_date_format', $this->company_id);

        return Carbon::parse($this->due_date)->format($dateFormat);
    }

    public function getFormattedCreatedAtAttribute($value)
    {
        $dateFormat = CompanySetting::getSetting('carbon_date_format', $this->company_id);

        return Carbon::parse($this->created_at)->format($dateFormat);
    }

    public function getFormattedNotesAttribute($value)
    {
        return $this->getNotes();
    }

    public function getInvoicePdfUrlAttribute()
    {
        return url('/invoices/pdf/'.$this->unique_hash);
    }

    public function getExtraFields()
    {
        return [
            '{INVOICE_DATE}' => $this->formattedInvoiceDate,
            '{INVOICE_DUE_DATE}' => $this->formattedDueDate,
            '{INVOICE_NUMBER}' => $this->invoice_number,
            '{INVOICE_REF_NUMBER}' => $this->reference_number,
        ];
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

        $invoice = Invoice::with([
            'items',
            'customer',
        ])->find($invoice->id);

        return $invoice;
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

    public function getPDFData(){
        $company = Company::find($this->company_id);
        $logo = $company->logo_path;

        view()->share([
            'invoice' => $this,
            // 'customFields' => $customFields,
            'company_address' => $this->getCompanyAddress(),
            'shipping_address' => $this->getCustomerShippingAddress(),
            'billing_address' => $this->getCustomerBillingAddress(),
            'notes' => $this->getNotes(),
            'logo' => $logo ?? null,
            // 'taxes' => $taxes,
        ]);

        return PDF::loadView('pdf.invoice.'.'invoice1');
    }

    public function send($data){
        Mail::to($data['to'])->send(new SendInvoiceMail($data));
        // print_r($data['to']);
        return response()->json([
                'success' => true, 
                'message' => "Mail sent"
            ], 
            200
        );
    }

    public static function deleteInvoice($id)
    {
        $invoice = Invoice::find($id);

        // if ($invoice->transactions()->exists()) {
        //     $invoice->transactions()->delete();
        // }

        $invoice->delete();
        
        return true;
    }

}
