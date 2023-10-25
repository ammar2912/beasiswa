<div class="row p-t-10">
  <div class="col-12 row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label"> Kode Kelas E-LEARNING</label>
            <input type="text" name="nama_kelas" id="nama_kelas" class="form-control" placeholder="" value="<?php echo @$ujian['kode_elearning']?>" readonly/>
            <input type="text" name="ujian_idujian" value="<?php echo @$idujian ?>" hidden>
          </div>
    </div>
    <!-- <div class="col-md-3">
        <div class="form-group">
          <label class="control-label">Nomor Soal</label>
          <input type="text" name="nomor_soal" id="nomor_soal" class="form-control" placeholder="" value="" readonly/>
          </div>
    </div> -->
    <div class="col-md-3">
        <div class="form-group ">
            <label class="control-label">Jawaban Pilihan Ganda</label>
            <select name="jawaban" id="jawaban" class="mdb-select colorful-select dropdown-info sm-form" required onchange="jenis_soal()">
              <option value="a" <?php if (@$pilgan['jawaban'] == "a"): ?>selected<?php endif; ?>>a</option>
              <option value="b" <?php if (@$pilgan['jawaban'] == "b"): ?>selected<?php endif; ?>>b</option>
              <option value="b" <?php if (@$pilgan['jawaban'] == "c"): ?>selected<?php endif; ?>>c</option>
              <option value="d" <?php if (@$pilgan['jawaban'] == "d"): ?>selected<?php endif; ?>>d</option>
              <option value="e" <?php if (@$pilgan['jawaban'] == "e"): ?>selected<?php endif; ?>>e</option>
              <option value="essay" <?php if (@$pilgan['jawaban'] == "essay"): ?>selected<?php endif; ?>>essay</option>
            </select>
          </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
          <label class="control-label">Soal</label>
          <textarea class="input-block-level" id="soal" name="soal" rows="4">
            <?php echo @$pilgan['soal'] ?>
          </textarea>
          </div>
    </div>
  </div>
</div>
<ul class="nav nav-tabs isijawaban" role="tablist">
    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#jawabana" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Jabawan A</span></a> </li>
    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#jawabanb" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Jawaban B</span></a> </li>
    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#jawabanc" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Jawaban C</span></a> </li>
    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#jawaband" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Jawaban D</span></a> </li>
    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#jawabane" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Jawaban E</span></a> </li>
</ul>
<!-- Tab panes -->
<div class="tab-content tabcontent-border isijawaban">
    <div class="tab-pane active" id="jawabana" role="tabpanel">
      <label class="control-label">Jawaban A</label>
          <textarea class="input-block-level" id="a" name="a" rows="4">
            <?php echo @$pilgan['a'] ?>
          </textarea>
    </div>
    <div class="tab-pane p-20" id="jawabanb" role="tabpanel">
      <label class="control-label">Jawaban B</label>
        <textarea class="input-block-level" id="b" name="b" rows="4">
          <?php echo @$pilgan['b'] ?>
        </textarea>
    </div>
    <div class="tab-pane p-20" id="jawabanc" role="tabpanel">
      <label class="control-label">Jawaban C</label>
        <textarea class="input-block-level" id="c" name="c" rows="4">
          <?php echo @$pilgan['c'] ?>
        </textarea>
    </div>
    <div class="tab-pane p-20" id="jawaband" role="tabpanel">
      <label class="control-label">Jawaban D</label>
        <textarea class="input-block-level" id="d" name="d" rows="4">
          <?php echo @$pilgan['d'] ?>
        </textarea>
    </div>
    <div class="tab-pane p-20" id="jawabane" role="tabpanel">
      <label class="control-label">Jawaban E</label>
        <textarea class="input-block-level" id="e" name="e" rows="4">
          <?php echo @$pilgan['e'] ?>
        </textarea>
    </div>
</div>



                                  <div class="form-actions" >
                                      <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Simpan</button>
                                      <button type="button" class="btn btn-light" onclick="kembali()"><i class="fas fa-undo"></i> Batal</button>
                                  </div>
                                  <script>
                                  jQuery(document).ready(function() {
                                    jenis_soal();
                                      $('#a').summernote({
                                          height: 150,
                                          minHeight: null,
                                          maxHeight: null,
                                          focus: false,
                                      });
                                      $('#b').summernote({
                                          height: 150,
                                          minHeight: null,
                                          maxHeight: null,
                                          focus: false,
                                      });
                                      $('#c').summernote({
                                          height: 150,
                                          minHeight: null,
                                          maxHeight: null,
                                          focus: false,
                                      });
                                      $('#d').summernote({
                                          height: 150,
                                          minHeight: null,
                                          maxHeight: null,
                                          focus: false,
                                      });
                                      $('#e').summernote({
                                          height: 150,
                                          minHeight: null,
                                          maxHeight: null,
                                          focus: false,
                                      });
                                      $('#soal').summernote({
                                          height: 250,
                                          minHeight: null,
                                          maxHeight: null,
                                          focus: false,
                                      });
                                  });
                                  var postForm = function() {
	                                   var a = $('textarea[name="a"]').html($('#a').code());
	                                   var b = $('textarea[name="b"]').html($('#b').code());
	                                   var c = $('textarea[name="c"]').html($('#c').code());
	                                   var d = $('textarea[name="d"]').html($('#d').code());
	                                   var e = $('textarea[name="e"]').html($('#e').code());
	                                   var e = $('textarea[name="soal"]').html($('#soal').code());
                                   }

                                   function jenis_soal() {
                                     var jenis = $("#jawaban").val();
                                     if (jenis == "essay" ) {
                                       $( ".isijawaban" ).hide("medium");
                                     }else {
                                       $( ".isijawaban" ).show("medium");
                                     }
                                     // alert("jenis");
                                   }
                                  </script>
