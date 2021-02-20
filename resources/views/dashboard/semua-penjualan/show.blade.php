@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Hasil Penjualan</h1>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">
            
            <p>Laku</p>
            <table class="table table-bordered">
                <thead>                  
                    <tr>
                        <th style="width: 10px">Nomor</th>
                        <th>Great</th>
                        <th>Jumlah (bal)</th>
                        <th>Jumlah (kg)</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laku as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td> {{ $item->nama }} </td>
                            <td> {{ $item->bal }} bal </td>
                            <td> {{ $item->jumlah }} kg </td>
                            <td> Rp. {{ $item->total }} </td>
                        </tr>   
                    @endforeach
                </tbody>
            </table>

        </div>

        @if (!empty($tidakLaku))
                
        <h5>Tidak Laku</h5>
        <p>Alasan: {{ $tidakLaku->alasan }}</p>
        <p>Jumlah: {{ $tidakLaku->bal }} Bal</p>

    @endif       
        

    @if ($hasil->status_pembayaran == "sudah lunas")
    
        @if ($hasil->pembayaran == "transfer")
            <p>Bukti transfer</p><br>
            <img width="500px" src="{{ asset("/storage/$hasil->struck") }}" alt="" srcset="">
        @else
            <h3c class="text-success">Sudah Terbayar</h3>
        @endif

    @endif

        <!-- /.row -->
      </div>
    </section>
    <!-- /.content -->

    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>

@endsection