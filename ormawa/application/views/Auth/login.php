<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>desain/logo_polije.png">
    <title>SIM ORMAWA</title>

    <!-- page css -->
    <link href="<?php echo base_url()?>desain/dist/css/pages/login-register-lock.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>desain/dist/css/style.min.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">SIM ORMAWA</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper" class="login-register login-sidebar" style="background-image:url('<?php echo base_url()?>desain/Login/images/bg1.png'); background-size: cover; ">
        <div class="login-box card">
            <div class="card-body" style=" padding-top: 80px;">
                <form class="form-horizontal form-material" id="loginform" method="post" action="<?php echo base_url()."Login/cek_login"?>">
                    <a href="javascript:void(0)" class="text-center db">
                      <center><img src="<?php echo base_url()?>desain/logo_polije.png" alt="Home"  style=" widht:100px; height:100px;"/></center><br/>
                      <h2 style="color:#03A9F3"><b>SIM ORMAWA</b></h2>
                    </a>
                    <div class="form-group m-t-40">
                      <?php if ($this->session->flashdata("salah_username")): ?>
                        <small style="font-size:17px"><span class="badge badge-danger"><?php echo $this->session->flashdata("salah_username");?></span></small>
                      <?php endif; ?>
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" name="username" id="username" placeholder="USERNAME">
                              <small>Masukkan Username</small>
                        </div>
                        <div class="col-xs-12" id="angkatan">
                            <!-- <input class="form-control" type="text" required="" name="username" id="username" placeholder="USERNAME"> -->
                            <select name="angkatan" class="form-control">
                              <option value="">Pilih Angkatan</option>
                              <?php $tahun=date('Y'); for ($a=2016;$a<=$tahun;$a++){ ?>
                                <option value="<?=$a;?>"><?=$a;?></option>
                              <?php } ?>
                            </select>
                              <!-- <small>Pilih Angkatan</small> -->
                        </div>
                        <div class="col-xs-12" id="jurusan">
                            <!-- <input class="form-control" type="text" required="" name="username" id="username" placeholder="USERNAME"> -->
                            <select name="jurusan" id="data_jurusan" class="form-control">
                              <option value="">Pilih Jurusan</option>
                              <?php
                               foreach ($jurusan as $value) {  ?>
                                <option value="<?=$value->id;?>"><?=$value->nama_jurusan;?></option>
                              <?php } ?>
                            </select>
                              <!-- <small>Pilih Jurusan</small> -->
                        </div>
                        <div class="col-xs-12" id="prodi">
                            <!-- <input class="form-control" type="text" required="" name="username" id="username" placeholder="USERNAME">
                              <small>Pilih Program Studi</small> -->
                              <select name="prodi" id="data_prodi" class="form-control">
                                <option value="">Pilih Prodi</option>
                              </select>
                        </div>
                    </div>
                    <div class="form-group" id="form-password">
                      <?php if ($this->session->flashdata("salah_password")): ?>
                        <small style="font-size:17px"><span class="badge badge-danger"><?php echo $this->session->flashdata("salah_password");?></span></small>
                      <?php endif; ?>
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password" id="password" placeholder="PASSWORD">
                            <small>Masukkan Password</small>
                        </div>
                    </div>

                    <div class="form-group">
                      <div class="col-xs-12" style="text-align:center">
                        <input type="radio" id="mahasiswa" name="akses" value="mahasiswa" >
                        <label for="mahasiswa">Mahasiswa</label>
                        &nbsp;
                        <input type="radio" id="ormawa" name="akses" value="ormawa" >
                        <label for="ormawa">Ormawa</label>
                      </div>
                    </div>

                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg text-uppercase btn-rounded " style="border-left-width: 1px; width: 200px;" type="submit">Login</button>
                        </div>
                    </div>


                </form>

            </div>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url()?>desain/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url()?>desain/assets/node_modules/popper/popper.min.js"></script>
    <script src="<?php echo base_url()?>desain/assets/node_modules/bootstrap/<?php echo base_url()?>desain/dist/js/bootstrap.min.js"></script>
    <!--Custom JavaScript -->
    <script type="text/javascript">

    $(document).ready(function() {
      var password = $('#form-password');
      var jurusan = $('#jurusan');
      var angkatan = $('#angkatan');
      var prodi = $('#prodi');
      password.hide();
      $('input:radio[name="akses"][value="mahasiswa"]').attr('checked','checked');
      $('input:radio[name="akses"]').change(function(){
        if ($(this).val() == 'mahasiswa') {
          password.hide();
          jurusan.show();
          angkatan.show();
          prodi.show();
        }
        else {
          password.show();
          jurusan.hide();
          angkatan.hide();
          prodi.hide();
        }
      });
      });

      $(document).ready(function(){
            $('#data_jurusan').change(function(){
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo base_url('Login/get_prodi');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                      // console.log(data);
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].id+'>'+data[i].nama_prodi+'</option>';
                        }
                        $('#data_prodi').html(html);

                    }
                });
                return false;
            });

        });

        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        // ==============================================================
        // Login and Recover Password
        // ==============================================================
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>

</body>

</html>
