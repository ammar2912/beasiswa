<div class="row p-t-10">
  <div class="col-12 row">
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label"> Nama Kelas E-LEARNING</label>
            <input type="text" name="nama_kelas" id="nama_kelas" class="form-control" placeholder="" value="<?php echo $kelas['kode_elearning']." / ".$kelas["nama_kelas"] ?>" readonly/>
            <input type="text" name="kode_elearning" value="<?php echo $kelas['kode_elearning'] ?>" hidden>
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group ">
            <label class="control-label">Jenis Soal</label>
            <select name="jenis_soal" id="jenis_soal" class="mdb-select colorful-select dropdown-info sm-form" required>
              <option value="1" <?php if (@$ujian['jenis_soal'] == "1"): ?>selected<?php endif; ?>>Pilihan Ganda</option>
              <option value="2" <?php if (@$ujian['jenis_soal'] == "2"): ?>selected<?php endif; ?>>Essay</option>
            </select>
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group ">
            <label class="control-label">Jenis Ujian</label>
            <select name="jenis_ujian" id="jenis_ujian" class="mdb-select colorful-select dropdown-info sm-form" required>
              <option value="1" <?php if (@$ujian['jenis_ujian'] == "1"): ?>selected<?php endif; ?>>Tugas</option>
              <option value="2" <?php if (@$ujian['jenis_ujian'] == "2"): ?>selected<?php endif; ?>>Quiz</option>
              <option value="3" <?php if (@$ujian['jenis_ujian'] == "3"): ?>selected<?php endif; ?>>UTS</option>
              <option value="4" <?php if (@$ujian['jenis_ujian'] == "4"): ?>selected<?php endif; ?>>UAS</option>
            </select>
          </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Lama Pengerjaan</label>
            <div class="input-group jam " data-placement="bottom" data-align="top" data-autoclose="true">
                <input type="text" class="form-control" name="lama_pengerjaan" id="lama_pengerjaan" value="<?php echo date("H:i", strtotime(@$ujian["lama_pengerjaan"])) ?>">
            </div>
          </div>
    </div>
  </div>
</div>
                                    <div class="row p-t-10">
                                      <div class="col-sm-12 col-md-6">
                                        <div class="col-md-12 row">
                                          <div class="col-12">Mulai Ujian :</div>
                                          <div class="col-6">
                                            <div class="form-group ">
                                                <label class="control-label"><small>Tanggal</small> </label>
                                                  <?php
                                                  $tgl = date("d-m-Y");
                                                  $jam = date("H:i");
                                                  if (@$ujian["mulai"] != "" || @$ujian["mulai"] != null){
                                                    $tgl = date("d-m-Y", strtotime(@$ujian["mulai"]));
                                                    $jam = date("H:i", strtotime(@$ujian["mulai"]));
                                                  } ?>
                                                <input type="text" name="mulai_tgl" id="mulai_tgl" class="form-control tanggal" placeholder="" required value="<?php echo $tgl ?>">
                                              </div>
                                          </div>
                                          <div class="col-6">
                                            <div class="form-group ">
                                              <label class="control-label"><small>Jam</small> </label>
                                              <div class="input-group jam " data-placement="bottom" data-align="top" data-autoclose="true">
                                                  <input type="text" class="form-control" name="mulai_jam" id="mulai_jam" required value="<?php echo $jam ?>">
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-12 row">
                                          <div class="col-12">Selesai Ujian :</div>
                                          <div class="col-6">
                                            <div class="form-group ">
                                                <label class="control-label"><small>Tanggal</small> </label>
                                                <?php
                                                $tgl = date("d-m-Y");
                                                $jam = date("H:i");
                                                if (@$ujian["selesai"] != "" || @$ujian["selesai"] != null){
                                                  $tgl = date("d-m-Y", strtotime(@$ujian["selesai"]));
                                                  $jam = date("H:i", strtotime(@$ujian["selesai"]));
                                                } ?>
                                                <input type="text" name="selesai_tgl" id="selesai_tgl" class="form-control tanggal" placeholder="" required value="<?php echo $tgl ?>">
                                              </div>
                                          </div>
                                          <div class="col-6">
                                            <div class="form-group ">
                                              <label class="control-label"><small>Jam</small> </label>
                                              <div class="input-group jam " data-placement="bottom" data-align="top" data-autoclose="true">
                                                  <input type="text" class="form-control" name="selesai_jam" id="selesai_jam" required value="<?php echo $jam ?>">
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-sm-12 col-md-6">
                                        <div class="col-lg-11 col-md-11">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Upload File</h4>
                                                    <?php foreach ($this->ModelUjian->get_all_file_ujian(@$ujian["idujian"])->result() as $file): ?>
                                                      <a href="<?php echo base_url("desain/dokumen/ujian/".$file->nama_file ) ?>">  <?php echo $file->nama_file ?> <i class="fas fa-file-download"></i></a>
                                                      <input type="hidden" name="filetarget" value="<?php echo $file->nama_file ?>">
                                                    <?php endforeach; ?>
                                                    <input type="file" id="file" class="dropify" name="file"/>
                                                </div>
                                            </div>
                                        </div>
                                      </div>

                                    </div>
                                    <div class="row p-t-10">


                                        <div class="col-12" style="padding: 15px;">
                                                <h4>Keterangan</h4>
                                                <textarea class="input-block-level" id="summernote" name="content" rows="4">
                                                  <?php echo @$ujian["keterangan_ujian"] ?>
					                                           </textarea>
                                        </div>
                                    </div>


                                  <div class="form-actions" >
                                      <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Simpan</button>
                                      <button type="button" class="btn btn-light" onclick="kembali()"><i class="fas fa-undo"></i> Batal</button>
                                  </div>
                                  <script>
                                  var sHTML="";
                                  jQuery(document).ready(function() {

                                      $('#summernote').summernote({
                                          height: 250, // set editor height
                                          minHeight: null, // set minimum height of editor
                                          maxHeight: null, // set maximum height of editor
                                          focus: false, // set focus to editable area after initializing summernote
                                      });

                                      $('.inline-editor').summernote({
                                          airMode: true
                                      });

                                  });
                                  var postForm = function() {
	                                   var content = $('textarea[name="content"]').html($('#summernote').code());
                                   }
                                  </script>
