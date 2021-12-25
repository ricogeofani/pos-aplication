<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\CartModel;
use App\Models\Detail_penjualan;
use App\Models\Karyawan;
use App\Models\Kategory;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\Pembelian;
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

    public function transaksiPembelian()
    {
        $data_cart = DB::table('barangs')->join('cart_models', 'cart_models.id_barang', '=', 'barangs.id')->get();
        $data_suplier = Suplier::all();
        $data_karyawan = Karyawan::all();

        return view('admin.transaksiPembelian', compact('data_cart', 'data_suplier', 'data_karyawan'));
    }

    public function cartPenjualan()
    {
        $data_barang = Barang::all();
        return view('admin.cartPenjualan', compact('data_barang'));
    }

    public function cartPembelian()
    {
        $data_barang = Barang::all();
        return view('admin.cartPembelian', compact('data_barang'));
    }

    public function penjualan()
    {
        $data_karyawan = Karyawan::all();
        $data_pelanggan = Pelanggan::all();

        return view('admin.penjualan', compact('data_karyawan', 'data_pelanggan'));
    }

    public function pembelian()
    {
        $data_karyawan = Karyawan::all();
        $data_suplier = Suplier::all();

        return view('admin.pembelian', compact('data_karyawan', 'data_suplier'));
    }

    public function laporan()
    {
        $laporan_penjualan =  Penjualan::with('barang', 'karyawan', 'pelanggan', 'detail_penjualan')->get();
        $laporan_pembelian =  Pembelian::with('barang', 'karyawan', 'suplier', 'detail_pembelian')->get();
        $d_penjualan = Detail_penjualan::all();

        return view('admin.laporan', compact('laporan_penjualan', 'laporan_pembelian', 'd_penjualan'));
    }

    public function print_laporanPenjualan()
    {
        $laporan_penjualan =  Penjualan::with('barang', 'karyawan', 'pelanggan', 'detail_penjualan')->get();

        return view('admin.print_laporanPenjualan', compact('laporan_penjualan'));
    }

    public function print_laporanPembelian()
    {
        $laporan_pembelian =  Pembelian::with('barang', 'karyawan', 'suplier', 'detail_pembelian')->get();

        return view('admin.print_laporanPembelian', compact('laporan_pembelian'));
    }
}
