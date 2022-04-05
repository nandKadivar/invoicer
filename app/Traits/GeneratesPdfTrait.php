<?php

namespace App\Traits;

trait GeneratesPdfTrait{
    
    public function generatePDF($collection_name, $file_name, $deleteExistingFile = false){
        $pdf = $this->getPDFData();

        \Storage::disk('local')->put('temp/'.$collection_name.'/'.$this->id.'/temp.pdf', $pdf->output());

        return true;

    }

    public function getFormattedString($format)
    {
        $values = array_merge($this->getFieldsArray(), $this->getExtraFields());

        $str = nl2br(strtr($format, $values));

        $str = preg_replace('/{(.*?)}/', '', $str);

        $str = preg_replace("/<[^\/>]*>([\s]?)*<\/[^>]*>/", '', $str);

        $str = str_replace("<p>", "", $str);

        $str = str_replace("</p>", "</br>", $str);

        return $str;
    }

    public function getFieldsArray()
    {
        $customer = $this->customer;
        $shippingAddress = $customer->shippingAddress ?? new Address();
        $billingAddress = $customer->billingAddress ?? new Address();
        $companyAddress = $this->company->address ?? new Address();

        $fields = [
            '{SHIPPING_ADDRESS_NAME}' => $shippingAddress->name,
            '{SHIPPING_COUNTRY}' => $shippingAddress->country_name,
            '{SHIPPING_STATE}' => $shippingAddress->state,
            '{SHIPPING_CITY}' => $shippingAddress->city,
            '{SHIPPING_ADDRESS_STREET_1}' => $shippingAddress->address_street_1,
            '{SHIPPING_ADDRESS_STREET_2}' => $shippingAddress->address_street_2,
            '{SHIPPING_PHONE}' => $shippingAddress->phone,
            '{SHIPPING_ZIP_CODE}' => $shippingAddress->zip,
            '{BILLING_ADDRESS_NAME}' => $billingAddress->name,
            '{BILLING_COUNTRY}' => $billingAddress->country_name,
            '{BILLING_STATE}' => $billingAddress->state,
            '{BILLING_CITY}' => $billingAddress->city,
            '{BILLING_ADDRESS_STREET_1}' => $billingAddress->address_street_1,
            '{BILLING_ADDRESS_STREET_2}' => $billingAddress->address_street_2,
            '{BILLING_PHONE}' => $billingAddress->phone,
            '{BILLING_ZIP_CODE}' => $billingAddress->zip,
            '{COMPANY_NAME}' => $this->company->name,
            '{COMPANY_COUNTRY}' => $companyAddress->country_name,
            '{COMPANY_STATE}' => $companyAddress->state,
            '{COMPANY_CITY}' => $companyAddress->city,
            '{COMPANY_ADDRESS_STREET_1}' => $companyAddress->address_street_1,
            '{COMPANY_ADDRESS_STREET_2}' => $companyAddress->address_street_2,
            '{COMPANY_PHONE}' => $companyAddress->phone,
            '{COMPANY_ZIP_CODE}' => $companyAddress->zip,
            '{CONTACT_DISPLAY_NAME}' => $customer->name,
            '{PRIMARY_CONTACT_NAME}' => $customer->contact_name,
            '{CONTACT_EMAIL}' => $customer->email,
            '{CONTACT_PHONE}' => $customer->phone,
            '{CONTACT_WEBSITE}' => $customer->website,
        ];

        // $customFields = $this->fields;
        // $customerCustomFields = $this->customer->fields;

        // foreach ($customFields as $customField) {
        //     $fields['{'.$customField->customField->slug.'}'] = $customField->defaultAnswer;
        // }

        // foreach ($customerCustomFields as $customField) {
        //     $fields['{'.$customField->customField->slug.'}'] = $customField->defaultAnswer;
        // }

        // foreach ($fields as $key => $field) {
        //     $fields[$key] = htmlspecialchars($field, ENT_QUOTES, 'UTF-8');
        // }

        return $fields;
    }
}

?>