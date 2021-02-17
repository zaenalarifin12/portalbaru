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
            <h1>Hasil Penjualan</h1>
          </div>

          @if (
            Auth::user()->role == 4 ||
            Auth::user()->role == 5
          )
          <div class="col-sm-5 ">
            <a href="{{ url("/user/create") }}" class="btn btn-primary btn-sm float-right">Buat</a>
          </div>              
          @endif

        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nomor</th>
                    <th>jumlah bal</th>
                    <th>Pembayaran</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($hasil as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->jumlah_bal }}</td>
                        <td>{{ $item->pembayaran }}</td>
                        <td>{{ $item->status_pembayaran }}</td>
                        <td>Rp. {{ $item->total }}</td>
                        <td>{{ date ('d-M-Y', strtotime($item->created_at)) }}</td>
                        <td>
                            <a href="{{ url("/semua-penjualan/$item->id") }}" class="btn btn-sm btn-info">Detail</a>

                            

                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nomor</th>
                    <th>jumlah bal</th>
                    <th>Pembayaran</th>
                    <th>Total</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
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