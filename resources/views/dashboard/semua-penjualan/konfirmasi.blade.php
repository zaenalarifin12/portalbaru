@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Konfirmasi Detail Hasil Penjualan</h1>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <p>Nomor Rekening Petani : <b>{{ $hasil->nomor_rekening }} - {{$hasil->bank}} - Atas Nama ({{ $hasil->nama }})</b> </p>

        <p>Laku</p>

        <div class="row">
          
            <table class="table table-bordered">
                <thead>                  
                    <tr>
                        <th style="width: 10px">Nomor</th>
                        <th>great</th>
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
        
    @if ($hasil->pembayaran == "ditempat")
        <form action="{{ url("/semua-penjualan/$hasil->id/konfirmasi/text") }}" method="post">
            <button type="submit" class="btn btn-success btn-sm">Konfirmasi Sudah terbayar</button>
            @method("PUT")
            @csrf
        </form>    
    @else
        <form action="{{ url("/semua-penjualan/$hasil->id/konfirmasi/gambar") }}" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Upload Foto Bukti tranfer</label>
                <input type="file" name="gambar" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-success btn-sm">Upload</button>
            @method("PUT")
            @csrf
        </form>
    @endif
    
      </div>
    </section>

    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>

@endsection