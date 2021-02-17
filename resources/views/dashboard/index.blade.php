@extends('layouts.app')

@section('style')
  <link rel="stylesheet" href="{{ asset("assets/corousle.css") }}" />

  <style>
    .image1{
        height: 500px !important; width:auto; margin: 0 auto
      }
    @media screen and (max-width: 800px) {
      .image1{
        height: 200px !important; width:auto; margin: 0 auto
      }
    }
  </style>

@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Home</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="owl-carousel" >
          <div> <img class="image1" src="{{ asset("bg/1.jpg") }}" alt=""> </div>
          <div> <img class="image1" src="{{ asset("bg/2.jpg") }}" alt=""> </div>
          <div> <img class="image1" src="{{ asset("bg/3.jpg") }}" alt=""> </div>
          <div> <img class="image1" src="{{ asset("bg/4.jpg") }}" alt=""> </div>
          <div> <img class="image1" src="{{ asset("bg/5.jpg") }}" alt=""> </div>
          <div> <img class="image1" src="{{ asset("bg/6.jpg") }}" alt=""> </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection


@section('script')
  <script src="{{ asset("assets/corousle.js") }}"></script>

  <script>
    $(document).ready(function(){
      $(".owl-carousel").owlCarousel({
            items: 1,
            // singleItem: false,
            autoplay:true,
            autoplayTimeout:3000,
        });
    });
  </script>
  
@endsection