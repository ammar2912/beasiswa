<div class="row p-t-20">
  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">NAMA Menu</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="nama_menu" class="form-control" value="">
      </div>
    </div>
  </div>
  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">ICON Menu</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="icon" class="form-control" value="">
      </div>
    </div>
  </div>
  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Parent</label>

      <select class="form-control myselect2" name="parent">
        <option value="">Pilih Parent</option>
        <?php foreach ($menu as $value): ?>
            <option value="<?php echo $value->idmenu?>"><?php echo $value->nama_menu;?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">URL</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="url" placeholder="URL" class="form-control" value="">
      </div>
    </div>
  </div>
  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Utama</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <!-- <span class="input-group-text" id="basic-addon1"><i class="ti-reddit"></i></span> -->
        </div>
        <div class="custom-control custom-radio m-l-10 ">

          <input type="radio" id="p" name="utama" value="0" class="custom-control-input" checked>

          <label class="custom-control-label" for="p">Tidak</label>
        </div>
        <div class="custom-control custom-radio m-l-10">
          <input type="radio" id="l" name="utama" value="1" class="custom-control-input">

          <label class="custom-control-label" for="l">YA</label>
        </div>

      </div>
    </div>
  </div>
  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">SUB</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <!-- <span class="input-group-text" id="basic-addon1"><i class="ti-reddit"></i></span> -->
        </div>
        <div class="custom-control custom-radio m-l-10">

          <input type="radio" id="sub_tidak" name="sub" value="0" class="custom-control-input" checked>

          <label class="custom-control-label" for="sub_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio m-l-10">
          <input type="radio" id="sub_ya" name="sub" value="1" class="custom-control-input">

          <label class="custom-control-label" for="sub_ya">YA</label>
        </div>

      </div>
    </div>
  </div>
  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">KATEGORI</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <!-- <span class="input-group-text" id="basic-addon1"><i class="ti-reddit"></i></span> -->
        </div>
        <div class="custom-control custom-radio m-l-10">

          <input type="radio" id="kategori_tidak" name="kategori" value="0" class="custom-control-input" checked>

          <label class="custom-control-label" for="kategori_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio m-l-10">
          <input type="radio" id="kategori_ya" name="kategori" value="1" class="custom-control-input">

          <label class="custom-control-label" for="kategori_ya">YA</label>
        </div>

      </div>
    </div>
  </div>
</div>
