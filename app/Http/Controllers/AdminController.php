<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\CartModel;
use App\Models\Detail_penjualan;
use App\Models\Karyawan;
use App\Models\Kategory;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\Suplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function barang()
    {
        $data_kategory = Kategory::all();
        $data_suplier = Suplier::all();

        return view('admin.barang', compact('data_kategory', 'data_suplier'));
    }

    public function kategory()
    {
        $data_kategory = Kategory::all();
        return view('admin.kategory', compact('data_kategory'));
    }

    public function pelanggan()
    {
        return view('admin.pelanggan');
    }

    public function karyawan()
    {
        return view('admin.karyawan');
    }

    public function suplier()
    {
        return view('admin.suplier');
    }

    public function transaksiPenjualan()
    {
        $data_cart = DB::table('barangs')->join('cart_models', 'cart_models.id_barang', '=', 'barangs.id')->get();
        $data_pelanggan = Pelanggan::all();
        $data_karyawan = Karyawan::all();

        return view('admin.transaksiPenjualan', compact('data_cart', 'data_pelanggan', 'data_karyawan'));
    }

    public function cart()
    {
        $data_barang = Barang::all();
        return view('admin.cart', compact('data_barang'));
    }

    public function penjualan()
    {
        $data_karyawan = Karyawan::all();
        $data_pelanggan = Pelanggan::all();

        return view('admin.penjualan', compact('data_karyawan', 'data_pelanggan'));
    }

    public function pembelian()
    {
        return view('admin.pembelian');
    }

    public function laporan()
    {
        return view('admin.laporan');
    }
}
