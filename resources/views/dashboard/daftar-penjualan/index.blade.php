@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset("assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
    <link rel="stylesheet" href="{{ asset("assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">
@endsection

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Penjualan Tembakau</h1>
          </div>

          @if (Auth::user()->role == 1)

          @if ($jumlah_daftar == 0)
              
            <div class="col-sm-5 ">
              <a href="{{ url("/daftar-penjualan/create") }}" class="btn btn-primary btn-sm float-right">Daftar</a>
            </div>              
          @endif
          
          @endif

        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          @if (Auth::user()->role == 2 || Auth::user()->role == 5)
            <div class="col-12 float-right">
              <a href="{{ url("daftar-penjualan/cetak") }}" class="btn btn-success btn-sm float-right mb-2">Cetak</a>
            </div>     
          @endif
          

          <div class="col-12">

            <div class="card">
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nomor</th>
                    <th>Jumlah bal</th>
                    <th>Pembayaran</th>
                    <th>Nama</th>
                    <th>NO Rekening</th>
                    <th>Alamat</th>
                    <th>Nama Ketua Kelompok</th>
                    
                    @if (
                      Auth::user()->role != 2
                    )
                    <th>Aksi</th>    
                    @endif
                    
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($daftar_penjualan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->jumlah_bal }}</td>
                        <td>{{ $item->pembayaran }}</td>
                        <td> {{ $item->nama }} </td>
                        <td> {{ $item->nomor_rekening }} </td>
                        <td> {{ $item->alamat }} </td>
                        <td> {{ $item->nama_ketua_kelompok }} </td>
                        @if (
                          Auth::user()->role != 2
                        )
                        <td>
                          @if (
                            Auth::user()->role == 3 ||
                            Auth::user()->role == 5
                            )
                            <a href="{{ url("/hasil-penjualan/$item->id") }}" class="btn btn-sm btn-primary">Proses</a>
                          @endif
                          
                          <a href="{{ url("/daftar-penjualan/$item->id/edit") }}" class="btn btn-sm btn-info">Edit</a>
                          <form action="{{ url("/daftar-penjualan/$item->id") }}" method="post" style="display: inline">
                              <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                          @csrf
                          @method("DELETE")
                          </form>
                          
                      </td>
                        @endif
                        
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>>
@endsection

@section('script')
    <script src="{{ asset("assets/plugins/datatables/jquery.dataTables.min.js")}}"></script>
    <script src="{{ asset("assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
    <script src="{{ asset("assets/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
    <script src="{{ asset("assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>

    <script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
          });
        });
      </script>
@endsection