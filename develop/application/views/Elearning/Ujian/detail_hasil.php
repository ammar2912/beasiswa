<form action="<?php echo base_url() ?>Ujian/update_nilai" method="post">
  <input type="hidden" name="idujian" value="<?php echo $ujian['idujian'] ?>">
<div class="row">
  <div class="col-sm-12 col-md-12">
      <div class="card card-cascade narrower z-depth-1">
        <div class="view view-cascade gradient-card-header <?php echo $this->libcore->warna_ujian($ujian['jenis_ujian'])?> narrower py-2 mx-4 d-flex justify-content-between align-items-center">
          <div></div>
          <h5 class="white-text mx-3"><b><?php echo $this->libcore->Jenis_Ujian($ujian['jenis_ujian']) ?></b></h5>
          <div></div>
        </div>
          <div class="card-body row">
            <div class="col-12">
              <h3><?php echo $ujian["nama_kelas"] ?><hr></h3>
            </div>
            <div class="col-sm-12 col-md-6">
              <i class="fas fa-stopwatch"></i> Durasi Pengerjaan : <b><?php echo date("H:i", strtotime($ujian["lama_pengerjaan"]))?></b>
              <br>
              <i class="fas fa-clock"></i> Waktu Pengerjaan : <b><?php echo date("d/m/Y H:i", strtotime($ujian["mulai"]))." - ".date("d/m/Y H:i", strtotime($ujian["selesai"])) ?></b>
            </div>
            <div class="col-12 konten_ujian">
              <?php echo $ujian['keterangan_ujian'] ?>
            </div>

          </div>
      </div>
      <br>
  </div>

  <div class="col-sm-12 col-md-12">
      <div class="card card-cascade narrower z-depth-1">
        <div class="view view-cascade gradient-card-header <?php echo $this->libcore->warna_ujian($ujian['jenis_ujian'])?> narrower py-2 mx-4 d-flex justify-content-between align-items-center">
          <div></div>
          <h5 class="white-text mx-3"><b>DETAIL HASIL</b></h5>
          <div></div>
        </div>
          <div class="card-body row">
            <div class="table-responsive">
            <table id="myTable" class="table color-table table-hover table-striped ">
              <thead>
                  <tr>
                      <th width="4%">#</th>
                      <th width="10%">NIM </th>
                      <th>Nama </th>
                      <th>Prodi</th>
                      <th width="4%">Thn Ajaran</th>
                      <th width="4%">Semester</th>
                      <th width="10%">Kelas</th>
                      <th width="10%"> <b>NILAI</b> </th>
                      <th width="3%"> <b>review</b> </th>

                  </tr>
              </thead>
              <tbody>
                        <?php $no = 1; foreach ($mahasiswa as $value):
                          $id_check = $value->nim;
                          $hasil = $this->ModelSoal->get_hasil_ujian($ujian['idujian'],$id_check)->row_array();?>
                          <input type="hidden" name="idhasil_ujian[]" value="<?php echo $hasil["idhasil_ujian"] ?>">
                          <tr>
                              <td><?php echo $no;?></td>
                              <td><?php echo $value->nim; ?></td>
                              <td><?php echo $value->nama_mahasiswa; ?></td>
                              <td><?php echo $value->nama_prodi; ?></td>
                              <td><?php echo $value->tahun_ajaran; ?></td>
                              <td><?php echo $value->semester; ?></td>
                              <td><?php echo $value->nama_kelas; ?></td>
                              <td><?php if ($hasil["status_ujian"]==2): ?>
                                <b> <input type="text" name="nilai[]" value="<?php echo $hasil['nilai'] ?>" class="form-control angkasaja" max="2"></b>
                              <?php elseif($hasil["status_ujian"]==1): ?>
                                <b>Proses Mengerjakan <i class="fas fa-spinner fa-pulse"></i></b>
                              <?php elseif($hasil["status_ujian"]==0): ?>
                                <b>Belum Mengerjakan</b>
                                <?php endif; ?>
                              </td>
                              <td><?php if ($hasil["status_ujian"]==2): ?>
                                <a href="<?php echo base_url('Elearning/pekerjaan_selesai/'.$ujian['idujian'].'/'.$hasil["idhasil_ujian"]) ?>" target="_blank" class="btn-floating btn-sm purple-gradient"><i class="fab fa-audible"></i></a>
                              <?php endif; ?></td>
                          </tr>
                        <?php $no++;  endforeach; ?>
                      </tbody>

                  </table>
                  <button type="submit" class="btn blue-gradient">SUBMIT</button>
            </div>
          </div>
      </div>
      <br>
  </div>
</div>
</form>
