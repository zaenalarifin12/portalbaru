@extends('layouts.app')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Kebutuhan Petani</h1>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <h5 class="mb-2">Daftar Kebutuhan Petani</h5>

                <div class="row">

                    @forelse ($product as $item)

                        <div class="col-md-4">
                            <!-- Widget: user widget style 1 -->
                            <div class="card card-widget widget-user">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-info" style="height: 55px">
                                    <h3 class="widget-user-username">{{ $item->nama }}</h3>
                                </div>
                                <div class="widget-user-image">

                                </div>
                                <div class="d-flex justify-content-center">
                                    <img class="" style="width: 100%" src="{{ asset("/storage/$item->gambar") }}"
                                        alt="User Avatar">
                                </div>
                                <div class="card-footer" style="padding-top: 20px">
                                    <div class="row justify-content-between">
                                        <p>Rp. {{ $item->harga }}</p>
                                        <div>
                                            <input type="hidden" name="id[]" value="{{ $item->id }}">
                                            <input type="text" disabled class="form-control" name="jumlah[]"
                                                value="{{ $item->jumlah }}">
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>
                            <!-- /.widget-user -->
                        </div>

                        @endforeach

                    </div>
                    @if ($order->status == 'belum')
                        <p class="text-primary">Status : {{ $order->status }}</p>
                    @elseif ($order->status == "dikirim")
                        <p class="text-primary">Status : {{ $order->status }}</p>
                    @elseif ($order->status == "salah")
                        <p class="text-primary">Status : Total Jumlah Harga tidak sesuai struk</p>
                        <a href="{{ url("/pesanan-saya/$order->id") }}" class="btn btn-info">Upload ulang</a>
                    @else
                        <p class="text-success">Status : {{ $order->status }}</p>
                    @endif
                    <p>total Kebutuhan : Rp. {{ $order->total - 10000 }} + ongkir : Rp. 10000</p>
                    <p>Total : {{ $order->total }}</p>

                    @if (!empty($order->struk))
                        <img class="mb-4" width="500px" src="{{ asset("/storage/$order->struk") }}" alt="" srcset="">
                    @endif



                    @if (Auth::user()->role == 3 || Auth::user()->role == 5)

                        @if ($order->status == 'belum' || $order->status == 'salah')
                            <form action="{{ url("/semua-pesanan/$order->id/dikirim") }}" method="post">
                                @method("PUT")
                                @csrf
                                <button class="btn btn-sm btn-info">Konfirmasi Dikirim</button>
                            </form>
                            <br>

                            @if ($order->struk != null)
                                <form action="{{ url("/semua-pesanan/$order->id/salah") }}" method="post">
                                    @method("PUT")
                                    @csrf
                                    <button class="btn btn-sm btn-danger">Salah Struck</button>
                                </form>
                            @endif

                        @endif

                    @endif

                    @if (Auth::user()->role == 1)

                        @if ($order->status == 'dikirim')
                            <form action="{{ url("/semua-pesanan/$order->id") }}" method="post">
                                @method("PUT")
                                @csrf
                                <button class="btn btn-sm btn-info">Konfirmasi Terkirim</button>
                            </form>
                        @endif

                    @endif





                    <!-- /.row -->
                </div>
            </section>
            <!-- /.content -->

            <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
                <i class="fas fa-chevron-up"></i>
            </a>
        </div>

    @endsection
