<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Informasi;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = Informasi::get();

        return view("dashboard.informasi.index", compact("informasi"));
    }

    public function create()
    {
        return view("dashboard.informasi.create");
    }

    public function store(Request $request)
    {
        $informasi = Informasi::create([
            "content" => $request->content
        ]);

        return redirect("/informasi")->with("msg", "informasi berhasil ditambahkan");
    }

    public function edit($id)
    {
        $informasi = Informasi::findOrFail($id);

        return view("dashboard.informasi.edit", compact("informasi"));
    }

    public function update(Request $request, $id)
    {
        $informasi = Informasi::findOrFail($id);

        $informasi->update([
            "content" => $request->content
        ]);

        return redirect("/informasi")->with("msg", "informasi berhasil diedit");
    }

    public function destroy($id)
    {
        $informasi = Informasi::findOrFail($id);
        $informasi->delete();

        return redirect("/informasi")->with("msg", "informasi berhasil dihapus");
    }
}
