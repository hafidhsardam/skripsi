<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Invoice_pdf;
use App\Http\Controllers\Produk;
use App\Http\Controllers\PurchaseOrder;
use App\Http\Controllers\PurchaseRequest;
use App\Http\Controllers\RequestQuotation;
use App\Http\Controllers\Users;
use App\Http\Controllers\Vendor;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/invoice_POS/{id}', [Invoice_pdf::class, 'invoice_po']);

Route::get('/invoice_PRS/{id}', [Invoice_pdf::class, 'invoice_pr']);

Route::resource('PurchaseRequest', PurchaseRequest::class);

Auth::routes();

Route::get('Dashboard', [Dashboard::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('StoreRFQ/{id}', [RequestQuotation::class, 'StoreRFQ']);

Route::resource('RequestQuotations', RequestQuotation::class);

Route::resource('PurchaseOrder', PurchaseOrder::class);

Route::get('/cancel/{id}', [PurchaseOrder::class, 'cancel']);

Route::get('/approved/{id}', [PurchaseOrder::class, 'approved']);

Route::post('/received/{id}', [PurchaseOrder::class, 'received']);

Route::get('/search', [Dashboard::class,'search']);

Route::resource('Produk', Produk::class);

Route::resource('Vendor', Vendor::class);

Route::resource('Users', Users::class);

Route::get('delete/{id}', [PurchaseOrder::class,'delete']);

Route::get('delete_prod/{id}', [Produk::class,'delete']);

Route::get('delete_vendor/{id}', [Vendor::class,'delete']);

Route::get('delete_user/{id}', [Users::class,'delete']);