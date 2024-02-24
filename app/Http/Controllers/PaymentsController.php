<?php

namespace App\Http\Controllers\PaymentsController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payments\StorePaymentRequest;
use App\Http\Requests\Payments\UpdatePaymentRequest;
use App\Http\Resources\Payments\PaymentsResource;
use App\Http\Resources\Payments\PaymentResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Payments;

class PaymentsController extends Controller
{
    private $payments;

    public function __construct(Payments $payments)
    {

        $this->payments = $payments;
    }

    public function index(Request $request)
    {
        $query = $this->payments->orderBy('active', 'DESC');


        $results = $query->paginate(10);

        return PaymentsResource::collection($results);
    }

    public function show($uuid)
    {
        $quickAccess = $this->payments->findByUuid($uuid);

        return new PaymentResource($quickAccess);
    }

    public function store(StorePaymentRequest $request)
    {
        try {

            $result = $this->payments->create($request->all());


            return response()->json([
                'message' => 'Pagamento criado com sucesso!'
            ], 200);
        } catch (\Exception $e) {
            Log::error($e->getMessage());

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
