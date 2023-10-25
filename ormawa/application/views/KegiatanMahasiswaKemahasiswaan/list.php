<div class="row">
  <div class="col-12">
    <div class="card card-cascade narrower z-depth-1">
      <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <div>
              <!-- <button type="button" class="btn btn_hapus btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data"><i class="fas fa-trash-alt mt-0"></i></button>
              <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Jumlah Item Terpilih"><span id="jumlah_pilih">0</span></button> -->
            </div>
            <a href="" class="white-text mx-3">Daftar Kegiatan Mahasiswa</a>
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
                      <th>Nama Mahasiswa</th>
                      <th>Nama Kegiatan</th>
                      <th>Uraian </th>
                      <th>Lampiran </th>
                      <!-- <th>Periode</th> -->
                      <th style="text-align:center">Status </th>
                      <th width="10%">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($kegiatanmahasiswa as $data) {?>
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
                        <td><b><?=$no++?></b></td>
                        <td>
                          <?php if($data->status_kegiatan == 0 && $data->status_revisi == 1){ ?>
                            <i class="fa fa-square" style="color:orange"></i> <?php echo $data->nama_mahasiswa?>
                          <?php }elseif ($data->status_kegiatan == 0 && $data->status_revisi == 2) { ?>
                            <i class="fa fa-square" style="color:#92d5f2"></i> <?php echo $data->nama_mahasiswa?>
                          <?php }elseif ($data->status_kegiatan == 1 && $data->status_revisi == 0 || $data->status_revisi == 1 || $data->status_revisi == 2) { ?>
                            <i class="fa fa-square" style="color:blue"></i> <?php echo $data->nama_mahasiswa?>
                          <?php }elseif ($data->status_kegiatan == 2 || $data->status_kegiatan == 3 || $data->status_kegiatan == 4 || $data->status_kegiatan == 5) { ?>
                            <i class="fa fa-square" style="color:blue"></i> <?php echo $data->nama_mahasiswa?>
                          <?php }elseif ($data->status_kegiatan == 6 && $data->status_revisi == 0 || $data->status_revisi == 1 || $data->status_revisi == 2) { ?>
                            <i class="fa fa-square" style="color:green"></i> <?php echo $data->nama_mahasiswa?>
                          <?php }else if($data->status_kegiatan == 0 && $data->status_revisi == 0){ ?>
                            <i class="fa fa-square" style="color:red"></i> <?php echo $data->nama_mahasiswa?>
                          <?php } ?>
                        </td>
                        <td><?php echo $data->nama_kegiatan?> </td>
                        <td>
                          <a href="javascript:;"
                          data-nama_ormawa="<?=$data->nama_mahasiswa;?>"
                          data-nama_kegiatan="<?=$data->nama_kegiatan;?>"
                          data-tanggung_jawab="<?=$data->tanggung_jawab;?>"
                          data-dana_pengajuan="<?=rupiah($data->dana_pengajuan);?>"
                          data-dana_acc="<?=rupiah($data->dana_acc);?>"
                          data-periode="<?=$data->tgl_pengajuan;?>"
                          data-status="<?=$status_kegiatan;?>"
                          data-toggle="modal" data-target="#modal_detailkegiatan">
                            <button type="button" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="">
                              Detail
                            </button>
                          </a>
                        </td>
                        <td><a target="_blank" href="<?=base_url('');?>file/<?=$data->lampiran;?>"><button class="btn btn-info btn-sm">Download</button></a></td>
                        <!-- <td><b>Thn.<?php echo $data->periode?></b></td> -->
                        <td style="text-align:center">
                          <?php if($data->status_kegiatan == 1){ ?>
                           <button class="btn btn-primary btn-sm">Diapproval</button>
                           <a href="<?= base_url('KegiatanMahasiswa/wadir3?id='. $data->id_kegiatan)?>" class="badge badge-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lanjutkan ke Wadir 3"><i class="fas fa-check" style="font-size:15px"> Wadir 3</i></a>
                         <?php } elseif ($data->status_kegiatan == 2) { ?>
                           <button class="btn btn-primary btn-sm">Wadir 3</button>
                           <a href="<?= base_url('KegiatanMahasiswa/keuangan?id='. $data->id_kegiatan)?>" class="badge badge-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lanjutkan ke Keuangan"><i class="fas fa-check" style="font-size:15px"> Keuangan</i></a>
                         <?php } elseif ($data->status_kegiatan == 3) { ?>
                           <button class="btn btn-primary btn-sm">Keuangan</button>
                           <a href="<?= base_url('KegiatanMahasiswa/wadir2?id='. $data->id_kegiatan)?>" class="badge badge-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lanjutkan ke Wadir 2"><i class="fas fa-check" style="font-size:15px"> Wadir 2</i></a>
                         <?php } elseif ($data->status_kegiatan == 4) { ?>
                           <button class="btn btn-primary btn-sm">Wadir 2</button>
                           <br>
                           <a href="<?= base_url('KegiatanMahasiswa/direktur?id='. $data->id_kegiatan)?>" class="badge badge-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lanjutkan ke Direktur"><i class="fas fa-check" style="font-size:15px"> Direktur</i></a>
                         <?php } elseif ($data->status_kegiatan == 5) { ?>
                           <button class="btn btn-primary btn-sm">Direktur</button>
                           <a href="<?= base_url('KegiatanMahasiswa/pencairan?id='. $data->id_kegiatan)?>" class="badge badge-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lanjutkan ke Pencairan"><i class="fas fa-check" style="font-size:15px"> Pencairan</i></a>
                         <?php } elseif ($data->status_kegiatan == 6) { ?>
                           <button class="btn btn-success btn-sm">Pencairan</button>
                           <button class="badge badge-light" disabled>Belum ada aksi</button>
                          <?php }else if($data->status_kegiatan == 0 && $data->status_revisi == 0){?>
                           <button class="btn btn-danger btn-sm">Pending</button>
                          <?php }else if($data->status_kegiatan == 0 && $data->status_revisi != 0){ ?>
                          <button class="btn btn-warning btn-sm">Revisi</button>
                          <br>
                          <a  style="color:blue" href="javascript:;"
                          data-detail_revisi="<?=$data->detail_revisi;?>"
                          data-file_revisi="file/<?=$data->file_revisi;?>"
                          data-nama_kegiatan="<?=$data->nama_kegiatan;?>"
                          data-toggle="modal" data-target="#modal_detail_revisi" >
                           <b><u>Detail Revisi</u></b>
                          </a>
                          <?php
                        }
                           ?>
                        </td>
                        <td>
                          <?php
                           if($data->status_kegiatan == 1){
                           ?>
                           <b>-</b>
                           <?php
                         }else if($data->status_kegiatan == 0){
                           ?>
                           <a  href="javascript:;"
                           data-dana_pengajuan="<?=rupiah($data->dana_pengajuan);?>"
                           data-id_kegiatan="<?=$data->id_kegiatan;?>"
                           data-nama_kegiatan="<?=$data->nama_kegiatan;?>"
                           data-periode="<?=$data->tgl_pengajuan;?>"
                           data-toggle="modal" data-target="#modal_acc" >
                           <button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="" >
                             approve
                           </button>
                           </a>

                           <a  href="javascript:;"
                           data-id_kegiatan="<?=$data->id_kegiatan;?>"
                           data-nama_kegiatan="<?=$data->nama_kegiatan;?>"
                           data-toggle="modal" data-target="#modal_revisi" >
                           <button type="button" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="" >
                            <i class="fa fa-clipboard"></i> &nbsp; revisi
                           </button>
                           </a>

                           <?php
                           }else{
                           ?>
                          <b>-</b>
                           <?php
                           }
                           ?>
                      </td>
                    </tr>
                  <?php
                  // $no++;
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
              <b >Dana TerACC</b>
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
        <!-- Nama Ormawa : <b id="nama_ormawa"></b><br>
        Penanggung Jawab : <b id="tanggung_jawab"></b><br>
        Periode : <b id="periode"></b>
        <br>
        <br>
        <b>Dana Pengajuan: </b><br><b style="background-color:blue;color:white;padding:3px" id="dana_pengajuan"></b><br>
        <b>Dana TerACC: </b><br><b style="background-color:green;color:white;padding:3px" id="dana_acc"></b>
        <hr>
        Status Kegiatan : <b id="status"></b> -->
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
