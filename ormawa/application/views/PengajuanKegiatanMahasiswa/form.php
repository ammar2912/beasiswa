<div class="row p-t-20">

  <!-- <div class="col-md-12 col-xl-12"> -->
    <!-- <h5><b style="color:red">Nb : Untuk pengajuan kegiatan harus sudah terdapat tanda tangan Pembina Ormawa & BEM  </b></h5> -->
    <!-- <br>
  </div> -->
  <!-- <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Pilih Proker</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <select class="form-control" name="proker" required="1">
          <option value="">Pilih Proker</option>
          <?php foreach ($proker as $value) {
            ?>
          <option value="<?=$value->id;?>"><?=$value->nama_proker;?></option>
          <?php } ?>
          <option value="lainnya">Lainnya / Diluar Proker</option>
        </select>
      </div>
    </div>
  </div> -->
  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Nama Kegiatan</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="hidden" name="id_mahasiswa" class="form-control" value="<?=$this->session->userdata('id');?>" required>
        <input type="text" name="nama_kegiatan" class="form-control" value="" required>
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
      <input type="text" name="pwb" class="form-control" value="<?=$this->session->userdata('nama');?>" required>
    </div>
  </div>
</div>
<div class="col-md-12 col-xl-6">
  <div class="form-group animated flipIn">
    <label for="exampleInputuname">Pengajuan Dana</label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
      </div>
      <input type="number" name="dana_pengajuan" class="form-control" value="" required>
    </div>
  </div>
</div>
<div class="col-md-12 col-xl-6">
  <div class="form-group animated flipIn">
    <label for="exampleInputuname">Tanggal Pengajuan</label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
      </div>
      <input type="text" name="date" class="form-control" value="<?=date('Y-m-d H:i:s')?>" required readonly>
    </div>
  </div>
</div>
<div class="col-md-12 col-xl-6">
  <div class="form-group animated flipIn">
    <label for="exampleInputuname">Proposal Kegiatan</label>
    <small><b style="color:red">* File Harus Pertipe PDF</b></small>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
      </div>
      <input type="file" name="lampiran" class="form-control" value="" required>
    </div>
  </div>
</div>

</div>
