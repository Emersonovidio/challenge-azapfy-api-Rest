<?php

use App\Http\Controllers\Api\Dashboard\Account\AccountController;
use App\Http\Controllers\Api\Dashboard\Auth\AuthController;
use App\Http\Controllers\Api\Dashboard\Invoice;
use App\Http\Controllers\Api\Dashboard\Invoice\InvoiceController;
use Illuminate\Support\Facades\Route;



Route::post('/register',[AccountController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware(['jwt.auth'])->group(function (){
       /**
         * Invoices
         */
        Route::prefix('/invoices')->group(function () {
            Route::get('/', [InvoiceController::class, 'index']);
            Route::post('/', [InvoiceController::class, 'store']);
            Route::put('/{uuid}', [InvoiceController::class, 'update']);
            Route::delete('/{uuid}', [InvoiceController::class, 'destroy']);
        });
});