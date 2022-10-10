<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EstateResource extends JsonResource
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
            'name' => $this->name,
            'address' => $this->address,
            'address' => $this->address,
            'state' => $this->state,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'manager' => new ManagerResource($this->manager),
            'securityCompany' => new SecurityCompanyResource($this->security),
            'securityGuard' => new SecurityGuardResource($this->securityGuard),
            'estate_fee' => $this->estate_fee,
            'sesa_fee' => $this->sesa_fee,
            'no_of_resident_users' => $this->no_of_resident_users,
            'additional_user' => $this->additional_user,
            'image' => asset('/estate/' . $this->image),
            'account_number' => $this->account_number,
            'account_name' => $this->account_name,
            'bank_name' => $this->bank_name,
            
            // 'estate_id'=>EstateResource::collection($this->estate)


        ];
    }
}
