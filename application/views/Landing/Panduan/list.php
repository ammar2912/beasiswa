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
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">PANDUAN DI KEMAHASISWAAN POLIJE</div>
                </div>
                <div class="row pb-4">
                  <?php foreach ($data as $value): ?>
                    <div class="col-md-5 mb-3">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img"><img src="<?php echo base_url().$value->foto; ?>" alt=""/></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="col-md-7 animate-box">
                        <a href="Agenda/detail/<?php echo $value->idagenda ?>" class="fh5co_magna py-2"> <?php echo $value->judul; ?>  </a>
                        <p><?php echo date("d M Y", strtotime($value->tanggal)) ?></p>
                        <div class="fh5co_consectetur"> <?php echo $value->keterangan; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Most Popular</div>
                </div>
                <?php foreach ($terbaru as $value): ?>
                  <div class="row pb-3">
                      <div class="col-5 align-self-center">
                          <img src="<?php echo base_url().$value->foto ?>" alt="img" class="fh5co_most_trading"/>
                      </div>
                      <div class="col-7 paddding">
                          <div class="most_fh5co_treding_font"><?php echo $value->judul ?>.</div>
                          <div class="most_fh5co_treding_font_123"> <?php echo $this->libcore->tgl($value->tanggal) ?></div>
                      </div>
                  </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="row mx-0">
            <div class="col-12 text-center pb-4 pt-4">
                <a href="#" class="btn_mange_pagging"><i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp; Previous</a>
                <a href="#" class="btn_pagging">1</a>
                <a href="#" class="btn_pagging">2</a>
                <a href="#" class="btn_pagging">3</a>
                <a href="#" class="btn_pagging">...</a>
                <a href="#" class="btn_mange_pagging">Next <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp; </a>
             </div>
        </div>
    </div>
</div>
  <br>
  <br>
  <?php $this->load->view("Landing/footer") ?>
  <?php $this->load->view("Landing/js"); ?>

</body>
</html>
