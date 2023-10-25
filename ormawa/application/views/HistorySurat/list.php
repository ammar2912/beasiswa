<div class="row">
    <div class="col-12">
        <div class="card card-cascade narrower z-depth-1">
            <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
                <div>
                    <!-- <button type="button" class="btn btn_hapus btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data"><i class="fas fa-trash-alt mt-0"></i></button>
              <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Jumlah Item Terpilih"><span id="jumlah_pilih">0</span></button> -->
                </div>
                <a href="" class="white-text mx-3">History Pengajuan Surat</a>
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
                                <th>Jenis Surat</th>
                                <th>Subjek</th>
                                <th>Lampiran </th>
                                <th>Status Surat</th>
                                <th>Tanggal </th>
                                <th>Surat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($historysurat as $data) { ?>
                                <?php $id_check = $data->id_surat; ?>
                                <tr>
                                    <!-- <td><input type="checkbox" class="form-check-input id_checkbox" id="tableMaterialCheck<?php echo $id_check ?>" name="id[]" value="<?php echo $id_check ?>">
                          <label class="form-check-label" for="tableMaterialCheck<?php echo $id_check ?>"></label>
                        </td> -->
                                    <td><b><?php echo $no; ?>.</b></td>
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
                                        <?php if ($data->status_surat == 1 && $data->file_surat != '') { ?>
                                            <a href="<?= base_url('') ?>HistorySurat/download_surat/<?= $data->file_surat; ?>">
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Download Surat">
                                                    <i class="fa fa-download"></i>
                                                </button>
                                            </a>
                                        <?php } else { ?>
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Download Surat Tidak Tersedia">
                                                <i class="fa fa-download"></i>
                                            </button>
                                        <?php } ?>
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

<script type="text/javascript">
    function showuserdetail(id) {
        $.ajax({
            type: "post",
            url: "<?= site_url(''); ?>HistorySurat/detail_lampiran",
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
