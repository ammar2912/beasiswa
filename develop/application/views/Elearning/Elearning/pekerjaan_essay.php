<form action="<?php echo base_url() ?>Elearning/simpan_essay" method="post">
<div class="row">
  <div class="col-sm-12 col-md-9">
    <input type="hidden" id="idhasil" name="idhasil" value="<?php echo $idhasil ?>">
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
                            <input type="text" name="idessay[]" value="<?php echo $value->idpilihan_ganda ?>" hidden>
                              Jawaban :<br>
                                <textarea name="jawaban_soal[]" rows="8" cols="80" class="form-control" id="jawaban<?php echo $value->idpilihan_ganda ?>" onblur="simpan_essay('<?php echo $value->idpilihan_ganda ?>')"
                                  <?php if (@$hasil_ujian["status_ujian"]==2): ?>readonly<?php endif; ?>
                                  ><?php echo @$pilihan; ?></textarea>
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
          <h5 class="col-12">Nomor Soal <div id="getting-started"></div><hr></h5>

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

              " style="margin:5px !important;"><b><?php echo $no++ ?> <small id="pilihan<?php echo $value->idpilihan_ganda ?>"></small></b></button></a>
          <?php endforeach; ?>
          <div class="col-12">
            <hr>
            <?php if (@$hasil_ujian["status_ujian"]==2): ?>
                <button type="button" class="btn btn-rounded btn-block btn-sm peach-gradient" onclick="kembali()"><i class="fas fa-back"></i> Kembali</button>
              <?php else: ?>
                <a href="<?php echo base_url('Elearning/koreksi/'.$idhasil) ?>" class="btn btn-rounded btn-block btn-sm aqua-gradient">SELESAI</a>
            <?php endif; ?>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
</form>
<script src="<?php echo base_url() ?>desain/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {

  <?php
    $date = date_create();
    date_add($date, date_interval_create_from_date_string(date("H", strtotime($ujian["lama_pengerjaan"])).' hours'));
    date_add($date, date_interval_create_from_date_string(date("i", strtotime($ujian["lama_pengerjaan"])).' minutes'));
    $pengerjaan = date_format($date, 'Y/m/d H:i:s');
   ?>
  $("#getting-started")
  .countdown("<?php echo $pengerjaan ?>", function(event) {
    $(this).text(
      event.strftime('%Hh %Mm %Ss'));
      // alert(event.strftime('%H%M%S'));
        if (event.strftime('%H%M%S') == 0) {
          alert("Waktu Pengerjaan Anda Telah Habis");
          window.location="<?php echo base_url('Elearning/koreksi/'.$idhasil) ?>";
        };
  });
});

  function simpan_essay(idessay) {
    var idhasil = $("#idhasil").val();
    var jawaban_soal = $("#jawaban"+idessay).val();
    // alert(jawaban_soal);
    $.ajax({
      url: '<?php echo base_url() ?>Elearning/simpan_essay',
      type: 'POST',
      data: {idessay:idessay, jawaban_soal:jawaban_soal, idhasil:idhasil},
      success: function (result) {
        if (result == "Berhasil") {
          $("#pilgan"+idessay).removeClass("dusty-grass-gradient");
          $("#pilgan"+idessay).addClass("blue-gradient");s
        }
          alert(result);
        },
        error: function(err) {
             alert(err);
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
</script>
