<div class="row">
  <div class="col-12">
    <div class="card card-cascade narrower z-depth-1">
      <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <div>
        </div>
        <h3 class="white-text mx-3">LIST KELAS E - LEARNING</h3>
        <div>
          <a href="<?php base_url(); ?>Kelas_Elearning/input" class="float-right">
          <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tambah Data Baru"><i class="fas fa-pencil-alt mt-0"></i></button>
        </a>
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
                                      <th>Opsi</th>
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
                                              <td>
                                                 <a href="<?php echo base_url()?>Kelas_Elearning/edit/<?php echo $id_check;?>" class="btn-floating btn-sm btn-warning"><i class="fas fa-pen"></i></a>
                                                 <a href="<?php echo base_url()?>Kelas_Elearning/delete/<?php echo $id_check;?>" class="btn-floating btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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
