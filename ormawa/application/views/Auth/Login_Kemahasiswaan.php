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
    <!-- <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">SIM ORMAWA</p>
        </div>
    </div> -->
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper" >
        <div class="login-register" style="background-image:url('<?php echo base_url()?>desain/Login/images/bg1.png'); background-size: cover;padding-top:30px !important">
            <div class="login-box card">
                <div class="card-body" >
                    <form class="form-horizontal form-material" method="post" action="<?php echo base_url()."Login/cek_login"?>">
                        <center><img src="<?php echo base_url()?>desain/logo_polije.png" alt="Home"  style=" widht:100px; height:100px;"/></center><br/>
                        <center><h3 class="box-title m-b-20"><b>SIM ORMAWA</b></h3></center>
                        <div class="form-group ">
                            <div class="col-xs-12">
                              <?php if ($this->session->flashdata("salah_username")): ?>
                                <small><span class="badge badge-danger"><?php echo $this->session->flashdata("salah_username");?></span></small>
                              <?php endif; ?>
                                <input class="form-control" type="text" name="username" required placeholder="Username">
                                <small>Masukkan Username</small>
                              </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                              <?php if ($this->session->flashdata("salah_password")): ?>
                                <small><span class="badge badge-danger"><?php echo $this->session->flashdata("salah_password");?></span></small>
                              <?php endif; ?>
                                <input class="form-control" type="password" name="password" required placeholder="Password">
                                <small>Masukkan Password</small>
                              </div>
                        </div><br>
                        <div class="form-group">
                          <div class="col-xs-12" style="text-align:center">
                            <input type="radio" id="kemahasiswaan" name="akses" value="kemahasiswaan" required >
                            <label for="kemahasiswaan">Kemahasiswaan</label>
                            &nbsp;
                            <input type="radio" id="pimpinan" name="akses" value="pimpinan" required >
                            <label for="pimpinan">Pimpinan</label>
                          </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">LOGIN</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->

</body>

</html>
