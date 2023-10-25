<div class="row p-t-20">

  <div class="col-md-6 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Password Lama</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="id_user" hidden="1" class="form-control" value="<?=$this->session->userdata('iduser');?>" required>
        <input type="password" name="passwordlama" class="form-control" value="" required>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Password Baru</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="password" name="passwordbaru" class="form-control" value="" required>
      </div>
    </div>
  </div>
</div>
