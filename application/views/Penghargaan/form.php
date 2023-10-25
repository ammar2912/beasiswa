
<div class="row">
  <div class="col-md-6">
      <div class="form-group">
          <label>Nama :</label>
          <input type="text" name="nama" id="nama" class="form-control" value="<?php echo @$data["nama"] ?>">
      </div>
      <div class="form-group">
          <label>Ciptaan :</label>
          <input type="text" name="ciptaan" id="ciptaan" class="form-control" value="<?php echo @$data["ciptaan"] ?>">
      </div>
      <div class="form-group">
          <label>Jenis Penghargaan :</label>
          <input type="text" name="jenis" id="jenis" class="form-control" value="<?php echo @$data["jenis"] ?>">
      </div>
      <div class="form-group">
          <label>Bulan :</label>
          <input type="text" name="bula" id="jenis" class="form-control" value="<?php echo @$data["jenis"] ?>">
      </div>
      <div class="form-group">
          <label>Tahun :</label>
          <input type="text" name="bula" id="jenis" class="form-control" value="<?php echo @$data["jenis"] ?>">
      </div>
  </div>
  <div class="col-md-6">
      <div class="form-group">
          <label>File :</label>
          <input type="file" id="file" class="dropify" name="file"
            <?php if (@$data["file"] != "" || @$data["file"] != null): ?>
              data-default-file="<?php echo base_url().@$data["file"] ?>"
            <?php endif; ?>
          />
      </div>
  </div>
</div>
<div class="form-actions" >
    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Simpan</button>
    <button type="button" class="btn btn-light waves-effect btn-sm kembali" data-dismiss="modal">Kembali</button>
</div>
