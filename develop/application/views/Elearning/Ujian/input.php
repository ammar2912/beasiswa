<div class="row">
  <div class="col-12">
    <div class="card card-cascade narrower z-depth-1">
      <div class="view view-cascade gradient-card-header aqua-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <div>
        </div>
        <h3 class="white-text mx-3">TAMBAH KELAS E - LEARNING</h3>
        <div>
        </div>
      </div>

                          <div class="card-body">
                            <form id="postForm" action="<?php echo base_url() ?>Ujian/insert_ujian" method="POST" enctype="multipart/form-data" onsubmit="return postForm()">
                              <?php $this->load->view($form)?>
                            </form>
                          </div>

    </div>
  </div>
</div>
