
<div class="row">
  <div class="col-md-6">
      <div class="form-group">
          <label>Nama Lomba :</label>
          <input type="text" name="nama_lomba" id="nama_lomba" class="form-control" required value="<?php echo @$data["nama_lomba"] ?>">
      </div>
  </div>
  <div class="col-md-6">
      <div class="form-group">
          <label>Tingkat :</label>
          <input type="text" name="tingkat" id="tingkat" class="form-control" required value="<?php echo @$data["tingkat"] ?>">
      </div>
  </div>
  <div class="col-md-6">
      <div class="form-group">
          <label>Prestasi :</label>
          <input type="text" name="prestasi" id="prestasi" class="form-control" required value="<?php echo @$data["prestasi"] ?>">
      </div>
  </div>
  <div class="col-md-6">
      <div class="form-group">
          <label>Penyelenggara :</label>
          <input type="text" name="penyelenggara" id="penyelenggara" class="form-control" required value="<?php echo @$data["penyelenggara"] ?>">
      </div>
  </div>
  <div class="col-md-6">
      <div class="form-group">
          <label>Tanggal Lomba :</label>
          <input type="text" name="tanggal_lomba" id="tanggal_lomba" class="form-control tanggal" value="<?php
            if ($this->uri->segment(2) == "edit") {
              echo date("d-m-Y", strtotime(@$data["tanggal_lomba"]));
            }else {
              echo date("d-m-Y");
            }
          ?>">
      </div>
  </div>
  <div class="col-md-6">
      <div class="form-group">
          <label>Nama Mahasiswa :</label>
          <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" class="form-control" required value="<?php echo @$data["nama_mahasiswa"] ?>">
      </div>
  </div>
  <div class="col-md-6">
      <div class="form-group">
          <label>Prodi :</label>
          <input type="text" name="prodi" id="prodi" class="form-control" required value="<?php echo @$data["prodi"] ?>">
      </div>
  </div>
  <!-- <div class="col-md-6">
      <div class="form-group">
          <label>Dokumen :</label>
          <input type="file" id="dokumen" class="dropify" name="dokumen"
            <?php if (@$data["dokumen"] != "" || @$data["dokumen"] != null): ?>
              data-default-file="<?php echo base_url().@$data["dokumen"] ?>"
            <?php endif; ?>
          />
      </div>
  </div> -->
  <!-- <div class="col-md-12">
      <div class="form-group">
          <label>Deskripsi :</label>
          <textarea name="deskripsi" id="ckeditor" rows="8" cols="80"><?php echo @$data["deskripsi"] ?></textarea>
      </div>
  </div> -->
</div>
<div class="form-actions" >
    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Simpan</button>
    <button type="button" class="btn btn-light waves-effect btn-sm kembali" onclick="window.history.go(-1); return false;" >Kembali</button>
</div>
