<?php echo form_open('HistoryAnggaran/delete');?>

<div class="row">
  <div class="col-12">
    <div class="card card-cascade narrower z-depth-1">
      <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <div>
              <!-- <button type="button" class="btn btn_hapus btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data"><i class="fas fa-trash-alt mt-0"></i></button> -->
              <!-- <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Jumlah Item Terpilih"><span id="jumlah_pilih">0</span></button> -->
            </div>
            <a href="" class="white-text mx-3">History Anggaran</a>
            <div>
              <!-- <a href="<?php base_url(); ?>DataAnggaran/input" class="float-right">
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tambah Data Baru"><i class="fas fa-plus mt-0"></i></button>
              </a> -->
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
                  <th>Ormawa</th>
                  <th>Anggaran Ormawa</th>
                  <th>Anggaran Terpakai</th>
                  <th>Periode</th>
                  <th>Status Anggaran</th>
                  <!-- <th width="10%">Opsi</th> -->
                </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($rekapdanaormawa as $data) {?>
                <?php $id_check = $data->id_anggaran;?>
                <tr>
                    <!-- <td><input type="checkbox" class="form-check-input id_checkbox" id="tableMaterialCheck<?php echo $id_check ?>" name="id[]" value="<?php echo $id_check ?>">
                      <label class="form-check-label" for="tableMaterialCheck<?php echo $id_check ?>"></label>
                    </td> -->
                    <td><?php echo $no?></td>
                    <td><?php echo $data->nama_ormawa?></td>
                    <td><b style="background-color:green;padding:3px;color:white;font-size:12px"><?php echo rupiah($data->anggaran_awal);?></b></td>
                    <td><b style="background-color:red;padding:3px;color:white;font-size:12px"><?php echo rupiah($data->anggaran_terpakai);?></b></td>
                    <td>Thn. <?php echo $data->periode?></td>
                    <td>
                    <?php
                     if($data->status_anggaran == 1){
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
                    <!-- <td><a href="<?php base_url()?>RekapDanaOrmawa/detail/<?php echo base64_encode($id_check);?>">
                      <button type="button" class="btn btn-info btn-sm " data-toggle="tooltip" data-placement="top" title="" data-original-title="Detail">
                        Detail
                      </button>
                    </a></td> -->
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
<?php
function rupiah($angka){

	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;

}
?>
