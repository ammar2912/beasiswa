<h3 class="box-title"><b>Carousel</b></h3>
<br>
<h4 class="box-title">Carousel</h4>
<br>
<div class="row">
  <div class="col-md-12">
      <div class="form-group">
          <label>Judul :</label>
          <input type="text" name="judul" id="judul" class="form-control" required value="<?php echo @$carousel["judul"] ?>">
      </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
      <div class="form-group">
          <label>Foto :</label>
          <input type="file" id="gambar" class="dropify" name="gambar"/>
      </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
      <div class="form-group">
          <label>Isi :</label>
          <input type="text" name="isi" id="isi" class="form-control" required value="<?php echo @$carousel["isi"] ?>">
      </div>
  </div>
</div>
<div class="form-actions" >
    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Simpan</button>
      <button type="button" class="btn btn-light waves-effect btn-sm kembali" onclick="window.history.go(-1); return false;" >Kembali</button>
</div>
