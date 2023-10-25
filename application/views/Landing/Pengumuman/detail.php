<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("Landing/css") ?>
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
    <?php $this->load->view("Landing/Menu") ?>
  </header>


  <div class="container-fluid pb-5" style="padding-top: 100px;">
    <div class="container paddding">
      <div class="row mx-0">
        <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
          <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">
              <b><?php echo $data["judul"] ?></b>
              <p><?php echo $this->libcore->tgl($data["tanggal"]) ?></p>
            </div>
          </div>
          <div class="row pb-4">
            <img src="<?php echo base_url().$data["foto"] ?>" width="100%">
            <?php echo $data["keterangan"] ?>
          </div>
        </div>
      </div>

    </div>
  </div>
  <div class="container-fluid pb-4 pt-5">
    <div class="container animate-box">
      <div>
        <div class="fh5co_heading py-2 mb-4">Pengumuman Terbaru</div>
      </div>
      <div class="owl-carousel owl-theme" id="slider2">
        <?php foreach ($terbaru as $value): ?>
          <div class="item px-2">
            <div class="fh5co_hover_news_img">
              <div class="fh5co_news_img"><img src="<?php echo base_url().$value->foto ?>" alt=""/></div>
              <div>
                <a href="<?php echo $value->idpengumuman ?>" class="d-block fh5co_small_post_heading"><span class=""><?php echo $value->judul ?></span></a>
                <div class="c_g"><i class="fa fa-clock-o"></i> <?php echo $this->libcore->tgl($value->tanggal) ?></div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <br>
  <br>

<?php $this->load->view("Landing/footer") ?>
<?php $this->load->view("Landing/js"); ?>

</body>
</html>
