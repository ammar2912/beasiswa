<div class="row">
  <div class="form-group col col-sm-6">
        <div class="col col-md-4">
          <label for="text-input" class=" form-control-label">Tanggal Mulai :</label>
        </div>
        <div class="col-12 col-md-9">
            <input type="date" name="mulai" id="mulai" class="form-control" placeholder="mulai" value="<?php echo @$jadwal['mulai']; ?>" >
        </div>
  </div>
  <div class="form-group col col-sm-6">
        <div class="col col-md-4">
          <label for="text-input" class=" form-control-label">Tanggal Selesai :</label>
        </div>
        <div class="col-12 col-md-9">
            <input type="date" name="selesai" id="selesai" class="form-control" placeholder="selesai" value="<?php echo @$jadwal['selesai']; ?>" >
        </div>
  </div>
</div>
