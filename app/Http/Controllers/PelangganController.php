<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Pelanggan::all();

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
            'nama'  =>  ['required'],
            'email' =>  ['required'],
            'telp'  =>  ['required'],
            'alamat' =>  ['required'],
        ]);

        Pelanggan::create([
            'nama_pelanggan' => $request->nama,
            'email'     => $request->email,
            'telp'      => $request->telp,
            'alamat'    => $request->alamat,
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
            'nama'  =>  ['required'],
            'email' =>  ['required'],
            'telp'  =>  ['required'],
            'alamat' =>  ['required'],
        ]);

        $pelanggan = Pelanggan::find($id);
        $pelanggan->update([
            'nama_pelanggan' => $request->nama,
            'email'     => $request->email,
            'telp'      => $request->telp,
            'alamat'    => $request->alamat,
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
        $pelanggan = Pelanggan::find($id);
        $pelanggan->delete();
    }
}
