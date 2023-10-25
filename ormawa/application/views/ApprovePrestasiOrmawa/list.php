
<div class="row">
  <div class="col-12">
    <div class="card card-cascade narrower z-depth-1">
      <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <div>
              <!-- <button type="button" class="btn btn_hapus btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data"><i class="fas fa-trash-alt mt-0"></i></button>
              <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Jumlah Item Terpilih"><span id="jumlah_pilih">0</span></button> -->
            </div>
            <a href="" class="white-text mx-3">Daftar Approve Prestasi Ormawa</a>
            <div>
              <!-- <a href="<?php base_url(); ?>ApprovePrestasi/input" class="float-right">
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
                      <th>Mahasiswa</th>
                      <th>Kegiatan</th>
                      <th>Detail </th>
                      <th>Sertifikat</th>
                      <th>Status </th>
                      <!-- <th>Tanggal </th> -->
                      <th width="10%">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($ormawaass as $data) {?>
                    <?php
                    $id_check = $data->id_prestasi;
                    $status_prestasi = '';
                    $kategori = '';

                    if($data->status_prestasi){
                      $status_prestasi = 'Diapproval';
                    }else{
                      $status_prestasi = 'Pending';
                    }

                    if($data->kategori == 1){
                      $kategori = 'Solo / Individu';
                    }else{
                      $kategori = 'Berkelompok';
                    }

                    ?>
                    <tr>
                        <!-- <td><input type="checkbox" class="form-check-input id_checkbox" id="tableMaterialCheck<?php echo $id_check ?>" name="id[]" value="<?php echo $id_check ?>">
                          <label class="form-check-label" for="tableMaterialCheck<?php echo $id_check ?>"></label>
                        </td> -->
                        <td><b><?php echo $no;?></b></td>
                        <td>
                          <?php echo $data->nama_mahasiswa?>
                          <br>
                          <b><?php echo $data->nim?></b>
                        </td>
                        <td><?php echo $data->nama_kegiatan?></td>
                        <td>
                          <a href="javascript:;"
                          data-nama_mahasiswa="<?=$data->nama_mahasiswa;?>"
                          data-nama_prestasi="<?=$data->nama_kegiatan;?>"
                          data-kategori="<?=$kategori;?>"
                          data-tanggal_kegiatan="<?=tanggal_indonesia($data->tanggal_kegiatan);?>"
                          data-prestasi="<?=$data->prestasi;?>"
                          data-lingkup_prestasi="<?=$data->lingkup_prestasi;?>"
                          data-penyelenggara="<?=$data->penyelenggara;?>"
                          data-status_prestasi="<?=$status_prestasi;?>"
                          data-toggle="modal" data-target="#modal_detailprestasi">
                          <button class="btn btn-secondary btn-sm">Detail</button>
                        </td>
                        <td><a href="<?=base_url('');?>file/<?=$data->lampiran;?>" target="_blank"><button class="btn btn-info btn-sm">Download</button></a></td>
                        <td>
                        <?php
                         if($data->status_prestasi == 1){
                         ?>
                         <button class="btn btn-success btn-sm">Approve</button>
                         <?php
                         } else{
                         ?>
                         <button class="btn btn-danger btn-sm">Pending</button>
                         <?php
                         }
                         ?>
                        </td>
                        <!-- <td><b>Tgl. <?php echo tanggal_indonesia($data->tanggal_kegiatan)?></b></td> -->
                        <td>
                          <?php
                           if($data->status_prestasi == 1){
                           ?>
                          -
                           <?php
                           } else{
                           ?>
                           <a href="<?php base_url()?>ApprovePrestasi/approveprestasi/<?php echo base64_encode($id_check);?>">
                           <button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="" >
                             Approve
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

<div class="modal fade" id="modal_detailprestasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="nama_kegiatan"></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="bodymodal_detailprestasi">
        <table class="table table-sm">
          <tr>
            <td>
              <b>Nama Mahasiswa</b>
           </td>
             <td>
              : <b id="nama_mahasiswa"></b>
            </td>
          </tr>
          <tr>
            <td>
              <b>Kategori Kegiatan</b>
           </td>
             <td>
               : <b id="kategori"></b>
            </td>
          </tr>
          <tr>
            <td>
              <b>Tanggal Kegiatan</b>
           </td>
             <td>
               : <b id="tanggal_kegiatan"></b>
            </td>
          </tr>
          <tr>
            <td>
              <b>Prestasi</b>
           </td>
             <td>
              : <b id="prestasi"></b>
            </td>
          </tr>
          <tr>
            <td>
              <b>Lingkup Prestasi</b>
           </td>
             <td>
               : <b id="lingkup_prestasi"></b>
            </td>
        </tr>
        <tr>
          <td>
            <b>penyelenggara</b>
         </td>
           <td>
            : <b id="penyelenggara"></b>
          </td>
        </tr>
        <tr>
          <td>
            <b>Status Kegiatan</b>
         </td>
           <td>
             : <b id="status_prestasi"></b>
          </td>
      </tr>
        </table>
        <!-- Nama Mahasiswa : <b id="nama_mahasiswa"></b><br>
        Kategori Kegiatan : <b id="kategori"></b><br>
        Tanggal Kegiatan : <b id="tanggal_kegiatan"></b><br>
        Prestasi : <b id="prestasi"></b><br>
        Lingkup Prestasi : <b id="lingkup_prestasi"></b><br>
        Penyelenggara : <b id="penyelenggara"></b>
        <br>
        <br>
        <hr>
        Status Kegiatan : <b id="status_prestasi"></b> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" id="close">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
  $('#modal_detailprestasi').on('show.bs.modal', function (event) {
    var div = $(event.relatedTarget);
    var modal = $(this);

    modal.find('#nama_mahasiswa').html(div.data('nama_mahasiswa'));
    modal.find('#nama_kegiatan').html(div.data('nama_prestasi'));
    modal.find('#kategori').html(div.data('kategori'));
    modal.find('#tanggal_kegiatan').html(div.data('tanggal_kegiatan'));
    modal.find('#prestasi').html(div.data('prestasi'));
    modal.find('#lingkup_prestasi').html(div.data('lingkup_prestasi'));
    modal.find('#penyelenggara').html(div.data('penyelenggara'));
    modal.find('#status_prestasi').html(div.data('status_prestasi'));

  });
});
</script>

<?php
    function tanggal_indonesia($tanggal){
        $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
        );

        $pecahkan = explode('-', $tanggal);
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
?>
