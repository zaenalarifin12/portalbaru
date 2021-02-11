<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\CartProduct;
use App\CartDetail;
use Auth;

class PemesananKebutuhanController extends Controller
{
    public function index()
    {
        $product = Product::get();

        return view("dashboard.pemesanan-kebutuhan.index", compact("product"));
    }

    public function cart($id)
    {
        $product = Product::findOrFail($id);
        
        $cart = CartProduct::where("user_id", Auth::user()->id)->first();

        if(empty($cart)){

            $cartProduct = CartProduct::create([
                "user_id"   => Auth::user()->id
            ]);

            CartDetail::create([
                "cart_id"       => $cartProduct->id,
                "product_id"    => $product->id,
                "jumlah"        => 1
            ]);
    
        }else{

            $cd = CartDetail::where("product_id", $product->id)
            ->where("cart_id", $cart->id)    
            ->first();

            if(empty($cd)){
                CartDetail::create([
                    "cart_id"       => $cart->id,
                    "product_id"    => $product->id,
                    "jumlah"        => 1
                ]);

            }else{

                $cd->update([
                    "jumlah"        => $cd->jumlah + 1
                ]);
            }

        }
            
        
        return redirect("/pemesanan-kebutuhan")->with("msg", "anda berhasil memasukan produk ke keranjang");
    }
}
