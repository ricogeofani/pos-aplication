<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Suplier::all();

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
            'telp'  =>  ['required'],
            'alamat' =>  ['required'],
        ]);

        Suplier::create([
            'nama_suplier' => $request->nama,
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
            'telp'  =>  ['required'],
            'alamat' =>  ['required'],
        ]);

        $suplier = Suplier::find($id);
        $suplier->update([
            'nama_suplier' => $request->nama,
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
        $suplier = Suplier::find($id);
        $suplier->delete();
    }
}
