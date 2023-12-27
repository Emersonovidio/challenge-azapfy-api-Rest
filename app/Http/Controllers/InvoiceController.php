<?php

namespace App\Http\Controllers\Invoice;


use App\Http\Controllers\Controller;
use App\Models\Invoice\Invoices;
use App\Http\Resources\Api\Dashboard\Invoice\InvoicesResource;



class InvoiceController extends Controller
{
    private $invoice;

    public function __construct(Invoices $invoices)
    {
        $this->invoice = $invoices;
    }


    public function index()
    {
        $query = $this->invoice->orderBy('id');

        $results = $query->paginate(10);

        return InvoicesResource::collection($results);
    }
}
