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
                <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">DETAIL BEASISWA </div>
                    </div>
                    <div class="row">
                        <div class="card" style="box-shadow: 0 4px 8px rgba(0.1, 0.1, 0.1, 0.1); border-radius: 8px;">
                            <div class="card-body">
                                <h5 class="card-title d-flex flex-column align-items-center text-center"
                                    style="color: #0088C7;" s>BEASISWA PEMKAB 2021</h5>
                                <p class="card-text">Beasiswa Pendidikan Tinggi Pemerintah Daerah Kebupaten Jember
                                    merupakan salah satu program unggulan Pemerintah
                                    Kabupaten Jember yang tercantum dalam DPA-APBD Tahun 2021.
                                    Beasiswa Pendidikan Tinggi Pemerintah Daerah Kebupaten Jember merupakan salah satu
                                    program unggulan Pemerintah Kabupaten
                                    Jember yang tercantum dalam DPA-APBD Tahun 2021.</p>
                                <p class="card-text">Penyelenggara : PEMKAB JEMBER 2021</p>
                                <p class="card-text">Lama Beasiswa : Selama Jenjang Studi Mahasiswa </p>
                                <p class="card-text">Tanggal Pendaftaran : 27 Oktober 2023</p>
                                <p class="card-text">Tanggal Penutupan : 27 Oktober 2023</p>
                                <p class="card-text"> </p>
                                <p class="card-title">Persyaratan : </p>
                                <ul class="card-text">
                                    <p>1. Mahasiswa aktif Politeknik Negeri Jember</p>
                                    <p>2. Tidak sedang mengikuti beasiswa lain</p>
                                    <p>3. Memiliki CV</p>
                                    <p>4. Transkip Nilai</p>
                                    <p>5. KK</p>
                                    <p>6. KTP</p>
                                    <p>7. KTM</p>
                                    <p>8. Surat Rekomendasi dari Pimpinan</p>
                                    <p>9. SK Kurikulum Pribadi</p>
                                    <p>10. Sertifikat Organisasi</p>
                                </ul>
                            </div>
                            <div class="card-body d-flex flex-column align-items-center text-center">
                                <div class="card-body">
                                    <a href="loginbeasiswa" class="btn btn-secondary">DOWNLOAD FILE</a>
                                    <a href="loginbeasiswa" class="btn btn-primary ">DAFTAR BEASISWA</a>
                                </div>
                            </div>
                        </div>
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