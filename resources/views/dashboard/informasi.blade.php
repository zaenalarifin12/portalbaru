@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Informasi terbaru</h1>
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
          
            <p>{{ $informasi->content ?? "informasi kosong" }}</p>
            
          </div>
          
        </div>
      
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection