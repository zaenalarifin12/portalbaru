<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use PDF;

class RiwayatPenjualanController extends Controller
{
    public function index()
    {
        if(Auth::user()->role == 1){
            $hasil = DB::table("hasil_penjualan")
            ->join("daftar_penjualan", "hasil_penjualan.daftar_penjualan_id", "=", "daftar_penjualan.id")
            ->select(
                "hasil_penjualan.*", 
                "daftar_penjualan.pembayaran AS pembayaran",
                "daftar_penjualan.jumlah_bal AS jumlah_bal"
                )
            ->where("daftar_penjualan.user_id", "=", Auth::user()->id)
            ->get();
    
            $totalSemua = DB::table("hasil_penjualan")
            ->join("daftar_penjualan", "hasil_penjualan.daftar_penjualan_id", "=", "daftar_penjualan.id")
            ->select(
                "hasil_penjualan.*", 
                "daftar_penjualan.pembayaran AS pembayaran",
                "daftar_penjualan.jumlah_bal AS jumlah_bal"
                )
            ->where("daftar_penjualan.user_id", "=", Auth::user()->id)
            ->sum("hasil_penjualan.total");
        }else{
            $hasil = DB::table("hasil_penjualan")
            ->join("daftar_penjualan", "hasil_penjualan.daftar_penjualan_id", "=", "daftar_penjualan.id")
            ->select(
                "hasil_penjualan.*", 
                "daftar_penjualan.pembayaran AS pembayaran",
                "daftar_penjualan.jumlah_bal AS jumlah_bal"
                )
            ->get();
    
            $totalSemua = DB::table("hasil_penjualan")
            ->join("daftar_penjualan", "hasil_penjualan.daftar_penjualan_id", "=", "daftar_penjualan.id")
            ->select(
                "hasil_penjualan.*", 
                "daftar_penjualan.pembayaran AS pembayaran",
                "daftar_penjualan.jumlah_bal AS jumlah_bal"
                )
            ->sum("hasil_penjualan.total");
        }

        return view("dashboard.riwayat-penjualan.index", compact("hasil", "totalSemua"));
    }

    public function show($id)
    {
        $hasil = DB::table("hasil_penjualan")
                    ->join("daftar_penjualan", "hasil_penjualan.daftar_penjualan_id", "=", "daftar_penjualan.id")
                    ->where("hasil_penjualan.id", $id)
                    ->select(
                        "hasil_penjualan.*", 
                        "daftar_penjualan.pembayaran AS pembayaran",
                        "daftar_penjualan.jumlah_bal AS jumlah_bal"
                        )
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

    public function cetak()
    {
        $hasil = DB::table("hasil_penjualan")
            ->join("daftar_penjualan", "hasil_penjualan.daftar_penjualan_id", "=", "daftar_penjualan.id")
            ->join("user", "daftar_penjualan.user_id", "=", "user.id")
            ->select(
                "hasil_penjualan.*", 
                "daftar_penjualan.pembayaran AS pembayaran",
                "daftar_penjualan.jumlah_bal AS jumlah_bal",
                "user.nik AS nik",
                "user.nama AS nama"
                )
            ->get();
    
            $totalSemua = DB::table("hasil_penjualan")
            ->join("daftar_penjualan", "hasil_penjualan.daftar_penjualan_id", "=", "daftar_penjualan.id")
            ->select(
                "hasil_penjualan.*", 
                "daftar_penjualan.pembayaran AS pembayaran",
                "daftar_penjualan.jumlah_bal AS jumlah_bal"
                )
            ->sum("hasil_penjualan.total");

        $pdf = PDF::loadView('dashboard.riwayat-penjualan.cetak', compact("hasil", "totalSemua"))
        ->setOptions(['defaultFont' => 'sans-serif'])->setPaper('a4', 'landscape');

        return $pdf->stream('riwayat-penjualan.pdf');
    }

}
