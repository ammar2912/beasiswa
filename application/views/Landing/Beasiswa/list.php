<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("Landing/css") ?>
<link href="<?php echo base_url() ?>desain/dist/css/style.min.css" rel="stylesheet">

<link href="<?php echo base_url() ?>desain/landing/berita/css/media_query.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>desain/landing/berita/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
  integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link href="<?php echo base_url() ?>desain/landing/berita/css/animate.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
<link href="<?php echo base_url() ?>desain/landing/berita/css/owl.carousel.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>desain/landing/berita/css/owl.theme.default.css" rel="stylesheet" type="text/css" />

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
  integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
  integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
<link(rel="stylesheet", href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
  integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" , crossorigin="anonymous" )>
  <link(rel="stylesheet", href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
    integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" , crossorigin="anonymous" )>
    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url() ?>desain/landing/berita/css/style_1.css" rel="stylesheet" type="text/css" />
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
      <!-- ** Preloader End ** -->


      <!-- ** Header Area Start ** -->
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

            <form class="form-inline my-2 my-lg-0 w-100 d-flex flex-column align-items-end">
              <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4 d-flex justify-content-between w-100">BEASISWA
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              </div>
            </form>

            <div class="row">
              <?php foreach ($all_data as $data): ?>
                <div class="col-sm-6">
                  <div class="card" style="box-shadow: 0 4px 8px rgba(0.1, 0.1, 0.1, 0.1); border-radius: 8px;">
                    <div class="card-body">
                      <h5 class="card-title d-flex flex-column align-items-center text-center" style="color: #0088C7;">
                        <?= $data->namabeasiswa ?></h5>
                      <p class="card-text"><?= $data->deskripsi ?></p>
                      <p class="card-text">Penyelenggara : <?= $data->penyelenggara ?></p>
                      <p class="card-text">Lama Beasiswa : <?= $data->lamabeasiswa ?> </p>
                      <p class="card-text">Tanggal Pendaftaran : <?= $data->tanggalpendaftaran ?></p>
                      <p class="card-text">Tanggal Penutupan : <?= $data->tanggalpenutupan ?></p>
                      <div class="card-body d-flex flex-column align-items-center text-center">
                        <a href="beasiswa/detailbeasiswa" class="btn btn-primary ">DETAIL</a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach ?>
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