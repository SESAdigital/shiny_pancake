<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
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

            'id'=>$this->id,
            'propertyCode' => $this->propertyCode,
            'street_name' => $this->street_name,
            'no_of_resident_users' => $this->no_of_resident_users,
            'address_description' => $this->address_description,
            'flat_block_number' => $this->flat_block_number,
            'propertyCategory' => $this->property_category,
            'business_name' => $this->business_name,
            'estate' => new EstateResource($this->estate),
            'propertyType' => new PropertyTypeResource($this->propertyType),
            // 'propertyCat'=>PropertyCatResource::collection($this->propertyCat)


        ];
    }
}
