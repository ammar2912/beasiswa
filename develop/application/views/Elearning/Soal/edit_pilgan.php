<div class="row">
  <div class="col-12">
    <div class="card card-cascade narrower z-depth-1">
      <div class="view view-cascade gradient-card-header aqua-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <div>
        </div>
        <h3 class="white-text mx-3">TAMBAH SOAL PILIHAN GANDA</h3>
        <div>
        </div>
      </div>

                          <div class="card-body">
                            <form id="postForm" action="<?php echo base_url() ?>Soal/update_pilihan_ganda" method="POST" enctype="multipart/form-data" onsubmit="return postForm()">
                              <input type="hidden" name="idpilgan" value="<?php echo $pilgan["idpilihan_ganda"] ?>">
                              <?php $this->load->view($form)?>
                            </form>
                          </div>

    </div>
  </div>
</div>
