<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    protected $fillable = ['id_karyawan', 'id_suplier'];

    public function suplier()
    {
        return $this->belongsTo(Suplier::class, 'id_suplier');
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }

    public function barang()
    {
        return $this->belongsToMany(Barang::class, 'detail_pembelians', 'id_pembelian', 'id_barang');
    }

    public function detail_pembelian()
    {
        return $this->hasMany(Detail_pembelian::class, 'id_pembelian');
    }
}
