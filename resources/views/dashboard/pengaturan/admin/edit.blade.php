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
            <h1>Pengaturan</h1>
          </div>
          
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
                  <form action="{{ url("/pengaturan/admin") }}" method="post">
                    
                    <input type="hidden" name="role" value="role">

                    <label for="">Nama</label><br>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{ $user->nama }}" name="nama" required placeholder="Nama">
                        <div class="input-group-append">
                        </div>
                    </div>
                    <label for="">Password (jika ingin menganti silahkan diisi )</label><br>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="" name="password" placeholder="password (optional)">
                        <div class="input-group-append">
                        </div>
                    </div>
                    <label for="">username</label><br>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{ $user->username }}" name="username" required placeholder="username">
                        <div class="input-group-append">
                        </div>
                    </div>

                    @if (Auth::user()->role == 2)
                      <label for="">Jabatan</label><br>
                      <div class="input-group mb-3">
                          <input type="text" class="form-control" disabled value="Admin PPL">
                          <div class="input-group-append">
                          </div>
                      </div>
                    @endif
                    @if (Auth::user()->role == 3)
                      <label for="">Jabatan</label><br>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" disabled value="Admin Penjualan">
                          <div class="input-group-append">
                          </div>
                      </div>
                    @endif
                    @if (Auth::user()->role == 4)
                      <label for="">Jabatan</label><br>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" disabled value="Admin Keuangan">
                          <div class="input-group-append">
                          </div>
                      </div>
                    @endif


                    @if (Auth::user()->role == 5)
                    <label for="">Jabatan</label><br>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" disabled value="Super Admin">
                        <div class="input-group-append">
                        </div>
                    </div>
                    @endif

                    <div class="row">
                      <div class="col-8">
                    
                      </div>
                      <!-- /.col -->
                      <div class="col-4">
                        @method("PUT")
                        @csrf
                        <button type="submit" class="btn btn-primary btn-block">Perbarui</button>
                      </div>
                      <!-- /.col -->
                    </div>
                    
                  </form>
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
@endsection