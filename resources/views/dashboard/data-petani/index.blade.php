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
            <h1>Data Petani</h1>
          </div>
          <div class="col-sm-5 ">
            {{-- <a href="{{ url("/user/create") }}" class="btn btn-primary btn-sm float-right">Buat</a> --}}
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <div class="row">
          
          @if (
            Auth::user()->role == 2 ||
            Auth::user()->role == 3 ||
            Auth::user()->role == 4 ||
            Auth::user()->role == 5
          )
          <div class="col-12 float-right">
            <a href="{{ url("data-petani/cetak") }}" class="btn btn-success btn-sm float-right mb-2">Cetak</a>
          </div>              
          @endif

          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nomor</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>NO HP</th>
                    <th>alamat</th>
                    <th>rt</th>
                    <th>rw</th>
                    <th>kecamatan</th>
                    <th>kabupaten</th>
                    <th>nama ketua kelompok</th>
                    <th>tahun tanam</th>
                    <th>jumlah paket</th>
                    <th>bank</th>
                    <th>nomor rekening</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nik }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->no_hp }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->rt }}</td>
                        <td>{{ $item->rw }}</td>
                        <td>{{ $item->kecamatan }}</td>
                        <td>{{ $item->kabupaten }}</td>
                        <td>{{ $item->nama_ketua_kelompok }}</td>
                        <td>{{ $item->tahun_tanam }}</td>
                        <td>{{ $item->jumlah_paket }}</td>
                        <td>{{ $item->bank }}</td>
                        <td>{{ $item->nomor_rekening }}</td>
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