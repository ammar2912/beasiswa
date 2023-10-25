
<div class="row">
  <div class="col-12">
    <div class="card card-cascade narrower z-depth-1">
      <div class="view view-cascade gradient-card-header aqua-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <div></div>
            <a href="" class="white-text mx-3">FORM DETAIL LAPORAN KEMAJUAN</a>
        <div></div>
      </div>
      <div class="card-body">
        <?php echo form_open_multipart('LaporanKemajuanPenelitian/update');?>
        <h4 class="card-title">Laporan Kemajuan</h4>
        <h6 class="card-subtitle">Penelitian Terapan | Tahun Pelaksanaan <?php echo $penelitian->tahun_pelaksanaan ?>
          <br>
          Tahun Ke <?php echo date("Y")-date("Y", strtotime($penelitian->tanggal_awal)) ?> dari <?php echo date("Y", strtotime($penelitian->tanggal_sampai))-date("Y", strtotime($penelitian->tanggal_awal))  ?> Tahun
        </h6>
        <label class=" card-subtitle cyan-text">Judul Penelitian : <?php echo $penelitian->judul ?></label>


              <input type="hidden" name="idlaporan" value="<?php echo @$lapkemajuan['idlaporan_kemajuan'] ?>">
              <input type="hidden" name="idluaran" value="<?php echo @$luaran['idluaran_wajib']?>">

              <div class="form-group shadow-textarea col-md-12" >
                <label for="form107"><i class="fas fa-pencil-alt prefix grey-text"></i>Ringkasan</label>
                <textarea class="form-control " rows="5" placeholder="ringkasan edit ... " name="ringkasan" id="ringkasan"><?php echo @$lapkemajuan['ringkasan']; ?></textarea>
             </div>

            <div class="form-group shadow-textarea col-md-12" >
              <label for="form107"><i class="fas fa-pencil-alt prefix grey-text"></i>Keyword</label>
              <textarea class="form-control "  rows="2" placeholder="kata kunci 1; Kata Kunci 2; dst" name="keyword" id="keyword"><?php echo @$lapkemajuan['keyword']; ?></textarea>
            </div>

            <div class="form-group shadow-textarea col-md-12" >
              <label for="tgl_kemajuan"><i class="fas fa-pencil-alt prefix grey-text"></i>Tanggal Upload Kemajuan:</label>
              <input type="date" name="tgl_kemajuan" id="tgl_kemajuan" value="<?php echo @$lapkemajuan['tgl_kemajuan']; ?>" class="form-control">
            </div>

            <h4 class="card-title">Substansi Laporan</h4>
            <h6 class="card-subtitle">Unggah Dokumen Substansi Laporan Kemajuan dalam format PDF sesuai dengan template yang disediakan</h6>

            <div class="col-lg-6 col-md-6" style="top: 5px;">
              <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Unggah Dokumen </h4>
                    <label class="control-label"><a href="<?php echo base_url().@$lapkemajuan['file_lk'] ?>"><i class="fa fa-download"></i> Download</a> </label>
                        <input type="file" id="file_lk" class="dropify" name="file_lk" data-max-file-size="10M" data-default-file="<?php echo base_url(@$lapkemajuan['file_lk']) ?>"/>
                  </div>
                  </div>
            </div>
          <br>
            <hr>
            <h4 for="form107">TAMBAH LUARAN WAJIB</h4>

            <div class="luaran_wajib">
              <div class="row">
                <div class="col-md-6">
                      <div class="form-group" style="margin-bottom: 0px;margin-top: 35px;">
                          <label class="control-label">Status Dokumen </label>
                          <select name="status_dokumen" id="status_dokumen" class="mdb-select colorful-select dropdown-info sm-form">
                            <option value="1" <?php echo $if = (@$luaran['status_dokumen'] == '1') ? "selected" : "" ; ?>>Tersedia</option>
                            <option value="0" <?php echo $if = (@$luaran['status_dokumen'] == '0') ? "selected" : "" ; ?>>Tidak Tersedia</option>
                          </select>
                        </div>
                      </div>
                <div class="col-md-6">
                <label class="m-t-40">Nama Produk</label>
                    <div class="input-group clockpicker " data-placement="bottom" data-align="top" data-autoclose="true">
                    <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                    </div>
                    <input type="text" name="nama" id="nama" value="<?php echo @$luaran['nama']; ?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                <label class="m-t-40">Tgl.Pengujian Produk</label>
                    <div class="input-group clockpicker " data-placement="bottom" data-align="top" data-autoclose="true">
                    <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" name="tanggal" id="tanggal" value="<?php echo @$luaran['tgl_pengujian']; ?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                <label class="m-t-40">Link Video Dokumentasi Produk</label>
                    <div class="input-group clockpicker " data-placement="bottom" data-align="top" data-autoclose="true">
                    <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-video"></i></span>
                    </div>
                    <input type="text" name="link_video" id="link_video" value="<?php echo @$luaran['link_video']; ?>" class="form-control">
                    </div>
                </div>
                </div>

                <br><br>
                <h4 class="card-title">Dokumen Hasil Uji Coba Produk</h4>
                <h6 class="card-subtitle">Ukuran File Maksimal 2MB dengan Format PDF</h6>

                <div class="row">
                <div class="col-lg-6 col-md-6" style="top: 25px;">
                  <div class="card">
                      <div class="card-body">
                        <h6 class="card-title">Unggah Dokumen Deskripsi dan Spesifikasi Produk</h6>
                        <label class="control-label"><a href="<?php echo base_url().@$luaran['file_dok_deskripsi'] ?>"><i class="fa fa-download"></i> Download</a> </label>
                            <input type="file" id="file_dok_deskripsi" class="dropify" name="file_dok_deskripsi" data-max-file-size="1M" data-default-file="<?php echo base_url(@$luaran['file_dok_deskripsi']) ?>"/>
                      </div>
                      </div>
                </div>
                <div class="col-lg-6 col-md-6" style="top: 25px;">
                  <div class="card">
                      <div class="card-body">
                        <h6 class="card-title">Unggah Dokumen Hasil Uji COba produk</h6>
                        <label class="control-label"><a href="<?php echo base_url().@$luaran['file_dok_ujicoba'] ?>"><i class="fa fa-download"></i> Download</a> </label>
                            <input type="file" id="file_dok_ujicoba" class="dropify" name="file_dok_ujicoba" data-max-file-size="1M" data-default-file="<?php echo base_url(@$luaran['file_dok_ujicoba']) ?>"/>
                            <input type="hidden" name="cekfotoktp" value="">
                      </div>
                      </div>
                </div>
                <div class="col-lg-6 col-md-6" style="top: 25px;">
                  <div class="card">
                      <div class="card-body">
                        <h6 class="card-title">Unggah Dokumentasi Foto Hasil Pengujian Produk</h6>
                        <label class="control-label"><a href="<?php echo base_url().@$luaran['file_dok_ujiproduk'] ?>"><i class="fa fa-download"></i> Download</a> </label>
                            <input type="file" id="file_dok_ujiproduk" class="dropify" name="file_dok_ujiproduk" data-max-file-size="1M" data-default-file="<?php echo base_url(@$luaran['file_dok_ujiproduk']) ?>"/>
                            <input type="hidden" name="cekfotoktp" value="">
                      </div>
                      </div>
                </div>
              </div>
              </div>


            <script type="text/javascript">
            // $( document ).ready(function() {
            //   cek_luaran();
            // });
            // function cek_luaran() {
            //   if ($('#check_luaran').prop('checked')) {
            //     $('.luaran_wajib').show();
            //   }else {
            //     $('.luaran_wajib').hide();
            //   }
            // }
            </script>

        <?php echo $this->Core->btn_input(); ?>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
