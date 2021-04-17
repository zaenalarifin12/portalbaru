<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;
use App\Admin;


class GantiPasswordAdminController extends Controller
{

    public function edit()
    {
        $id = Auth::user()->id;

        $user = Admin::findOrFail($id);

        return view("dashboard.ganti-password.admin.edit", compact("user"));
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;
        
        $user = Admin::findOrFail($id);

        if (Hash::check($request->old_password, $user->password))
        {
            $user->update([
                'password'  => $request->new_password,
            ]);
            return redirect("/ganti-password-admin")->with("msg","password anda berhasil diperbarui");
        }else{
            return redirect("/ganti-password-admin")->with("msg","password anda salah ");
        }
        
    }
}
