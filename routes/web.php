<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/form-client', function () {
//     return view('form.register-client');
// });

Route::get('/list-client', [ClientController::class, 'index'])->name('list.client');
Route::get('/form-client', [ClientController::class, 'create'])->name('form.client');
Route::post('/register-client', [ClientController::class, 'store'])->name('register.client');
Route::get('/edit-client/{id}', [ClientController::class, 'edit'])->name('edit.client')->where('id', '[0-9]+');
Route::get('/del-client/{id}', [ClientController::class, 'destroy'])->name('del.client')->where('id', '[0-9]+');
Route::get('/api-client/{id}', [ClientController::class, 'http_client'])->name('http.client')->where('id', '[0-9]+');
