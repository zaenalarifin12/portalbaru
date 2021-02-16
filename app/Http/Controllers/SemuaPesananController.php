<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\OrderProduct;
use App\OrderDetail;
use Auth;

class SemuaPesananController extends Controller
{
    public function index()
    {
        if(Auth::user()->role == 1){
            $orderProduct = DB::table("order_product")
                                ->join("user", "order_product.user_id", "=", "user.id")
                                ->where("order_product.user_id", Auth::user()->id)
                                ->select(
                                    "order_product.*",
                                    "user.nama"
                                    )
                                ->orderBy("order_product.created_at", "DESC")->get();
        }else{
            $orderProduct = DB::table("order_product")
                            ->join("user", "order_product.user_id", "=", "user.id")
                            ->select(
                                "order_product.*",
                                "user.nama"
                                )
                            ->orderBy("order_product.created_at", "DESC")->get();
        }
        return view("dashboard.semua-pesanan.index", compact("orderProduct"));
    }

    public function show($id)
    {
        $order = OrderProduct::findOrFail($id);

        $product = DB::table("order_detail")
        ->join("product", "order_detail.product_id", "=", "product.id")
        ->where("order_detail.order_id", $order->id)
        ->select("product.*", "order_detail.jumlah AS jumlah")
        ->get();

        return view("dashboard.semua-pesanan.show", compact("product", "order"));
    }

    public function update($id)
    {
        $order = OrderProduct::findOrFail($id);
        
        $order->update([
            "status" => "terkirim"
        ]);

        return redirect("/semua-pesanan/$order->id")->with("msg", "pesanan berhasil dikirim");
    }
}
