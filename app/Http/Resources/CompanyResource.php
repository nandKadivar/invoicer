<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'logo' => $this->logo,
            'logo_path' => $this->logo_path,
            'unique_hash' => $this->unique_hash,
            'owner_id' => $this->owner_id,
            'slug' => $this->slug,
            'roles' => $this->role,
            'address' => $this->when($this->address()->exists(),function(){
                return new AddressResource($this->address);
            }),
            'settings' => $this->when($this->settings()->exists(),function(){
                return new CompanySettingResource($this->settings);
            })
        ];
    }
}
