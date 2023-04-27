<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// Route::post('/invoices', [InvoiceController::class, 'store']);
Route::get('/invoices/{id}/pdf', [InvoiceController::class, 'show']);
Route::get('/invoices', [InvoiceController::class, 'index']);
Route::get('/invoices/{id}/send-invoice', [InvoiceController::class, 'sendEmail']);

