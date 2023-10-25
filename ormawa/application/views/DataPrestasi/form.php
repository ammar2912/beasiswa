<div class="row p-t-20">
  <div class="col-md-12 col-xl-12">
    <p><b style="color:red">NB : Mohon isikan data prestasi yang benar </b></p>
  </div>
  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Nama Mahasiswa</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="id_user" value="<?=@$dataprestasi['id']?>" hidden="1" required readonly="1">
        <input type="text" name="jenis_user" value="1" hidden="1" required readonly="1">
        <input type="text" name="nama_user" class="form-control" value="<?=@$dataprestasi['nama_user']?>" required readonly="1">
    </div>
  </div>
</div>
<div class="col-md-12 col-xl-6">
  <div class="form-group animated flipIn">
    <label for="exampleInputuname">Nama Lomba / Kegiatan</label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
      </div>
      <input type="text" name="nama_kegiatan" class="form-control" value="<?=@$dataprestasi['nama_kegiatan']?>" required>
  </div>
</div>
</div>
<div class="col-md-12 col-xl-6">
  <div class="form-group animated flipIn">
    <label for="exampleInputuname">Kategori Lomba / Kegiatan</label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
      </div>
      <select name="kategori" class="form-control select2" required>
        <option value="">Pilih Kategori Lomba</option>
        <option value="1" <?php if(@$dataprestasi['kategori'] == 1){echo "selected";}?>>Individu / Solo</option>
        <option value="2" <?php if(@$dataprestasi['kategori'] == 2){echo "selected";}?> >Berkelompok</option>
      </select>
    </div>
  </div>
</div>
<div class="col-md-12 col-xl-6">
  <div class="form-group animated flipIn">
    <label for="exampleInputuname">Tanggal Lomba / Kegiatan</label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
      </div>
      <input type="date" name="tanggal_kegiatan" class="form-control" value="<?=@$dataprestasi['tanggal_kegiatan']?>" required>
    </div>
  </div>
</div>
<div class="col-md-12 col-xl-6">
  <div class="form-group animated flipIn">
    <label for="exampleInputuname">Prestasi Diraih</label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
      </div>
      <select name="prestasi" class="form-control select2" id="prestasi" required>
        <option>Pilih Prestasi</option>
        <?php
        $data = array('Juara 1','Juara 2','Juara 3','Juara Harapan 1','Juara Hrapan 2','Lainnya');
        foreach ($data as $value) {
        ?>
        <option value="<?=$value;?>" <?php if(@$dataprestasi['prestasi'] == $value){echo "selected";}?> ><?=$value;?></option>
        <?php
        }
        ?>
      </select>
    </div>
  </div>
</div>
<div class="col-md-12 col-xl-6">
  <div class="form-group animated flipIn">
    <label for="exampleInputuname">Lingkup Prestasi</label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
      </div>
      <select name="lingkup_prestasi" class="form-control select2" id="lingkup_prestasi" required>
        <option>Pilih Lingkup Prestasi</option>
        <?php
        $data = array('Kabupaten','Provinsi','Nasional','Lainnya');
        foreach ($data as $value) {
        ?>
        <option value="<?=$value;?>" <?php if(@$dataprestasi['lingkup_prestasi'] == $value){echo "selected";}?> ><?=$value;?></option>
        <?php
        }
        ?>
      </select>
    </div>
  </div>
</div>
<div class="col-md-12 col-xl-6">
  <div class="form-group animated flipIn">
    <label for="exampleInputuname">Penyelenggara Lomba / Kegiatan</label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
      </div>
      <input type="text" name="penyelenggara" class="form-control" value="<?=@$dataprestasi['penyelenggara']?>" required>
    </div>
  </div>
</div>

<!-- <div class="col-md-12 col-xl-6">
  <div class="form-group animated flipIn">
    <label for="exampleInputuname"> Sertifikat Prestasi</label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
      </div>
      <input type="file" name="lampiran_prestasi" class="form-control" value="" required>
      <small></small
    </div>
  </div>
</div> -->

</div>
