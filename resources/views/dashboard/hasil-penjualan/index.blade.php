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
              

              @for ($i = 1; $i < $hasil->jumlah_bal+1; $i++)
                  <div class="row">
                    <div class="col-sm">
                      <div class="form-group">
                        <label for="">Bal Ke - {{ $i }}</label> <br>
                        
                        
                          <select name="" id="" class="form-control">
                            @foreach ($greate as $item)
                              <option value="">
                                {{ $item->nama}}
                              </option>
                              
                            @endforeach
                          </select>
                          <input type="number" class="form-control" name="jumlah[]" placeholder="11">
                          {{-- <input type="text" disabled class="form-control" value=""> --}}

                        {{-- <input type="hidden" name="id_great[]" class="form-control" value=""> --}}
                        
                      </div>
                    </div>
                  </div>
              @endfor
              

                @foreach ($greate as $item)
                
                    <div class="row">
                      <div class="col-sm">
                        <div class="form-group">
                            <label for="">Great</label>
                            <input type="text" disabled class="form-control" value="{{ $item->nama }}">
                            <input type="hidden" name="id_great[]" class="form-control" value="{{ $item->id }}">
                        </div>  
                      </div>
                      <div class="col-sm">
                        <div class="form-group">
                            <label for="">Jumlah (kg)</label>
                            <input type="number" class="form-control" name="jumlah[]" placeholder="11">
                        </div>  
                      </div>
                      <div class="col-sm">
                        {{-- <div class="form-group">
                            <label for="">Harga / (per kg) </label>
                            <input type="number" class="form-control" name="kg" value="">
                        </div>   --}}
                      </div>
                    </div>
                  
                  
                @endforeach
                
                <div class="row">
                    <div class="form-group">
                        <label>Jumlah yang direject | Optional</label>
                        <input type="number" class="form-control" name="jumlah_reject" placeholder="11">
                    </div>  
                </div>
                <div class="row">
                    <div class="form-group">
                        <label for="">Reject (Optional)</label><br>
                        <textarea name="alasan" placeholder="" class="form-control" cols="30" rows="10"></textarea>
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