<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartProduct;
use App\CartDetail;
use App\OrderProduct;
use App\OrderDetail;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Product;

class PesananSayaController extends Controller
{
    public function index()
    {
        $cart = CartProduct::where("user_id", Auth::user()->id)->first();

        $cartDetail = null;


        if(!empty($cart)){
            // $cartDetail = CartDetail::with("products")->where("cart_id", $cart->id)->get();
            $cartDetail = DB::table("cart_detail")
                            ->join("product", "cart_detail.product_id", "=", "product.id")
                            ->where("cart_detail.cart_id", "=", $cart->id)
                            ->select("cart_detail.cart_id", "cart_detail.jumlah","product.*")
                            ->get();
        }

        return view("dashboard.pesanan-saya.index", compact(["cart", "cartDetail"]));
    }

    public function edit($id)
    {
        $orderProduct = OrderProduct::findOrFail($id);

        return view("dashboard.pesanan-saya.edit", compact("orderProduct"));
    }

    public function update(Request $request, $id)
    {
        $orderProduct = OrderProduct::findOrFail($id);

        $originName = $request->file("gambar")->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $request->file("gambar")->getClientOriginalExtension();
        $fileName = $fileName.'_'.time().'.'.$extension;

        $request->file("gambar")->storeAs(
            "public", $fileName
        );

        $orderProduct->update([
            "struk" => $fileName
        ]);

        return redirect("/pesanan-saya-sukses/$id")->with("msg", "anda berhasil memesan kebutuhan produk kamu");
    }

    public function sukses($id)
    {
        
        $hasil = DB::table("order_product")->where([
            "id"      => $id, 
        ])->first();


        return view("dashboard.pesanan-saya.sukses", compact("hasil"));
    }

    public function checkout(Request $request)
    {
        
        switch ($request->input("action")) {

            case 'ditempat':
            
                $cart = CartProduct::where("user_id", Auth::user()->id)->first();
                
                $cartDetail = CartDetail::where("cart_id", $cart->id)->get();

                $total = 0;

                for ($i=0; $i < count($request->id); $i++) { 
                 
                    $cd = CartDetail::where("cart_id", $cart->id)
                                            ->where("product_id", $request->id[$i])
                                            ->update([
                        "jumlah" => $request->jumlah[$i]
                    ]);
                
                    $p = Product::where("id", $request->id[$i])->first();
                    
                    $jumlahPerProduct = $p->harga * $request->jumlah[$i];

                    $total += $jumlahPerProduct;

                }

                $total_dan_ongkir = $total + 10000;
                
                $order = OrderProduct::create([
                    "total"         => $total_dan_ongkir,
                    "pembayaran"    => $request->action,
                    "struk"         => "",
                    "status"        => "belum",
                    "user_id"       => Auth::user()->id
                ]);
                
                $cartDetail = CartDetail::where("cart_id", $cart->id)->get();


                foreach ($cartDetail as $item) {
                    DB::table("order_detail")->insert([
                        "order_id"      => $order->id, 
                        "product_id"    => $item->product_id,
                        "jumlah"        => $item->jumlah
                    ]);
                }
                
                CartProduct::where("user_id", Auth::user()->id)->delete();
                CartDetail::where("cart_id", $cart->id)->delete();

                return redirect("/pesanan-saya-sukses/$order->id");

            break;

            case 'transfer':
        
                $cart = CartProduct::where("user_id", Auth::user()->id)->first();
                
                $cartDetail = CartDetail::where("cart_id", $cart->id)->get();
                
                $total = 0;

                for ($i=0; $i < count($request->id); $i++) { 
                 
                    $cd = CartDetail::where("cart_id", $cart->id)
                                            ->where("product_id", $request->id[$i])
                                            ->first();
                
                    $cd->update([
                        "jumlah" => $request->jumlah[$i]
                    ]);

                    $p = Product::where("id", $request->id[$i])->first();
                    
                    $jumlahPerProduct = $p->harga * $request->jumlah[$i];

                    $total += $jumlahPerProduct;

                }
                
                $order = OrderProduct::create([
                    "total"         => $total + 10000,
                    "pembayaran"    => $request->action,
                    "struk"         => "",
                    "status"        => "belum",
                    "user_id"       => Auth::user()->id
                ]);
                
                $cartDetail = CartDetail::where("cart_id", $cart->id)->get();

                foreach ($cartDetail as $item) {
                    DB::table("order_detail")->insert([
                        "order_id"      => $order->id, 
                        "product_id"    => $item->product_id,
                        "jumlah"        => $item->jumlah
                    ]);
                }
                
                CartProduct::where("user_id", Auth::user()->id)->delete();
                CartDetail::where("cart_id", $cart->id)->delete();

                return redirect("/pesanan-saya/$order->id");

                break;
            
            default:
                # code...
                break;
        }
    }
}
