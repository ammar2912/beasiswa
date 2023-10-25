
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <title>Kelana Info</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url()?>desain/depan/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url()?>desain/depan/assets/css/fontawesome.css">
    <link rel="stylesheet" href="<?php echo base_url()?>desain/depan/assets/css/templatemo-seo-dream.css">
    <link rel="stylesheet" href="<?php echo base_url()?>desain/depan/assets/css/animated.css">
    <link rel="stylesheet" href="<?php echo base_url()?>desain/depan/assets/css/owl.css">
<!--

TemplateMo 563 SEO Dream

https://templatemo.com/tm-563-seo-dream

-->

</head>

<body>
  <?php $this->load->view("Beranda/menu")?>
  <?php $this->load->view($body)?>
  <div class="modal fade" id="scrollmodal" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="scrollmodalLabel">Pilih Bank Untuk Pembayaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <?php echo form_open_multipart(base_url(),array("target"=>"blank","id"=>"form"))?>
        <div class="modal-body">
          <div class="row col-md-12" style="margin-bottom:20px">
          <?php foreach ($bank as $value): ?>
              <!-- <div class="col-md-2">
              </div> -->
              <div class="col-md-4" style="padding:20px;">
                <input type="radio" class="pilih_bank" required name="bank" value="<?php echo $value->idbank?>" style="float:left">
                <img style="width:100px" src="<?php echo base_url("desain/".$value->logo)?>" alt="">

              </div>
          <?php endforeach; ?>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="cetak" class="btn btn-primary">Lanjut Cetak Tagihan</button>
        </div>
      </form>
    </div>
    </div>
  </div>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2021 <a target="_blank" href="http://esolusindo.com/">Esolusindo </a>. All Rights Reserved.</p>
        </div>
      </div>
    </div>
  </footer>
  <!-- Scripts -->
  <script src="<?php echo base_url()?>desain/depan/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url()?>desain/depan/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url()?>desain/depan/assets/js/owl-carousel.js"></script>
  <script src="<?php echo base_url()?>desain/depan/assets/js/animation.js"></script>
  <script src="<?php echo base_url()?>desain/depan/assets/js/imagesloaded.js"></script>
  <script src="<?php echo base_url()?>desain/depan/assets/js/custom.js"></script>
  <script src="<?php echo base_url()?>desain/depan/assets/js/cari.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script>
  $(document).ready(function(){
    $(document).on("click",'.pilih_tagihan',function(){
      // alert("djkada");
      let kode = $(this).attr("kode");
      let src=window.location.origin+"/Iuran/tagihan_iuran/"+kode;
      // alert(src);
      $("#form").attr("action",src);
    })

  })
  </script>

</body>
</html>
