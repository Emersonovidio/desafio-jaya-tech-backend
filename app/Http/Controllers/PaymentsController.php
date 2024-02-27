<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payments\UpdatePaymentRequest;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Resources\PaymentsResource;
use App\Http\Resources\PaymentResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Payments;
use Ramsey\Uuid\Uuid;


class PaymentsController extends Controller
{
    private $payments;

    public function __construct(Payments $payments)
    {
        $this->payments = $payments;
    }

    public function index(Request $request)
    {
        $query = $this->payments->get();

        if ($request->filled('payment_method_id')) {
            $query = $query->where('payment_method_id', $request->payment_method_id);
        }

        if ($request->filled('status')) {
            $query = $query->where('status', $request->status);
        }

        if ($request->filled('installments')) {
            $query = $query->where('installments', $request->installments);
        }

        return PaymentsResource::collection($query);
    }

    public function show(string $uuid)
    {
        $payment = Payments::whereUuid($uuid)->first();

        return new PaymentResource($payment);
    }

    public function store(StorePaymentRequest $request)
    {
        DB::beginTransaction();

        $uuid = Uuid::uuid4()->toString();
        try {

            $payment = Payments::create($request->safe()->merge([
                'uuid' => $uuid,
                'transaction_amount',
                'installments',
                'token',
                'payment_method_id',
                'payer_email',
                'payer_identification_type',
                'payer_identification_number'
            ])->all());

            DB::commit();

            return response()->json([
                'data' => [
                    'id' => $uuid,
                    'created_at' => $payment->created_at
                ]
            ], 201);
        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Falha ao criar pagamento.'
            ], 400);
        }
    }

    public function cancel(string $uuid)
    {
        $payment = Payments::whereUuid($uuid)->first();

        try {
            $payment->update([
                'status' => 'canceled'
            ]);

            return response()->json([
                'message' => 'Pagamento cancelado com sucesso!'
            ], 201);
        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Falha ao cancelar Pagamento.'
            ], 500);
        }
    }

    public function confirm(Request $request, string $uuid)
    {
        $payment = Payments::whereUuid($uuid)->first();

        try {

            $payment->update([
                'status' => $request->input('status')
            ]);

            return response()->json([
                'message' => 'Pagamento confirmado com sucesso!'
            ], 201);
        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Falha ao confirmar pagamento'
            ], 500);
        }
    }
}
