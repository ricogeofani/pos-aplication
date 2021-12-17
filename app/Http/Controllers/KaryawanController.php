<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Karyawan::all();

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
            'sex'   =>  ['required'],
            'email' =>  ['required'],
            'telp'  =>  ['required'],
            'alamat' =>  ['required'],
            'jabatan' => ['required'],
        ]);

        Karyawan::create([
            'nama_karyawan' => $request->nama,
            'sex'       => $request->sex,
            'email'     => $request->email,
            'telp'      => $request->telp,
            'alamat'    => $request->alamat,
            'jabatan'   => $request->jabatan,
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
            'sex'   =>  ['required'],
            'email' =>  ['required'],
            'telp'  =>  ['required'],
            'alamat' =>  ['required'],
            'jabatan' => ['required'],
        ]);

        $karyawan = Karyawan::find($id);
        $karyawan->update([
            'nama_karyawan' => $request->nama,
            'sex'       => $request->sex,
            'email'     => $request->email,
            'telp'      => $request->telp,
            'alamat'    => $request->alamat,
            'jabatan'   => $request->jabatan,
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
        $karyawan = Karyawan::find($id);
        $karyawan->delete();
    }
}
