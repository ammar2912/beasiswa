
<div class="row">
  <div class="col-md-6">
      <div class="form-group">
          <label>Judul :</label>
          <input type="text" name="judul" id="judul" class="form-control" value="<?php echo @$fotokegiatan["judul"] ?>">
      </div>
  </div>
  <div class="col-md-6">
      <div class="form-group">
          <label>Foto :</label>
          <input type="file" id="file" class="dropify" name="file"/>
      </div>
  </div>
  <div class="col-md-12">
      <div class="form-group">
          <label>Keterangan :</label>
          <textarea name="keterangan" id="ckeditor" rows="8" cols="80"><?php echo @$data["keterangan"] ?></textarea>
      </div>
  </div>
</div>
<div class="form-actions" >
    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Simpan</button>
    <button type="button" class="btn btn-light waves-effect btn-sm kembali" data-dismiss="modal">Kembali</button>
</div>
