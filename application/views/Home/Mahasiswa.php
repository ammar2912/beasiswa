<?php
  $mahasiswa = $this->ModelMahasiswa->get_data_mahasiswa(null, null, null, $_SESSION['id_login'])->row_array();
  $pendaftar = $this->ModelPendaftaran->data_peserta_mahasiswa($mahasiswa["calon_mahasiswa_no_pendaftaran"])->row_array();
  // $Mp = $this->ModelPendaftaran->data_pendaftar($_SESSION['id_login']);
  $kode_kelas = $mahasiswa['kode_kelas'];
  $idprodi= $mahasiswa['idprodi'];
  $tahun_ajaran= $mahasiswa['tahun_ajaran'];
  $semester_ajaran= $mahasiswa['semester_ajaran'];
  $semester= $mahasiswa['semester'];
 ?>
 <style media="screen">
   .foto{
     width: 250px;
    height: 250px;
    border-radius: 150px;
   }
   .bg{
     background-image: url('<?php echo base_url('desain/assets/mahasiswa.png') ?>');
     background-size: cover;
   }
   table td{
    font-size: 18px;
    font-weight: 200 !important;
   }
   table th{
    font-size: 18px;
    font-weight: 500 !important;
   }
   .foto_mahasiswa{
     max-width: 200px;
border-radius: 10px;
max-height: 300px;
   }
 </style>
<div class="row">
  <div class="col-7">
    <br>
    <div class="col-12">
    <div class="card card-cascade narrower z-depth-1 bg">
      <div class="view view-cascade gradient-card-header aqua-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <div>
        </div>
        <h3 class="white-text mx-3"><i class="fas fa-user-alt"></i> PROFIL MAHASISWA </h3>
        <div>
        </div>
      </div>
          <div class="card-body row">
            <div class="col-md-4 col-sm-12 text-center">
              <img src="<?php echo base_url("desain/dokumen/mahasiswa/".$mahasiswa['foto_mahasiswa']) ?>" class="foto_mahasiswa">
            </div>
            <div class="col-md-8 col-sm-12">
              <table>
                <tr><td>Alamat</td><th>: <?php echo @$mahasiswa['alamat'] ?></th></tr>
                <tr><td>Kabupaten</td><th>: <?php echo @$this->ModelAlamat->data_kabupaten(@$mahasiswa['kabupaten']) ?></th></tr>
                <tr><td>Provinsi</td><th>: <?php echo @$this->ModelAlamat->data_provinsi(@$mahasiswa['provinsi']) ?></th></tr>
                <tr><td>Kode Pos</td><th>: <?php echo @$mahasiswa['kode_pos'] ?></th></tr>
                <tr><td>NO.Telp</td><th>: <?php echo @$pendaftar['nohp'] ?></th></tr>
                <tr><td>Program Studi</td><th>: <?php echo @$mahasiswa['nama_prodi'] ?></th></tr>
                <tr><td>Semester Tempuh </td><th>: <?php echo @$mahasiswa['semester'] ?></th></tr>
                <tr><td>Kelas</td><th>: <?php echo @$mahasiswa['nama_kelas'] ?></th></tr>
                <tr><td>Dosen Wali</td><th>: <?php echo @$mahasiswa['nama'] ?></th></tr>
              </table>
            </div>
          </div>
      </div>
      <br>
      </div>

      <div class="col-12">
      <div class="card card-cascade narrower z-depth-1">
      <div class="view view-cascade gradient-card-header aqua-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <div>
        </div>
        <h3 class="white-text mx-3">  <i class="fas fa-calendar-alt"></i> KALENDER AKADEMIK</h3>
        <div>
        </div>
      </div>
          <div class="card-body">
            <div class="col-md-12 ">
              <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#ganjil" role="tab"><span class="hidden-sm-up"><i class="fas fa-grip-horizontal"></i></span> <span class="hidden-xs-down">Semester Ganjil</span></a> </li>
                  <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#genap" role="tab"><span class="hidden-sm-up"><i class="fas fa-grip-horizontal"></i></span> <span class="hidden-xs-down">Semester Genap</span></a> </li>
              </ul>

              <div class="tab-content tabcontent-border">

                  <div class="tab-pane active" id="ganjil" role="tabpanel">
                      <div class="p-20">
                        <div class="table-responsive">
                          <table id="myTable" class="table color-table table-hover table-striped ">
                            <thead>
                                <tr>
                                    <th width="10">#</th>
                                    <th> Nama Kegiatan</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                      <?php $no = 1; foreach ($kalenderakademik_ganjil as $value):
                                        $id_check = $value->idkalender_akademik;?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $value->nama_kegiatan; ?></td>
                                            <td><?php echo date("d M", strtotime($value->tgl_mulai))." s/d ".date("d M Y", strtotime($value->tgl_akhir))?></td>
                                        </tr>
                                      <?php $no++;  endforeach; ?>
                                    </tbody>
                                </table>
                        </div>
                      </div>
                  </div>

                  <div class="tab-pane p-20" id="genap" role="tabpanel">
                    <div class="p-20">
                      <div class="table-responsive">
                        <table id="myTable" class="table color-table table-hover table-striped ">
                          <thead>
                              <tr>
                                  <th width="10">#</th>
                                  <th> Nama Kegiatan</th>
                                  <th>Tanggal</th>
                              </tr>
                          </thead>
                          <tbody>
                                    <?php $no = 1; foreach ($kalenderakademik_genap as $value):
                                      $id_check = $value->idkalender_akademik;?>
                                      <tr>
                                          <td><?php echo $no;?></td>
                                          <td><?php echo $value->nama_kegiatan; ?></td>
                                          <td><?php echo date("d M", strtotime($value->tgl_mulai))." s/d ".date("d M Y", strtotime($value->tgl_akhir))?></td>
                                      </tr>
                                    <?php $no++;  endforeach; ?>
                                  </tbody>
                              </table>
                      </div>
                    </div>
                  </div>




              </div>


          </div>
      </div>
  </div>
      </div>
</div>

<div class="col-5">
  <br>
  <div class="card card-cascade narrower z-depth-1">
    <div class="view view-cascade gradient-card-header aqua-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
      <div>
      </div>
      <h3 class="white-text mx-3">  <i class="fas fa-calendar-alt"></i> Jadwal Matakuliah</h3>
      <div>
      </div>
    </div>
    <div class="card-body">
      <div class="profiletimeline">
          <div class="sl-item">
              <div class="sl-left"> <img src="<?php echo base_url() ?>desain/user.png" alt="user" class="img-circle" /> </div>
              <div class="sl-right">
                  <div><h3><?php echo $this->libcore->Hari($this->libcore->AngkaHari(date("D"))); ?></h3>
                    <div class="table-responsive">
                      <table class="table color-table table-hover table-striped ">
                        <?php foreach ($this->ModelJadwal->get_jadwal($this->libcore->AngkaHari(date("D")), $kode_kelas, $idprodi, $tahun_ajaran, $semester_ajaran, $semester)->result() as $value): ?>
                          <tr>
                            <td><h5><b><?php echo $this->ModelMatkul->get_data_edit($value->matakuliah_kode_matakuliah)->row_array()["nama_matakuliah"] ?></b></h5>
                              <?php foreach ($this->ModelPengampu->get_dosen_pengampu($value->pengampu_idpengampu)->result() as $dosen): ?>
                                <h6><i class="fas fa-user-graduate"></i> <?php echo $dosen->nama ?></h6>
                              <?php endforeach; ?>
                            </td>
                            <td><b><i class="far fa-clock"></i> <?php echo date("H:i", strtotime($value->mulai))." - ".date("H:i", strtotime($value->selesai)) ?></b><br><i class="fas fa-school"></i> <?php echo $value->nama_ruang ?> </td>
                          </tr>
                        <?php endforeach; ?>
                      </table>
                    </div>
                      <!-- <div class="like-comm"> <a href="javascript:void(0)" class="link m-r-10">2 comment</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div> -->
                  </div>
              </div>
          </div>
          <hr>
      </div>
    </div>

</div>
</div>
</div>
