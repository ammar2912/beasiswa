<div class="row">
  <div class="col-sm-12 col-md-9">
    <?php foreach ($ujian as $value): ?>
      <div class="card card-cascade narrower z-depth-1">
        <div class="view view-cascade gradient-card-header <?php echo $this->libcore->warna_ujian($value->jenis_ujian) ?> narrower py-2 mx-4 d-flex justify-content-between align-items-center">
          <h5 class="white-text mx-3"><b><?php echo $this->libcore->Jenis_Ujian($value->jenis_ujian) ?> - <?php echo $this->libcore->Jenis_Soal($value->jenis_soal) ?></b></h5>
        </div>
          <div class="card-body">
                  <ul class="chat-list">
                      <li style="margin-top: 10px !important;">
                          <div class="chat-img"><img src="<?php echo base_url() ?>desain/user.png" alt="user" style="border-radius: 0.4rem !important;"/></div>
                          <div class="chat-content">
                              <h5><?php echo $value->nama_kelas ?></h5>
                              <div class="box bg-light-info"><?php echo $value->keterangan_ujian ?></div>
                          </div>
                          <div class="chat-time">Mulai : <?php echo $value->mulai ?> | Akhir : <?php echo $value->selesai ?></div>
                      </li>
                      <li style="margin-top: 10px !important;">
                          <?php foreach ($this->ModelUjian->get_all_file_ujian($value->idujian)->result() as $file): ?>
                            <div class="chat-img" style="vertical-align: middle !important;">
                              <img src="<?php echo base_url() ?>desain/assets/images/iconfile.png" alt="user" style="border-radius: 0.4rem !important;"/></div>
                            <a href="<?php echo base_url("desain/dokumen/ujian/".$file->nama_file ) ?>">  <?php echo $file->nama_file ?> <i class="fas fa-file-download"></i></a>
                          <?php endforeach; ?>
                      </li>
                  </ul>
          </div>
          <div class="card-body border-top">
              <div class="row">
                <div class="col-6">

                </div>
                  <div class="col-6 text-right">
                    <a href="<?php echo base_url('Ujian/edit_ujian/'.$value->idujian."/".$value->kode_elearning) ?>"><button type="button" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button></a>
                    &emsp;
                    &emsp;
                    <a href="<?php echo base_url('Soal/list/'.$value->idujian) ?>"><button type="button" class="btn btn-info btn-sm"><i class="fas fa-paper-plane"></i> Lihat Soal</button></a>
                    <a href="<?php echo base_url('Ujian/detail_hasil/'.$value->idujian) ?>"><button type="button" class="btn btn-primary btn-sm"><i class="fas fa-tasks"></i> Detail Hasil</button></a>
                  </div>
              </div>
          </div>
      </div>
      <br>
    <?php endforeach; ?>
  </div>
  <style>
    .jenis{
      padding-bottom: 13px;
    }
  </style>
  <div class="col-sm-12 col-md-3">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-12 jenis">
            <button type="button" class="btn btn-block btn-outline-info text-left"><i class="fas fa-lg mr-2 fa-tasks"></i> Tugas</button>
          </div>
          <div class="col-12 jenis">
            <button type="button" class="btn btn-block btn-outline-success text-left"><i class="fas fa-lg mr-2 fa-check-square"></i> Quiz</button>
          </div>
          <div class="col-12 jenis">
            <button type="button" class="btn btn-block btn-outline-warning text-left"><i class="far fa-lg mr-2 fa-edit"></i> UTS</button>
          </div>
          <div class="col-12 jenis">
            <button type="button" class="btn btn-block btn-outline-danger text-left"><i class="fas fa-lg mr-2 fa-book-reader"></i> UAS</button>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
