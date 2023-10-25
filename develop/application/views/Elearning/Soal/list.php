
<div class="row">
  <div class="col-sm-12 col-md-9">
    <?php $no=1;  foreach ($pilgan as $value): ?>
      <div class="card" id="<?php echo $no ?>">
          <div class="card-body">
                  <ul class="chat-list">
                      <li style="margin-top: 10px !important;">
                        <span class="top"><?php echo $no++; ?>)</span>
                          <div class="chat-content">
                             <div class="box bg-light-info"><?php echo $value->soal ?></div>
                          </div>
                          <?php if ($value->jawaban != "essay"): ?>
                            <div class="abc">
                              <table>
                                <tr>
                                  <td>a.</td><td><?php echo $value->a ?></td>
                                </tr>
                                <tr>
                                  <td>b.</td><td><?php echo $value->b ?></td>
                                </tr>
                                <tr>
                                  <td>c.</td><td><?php echo $value->c ?></td>
                                </tr>
                                <tr>
                                  <td>d.</td><td><?php echo $value->d ?></td>
                                </tr>
                                <tr>
                                  <td>e.</td><td><?php echo $value->e ?></td>
                                </tr>
                              </table>
                            </div>
                          <?php endif; ?>
                      </li>
                  </ul>
          </div>
          <div class="card-body border-top">
              <div class="row">
                <div class="col-8">
                  <?php if ($value->jawaban != "essay"): ?>
                    Jawaban : <?php echo $value->jawaban ?>
                  <?php endif; ?>
                </div>
                  <div class="col-4 text-right">
                    <a href="<?php echo base_url('Soal/hapus_pilihan_ganda/'.$value->idpilihan_ganda.'/'.$value->ujian_idujian) ?>"><button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button></a>
                    <a href="<?php echo base_url('Soal/edit_pilihan_ganda/'.$value->idpilihan_ganda.'/'.$value->ujian_idujian) ?>"><button type="button" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button></a>
                  </div>
              </div>
          </div>
      </div>
      <br>
    <?php endforeach; ?>
  </div>
  <div class="col-sm-12 col-md-3">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <h5 class="col-12">Nomor Soal <hr><a href="<?php echo base_url('Soal/input_pilihan_ganda/'.$idujian) ?>" class="btn-sm btn-block btn-info text-center" data-toggle="tooltip" title="TAMBAH SOAL"><i class="fas fa-plus"></i> Tambah Soal</a></h5>
          <?php $no=1;  foreach ($pilgan as $value): ?>
            <a href="#<?php echo $no ?>"><button type="button" class="btn-floating btn-sm dusty-grass-gradient" style="margin:5px !important;"><b><?php echo $no++ ?></b></button></a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>
