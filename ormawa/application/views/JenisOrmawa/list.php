<!-- <?php echo form_open('JenisOrmawa/delete');?> -->

<div class="row">
  <div class="col-12">
    <div class="card card-cascade narrower z-depth-1">
      <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <div>
              <!-- <button type="button" class="btn btn_hapus btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data"><i class="fas fa-trash-alt mt-0"></i></button>
              <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Jumlah Item Terpilih"><span id="jumlah_pilih">0</span></button> -->
            </div>
            <a href="" class="white-text mx-3">Daftar Jenis Ormawa</a>
            <div>
              <a href="<?php base_url(); ?>JenisOrmawa/input" class="float-right">
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tambah Data Baru"><i class="fas fa-plus mt-0"></i></button>
              </a>
            </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="myTable" class="table table-striped table-bordered ">
                <thead>
                    <tr>
                      <!-- <th width="10%"><input type="checkbox" class="form-check-input select-all" id="tableMaterialChec">
                      <label class="form-check-label" for="tableMaterialChec"></label>
                      </th> -->
                      <th>No.</th>
                      <th>Jenis Ormawa</th>
                      <th>Status</th>
                      <th width="10%">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($jenisormawa as $data) {?>
                    <?php $id_check = $data->id;?>
                    <tr>
                        <!-- <td><input type="checkbox" class="form-check-input id_checkbox" id="tableMaterialCheck<?php echo $id_check ?>" name="id[]" value="<?php echo $id_check ?>">
                          <label class="form-check-label" for="tableMaterialCheck<?php echo $id_check ?>"></label>
                        </td> -->
                        <td><?php echo $no;?></td>
                        <td><?php echo $data->jenis?></td>
                        <td>
                          <?php
                           if($data->status == 1){
                           ?>
                           <p class="btn btn-success btn-md">Aktif</p>
                           </a>
                           <?php
                           } else{
                           ?>
                           <p class="btn btn-danger btn-md">NonAktif</p>
                           </a>
                           <?php
                           }
                           ?>
                        </td>
                        <td>
                          <a href="<?php base_url()?>JenisOrmawa/edit/<?php echo base64_encode($id_check);?>">
                          <button type="button" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                            <i class="fa fa-edit"></i>
                          </button>
                        </a>
                        <?php
                         if($data->status == 1){
                         ?>
                         <a onclick="return confirm('Apakah anda yakin ?');" href="<?php echo base_url()?>JenisOrmawa/NonAktif/<?php echo base64_encode($id_check);?>">
                           <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Nonaktif Jenis Ormawa">
                             <i class="fa fa-power-off"></i>
                           </button>
                         </a>
                         <?php
                         } else{
                         ?>
                         <a onclick="return confirm('Apakah anda yakin ?');" href="<?php echo base_url()?>JenisOrmawa/Aktif/<?php echo base64_encode($id_check);?>">
                           <button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Aktifkan Jenis Ormawa">
                             <i class="fa fa-power-off"></i>
                           </button>
                         </a>
                         <?php
                         }
                         ?>
                      </td>
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
