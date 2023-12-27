<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Invoice\InvoiceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {

  Route::post('/register', [RegisterController::class, 'store']);
  Route::post('/login', [AuthController::class, 'login']);

  
  Route::middleware(['jwt.auth'])->group(function () {
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
});