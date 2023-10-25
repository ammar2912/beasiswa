<div class="row">
  <div class="col-12">
    <div class="card card-cascade narrower z-depth-1">
      <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <div>
        </div>
        <!-- ini Judul -->
        <h3 class="white-text mx-3">Form Update Visi dan Misi</h3>
        <div>

        </div>
      </div>
      <div class="card-body">
        <?php echo form_open_multipart('Profil/update_visimisi');?>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Visi dan Misi :</label>
              <textarea name="visimisi" id="ckeditor" rows="8" cols="80"><?php echo @$data["visimisi"] ?></textarea>
            </div>
          </div>
        </div>
        <div class="form-actions" >
          <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Simpan</button>
          <button type="button" class="btn btn-light waves-effect btn-sm kembali" data-dismiss="modal">Kembali</button>
        </div>

        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
