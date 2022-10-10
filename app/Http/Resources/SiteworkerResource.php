<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SiteworkerResource extends JsonResource
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
            'f_name'=>$this->f_name,
            'm_name'=>$this->m_name,
            'l_name'=>$this->l_name,
            'email'=>$this->email,
            'dob'=>$this->dob,
            'address'=>$this->address,
            'work_days'=>$this->work_days,
            'time_in'=>$this->time_in,
            'time_out'=>$this->time_out,
            'image' => asset('/Siteworker/' . $this->image),
            'phone'=>$this->phone,
            'gender'=>$this->gender,
            'id_type'=>$this->id_type,
            'id_number'=>$this->id_number,
            'message'=>$this->message,
            'property' => new PropertyResource($this->property),
        ];
    }
}
