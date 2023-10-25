<div class="row p-t-20">
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Nomor</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="nomor" id="nomor" class="form-control" placeholder="Nomor"  required>
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Nama</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama"  required>
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">NIK</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="nik" id="nik" class="form-control" placeholder="NIK"  required>
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">NPWP</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="npwp" id="npwp" class="form-control" placeholder="NPWP" required>
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Tanggal</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="date" name="tanggal" id="tanggal" class="form-control"  required>
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Pajak</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="pajak" id="pajak" class="form-control" placeholder="pajak"  required>
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Bruto</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="number" name="bruto" id="bruto" class="form-control" placeholder="0"  required>
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">PPH Dipotong</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="number" name="pph_dipotong" id="pph_dipotong" class="form-control" placeholder="0"  required>
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Email</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="email" id="email" class="form-control" placeholder="Email" required>
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Telepon</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">+62</span>
        </div>
        <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Telepon" value="<?php echo @$obat['nama_obat']; ?>" required>
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">File Bukti</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="file" name="file" id="file" class="form-control" placeholder="file" value="<?php echo @$obat['nama_obat']; ?>" required>
      </div>

    </div>
  </div>
  <div class="col-md-12 col-xl-4"></div>
</div>
