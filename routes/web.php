<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WifirumahController;
use App\Http\Controllers\ProfilpaketController;
use App\Http\Controllers\UserwifiController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/paketwifi', [App\Http\Controllers\ProfilpaketController::class, 'index']);
Route::get('/paketwifi/create', [App\Http\Controllers\ProfilpaketController::class, 'create']);
Route::post('/paketwifi/create', [App\Http\Controllers\ProfilpaketController::class, 'store']);
Route::get('/paketwifi/{id}/edit', [App\Http\Controllers\ProfilpaketController::class, 'edit']);
Route::post('/paketwifi', [App\Http\Controllers\ProfilpaketController::class, 'update']);
Route::get('/paketwifi/{id}/del', [App\Http\Controllers\ProfilpaketController::class, 'delete']);
Route::post('/getPaket', [App\Http\Controllers\ProfilpaketController::class, 'getPaket'])->name('getPaket');

Route::get('/datarumah', [App\Http\Controllers\WifirumahController::class, 'index']);
Route::get('/datarumah/create', [App\Http\Controllers\WifirumahController::class, 'create']);
Route::post('/datarumah/create', [App\Http\Controllers\WifirumahController::class, 'store']);
Route::get('/datarumah/{id}/edit', [App\Http\Controllers\WifirumahController::class, 'edit']);
Route::post('/datarumah', [App\Http\Controllers\WifirumahController::class, 'update']);
Route::get('/datarumah/{id}/del', [App\Http\Controllers\WifirumahController::class, 'delete']);
Route::post('/getRumah', [App\Http\Controllers\WifirumahController::class, 'getRumah'])->name('getRumah');

Route::get('/userwifi', [App\Http\Controllers\UserwifiController::class, 'index']);
Route::get('/userwifi/create', [App\Http\Controllers\UserwifiController::class, 'create']);
Route::post('/userwifi/create', [App\Http\Controllers\UserwifiController::class, 'store']);
Route::get('/userwifi/{id}/edit', [App\Http\Controllers\UserwifiController::class, 'edit']);
Route::post('/userwifi', [App\Http\Controllers\UserwifiController::class, 'update']);
Route::get('/userwifi/{id}/del', [App\Http\Controllers\UserwifiController::class, 'delete']);

Route::get('/invoice', [App\Http\Controllers\InvoiceController::class, 'index']);
Route::get('/invoice/create', [App\Http\Controllers\InvoiceController::class, 'create']);
Route::post('/invoice/create', [App\Http\Controllers\InvoiceController::class, 'store']);
Route::get('/invoice/{id}/edit', [App\Http\Controllers\InvoiceController::class, 'edit']);
Route::post('/invoice', [App\Http\Controllers\InvoiceController::class, 'update']);
Route::get('/invoice/{id}/del', [App\Http\Controllers\UserwifiController::class, 'delete']);