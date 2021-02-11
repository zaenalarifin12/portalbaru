@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Buat Produk</h1>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    
        <div class="card card-default">
          <!-- /.card-header -->
          <div class="card-body">
          
            <form action="{{ url("/product/$product->id") }}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="nama" required class="form-control" value="{{ $product->nama }}" placeholder="Nama">
                </div>
                <div class="form-group">
                    <input type="number" name="harga" required class="form-control" value="{{ $product->harga }}" placeholder="Harga">
                </div>
                <label for="">gambar (jika mau ganti foto silahkan diupload)</label> <br>
                <div class="form-group">
                    <input type="file" name="gambar" class="form-control">
                </div>
                <div class="form-group">
                    <img style="width: 50%"  src="{{ asset("/storage/$product->gambar") }}" alt="" srcset="">
                </div>
                @method("PUT")
                @csrf
                <div class="row">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>

           
          </div>
          
        </div>
      
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection