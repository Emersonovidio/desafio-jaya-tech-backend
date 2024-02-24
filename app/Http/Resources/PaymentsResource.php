<?php

namespace App\Http\Resources\Payments;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'transaction_amount' => $this->amount,
            'payment_method_id' => $this->payment_method_id,
            'status' => $this->status,
            'payer_type' => $this->payer_type,
            'payer_identification_number' => $this->payer_identification_number,

        ];
    }
}
