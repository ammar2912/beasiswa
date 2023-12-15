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
                        <?php if (isset($detail_beasiswa)): ?>
                                    <div class="card" style="box-shadow: 0 4px 8px rgba(0.1, 0.1, 0.1, 0.1); border-radius: 8px;">
                                        <div class="card-body">
                                        <h5 class="card-title d-flex flex-column align-items-center text-center" style="color: #0088C7;">
                                        <?= $detail_beasiswa->namabeasiswa ?></h5>
                                        <p class="card-text"><?= $detail_beasiswa->deskripsi ?></p>
                                        <p class="card-text">Penyelenggara : <?= $detail_beasiswa->penyelenggara ?></p>
                                        <p class="card-text">Lama Beasiswa : <?= $detail_beasiswa->lamabeasiswa ?> </p>
                                        <p class="card-text">Tanggal Pendaftaran : <?= $detail_beasiswa->tanggalpendaftaran ?></p>
                                        <p class="card-text">Tanggal Penutupan : <?= $detail_beasiswa->tanggalpenutupan ?></p>
                                        <p class="card-title">Persyaratan : </p>
                                            <?php
                                            $persyaratan = $detail_beasiswa->persyaratan;
                                            $persyaratan_per_baris = explode("\n", $persyaratan);
                                            foreach ($persyaratan_per_baris as $key => $persyaratan) {
                                                echo "<p class='persyaratan'><reguler></strong> $persyaratan</p>";
                                            }
                                            ?>
                            </div>
                            <div class="card-body d-flex flex-column align-items-center text-center">
                                <div class="card-body">
                                    <a href="<?=base_url('loginuser/')?>"class="btn"  style="border-radius: 3px; border-color: #0088C7; color: #0088C7;">DOWNLOAD FILE</a>
                                    <a href="<?=base_url('loginuser/')?>" class="btn btn-primary ">DAFTAR BEASISWA</a>
                                </div>
                            </div>
                        </div>
                        <?php else: ?>
                          <p>Beasiswa ini tidak memiliki detail beasiswa!</p>
                    <?php endif ?>
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