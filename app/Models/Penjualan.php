<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $fillable = ['id_karyawan', 'status', 'id_pelanggan'];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }

    public function barang()
    {
        return $this->belongsToMany(Barang::class, 'detail_penjualans', 'id_penjualan', 'id_barang');
    }

    public function detail_penjualan()
    {
        return $this->hasMany(Detail_penjualan::class, 'id_penjualan');
    }
}
