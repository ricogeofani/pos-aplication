<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = User::with('karyawan');

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
            'id_karyawan' => ['required'],
            'email'       => ['required'],
            'password'    => ['required'],
            'level'       => ['required'],
        ]);

        User::create([
            'id_karyawan' => $request->id_karyawan,
            'email'       => $request->email,
            'password'    => Hash::make($request->password),
            'level'       => $request->level,
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
            'id_karyawan' => ['required'],
            'email'       => ['required'],
            'password'    => ['required'],
            'level'       => ['required'],
        ]);

        $user = User::find($id);
        $user->update([
            'id_karyawan' => $request->id_karyawan,
            'email'       => $request->email,
            'password'    => Hash::make($request->password),
            'level'       => $request->level,
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
        $user = User::find($id);
        $user->delete();
    }
}
