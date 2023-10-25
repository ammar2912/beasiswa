<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("Landing/css") ?>
<link href="<?php echo base_url() ?>desain/dist/css/style.min.css" rel="stylesheet">

<link href="<?php echo base_url() ?>desain/landing/berita/css/media_query.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url() ?>desain/landing/berita/css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link href="<?php echo base_url() ?>desain/landing/berita/css/animate.css" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
<link href="<?php echo base_url() ?>desain/landing/berita/css/owl.carousel.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url() ?>desain/landing/berita/css/owl.theme.default.css" rel="stylesheet" type="text/css"/>
<!-- Bootstrap CSS -->
<link href="<?php echo base_url() ?>desain/landing/berita/css/style_1.css" rel="stylesheet" type="text/css"/>
<!-- Modernizr JS -->
<script src="<?php echo base_url() ?>desain/landing/berita/js/modernizr-3.5.0.min.js"></script>
<body>

  <!-- <div id="preloader">
    <div class="jumper">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div> -->
  <!-- ***** Preloader End ***** -->


  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
      <div class="row">
        <div class="col-12">
          <?php $this->load->view("Landing/Menu") ?>
        </div>
      </div>
  </header>


  <div class="container-fluid pb-4" style="padding-top: 100px">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-12 animate-box" data-animate-effect="fadeIn">
              <h4>KONTAK HUBUNG</h4>
              <hr>
              <br>
            </div>
            <div class="col-md-5 animate-box" data-animate-effect="fadeInLeft">
              <img src="<?php echo base_url() ?>desain/contact.png" alt="" width="100%">
            </div>
            <div class="col-md-6 animate-box" data-animate-effect="fadeInRight">
              <h6>Nama Unit</h6>
              <h4><?php echo $data['nama_unit'] ?></h4>
              <br>
              <h6>Alamat</h6>
              <h4><?php echo $data['alamat'] ?></h4>
              <br>
              <h6>Telepon</h6>
              <h4><?php echo $data['telepon'] ?></h4>
              <br>
              <h6>Email</h6>
              <h4><?php echo $data['email'] ?></h4>
            </div>
        </div>
    </div>
</div>
  <br>
  <br>
  <?php $this->load->view("Landing/footer") ?>
  <?php $this->load->view("Landing/js"); ?>
  <script type="text/javascript">
    $("#TableR5").DataTable();
  </script>
</body>
</html>
