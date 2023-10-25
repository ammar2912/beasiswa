<div class="row">
  <div class="col-12">
    <div class="card card-cascade narrower z-depth-1">
      <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <div>
        </div>
        <h3 class="white-text mx-3">Input Riwayat Pendidikan</h3>
        <div>
          <a href="<?php base_url(); ?>Pegawai/input_riwayat_pendidikan" class="float-right">
          <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tambah Data Baru"><i class="fas fa-pencil-alt mt-0"></i></button>
        </a>
        </div>
      </div>

                          <div class="card-body">
                            <?php echo form_open_multipart('Pegawai/insert_riwayat_pendidikan');?>
                            <input type="text" name="pegawai_nik" value="<?php echo $this->uri->segment(3) ?>" hidden>
                              <?php $this->load->view($form)?>
                            <?php echo form_close(); ?>
                          </div>

    </div>
  </div>
</div>
