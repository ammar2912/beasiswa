<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Pendaftar AKBID JEMBER</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo base_url()?>desain/Login_baru/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>desain/Login_baru/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>desain/Login_baru/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>desain/Login_baru/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>desain/Login_baru/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>desain/Login_baru/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>desain/Login_baru/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>desain/Login_baru/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>desain/Login_baru/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>desain/Login_baru/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>desain/Login_baru/css/main.css">
  <link href="http://utamahusada.esolusindo.com/desain/Login/css/style.css" rel='stylesheet' type='text/css' />
  <link href="http://utamahusada.esolusindo.com/desain/Login/css/loader.css" rel='stylesheet' type='text/css' />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
        <div class="loader animated flipInX" style="display:none;">
          <div class="sk-folding-cube">
            <div class="sk-cube1 sk-cube"></div>
            <div class="sk-cube2 sk-cube"></div>
            <div class="sk-cube4 sk-cube"></div>
            <div class="sk-cube3 sk-cube"></div>
         </div>
       </div>
				<form class="login100-form validate-form" id="FormLogin">
					<span class="login100-form-title p-b-43">
						Login to continue
					</span>
          <?php echo @$this->session->flashdata("alert") ?>
          <h6 class="badge-username"><span class="badge badge-danger">NIM Anda Tidak Ditemukan</span></h6>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username" id="username">
						<span class="focus-input100"></span>
						<span class="label-input100">NIM (Nomor Induk Mahasiswa)</span>
					</div>

          <h6 class="badge-password"><span class="badge badge-danger">Maaf Password Anda Salah</span></h6>
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" value="" id="password" >
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<!-- <div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div> -->

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">LOGIN</button>

					</div>

					<!-- <div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							or sign up using
						</span>
					</div>

					<div class="login100-form-social flex-c-m">
						<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fa fa-facebook-f" aria-hidden="true"></i>
						</a>

						<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					</div> -->
				</form>

				<div class="login100-more" style="background-image: url('<?php echo base_url()?>desain/mahasiswaakbid.jpg');">
				</div>
			</div>
		</div>
	</div>





<!--===============================================================================================-->
	<script src="<?php echo base_url()?>desain/Login_baru/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>desain/Login_baru/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>desain/Login_baru/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url()?>desain/Login_baru/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>desain/Login_baru/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>desain/Login_baru/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url()?>desain/Login_baru/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>desain/Login_baru/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>desain/Login_baru/js/main.js"></script>
  <script type="text/javascript">
  function coba() {
    $('#FormLogin').addClass('animated bounceOutLeft');
    // alert("asdasd");
  }
  $(document).ready(function(e){
    $("#FormLogin").on('submit', function(e){
      e.preventDefault();
      var usernameid = $('#username').val();
      var passwordid = $('#password').val();

      // alert("asdasd");
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url();?>index.php/Login/aksi_mahasiswa',
        data: { username: usernameid, password: passwordid },
        beforeSend: function () {
              if (  $( '#login-form' ).css( "transform" ) == 'none' ){
                  $('#FormLogin').addClass('animated flipOutX');
                 var delay=100;
                  setTimeout(function(){
                    $('.loader').css("display","block");
                  }, delay);
              } else {
                  $('#login-form').css("transform","" );
              }
           },
        error: function(err) {
             alert(err);
        },
        success: function(response) {
          if (response == "u") {
            $('#FormLogin').addClass('animated flipOutX');
            $('#FormLogin').css("display","block");

          } else if (response == "p") {
            $('#FormLogin').removeClass('animated flipOutX');
            $('.loader').css("display","none");
            $('.badge-password').css("display","block");
            $('.username').addClass('input-success');
            $('.password').addClass('input-fail');

          } else if (response == "up") {
            $('#FormLogin').removeClass('animated flipOutX');
            $('.loader').css("display","none");
            $('.badge-password').css("display","block");
            $('.badge-username').css("display","block");
            $('.username').addClass('input-fail');
            $('.password').addClass('input-fail');
          } else {
            window.location = response;
          }
          // alert(response);

        }
      });
    });
  });

  </script>
</body>
</html>
