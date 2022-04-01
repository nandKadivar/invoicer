<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
                'required',
            ],
            'discount_val' => [
                'required',
            ],
            'sub_total' => [
                'required',
            ],
            'total' => [
                'required',
            ],
            'tax' => [
                'required',
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
}
