<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('invoice.create');

Route::get('/', [InvoiceController::class, 'index'])->name("show-invoices");
Route::post('/invoice-store', [InvoiceController::class, 'store']);
Route::get('/send-invoice/{id}', [InvoiceController::class, 'sendEmail']);
Route::get('/invoices/{id}/pdf', [InvoiceController::class, 'show'])->name('display-invoice');


