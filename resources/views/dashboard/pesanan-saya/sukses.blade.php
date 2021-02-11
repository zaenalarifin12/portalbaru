@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Berhasil</h1>
            <p>Pesanan kamu berhasil dipesan</p>
          </div>
          <div class="col-sm-6">
          </div>
          <p>Total Pembayaran <b> Rp. {{$hasil->total}} </b></p>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <a href="{{ url("/semua-pesanan") }}">Ke pesanan saya</a>
      </div>
    </section>
    
    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>

@endsection