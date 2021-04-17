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
            <h1>Ganti Password</h1>
          </div>
        </div>
        @if(session('msg'))
        <div class="alert alert-info alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{session('msg')}}</strong>
        </div>
    @endif
      </div>
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-body">
                  <form action="{{ url("/ganti-password") }}" method="post">
                    
                    <input type="hidden" name="role" value="role">

                    <label for="">Nama</label><br>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" disabled value="{{ $user->nama }}" name="nama" required placeholder="Nama">
                        <div class="input-group-append">
                        </div>
                    </div>
                    <label for="">password lama</label><br>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="old_password" required placeholder="password lama">
                        <div class="input-group-append">
                        </div>
                    </div>

                    <label for="">password baru</label><br>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="new_password" required placeholder="password baru">
                        <div class="input-group-append">
                        </div>
                    </div>

            
                    <div class="row">
                      <div class="col-8">
                    
                      </div>
                      <!-- /.col -->
                      <div class="col-4">
                        @method("PUT")
                        @csrf
                        <button type="submit" class="btn btn-primary btn-block">ganti password</button>
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