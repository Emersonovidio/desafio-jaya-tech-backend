<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'transaction_amount',
        'installments',
        'token',
        'payment_method_id',
        'payer_entity_type',
        'payer_type',
        'payer_identification_type',
        'payer_identification_number',
        'notification_url',
        'status'

    ];
}
