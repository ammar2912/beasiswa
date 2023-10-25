<div class="row p-t-20">

  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Jenis Ormawa</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="jenis" class="form-control" value="<?php echo @$jenisormawa['jenis']?>" required>
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
