<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentsResource extends JsonResource
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
            'transaction_amount' => $this->amount,
            'payment_method_id' => $this->payment_method_id,
            'status' => $this->status,
            'payer_type' => $this->payer_type,
            'payer_identification_number' => $this->payer_identification_number,

        ];
    }
}
