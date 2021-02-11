@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Jual Tembakau</h1>
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
          
            <form action="{{ url("/daftar-penjualan/$daftar->id") }}" method="post">
                
                <div class="form-group">
                    <label for="">Jumlah Bal</label>
                    <input type="number" class="form-control" name="jumlah_bal" placeholder="bal" value="{{$daftar->jumlah_bal}}">
                </div>
            

                <label for="">Metode Pembayaran</label>
                <select name="pembayaran" class="form-control">
                    @if ($daftar->pembayaran == "ditempat")
                        <option value="ditempat" selected>Bayar ditempat</option>
                        <option value="transfer">Transfer</option>    
                    @endif

                    @if ($daftar->pembayaran == "transfer")
                        <option value="ditempat">Bayar ditempat</option>
                        <option value="transfer" selected>Transfer</option>    
                    @endif
                    
                </select>

                <br>
                @csrf
                @method('put')
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