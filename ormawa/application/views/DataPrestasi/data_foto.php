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
              <div class="col-md-12 col-xl-12" >

              <a href="<?=base_url('')?>DataPrestasi">
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
                   <a href="<?=base_url('')?>DataPrestasi/download_gambar/<?=$data->foto;?>">
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Download">
                    <i class="fa fa-download"></i> Download
                  </button>
                  </a>
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

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
