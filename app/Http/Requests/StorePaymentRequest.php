<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'transaction_amount' => 'required' | 'string',
            'installments' => 'required' | 'string',
            'token' => 'required' | 'string',
            'payment_method_id' => 'required' | 'string',
            'payer_email' => 'required' | 'string',
            'payer_identification_type' => 'required' | 'string',
            'payer_identification_number' => 'required' | 'string'
        ];
    }
}
