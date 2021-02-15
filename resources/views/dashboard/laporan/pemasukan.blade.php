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
            <h1>Pemasukan</h1>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-12 float-right">
            <a href="{{ url("laporan/pemasukan/cetak") }}" class="btn btn-success btn-sm float-right mb-2">Cetak</a>
          </div>

          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nomor</th>
                    <th>Total</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($hasil_penjualan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>Rp. {{ $item->total }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ date ('d-M-Y', strtotime($item->created_at)) }}</td>
                        
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                        <th colspan="1" style="text-align:right">Total : Semuanya</th>
                        <th colspan="3">Rp. {{ $total }}</th>
                    </tr>
                </tfoot>
                

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