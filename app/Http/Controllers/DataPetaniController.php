<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use PDF;

class DataPetaniController extends Controller
{
    public function index()
    {
        $users = User::where("role", 1)->latest()->get();

        return view("dashboard.data-petani.index", compact("users"));
    }

    public function cetak()
    {
        $users = User::where("role", 1)->latest()->get();

        $pdf = PDF::loadView('dashboard.data-petani.cetak', compact("users"))
        
            ->setOptions(['defaultFont' => 'sans-serif'])->setPaper('a4', 'landscape');

        return $pdf->stream('petani.pdf');
    }

}
