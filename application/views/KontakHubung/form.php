
<div class="row">
  <div class="col-md-6">
      <div class="form-group">
          <label>Nama Unit :</label>
          <input type="text" name="nama_unit" id="nama_unit" class="form-control" required value="<?php echo @$data["nama_unit"] ?>">
      </div>
  </div>
  <div class="col-md-6">
      <div class="form-group">
          <label>Alamat :</label>
          <input type="text" name="alamat" id="alamat" class="form-control" required value="<?php echo @$data["alamat"] ?>">
      </div>
  </div>
  <div class="col-md-6">
      <div class="form-group">
          <label>Telepon :</label>
          <input type="number" name="telepon" id="telpon" class="form-control" required value="<?php echo @$data["telepon"] ?>">
      </div>
  </div>
  <div class="col-md-6">
      <div class="form-group">
          <label>Email :</label>
          <input type="email" name="email" id="email" class="form-control" required value="<?php echo @$data["email"] ?>">
      </div>
  </div>

</div>
<div class="form-actions" >
    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Simpan</button>
    <button type="button" class="btn btn-light waves-effect btn-sm kembali" onclick="window.history.go(-1); return false;" >Kembali</button>

</div>
