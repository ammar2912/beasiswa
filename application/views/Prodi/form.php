<div class="row form-group">
      <div class="col col-md-3">
        <label for="text-input" class=" form-control-label">Kode Jurusan</label>
      </div>
      <div class="col-12 col-md-9">
          <input type="text" name="kode" id="kode" class="form-control" placeholder="Kode Jurusan" value="<?php echo @$prodi['kode_prodi']; ?>" required>
      </div>
</div>
<div class="row form-group">
      <div class="col col-md-3">
        <label for="text-input" class=" form-control-label">Nama Jurusan</label>
      </div>
      <div class="col-12 col-md-9">
          <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Jurusan" value="<?php echo @$prodi['nama_prodi']; ?>" required>
      </div>
</div>
<div class="row form-group">
        <div class="col col-md-3">
          <label for="agama" class=" form-control-label">Nama Jurusan</label>
        </div>
        <div class="col-12 col-md-9">
              <select name="idjurusan" id="select" class="mdb-select colorful-select dropdown-info md-form" required>
                <option value="" >...Pilih Jurusan...</option>
                <?php foreach ($jurusan as $data): ?>
                  <option value="<?php echo $data->idjurusan; ?>" <?php if ($data->idjurusan == @$prodi['jurusan_idjurusan']): ?>
                    <?php echo 'selected'; ?>
                  <?php endif; ?>><?php echo $data->nama_jurusan?></option>
                <?php endforeach; ?>
              </select>
        </div>
</div>
