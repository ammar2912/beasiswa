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
            <?php
              $hasil_ujian ="";
              $hasil = $this->ModelSoal->get_hasil_ujian($ujian['idujian'], $_SESSION["id_login"]);
             if ($hasil->num_rows() >=1):
               $hasil_ujian = $hasil->row_array();
               ?>
            <div class="col-sm-12 col-md-6">
              <?php
              $awal  = new DateTime(date("Y-m-d H:i", strtotime($hasil_ujian["mulai_pengerjaan"])));
              $akhir = new DateTime(date("Y-m-d H:i", strtotime($hasil_ujian["selesai_pengerjaan"])));
              $diff  = $awal->diff($akhir);
              ?>
              <table>
                <tr><td><i class="fas fa-stopwatch"></i> Mulai Mengerjakan </td><td>: <b><?php echo date("H:i", strtotime($hasil_ujian["mulai_pengerjaan"]))?></b></td></tr>
                <tr><td><i class="fas fa-stopwatch"></i> Selesai Mengerjakan</td><td>: <b><?php echo date("H:i", strtotime($hasil_ujian["selesai_pengerjaan"]))?></b></td></tr>
                <tr><td><i class="fas fa-stopwatch"></i> Durasi Mengerjakan</td><td>: <b><?php echo $diff->format('%h jam %i menit')?></b></td></tr>
              </table>
            </div>
            <?php endif; ?>
            <div class="col-12 konten_ujian">
              <?php echo $ujian['keterangan_ujian'] ?>
            </div>
            <div class="col-12">
              <hr>
            </div>

            <?php @$hasil_ujian = $this->ModelSoal->get_hasil_ujian($ujian["idujian"],$_SESSION['id_login']);
            @$idhasil_ujian = @$hasil_ujian->row_array()['idhasil_ujian'];?>
            <div class="col-sm-12 col-md-6">

              <h4><b><i class="fas fa-calendar-check"></i> NILAI : <?php echo @$hasil_ujian->row_array()["nilai"] ?></b></h4>
            </div>
            <div class="col-sm-12 col-md-6 text-right">
              <?php if ($hasil_ujian->num_rows() >= 1): ?>
                  <?php if ($hasil_ujian->row_array()['status_ujian'] == 2): ?>
                      <a href="<?php echo base_url('Elearning/pekerjaan_selesai/'.$ujian["idujian"].'/'.$idhasil_ujian) ?>"><button type="button" class="btn btn-sm blue-gradient"><i class="far fa-hand-point-right"></i> LIHAT ULANG PEKERJAAN</button></a>
                    <?php else: ?>
                      <a href="<?php echo base_url('Elearning/pekerjaan/'.$ujian["idujian"].'/'.$idhasil_ujian) ?>"><button type="button" class="btn peach-gradient"><i class="far fa-hand-point-right"></i> LANJUTKAN</button></a>
                  <?php endif; ?>
                <?php else: ?>
                  <?php
                    $sekarang = strtotime(date("Y-m-d H:i"));
                    $mulai = strtotime($ujian["mulai"]);
                    $selesai = strtotime($ujian["selesai"]);
                   if ($sekarang >= $mulai): ?>
                   <?php if ($sekarang <= $selesai): ?>
                       <a href="<?php echo base_url('Elearning/insert_hasil_ujian/'.$ujian["idujian"].'/'.$_SESSION['id_login']) ?>"><button type="button" class="btn btn-info"><i class="fas fa-file-signature"></i> KERJAKAN</button></a>
                     <?php else: ?>
                       <b>Mohon Maaf, Ujian Telah Berakhir</b>
                   <?php endif; ?>
                    <?php else: ?>
                       <b>MAAF, Ujian Belum Di Mulai</b>
                  <?php endif; ?>
              <?php endif; ?>
            </div>
          </div>
      </div>
      <br>
  </div>
</div>
