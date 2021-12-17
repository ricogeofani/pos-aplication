<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoryController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\SuplierController;
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
Route::get('/penjualan', [AdminController::class, 'penjualan']);
Route::get('/pembelian', [AdminController::class, 'pembelian']);
Route::get('/laporan', [AdminController::class, 'laporan']);

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('data')->group(function () {
    Route::resource('/kategory', KategoryController::class);
    Route::resource('/pelanggan', PelangganController::class);
    Route::resource('/karyawan', KaryawanController::class);
    Route::resource('/suplier', SuplierController::class);
});
