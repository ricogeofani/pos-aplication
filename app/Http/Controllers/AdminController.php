<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function barang()
    {
        return view('admin.barang');
    }

    public function kategory()
    {
        return view('admin.kategory');
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

    public function penjualan()
    {
        return view('admin.penjualan');
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
