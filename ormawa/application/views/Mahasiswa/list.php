<?php echo form_open('Mahasiswa/delete');?>

<div class="row">
  <div class="col-12">
    <div class="card card-cascade narrower z-depth-1">
      <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <div>
              <button type="button" class="btn btn_hapus btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data"><i class="fas fa-trash-alt mt-0"></i></button>
              <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Jumlah Item Terpilih"><span id="jumlah_pilih">0</span></button>
            </div>
            <a href="" class="white-text mx-3">Daftar Mahasiswa</a>
            <div>
              <a href="<?php base_url(); ?>Mahasiswa/input" class="float-right">
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tambah Data Baru"><i class="fas fa-plus mt-0"></i></button>
              </a>
            </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="myTable" class="table table-striped table-bordered ">
                <thead>
                    <tr>
                      <th width="10%"><input type="checkbox" class="form-check-input select-all" id="tableMaterialChec">
                      <label class="form-check-label" for="tableMaterialChec"></label>
                      </th>
                      <th>NIM</th>
                      <th>Nama </th>
                      <!-- <th>Email</th> -->
                      <th>Jurusan</th>
                      <th>Prodi</th>
                      <!-- <th>Status Akun</th> -->
                      <!-- <th>Tanggal</th> -->
                      <th width="10%">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($mahasiswa as $data) {?>
                    <?php $id_check = $data->id_mahasiswa;?>
                    <tr>
                        <td><input type="checkbox" class="form-check-input id_checkbox" id="tableMaterialCheck<?php echo $id_check ?>" name="id[]" value="<?php echo $id_check ?>">
                          <label class="form-check-label" for="tableMaterialCheck<?php echo $id_check ?>"></label>
                        </td>
                        <td><?php echo $data->nim?></td>
                        <td><?php echo $data->nama?></td>
                        <td><?php echo $data->jurusan?></td>
                        <td><?php echo $data->prodi?></td>
                        <!-- <td>
                        <?php
                         if($data->status_mahasiswa == 1){
                         ?>
                         <p class="btn btn-success btn-sm">Aktif</p>
                         <?php
                         } else{
                         ?>
                         <p class="btn btn-danger btn-sm">NonAktif</p>
                         <?php
                         }
                         ?>
                        </td>
                        <td><?php echo $data->date?></td> -->
                        <td><a href="<?php base_url()?>Mahasiswa/edit/<?php echo base64_encode($id_check);?>">
                          <button type="button" class="btn btn-warning btn-md" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                            <i class="fa fa-edit"></i>
                          </button>
                        </a></td>
                    </tr>
                  <?php
                  $no++;
                  }?>
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="alert"><?php echo $this->Core->Hapus_disable(); ?></div>
<div id="modal"><?php echo $this->Core->Hapus_aktif(); ?></div>
<?php echo form_close();?>