<div class="row form-group">
      <div class="col col-md-3">
        <label for="text-input" class=" form-control-label">Judul</label>
      </div>
      <div class="col-12 col-md-9">
          <input type="text" name="judul" id="judul" class="form-control" placeholder="judul" value="<?php echo @$pengabdian['judul']; ?>" >
      </div>
</div>
<div class="row form-group">
      <div class="col col-md-3">
        <label for="text-input" class=" form-control-label">Program</label>
      </div>
      <div class="col-12 col-md-9">
          <input type="text" name="program" id="program" class="form-control" placeholder="program" value="<?php echo @$pengabdian['program']; ?>" >
      </div>
</div>
<div class="row form-group">
      <div class="col col-md-3">
        <label for="text-input" class=" form-control-label">Tahun Pelaksanaan </label>
      </div>
      <div class="col-12 col-md-9">
          <input type="text" name="tahun_pelaksanaan" id="tahun_pelaksanaan" class="form-control" placeholder="Kode Jurusan" value="<?php echo @$pengabdian['tahun_pelaksanaan']; ?>" >
      </div>
</div>
<div class="row form-group">
      <div class="col col-md-3">
        <label for="text-input" class=" form-control-label">Tahun Awal </label>
      </div>
      <div class="col-12 col-md-9">
          <input type="text" name="tahun_awal" id="tahun_awal" class="form-control" placeholder="Tahun Awal" value="<?php echo @$pengabdian['tahun_awal']; ?>" >
      </div>
</div>
<div class="row form-group">
      <div class="col col-md-3">
        <label for="text-input" class=" form-control-label">Tahun Sampai </label>
      </div>
      <div class="col-12 col-md-9">
          <input type="text" name="tahun_sampai" id="tahun_sampai" class="form-control" placeholder="Tahun Sampai" value="<?php echo @$pengabdian['tahun_sampai']; ?>" >
      </div>
</div>
<h4 class="card-title">Substansi Laporan</h4>
<h6 class="card-subtitle">Unggah Dokumen Substansi Laporan </h6>

<div class="col-lg-6 col-md-6" style="top: 5px;">
  <div class="card">
      <div class="card-body">
        <h4 class="card-title">Unggah Dokumen</h4>
            <input type="file" id="file" class="dropify" name="file" data-max-file-size="2M" accept="application/pdf"/>
      </div>
      </div>
</div>
