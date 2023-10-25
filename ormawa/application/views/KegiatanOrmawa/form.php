<div class="row p-t-20">
  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Ormawa</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="hidden" name="id" class="form-control" value="<?php echo @$jurusan['id']?>" required>
        <input type="text" name="kode_jur" class="form-control" value="<?php echo @$jurusan['kode_jur']?>" required>
      </div>
    </div>
  </div>
  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Nama Jurusan</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="nama_jurusan" class="form-control" value="<?php echo @$jurusan['nama_jurusan']?>" required>
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
