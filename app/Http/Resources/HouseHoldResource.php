<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HouseHoldResource extends JsonResource
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
            'NumberOfAlpha' => $this->numberOfAlpha,
            'numberOfResidentUser' => $this->numberOfResidentUser,
            'ResidentClass' => $this->RClass,
            'ResidentCategory' => $this->RCat,
            'property' => new PropertyResource($this->property),
            'user' => new UserResource($this->user),

        ];
    }
}
