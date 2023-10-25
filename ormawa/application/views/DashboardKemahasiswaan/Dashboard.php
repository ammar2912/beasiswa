<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <!-- column -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Data Mahasiswa</h5>
                        <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                            <span class="display-5 text-info"><i class="icon-people"></i></span>
                            <a href="<?=base_url('Mahasiswa')?>" class="link display-5 ml-auto"><?=$mahasiswa;?> <small style="font-size:15px"> Mahasiswa </small></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Data Ormawa</h5>
                        <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                            <span class="display-5 text-purple"><i class="icon-folder"></i></span>
                            <a href="<?=base_url('NamaOrmawa')?>" class="link display-5 ml-auto"><?=$ormawa;?> <small style="font-size:15px"> Ormawa </small></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Data Prestasi</h5>
                        <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                            <span class="display-5 text-primary"><i class="icon-trophy"></i></span>
                            <a href="<?=base_url('DataPrestasi')?>" class="link display-5 ml-auto"><?=$prestasi;?> <small style="font-size:15px"> Prestasi</small></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Data Kegiatan</h5>
                        <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                            <span class="display-5 text-success"><i class="icon-notebook"></i></span>
                            <a href="<?=base_url('KegiatanOrmawa')?>" class="link display-5 ml-auto"><?=$kegiatan;?> <small style="font-size:15px">Kegiatan</small></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- column -->
        </div>
    </div>

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
                    <h5 class="card-title text-decoration-none">Pendanaan Kegiatan Mahasiswa (Di Luar Ormawa)</h5>
                    <div class="d-flex m-t-10 no-block align-items-center">
                        <span class="display-5 text-primary"><i class="ti-stats-up"></i></span>
                        <a href="<?=base_url('KegiatanMahasiswa')?>" class="ml-4 text-dark"><h3><?=rupiah($acc);?></h3></a>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>

<!-- Grafik Anggaran terpakai ormawa  -->
<div class="row">
    <div class="col-md-9">
      <div class="card">
          <div class="card-body">
              <div class="d-flex m-b-5 align-items-center no-block">
                  <h5 class="card-title"><b>Dana Terpakai Ormawa</b></h5>
              </div>
              <div id="bar1" style="height: 210px;"></div>
          </div>
      </div>
    </div>
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
                        <div id="morris-donut1" style="height:192px;"></div>
                    </div>
                    <div class="col-12">
                      <b><span class="fa fa-square" style="color:#000"></span> Total Dana : <?=rupiah($data_pie->total);?></b><br>
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
