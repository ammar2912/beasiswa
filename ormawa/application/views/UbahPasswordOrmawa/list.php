<div class="row">
  <div class="col-12">
    <div class="card card-cascade narrower z-depth-1">
      <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <div>
              <!-- <button type="button" class="btn btn_hapus btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data"><i class="fas fa-trash-alt mt-0"></i></button>
              <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Jumlah Item Terpilih"><span id="jumlah_pilih">0</span></button> -->
            </div>
            <a href="" class="white-text mx-3">Ubah Password</a>
            <div>
              <!-- <a href="<?php base_url(); ?>ApprovePrestasi/input" class="float-right">
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tambah Data Baru"><i class="fas fa-plus mt-0"></i></button>
              </a> -->
            </div>
      </div>
      <div class="card-body">
            <div class="card-body">
              <form class="form-material m-t-40">
                  <div class="form-group">
                      <label>Default Text <span class="help"> e.g. "George deo"</span></label>
                      <input type="text" class="form-control form-control-line" value="Some text value..."> </div>
                  <div class="form-group">
                      <label for="example-email">Email <span class="help"> e.g. "example@gmail.com"</span></label>
                      <input type="email" id="example-email2" name="example-email" class="form-control" placeholder="Email"> </div>
                  <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" value="password"> </div>
                  <div class="form-group">
                      <label>Placeholder</label>
                      <input type="text" class="form-control" placeholder="placeholder"> </div>
                  <div class="form-group">
                      <label>Text area</label>
                      <textarea class="form-control" rows="5"></textarea>
                  </div>
                  <div class="form-group">
                      <label>Input Select</label>
                      <select class="form-control">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label>File upload</label>
                      <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                          <div class="form-control" data-trigger="fileinput">
                              <i class="glyphicon glyphicon-file fileinput-exists"></i>
                              <span class="fileinput-filename"></span>
                          </div>
                          <span class="input-group-append btn btn-default btn-file">
                              <span class="fileinput-new">Select file</span>
                          <span class="fileinput-exists">Change</span>
                          <input type="file" name="...">
                          </span>
                          <a href="javascript:void(0)" class="input-group-append btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                      </div>
                  </div>
                  <div class="form-group">
                      <label>Helping text</label>
                      <input type="text" class="form-control form-control-line"> <span class="help-block text-muted"><small>A block of help text that breaks onto a new line and may extend beyond one line.</small></span> </div>
              </form>
            </div>
    </div>
  </div>
</div>
<div id="alert"><?php echo $this->Core->Hapus_disable(); ?></div>
<div id="modal"><?php echo $this->Core->Hapus_aktif(); ?></div>
