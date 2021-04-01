<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Admin;

class UserController extends Controller
{
    public function index()
    {
        // user yang ga admin
        $users = User::where("role", "!=", 1)
                        ->where("role", "!=", 5)
                        ->get();

        return view("dashboard.user.index", compact("users"));
    }

    public function create()
    {
        return view("dashboard.user.create");
    }

    public function store(Request $request)
    {
        Admin::create([
            "nama"         => $request->nama ,
            "no_hp"        => $request->no_hp,
            "password"     => Hash::make($request->password),
            "role"         => $request->role
        ]);

        return redirect("/user")->with("msg", "admin berhasil ditambahkan");
    }

    public function edit($id)
    {
        $user = Admin::findOrFail($id);

        return view("dashboard.user.edit", compact("user"));
    }

    public function update(Request $request, $id)
    {
        $user = Admin::findOrFail($id);

        if($request->password == null){
            $user->update([
                "nama"         => $request->nama ,
                "no_hp"        => $request->no_hp,
            ]);
        }else{
            $user->update([
                "nama"         => $request->nama ,
                "no_hp"        => $request->no_hp,
                "password"     => Hash::make($request->password),
            ]);    
        }

        return redirect("/user")->with("msg", "admin berhasil diedit");
    }

    public function destroy($id)
    {
        $user = Admin::findOrFail($id);
        $user->delete();
        
        return redirect("/user")->with("msg", "admin berhasil dihapus");
    }
}
