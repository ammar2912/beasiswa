<div class="row p-t-20">
  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Jurusan</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <select name="" id="" class="form-control select2 col-md-12" required>
            <option value="">Teknologi Informasi</option>
            <option value="">Manajemen Agribisnis</option>
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
        <input type="text" name="" class="form-control" value="<?php echo @$mahasiswa['nama_mahasiswa']?>" required>
      </div>
    </div>
  </div>

  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Status</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <select name="" id="" class="form-control select2 col-md-12" required>
            <option value="">Aktif</option>
            <option value="">Non Aktif</option>
        </select>
      </div>
    </div>
  </div>
</div>

<!-- <script type="text/javascript">
  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode != 46 && charCode != 44 && (charCode < 48 || charCode > 57)))
    return false;
    return true;
  }
</script> -->
