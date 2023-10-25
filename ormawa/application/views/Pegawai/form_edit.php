<div class="row p-t-20">


  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Nama Pegawai</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="nama" class="form-control" value="<?php echo @$pegawai['nama']?>">
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
        <input type="text" name="nip" class="form-control" value="<?php echo @$pegawai['nip']?>" required>
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
          <option value="1" <?php if(@$pegawai['jabatan'] == '1'){echo "selected";} ?> >Super Admin</option>
          <option value="2" <?php if(@$pegawai['jabatan'] == '2'){echo "selected";} ?> >Kemahasiswaan</option>
          <option value="3" <?php if(@$pegawai['jabatan'] == '3'){echo "selected";} ?> >Pimpinan</option>
        </select>
      </div>
    </div>
  </div>

</div>
