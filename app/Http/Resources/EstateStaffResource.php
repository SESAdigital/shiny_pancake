<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EstateStaffResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return  [

            'id' => $this->id,
            'f_name' => $this->f_name,
            'l_name' => $this->l_name,
            'phone' => $this->phone,
            'staff_code' => $this->staff_code,
            'dob' => $this->dob,
            'work_days' => $this->work_days,
            'gender' => $this->gender,
            'address' => $this->address,
            'message' => $this->message,
            'id_type' => $this->id_type,
            'id_number' => $this->id_number,
            'estate' => new EstateResource($this->estate),
    
            ];


    }
}
