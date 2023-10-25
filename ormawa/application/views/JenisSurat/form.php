<div class="row p-t-20">
  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Jenis Surat</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="jenis_surat" class="form-control" value="<?php echo @$jenissurat['jenis_surat']?>" required>
      </div>
    </div>
  </div>
  <div class="col-md-12 col-xl-12">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Persyaratan Surat</label>
      <div class="input-group mb-3">
        <?php
        foreach ($persyaratan as $value) {
          ?>
          <input type="checkbox" class="form-check-input "  id="<?=$value;?>" name="syarat[]" value="<?=$value;?>" <?php if(@$syarat){if(in_array($value,@$syarat)){ echo "checked"; } }?> >
            <label class="form-check-label" for="<?=$value;?>"><?=$value;?></label>&nbsp;&nbsp;    &nbsp;&nbsp;
          <?php
        }
        ?>

      </div>
    </div>
  </div>
</div>
