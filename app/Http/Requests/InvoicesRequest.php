<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\CompanySetting;
use App\Models\Customer;
use App\Models\Invoice;

class InvoicesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'invoice_date' => [
                'required',
            ],
            'due_date' => [
                'nullable',
            ],
            'customer_id' => [
                'required',
            ],
            'invoice_number' => [
                'required',
                // Rule::unique('invoices')->where('company_id', 1)
            ],
            'exchange_rate' => [
                'nullable'
            ],
            'discount' => [
                'nullable',
            ],
            'discount_val' => [
                'nullable',
            ],
            'sub_total' => [
                'required',
            ],
            'total' => [
                'required',
            ],
            'tax' => [
                'nullable',
            ],
            'template_name' => [
                'nullable'
            ],
            'items' => [
                'required',
                'array',
            ],
            // 'items.*' => [
            //     'required',
            //     'max:255',
            // ],
            // 'items.*.description' => [
            //     'nullable',
            // ],
            // 'items.*.name' => [
            //     'required',
            // ],
            // 'items.*.quantity' => [
            //     'required',
            // ],
            // 'items.*.price' => [
            //     'required',
            // ],
        ];

        // $companyCurrency = CompanySetting::getSetting('currency', $this->header('company'));

        // $customer = Customer::find($this->customer_id);

        // if ($customer && $companyCurrency) {
        //     if ((string)$customer->currency_id !== $companyCurrency) {
        //         $rules['exchange_rate'] = [
        //             'required',
        //         ];
        //     };
        // }

        // if ($this->isMethod('PUT')) {
        //     $rules['invoice_number'] = [
        //         'required',
        //         Rule::unique('invoices')
        //             ->ignore($this->route('invoice')->id)
        //             ->where('company_id', $this->header('company')),
        //     ];
        // }

        return $rules;
    }

    public function getInvoicePayload(){
        $company_currency = CompanySetting::getSetting('currency', $this->company_id);
        $current_currency = $this->currency_id;
        $exchange_rate = $company_currency != $current_currency ? $this->exchange_rate : 1;
        $currency = Customer::find($this->customer_id)->currency_id;

        return collect($this->except('items', 'taxes'))
            ->merge([
                'creator_id' => $this->user()->id ?? null,
                'status' => $this->has('invoiceSend') ? Invoice::STATUS_SENT : Invoice::STATUS_DRAFT,
                'paid_status' => Invoice::STATUS_UNPAID,
                'company_id' => $this->company_id,
                // 'tax_per_item' => CompanySetting::getSetting('tax_per_item', $this->header('company')) ?? 'NO ',
                'tax_per_item' => 'NO ',
                // 'discount_per_item' => CompanySetting::getSetting('discount_per_item', $this->header('company')) ?? 'NO',
                'discount_per_item' => 'NO',
                'due_amount' => $this->total,
                'exchange_rate' => $exchange_rate,
                'base_total' => $this->total * $exchange_rate,
                'base_discount_val' => $this->discount_val * $exchange_rate,
                'base_sub_total' => $this->sub_total * $exchange_rate,
                'base_tax' => $this->tax * $exchange_rate,
                'base_due_amount' => $this->total * $exchange_rate,
                'currency_id' => $currency,
            ])
            ->toArray();
    }
}
