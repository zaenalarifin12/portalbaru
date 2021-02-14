<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DaftarPenjualan;
use Auth;

class DaftarPenjualanController extends Controller
{
    public function index()
    {
        $daftar_penjualan = DaftarPenjualan::where("status", "belum")->get();

        return view("dashboard.daftar-penjualan.index", compact("daftar_penjualan"));
    }

    public function create()
    {
        return view("dashboard.daftar-penjualan.create");
    }

    public function store(Request $request)
    {
        DaftarPenjualan::create([
            "jumlah_bal"    => $request->jumlah_bal,
            "pembayaran"    => $request->pembayaran,
            "status"        => "belum",
            "user_id"       => Auth::user()->id
        ]);

        return redirect("/daftar-penjualan")->with("msg", "anda berhasil mengisi form penjualan");
    }

    public function edit($id)
    {
        $daftar = DaftarPenjualan::findOrFail($id);

        return view("dashboard.daftar-penjualan.edit", compact("daftar"));
    }

    public function update(Request $request, $id)
    {
        $daftar_penjualan = DaftarPenjualan::findOrFail($id);
        
        $daftar_penjualan->update([
            "jumlah_bal"    => $request->jumlah_bal,
            "pembayaran"    => $request->pembayaran,
            "status"        => "belum",
            "user_id"       => Auth::user()->id
        ]);

        return redirect("/daftar-penjualan")->with("msg", "anda berhasil mengupdate penjualan");
    }

    public function destroy($id)
    {
        $daftar = DaftarPenjualan::findOrFail($id);
        $daftar->delete();

        return redirect("/daftar-penjualan")->with("msg", "anda berhasil menghapus penjualan anda");
    }

    
    public function check(Type $var = null)
    {
        # code...
    }


}
