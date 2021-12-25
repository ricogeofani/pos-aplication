<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_penjualan extends Model
{
    use HasFactory;
    protected $fillable = ['qty', 'total_bayar', 'id_penjualan', 'id_barang', 'created_at', 'updated_at'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'id_penjualan');
    }
}
