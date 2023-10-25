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
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Informasi</div>
                </div>
                <div class="row pb-4">
                  <?php foreach ($data as $value): ?>
                    <div class="col-md-5 mb-3">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img"><img src="<?php echo base_url().$value->foto; ?>" alt=""/></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="col-md-7 animate-box" id="textoverflow">
                        <a href="<?php echo base_url() ?>Pengumuman/detail/<?php echo $value->idpengumuman ?>" class="fh5co_magna py-2"> <?php echo $value->judul; ?>  </a>
                        <p><?php echo date("d M Y", strtotime($value->tanggal)) ?></p>
                        <div align="justify" class="fh5co_consectetur"> <?php  echo implode('. ', array_slice(explode('.', $value->keterangan), 0, 1)) . '.' . '...'; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php $this->load->view("Landing/kegiatanpolpuler") ?>
        </div>
        <div class="row mx-0">
            <div class="col-12 text-center pb-4 pt-4">
              <?php $page = $this->uri->segment(3);
              if ($page > 0): ?>
                <a href="<?php echo base_url("Pengumuman/page/").($page-1) ?>" class="btn_mange_pagging"><i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp; Previous</a>
              <?php endif; ?>
              <?php if ($page < $limit_page): ?>
                <a href="<?php echo base_url("Pengumuman/page/").($page+1) ?>" class="btn_mange_pagging">Next <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp; </a>
              <?php endif; ?>
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
