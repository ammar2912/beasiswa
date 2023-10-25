<div class="row">
  <div class="col-12">
    <div class="card card-cascade narrower z-depth-1">
      <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <div>
              <!-- <button type="button" class="btn btn_hapus btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data"><i class="fas fa-trash-alt mt-0"></i></button>
              <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Jumlah Item Terpilih"><span id="jumlah_pilih">0</span></button> -->
            </div>
            <a href="" class="white-text mx-3">Daftar Kegiatan Ormawa</a>
            <div>
              <!-- <a href="<?php base_url(); ?>Jurusan/input" class="float-right">
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
                      <th>Nama Kegiatan</th>
                      <th>Uraian </th>
                      <th>Lampiran </th>
                      <th>Periode</th>
                      <th style="text-align:center">Status Kegiatan</th>
                      <!-- <th width="10%">Opsi</th> -->
                    </tr>
                </thead>
                <tbody>
                  <?php $no=0; foreach ($kegiatanormawapimpinan as $data) {?>
                    <?php
                    $id_check = $data->id_kegiatan;
                    $status_kegiatan = '';
                    if($data->status_kegiatan ==  1){
                    $status_kegiatan = 'Diapproval';
                    }elseif ($data->status_kegiatan == 2){
                    $status_kegiatan = 'Wadir 3';
                    }elseif ($data->status_kegiatan == 3){
                    $status_kegiatan = 'Keuangan';
                    }elseif ($data->status_kegiatan == 4){
                    $status_kegiatan = 'Wadir 2';
                    }elseif ($data->status_kegiatan == 5){
                    $status_kegiatan = 'Direktur';
                    }elseif ($data->status_kegiatan == 6){
                    $status_kegiatan = 'Pencairan';
                    }elseif ($data->status_kegiatan == 0 && $data->status_revisi == 0){
                    $status_kegiatan = 'Pending';
                    }elseif ($data->status_kegiatan == 0 && $data->status_revisi != 0){
                    $status_kegiatan = 'Revisi';
                    }
                    ?>
                    <tr>
                        <!-- <td><input type="checkbox" class="form-check-input id_checkbox" id="tableMaterialCheck<?php echo $id_check ?>" name="id[]" value="<?php echo $id_check ?>">
                          <label class="form-check-label" for="tableMaterialCheck<?php echo $id_check ?>"></label>
                        </td> -->
                        <td><b><?=$no+1?></b></td>
                        <td><?php echo $data->nama_ormawa?></td>
                        <td><?php echo $data->nama_kegiatan?> <br> <b>Proker : <?php if($data->nama_proker != ""){echo $data->nama_proker;}else{echo "Lainnya / Diluar Proker"; }?></b> </td>
                        <td>
                          <a href="javascript:;"
                          data-nama_ormawa="<?=$data->nama_ormawa;?>"
                          data-nama_kegiatan="<?=$data->nama_kegiatan;?>"
                          data-tanggung_jawab="<?=$data->tanggung_jawab;?>"
                          data-dana_pengajuan="<?=rupiah($data->dana_pengajuan);?>"
                          data-dana_acc="<?=rupiah($data->dana_acc);?>"
                          data-periode="<?=$data->periode;?>"
                          data-status="<?=$status_kegiatan;?>"
                          data-toggle="modal" data-target="#modal_detailkegiatan">
                            <button type="button" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="">
                              Detail
                            </button>
                          </a>
                        </td>
                        <td><a target="_blank" href="<?=base_url('');?>file/<?=$data->lampiran;?>"><button class="btn btn-info btn-sm">Download</button></a></td>
                        <td><b>Thn.<?php echo $data->periode?></b></td>
                        <td style="text-align:center">
                          <?php if($data->status_kegiatan == 1) { ?>
                             <button class="btn btn-primary btn-sm">Diapproval</button>
                          <?php } elseif ($data->status_kegiatan == 2) { ?>
                            <button class="btn btn-primary btn-sm">Wadir 3</button>
                          <?php } elseif ($data->status_kegiatan == 3) { ?>
                            <button class="btn btn-primary btn-sm">Keuangan</button>
                          <?php } elseif ($data->status_kegiatan == 4) { ?>
                            <button class="btn btn-primary btn-sm">Wadir 2</button>
                          <?php } elseif ($data->status_kegiatan == 5) { ?>
                            <button class="btn btn-primary btn-sm">Direktur</button>
                          <?php } elseif ($data->status_kegiatan == 6) { ?>
                            <button class="btn btn-success btn-sm">Pencairan</button>
                          <?php }else if($data->status_kegiatan == 0 && $data->status_revisi == 0){ ?>
                             <button class="btn btn-danger btn-sm">Pending</button>
                          <?php }else if($data->status_kegiatan == 0 && $data->status_revisi != 0){ ?>
                            <button class="btn btn-warning btn-sm">Direvisi</button>
                          <?php } ?>
                        </td>
                        <!-- <td><?php echo $data->date?></td> -->
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

<div class="modal fade" id="modal_detailkegiatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="nama_kegiatan"></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="bodymodal_detailproker">
        <table class="table table-sm">
          <tr>
            <td>
              <b>Nama Ormawa</b>
           </td>
             <td>
              : <b id="nama_ormawa"></b>
            </td>
          </tr>
          <tr>
            <td>
              <b>Penanggung Jawab</b>
           </td>
             <td>
               : <b id="tanggung_jawab"></b>
            </td>
          </tr>
          <tr>
            <td>
              <b>Periode</b>
           </td>
             <td>
               : <b id="periode"></b>
            </td>
          </tr>
          <tr>
            <td>
              <b>Dana Pengajuan</b>
           </td>
             <td>
              : <b style="background-color:blue;color:white;padding:3px" id="dana_pengajuan"></b>
            </td>
          </tr>
          <tr>
            <td>
              <b>Dana Ter ACC</b>
           </td>
             <td>
               : <b style="background-color:green;color:white;padding:3px" id="dana_acc"></b>
            </td>
        </tr>
        <tr>
          <td>
            <b>Status Kegiatan</b>
         </td>
           <td>
             : <b id="status"></b>
          </td>
      </tr>
    </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" id="close">Tutup</button>
      </div>
    </div>
  </div>
</div>


<script>
$(document).ready(function() {
  $('#modal_detailkegiatan').on('show.bs.modal', function (event) {
    var div = $(event.relatedTarget);
    var modal = $(this);

    modal.find('#nama_kegiatan').html(div.data('nama_kegiatan'));
    modal.find('#nama_ormawa').html(div.data('nama_ormawa'));
    modal.find('#tanggung_jawab').html(div.data('tanggung_jawab'));
    modal.find('#periode').html(div.data('periode'));
    modal.find('#dana_pengajuan').html(div.data('dana_pengajuan'));
    modal.find('#dana_acc').html(div.data('dana_acc'));
    modal.find('#status').html(div.data('status'));

  });
});
</script>

<?php
function rupiah($angka){
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;

}
?>
