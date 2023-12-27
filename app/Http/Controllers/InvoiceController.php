<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Notifications\Notification;
use App\Http\Resources\InvoicesResource;
use App\Http\Requests\Auth\InvoiceRequest;


class InvoiceController extends Controller
{
    private $invoices;

    public function __construct(Invoice $invoices)
    {
       
        $this->invoices = $invoices;
    }

      public function index()
    {
        $query = $this->invoices->orderBy('id');

        $results = $query->paginate(10);

        return InvoicesResource::collection($results);
    }

    public function show(string $id)
    {
        $results = $this->invoices->findOrFail($id);

        return new InvoicesResource($results);
    }
  
    public function store(InvoiceRequest $request) {
        
        try {

             $newInvoice =  Invoice::create(([
                'user_id' => $request->user_id,
                'amount' => $request->amount,
                'issuance_date' => $request->issuance_date,
                'cnpj_sender' => $request->cnpj_sender,
                'name_sender' => $request->name_sender,
                'cnpj_carrier' => $request->cnpj_carrier,
                'name_carrier' => $request->name_carrier
            ]));
            
            return response()->json([
                'user' => $newInvoice,
                'message' => 'Nova Nota fiscal criada com sucesso.'
            ], 200);
        } catch (\Exception $e) {
            
            return response()->json([
                'message' => 'Falha ao criar nova nota fiscal.'
            ], 500);
        }

    }
    public function destroy(string $id)
    {
        $result = $this->invoices->findOrFail($id);

        try {

            $result->delete();

            return response()->json([
                'message' => 'Nota fiscal excluida com sucesso!'
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Falha ao excluir Nota fiscal'
            ], 500);

        }
    }
    
}
