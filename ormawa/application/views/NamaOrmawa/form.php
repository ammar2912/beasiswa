<div class="row p-t-20">
  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Kode Ormawa</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="kode_ormawa" class="form-control" value="<?php if(!empty(@$namaormawa)){ echo @$namaormawa['kode_ormawa']; }else{ echo mt_rand(); }?>"  required>
      </div>
    </div>
  </div>
  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Jenis Ormawa</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <select name="jenis_ormawa" id="" class="form-control select2 col-md-12" required>
          <?php foreach ($jenisormawa as $value) {
            ?>
            <option value="<?=$value->id;?>" <?php if($value->id == @$namaormawa['jenis_ormawa']){echo 'selected'; } ?> ><?=$value->jenis;?></option>
            <?php
          }?>
        </select>
      </div>
    </div>
  </div>
  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Nama Ormawa</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="nama_ormawa" class="form-control" value="<?=@$namaormawa['nama_ormawa']?>" required>
      </div>
    </div>
  </div>


</div>
