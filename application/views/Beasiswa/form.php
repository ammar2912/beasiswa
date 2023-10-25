
<div class="row">
  <div class="col-md-6">
      <div class="form-group">
          <label>Nama Beasiswa :</label>
          <input type="text" name="nama_beasiswa" id="nama_beasiswa" class="form-control" required value="<?php echo @$data["nama_beasiswa"] ?>">
      </div>
  </div>
  <div class="col-md-6">
      <div class="form-group">
          <label>Penyelenggara :</label>
          <input type="text" name="penyelenggara" id="penyelenggara" class="form-control" required value="<?php echo @$data["penyelenggara"] ?>">
      </div>
  </div>
  <div class="col-md-12">
      <div class="form-group">
          <label>Deskripsi :</label>
          <textarea name="deskripsi" id="ckeditor" rows="8" cols="80" required><?php echo @$data["deskripsi"] ?></textarea>
      </div>
  </div>


  <div class="col-md-6">
      <div class="form-group">
          <label>Tanggal Pendaftaran :</label>
          <input type="date" name="tgl_pendaftaran" id="tgl_pendaftaran" class="form-control" required value="<?php echo @$data["tgl_pendaftaran"] ?>">
      </div>
  </div>
  <div class="col-md-6">
      <div class="form-group">
          <label>Tanggal Penutupan :</label>
          <input type="date" name="tgl_penutupan" id="tgl_penutupan" class="form-control" required value="<?php echo @$data["tgl_penutupan"] ?>">
      </div>
  </div>
  <div class="col-md-6">
      <div class="form-group">
          <label>Berkas :</label>
          <input type="file" id="berkas" class="dropify" name="berkas" 
            <?php if (@$data["berkas"] != "" || @$data["berkas"] != null): ?>
              data-default-file="<?php echo base_url().@$data["berkas"] ?>"
            <?php endif; ?>
          />
      </div>
  </div>
</div>
<div class="form-actions" >
    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Simpan</button>
    <button type="button" class="btn btn-light waves-effect btn-sm kembali" onclick="window.history.go(-1); return false;" >Kembali</button>
</div>
