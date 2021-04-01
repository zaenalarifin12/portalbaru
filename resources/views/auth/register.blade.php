<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset("assets/plugins/fontawesome-free/css/all.min.css")}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset("assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("assets/css/adminlte.min.css")}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
  
<div class="login-box " style="margin-top: 500px;">
  <div class="login-logo">
    <a href="#">Portal</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Daftar</p>


      <form action="{{ url("/register") }}" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="nama" required placeholder="Nama">
          <div class="input-group-append">
            <div class="input-group-text">
              
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" required placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" required placeholder="username">
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="no_hp" required placeholder="no_hp">
            <div class="input-group-append">
              <div class="input-group-text">
              </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="nik" required placeholder="nik">
            <div class="input-group-append">
              <div class="input-group-text">
                
              </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="alamat" required placeholder="alamat">
            <div class="input-group-append">
              <div class="input-group-text">
                
              </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="rt" required placeholder="rt">
            <div class="input-group-append">
              <div class="input-group-text">
                
              </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="rw" required placeholder="rw">
            <div class="input-group-append">
              <div class="input-group-text">
                
              </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="kecamatan" required placeholder="kecamatan">
            <div class="input-group-append">
              <div class="input-group-text">
                
              </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="kabupaten" required placeholder="kabupaten">
            <div class="input-group-append">
              <div class="input-group-text">
                
              </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="nama_ketua_kelompok" required placeholder="nama ketua kelompok">
            <div class="input-group-append">
              <div class="input-group-text">
                
              </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="tahun_tanam" required placeholder="tahun tanam">
            <div class="input-group-append">
              <div class="input-group-text">
                
              </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="jumlah_paket" required placeholder="jumlah paket">
            <div class="input-group-append">
              <div class="input-group-text">
                
              </div>
            </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" name="bank" placeholder="Nama Bank">
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
      </div>

        <div class="input-group mb-3">
            <input type="text" class="form-control" name="nomor_rekening" placeholder="nomor rekening">
            <div class="input-group-append">
              <div class="input-group-text">
              </div>
            </div>
        </div>

        <div class="row">
          <div class="col-8">
        
          </div>
          <!-- /.col -->
          <div class="col-4">
            @csrf
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-0">
        <a href="{{ url("/login") }}" class="text-center">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset("assets/plugins/jquery/jquery.min.js")}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset("assets/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset("assets/dist/js/adminlte.min.js")}}"></script>

<script>
    
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({
        'transform': 'scale('+scale+')',
        'position': 'absolute'
      });
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".submit").click(function(){
	return false;
})
</script>

</body>
</html>
