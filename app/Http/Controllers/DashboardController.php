<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Informasi;


class DashboardController extends Controller
{
    public function index()
    {
        return view("dashboard.index");
    }

    public function informasi()
    {
        $informasi = Informasi::orderBy("id", "DESC")->get();

        return view("dashboard.informasi", compact("informasi"));
    }
}
