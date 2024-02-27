<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'transaction_amount' => 'required|string|max:255',
            'installments' => 'required|string',
            'token' => 'required|string',
            'payment_method_id' => 'required|string',
            'payer_email' => 'required|string',
            'payer_identification_type' => 'required|string|max:11',
            'payer_identification_number' => 'required|string'
        ];
    }
}
