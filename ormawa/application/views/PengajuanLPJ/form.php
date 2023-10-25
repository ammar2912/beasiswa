<div class="row p-t-20">
  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Pilih Proker</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="hidden" name="id_ormawa" class="form-control" value="<?=$this->session->userdata('id');?>" required>
        <select name="id_proker" class="form-control select2">
          <option value="">Pilih Proker</option>
          <?php foreach ($proker as $value) {
          ?>
          <option value="<?=$value->id;?>"><?=$value->nama_proker?></option>
          <?php
          }?>
        </select>
      </div>
    </div>
  </div>
<div class="col-md-12 col-xl-6">
  <div class="form-group animated flipIn">
    <label for="exampleInputuname">Lampiran LPJ</label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
      </div>
      <input type="file" name="lampiran" class="form-control" value="" required>
    </div>
  </div>
</div>

</div>
