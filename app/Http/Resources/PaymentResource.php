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
            'id' => $this->uuid,
            'status' => $this->status,
            'transaction_amount' => $this->transaction_amount,
            'installments' => $this->installments,
            'token' => $this->token,
            'payment_method_id' => $this->payment_method_id,
            'payer' => [
                'payer_entity_type' => $this->payer_entity_type,
                'payer_type' => $this->payer_type,
                'payer_email' => $this->payer_email,
                'payer_identification_type' => $this->payer_identification_type,
                'payer_identification_number' => $this->payer_identification_number
            ],
            'notification_url' => $this->notification_url,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
