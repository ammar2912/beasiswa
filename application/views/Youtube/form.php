
<div class="row">
  <div class="col-md-12">
      <div class="form-group">
          <label>Judul :</label>
          <input type="text" name="judul" id="judul" class="form-control" value="<?php echo @$data["judul"] ?>">
      </div>
  </div>
  <div class="col-md-12">
      <div class="form-group">
          <label>Kode Youtube:</label>
          <input type="text" name="link" id="link" class="form-control" value="<?php echo @$data["link"] ?>">
      </div>
  </div>
</div>
<div class="form-actions" >
    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Simpan</button>
    <button type="button" class="btn btn-light waves-effect btn-sm kembali" data-dismiss="modal">Kembali</button>
</div>
