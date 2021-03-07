<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;

class PengaturanController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;

        $user = User::findOrFail($id);

        return view("dashboard.pengaturan.index", compact("user"));
    }

    public function edit()
    {
        $id = Auth::user()->id;

        $user = User::findOrFail($id);

        return view("dashboard.pengaturan.edit", compact("user"));
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;
        
        $user = User::findOrFail($id);

        if(empty($request->password)){
            $user->update([
                'nama'                  => $request->nama,
                'nik'                   => $request->nik,
                'username'              => $request->username,
                'role'                  => Auth::user()->role,
                'no_hp'                 => $request->no_hp,
                'alamat'                => $request->alamat,
                'rt'                    => $request->rw,
                'rw'                    => $request->kecamatan,
                'kabupaten'             => $request->kabupaten,
                'nama_ketua_kelompok'   => $request->nama_ketua_kelompok,
                'tahun_tanam'           => $request->tahun_tanam,
                'jumlah_paket'          => $request->jumlah_paket,
                'nomor_rekening'        => $request->nomor_rekening,
            ]);
        }else{
            $user->update([
                'nama'                  => $request->nama,
                'nik'                   => $request->nik,
                'username'              => $request->username,
                'password'              => Hash::make($request->password),
                'role'                  => Auth::user()->role,
                'no_hp'                 => $request->no_hp,
                'alamat'                => $request->alamat,
                'rt'                    => $request->rw,
                'rw'                    => $request->kecamatan,
                'kabupaten'             => $request->kabupaten,
                'nama_ketua_kelompok'   => $request->nama_ketua_kelompok,
                'tahun_tanam'           => $request->tahun_tanam,
                'jumlah_paket'          => $request->jumlah_paket,
                'nomor_rekening'        => $request->nomor_rekening,
            ]);
        }

        return redirect("/pengaturan")->with("profile anda berhasil diperbarui ");
    }
}
