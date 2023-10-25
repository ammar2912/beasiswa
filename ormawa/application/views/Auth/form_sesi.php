<form action="#" method="POST" id="SimpanKas">

<div class="row form-group">
  <div class="col col-md-4">
      <label for="noBPJS" class=" form-control-label">Jumlah Kas</label>
  </div>
  <div class="col-8 col-md-8">
    <input type="hidden" name="sesi" value="" id="sesi_jaga">
    <input type="text" style="outline:1px solid #ced4da" name="jumlah" value="" class="money form-control" value="" id="jumlah">
  </div>
</div>

<div class="row form-group">
  <div class="col col-md-4">
      <!-- <label for="noBPJS" class=" form-control-label">Jumlah Bayar</label> -->
  </div>
  <div class="col-8 col-md-8">
    <button type="submit" class="btn btn-sm btn-success">Masukkan</button>
  </div>
</div>

<!-- <input type="hidden" id="nokun" value="" name="nokun">
<input type="hidden" id="no_rm" value="" name="no_rm"> -->
<?php echo form_close()?>
