<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DaftarPenjualan;
use Illuminate\Support\Facades\DB;
use Auth;
use PDF;

class DaftarPenjualanController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 1) {
            $daftar_penjualan = DB::table("daftar_penjualan")
            ->join("user", "daftar_penjualan.user_id", "=", "user.id")
            ->where("daftar_penjualan.status", "belum")
            ->where("user.id", Auth::user()->id)
            ->select(
                "daftar_penjualan.*",
                "user.nama",
                "user.nik",
                "user.nomor_rekening",
                "user.alamat",
                "user.nama_ketua_kelompok"
            )
            ->get();

            $jumlah_daftar = DB::table("daftar_penjualan")
                            ->where("status", "belum")
                            ->join("user", "daftar_penjualan.user_id", "=", "user.id")
                            ->where("user.id", Auth::user()->id)
                            ->count();
        }
        elseif(Auth::user()->role == 2){
            $daftar_penjualan = DB::table("daftar_penjualan")
            ->join("user", "daftar_penjualan.user_id", "=", "user.id")
            ->select(
                "daftar_penjualan.*",
                "user.nama",
                "user.nik",
                "user.nomor_rekening",
                "user.alamat",
                "user.nama_ketua_kelompok"
            )
            ->get();

            $jumlah_daftar = DB::table("daftar_penjualan")
                            ->count();
        }
        else {
            $daftar_penjualan = DB::table("daftar_penjualan")
            ->join("user", "daftar_penjualan.user_id", "=", "user.id")
            ->where("daftar_penjualan.status", "belum")
            ->select(
                "daftar_penjualan.*",
                "user.nama",
                "user.nik",
                "user.nomor_rekening",
                "user.alamat",
                "user.nama_ketua_kelompok"
            )
            ->get();

            $jumlah_daftar = DB::table("daftar_penjualan")
                            ->where("status", "belum")
                            ->count();
        }
        
        

        return view("dashboard.daftar-penjualan.index", compact("daftar_penjualan", "jumlah_daftar"));
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
        ]);


        return redirect("/daftar-penjualan")->with("msg", "anda berhasil mengupdate penjualan");
    }

    public function destroy($id)
    {
        $daftar = DaftarPenjualan::findOrFail($id);
        $daftar->delete();

        return redirect("/daftar-penjualan")->with("msg", "anda berhasil menghapus penjualan anda");
    }

    
    public function cetak()
    {
        $daftar_penjualan = DB::table("daftar_penjualan")
        ->join("user", "daftar_penjualan.user_id", "=", "user.id")
        ->select(
            "daftar_penjualan.*",
            "user.nama",
            "user.nomor_rekening",
            "user.nik",
            "user.alamat",
            "user.nama_ketua_kelompok"
        )
        ->get();

        $jumlah_daftar = DB::table("daftar_penjualan")
                        ->count();

        $pdf = PDF::loadView('dashboard.daftar-penjualan.cetak', compact("daftar_penjualan", "jumlah_daftar"))
        
            ->setOptions(['defaultFont' => 'sans-serif'])->setPaper('a4', 'landscape');

        return $pdf->stream('daftar-penjualan.pdf');
    }


}
