<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::where("active", 1)->get();

        return view("dashboard.product.index", compact("product"));
    }

    public function create()
    {
        return view("dashboard.product.create");
    }

    public function store(Request $request)
    {
        $originName = $request->file("gambar")->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $request->file("gambar")->getClientOriginalExtension();
        $fileName = $fileName.'_'.time().'.'.$extension;

        $request->file("gambar")->storeAs(
            "public", $fileName
        );

        $product = Product::create([
            "nama"      => $request->nama,
            "gambar"    => $fileName,
            "harga"     => $request->harga
        ]);

        return redirect("/product")->with("msg", "Produk berhasil ditambahkan");
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view("dashboard.product.edit", compact("product"));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        
        if ($request->hasFile('gambar')) {
            $originName = $request->file("gambar")->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file("gambar")->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $request->file("gambar")->storeAs(
                "public", $fileName
            );
            
            $product->update([
                "nama"      => $request->nama,
                "harga"     => $request->harga,
                "gambar"    => $fileName,
            ]);
        }else{
            $product->update([
                "nama"      => $request->nama,
                "harga"     => $request->harga
            ]);
        }

        return redirect("/product")->with("msg", "product berhasil diedit");
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->update([
            "active" => 0
        ]);

        return redirect("/product")->with("msg", "product berhasil dihapus");
    }
}
