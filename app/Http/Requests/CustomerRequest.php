<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
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
        return [
            'name' => [
                'required'
            ],
            'email' => [
                'email',
                'nullable',
            ],
            'password' => [
                'nullable',
            ],
            'phone' => [
                'nullable',
            ],
            'company_name' => [
                'nullable',
            ],
            'contact_name' => [
                'nullable',
            ],
            'website' => [
                'nullable',
            ],
            'prefix' => [
                'nullable',
            ],
            'enable_portal' => [
                'boolean'
            ],
            'currency_id' => [
                'nullable',
            ],
            'billing_name' => [
                'nullable',
            ],
            'billing_address_street_1' => [
                'nullable',
            ],
            'billing_address_street_2' => [
                'nullable',
            ],
            'billing_city' => [
                'nullable',
            ],
            'billing_state' => [
                'nullable',
            ],
            'billing_country_id' => [
                'nullable',
            ],
            'billing_zip' => [
                'nullable',
            ],
            'billing_phone' => [
                'nullable',
            ],
            'billing_fax' => [
                'nullable',
            ],
            'gst_number' => [
                'nullable',
            ]
        ];

    }

    public function getCustomerPayload(){

        return collect($this->validated())
            ->only([
                'name',
                'email',
                'currency_id',
                'password',
                'phone',
                'prefix',
                'company_name',
                'contact_name',
                'website',
                'enable_portal',
                'estimate_prefix',
                'payment_prefix',
                'invoice_prefix',
                'gst_number'
            ])
            ->merge([
                'creator_id' => $this->user()->id,
                'company_id' => 1,
            ])
            ->toArray();
    }
}
