<?php

use App\Models\Detail_penjualan;
use Illuminate\Support\Facades\DB;
use App\Models\Penjualan;

function belum_lunas()
{
    return Penjualan::where([
        ['status', '==', 0]
    ])->count();
}

function pelanggan_kredit()
{

    return Penjualan::where([
        ['status', '==', '0']
    ])
        ->with('pelanggan', 'detail_penjualan')
        ->get();
}

function sub_total()
{
    return Detail_penjualan::all();
}
