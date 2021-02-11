<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class DataPetaniController extends Controller
{
    public function index()
    {
        $users = User::where("role", 1)->get();

        return view("dashboard.data-petani.index", compact("users"));
    }
}
