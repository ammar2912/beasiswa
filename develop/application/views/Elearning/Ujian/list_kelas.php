<div class="row">
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
                            <div class="table-responsive">
                            <table id="myTable" class="table color-table table-hover table-striped ">
                              <thead>
                                  <tr>
                                      <th width="5%">#</th>
                                      <th>Kode Elearning</th>
                                      <th>Nama Kelas</th>
                                      <th>Matakuliah</th>
                                      <th>Dosen Pengampu</th>
                                      <th>Tambah Ujian</th>
                                  </tr>
                              </thead>
                              <tbody>
                                        <?php $no = 1; foreach ($kelas_elearning as $value):
                                          $id_check = $value->kode_elearning;?>
                                          <tr>
                                              <td><?php echo $no;?></td>
                                              <td><?php echo $id_check; ?></td>
                                              <td><?php echo $value->nama_kelas; ?></td>
                                              <td><?php echo $value->nama_matakuliah; ?></td>
                                              <td><?php echo $this->ModelPegawai->get_data_edit($value->owner)["nama"] ?></td>
                                              <td class="text-center">
                                                 <a href="<?php echo base_url()?>Ujian/input_ujian/<?php echo $id_check;?>" class="btn-floating btn-sm btn-info" data-toggle="tooltip" title="Tambah Ujian"><i class="fas fa-file-signature"></i></a>
                                                 <a href="<?php echo base_url()?>Elearning/list/<?php echo $id_check;?>" class="btn-floating btn-sm btn-success" data-toggle="tooltip" title="List Ujian"><i class="fas fa-file"></i></a>
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
