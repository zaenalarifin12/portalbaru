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
        $orderProduct = OrderProduct::where("user_id", Auth::user()->id)->orderBy("created_at", "DESC")->get();

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
