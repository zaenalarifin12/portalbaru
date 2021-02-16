<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        return view("dashboard.laporan.index");
    }

    public function pemasukan()
    {
        $hasil_penjualan    = DB::table("hasil_penjualan")
                                ->join("daftar_penjualan", "hasil_penjualan.id", "=", "daftar_penjualan.id")
                                ->join("user", "daftar_penjualan.user_id", "=", "user.id")
                                ->latest()
                                ->select(
                                    "hasil_penjualan.*",
                                    "user.nama"
                                )
                                ->get();

        $total              = DB::table("hasil_penjualan")->sum("total");

        return view("dashboard.laporan.pemasukan", compact("hasil_penjualan", "total"));
    }

    public function cetak_pemasukan()
    {
        $hasil_penjualan    = DB::table("hasil_penjualan")
                                ->join("daftar_penjualan", "hasil_penjualan.id", "=", "daftar_penjualan.id")
                                ->join("user", "daftar_penjualan.user_id", "=", "user.id")
                                ->latest()
                                ->select(
                                    "hasil_penjualan.*",
                                    "user.nama"
                                )
                                ->get();

        $total              = DB::table("hasil_penjualan")->sum("total");

        $pdf = PDF::loadView('dashboard.laporan.cetak-pemasukan', compact("hasil_penjualan", "total"))
        ->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->stream('laporan-pemasukan.pdf');
    }


    public function pengeluaran()
    {
        $order_product = DB::table("order_product")
                    ->join("user", "order_product.user_id", "=", "user.id")
                    ->select(
                        "order_product.*",
                        "user.nama"
                        )
                    ->latest()
                    ->get();

        $total = DB::table("order_product")->sum("total");

        return view("dashboard.laporan.pengeluaran", compact("order_product", "total"));
    }

    public function cetak_pengeluaran()
    {
        $order_product = DB::table("order_product")
                    ->join("user", "order_product.user_id", "=", "user.id")
                    ->select(
                        "order_product.*",
                        "user.nama"
                        )
                    ->latest()
                    ->get();

        $total = DB::table("order_product")->sum("total");

        $pdf = PDF::loadView('dashboard.laporan.cetak-pengeluaran', compact("order_product", "total"))
        ->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->stream('laporan-pengeluaran.pdf');        
    }
}
