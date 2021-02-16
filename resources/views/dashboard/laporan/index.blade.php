@extends('layouts.app')

@section('content')

<div class="content-wrapper">

    <div class="d-flex justify-content-around ">
        
        <a href="{{ url("/laporan/pemasukan") }}" class="mt-4">
            <button class="btn btn-info"> Pengeluaran </button>
        </a>
        <a href="{{ url("/laporan/pengeluaran") }}" class="mt-4">
            <button class="btn btn-primary"> Pemasukan </button>
        </a>
        
    </div>

</div>

@endsection