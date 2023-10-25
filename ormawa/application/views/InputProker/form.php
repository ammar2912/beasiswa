<div class="row p-t-20">
  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Nama Proker</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="hidden" name="id_ormawa" class="form-control" value="<?=$this->session->userdata('id')?>" required>
        <input type="text" name="nama_proker" class="form-control" value="" required>
      </div>
    </div>
  </div>
<div class="col-md-12 col-xl-6">
  <div class="form-group animated flipIn">
    <label for="exampleInputuname">Penanggung Jawab</label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
      </div>
      <input type="text" name="jwb" class="form-control" value="" required>
      <!-- <input type="text" name="tanggung_jawab " class="form-control" value="" required> -->
    </div>
  </div>
</div>
<div class="col-md-12 col-xl-12">
  <div class="form-group animated flipIn">
    <label for="exampleInputuname">Uraian Proker</label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
      </div>
      <textarea class="form-control" style="height:300px" name="uraian" required></textarea>
    </div>
  </div>
</div>
<div class="col-md-12 col-xl-6">
  <div class="form-group animated flipIn">
    <label for="exampleInputuname">Periode</label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
      </div>
      <input type="text" name="periode" class="form-control" value="<?=date('Y')?>" readonly required>
    </div>
  </div>
</div>
<div class="col-md-12 col-xl-6">
  <div class="form-group animated flipIn">
    <label for="exampleInputuname">Lampiran Proker <b style="color:red"> * Hanya file pdf dan word</b></label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
      </div>
      <input type="file" name="lampiran" class="form-control" value="" required>
    </div>
  </div>
</div>

</div>
