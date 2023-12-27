<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InvoiceController;

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
  Route::post('/signin', [AuthController::class, 'login'])->name('login');

  
  Route::middleware(['jwt.auth'])->group(function () {
    /**
     * Invoices
     */
    Route::middleware('auth-sanctum')->prefix('/invoices')->group(function () {
      Route::get('/', [InvoiceController::class, 'index']);
      Route::get('/{id}', [InvoiceController::class, 'show']);
      Route::post('/', [InvoiceController::class, 'store']);
      Route::put('/{id}', [InvoiceController::class, 'update']);
      Route::delete('/{id}', [InvoiceController::class, 'destroy']);
      
    });
  });
});