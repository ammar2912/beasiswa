<style>
.form-group{
  margin-bottom: 5px;
}
</style>
<div class="row form-group">
      <div class="col col-md-3">
        <label for="text-input" class=" form-control-label">Nama Lengkap</label>
      </div>
      <div class="col-12 col-md-9">
          <input type="text" name="nama" id="nama" class="form-control" placeholder="nama" value="<?php echo @$pegawai['nama']; ?>" required>

      </div>
</div>

<div class="row form-group">
      <div class="col col-md-3">
        <label for="jk" class=" form-control-label">Jenis Kelamin</label>
      </div>
      <div class="col-12 col-md-9">
        <select name="jk" id="jk" class="mdb-select colorful-select dropdown-info sm-form" required>
          <option value="Laki - Laki" <?php if (@$pegawai['jk'] == "Laki - Laki") {echo "selected";} ?> >Laki - Laki</option>
          <option value="Perempuan" <?php if (@$pegawai['jk'] == "Perempuan") {echo "selected";} ?>>Perempuan</option>
        </select>
      </div>
</div>
<!-- <div class="row form-group">
      <div class="col col-md-3">
        <label for="status_karyawan" class=" form-control-label">Agama</label>
      </div>
      <div class="col-12 col-md-9">
        <select name="agama" class="mdb-select colorful-select dropdown-info sm-form" required>
          <option value="Islam" <?php if (@$pegawai['agama'] == "Islam"): ?>selected<?php endif; ?>>Islam</option>
          <option value="Khatolik" <?php if (@$pegawai['agama'] == "Khatolik"): ?>selected<?php endif; ?>>Khatolik</option>
          <option value="Kristen" <?php if (@$pegawai['agama'] == "Kristen"): ?>selected<?php endif; ?>>Kristen</option>
          <option value="Buddha" <?php if (@$pegawai['agama'] == "Buddha"): ?>selected<?php endif; ?>>Budhha</option>
          <option value="Hindu" <?php if (@$pegawai['agama'] == "Hindu"): ?>selected<?php endif; ?>>Hindu</option>
          <option value="Khonghucu" <?php if (@$pegawai['agama'] == "Khonghucu"): ?>selected<?php endif; ?>>Khonghucu</option>
        </select>
      </div>
</div> -->
<div class="row form-group">
      <div class="col col-md-3">
        <label for="jabatan" class=" form-control-label">Unsur</label>
      </div>
      <div class="col-12 col-md-9">
        <select name="unsur" class="mdb-select colorful-select dropdown-info sm-form" required>
          <option value="" disabled selected>-- Pilih Unsur --</option>
          <?php foreach ($jabatan as $value): ?>
            <option value="<?php echo $value->idjabatan?>" <?php if (@$pegawai['unsur'] == $value->idjabatan): ?>selected<?php endif; ?>><?php echo $value->namajabatan ?></option>
          <?php endforeach; ?>
        </select>
      </div>
</div>
<div class="row form-group">
      <div class="col col-md-3">
        <label for="tgl_lahir" class=" form-control-label">Tanggal Lahir</label>
      </div>
      <div class="col-12 col-md-9">
          <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" value = "<?php echo @$pegawai['tgl_lahir'];?>" required>
      </div>
</div>

<div class="row form-group">
  <div class="col-3">
    <label for="tgl_masuk" class="form-control-label">Tanggal Mulai Kerja</label>
  </div>
  <div class="col-12 col-md-9">
      <input type="date" name="tgl_mulai_kerja" id="tgl_mulai_kerja" class="form-control" placeholder="Tanggal Masuk" value="<?php echo @$pegawai['tgl_mulai_kerja'] ?>" required>
  </div>
</div>
<div class="row form-group">
      <div class="col col-md-3">
        <label for="jk" class=" form-control-label">Aparatur Aktif / Tidak Aktif</label>
      </div>
      <div class="col-12 col-md-9">
        <select name="aktif" id="akitf" class="mdb-select colorful-select dropdown-info sm-form" required>
          <option value="1" <?php if (@$pegawai['aktif'] == 1) {echo "selected";} ?> >Aktif</option>
          <option value="0" <?php if (@$pegawai['aktif'] == 0) {echo "selected";} ?>>Tidak Aktif</option>
        </select>
      </div>
</div>


<h3 class="box-title m-t-40">ALAMAT</h3><hr>

<div class="row form-group">
      <div class="col col-md-3">
        <label for="telepon" class=" form-control-label">Provinsi</label>
      </div>
      <div class="col-12 col-md-9">
        <select name="provinsi" class="mdb-select colorful-select dropdown-info sm-form required" required onchange="cariKabupaten_calon()" id="provinsi_calon">
          <option value="" disabled selected>Provinsi</option>
          <?php foreach ($provinsi as $value): ?>
            <option value="<?php echo $value->idprovinsi ?>" <?php if (@$peserta['provinsi']==$value->idprovinsi): ?>selected<?php endif; ?>><?php echo $value->provinsi ?></option>
          <?php endforeach; ?>
        </select>
      </div>
</div>
<div class="row form-group">
      <div class="col col-md-3">
        <label for="telepon" class=" form-control-label">Kabupaten</label>
      </div>
      <div class="col-12 col-md-9">
        <select name="kabupaten" class="mdb-select colorful-select dropdown-info sm-form required" required id="kabupaten_calon" onchange="get_kecamatan()">
          <option value="" disabled>Pilih Provinsi Dahulu</option>
          <?php if (@$peserta['kabupaten'] != null || @$peserta['kabupaten'] != ''): ?>
            <option value="<?php echo @$peserta['kabupaten'] ?>" selected><?php echo @$this->ModelAlamat->data_kabupaten(@$peserta['kabupaten']) ?></option>
          <?php endif; ?>
        </select>
      </div>
</div>
<div class="row form-group">
      <div class="col col-md-3">
        <label for="kecamatan_proker" class=" form-control-label">Kecamatan</label>
      </div>
      <div class="col-12 col-md-9">
        <select class="mdb-select colorful-select dropdown-info sm-form" name="kecamatan_proker" id="kecamatan_proker" onchange="get_desa()">
          <option value="" disabled selected>--- Kecamatan ---</option>
        </select>
      </div>
</div>
<div class="row form-group">
      <div class="col col-md-3">
        <label for="telepon" class=" form-control-label">Desa</label>
      </div>
      <div class="col-12 col-md-9">
        <select name="kode_desa" class="mdb-select colorful-select dropdown-info sm-form" id="desa_proker">
          <option value="" disabled selected>--- Desa ---</option>
        </select>
      </div>
      <div class="col-12 col-md-9" hidden>
        <select class="mdb-select colorful-select dropdown-info sm-form">
          <option value="" disabled selected>--- Desa ---</option>
        </select>
      </div>
</div>
<div class="row form-group">
      <div class="col col-md-3">
        <label for="alamat" class=" form-control-label">Alamat</label>
      </div>
      <div class="col-12 col-md-9">
          <textarea name="alamat" id="alamat" class="form-control" placeholder="alamat" rows="2" cols="8" required><?php echo @$pegawai['alamat'] ?></textarea>
      </div>
</div>
<div class="row form-group">
      <div class="col col-md-3">
        <label for="telepon" class=" form-control-label">Telepon</label>
      </div>
      <div class="col-12 col-md-9">
          <input type="text" name="telepon" id="telepon" class="form-control angkasaja" placeholder="telepon "value="<?php echo @$pegawai['telepon'] ?>" required>
      </div>
</div>



<script type="text/javascript">
  function cariKabupaten_calon() {
    var idprovinsi = $('#provinsi_calon').find(":selected").val();
    // alert(idprovinsi);
    $.ajax({
        url: "<?php echo base_url() ?>Alamat/getKabupaten/"+idprovinsi,
        type: "post",
        success: function (response) {
          // alert(response);
          $('#kabupaten_calon').html(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
  }
  function get_kecamatan() {
    var kecamatan = $("#kabupaten_calon").val();
    // alert(kecamatan);
      $.ajax({
         url: "<?php echo base_url() ?>Alamat/get_kecamatan/"+kecamatan,
         type: "post",
         data: {} ,
         success: function (response) {
           // alert(response);
           $("#kecamatan_proker").html(response);
           get_desa();
         },
         error: function(e) {
            alert("error");
         }
     });
  }
  function get_desa() {
    var kecamatan = $("#kecamatan_proker").val();
    // alert(kecamatan);
      $.ajax({
         url: "<?php echo base_url() ?>ProkerKabupaten/get_desa/"+kecamatan,
         type: "post",
         data: {} ,
         success: function (response) {
           // alert(response);
           $("#desa_proker").html(response);
         },
         error: function(e) {
            alert("error");
         }
     });
  }
</script>
