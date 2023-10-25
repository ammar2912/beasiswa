<div class="row">
  <div class="col-sm-12 col-md-12">
      <div class="card card-cascade narrower z-depth-1">
        <div class="view view-cascade gradient-card-header <?php echo $this->libcore->warna_ujian($ujian['jenis_ujian'])?> narrower py-2 mx-4 d-flex justify-content-between align-items-center">
          <div></div>
          <h5 class="white-text mx-3"><b><?php echo $this->libcore->Jenis_Ujian($ujian['jenis_ujian']) ?></b></h5>
          <div></div>
        </div>
        <form action="<?php echo base_url("Elearning/update_hasil_ujian") ?>" method="post">
          <input type="hidden" name="idhasil_ujian" value="<?php echo $hasil_ujian['idhasil_ujian'] ?>">
          <div class="card-body row">
            <div class="col-12">
              <h3><?php echo $ujian["nama_kelas"] ?><hr></h3>
            </div>
            <div class="col-12">
              <div class="col-sm-12 col-md-6">
                <?php
                $awal  = new DateTime(date("Y-m-d H:i", strtotime($hasil_ujian["mulai_pengerjaan"])));
                $akhir = new DateTime(); // Waktu sekarang
                $diff  = $awal->diff($akhir);
                ?>
                <table>
                  <tr><td><i class="fas fa-stopwatch"></i> Mulai Mengerjakan </td><td>: <b><?php echo date("H:i", strtotime($hasil_ujian["mulai_pengerjaan"]))?></b></td></tr>
                  <tr><td><i class="fas fa-stopwatch"></i> Selesai Mengerjakan</td><td>: <b><?php echo date("H:i")?> <input type="hidden" name="selesai_pengerjaan" value="<?php echo date("Y-m-d H:i")?>"> </b></td></tr>
                  <tr><td><i class="fas fa-stopwatch"></i> Durasi Mengerjakan</td><td>: <b><?php echo $diff->format('%h jam %i menit')?></b></td></tr>
                </table>
              </div>
            </div>
            <div class="col-12 konten_ujian">
              <?php echo $ujian['keterangan_ujian'] ?>
            </div>
            <hr>
            <div class="col-12 text-center">
              <?php
                $sekarang = strtotime(date("Y-m-d H:i"));
                $mulai = strtotime($ujian["mulai"]);
                $selesai = strtotime($ujian["selesai"]);?>
                <?php if ($mulai <= $sekarang && $sekarang <= $selesai): ?>
                  <a href="<?php echo base_url('Elearning/pekerjaan/'.$ujian["idujian"].'/'.$hasil_ujian['idhasil_ujian']) ?>"><button type="button" class="btn purple-gradient btn-sm"><i class="far fa-hand-point-left"></i> Kerjakan Ulang</button></a>
                <?php endif; ?>
                <br>
              <button type="submit" class="btn btn-block btn-md aqua-gradient"><i class="fas fa-check fa-lg"></i> SUBMIT</button>
            </div>
          </div>
          </form>
      </div>
      <br>
  </div>
</div>
