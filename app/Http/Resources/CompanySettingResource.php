<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\CompanySetting;
use App\Models\Company;

class CompanySettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // $currencyRow = CompanySettings::where('option','currency');
        return parent::toArray($request);
        // print_r($currencyRow);
        // return [
        //     'currency_id' => $currencyRow[0].value
        // ];
    }
}
