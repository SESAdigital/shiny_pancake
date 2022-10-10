<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AccessResource extends JsonResource
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
            'SerialNumber' => $this->SN,
            'name' => $this->name,
            'phone' => $this->phone,
            'image' => asset('/ACARD/' . $this->image),
            'property' => new PropertyResource($this->property),

        ];
    }
}
