

<div class="row">
  <div class="col-12">
    <div class="card card-cascade narrower z-depth-1">
      <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <div>
              <!-- <button type="button" class="btn btn_hapus btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data"><i class="fas fa-trash-alt mt-0"></i></button>
              <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Jumlah Item Terpilih"><span id="jumlah_pilih">0</span></button> -->
            </div>
            <a href="" class="white-text mx-3">Daftar Proker Ormawa</a>
            <div>
              <!-- <a href="<?php base_url(); ?>Prodi/input" class="float-right">
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tambah Data Baru"><i class="fas fa-plus mt-0"></i></button>
              </a> -->
            </div>
      </div>
      <div class="card-body">
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
                      <th>Periode</th>
                      <th>Status Proker</th>
                      <!-- <th>Tanggal diubah</th> -->
                      <!-- <th width="10%">Opsi</th> -->
                    </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($prokerormawapimpinan as $data) {?>
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
                        <td><a target="_blank" href="<?=base_url('');?>file/<?=$data->lampiran;?>"><button class="btn btn-info btn-sm">Download</button></a></td>
                        <td><b>Thn.<?php echo $data->periode?></b></td>
                        <td>
                          <?php
                           if($data->status_proker == 1){
                           ?>
                           <button class="btn btn-success btn-sm">Diapproval</button>
                           <?php
                           } else{
                           ?>
                           <button class="btn btn-danger btn-sm">Belum Approval</button>
                           <?php
                           }
                           ?>
                        </td>
                        <!-- <td><a href="<?php base_url()?>ProkerOrmawa/edit/<?php echo base64_encode($id_check);?>">
                          <button type="button" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                            <i class="fa fa-edit"></i>
                          </button>
                        </a></td> -->
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
    modal.find('#status').html(div.data('status'));

  });
});
</script>
