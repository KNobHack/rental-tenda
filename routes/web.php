<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\TendaController;
use App\Http\Controllers\TipeTendaController;
use App\Http\Controllers\TransaksiController;
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
    return redirect()->route('beranda');
});

Route::group(['middleware' => 'auth'], function () {

    Route::group(['middleware' => 'role:admin'], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('tenda', TendaController::class);
        Route::resource('tipe_tenda', TipeTendaController::class)->except(['show']);
        Route::resource('barang', BarangController::class)->except(['show']);
        Route::resource('paket', PaketController::class)->except(['show']);
        Route::resource('customer', CustomerController::class)->except(['show']);

        Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    });
});
Route::get('/beranda', [HomeController::class, 'beranda'])->name('beranda');
