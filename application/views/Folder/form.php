<div class="row form-group">
      <div class="col col-md-3">
        <label for="text-input" class=" form-control-label">Nama Folder</label>
      </div>
      <div class="col-12 col-md-9">
          <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Folder" value="<?php echo @$folder['nama_folder']; ?>" required>
      </div>
</div>
<div class="row form-group">
      <div class="col col-md-3">
        <label for="text-input" class=" form-control-label">ID Folder Google Drive</label>
      </div>
      <div class="col-12 col-md-9">
          <input type="text" name="idgd" id="idgd" class="form-control" placeholder="ID Folder" value="<?php echo @$folder['idfolder_gd']; ?>" required>
      </div>
</div>
<div class="row form-group">
        <div class="col col-md-3">
          <label for="agama" class=" form-control-label">Prodi</label>
        </div>
        <div class="col-12 col-md-9">
              <select name="idprodi" id="select" class="mdb-select colorful-select dropdown-info md-form" required>
                <option value="" >...Pilih Prodi...</option>
                <?php foreach ($prodi as $data): ?>
                  <option value="<?php echo $data->kode_prodi; ?>" <?php if ($data->kode_prodi == @$folder['prodi_kode_prodi']): ?>
                    <?php echo 'selected'; ?>
                  <?php endif; ?>><?php echo $data->nama_prodi;?></option>
                <?php endforeach; ?>
              </select>
        </div>
</div>
