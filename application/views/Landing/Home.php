<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">

    <title>PROFIL KEMAHASISWAAN POLIJE</title>
<!--
SOFTY PINKO
https://templatemo.com/tm-535-softy-pinko
-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>desain/landing/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>desain/landing/assets/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>desain/landing/assets/css/templatemo-softy-pinko.css">

    <!-- Carousel -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>desain/logo_polije.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url() ?>desain/logo_polije.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url() ?>desain/logo_polije.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url() ?>desain/logo_polije.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url() ?>desain/logo_polije.png">
    <!-- Carousel -->

    <!-- Produk -->
    <link rel="stylesheet" href="<?php echo base_url() ?>desain/landing/produk/assets/plugins/bootstrap/bootstrap.min.css">
    <!-- Ionicons Fonts Css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>desain/landing/produk/assets/plugins/ionicons/ionicons.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>desain/landing/produk/assets/plugins/animate-css/animate.css">
    <!-- Hero area slider css-->
    <link rel="stylesheet" href="<?php echo base_url() ?>desain/landing/produk/assets/plugins/slider/slider.css">
    <!-- slick slider -->
    <link rel="stylesheet" href="<?php echo base_url() ?>desain/landing/produk/assets/plugins/slick/slick.css">
    <!-- Fancybox -->
    <link rel="stylesheet" href="<?php echo base_url() ?>desain/landing/produk/assets/plugins/facncybox/jquery.fancybox.css">
    <!-- hover -->
    <link rel="stylesheet" href="<?php echo base_url() ?>desain/landing/produk/assets/plugins/hover/hover-min.css">
    <!-- template main css file -->
    <link rel="stylesheet" href="<?php echo base_url() ?>desain/landing/produk/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>desain/MyCSS.css">
    <!-- Produk -->

    <!-- Agenda -->
    <link rel="stylesheet" href="<?php echo base_url() ?>desain/landing/agenda/assets/css/maicons.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>desain/landing/agenda/assets/vendor/animate/animate.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>desain/landing/agenda/assets/vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>desain/landing/agenda/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>desain/landing/agenda/assets/css/mobster.css">
    <!-- Agenda -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

    </head>

    <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
            <div class="row">
                <div class="col-12">
                    <?php $this->load->view("Landing/Menu") ?>
                </div>
            </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Welcome Area Start ***** -->
    <div class="top-content">
      <div class="row no-gutters">
        <div class="col">
          <div id="carousel-example" class="carousel slide" data-ride="carousel" style="margin-top: 79px;">
            <ol class="carousel-indicators" style="bottom: 30px !important;">
              <?php $no=0; foreach ($this->ModelCarousel->get_carousel()->result() as $value): ?>
                <li data-target="#carousel-example" data-slide-to="<?php echo $no ?>" class="<?php echo $ak = ($no==0) ? "active" : "" ; ?>"></li>
              <?php $no++; endforeach; ?>
            </ol>
            <div class="carousel-inner">
              <?php $no=0; foreach ($this->ModelCarousel->get_carousel()->result() as $value): ?>
                <div class="carousel-item <?php echo $ak = ($no==0) ? "active" : "" ; ?>">
                  <img src="<?php echo $value->gambar ?>" class="d-block w-100" alt="img1">
                  <div class="carousel-caption" style="bottom: 40px !important;">
                    <h1 class="wow fadeInLeftBig"><?php echo $value->judul ?></h1>
                    <div class="description wow fadeInUp">
                      <p>
                        <?php echo $value->isi ?>
                      </p>
                    </div>
                  </div>
                </div>
              <?php $no++; endforeach; ?>
              <!-- <div class="bg-corousel">
                <img src="<?php echo base_url() ?>desain/bg1.png" alt="" style="height: 50px;width: 100%;">
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- <div class="welcome-area" id="welcome">

        ***** Header Text Start *****
        <div class="header-text">
            <div class="container">
                <div class="row">
                    <div class="offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 col-md-12 col-sm-12">
                        <h1><strong>TEFA DATARAN TINGGI</strong><br><strong>POLITEKNIK NEGERI JEMBER</strong></h1>
                        <p>Softy Pinko is a professional Bootstrap 4.0 theme designed by Template Mo/
                        for your company at absolutely free of charge</p>
                        <a href="#features" class="main-button-slider">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
        ***** Header Text End *****
    </div> -->
    <!-- ***** Welcome Area End ***** -->

    <!-- ***** Features Big Item Start ***** -->
    <section class="section padding-bottom-100 padding-top-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-bottom-fix wow fadeInLeft" data-wow-delay=".3s">
                    <div class="left-heading">
                        <h2>TENTANG</h2>
                        <h2 class="datarantinggi"><b>KEMAHASISWAAN POLIJE</b></h2>
                    </div>
                    <div class="left-text">
                        <p>Mahasiswa Politeknik Negeri Jember tidak hanya dibimbing untuk menjadi tenaga ahli sesuai bidangnya, namun juga didorong untuk menjadi masyarakat yang memiliki nilai lebih dengan soft skill-nya, misalnya kemampuan leadership, manajemen diri, manajemen acara hingga kemampuan berkomunkasi.</p>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-5 col-md-12 col-sm-12 align-self-center mobile-bottom-fix-big" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <img src="<?php echo base_url() ?>desain/gedung-a3-polije.jpg" class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
                <!-- <div class="col-sm-12 col-md-4">
                      <div id="map">
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3569.5966456591227!2d113.68909741447857!3d-8.079393094182965!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6eb6b271a21d7%3A0x7226767f8d34e523!2sDarungan%2C%20Kemuning%20Lor%2C%20Arjasa%2C%20Kabupaten%20Jember%2C%20Jawa%20Timur%2068191!5e1!3m2!1sid!2sid!4v1615168402929!5m2!1sid!2sid" width="100%" height="300px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                      </div>
                </div> -->
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->

    <section class="section padding-top-70 colored" id="blog">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">PENGUMUMAN</h2>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <div class="row">
              <?php foreach ($pengumuman as $value): ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="blog-post-thumb">
                        <div class="img">
                            <img src="<?php echo base_url().$value->foto ?>" alt="">
                        </div>
                        <div class="blog-content">
                            <h3>
                                <a href="#"><?php echo $this->libcore->tgl($value->tanggal) ?></a>
                            </h3>
                            <div class="text" style="position: inherit;margin: 0px;padding: 0px; font-size: 16px;">
                               <?php echo $value->judul ?>
                            </div>
                            <a href="<?php echo base_url()?>Pengumuman/detail/<?php echo $value->idpengumuman;?>"   class="main-button">Read More</a>
                        </div>
                    </div>
                </div>
              <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="mini mini2" id="work-process">
        <div class="mini-content">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-3 col-lg-6">
                        <div class="info">
                            <h1>KONTEN PROFIL</h1>
                        </div>
                    </div>
                </div>
                <!-- ***** Mini Box Start ***** -->
                <div class="row">
                  <div class="col-lg-5">
                    <div class="col-lg-12 wow fadeInLeft" data-wow-delay=".3s">
                        <a href="<?php echo base_url() ?>OrmawaData" class="mini-box">
                            <i><img src="<?php echo base_url() ?>desain/landing/assets/images/work-process-item-01.png" alt=""></i>
                            <strong>ORMAWA</strong>
                            <span>Ormawa di Kemahasiswaan Polije</span>
                        </a>
                    </div>
                    <div class="col-lg-12 wow fadeInLeft" data-wow-delay=".6s">
                        <a href="<?php echo base_url() ?>Prestasi" class="mini-box">
                            <i><img src="<?php echo base_url() ?>desain/landing/assets/images/work-process-item-01.png" alt=""></i>
                            <strong>PRESTASI</strong>
                            <span>Prestasi di Kemahasiswaan Polije</span>
                        </a>
                    </div>
                    <div class="col-lg-12 wow fadeInLeft" data-wow-delay=".9s">
                        <a href="<?php echo base_url() ?>Beasiswa" class="mini-box">
                            <i><img src="<?php echo base_url() ?>desain/landing/assets/images/work-process-item-01.png" alt=""></i>
                            <strong>BEASISWA</strong>
                            <span>Beasiswa di Kemahasiswaan Polije</span>
                        </a>
                    </div>
                  </div>
                  <div class="col-lg-7 wow fadeInRight" data-wow-delay=".6s">
                    <img src="<?php echo base_url() ?>desain/business-3d.png" alt="">
                  </div>
                </div>
                <!-- ***** Mini Box End ***** -->
            </div>
        </div>
    </section>

    <section id="works" class="section padding-top-70 colored">
        <div class="container">
            <div class="section-heading">
                <h1 class="title wow fadeInDown" data-wow-delay=".3s"><b>Program Kegiatan</b></h1>
            </div>
            <div class="row">
              <?php foreach ($gallery as $value): ?>
                <div class="col-md-4 col-sm-6">
                    <figure class="wow fadeInLeft animated portfolio-item" data-wow-duration="500ms" data-wow-delay="0ms">
                        <div class="img-wrapper">
                            <img src="<?php echo base_url().$value->foto; ?>" class="img-fluid" alt="this is a title" >
                            <div class="overlay">
                                <div class="buttons">
                                    <a rel="gallery" class="fancybox" href="<?php echo base_url().$value->foto; ?>">Lihat Gambar</a>
                                </div>
                            </div>
                        </div>
                        <figcaption>
                          <h4>
                          <a href="<?php echo base_url()?>Gallery/detail/<?php echo $value->idgallery;?>">
                              <?php echo $value->judul; ?>
                          </a>
                          </h4>
                          <div style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; /* number of lines to show */ -webkit-box-orient: vertical;">
                            <?php echo $value->keterangan; ?>
                          </div>
                        </figcaption>
                    </figure>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="mini" id="work-process">
        <div class="mini-content">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-3 col-lg-6">
                        <div class="info">
                            <h1>ORMAWA POLIJE</h1>
                        </div>
                    </div>
                </div>
                <!-- ***** Mini Box Start ***** -->
                <div class="row">
                  <?php foreach ($ormawa as $value): ?>
                    <div class="col-lg-3 wow fadeInDown" data-wow-delay=".6s">
                        <a href="#" class="mini-box">
                            <i><img src="<?php echo base_url() ?>desain/landing/assets/images/work-process-item-01.png" alt=""></i>
                            <strong><?php echo $value->nama_ormawa ?></strong>
                        </a>
                    </div>
                  <?php endforeach; ?>
                </div>
                <!-- ***** Mini Box End ***** -->
            </div>
        </div>
    </section>

    <!-- <section class="section padding-top-70 colored" id="video">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title"><b>Video</b></h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>Video Informasi Dan Kegiatan.</p>
                    </div>
                </div>
            </div>

            <div class="row">
              <div class="slideshow-container col-sm-12">
                <?php $no=1; foreach ($youtube as $value): ?>
                  <div class="mySlides fadeVidio">
                    <div class="numbertext"><?php echo $no++; echo " / ".sizeof($youtube); ?></div>
                    <iframe width="100%" height="400" src="https://www.youtube.com/embed/<?php echo $value->link ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <div class="text"><?php echo $value->judul ?></div>
                  </div>
                <?php endforeach; ?>
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>
            <div class="col-sm-12 center-heading">
              <span class="dot" onclick="currentSlide(1)"></span>
              <span class="dot" onclick="currentSlide(2)"></span>
            </div>
          </div>
        </div>
    </section> -->

    <section id="works" class="section padding-bottom-100 padding-top-70">
        <div class="container">
            <div class="section-heading">
                <h1 class="title wow fadeInDown" data-wow-delay=".3s"><b>PRESTASI MAHASISWA</b></h1>
            </div>
            <div class="row">
              <div class="table-responsive wow fadeInLeft" data-wow-delay=".3s">
                <table id="TablePublikasi" class="table table-bordered table-hover table-striped DataTable">
                  <thead>
                      <tr>
                        <th width="5%">#</label>
                        </th>
                          <th>Nama Lomba</th>
                          <th>Tingkat</th>
                          <th>Prestasi</th>
                          <th>Penyelenggara</th>
                          <th>Tanggal Lomba</th>
                          <th>Nama Mahasiswa</th>
                          <th>Prodi</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($prestasi as $value): ?>
                      <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $value->nama_lomba ?></td>
                        <td><?php echo $value->tingkat ?></td>
                        <td><?php echo $value->prestasi ?></td>
                        <td><?php echo $value->penyelenggara ?></td>
                        <td><?php echo $value->tanggal_lomba ?></td>
                        <td><?php echo $value->nama_mahasiswa ?></td>
                        <td><?php echo $value->prodi ?></td>
                      </tr>
                      <?php $no++; endforeach; ?>
                  </tbody>
                    </table>
            </div>
            <br>
            </div>
        </div>
    </section>

    <!-- ***** Footer Start ***** -->
    <?php $this->load->view("Landing/footer") ?>



    <!-- jQuery -->
    <script src="<?php echo base_url() ?>desain/landing/assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="<?php echo base_url() ?>desain/landing/assets/js/popper.js"></script>
    <script src="<?php echo base_url() ?>desain/landing/assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="<?php echo base_url() ?>desain/landing/assets/js/scrollreveal.min.js"></script>
    <script src="<?php echo base_url() ?>desain/landing/assets/js/waypoints.min.js"></script>
    <script src="<?php echo base_url() ?>desain/landing/assets/js/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url() ?>desain/landing/assets/js/imgfix.min.js"></script>

    <!-- Global Init -->
    <script src="<?php echo base_url() ?>desain/landing/assets/js/custom.js"></script>

    <!-- Carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="<?php echo base_url() ?>desain/landing/carousel/assets/js/jquery.backstretch.min.js"></script>
    <script src="<?php echo base_url() ?>desain/landing/carousel/assets/js/waypoints.min.js"></script>
    <script src="<?php echo base_url() ?>desain/landing/carousel/assets/js/scripts.js"></script>
    <!-- Carousel -->

    <!-- Produk -->
    <script src="<?php echo base_url() ?>desain/landing/produk/assets/plugins/jQurey/jquery.min.js"></script>
    <!-- Form Validation -->
      <script src="<?php echo base_url() ?>desain/landing/produk/assets/plugins/form-validation/jquery.form.js"></script>
      <script src="<?php echo base_url() ?>desain/landing/produk/assets/plugins/form-validation/jquery.validate.min.js"></script>
    <!-- slick slider -->
    <script src="<?php echo base_url() ?>desain/landing/produk/assets<?php echo base_url() ?>desain/landing/produk/assets/plugins/slick/slick.min.js"></script>
    <!-- bootstrap js -->
    <script src="<?php echo base_url() ?>desain/landing/produk/assets/plugins/bootstrap/bootstrap.min.js"></script>
    <!-- wow js -->
    <script src="<?php echo base_url() ?>desain/landing/produk/assets/plugins/wow-js/wow.min.js"></script>
    <!-- slider js -->
    <script src="<?php echo base_url() ?>desain/landing/produk/assets/plugins/slider/slider.js"></script>
    <!-- Fancybox -->
    <script src="<?php echo base_url() ?>desain/landing/produk/assets/plugins/facncybox/jquery.fancybox.js"></script>
    <!-- template main js -->
    <script src="<?php echo base_url() ?>desain/landing/produk/assets/js/main.js"></script>
    <!-- Produk -->

    <!-- Agenda -->
    <script src="<?php echo base_url() ?>desain/landing/agenda/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?php echo base_url() ?>desain/landing/agenda/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>desain/landing/agenda/assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url() ?>desain/landing/agenda/assets/vendor/wow/wow.min.js"></script>
    <script src="<?php echo base_url() ?>desain/landing/agenda/assets/js/mobster.js"></script>
    <!-- Agenda -->
    <script src="<?php echo base_url(); ?>desain/assets/node_modules/datatables/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

<script type="text/javascript">
var slideIndex = 1;
$(document).ready(function() {
  $('#myTable').DataTable();
  $('#TableR5').dataTable( {
    "pageLength": 5
  });
  $('#TablePublikasi').dataTable( {
    "pageLength": 5
  });

  showSlides(slideIndex);
});

      function plusSlides(n) {
        showSlides(slideIndex += n);
      }

      function currentSlide(n) {
        showSlides(slideIndex = n);
      }

      function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
      }
    </script>


  </body>
</html>
