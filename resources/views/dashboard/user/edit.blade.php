@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Admin</h1>
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
          
            <form action="{{ url("/user/$user->id") }}" method="post">
                
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" value="{{ $user->nama }}" required class="form-control" name="nama" placeholder="Nama">
                </div>
                
                <div class="form-group">
                  <label for="">NO hp</label>
                  <input type="number" value="{{ $user->no_hp }}" required class="form-control" name="no_hp" placeholder="NIK">
                </div>
                <div class="form-group">
                    <label for="">Password (jika ingin mengganti)</label>
                    <input type="password" class="form-control" name="password" placeholder="password">
                </div>
                
                @csrf
                @method("PUT")
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