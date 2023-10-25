<div class="row p-t-20">
  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Jurusan</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <select name="jurusan" id="" class="form-control select2 col-md-12" required>
          <?php if (empty(@$prodi['id_jurusan'])){ ?>
          <option value=""> Pilih Jurusan</option>
          <?php } ?>
          <?php foreach ($jurusan as $value): ?>
            <option value="<?=$value->id?>" <?php if($value->id == @$prodi['id_jurusan']){ echo "selected"; } ?> > <?=$value->nama_jurusan?> </option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
  </div>
  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Prodi</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="nama_prodi" class="form-control" value="<?php echo @$prodi['nama_prodi']?>" required>
      </div>
    </div>
  </div>
</div>
