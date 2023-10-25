<div class="row p-t-20">
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Pilih Ormawa</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <select name="id_ormawa" id="" class="form-control select2 col-md-12" required>
          <?php if (empty(@$ormawa['id_ormawa'])){ ?>
          <option value=""> Pilih Ormawa</option>
          <?php } ?>
          <?php foreach ($getormawa as $value) {
          ?>
          <option value="<?=$value->id;?>" <?php if($value->id == @$ormawa['id_ormawa']){ echo "selected"; } ?> ><?=$value->nama_ormawa;?></option>
          <?php
          }?>
        </select>
      </div>
    </div>
  </div>
  <div class="col-md-12 col-xl-4">

    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Anggaran Ormawa</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="anggaran_awal" class="form-control" value="<?=@$ormawa['anggaran_awal']?>" placeholder="Anggaran Ormawa">
        <input type="hidden" name="anggaran_terpakai" class="form-control" value="<?=@$ormawa['anggaran_terpakai']?>">
      </div>
    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Periode Anggaran</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="periode" class="form-control"
        <?php if(empty(@$ormawa['periode'])){ ?> value="<?=date('Y');?>" <?php }else{?> value="<?=date('Y');?>" <?php } ?>
        >
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
