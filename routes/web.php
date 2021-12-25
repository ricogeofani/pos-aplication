<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoryController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\CartController;
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


Route::get('/dashboard', [AdminController::class, 'dashboard']);
Route::get('/barang', [AdminController::class, 'barang']);
Route::get('/kategory', [AdminController::class, 'kategory']);
Route::get('/pelanggan', [AdminController::class, 'pelanggan']);
Route::get('/karyawan', [AdminController::class, 'karyawan']);
Route::get('/suplier', [AdminController::class, 'suplier']);
Route::get('/transaksiPenjualan', [AdminController::class, 'transaksiPenjualan']);
Route::get('/transaksiPembelian', [AdminController::class, 'transaksiPembelian']);
Route::get('/pembelian', [AdminController::class, 'pembelian']);
Route::get('/cartPenjualan', [AdminController::class, 'cartPenjualan']);
Route::get('/cartPembelian', [AdminController::class, 'cartPembelian']);
Route::get('/penjualan', [AdminController::class, 'penjualan']);
Route::get('/laporan', [AdminController::class, 'laporan']);
Route::get('/printPenjualan', [AdminController::class, 'print_LaporanPenjualan']);
Route::get('/printPembelian', [AdminController::class, 'print_LaporanPembelian']);

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('data')->group(function () {
    Route::resource('/kategory', KategoryController::class);
    Route::resource('/pelanggan', PelangganController::class);
    Route::resource('/karyawan', KaryawanController::class);
    Route::resource('/suplier', SuplierController::class);
    Route::resource('/barang', BarangController::class);
    Route::resource('/penjualan', PenjualanController::class);
    Route::resource('/pembelian', PembelianController::class);
    Route::resource('/cart', CartController::class);
});
