@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Proses Penjualan</h1>
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
          
            
            <p>Nama : {{ $hasil->nama }}</p>
            <p>Jumlah Bal : {{ $hasil->jumlah_bal }}</p>

            <form action="{{ url("/hasil-penjualan/$hasil->id") }}" method="post">
              
              <div class="wrapper">

                <div class="row">

                  <div class="col">

                    <div class="wrapper-greate">

                      <div class="row">
                        <div class="form-group mr-3">
                          <label for="">Greate</label>
                          <select class="form-control" name="greate[]" id="">
                            @foreach ($greate as $item)
                              <option  value="{{ $item->id }}">{{ $item->nama }}</option>    
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group mr-3">
                          <label for="">Jumlah bal</label>
                          <input required name="jumlah[]" class="form-control" type="number" value="">
                       </div>
                       <div class="form-group">
                          <label for="">Bobot</label>
                          <input required name="bobot[]" class="form-control" type="number" value="">
                      </div>
                      </div>
  
                    </div>

                    <div class="wrapper-reject">
                    </div>

                  </div>
                  
                  <div class="form-group ml-5">
                    <div id="tambah" class="btn btn-sm btn-success">Tambah</div>
                  </div>
                  <div class="form-group ml-5">
                    <div id="reject" class="btn btn-sm btn-info">Reject</div>
                  </div>
                 
                </div>

              </div>
                
                <br>
                @csrf
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Jual</button>
                </div>
            </form>
            
          </div>
          
        </div>
      
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection

@section('script')
  <script>
    $("#tambah").click(function(){
      $(".wrapper-greate").append(`
        <div class="row">
          <div class="form-group mr-3">
            <label for="">Greate</label>
            <select class="form-control" name="greate[]" id="">
              @foreach ($greate as $item)
                <option  value="{{ $item->id }}">{{ $item->nama }}</option>    
              @endforeach
            </select>
          </div>
          <div class="form-group mr-3">
            <label for="">Jumlah bal</label>
            <input required name="jumlah[]" class="form-control" type="number" value="">
          </div>
          <div class="form-group">
              <label for="">Bobot</label>
              <input required name="bobot[]" class="form-control" type="number" value="">
          </div>
        </div>
      `)
    });

    $("#reject").one("click", function(){
      $(".wrapper-reject").append(`
        <div class="row">
          <div class="form-group">
            <label> Jumlah bal </label>
            <input required class="form-control" type="text" name="jumlah_reject" />
          </div>
          <div class="form-group ml-3">
            <label> Alasan </label>
            <textarea required name="alasan" class="form-control"></textarea>
          </div>
        </div>
      `)
    });
  </script>
@endsection