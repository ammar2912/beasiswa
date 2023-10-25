<div class="row">
    <div class="col-12">
        <div class="card card-cascade narrower z-depth-1">
            <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
                <div>
                    <!-- <button type="button" class="btn btn_hapus btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data"><i class="fas fa-trash-alt mt-0"></i></button>
              <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Jumlah Item Terpilih"><span id="jumlah_pilih">0</span></button> -->
                </div>
                <a href="" class="white-text mx-3">Daftar Approve Surat</a>
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
                                <th>Jenis </th>
                                <th>Subjek</th>
                                <th>Lampiran </th>
                                <th>Status Surat</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($approvesurat as $data) { ?>
                                <?php $id_check = $data->id_surat; ?>
                                <tr>
                                    <!-- <td><input type="checkbox" class="form-check-input id_checkbox" id="tableMaterialCheck<?php echo $id_check ?>" name="id[]" value="<?php echo $id_check ?>">
                          <label class="form-check-label" for="tableMaterialCheck<?php echo $id_check ?>"></label>
                        </td> -->
                                    <td><b><?php echo $no; ?>.</b></td>
                                    <td><?php echo $data->nama ?></td>
                                    <td><?php echo $data->surat_jenis ?></td>
                                    <td><b><?php echo $data->subjek ?></b></td>
                                    <td>
                                        <a data-toggle="modal" onclick="showuserdetail('<?= $data->id_surat; ?>')" href="#showing">
                                            <button class="btn btn-secondary btn-sm">
                                                Detail<i>
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <?php
                                        if ($data->status_surat == 1) {
                                        ?>
                                            <button class="btn btn-success btn-sm">Approve</button>
                                        <?php
                                        } else if ($data->status_surat == 0) {
                                        ?>
                                            <button class="btn btn-danger btn-sm">Pending</button>
                                        <?php
                                        } else {
                                        ?>
                                            -
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo format_indo($data->date) ?></td>
                                    <td>
                                        <?php if ($data->status_surat == 1) { ?>
                                            <b>-</b>
                                        <?php } else if ($data->status_surat == 0) { ?>
                                            <a href="javascript:;" data-id="<?= $id_check; ?>" data-toggle="modal" data-target="#modal_acc">
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="">
                                                    approve
                                                </button>
                                            </a>
                                            <a class="btn btn-warning btn-sm detailMahasiswa ml-2" data-toggle="tooltip" data-placement="top" title="Detail Data Mahasiswa" data-id="<?= $data->id_surat; ?>">
                                                <i class="fa fa-info"></i>
                                            </a>
                                        <?php
                                        } else {
                                        ?>
                                            <b>-</b>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="alert"><?php echo $this->Core->Hapus_disable(); ?></div>
<div id="modal"><?php echo $this->Core->Hapus_aktif(); ?></div>

<div class="modal fade" id="showing" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Detail Lampiran Surat</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="showing_lampiran" style="text-align:center">
                <div class="modal-data"></div>
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
                <h3 class="modal-title">Approve Surat</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="bodymodal_acc">
                <?php echo form_open_multipart('ApproveSurat/approvesurat'); ?>
                <div class="row">
                    <div class="col-12">
                        <input id="id" name="id_surat" required="1" type="hidden" class="form-control">
                        <b>Upload Surat : <small style="color:red">* FIle PDF</small></b><br>
                        <input id="file_surat" name="file_surat" required="1" type="file" value="" class="form-control">
                    </div>
                </div>
                <br>
                <div class="modal-footer">
                    <button class="btn btn-success btn-sm" type="submit">Approve Surat</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" id="close">Tutup</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detail_mahasiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Detail Data Mahasiswa</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="height: 80vh; overflow-y: auto">

              <table class="table table-striped">
                  <tr>
                      <td><b>Nama</b></td>
                      <td> : <b id="nama"></b></td>
                  </tr>
                  <tr>
                      <td><b>NIM</b></td>
                      <td> : <b id="nim"></b></td>
                  </tr>
                  <tr>
                      <td><b>Prodi</b></td>
                      <td> : <b id="prodi"></b></td>
                  </tr>
                  <tr>
                      <td><b>Jurusan</b></td>
                      <td> : <b id="jurusan"></b></td>
                  </tr>
                  <tr class="semester">
                      <td><b>Semster</b></td>
                      <td> : <b id="semester"></b></td>
                  </tr>
                  <tr class="ips">
                      <td><b>Indeks Prestasi Semester</b></td>
                      <td> : <b id="ips"></b></td>
                  </tr>
                  <tr class="jenis_kelamin">
                      <td><b>Jenis Kelamin</b></td>
                      <td> : <b id="jenis_kelamin"></b></td>
                  </tr>
                  <tr class="tempat_lahir">
                      <td><b>Tempat, Tanggal Lahir</b></td>
                      <td> : <b id="tempat_lahir"></b>, <b id="tanggal_lahir"></b></td>
                  </tr>
                  <tr class="nama_ayah">
                      <td><b>Nama Ayah</b></td>
                      <td>: <b id="nama_ayah"></b></td>
                  </tr>
                  <tr class="nama_ibu">
                      <td><b>Nama Ibu</b></td>
                      <td>: <b id="nama_ibu"></b></td>
                  </tr>
                  <tr class="pekerjaan_ayah">
                      <td><b>Pekerjaan Ayah</b></td>
                      <td> : <b id="pekerjaan_ayah"></b></td>
                  </tr>
                  <tr class="pekerjaan_ibu">
                      <td><b>Pekerjaan Ibu</b></td>
                      <td> : <b id="pekerjaan_ibu"></b></td>
                  </tr>
                  <tr class="penghasilan_ayah">
                      <td><b>Penghasilan Ayah</b></td>
                      <td> : <b id="penghasilan_ayah"></b></td>
                  </tr>
                  <tr class="penghasilan_ibu">
                      <td><b>Penghasilan Ibu</b></td>
                      <td> : <b id="penghasilan_ibu"></b></td>
                  </tr>
                  <tr class="status_ayah">
                      <td><b>Status Ayah</b></td>
                      <td>: <b id="status_ayah"></b></td>
                  </tr>
                  <tr class="status_ibu">
                      <td><b>Status Ibu</b></td>
                      <td> : <b id="status_ibu"></b></td>
                  </tr>
                  <tr class="tanggungan_anak">
                      <td><b>Tanggungan Anak</b></td>
                      <td> : <b id="tanggungan_anak"> Anak</b></td>
                  </tr>
              </table>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" id="close">Tutup</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('#modal_acc').on('show.bs.modal', function(event) {
            var div = $(event.relatedTarget);
            var modal = $(this);

            modal.find('#id').attr("value", div.data('id'));
        });
    });

    $(document).ready(function() {

      function convertupiah(angka){
         var reverse = angka.toString().split('').reverse().join(''),
         ribuan = reverse.match(/\d{1,3}/g);
         ribuan = ribuan.join('.').split('').reverse().join('');
         return 'Rp. ' + ribuan;
       }

       function convertDateDBtoIndo(string) {
        	bulanIndo = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September' , 'Oktober', 'November', 'Desember'];

            tanggal = string.split("-")[2];
            bulan = string.split("-")[1];
            tahun = string.split("-")[0];

            return tanggal + " " + bulanIndo[Math.abs(bulan)] + " " + tahun;
        }

        function data_modal(data){
            $("#detail_mahasiswa").modal('show');
            $("#nama").html(data.nama);
            $("#nim").html(data.nim);
            $("#prodi").html(data.prodi);
            $("#jurusan").html(data.jurusan);
            $("#semester").html(data.semester);
            $("#ips").html(data.ips);
            if (data.jenis_kelamin == 1) {
              $("#jenis_kelamin").html('Laki - Laki');
            } else {
              $("#jenis_kelamin").html('Perempuan');
            }
            $("#tempat_lahir").html(data.tempat_lahir);
            $("#tanggal_lahir").html(convertDateDBtoIndo(data.tanggal_lahir));
            $("#nama_ayah").html(data.nama_ayah);
            $("#nama_ibu").html(data.nama_ibu);
            $("#pekerjaan_ayah").html(data.pekerjaan_ayah);
            $("#pekerjaan_ibu").html(data.pekerjaan_ibu);
            $("#penghasilan_ayah").html(convertupiah(data.penghasilan_ayah));
            $("#penghasilan_ibu").html(convertupiah(data.penghasilan_ibu));
            if (data.status_ayah == 1) {
              $("#status_ayah").html('Hidup');
            } else {
              $("#status_ayah").html('Meninggal');
            }
            if (data.status_ibu == 1) {
              $("#status_ibu").html('Hidup');
            } else {
              $("#status_ibu").html('Meninggal');
            }

            $("#tanggungan_anak").html(data.tanggungan_anak + ' Anak');
        }

        function remoClas(){
          $(".semester").removeClass('d-none');
          $(".ips").removeClass('d-none');
          $(".jenis_kelamin").removeClass('d-none');
          $(".tempat_lahir").removeClass('d-none');
          $(".nama_ayah").removeClass('d-none');
          $(".nama_ibu").removeClass('d-none');
          $(".pekerjaan_ayah").removeClass('d-none');
          $(".pekerjaan_ibu").removeClass('d-none');
          $(".penghasilan_ayah").removeClass('d-none');
          $(".penghasilan_ibu").removeClass('d-none');
          $(".status_ayah").removeClass('d-none');
          $(".status_ibu").removeClass('d-none');
        }

        $('.detailMahasiswa').on('click', function() {
            const id = $(this).attr("data-id");
            // console.log(id);
            $.ajax({
                type: "post",
                url: "<?= site_url(''); ?>ApproveSurat/detail_mahasiswa",
                data: "id=" + id,
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    if (data.j_surat == 1) {
                       data_modal(data);
                       remoClas();
                       $(".tanggungan_anak").addClass('d-none');

                    } else if (data.j_surat == 2) {
                      data_modal(data);
                      remoClas();
                      $(".tanggungan_anak").removeClass('d-none');
                    } else {
                      data_modal(data);
                      $(".semester").addClass('d-none');
                      $(".ips").addClass('d-none');
                      $(".jenis_kelamin").addClass('d-none');
                      $(".tempat_lahir").addClass('d-none');
                      $(".nama_ayah").addClass('d-none');
                      $(".nama_ibu").addClass('d-none');
                      $(".pekerjaan_ayah").addClass('d-none');
                      $(".pekerjaan_ibu").addClass('d-none');
                      $(".penghasilan_ayah").addClass('d-none');
                      $(".penghasilan_ibu").addClass('d-none');
                      $(".status_ayah").addClass('d-none');
                      $(".status_ibu").addClass('d-none');
                      $(".tanggungan_anak").addClass('d-none');
                    }
                }
            });

        });
    });

    function showuserdetail(id) {
        $.ajax({
            type: "post",
            url: "<?= site_url(''); ?>ApproveSurat/detail_lampiran",
            data: "id=" + id,
            dataType: "html",
            success: function(response) {
                $('#showing_lampiran').empty();
                $('#showing_lampiran').append(response);
            }
        });
    }
</script>

<?php

function format_indo($date)
{
    date_default_timezone_set('Asia/Jakarta');
    // array hari dan bulan
    $Hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
    $Bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    // pemisahan tahun, bulan, hari, dan waktu
    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl = substr($date, 8, 2);
    $hari = date("w", strtotime($date));
    $result = $Hari[$hari] . ", " . $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun;

    return $result;
}
?>
