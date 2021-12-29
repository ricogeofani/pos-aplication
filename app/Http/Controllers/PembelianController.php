<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Barang;
use App\Models\CartModel;
use App\Models\Pembelian;
use App\Models\Detail_pembelian;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datas = Pembelian::with('barang', 'karyawan', 'suplier', 'detail_pembelian');

        // cek untuk filter status
        if ($request->status) {
            $filter_status = $request->status == 'tunai' ? 1 : 0;
            $datas  = $datas->where('status', '=', $filter_status);
        }

        //cek filter tgl penjualan
        if ($request->tglPembelian) {
            $datas = $datas->where('created_at', 'like', '%' . $request->tglPembelian . '%');
        }

        $datas = $datas->get();

        $datatables = datatables()->of($datas)->addIndexColumn();
        return $datatables->make(true);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CartModel $cart, Detail_pembelian $detail_pembelian)
    {
        $this->validate($request, [
            'id_karyawan' => ['required'],
            'id_suplier' => ['required'],
            'status'    => ['required'],
        ]);

        if ($request->id_karyawan == 0) {
            return back()->with('m_gagal', 'pilih data karyawan dulu!!');;
        }

        if ($request->id_suplier == 0) {
            // Alert::danger('gagal', 'Data suplier dan karyawan kosong!!');
            return back()->with('m_gagal', 'pilih data suplier dulu!!');;
        }

        $pembelian = Pembelian::create([
            'id_karyawan' => $request->id_karyawan,
            'id_suplier' => $request->id_suplier,
            'status'    => $request->status,
        ]);

        $barangs = $request->id_barang;
        $qtys = $request->qty;

        foreach ($barangs as $key => $value) {
            Detail_pembelian::insert([
                'id_pembelian' => $pembelian->id,
                'id_barang'   => $value,
                'qty'       => $qtys[$key],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $data_barang = Barang::find($value);
            $data_barang->update([
                'qty_stok' => $data_barang->qty_stok + $qtys[$key],
            ]);
        }

        $cart->where($cart->id)->delete();
        return redirect('pembelian')->with('m_berhasil', 'transaksi success');
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
            'id_suplier' => ['required'],
            'status'    => ['required'],
        ]);

        $pembelian = Pembelian::find($id);
        $pembelian->update([
            'id_karyawan' => $request->id_karyawan,
            'id_suplier' => $request->id_suplier,
            'status'     => $request->status,
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
        $pembelian = pembelian::find($id);

        Detail_Pembelian::where('id_pembelian', $pembelian->id)->delete();
        $pembelian->delete();
    }
}
