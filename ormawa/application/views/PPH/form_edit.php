<div class="row p-t-20">

  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">NIK</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="nik" id="nik" class="form-control" placeholder="NIK" value="<?php echo @$pph['nik']?>"  required>
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">NPWP</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="npwp" id="npwp" class="form-control" placeholder="NPWP" value="<?php echo @$pph['npwp']?>" required>
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Email</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo @$pph['email']?>">
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Telepon</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Telepon" value="<?php echo @$pph['telepon']; ?>" required>
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-8">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">File Tagihan (*file yang di upload akan menimpa file lama/ *lewati jika tidak ingin diganti)</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="file" name="file" id="file" class="form-control" placeholder="file">
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4"></div>
</div>
