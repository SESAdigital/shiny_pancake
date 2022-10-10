<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RFIDResource extends JsonResource
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
            'VRNumber' => $this->VRNumber,
            'VMake' => $this->VMake,
            'VType' => $this->VType,
            'image' => asset('/RFIDS/' . $this->image),
            'property' => new PropertyResource($this->property),

        ];
    }
}
