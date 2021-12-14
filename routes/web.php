<?php

use App\Http\Controllers\AdminController;
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



Route::get('/dashboard', [AdminController::class, 'dashboard']);
Route::get('/barang', [AdminController::class, 'barang']);
Route::get('/kategory', [AdminController::class, 'kategory']);
Route::get('/pelanggan', [AdminController::class, 'pelanggan']);
Route::get('/karyawan', [AdminController::class, 'karyawan']);
Route::get('/suplier', [AdminController::class, 'suplier']);
Route::get('/penjualan', [AdminController::class, 'penjualan']);
Route::get('/pembelian', [AdminController::class, 'pembelian']);
Route::get('/laporan', [AdminController::class, 'laporan']);
