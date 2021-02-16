@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Buat Admin</h1>
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
          
            <form action="{{ url("/user") }}" method="post">
                
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" value="" class="form-control" name="nama" placeholder="Nama">
                </div>
                <div class="form-group">
                  <label for="">no hp</label>
                  <input type="number" value="" class="form-control" name="no_hp" placeholder="Nomor hp">
              </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" value="" class="form-control" name="password" placeholder="password">
                </div>
                <div class="form-group">
                    <label for="">Jabatan</label>
                    <select name="role" id="" class="form-control">
                        <option value="2">Admin PPL</option>
                        <option value="3">Admin Penjualan</option>
                        <option value="4">Admin Keuangan</option>
                    </select>
                    
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