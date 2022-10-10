<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InstallmentResource extends JsonResource
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
            '' => $this->duesName,
            'installmentType' => $this->installmentType,
            'installmentAmount' => $this->installmentAmount,
            'amountType' => $this->amountType,
            'start' => $this->start,
            'end' => $this->end,
            'payment' => new PaymentResource($this->payment),
            // 'houseHold' => new HouseHoldResource($this->houseHold),
            // 'installment' => new InstallmentResource($this->installment),

        ];
    }
}
