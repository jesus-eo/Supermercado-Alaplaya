<?php

use App\Http\Controllers\TicketController;
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
    return view('index');
})->name('index');

Route::get('/productos', function () {
    return view('productos/cajaAmiga');
})->name('productos');

Route::get('/abonarCompra',[TicketController::class, 'create'])->name('abonarCompra');

Route::post('/pagarTasa',[TicketController::class, 'store'])->name('pagarTasa');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
