@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Produk</h1>
          </div>
          <div class="col-sm-6">
            <a href="{{ url("/product/create") }}" class="btn btn-sm btn-primary float-right">Tambah Produk</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <h5 class="mb-2">Daftar Kebutuhan Petani</h5>
        <div class="row">

        @foreach ($product as $item)
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
                        <a href="{{ url("/product/$item->id/edit") }}" class="btn btn-info btn-sm">Edit </a>
                        <form action="{{ url("/product/$item->id") }}" method="post" style="display: inline">
                            <button type="submit" class="btn btn-danger btn-sm">Hapus </button>
                            @csrf
                            @method("DELETE")
                        </form>
                        
                    </div>
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
        @endforeach

        </div>
        <!-- /.row -->
      </div>
    </section>
    <!-- /.content -->

    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>

@endsection