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

Route::get('/datarumah', [App\Http\Controllers\WifirumahController::class, 'index']);
Route::get('/datarumah/create', [App\Http\Controllers\WifirumahController::class, 'create']);
Route::post('/datarumah/create', [App\Http\Controllers\WifirumahController::class, 'store']);
Route::get('/datarumah/{id}/edit', [App\Http\Controllers\WifirumahController::class, 'edit']);
Route::post('/datarumah', [App\Http\Controllers\WifirumahController::class, 'update']);
Route::get('/datarumah/{id}/del', [App\Http\Controllers\WifirumahController::class, 'delete']);

Route::get('/hotspotuser', [App\Http\Controllers\WifirumahController::class, 'index']);
Route::get('/hotspotuser/create', [App\Http\Controllers\WifirumahController::class, 'create']);
Route::post('/hotspotuser/create', [App\Http\Controllers\WifirumahController::class, 'store']);
Route::get('/hotspotuser/{id}/edit', [App\Http\Controllers\WifirumahController::class, 'edit']);
Route::post('/hotspotuser', [App\Http\Controllers\WifirumahController::class, 'update']);
Route::get('/hotspotuser/{id}/del', [App\Http\Controllers\WifirumahController::class, 'delete']);