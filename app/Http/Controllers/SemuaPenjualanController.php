<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HasilPenjualan;
use Illuminate\Support\Facades\DB;
use Auth;

class SemuaPenjualanController extends Controller
{
    public function index()
    {

        if (Auth::user()->role == 1) {
            $hasil = DB::table("hasil_penjualan")
                    ->join("daftar_penjualan", "hasil_penjualan.daftar_penjualan_id", "=", "daftar_penjualan.id")
                    ->join("user", "daftar_penjualan.user_id", "=", "user.id")
                    ->where("user.id", Auth::user()->id)
                    ->select(
                        "hasil_penjualan.*", 
                        "daftar_penjualan.pembayaran AS pembayaran",
                        "daftar_penjualan.jumlah_bal AS jumlah_bal"
                        )
                    ->latest()
                    ->get();
        } else {
            $hasil = DB::table("hasil_penjualan")
                    ->join("daftar_penjualan", "hasil_penjualan.daftar_penjualan_id", "=", "daftar_penjualan.id")
                    ->select(
                        "hasil_penjualan.*", 
                        "daftar_penjualan.pembayaran AS pembayaran",
                        "daftar_penjualan.jumlah_bal AS jumlah_bal"
                        )
                    ->latest()
                    ->get();
        }

        return view("dashboard.semua-penjualan.index", compact("hasil"));
    }

    public function show($id)
    {
        $hasil = DB::table("hasil_penjualan")
                    ->join("daftar_penjualan", "hasil_penjualan.daftar_penjualan_id", "=", "daftar_penjualan.id")
                    ->where("hasil_penjualan.id", $id)
                    ->select("hasil_penjualan.id")
                    ->first();

        $laku = DB::table("laku_detail")
                ->join("great", "great.id", "=", "laku_detail.great_id")
                ->where("laku_detail.hasil_penjualan_id", $hasil->id)
                ->select("laku_detail.*", "great.nama AS nama")
                ->get();

        $tidakLaku = DB::table("tidak_laku_detail")
                ->where("hasil_penjualan_id", $hasil->id)
                ->first();
        
        return view("dashboard.semua-penjualan.show", compact("hasil", "laku", "tidakLaku"));
    }
}
