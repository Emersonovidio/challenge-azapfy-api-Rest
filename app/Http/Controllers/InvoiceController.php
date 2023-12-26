<?php

namespace App\Http\Controllers\Api\Dashboard\Invoice;


use App\Http\Controllers\Controller;
use App\Models\Invoice\Invoice;
use App\Http\Resources\Api\Dashboard\Invoice\InvoicesResource;



class InvoiceController extends Controller
{
    private $invoice;


    public function __construct(Invoice $invoices)
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
