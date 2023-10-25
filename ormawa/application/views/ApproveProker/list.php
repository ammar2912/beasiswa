<div class="row">
  <div class="col-12">
    <div class="card card-cascade narrower z-depth-1">
      <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <div>
          <!-- <button type="button" class="btn btn_hapus btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data"><i class="fas fa-trash-alt mt-0"></i></button>
          <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Jumlah Item Terpilih"><span id="jumlah_pilih">0</span></button> -->
        </div>
        <a href="" class="white-text mx-3">Daftar Approve Proker</a>
        <div>
          <!-- <a href="<?php base_url(); ?>ApprovePrestasi/input" class="float-right">
          <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tambah Data Baru"><i class="fas fa-plus mt-0"></i></button>
        </a> -->
      </div>
    </div>
    <div class="card-body">
      <b><i class="fa fa-square" style="color:red"></i> : Status Proker Pending (Belum diberi Aksi apapun).</b><br>
      <b><i class="fa fa-square" style="color:orange"></i> : Status Proker Revisi (Belum di Revisi oleh pihak Ormawa).</b><br>
      <b><i class="fa fa-square" style="color:blue"></i> : Status Proker Sudah Revisi (Sudah di Revisi oleh pihak Ormawa).</b>
      <div class="table-responsive">
        <table id="myTable" class="table table-striped table-bordered ">
          <thead>
            <tr>
              <!-- <th width="10%"><input type="checkbox" class="form-check-input select-all" id="tableMaterialChec"> -->
              <!-- <label class="form-check-label" for="tableMaterialChec"></label> -->
              <!-- </th> -->
              <th>No.</th>
              <th>Ormawa</th>
              <th>Judul Proker</th>
              <!-- <th>Penanggung Jawab</th> -->
              <th>Uraian Proker</th>
              <th>Lampiran </th>
              <!-- <th>Periode</th> -->
              <th>Status Proker</th>
              <!-- <th>Tanggal diubah</th> -->
              <th width="10%">Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach ($approveproker as $data) {?>
              <?php
              $id_check = $data->id_proker;
              $status_proker = '';
              if($data->status_proker ==  1){
                $status_proker = 'Diapproval';
              }else {
                $status_proker = 'Pending';
              }
              ?>
              <tr>
                <!-- <td><input type="checkbox" class="form-check-input id_checkbox" id="tableMaterialCheck<?php echo $id_check ?>" name="id[]" value="<?php echo $id_check ?>">
                <label class="form-check-label" for="tableMaterialCheck<?php echo $id_check ?>"></label>
              </td> -->
              <td><b><?=$no++?></b></td>
              <td><?php echo $data->nama_ormawa?></td>
              <td><b><?php echo $data->nama_proker?></b></td>
              <!-- <td><?php echo $data->tanggung_jawab?></td> -->
              <td>
                <a href="javascript:;"
                data-nama_ormawa="<?=$data->nama_ormawa;?>"
                data-nama_proker="<?=$data->nama_proker;?>"
                data-tanggung_jawab="<?=$data->tanggung_jawab;?>"
                data-uraian="<?=$data->uraian;?>"
                data-periode="<?=$data->periode;?>"
                data-status="<?=$status_proker;?>"
                data-toggle="modal" data-target="#modal_detailproker">
                <button type="button" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="">
                  Detail
                </button>
              </a>
            </td>
            <td><a href="<?=base_url('');?>file/<?=$data->lampiran;?>" target="_blank"><button class="btn btn-info btn-sm">Download</button></a></td>
            <!-- <td><b>Thn.<?php echo $data->periode?></b></td> -->
            <td style="text-align:center">
              <?php
               if($data->status_proker == 1){
               ?>
               <button class="btn btn-success btn-sm">Approved</button>
               <?php
             }else if($data->status_proker == 0 && $data->status_revisi == 0){
               ?>
               <button class="btn btn-danger btn-sm">Pending</button>
               <?php
             }else if($data->status_proker == 0 && $data->status_revisi != 0){
              ?>
              <button class="btn btn-warning btn-sm">Revisi</button>
              <br>
              <a  style="color:blue" href="javascript:;"
              data-detail_revisi="<?=$data->detail_revisi;?>"
              data-file_revisi="file/<?=$data->file_revisi;?>"
              data-nama_proker="<?=$data->nama_proker;?>"
              data-toggle="modal" data-target="#modal_detail_revisi" >
               <b><u>Detail Revisi</u></b>
              </a>
              <?php
            }
               ?>
            </td>
            <td>
              <?php
              if($data->status_proker == 1){
                ?>
                <b>-</b>
                <?php
              } else{
                ?>
                <a href="<?php base_url()?>ApproveProker/approveproker/<?php echo base64_encode($id_check);?>">
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="" >
                    Approve Proker
                  </button>
                </a>
                <a  href="javascript:;"
                data-id_proker="<?=$data->id_proker;?>"
                data-nama_proker="<?=$data->nama_proker;?>"
                data-toggle="modal" data-target="#modal_revisi" >
                <button type="button" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="" >
                 <i class="fa fa-clipboard"></i> &nbsp; revisi
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

<div class="modal fade" id="modal_detailproker" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="nama_proker"></h3>
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
              <b>Uraian Proker</b>
            </td>
            <td>
              : <b id="uraian"></b>
            </td>
          </tr>
          <!-- <tr>
            <td>
              <b>Status proker</b>
            </td>
            <td>
              : <b id="status_prestasi"></b>
            </td>
          </tr> -->
        </table>
        <!-- Nama Ormawa : <b id="nama_ormawa"></b><br>
          Penanggung Jawab : <b id="tanggung_jawab"></b><br>
          Periode : <b id="periode"></b>
          <br>
          <br>
          Uraian Proker: <br><b><p id="uraian"></p></b>
          <hr>
          Status Proker : <b id="status"></b> -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" id="close">Tutup</button>
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
          <h5> Proker : <b id="nama_proker"></b></h5>
          <br>
          <?php echo form_open_multipart('ApproveProker/revisiproker');?>
          <div class="row">
            <div class="col-lg-12">
              <b>Detail Revisi : </b><br>
              <input id="id_proker" name="id_proker"  required="1" type="hidden" class="form-control">
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
          <h5> Proker : <b id="nama_proker"></b></h5>
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
      $('#modal_detailproker').on('show.bs.modal', function (event) {
        var div = $(event.relatedTarget);
        var modal = $(this);

        modal.find('#nama_proker').html(div.data('nama_proker'));
        modal.find('#nama_ormawa').html(div.data('nama_ormawa'));
        modal.find('#tanggung_jawab').html(div.data('tanggung_jawab'));
        modal.find('#periode').html(div.data('periode'));
        modal.find('#uraian').html(div.data('uraian'));
        // modal.find('#status').html(div.data('status'));
      });
    });


    $(document).ready(function() {
      $('#modal_revisi').on('show.bs.modal', function (event) {
        var div = $(event.relatedTarget);
        var modal = $(this);

        modal.find('#nama_proker').html(div.data('nama_proker'));
        modal.find('#id_proker').attr("value",div.data('id_proker'));
      });
    });

    $(document).ready(function() {
      $('#modal_detail_revisi').on('show.bs.modal', function (event) {
        var div = $(event.relatedTarget);
        var modal = $(this);
        modal.find('#nama_proker').html(div.data('nama_proker'));
        modal.find('#detail_revisi').html(div.data('detail_revisi'));
        modal.find('#file_revisi').attr("href",div.data('file_revisi'));

      });
    });

  </script>
