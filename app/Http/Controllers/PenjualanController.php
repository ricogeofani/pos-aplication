<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\CartModel;
use App\Models\Penjualan;
use App\Models\Detail_penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Penjualan::with('barang', 'karyawan', 'pelanggan', 'detail_penjualan')->get();

        $datatables = datatables()->of($datas)->addIndexColumn();
        return $datatables->make(true);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CartModel $cart, Detail_penjualan $detail_penjualan)
    {
        $this->validate($request, [
            'id_karyawan' => ['required'],
            'id_pelanggan' => ['required'],
        ]);

        $penjualan = Penjualan::create([
            'id_karyawan' => $request->id_karyawan,
            'id_pelanggan' => $request->id_pelanggan,
        ]);

        $barangs = $request->id_barang;
        $qtys = $request->qty;

        foreach ($barangs as $key => $value) {
            Detail_penjualan::insert([
                'id_penjualan' => $penjualan->id,
                'id_barang'   => $value,
                'qty'       => $qtys[$key],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $data_barang = Barang::find($value);
            $data_barang->update([
                'qty_stok' => $data_barang->qty_stok - $qtys[$key],
            ]);
        }

        $cart->where($cart->id)->delete();

        return redirect('penjualan');
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
            'id_karyawan' => ['required'],
            'id_pelanggan' => ['required'],
        ]);

        $penjualan = Penjualan::find($id);
        $penjualan->update([
            'id_karyawan' => $request->id_karyawan,
            'id_pelanggan' => $request->id_pelanggan,
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
        $penjualan = Penjualan::find($id);

        Detail_penjualan::where('id_penjualan', $penjualan->id)->delete();
        $penjualan->delete();
    }
}
