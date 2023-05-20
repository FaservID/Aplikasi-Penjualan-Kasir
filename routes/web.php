<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\FrondEndController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KonsumenController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StockController;
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

Route::get('/', [FrondEndController::class, 'index'])->name('fe.index');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('profile', ProfileController::class);

Route::post('/profile/reset-password', [ProfileController::class, 'reset'])->name('profile.reset');

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->prefix('admin')->group(function () {

    Route::get('home', [HomeController::class, 'adminHome'])->name('admin.home');

    Route::resource('barang', BarangController::class);

    Route::resource('kategori', KategoriController::class);

    Route::resource('stock', StockController::class);

    Route::resource('konsumen', KonsumenController::class);

    Route::resource('pesanan', PesananController::class);

    Route::resource('pembayaran', PembayaranController::class);

    Route::post('pesanan/cart', [PesananController::class, 'addCart'])->name('admin.pesanan.cart');

    Route::get('riwayat-pesanan', [PesananController::class, 'history'])->name('admin.pesanan.history');

    Route::get('invoice/{pesanan}', [PesananController::class, 'invoice'])->name('admin.pesanan.invoice');

    Route::match(['put', 'patch'], 'pesanan/selesaikan/{pesanan}', [PesananController::class, 'finishOrder'])->name('admin.pesanan.finishOrder');


    /* LAPORAN */

    Route::get('laporan/stock', [LaporanController::class, 'laporanStock'])->name('admin.pesanan.laporan_stock');

    Route::post('laporan/stock', [LaporanController::class, 'cetakLaporanStock'])->name('admin.pesanan.cetak_laporan_stock');

    Route::get('laporan/transaksi', [LaporanController::class, 'laporanTransaksi'])->name('admin.pesanan.laporan_transaksi');

    Route::post('laporan/transaksi', [LaporanController::class, 'cetakLaporanTransaksi'])->name('admin.pesanan.cetak_laporan_transaksi');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:pimpinan'])->group(function () {

    Route::get('/pimpinan/home', [HomeController::class, 'pimpinanHome'])->name('pimpinan.home');
});
