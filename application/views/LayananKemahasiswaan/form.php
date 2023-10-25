
<div class="row">
  <div class="col-md-6">
      <div class="form-group">
          <label>Nama Layanan :</label>
          <input type="text" name="nama_layanan" id="nama_layanan" required class="form-control" value="<?php echo @$data["nama_layanan"] ?>">
      </div>
  </div>
  <div class="col-md-6">
      <div class="form-group">
          <label>Dokumen :</label>
          <input type="file" id="dokumen" class="dropify" name="dokumen"
            <?php if (@$data["dokumen"] != "" || @$data["dokumen"] != null): ?>
              data-default-file="<?php echo base_url().@$data["dokumen"] ?>"
            <?php endif; ?>
          />
      </div>
  </div>
  <div class="col-md-12">
      <div class="form-group">
          <label>Deskripsi :</label>
          <textarea name="deskripsi" id="ckeditor" rows="8" cols="80"><?php echo @$data["deskripsi"] ?></textarea>
      </div>
  </div>
</div>
<div class="form-actions" >
    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Simpan</button>
      <button type="button" class="btn btn-light waves-effect btn-sm kembali" onclick="window.history.go(-1); return false;" >Kembali</button>
</div>
