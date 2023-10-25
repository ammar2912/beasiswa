
  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row">

                  <div class="col-lg-12">
                    <h2>Informasi Tagihan & Bukti PPH BPJS Ketenagakerjaan</h2>
                  </div>
                  <div class="col-lg-12">
                    <div class="main-green-button scroll-to-section">
                      <a href="#features">Cari Bukti PPH</a>
                      <a href="#tagihan">Cari Tagihan</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="<?php echo base_url()?>desain/depan/assets/images/banner-right-image.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="features" class="features section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="features-content">
            <div class="row">
              <div class="col-lg-12">
                <div class="features-item first-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                  <div class="first-number number">
                    <h6>01</h6>
                  </div>
                  <!-- <div class="icon"></div> -->
                  <h4 style="font-size:28px">Cari Bukti PPH</h4>
                  <div class="line-dec"></div>
                  <!-- <p>This HTML5 template is based on Bootstrap 5 CSS. You are free to customize anything.</p> -->
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="skills-content">
            <div class="row">
              <div class="col-lg-12">
                <div style="padding:20px;" class="skill-item wow fadeIn  p-20" data-wow-duration="1s" data-wow-delay="0s">
                  <div class="col-lg-12" style="padding:20px;">
                    <div class="input-group input-group-sm" >
                      <input style="height:50px;" id="key" type="text" class="form-control" placeholder="Masukan NIK/NPWP">
                      <input style="height:50px;" id="nomor_telepon" type="text" class="form-control" placeholder="Masukan Nomor Telepon">

                      <div class="input-group-prepend">
                        <button id="cari" style="height:50px;min-width:100px" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>

                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12" id="hasil" style="padding:20px;">
                      <?php if (!empty($pph)): ?>
                        <div class="table-responsive">
                          <table id="myTable" class="table table-bordered table-striped ">
                              <thead>
                                  <tr>
                                      <th>Bukti PPH/NIK/NPWP</th>
                                      <th>format</th>
                                      <th>Opsi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php $no=1; foreach ($pph as $data) {?>
                                  <?php $id_check = $data->idpph;?>
                                  <tr>
                                      <td><?php echo $data->nik." / ".$data->npwp?></td>
                                      <td>PDF</td>
                                      <td><a target="_blank" href="<?php echo base_url()?>file/pph/<?php echo $data->file;?>">
                                        <button type="button" class="btn btn-primary btn-sm btn-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Download File">
                                          <i class="fa fa-download"> Download</i>
                                        </button>
                                      </a></td>
                                  </tr>
                                <?php
                                $no++;
                                }?>
                              </tbody>
                            </table>
                        </div>
                      <?php endif; ?>

                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div id="features" class="features section ">
    <div class="container" id="form_tagihan">
      <div class="row">
        <div class="col-lg-12">
          <div class="features-content">
            <div class="row">
              <div class="col-lg-12">
                <div class="features-item second-feature last-features-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                  <div class="fourth-number number">
                    <h6>02</h6>
                  </div>
                  <!-- <div class="icon"></div> -->
                  <h4 style="font-size:28px">Cari Tagihan Iuran</h4>
                  <div class="line-dec"></div>
                  <!-- <p>This HTML5 template is based on Bootstrap 5 CSS. You are free to customize anything.</p> -->

                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="skills-content">
            <div class="row">
              <div class="col-lg-12">
                <center><h6>Silahkan akses aplikasi <a href="https://sipp.bpjsketenagakerjaan.go.id/" target="_blank">SIPP</a> langsung jika anda sudah memiliki email.</h6></center>
                <div style="padding:20px;" class="skill-item wow fadeIn  p-20" data-wow-duration="1s" data-wow-delay="0s">
                  <div class="col-lg-12" style="padding:20px;">
                    <div class="input-group input-group-sm" >
                      <input style="height:50px;" id="key_tagihan" type="text" class="form-control" placeholder="Masukan NPP">
                      <input style="height:50px;" id="telepon" type="text" class="form-control" placeholder="Masukan Nomor Telepon">

                      <div class="input-group-prepend">
                        <button id="cari_tagihan" style="height:50px;min-width:100px" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>

                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12" id="hasil_tagihan" style="padding:20px;">
                      <?php if (!empty($pph)): ?>
                        <div class="table-responsive">
                          <table id="myTable" class="table table-bordered table-striped ">
                              <thead>
                                  <tr>
                                      <th>Tagihan/NPP</th>
                                      <th>format</th>
                                      <th>Opsi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php $no=1; foreach ($pph as $data) {?>
                                  <?php $id_check = $data->idpph;?>
                                  <tr>
                                      <td><?php echo $data->nik." / ".$data->npwp?></td>
                                      <td>PDF</td>
                                      <td><a data-target="#scrollmodal" data-toggle="modal" class="pilih_tagihan" kode="<?php echo base64_encode($data->npp)?>">
                                        <button type="button" class="btn btn-primary btn-sm btn-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Download File">
                                          <i class="fa fa-download"> Download</i>
                                        </button>
                                      </a></td>
                                  </tr>
                                <?php
                                $no++;
                                }?>
                              </tbody>
                            </table>
                        </div>
                      <?php endif; ?>

                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <div id="services" class="our-services section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
            <h6>Panduan Dan Fitur</h6>
            <h2>Fitur Lain<span> dan Panduan</span> dari <em>Kami</em></h2>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4" id="fitur">
          <div class="service-item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
            <div class="row">
              <div class="col-lg-4">
                <div class="icon">
                  <img src="<?php echo base_url()?>desain/depan/assets/images/service-icon-01.png" alt="">
                </div>
              </div>
              <div class="col-lg-8">
                <div class="right-content">
                  <h4>Panduan Pembayaran</h4>
                  <p>Download panduan untuk melakukan pembayaran tagihan <a target="_blank" href="<?php echo base_url("file/panduan/panduan.pdf")?>">disini</a> (*.pdf).</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4" id="panduan">
          <div class="service-item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.4s">
            <div class="row">
              <div class="col-lg-4">
                <div class="icon">
                  <img src="<?php echo base_url()?>desain/depan/assets/images/service-icon-02.png" alt="">
                </div>
              </div>
              <div class="col-lg-8">
                <div class="right-content">
                  <h4>Aplikasi SIPP</h4>
                  <p>Akses aplikasi SIPP (Sistem Informasi Pelaporan Peserta) <a href="https://sipp.bpjsketenagakerjaan.go.id/" target="_blank">Disini</a>.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
