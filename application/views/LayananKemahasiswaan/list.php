<div class="row">
  <div class="col-12">
    <div class="card card-cascade narrower z-depth-1">
      <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <div>
        </div>
        <h3 class="white-text mx-3">Layanan Kemahasiswaan</h3>
        <div>
          <a href="<?php base_url(); ?>input" class="float-right">
          <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" data-original-title="Tambah Data Baru"><i class="fas fa-plus"></i></i></button>
        </a>
        </div>
      </div>

      <div class="card-body">
        <div class="row">
                  <div class="col-lg-12">
                      <div class="card">
                          <div class="card-body">
                            <div class="table-responsive">
                            <table id="example" class="DataTable table color-table table-hover table-striped ">
                              <thead>
                                  <tr>
                                      <th width="10%">No</th>
                                      <th>Nama Layanan</th>
                                      <th>Dokumen</th>
                                      <th>Opsi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                $no = 1;
                                foreach ($data as $value): ?>
                                  <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $value->nama_layanan ?></td>
                                    <td><a href="<?php echo base_url().$value->dokumen ?>" class="btn btn-sm btn-info">Download Dokumen</a></td>
                                    <td>
                                      <a href="<?php echo base_url()?>LayananKemahasiswaan/edit/<?php echo $value->idlayanan_kemahasiswaan;?>" class="btn-floating btn-sm btn-warning" data-toggle="tooltip" data-placement="top" data-original-title="EDIT"><i class="fas fa-pen"></i></a>
                                      <a href="<?php echo base_url()?>LayananKemahasiswaan/hapus/<?php echo $value->idlayanan_kemahasiswaan;?>" class="btn-floating btn-sm btn-danger"  data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash"></i></a>
                                    </td>
                                  </tr>
                                  <?php $no++; endforeach; ?>
                                      </tbody>

                                  </table>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>

      </div>
    </div>
  </div>
</div>
