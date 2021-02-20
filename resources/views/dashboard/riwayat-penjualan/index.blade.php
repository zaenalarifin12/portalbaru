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
            <h1>Riwayat Penjualan</h1>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          @if (Auth::user()->role != 1)
            <div class="col-12 float-right">
              <a href="{{ url("riwayat-penjualan/cetak") }}" class="btn btn-success btn-sm float-right mb-2">Cetak</a>
            </div>    
          @endif

          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nomor</th>
                    <th>jumlah bal</th>
                    <th>jumlah Bobot</th>
                    <th>Pembayaran</th>
                    <th>Total</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($hasil as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->jumlah_bal }}</td>
                        @php
                            $totalBobot = Illuminate\Support\Facades\DB::table("laku_detail")
                            ->where("hasil_penjualan_id", $item->id)->sum("jumlah");
                        @endphp
                        
                        <td>{{ $totalBbt }}</td>
                        <td>{{ $item->pembayaran }}</td>
                        <td>Rp. {{ $item->total }}</td>
                        <td>
                            <a href="{{ url("/riwayat-penjualan/$item->id") }}" class="btn btn-sm btn-info">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                        <th colspan="1">Rp. {{ $totalSemua }}</th>
                        <th colspan="1">{{ $totalBal }}</th>
                        <th colspan="1">{{ $totalBobot }}</th>
                        <th colspan="2"></th>
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