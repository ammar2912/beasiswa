<div class="row p-t-20">
  <div class="col-md-12 col-xl-12">
    <p><b style="color:red">NB : Mohon isikan data prestasi yang benar </b></p>
  </div>
  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Nama Ormawa</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="id_user" value="<?=$this->session->userdata('id')?>" hidden="1" required readonly="1">
        <input type="text" name="jenis_user" value="2" hidden="1" required readonly="1">
        <input type="text" name="nama_user" class="form-control" value="<?=$this->session->userdata('user')?>" required readonly="1">
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
      <input type="text" name="nama_kegiatan" class="form-control" value="" required>
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
        <option value="1">Individu / Solo</option>
        <option value="2">Berkelompok</option>
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
      <input type="date" name="tanggal_kegiatan" class="form-control" value="" required>
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
        $data = array('Juara 1','Juara 2','Juara 3','Juara Harapan 1','Juara Harapan 2','Lainnya');
        foreach ($data as $value) {
        ?>
        <option value="<?=$value;?>"><?=$value;?></option>
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
        <option value="<?=$value;?>"><?=$value;?></option>
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
      <input type="text" name="penyelenggara" class="form-control" value="" required>
    </div>
  </div>
</div>

<div class="col-md-12 col-xl-12">
  <div class="form-group animated flipIn">
    <label for="exampleInputuname"> Sertifikat Prestasi 1 <b><small style="color:red">*File hanya PDF,JPG,JPEG</small></b></label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
      </div>
      <input type="file" name="lampiran_prestasi_1" class="form-control" value="" required>
      <small></small>
    </div>
  </div>
</div>

<div class="col-md-12 col-xl-12">
  <div class="form-group animated flipIn">
    <label for="exampleInputuname"> Sertifikat Prestasi 2 <b><small style="color:red">*File hanya PDF,JPG,JPEG</small></b></label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
      </div>
      <input type="file" name="lampiran_prestasi_2" class="form-control" value="" >
      <small></small>
    </div>
  </div>
</div>

<div class="col-md-12 col-xl-12">
  <div class="form-group animated flipIn">
    <label for="exampleInputuname"> Sertifikat Prestasi 3 <b><small style="color:red">*File hanya PDF,JPG,JPEG</small></b></label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
      </div>
      <input type="file" name="lampiran_prestasi_3" class="form-control" value="" >
      <small></small>
    </div>
  </div>
</div>

</div>
