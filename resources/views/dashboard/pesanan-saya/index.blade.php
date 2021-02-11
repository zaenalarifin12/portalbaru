@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pesanan saya</h1>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <h5 class="mb-2">Daftar Kebutuhan Petani yang saya pesan</h5>

        <form action="{{ url("/checkout") }}" method="post">

        <div class="row">

          @if (empty($cartDetail))
          Kosong
          @else
            @forelse ($cartDetail as $item)

                <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-info" style="height: 55px">
                        <h3 class="widget-user-username">{{ $item->nama }}</h3>
                    </div>
                    <div class="widget-user-image">
                        
                    </div>
                    <div class="d-flex justify-content-center">
                            <img class="" style="width: 100%" src="{{ asset("/storage/$item->gambar") }}" alt="User Avatar">
                        </div>
                    <div class="card-footer" style="padding-top: 20px">
                        <div class="row justify-content-between">
                            <p>Rp. {{ $item->harga }}</p>
                            <div>
                                <input type="hidden" name="id[]" value="{{ $item->id }}">
                                <input type="number" class="form-control" name="jumlah[]" value="{{ $item->jumlah }}">
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
                
            @endforeach

          @endif
        
       
        
    </div>

      @if (!empty($cartDetail))
        <div class="float-right">
            <div class="card">
                <button type="submit" class="btn btn-primary btn-sm" name="action" value="ditempat">Bayar Ditempat</button>
            </div>

            <div class="card">
                <button type="submit" class="btn btn-info btn-sm" name="action" value="transfer">Transfer</button>
            </div>
        </div>  
      @endif
        
        @csrf
    </form>
        <!-- /.row -->
      </div>
    </section>
    <!-- /.content -->

    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>

@endsection