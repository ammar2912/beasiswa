
                      <div class="card">

                          <div class="card-body">
                                  <div class="form-body">
                                    <div class="row p-t-20">
                                      <?php if (@$elearning["kode_elearning"] != null): ?>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Kode Kelas E-Learning</label>
                                                <input type="text" name="kode_elearning" id="kode_elearning" class="form-control" placeholder="" value="<?php echo @$elearning["kode_elearning"]; ?>" readonly/>
                                              </div>

                                        </div>
                                      <?php endif; ?>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Nama Kelas</label>
                                                <input type="text" name="nama_kelas" id="nama_kelas" class="form-control" placeholder="" value="<?php echo @$elearning["nama_kelas"]; ?>" />
                                              </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                              <label for="semester">Status E-Learning :</label>
                                              <select name="semester" id="semester" class="mdb-select colorful-select dropdown-info sm-form" required>
                                                <option value="1" <?php if (@$elearning['status_elearning'] == "1"): ?>selected<?php endif; ?>>Aktif</option>
                                                <option value="0" <?php if (@$elearning['status_elearning'] == "0"): ?>selected<?php endif; ?>>Non - Aktif</option>
                                              </select>
                                              </div>
                                        </div>

                                    </div>
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Tahun</label>
                                                <select name="tahun" id="tahun" class="mdb-select colorful-select dropdown-info sm-form" required>
                                                  <?php echo $this->libcore->mdb_select_tahunajaran(); ?>
                                                </select>
                                              </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                              <label for="semester">Semester :</label>
                                              <select name="semester" id="semester" class="mdb-select colorful-select dropdown-info sm-form" required>
                                                <option value="1" <?php if (@$elearning['semester'] == "1"): ?>selected<?php endif; ?>>Semester 1</option>
                                                <option value="2" <?php if (@$elearning['semester'] == "2"): ?>selected<?php endif; ?>>Semester 2</option>
                                                <option value="3" <?php if (@$elearning['semester'] == "3"): ?>selected<?php endif; ?>>Semester 3</option>
                                                <option value="4" <?php if (@$elearning['semester'] == "4"): ?>selected<?php endif; ?>>Semester 4</option>
                                                <option value="5" <?php if (@$elearning['semester'] == "5"): ?>selected<?php endif; ?>>Semester 5</option>
                                                <option value="6" <?php if (@$elearning['semester'] == "6"): ?>selected<?php endif; ?>>Semester 6</option>
                                              </select>
                                              </div>
                                        </div>

                                    </div>

                                      <div class="row p-t-20">
                                          <div class="col-md-6">
                                              <div class="form-group ">
                                                  <label class="control-label">Prodi</label>
                                                  <select name="prodi_idprodi" id="prodi_idprodi" class="mdb-select colorful-select dropdown-info sm-form" required>
                                                    <?php foreach ($prodi as $value): ?>
                                                      <option value="<?php echo $value->idprodi ?>" <?php if (@$elearning['prodi_idprodi'] == $value->idprodi): ?>selected<?php endif; ?>><?php echo $value->nama_prodi ?></option>
                                                    <?php endforeach; ?>
                                                  </select>
                                                </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label">Kelas</label>
                                                <select name="kelas_kode_kelas" class="mdb-select colorful-select dropdown-info sm-form" required>
                                                  <?php foreach ($kelas as $value): ?>
                                                    <option value="<?php echo $value->kode_kelas ?>" <?php if (@$elearning['kelas_kode_kelas'] == $value->kode_kelas): ?>selected<?php endif; ?>><?php echo $value->nama_kelas ?></option>
                                                  <?php endforeach; ?>
                                                </select>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label">Matakuliah</label>
                                                <select name="matakuliah_kode_matakuliah" id="matakuliah_kode_matakuliah" class="mdb-select colorful-select dropdown-info sm-form" required>
                                                  <?php foreach ($matkul as $value): ?>
                                                    <option value="<?php echo $value->kode_matakuliah ?>" <?php if (@$elearning['matakuliah_kode_matakuliah'] == $value->kode_matakuliah): ?>selected<?php endif; ?>><?php echo $value->nama_matakuliah ?></option>
                                                  <?php endforeach; ?>
                                                </select>
                                              </div>
                                        </div>
                                        <div class="col-md-6">

                                        </div>
                                          <div class="col-md-6">
                                              <div class="form-group ">
                                                  <label class="control-label">Dosen Pembuat Kelas</label>
                                                  <select name="owner" id="owner" class="mdb-select colorful-select dropdown-info sm-form" required>
                                                    <?php foreach ($dosen as $value): ?>
                                                      <option value="<?php echo $value->nik ?>" <?php if (@$elearning['owner'] == $value->nik): ?>selected<?php endif; ?>><?php echo $value->nama ?></option>
                                                    <?php endforeach; ?>
                                                  </select>
                                                </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-group ">
                                                  <label class="control-label">Dosen Ke Dua</label>
                                                  <select name="dosen_1" id="dosen_1" class="mdb-select colorful-select dropdown-info sm-form">
                                                    <option value=""> -- Pilih Dosen Pengampu -- </option>
                                                    <?php foreach ($dosen as $value): ?>
                                                      <option value="<?php echo $value->nik ?>" <?php if (@$elearning['dosen_1'] == $value->nik): ?>selected<?php endif; ?>><?php echo $value->nama ?></option>
                                                    <?php endforeach; ?>
                                                  </select>
                                                </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-group ">
                                                  <label class="control-label">Dosen Ke Tiga</label>
                                                  <select name="dosen_2" id="dosen_2" class="mdb-select colorful-select dropdown-info sm-form">
                                                    <option value=""> -- Pilih Dosen Pengampu -- </option>
                                                    <?php foreach ($dosen as $value): ?>
                                                      <option value="<?php echo $value->nik ?>" <?php if (@$elearning['dosen_2'] == $value->nik): ?>selected<?php endif; ?>><?php echo $value->nama ?></option>
                                                    <?php endforeach; ?>
                                                  </select>
                                                </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-group ">
                                                  <label class="control-label">Dosen Ke Empat</label>
                                                  <select name="dosen_3" id="dosen_3" class="mdb-select colorful-select dropdown-info sm-form">
                                                    <option value=""> -- Pilih Dosen Pengampu -- </option>
                                                    <?php foreach ($dosen as $value): ?>
                                                      <option value="<?php echo $value->nik ?>" <?php if (@$elearning['dosen_3'] == $value->nik): ?>selected<?php endif; ?>><?php echo $value->nama ?></option>
                                                    <?php endforeach; ?>
                                                  </select>
                                                </div>
                                          </div>

                                      </div>


                                  <div class="form-actions" >
                                      <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                                      <button type="button" onclick="kembali()" class="btn btn-light"><i class="fas fa-undo"></i> kembali</button>
                                  </div>
                          </div>
                      </div>
                    </div>
