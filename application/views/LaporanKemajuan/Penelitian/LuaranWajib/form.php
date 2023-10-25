<div class="row">
  <div class="col-md-6">
        <div class="form-group" style="margin-bottom: 0px;margin-top: 35px;">
            <label class="control-label">Status Dokumen </label>
            <select name="hari" id="hari" class="mdb-select colorful-select dropdown-info sm-form">
              <option value="Senin" >Tersedia</option>
              <option value="Senin" >Tidak Tersedia</option>

            </select>
          </div>
        </div>
  <div class="col-md-6">
  <label class="m-t-40">Nama Produk</label>
      <div class="input-group clockpicker " data-placement="bottom" data-align="top" data-autoclose="true">
      <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
      </div>
      <input type="text" name="tanggal" id="tanggal" value="<?php echo @$musdes['tanggal']; ?>" class="form-control">
      </div>
  </div>
  <div class="col-md-6">
  <label class="m-t-40">Tgl.Pengujian Produk</label>
      <div class="input-group clockpicker " data-placement="bottom" data-align="top" data-autoclose="true">
      <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
      </div>
      <input type="date" name="tanggal" id="tanggal" value="<?php echo @$musdes['tanggal']; ?>" class="form-control">
      </div>
  </div>
  <div class="col-md-6">
  <label class="m-t-40">Link Video Dokumentasi Produk</label>
      <div class="input-group clockpicker " data-placement="bottom" data-align="top" data-autoclose="true">
      <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-video"></i></span>
      </div>
      <input type="text" name="tanggal" id="tanggal" value="<?php echo @$musdes['tanggal']; ?>" class="form-control">
      </div>
  </div>

  <br><br>
  <h4 class="card-title">Dokumen Hasil Uji Coba Produk</h4>
  <h6 class="card-subtitle">Ukuran File Maksimal 2MB dengan Format PDF</h6>

  <div class="row">
  <div class="col-lg-6 col-md-6" style="top: 25px;">
    <div class="card">
        <div class="card-body">
          <h6 class="card-title">Unggah Dokumen Deskripsi dan Spesifikasi Produk</h6>
              <input type="file" id="daftar_hadir" class="dropify" name="daftar_hadir" data-max-file-size="2M" accept="application/pdf"/>
              <input type="hidden" name="cekfotoktp" value="">
        </div>
        </div>
  </div>
  <div class="col-lg-6 col-md-6" style="top: 25px;">
    <div class="card">
        <div class="card-body">
          <h6 class="card-title">Unggah Dokumen Hasil Uji COba produk</h6>
              <input type="file" id="daftar_hadir" class="dropify" name="daftar_hadir" data-max-file-size="2M" accept="application/pdf"/>
              <input type="hidden" name="cekfotoktp" value="">
        </div>
        </div>
  </div>
  <div class="col-lg-6 col-md-6" style="top: 25px;">
    <div class="card">
        <div class="card-body">
          <h6 class="card-title">Unggah Dokumentasi Foto Hasil Pengujian Produk</h6>
              <input type="file" id="daftar_hadir" class="dropify" name="daftar_hadir" data-max-file-size="2M" accept="application/pdf"/>
              <input type="hidden" name="cekfotoktp" value="">
        </div>
        </div>
  </div>
</div>
</div>
