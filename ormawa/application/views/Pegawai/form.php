<div class="row p-t-20">
  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Nama Pegawai</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="nama" class="form-control" value="" required>
      </div>
    </div>
  </div>

  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">NIP</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="nip" class="form-control" value="" required>
      </div>
    </div>
  </div>

  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Jabatan / Level</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <select class="form form-control" name="jabatan">
          <option value="">Pilih Level / Jabatan </option>
          <option value="1">Super Admin</option>
          <option value="2">Kemahasiswaan</option>
          <option value="3">Pimpinan</option>
        </select>
      </div>
    </div>
  </div>
  <!-- <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Telepon</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="telepon" onkeypress="return hanyaAngka(event)" class="form-control" value="<?php echo @$pegawai['telp']?>" required>
      </div>
    </div>
  </div> -->


</div>

<script type="text/javascript">
function hanyaAngka(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode != 46 && charCode != 44 && (charCode < 48 || charCode > 57)))
  return false;
  return true;
}
</script>
