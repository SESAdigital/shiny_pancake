<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArtisanResource extends JsonResource
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
        'f_name' => $this->f_name,
        'l_name' => $this->l_name,
        'email' => $this->email,
        'address' => $this->address,
        'phone' => $this->phone,
        'gender' => $this->gender,
        'business_name' => $this->business_name,
        'image' => asset('/artisan/' . $this->image),
        'category' => new ArtisanCategoryResource($this->category),
        // 'category' =>  ArtisanCategoryResource::collection($this->category),
        'id_type' => $this->id_type,
        'status' => $this->status,
        'created_at' => (string) $this->created_at,
        'updated_at' => (string) $this->updated_at,
      ];
    }

          
}
