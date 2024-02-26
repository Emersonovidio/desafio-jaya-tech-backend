<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payments\UpdatePaymentRequest;
use App\Http\Requests\Payments\StorePaymentRequest;
use App\Http\Resources\PaymentsResource;
use App\Http\Resources\PaymentResource;
use Illuminate\Http\Request;
use App\Models\Payments;

class PaymentsController extends Controller
{
    private $payments;

    public function __construct(Payments $payments)
    {
        $this->payments = $payments;
    }

    public function index()
    {
        $query = $this->payments->get();

        return PaymentsResource::collection($query);
    }

    public function show(string $uuid)
    {
        // $payment = $this->payments->findByUuid($uuid);

        $payment = Payments::where('uuid')->firstOrFail();


        // return $payment;
        return new PaymentResource($payment);
    }

    public function store(StorePaymentRequest $request)
    {
        try {

            $payment = $this->payments->create($request->all());


            return response()->json([
                'message' => 'Payment Created!'
            ], 201);
        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Falha ao criar pagamento.'
            ], 500);
        }
    }

    public function update(UpdatePaymentRequest $request, $uuid)
    {
        $result = $this->payments->findByUuid($uuid);
        try {
            $result->update($request->all());


            return response()->json([
                'message' => 'Pagamento atualizado com sucesso!'
            ], 200);
        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Falha ao atualizar Pagamento.'
            ], 500);
        }
    }

    public function destroy(string $uuid)
    {
        $result = $this->payments->findByUuid($uuid);

        try {

            $result->delete();

            return response()->json([
                'message' => 'Pagamento excluido com sucesso!'
            ], 200);
        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Falha ao excluir Pagamento'
            ], 500);
        }
    }
}
