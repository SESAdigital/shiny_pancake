<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResidentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'f_name'=>$this->f_name,
            'email'=>$this->email,
            'image' => asset('/image/' . $this->image),
            'phone'=>$this->phone,
            'gender'=>$this->gender,
            'status'=>$this->status,
            'id_type'=>$this->id_type,
            'id_number'=>$this->id_number,
            // 'estate' => new EstateResource($this->estate),

            // 'estate_id'=>EstateResource::collection($this->estate)
        ];
    }
}
