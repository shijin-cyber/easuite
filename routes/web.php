<?php

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
Auth::routes();
Route::get('/list', [App\Http\Controllers\ListController::class, 'index'])->name('list');
Route::get('/add-data', [App\Http\Controllers\FormController::class, 'create'])->name('add-data');
Route::post('/customer/store', [App\Http\Controllers\CustomerController::class, 'store'])->name('customer/store');
Route::get('/edit-customer/{id}', [App\Http\Controllers\CustomerController::class, 'edit']);
Route::post('/customer/update/{id}', [App\Http\Controllers\CustomerController::class, 'update']);
Route::post('/delete-customer/{id}', [App\Http\Controllers\CustomerController::class, 'delete']);

Route::post('/invoice/store', [App\Http\Controllers\InvoiceController::class, 'store'])->name('invoice/store');
Route::get('/edit-invoice/{id}', [App\Http\Controllers\InvoiceController::class, 'edit']);
Route::post('/invoice/update/{id}', [App\Http\Controllers\InvoiceController::class, 'update']);
Route::post('/delete-invoice/{id}', [App\Http\Controllers\InvoiceController::class, 'delete']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');