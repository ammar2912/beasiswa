<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-cascade narrower z-depth-1">
            <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
                  <a href="" class="white-text mx-3"><h3>Detail Foto Dokumentasi</h3></a>
            </div>
            <div class="card-body card-block">
              <?php echo form_open_multipart('HistoryPrestasi/tambah_foto_proses');?>
              <?php echo @$error;?>
              <input type="text" name="id_prestasi" value="<?=$id_prestasi;?>" hidden="1" required readonly="1">

              <?php if($status_prestasi != 1){?>

              <div class="col-md-12 col-xl-6">
                <div class="form-group animated flipIn">
                  <label for="exampleInputuname"> Tambah Foto Dokumentasi <small style="color:red"><b>*JPG/JPEG/PNG</b></small></label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><i class="ti ti-file"></i></span>
                    </div>
                    <input type="file" name="foto_prestasi" class="form-control" value="" required >
                  </div>
                </div>
              </div>

            <?php } ?>

              <div class="col-md-12 col-xl-12" >
                <?php if($status_prestasi != 1){?>
                <button type="submit" id="simpan_data" class="btn btn-primary simpan btn-sm pull-right">SIMPAN FOTO</button>
                  <?php } ?>
              <a href="<?=base_url('')?>HistoryPrestasi">
                <button type="button" class="btn btn-outline-secondary btn-sm" ><i class="fa fa-reply"></i> Kembali</button>
              </a>
              <br>
              <br>
            </div>

              <div class="col-md-12 col-xl-12">
                <b>Foto Dokumentasi : </b>
              </div>

              <div class="col-md-12 col-xl-12" style="text-align:center">
                <div class="row">
              <?php
              if($data_foto != null){
              foreach ($data_foto as $data) {  ?>
                <div class="col-md-4 col-xl-3" style="padding:10px;text-align:center">
                  <img src="<?=base_url('')?>file/<?php echo $data->foto;?>" width="200px" height="200px"><br>
                  <?php if($status_prestasi != 1){?>
                   <a href="<?=base_url('')?>HistoryPrestasi/delete_foto/<?=base64_encode($data->id);?>/<?=base64_encode($id_prestasi);?>">
                  <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                    <i class="fa fa-trash"></i>
                  </button>
                  </a>
                <?php } ?>
                </div>
              <?php }
              }else{
              echo "<div class='col-md-12 col-xl-12' style='padding:30px'>";
              echo "Belum Ada Foto Dokumentasi";
              echo "</div>";
              }
              ?>
              </div>
              </div>

              </div>
              <?php echo form_close(); ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
