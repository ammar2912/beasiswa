
<div class="row">
  <div class="col-12">
    <div class="card card-cascade narrower z-depth-1">
      <div class="view view-cascade gradient-card-header peach-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <div></div>
            <a href="" class="white-text mx-3">Input Master Penelitian</a>
        <div></div>
      </div>
      <div class="card-body">
        <?php echo form_open_multipart('Penelitian/insert');?>
        <?php $this->load->view($form) ?>
        <?php echo $this->Core->btn_input(); ?>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
