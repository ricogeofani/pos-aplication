<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = ['kode', 'nama_barang', 'unit', 'harga_beli', 'harga_jual', 'qty_stok', 'id_kategory', 'id_suplier'];

    public function kategory()
    {
        return $this->belongsTo(Kategory::class, 'id_kategory');
    }

    public function suplier()
    {
        return $this->belongsTo(Suplier::class, 'id_suplier');
    }
}
