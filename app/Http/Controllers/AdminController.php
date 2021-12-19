<?php

namespace App\Http\Controllers;

use App\Models\Kategory;
use App\Models\Suplier;
use Illuminate\Http\Request;

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
