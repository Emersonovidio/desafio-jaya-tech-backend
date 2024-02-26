<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Payments extends Model
{
    use HasFactory;

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
