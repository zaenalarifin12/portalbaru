<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Admin;

class PengaturanAdminController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;

        $user = Admin::findOrFail($id);

        return view("dashboard.pengaturan.admin.index", compact("user"));
    }

    public function edit()
    {
        $id = Auth::user()->id;

        $user = Admin::findOrFail($id);

        return view("dashboard.pengaturan.admin.edit", compact("user"));
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;
        
        $user = Admin::findOrFail($id);

        if(empty($request->password)){
            $user->update([
                'nama'                  => $request->nama,
                'username'              => $request->username,
            ]);
        }else{
            $user->update([
                'nama'                  => $request->nama,
                'username'              => $request->username,
                'password'              => Hash::make($request->password),
            ]);
        }

        return redirect("/pengaturan/admin")->with("profile anda berhasil diperbarui ");
    }
}
