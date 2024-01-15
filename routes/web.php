<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeranjangController;
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

Route::get('/beranda', [HomeController::class, 'beranda'])->name('beranda');
Route::get('/sewa/paket', [HomeController::class, 'sewaPaket'])->name('sewa-paket');
Route::get('/sewa/tenda', [HomeController::class, 'sewaTenda'])->name('sewa-tenda');
Route::get('/sewa/barang', [HomeController::class, 'sewaBarang'])->name('sewa-barang');
Route::get('/sewa/detail/paket/{paket}', [HomeController::class, 'detailPaket'])->name('sewa-detail-paket');
Route::get('/sewa/detail/tenda/{tenda}', [HomeController::class, 'detailTenda'])->name('sewa-detail-tenda');
Route::get('/sewa/detail/barang/{barang}', [HomeController::class, 'detailBarang'])->name('sewa-detail-barang');
Route::group(['middleware' => 'auth'], function () {

    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang');
    Route::post('/keranjang/tambah/paket/{paket}', [KeranjangController::class, 'tambahPaket'])->name('keranjang.tambah.paket');
    Route::post('/keranjang/tambah/tenda/{tenda}', [KeranjangController::class, 'tambahTenda'])->name('keranjang.tambah.tenda');
    Route::post('/keranjang/tambah/barang/{barang}', [KeranjangController::class, 'tambahBarang'])->name('keranjang.tambah.barang');
    Route::delete('/keranjang/hapus/paket/{paket}', [KeranjangController::class, 'hapusPaket'])->name('keranjang.hapus.paket');
    Route::delete('/keranjang/hapus/tenda/{tenda}', [KeranjangController::class, 'hapusTenda'])->name('keranjang.hapus.tenda');
    Route::delete('/keranjang/hapus/barang/{barang}', [KeranjangController::class, 'hapusBarang'])->name('keranjang.hapus.barang');
    Route::post('/keranjang/set/tanggal', [KeranjangController::class, 'setTanggal'])->name('keranjang.setTanggal');
    Route::get('/checkout', [KeranjangController::class, 'checkoutPreview'])->name('checkout.preview');
    Route::post('/checkout', [KeranjangController::class, 'checkout'])->name('checkout');

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
