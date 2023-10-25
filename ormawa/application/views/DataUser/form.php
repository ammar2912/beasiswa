<div class="row p-t-20">

  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Nama User</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="nama" class="form-control" value="<?=@$datauser->nama;?>" required>
      </div>
    </div>
  </div>

  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Username</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="username" class="form-control" value="<?=@$datauser->username;?>" required>
      </div>
    </div>
  </div>

  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Jabatan / Hak Akses</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <select class="form form-control" name="jabatan" required>
          <option value="">Pilih Level / Jabatan </option>
          <option <?php if(@$datauser->jabatan == 2){ echo "selected"; }?> value="2">Kemahasiswaan</option>
          <option <?php if(@$datauser->jabatan == 3){ echo "selected"; }?> value="3">Pimpinan</option>
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
