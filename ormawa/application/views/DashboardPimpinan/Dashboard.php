<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <!-- column -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Pengajuan Surat</h5>
                        <div class="d-flex m-t-10 no-block align-items-center">
                            <span class="display-5 text-info"><i class="icon-envelope-open"></i></span>
                            <a href="<?=base_url('RekapSurat');?>" class="link display-5 ml-auto"><?=$surat;?> <small style="font-size:15px"> Surat </small></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Prestasi Mahasiswa</h5>
                        <div class="d-flex m-t-10 no-block align-items-center">
                            <span class="display-5 text-primary"><i class="icon-trophy"></i></span>
                            <a href="<?=base_url('RekapPrestasi');?>" class="link display-5 ml-auto"><?=$prestasi_mahasiswa;?> <small style="font-size:15px"> Prestasi </small></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Prestasi Ormawa</h5>
                        <div class="d-flex m-t-10 no-block align-items-center">
                            <span class="display-5 text-success"><i class="icon-badge"></i></span>
                            <a href="<?=base_url('RekapPrestasiOrmawaPimpinan');?>" class="link display-5 ml-auto"><?=$prestasi_ormawa;?> <small style="font-size:15px"> Prestasi </small></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> Data Pendanaan Ormawa</h5>
                        <div class="d-flex m-t-10 no-block align-items-center">
                            <span class="display-5 text-purple"><i class="icon-folder"></i></span>
                            <a href="<?=base_url('RekapDanaOrmawa');?>" class="link display-5 ml-auto"><?=$pendanaan;?> <small style="font-size:15px"> Pendanaan </small></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total dana, dana yang terpakai dan sisa dana ormawa -->
    <div class="col-lg-12">
        <div class="row">
            <!-- column -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Pendanaan Ormawa</h5>
                        <div class="d-flex m-t-10 no-block align-items-center">
                            <span class="display-5 text-primary"><i class="ti-wallet"></i></span>
                            <a class="ml-4"><h3><?=rupiah($data_pie->total);?></h3></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Dana Terpakai Ormawa</h5>
                        <div class="d-flex m-t-10 no-block align-items-center">
                            <span class="display-5 text-primary"><i class="ti-stats-up"></i></span>
                            <a class="ml-4"><h3><?=rupiah($terpakai);?></h3></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sisa Pendanaan Ormawa</h5>
                        <div class="d-flex m-t-10 no-block align-items-center">
                            <span class="display-5 text-primary"><i class="ti-receipt"></i></span>
                            <a class="ml-4"><h3><?=rupiah($tidak_terpakai);?></h3></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pendanaan Kegiatan Mahasiswa (Di Luar Ormawa)</h5>
                        <div class="d-flex m-t-10 no-block align-items-center">
                            <span class="display-5 text-primary"><i class="ti-stats-up"></i></span>
                            <a href="<?=base_url('KegiatanMahasiswaPimpinan')?>" class="ml-4 text-dark"><h3><?=rupiah($acc);?></h3></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Anggaran Terpakai -->
    <div class="col-lg-12">
        <div class="row">
            <!-- column -->
            <div class="col-md-9">
              <div class="card">
                  <div class="card-body">
                      <div class="d-flex m-b-5 align-items-center no-block">
                          <h5 class="card-title"><b>Dana Terpakai Ormawa</b></h5>
                      </div>
                      <div id="bar2" style="height: 210px;"></div>
                  </div>
              </div>
            </div>
            <!-- column -->
            <div class="col-md-3">
              <div class="card">
                  <div class="card-body">
                      <h5 class="card-title"><b>Pendanaan Ormawa</b></h5>
                      <!-- <div class="row">
                        <div class="col-md-6">
                            <label><h6>Tahun</h6></label>
                        </div>
                        <div class="col-md-6">
                          <select class="custom-select b-0">
                              <option>2021</option>
                              <option value="1">2022</option>
                              <option value="2" selected="">2023</option>
                              <option value="3">2024  </option>
                          </select>
                        </div>
                      </div> -->
                        <div class="row">
                            <div class="col-12">
                                <div id="morris-donut2" style="height:215px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<?php
function rupiah($angka){

	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;

}
?>
