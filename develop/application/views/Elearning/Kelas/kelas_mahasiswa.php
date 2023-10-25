<div class="row">
  <div class="col-7">
    <div class="card card-cascade narrower z-depth-1">
      <div class="view view-cascade gradient-card-header aqua-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <div>
          <h4 class="white-text mx-3">ENROLKEY KELAS E - LEARNING</h4>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <?php echo form_open_multipart('Kelas_Elearning/enrolKey');?>
            <div class="form-body row">
              <div class="col-md-5">
                  <div class="form-group">
                      <label class="control-label">NIM Mahasiswa</label>
                      <input type="text" name="nim" id="nim" class="form-control" placeholder="" value="<?php echo $_SESSION["id_login"]; ?>" readonly/>
                    </div>

              </div>
              <div class="col-md-5">
                <div class="form-group">
                    <label class="control-label">Enrol Key Kelas</label>
                    <input type="text" name="key" id="key" class="form-control" placeholder="" />
                  </div>
              </div>
              <div class="col-1">
                <button type="submit" class="btn btn-rounded btn-success"><i class="fas fa-user-check"></i></button>
              </div>

            </div>
          <?php echo form_close(); ?>
        </div>
    </div>
  </div>
</div>

  <div class="col-12">
    <div class="card card-cascade narrower z-depth-1">
      <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <div>
        </div>
        <h3 class="white-text mx-3">LIST KELAS E - LEARNING</h3>
        <div>
        </div>
      </div>

      <div class="card-body">
        <div class="row">
                            <div class="table-responsive">
                            <table id="myTable" class="table color-table table-hover table-striped ">
                              <thead>
                                  <tr>
                                      <th width="5%">#</th>
                                      <th>Kode Elearning</th>
                                      <th>Nama Kelas</th>
                                      <th>Matakuliah</th>
                                      <th>Dosen Pengampu</th>
                                      <th>Opsi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                        <?php $no = 1; foreach ($kelas as $value):
                                          $id_check = $value->kode_elearning;?>
                                          <tr>
                                              <td><?php echo $no;?></td>
                                              <td><?php echo $id_check; ?></td>
                                              <td><?php echo $value->nama_kelas; ?></td>
                                              <td><?php echo $value->nama_matakuliah; ?></td>
                                              <td><?php echo $this->ModelPegawai->get_data_edit($value->owner)["nama"] ?></td>
                                              <td>
                                                <a href="<?php echo base_url()?>Kelas_Elearning/hapusEnrolKey/<?php echo $id_check."/".$_SESSION["id_login"];?>" class="btn-floating btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                              </td>
                                          </tr>
                                        <?php $no++;  endforeach; ?>
                                      </tbody>

                                  </table>
                            </div>
                          </div>

    </div>
  </div>
</div>
</div>
