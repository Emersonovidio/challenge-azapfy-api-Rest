<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Invoices;
use App\Http\Resources\Api\Dashboard\Invoice\InvoicesResource;



class InvoiceController extends Controller
{
    private $invoice;

    public function __construct(Invoices $invoice)
    {
        $this->invoice = $invoice;
    }


    public function index()
    {
        $query = $this->invoice->orderBy('id');

        $results = $query->paginate(10);

        return InvoicesResource::collection($results);
    }
}
