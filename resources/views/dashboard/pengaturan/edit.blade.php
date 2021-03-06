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
                  <form action="{{ url("/pengaturan") }}" method="post">
                    
                    <input type="hidden" name="role" value="role">

                    <label for="">Nama</label><br>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{ $user->nama }}" name="nama" required placeholder="Nama">
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

                    @if (
                    Auth::user()->role == 1
                    )
                      <label for="">Nomor HP</label><br>
                      <div class="input-group mb-3">
                          <input type="text" class="form-control" value="{{ $user->no_hp }}" name="no_hp" required placeholder="no_hp">
                          <div class="input-group-append">
                          </div>
                      </div>
                        <label for="">Nomor Induk Kependudukan</label><br>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="{{ $user->nik }}" name="nik" required placeholder="nik">
                            <div class="input-group-append">
                            </div>
                        </div>
    
                        <label for="">Alamat</label><br>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="{{ $user->alamat }}" name="alamat" required placeholder="alamat">
                            <div class="input-group-append">
                            </div>
                        </div>
                        <label for="">RT</label><br>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="{{ $user->rt }}" name="rt" required placeholder="rt">
                            <div class="input-group-append">
                            </div>
                        </div>
                        <label for="">RW</label><br>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="{{ $user->rw }}" name="rw" required placeholder="rw">
                            <div class="input-group-append">
                            </div>
                        </div>
                        <label for="">Kecamatan</label><br>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="{{ $user->kecamatan }}" name="kecamatan" required placeholder="kecamatan">
                            <div class="input-group-append">
                            </div>
                        </div>
                        <label for="">Kabupaten</label><br>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="{{ $user->kabupaten }}" name="kabupaten" required placeholder="kabupaten">
                            <div class="input-group-append">
                            </div>
                        </div>
                        <label for="">Nama Ketua Kelompok</label><br>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="{{ $user->nama_ketua_kelompok }}" name="nama_ketua_kelompok" required placeholder="nama ketua kelompok">
                            <div class="input-group-append">
                            </div>
                        </div>
                        <label for="">Tahun Tanam</label><br>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="{{ $user->tahun_tanam }}" name="tahun_tanam" required placeholder="tahun tanam">
                            <div class="input-group-append">
                            </div>
                        </div>
                        <label for="">Jumlah Paket</label><br>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="{{ $user->jumlah_paket }}" name="jumlah_paket" required placeholder="jumlah paket">
                            <div class="input-group-append">
                            </div>
                        </div>
                        
                        
                        <label for="">Nama Bank</label><br>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="{{ $user->bank }}" name="bank" required placeholder="bank">
                            <div class="input-group-append">
                            </div>
                        </div>

                        

                        <label for="">Nomor Rekening</label><br>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="{{ $user->nomor_rekening }}" name="nomor_rekening" required placeholder="nomor rekening">
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