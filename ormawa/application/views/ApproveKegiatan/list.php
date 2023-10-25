<div class="row">
  <div class="col-12">
    <div class="card card-cascade narrower z-depth-1">
      <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <div>
              <!-- <button type="button" class="btn btn_hapus btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data"><i class="fas fa-trash-alt mt-0"></i></button>
              <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Jumlah Item Terpilih"><span id="jumlah_pilih">0</span></button> -->
            </div>
            <a href="" class="white-text mx-3">Daftar Approve Kegiatan</a>
            <div>
              <!-- <a href="<?php base_url(); ?>ApprovePrestasi/input" class="float-right">
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tambah Data Baru"><i class="fas fa-plus mt-0"></i></button>
              </a> -->
            </div>
      </div>
      <div class="card-body">
          <b><i class="fa fa-square" style="color:red"></i> : Status Kegiatan Pending (Belum diberi Aksi apapun).</b><br>
          <b><i class="fa fa-square" style="color:orange"></i> : Status Kegiatan Revisi (Belum di Revisi oleh pihak Ormawa).</b><br>
          <b><i class="fa fa-square" style="color:blue"></i> : Status Kegiatan Sudah Revisi (Sudah di Revisi oleh pihak Ormawa).</b>
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
                  <!-- <th>Periode</th> -->
                  <th style="text-align:center">Status </th>
                  <th width="10%">Opsi</th>
                </tr>
            </thead>
            <tbody>
              <?php $no=0; foreach ($approvekegiatan as $data) {?>
                <?php
                $id_check = $data->id_kegiatan;
                $status_kegiatan = '';
                if($data->status_kegiatan ==  1){
                $status_kegiatan = 'Diapproval';
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
                    <td>
                      <?php
                       if($data->status_kegiatan == 0 && $data->status_revisi == 1){
                        ?>
                        <i class="fa fa-square" style="color:orange"></i> <?php echo $data->nama_ormawa?>
                        <?php
                      }elseif ($data->status_kegiatan == 0 && $data->status_revisi == 2) {
                        ?>
                        <i class="fa fa-square" style="color:blue"></i> <?php echo $data->nama_ormawa?>
                        <?php
                      }else if($data->status_kegiatan == 0 && $data->status_revisi == 0){
                        ?>
                        <i class="fa fa-square" style="color:red"></i> <?php echo $data->nama_ormawa?>
                        <?php
                      }
                       ?>
                    </td>
                    <td><?php echo $data->nama_kegiatan?> , <b> Proker : <?php if($data->nama_proker != ""){echo $data->nama_proker;}else{echo "Lainnya / Diluar Proker"; }?></b></td>
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
                    <td><a href="<?=base_url('');?>file/<?=$data->lampiran;?>"><button class="btn btn-info btn-sm">Download</button></a></td>
                    <!-- <td><b>Thn.<?php echo $data->periode?></b></td> -->
                    <td style="text-align:center">
                      <?php
                       if($data->status_kegiatan == 1){
                       ?>
                       <button class="btn btn-success btn-sm">Diapproval</button>
                       <?php
                     }else if($data->status_kegiatan == 0 && $data->status_revisi == 0){
                       ?>
                       <button class="btn btn-danger btn-sm">Pending</button>
                       <?php
                     }else if($data->status_kegiatan == 0 && $data->status_revisi != 0){
                      ?>
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
                       data-periode="<?=$data->periode;?>"
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
        <!-- Nama Ormawa : <br> -->
        <!-- Penanggung Jawab : <b id="tanggung_jawab"></b><br> -->
        <!-- Periode : <b id="periode"></b> -->
        <!-- <br> -->
        <!-- <br> -->
        <!-- <b>Dana Pengajuan: </b><br><br> -->
        <!-- <b>Dana TerACC: </b><br> -->
        <!-- <hr> -->
        <!-- Status Kegiatan : -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" id="close">Tutup</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_acc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="nama_kegiatan"></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="bodymodal_acc">
        <?php echo form_open('ApproveKegiatan/approvekegiatan');?>
        Periode : <b id="periode"></b>
        <br>
        <br>
        <div class="row">
          <div class="col-lg-6">
            <b>Dana Pengajuan : </b><br>
            <input id="id_kegiatan" name="id_kegiatan"  required="1" type="hidden" class="form-control">
            <input id="dana_pengajuan" readonly="1" required="1" name="dana_pengajuan" type="text" class="form-control">
          </div>
          <div class="col-lg-6">
            <b>Dana TerACC :</b><br>
            <input id="dana_acc" name="dana_acc" required="1" type="text" value="" class="form-control">
          </div>
        </div>
        <br>
      <div class="modal-footer">
        <button class="btn btn-success btn-sm" type="submit">Approve Kegiatan</button>
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" id="close">Tutup</button>
      </div>
      <?php echo form_close();?>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="modal_revisi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" >Form Revisi </h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="bodymodal_revisi">
        <h5> Kegiatan : <b id="nama_kegiatan"></b></h5>
        <br>
        <?php echo form_open_multipart('ApproveKegiatan/revisikegiatan');?>
        <div class="row">
          <div class="col-lg-12">
            <b>Detail Revisi : </b><br>
            <input id="id_kegiatan" name="id_kegiatan"  required="1" type="hidden" class="form-control">
            <textarea required="1" name="detail_revisi" class="form-control"></textarea>
          </div>
          <div class="col-lg-12">
            <b>Dokumen Revisi : <small style="color:red">* File Hanya PDF</small></b><br>
            <input name="file_revisi" required="1" type="file" value="" class="form-control">
          </div>
        </div>
        <br>
      <div class="modal-footer">
        <button class="btn btn-success btn-sm" type="submit">Kirim Revisi</button>
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" id="close">Tutup</button>
      </div>
      <?php echo form_close();?>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="modal_detail_revisi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" >Detail Revisi </h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="bodymodal_detail_revisi">
        <h5> Kegiatan : <b id="nama_kegiatan"></b></h5>
        <br>
        <div class="row">
          <div class="col-lg-12">
            <b>Detail Revisi : </b><br>
            <textarea id="detail_revisi" class="form-control" readonly></textarea>
          </div>
          <div class="col-lg-12">
            <b>Dokumen Revisi : </b><br>
            <a id="file_revisi" target="_blank" ><button class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Lihat Dokumen Revisi</button></a>
            <!-- <input name="file_revisi" required="1" type="file" value="" class="form-control"> -->
          </div>
        </div>
        <br>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" id="close">Tutup</button>
      </div>
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

$(document).ready(function() {
  $('#modal_acc').on('show.bs.modal', function (event) {
    var div = $(event.relatedTarget);
    var modal = $(this);

    modal.find('#nama_kegiatan').html(div.data('nama_kegiatan'));
    modal.find('#dana_pengajuan').attr("value",div.data('dana_pengajuan'));
    modal.find('#id_kegiatan').attr("value",div.data('id_kegiatan'));
    modal.find('#periode').html(div.data('periode'));

  });
});


$(document).ready(function() {
  $('#modal_revisi').on('show.bs.modal', function (event) {
    var div = $(event.relatedTarget);
    var modal = $(this);

    modal.find('#nama_kegiatan').html(div.data('nama_kegiatan'));
    modal.find('#id_kegiatan').attr("value",div.data('id_kegiatan'));

  });
});

$(document).ready(function() {
  $('#modal_detail_revisi').on('show.bs.modal', function (event) {
    var div = $(event.relatedTarget);
    var modal = $(this);

    modal.find('#nama_kegiatan').html(div.data('nama_kegiatan'));
    modal.find('#detail_revisi').html(div.data('detail_revisi'));
    modal.find('#file_revisi').attr("href",div.data('file_revisi'));

  });
});

</script>

<?php
function rupiah($angka){
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;

}
?>
