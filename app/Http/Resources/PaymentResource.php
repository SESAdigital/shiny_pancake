<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
            'duesName' => $this->duesName,
            'trackPayment' => $this->status,
            'amount' => $this->amount,
            'amountType' => $this->amountType,
            'start' => $this->start,
            'end' => $this->end,
            'user' => new EstateResource($this->user),
            'houseHold' => new HouseHoldResource($this->houseHold),
            // 'installment' => new InstallmentResource($this->installment),

        ];
    }
}
