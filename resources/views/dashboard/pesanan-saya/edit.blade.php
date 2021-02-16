@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Upload Struck Kamu</h1>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">

        <h5>total pesanan saya : Rp. {{ $orderProduct->total }} </h5>
        <form action="{{ url("/pesanan-struck/$orderProduct->id") }}" method="post" enctype="multipart/form-data">

            <div class="row">
                <label for="">Foto</label>
                <input type="file" name="gambar" class="form-control">
            </div>

            <br>
            
            @method("PUT")
            @csrf
            <div class="form-group">
                <button type="submit" class="btn btn-info btn-sm">Upload</button>
            </div>
        </form>
      </div>
    </section>
    
    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>

@endsection