
<div class="row">
  <div class="col-md-6">
      <div class="form-group">
          <label>Nama Ormawa :</label>
          <input type="text" name="nama_ormawa" id="nama_ormawa" class="form-control" value="<?php echo @$data["nama_ormawa"] ?>" required>
      </div>
  </div>
  <div class="col-md-12">
      <div class="form-group">
          <label>Deskripsi :</label>
          <textarea name="deskripsi" id="ckeditor" rows="8" cols="80" required><?php echo @$data["deskripsi"] ?> </textarea>
      </div>
  </div>
</div>
<div class="form-actions" >
    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Simpan</button>
    <button type="button" class="btn btn-light waves-effect btn-sm kembali" onclick="window.history.go(-1); return false;" >Kembali</button>

</div>
