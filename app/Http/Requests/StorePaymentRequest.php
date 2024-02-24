<?php

namespace App\Http\Requests\Payments;

use App\Http\Requests\BaseFormRequest;

class StorePaymentRequest  extends BaseFormRequest
{

    public function rules(): array
    {
        return [
            'transaction_amount' => 'required',
            'installments' => 'required',
            'payment_method_id' => 'required',
            'payer_identification_number' => 'required',
            'status' => 'required',


        ];
    }
}
