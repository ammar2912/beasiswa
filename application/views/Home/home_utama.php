<!-- ============================================================== -->
<!-- Info box -->
<!-- ============================================================== -->
<!--Grid column-->
<style media="screen">
  .icon{
    margin-top: -50px;
    margin-left: -25px;
  }
  .btn-icon{
    width: 70px !important;
    height: 70px !important;
  }
  .ic{
    font-size: 2rem !important;
    margin-top: 10px;
  }
</style>
<br>
<div class="row">

  <!--Grid column-->
  <div class="col-lg-4 col-xlg-3 col-md-5 text-center">
          <div class="user-bg"> <img width="100%" src="<?php echo base_url() ?>desain/logo_polije.png"> </div>
          <h3>KEMAHASISWAAN POLIJE</h3>
  </div>
  <div class="col-xl-8 col-md-6 mb-4 row">

    <!--Card-->
    <div class="card purple-gradient z-depth-2 col-md-5" style="margin:16px;">
      <div class="row card-body">
        <div class="col-md-3 col-3 text-left icon">
          <a type="button" href="" class="btn-floating btn-icon purple accent-2 ml-4"><i class="far fa-images ic"></i></a>
        </div>
        <div class="col-12 text-center">
          <h4 class="white-text font-weight-bold">Jumlah Kegiatan:</h4>
          <?php
          $this->db->where("LEFT(tanggal,4) = ",date("Y"));
          $kegiatan = $this->db->get("gallery");
           ?>
          <h2 class="white-text font-weight-bold"><?php echo $kegiatan->num_rows() ?></h2>
        </div>
      </div>
    </div>
    <div class="card blue-gradient z-depth-2 col-md-5" style="margin:16px;">
      <div class="row card-body">
        <div class="col-md-3 col-3 text-left icon">
          <a type="button" href="" class="btn-floating btn-icon blue accent-2 ml-4"><i class="fas fa-info ic" aria-hidden="true"></i></a>
        </div>
        <div class="col-12 text-center">
          <h4 class="white-text font-weight-bold">Jumlah Pengumuman:</h4>
          <?php
          $this->db->where("LEFT(tanggal,4) = ",date("Y"));
          $pengumuman = $this->db->get("pengumuman");
           ?>
          <h2 class="white-text font-weight-bold"><?php echo $pengumuman->num_rows() ?></h2>
        </div>
      </div>
    </div>
    <div class="card peach-gradient z-depth-2 col-md-5" style="margin:16px;">
      <div class="row card-body">
        <div class="col-md-3 col-3 text-left icon">
          <a type="button" href="" class="btn-floating btn-icon orange accent-2 ml-4"><i class="fas fa-trophy ic"></i></a>
        </div>
        <div class="col-12 text-center">
          <h4 class="white-text font-weight-bold">Jumlah Prestasi:</h4>
          <?php
          $this->db->where("LEFT(tanggal_lomba,4) = ",date("Y"));
          $prestasi = $this->db->get("prestasi");
           ?>
          <h2 class="white-text font-weight-bold"><?php echo $prestasi->num_rows() ?></h2>
        </div>
      </div>
    </div>
    <div class="card aqua-gradient z-depth-2 col-md-5" style="margin:16px;">
      <div class="row card-body">
        <div class="col-md-3 col-3 text-left icon">
          <a type="button" href="" class="btn-floating btn-icon green accent-2 ml-4"><i class="fas fa-user-graduate ic"></i></a>
        </div>
        <div class="col-12 text-center">
          <h4 class="white-text font-weight-bold">Jumlah Beasiswa:</h4>
          <?php
          $this->db->where("LEFT(tgl_pendaftaran,4) = ",date("Y"));
          $beasiswa = $this->db->get("beasiswa");
           ?>
          <h2 class="white-text font-weight-bold"><?php echo $beasiswa->num_rows() ?></h2>
        </div>
      </div>
    </div>

    <!--/.Card-->
  </div>

</div>

  <!--/.Card-->
