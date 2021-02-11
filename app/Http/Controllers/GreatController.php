<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Greate;

class GreatController extends Controller
{
    public function index()
    {
        $greate = Greate::get();   

        return view("dashboard.greate.index", compact("greate"));
    }

    public function create()
    {
        return view("dashboard.greate.create");
    }

    public function store(Request $request)
    {
        Greate::create([
            "nama"  => $request->nama,
            "harga" => $request->harga
        ]);

        return redirect("/greate")->with("msg", "greate berhasil ditambahkan");
    }

    public function edit($id)
    {
        $greate = Greate::findOrFail($id);
        
        return view("dashboard.greate.edit", compact("greate"));
    }

    public function update(Request $request, $id)
    {
        $greate = Greate::findOrFail($id);
        
        $greate->update([
            "nama"  => $request->nama,
            "harga" => $request->harga
        ]);

        return redirect("/greate")->with("msg", "greate berhasil diedit");
    }

    public function destroy($id)
    {
        $greate = Greate::findOrFail($id);
        $greate->delete();

        return redirect("/greate")->with("msg", "greate berhasil dihapus");
    }
}
