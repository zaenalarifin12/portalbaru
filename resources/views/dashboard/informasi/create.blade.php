@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Buat Pengumuman</h1>
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
          
            <form action="{{ url("/informasi") }}" method="post">
                <div class="row">
                    <div class="form-group">
                        <label for="">Informasi</label>
                        <textarea class="form-control" name="content" id="" cols="100" rows="10"></textarea>
                    </div>
                </div>
                @csrf
                <div class="row">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
            
          </div>
          
        </div>
      
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection