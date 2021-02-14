<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Greate;
use App\HasilPenjualan;
use App\DaftarPenjualan;
use App\LakuDetail;
use App\TidakLakuDetail;
use Illuminate\Support\Facades\DB;

class HasilPenjualanController extends Controller
{
    public function index($id)
    {
        $hasil = DB::table("daftar_penjualan")
            ->join("user", "daftar_penjualan.user_id", "=", "user.id")
            ->where("daftar_penjualan.id", $id)
            ->where("daftar_penjualan.status", "belum")
            ->select("daftar_penjualan.*", 
                "user.nama",
            )
            ->first();

        $greate = Greate::get();

        return view("dashboard.hasil-penjualan.index", compact("greate", "hasil"));
    }

    public function store(Request $request, $id)
    {

        DB::beginTransaction();

        try {
         
            $total = 0;

                for ($i=0; $i < count($request->greate); $i++) {
                    
                    if(!empty($request->jumlah[$i])){

                        $g = Greate::findOrFail($request->greate[$i]);

                        $perTotal = $g->harga * $request->bobot[$i];
            
                        $total += $perTotal;
            
                    }
                    
                }

                $daftar = DaftarPenjualan::findOrFail($id);
                
                $daftar->update([
                    "status"    => "sudah"
                ]);

                $hp = HasilPenjualan::create([
                    "daftar_penjualan_id"   => $id,
                    "total"                 => $total
                ]);

                for ($i=0; $i < count($request->greate); $i++) { 

                    if(!empty($request->jumlah[$i])){

                        $g = Greate::findOrFail($request->greate[$i]);

                        $perTotal = $g->harga * $request->bobot[$i];

                        $total += $perTotal;

                        LakuDetail::create([
                            "bal"                   => $request->jumlah[$i],
                            "jumlah"                => $request->bobot[$i],
                            "total"                 => $perTotal,
                            "great_id"              => $g->id,
                            "hasil_penjualan_id"    => $hp->id
                        ]);
                    
                    }
                }

                
                if($request->jumlah_reject != null && $request->alasan != null){
                    
                    $x = TidakLakuDetail::create([
                        "bal"                   => $request->jumlah_reject,
                        "alasan"                => $request->alasan,
                        "hasil_penjualan_id"    => $hp->id
                    ]);
                } 


            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
        }

        return redirect("/daftar-penjualan")->with("msg", "penjualan berhasil diproses");
    }
}
