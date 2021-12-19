<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Barang::with('kategory', 'suplier')->get();

        $datatables = datatables()->of($datas)->addIndexColumn();
        return $datatables->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode'        => ['required'],
            'nama'        => ['required'],
            'unit'        => ['required'],
            'harga_beli'  => ['required'],
            'harga_jual'  => ['required'],
            'qty_stok'    => ['required'],
            'id_kategory' => ['required'],
            'id_suplier'  => ['required'],
        ]);

        Barang::create([
            'kode'         => $request->kode,
            'nama_barang'  => $request->nama,
            'unit'         => $request->unit,
            'harga_beli'   => $request->harga_beli,
            'harga_jual'   => $request->harga_jual,
            'qty_stok'     => $request->qty_stok,
            'id_kategory'  => $request->id_kategory,
            'id_suplier'   => $request->id_suplier,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode'        => ['required'],
            'nama'        => ['required'],
            'unit'        => ['required'],
            'harga_beli'  => ['required'],
            'harga_jual'  => ['required'],
            'qty_stok'    => ['required'],
            'id_kategory' => ['required'],
            'id_suplier'  => ['required'],
        ]);

        $barang = Barang::find($id);
        $barang->update([
            'kode'         => $request->kode,
            'nama_barang'  => $request->nama,
            'unit'         => $request->unit,
            'harga_beli'   => $request->harga_beli,
            'harga_jual'   => $request->harga_jual,
            'qty_stok'     => $request->qty_stok,
            'id_kategory'  => $request->id_kategory,
            'id_suplier'   => $request->id_suplier,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();
    }
}
