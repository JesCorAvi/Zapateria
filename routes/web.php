<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\ZapatoController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect()->route('zapatos.index');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::resource('zapatos', ZapatoController::class);
Route::resource('carritos', CarritoController::class)->middleware("auth");
Route::resource('facturas', FacturaController::class)->middleware("auth");


Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('zapatos.index');
})->name('logout');


Route::delete('/carritos/vaciar/{user_id}', [CarritoController::class, 'vaciar'])->name('carritos.vaciar')->middleware("auth");
Route::post('/carritos/comprar/{user_id}', [CarritoController::class, 'comprar'])->name('carritos.comprar')->middleware("auth");


require __DIR__.'/auth.php';
