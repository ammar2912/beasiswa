<div class="row">
  <div class="col-6">
    <div class="card card-cascade narrower z-depth-1">
      <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <div>
        </div>
        <h3 class="white-text mx-3">RESET PASSWORD MAHASISWA</h3>
        <div>
        </div>
      </div>
      <div class="card-body">
                              <form action="<?php echo base_url() ?>Mahasiswa/onUpdateUser" method="post">
                                  <div class="form-body">
                                    <div class="row p-t-20">
                                      <div class="col-md-12">
                                          <div class="form-group ">
                                              <label class="control-label">NIM ( Nomor Induk Mahasiswa )</label>
                                              <input type="text" id="nim" name="nim" class="form-control form-control" placeholder="" value="<?php echo $user["mahasiswa_nim"] ?>" readonly>
                                              <input type="text" name="iduser_mahasiswa" value="<?php echo $user["iduser_mahasiswa"]; ?>" hidden>
                                            </div>
                                      </div>
                                      <div class="col-md-12">
                                          <div class="form-group ">
                                              <label class="control-label">Password</label>
                                              <input type="text" id="password" name="password" class="form-control form-control" placeholder="">
                                            </div>
                                      </div>
                                    </div>

                                  <div class="form-actions" >
                                      <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Simpan</button>
                                      <button type="button" class="btn btn-light"><i class="fa fa-back"></i> Batal</button>
                                  </div>
                              </form>
                          </div>
    </div>
  </div>
</div>
</div>
