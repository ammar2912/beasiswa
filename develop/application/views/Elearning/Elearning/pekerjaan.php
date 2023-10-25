
<?php if (@$ujian["jenis_soal"] == 1): ?>
  <?php $this->load->view("Elearning/Elearning/pekerjaan_pilgan") ?>
<?php elseif (@$ujian["jenis_soal"] == 2): ?>
  <?php $this->load->view("Elearning/Elearning/pekerjaan_essay") ?>
<?php endif; ?>

<!--
<div class="row">
  <div class="col-sm-12 col-md-9">
    <input type="hidden" id="idhasil" value="<?php echo $idhasil ?>">
    <?php $no=1;  foreach ($pilgan as $value):
      $detail = $this->ModelSoal->get_detail_hasil_ujian($idhasil,$value->idpilihan_ganda)->row_array();
      @$pilihan = @$detail['jawaban_soal'];
      ?>
      <div class="card" id="<?php echo $no ?>">
          <div class="card-body">
                  <ul class="chat-list">
                      <li style="margin-top: 10px !important;">
                        <span class="top"><?php echo $no++; ?>)</span>

                          <div class="chat-content">
                             <div class="box bg-light-info"><?php echo $value->soal ?></div>
                          </div>
                          <div class="abc">
                            <table>
                              <tr>
                                <td><div class="custom-control custom-radio">
                                    <input type="radio" id="<?php echo $value->idpilihan_ganda ?>a" name="<?php echo $value->idpilihan_ganda ?>jawaban" class="custom-control-input" onclick="pilih('<?php echo $value->idpilihan_ganda ?>','a')" <?php if (@$pilihan == "a"): ?>checked<?php endif; ?>>
                                    <label class="custom-control-label" for="<?php echo $value->idpilihan_ganda ?>a">a. </label>
                                </div></td><td><?php echo $value->a ?></td>
                              </tr>
                              <tr>
                                <td><div class="custom-control custom-radio">
                                    <input type="radio" id="<?php echo $value->idpilihan_ganda ?>b" name="<?php echo $value->idpilihan_ganda ?>jawaban" class="custom-control-input" onclick="pilih('<?php echo $value->idpilihan_ganda ?>','b')" <?php if (@$pilihan == "b"): ?>checked<?php endif; ?>>
                                    <label class="custom-control-label" for="<?php echo $value->idpilihan_ganda ?>b">b. </label>
                                </div></td><td><?php echo $value->b ?></td>
                              </tr>
                              <tr>
                                <td><div class="custom-control custom-radio">
                                    <input type="radio" id="<?php echo $value->idpilihan_ganda ?>c" name="<?php echo $value->idpilihan_ganda ?>jawaban" class="custom-control-input" onclick="pilih('<?php echo $value->idpilihan_ganda ?>','c')" <?php if (@$pilihan == "c"): ?>checked<?php endif; ?>>
                                    <label class="custom-control-label" for="<?php echo $value->idpilihan_ganda ?>c">c. </label>
                                </div></td><td><?php echo $value->c ?></td>
                              </tr>
                              <tr>
                                <td><div class="custom-control custom-radio">
                                    <input type="radio" id="<?php echo $value->idpilihan_ganda ?>d" name="<?php echo $value->idpilihan_ganda ?>jawaban" class="custom-control-input" onclick="pilih('<?php echo $value->idpilihan_ganda ?>','d')" <?php if (@$pilihan == "d"): ?>checked<?php endif; ?>>
                                    <label class="custom-control-label" for="<?php echo $value->idpilihan_ganda ?>d">d. </label>
                                </div></td><td><?php echo $value->d ?></td>
                              </tr>
                              <tr>
                                <td><div class="custom-control custom-radio">
                                    <input type="radio" id="<?php echo $value->idpilihan_ganda ?>e" name="<?php echo $value->idpilihan_ganda ?>jawaban" class="custom-control-input" onclick="pilih('<?php echo $value->idpilihan_ganda ?>','e')" <?php if (@$pilihan == "e"): ?>checked<?php endif; ?>>
                                    <label class="custom-control-label" for="<?php echo $value->idpilihan_ganda ?>e">e. </label>
                                </div></td><td><?php echo $value->e ?></td>
                              </tr>
                            </table>
                          </div>
                      </li>
                  </ul>
          </div>
      </div>
      <br>
    <?php endforeach; ?>
  </div>
  <div class="col-sm-12 col-md-3">
    <div class="stickyside">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <h5 class="col-12">Nomor Soal <hr></h5>
          <?php $no=1;  foreach ($pilgan as $value):
            $detail = $this->ModelSoal->get_detail_hasil_ujian($idhasil,$value->idpilihan_ganda)->row_array();
            @$pilihan = @$detail['jawaban_soal'];
            ?>
            <a href="#<?php echo $no ?>"><button type="button" id="pilgan<?php echo $value->idpilihan_ganda ?>" class="btn-floating btn-sm text-white
              <?php if (@$pilihan==null || @$pilihan==""): ?>
                  dusty-grass-gradient
                <?php else: ?>
                  blue-gradient
              <?php endif; ?>

              " style="margin:5px !important;"><b><?php echo $no++ ?> <small id="pilihan<?php echo $value->idpilihan_ganda ?>"><?php echo @$pilihan['jawaban_soal'] ?></small></b></button></a>
          <?php endforeach; ?>
          <div class="col-12">
            <hr>
            <a href="<?php echo base_url('Elearning/koreksi/'.$idhasil) ?>" class="btn btn-rounded btn-block btn-sm aqua-gradient">SELESAI</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
</div>

<script src="<?php echo base_url() ?>desain/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>

<script type="text/javascript">
  function pilih(idpilgan, jawaban_soal) {
    var idhasil = $("#idhasil").val();
    alert(jawaban_soal);
    $.ajax({
      url: '<?php echo base_url() ?>Elearning/simpan_pilgan',
      type: 'POST',
      data: {idpilgan:idpilgan, jawaban_soal:jawaban_soal, idhasil:idhasil},
      success: function (result) {
        if (result == "Berhasil") {
          $("#pilgan"+idpilgan).removeClass("dusty-grass-gradient");
          $("#pilgan"+idpilgan).addClass("blue-gradient");
          $("#pilihan"+idpilgan).html(jawaban_soal);
        }
          // alert(result);
        },
        error: function(err) {
             // alert(err);
             alert("Mohon Periksa Koneksi Anda");
        },
      });
    // alert(pilihan);
  }

  // This is for the sticky sidebar
  $(".stickyside").stick_in_parent({
      offset_top: 100
  });
  $('.stickyside a').click(function() {
      $('html, body').animate({
          scrollTop: $($(this).attr('href')).offset().top - 100
      }, 500);
      return false;
  });
  // This is auto select left sidebar
  // Cache selectors
  // Cache selectors
  var lastId,
      topMenu = $(".stickyside"),
      topMenuHeight = topMenu.outerHeight(),
      // All list items
      menuItems = topMenu.find("a"),
      // Anchors corresponding to menu items
      scrollItems = menuItems.map(function() {
          var item = $($(this).attr("href"));
          if (item.length) {
              return item;
          }
      });

  // Bind click handler to menu items


  // Bind to scroll
  $(window).scroll(function() {
      // Get container scroll position
      var fromTop = $(this).scrollTop() + topMenuHeight - 250;

      // Get id of current scroll item
      var cur = scrollItems.map(function() {
          if ($(this).offset().top < fromTop)
              return this;
      });
      // Get the id of the current element
      cur = cur[cur.length - 1];
      var id = cur && cur.length ? cur[0].id : "";

      if (lastId !== id) {
          lastId = id;
          // Set/remove active class
          menuItems
              .removeClass("active")
              .filter("[href='#" + id + "']").addClass("active");
      }
  });
</script> -->
