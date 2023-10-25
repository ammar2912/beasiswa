<?php
  $pendaftar = $this->ModelPendaftaran->data_pendaftar($_SESSION['id_login'])->row_array();
  $Mp = $this->ModelPendaftaran->data_peserta($_SESSION['id_login']);
  $peserta = '';
  if ($Mp->num_rows() > 0) {
    $peserta = $Mp->row_array();
  }
 ?>
 <style media="screen">
   .foto{
     width: 250px;
    height: 250px;
    border-radius: 150px;
   }
   .bg{
     background-image: url('<?php echo base_url('desain/assets/home_pendaftar.jpg') ?>');
     background-size: cover;
   }
   table td{
    font-size: 18px;
    font-weight: 200 !important;
   }
   table th{
    font-size: 18px;
    font-weight: 500 !important;
   }
 </style>
<div class="row">
  <div class="col-12">
    <div class="card card-cascade narrower z-depth-1 bg">
      <div class="view view-cascade gradient-card-header aqua-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <div>
        </div>
        <h3 class="white-text mx-3"><i class="fas fa-user-alt"></i> PROFIL PESERTA </h3>
        <div>
        </div>
      </div>
          <div class="card-body row">
            <div class="col-md-3 text-center">
              <?php if ($Mp->num_rows() > 0): ?>
                  <img src="<?php echo base_url("desain/dokumen_pendaftaran/".$peserta['foto_peserta']) ?>" class="foto">
                <?php else: ?>
                  <img src="<?php echo base_url("desain/user.png") ?>" class="foto">
              <?php endif; ?>
            </div>
            <div class="col-md-9 row">
              <div class="col-md-10 col-sm-12">
                <table>
                  <tr><h3 style=" text-transform:capitalize;"> <?php echo @$pendaftar['nama_pendaftaran'] ?></h3></td><th></th>
                  <tr><td>No.Pendaftaran &nbsp;&nbsp;</td><th>: <?php echo @$peserta['no_pendaftaran'] ?></th>
                  <tr><td>Jalur Pendaftaran</td><th>: <?php echo @$peserta['jalur_pendaftaran'] ?></th>
                  <tr><td>Tempat Lahir</td><th>: <?php echo @$peserta['tempat_lahir'] ?></th>
                  <tr><td>Tanggal Lahir</td><th>: <?php echo date("d-M-Y", strtotime(@$pendaftar['tgl_lahir'])) ?></th>

                </table>
              </div>
            </div>
          </div>
      </div>
  </div>

  <div class="col-6">
    <div class="card card-cascade narrower z-depth-1">
      <div class="view view-cascade gradient-card-header aqua-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <h3 class="white-text mx-3"><i class="far fa-address-card"></i> Data Peserta </h3>
        <div>
        </div>
      </div>
      <br>
          <h4 class="grey-text mx-3"><i class="fas fa-graduation-cap"></i> Pendidikan</h4>
          <div>
          </div>
          <div class="card-body row">
            <div class="col-md-12 row">
              <div class="col-md-10 col-sm-12">
                <table>
                  <tr><td>Pendidikan Terakhir</td><th>: <?php echo @$peserta['jenis_pendidikan'] ?></th></tr>
                  <tr><td>Asal Sekolah</td><th>: <?php echo @$peserta['asal_sekolah']?></th>
                  <tr><td>Tahun Lulus</td><th>: <?php echo @$pendaftar['tahun'] ?></th>
                </table>
              </div>
            </div>
          </div>
          <br>
              <h4 class="grey-text mx-3"><i class="fab fa-telegram-plane"></i> Kontak</h4>
              <div>
              </div>
          <div class="card-body row">
            <div class="col-md-12 row">
              <div class="col-md-10 col-sm-12">
                <table>
                  <tr><td>Telepon</td><th>: <?php echo @$peserta['nohp'] ?></th></tr>
                  <tr><td>E-mail</td><th>: <?php echo @$pendaftar['email'] ?></th>
                </table>
              </div>
            </div>
          </div>

          <br>
              <h4 class="grey-text mx-3"><i class="fas fa-map-marker-alt"></i> Alamat</h4>
              <div>
              </div>
          <div class="card-body row">
            <div class="col-md-12 row">
              <div class="col-md-10 col-sm-12">
                <table>
                  <tr><td>Alamat</td><th>: <?php echo @$peserta['alamat'] ?></th></tr>
                  <tr><td>Provinsi</td><th>: <?php echo @$this->ModelAlamat->data_provinsi(@$peserta['provinsi']) ?></th>
                  <tr><td>Kabupaten</td><th>: <?php echo @$this->ModelAlamat->data_kabupaten(@$peserta['kabupaten']) ?></th>
                  <tr><td>Kode Pos</td><th>: <?php echo @$peserta['kode_pos'] ?></th>
                </table>
              </div>
            </div>
          </div>
      </div>
  </div>

  <div class="col-6">
    <div class="card card-cascade narrower z-depth-1">
      <div class="view view-cascade gradient-card-header aqua-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <div>
        </div>
        <h3 class="white-text mx-3"> <i class="fas fa-bullhorn"></i> INFORMASI <i class="fas fa-bullhorn"></i></h3>
        <div>
        </div>
      </div>
          <div class="card-body row">
            <div class="col-md-12">
            <marquee><h3>Informasi Tentantang Calon Peserta Didik Baru ..................Informasi Tentantang Calon Peserta Didik Baru </h3></marquee>
            <?php if ($Mp->num_rows() <= 0): ?>
              <h4><a href="<?php echo base_url("Pendaftaran/biodata_peserta/".$_SESSION["id_login"])?>"><?php echo $this->libcore->AlertRounded_success("Mohon Melengkapi Biodata Anda Dan Persyaratannya! <u>.Klik Disini</u>") ?></a></h4>
            <?php elseif(@$peserta['validasi'] == '2'): ?>
              <h5><a href="<?php echo base_url("Pendaftaran/biodata_peserta/".$_SESSION["id_login"])?>"><?php echo $this->libcore->AlertRounded_warning(@$peserta['keterangan']."<br> Mohon Untuk Membenahi Data Anda <u>.Klik Disini</u>") ?></a></h5>
            <?php endif; ?>
            <br>
            <?php if (@$peserta['validasi'] == 1): ?>
              <h4><?php echo $this->libcore->AlertRounded_success("Formulir dan Berkas Anda Sudah Benar dan Tervalidasi") ?></a></h4>
              <?php if (@$peserta['status_penerimaan'] == 0): ?>
                <h4><?php echo $this->libcore->AlertRounded_info("Mohon Tunggu Pengumuman Penerimaan Peserta Didik Baru") ?></a></h4>
              <?php elseif(@$peserta['status_penerimaan'] == '1'): ?>
                <h4><?php echo $this->libcore->AlertRounded_success("Selamat Anda Diterima Sebagai Peserta Didik Baru di AKBID JEMBER") ?></a></h4>
              <?php elseif(@$peserta['status_penerimaan'] == '2'): ?>
                <h4><?php echo $this->libcore->AlertRounded_warning("Mohon Maaf Anda Tidak Diterima Sebagai Peserta Didik Baru di AKBID JEMBER") ?></a></h4>
              <?php endif; ?>
            <?php endif; ?>
            </div>
          </div>
      </div>
  </div>




</div>
