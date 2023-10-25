<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  		<title>Program Kegiatan Kemahasiswaan Polije</title>
<!--

Highway Template

https://templatemo.com/tm-520-highway

-->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="<?php echo base_url() ?>desain/landing/foto_kegiatan/apple-touch-icon.png">
        <link rel="shortcut icon" href="<?php echo base_url() ?>desain/download (4).png">
        <link rel="stylesheet" href="<?php echo base_url() ?>desain/landing/foto_kegiatan/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>desain/landing/foto_kegiatan/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>desain/landing/foto_kegiatan/css/fontAwesome.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>desain/landing/foto_kegiatan/css/light-box.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>desain/landing/foto_kegiatan/css/templatemo-style.css">

        <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300,400,500,600,700,800,900" rel="stylesheet">

        <script src="<?php echo base_url() ?>desain/landing/foto_kegiatan/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

<body>

    <nav>
        <div class="logo">
            <a href="<?php echo base_url() ?>">HOME</a>
        </div>
        <!-- <div class="menu-icon">
        <span></span>
      </div> -->
    </nav>

    <div id="video-container">
        <div class="video-overlay"></div>
        <div class="video-content">
            <div class="inner">
              <h1>PROGRAM KEGIATAN KEMAHASISWAAN POLIJE</h1>
              <p>Unit Kemahasiswaan Politeknik Negeri Jember</p>
                <div class="scroll-icon">
                    <a class="scrollTo" data-scrollTo="portfolio" href="#"><img src="<?php echo base_url() ?>desain/landing/foto_kegiatan/img/scroll-icon.png" alt=""></a>
                </div>
            </div>
        </div>
        <img src="<?php echo base_url() ?>desain/gedung-a3-polije.jpg"/>

        <!-- <video autoplay="" loop="" muted>
        	<source src="<?php echo base_url() ?>desain/landing/foto_kegiatan/foto_kegiatan.mp4" type="video/mp4" />
        </video> -->
    </div>


    <div class="full-screen-portfolio" id="portfolio">
        <div class="container-fluid">
					<?php foreach ($data as $value): ?>
						<div class="col-md-4 col-sm-6">
                <div class="portfolio-item">
                    <a href="<?php echo base_url()?>Gallery/detail/<?php echo $value->idgallery ?>">
                      <!-- <div class="thumb"> -->
                        <div class="hover-effect">
                            <div class="hover-content">
                                <h1><?php echo $value->judul ?></h1>
                                <p><?php echo substr($value->keterangan, 0,50) ?> ...</p>
                            </div>
                        </div>
                        <div class="image">
                            <img src="<?php echo base_url($value->foto ) ?>">
                        </div>
                    <!-- </div> -->
                  </a>
                </div>
            </div>
					<?php endforeach; ?>
        </div>
    </div>


    <footer>
        <div class="container-fluid">
            <div class="col-md-12">
                <p>Copyright &copy; 2021 ESOLUSINDO

    | KEMAHASISWAAN POLIJE</p>
            </div>
        </div>
    </footer>


      <!-- Modal button -->
    <!-- <div class="popup-icon">
      <button id="modBtn" class="modal-btn"><img src="<?php echo base_url() ?>desain/landing/foto_kegiatan/img/contact-icon.png" alt=""></button>
    </div> -->

    <!-- Modal -->
    <div id="modal" class="modal">
      <!-- Modal Content -->
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h3 class="header-title">Say hello to <em>Highway</em></h3>
          <div class="close-btn"><img src="<?php echo base_url() ?>desain/landing/foto_kegiatan/img/close_contact.png" alt=""></div>
        </div>
        <!-- Modal Body -->
        <div class="modal-body">
          <div class="col-md-6 col-md-offset-3">
            <form id="contact" action="" method="post">
                <div class="row">
                    <div class="col-md-12">
                      <fieldset>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Your name..." required="">
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <input name="email" type="email" class="form-control" id="email" placeholder="Your email..." required="">
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..." required=""></textarea>
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="btn">Send Message Now</button>
                      </fieldset>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>



    <section class="overlay-menu">
      <div class="container">
        <div class="row">
          <div class="main-menu">
              <ul>
                  <li>
                      <a href="<?php echo base_url() ?>desain/landing/foto_kegiatan/index.html">Home - Full-width</a>
                  </li>
                  <li>
                      <a href="<?php echo base_url() ?>desain/landing/foto_kegiatan/masonry.html">Home - Masonry</a>
                  </li>
                  <li>
                      <a href="<?php echo base_url() ?>desain/landing/foto_kegiatan/grid.html">Home - Small-width</a>
                  </li>
                  <li>
                      <a href="<?php echo base_url() ?>desain/landing/foto_kegiatan/about.html">About Us</a>
                  </li>
                  <li>
                      <a href="<?php echo base_url() ?>desain/landing/foto_kegiatan/blog.html">Blog Entries</a>
                  </li>
                  <li>
                      <a href="<?php echo base_url() ?>desain/landing/foto_kegiatan/single-post.html">Single Post</a>
                  </li>
              </ul>
              <p>We create awesome templates for you.</p>
          </div>
        </div>
      </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url() ?>desain/landing/foto_kegiatan/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="<?php echo base_url() ?>desain/landing/foto_kegiatan/js/vendor/bootstrap.min.js"></script>

    <script src="<?php echo base_url() ?>desain/landing/foto_kegiatan/js/plugins.js"></script>
    <script src="<?php echo base_url() ?>desain/landing/foto_kegiatan/js/main.js"></script>


</body>
</html>
