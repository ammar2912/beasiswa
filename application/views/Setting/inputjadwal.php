
<div class="row">
  <div class="col-12">
    <div class="card card-cascade narrower z-depth-1">
      <div class="view view-cascade gradient-card-header peach-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <div></div>
            <a href="" class="white-text mx-3">Jadwal </a>
        <div></div>
      </div>
      <div class="card-body">
        <?php echo form_open_multipart('Setting/settingjadwal');?>
        <?php $this->load->view($form) ?>
        <?php
        $btn = "<div class=\"card-footer\" style='    display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        /* flex-wrap: wrap; */'>
        <div class=\"col col-sm-12 com-md-12\">
        <button type=\"button\" class=\"btn btn-outline-secondary btn-sm pull-left\" onclick=\"window.history.back()\"><i class=\"fa fa-reply\"></i> Kembali</button>";
        $btn .= "<button type=\"submit\" class=\"btn btn-primary btn-sm pull-right\"><i class=\"fa fa-save\"></i> SIMPAN</button>";
        echo $btn;
        ?>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
