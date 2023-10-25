
<?php echo form_open('Penelitian/delete');

?>


<div class="row">
  <div class="col-12">
    <div class="card card-cascade narrower z-depth-1">
      <div class="view view-cascade gradient-card-header aqua-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <div>
              <!-- <button type="button" class="btn btn_hapus btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data"><i class="fas fa-trash-alt mt-0"></i></button>
              <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Jumlah Item Terpilih"><span id="jumlah_pilih">0</span></button> -->
            </div>
            <a href="" class="white-text mx-3">DATA MASTER PENELITIAN</a>
            <div>
              <!-- <?php if ($_SESSION['jabatan'] == "dosen" && $this->Core->cekJadwal()): ?>
                <a href="<?php base_url(); ?>Penelitian/input" class="float-right">
                  <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tambah Data Baru"><i class="fas fa-pencil-alt mt-0"></i></button>
                </a>
              <?php endif; ?> -->
            </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="myTable" class="table table-bordered table-hover table-striped DataTable">
                  <thead>
                      <tr>
                        <th width="5%">#</label>
                        </th>
                          <th>NIK/NIP</th>
                          <th>Nama Dosen Ketua</th>
                          <th width="25%">Judul Proposal</th>
                          <th>Program</th>
                          <th>Lama Pelaksanaan</th>
                          <th>Tahun Pelaksanaan</th>
                          <th>Proposal</th>
                          <th width="%3">Laporan</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php if (sizeof($penelitianapi) > 0) {
                      $no = 1;
                     foreach ($penelitianapi as $value):
                       $id_check = 1;
                       if ($value->program == "PNBP") {
                         $id_check = "P".$value->id_proposal;
                       }elseif ($value->program == "MANDIRI") {
                         $id_check = "M".$value->id_proposal;
                       }?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $value->nip_ketua ?></td>
                        <td><?php echo $value->nama_ketua ?></td>
                        <td><?php echo $value->judul ?></td>
                        <td><?php echo $value->program ?></td>
                        <td><?php echo $value->tahun_pelaksanaan ?></td>
                        <td><?php echo "Dilaksanakan Selama ".(date("Y", strtotime($value->tanggal_sampai)) - date("Y", strtotime($value->tanggal_awal)))." Tahun Dari ".date("d-m-Y", strtotime($value->tanggal_awal))." s/d ".date("d-m-Y", strtotime($value->tanggal_sampai))?></td>
                        <td>Tidak Ada File</td>
                        <td>
                          <a href="<?php echo base_url().'LaporanKemajuanPenelitian/laporan/'.$id_check; ?>">
                          <button type="button" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="right" title="" data-original-title="Laporan Kemajuan">
                            <i class="fa fa-edit"></i> Laporan Kemajuan
                          </button>
                          </a>
                          <?php if ($this->ModelPenelitian->get_laporan_akhir($id_check)->num_rows() > 0): ?>
                            <?php else: ?>
                              <?php if ($_SESSION['jabatan'] == 'dosen' && $this->Core->cekJadwal()): ?>
                                <a href="<?php echo base_url().'LaporanAkhirPenelitian/input/'.$id_check; ?>">
                                  <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="right" title="" data-original-title="Tambah Laporan Akhir">
                                    <i class="fa fa-plus"></i> Laporan Akhir
                                  </button>
                                </a>
                            <?php endif; ?>
                          <?php endif; ?>
                        </td>
                      </tr>
                    <?php endforeach; }?>
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
