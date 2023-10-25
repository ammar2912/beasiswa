<script src="<?php echo base_url() ?>desain/landing/assets/js/jquery-2.1.0.min.js"></script>

<!-- Bootstrap -->
<script src="<?php echo base_url() ?>desain/landing/assets/js/popper.js"></script>
<script src="<?php echo base_url() ?>desain/landing/assets/js/bootstrap.min.js"></script>

<!-- Plugins -->
<script src="<?php echo base_url() ?>desain/landing/assets/js/scrollreveal.min.js"></script>
<script src="<?php echo base_url() ?>desain/landing/assets/js/waypoints.min.js"></script>
<script src="<?php echo base_url() ?>desain/landing/assets/js/jquery.counterup.min.js"></script>
<script src="<?php echo base_url() ?>desain/landing/assets/js/imgfix.min.js"></script>

<!-- Global Init -->
<script src="<?php echo base_url() ?>desain/landing/assets/js/custom.js"></script>

<!-- Carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="<?php echo base_url() ?>desain/landing/carousel/assets/js/jquery.backstretch.min.js"></script>
<script src="<?php echo base_url() ?>desain/landing/carousel/assets/js/waypoints.min.js"></script>
<script src="<?php echo base_url() ?>desain/landing/carousel/assets/js/scripts.js"></script>
<!-- Carousel -->

<!-- Produk -->
<script src="<?php echo base_url() ?>desain/landing/produk/assets/plugins/jQurey/jquery.min.js"></script>
<!-- Form Validation -->
  <script src="<?php echo base_url() ?>desain/landing/produk/assets/plugins/form-validation/jquery.form.js"></script>
  <script src="<?php echo base_url() ?>desain/landing/produk/assets/plugins/form-validation/jquery.validate.min.js"></script>
<!-- slick slider -->
<script src="<?php echo base_url() ?>desain/landing/produk/assets<?php echo base_url() ?>desain/landing/produk/assets/plugins/slick/slick.min.js"></script>
<!-- bootstrap js -->
<script src="<?php echo base_url() ?>desain/landing/produk/assets/plugins/bootstrap/bootstrap.min.js"></script>
<!-- wow js -->
<script src="<?php echo base_url() ?>desain/landing/produk/assets/plugins/wow-js/wow.min.js"></script>
<!-- slider js -->
<script src="<?php echo base_url() ?>desain/landing/produk/assets/plugins/slider/slider.js"></script>
<!-- Fancybox -->
<script src="<?php echo base_url() ?>desain/landing/produk/assets/plugins/facncybox/jquery.fancybox.js"></script>
<!-- template main js -->
<script src="<?php echo base_url() ?>desain/landing/produk/assets/js/main.js"></script>
<!-- Produk -->

<!-- Agenda -->
<script src="<?php echo base_url() ?>desain/landing/agenda/assets/js/jquery-3.5.1.min.js"></script>
<script src="<?php echo base_url() ?>desain/landing/agenda/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>desain/landing/agenda/assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url() ?>desain/landing/agenda/assets/vendor/wow/wow.min.js"></script>
<script src="<?php echo base_url() ?>desain/landing/agenda/assets/js/mobster.js"></script>
<!-- Agenda -->
<script src="<?php echo base_url() ?>desain/landing/berita/js/owl.carousel.min.js"></script>
<!-- Waypoints -->
<script src="<?php echo base_url() ?>desain/landing/berita/js/jquery.waypoints.min.js"></script>
<!-- Main -->
<script src="<?php echo base_url() ?>desain/landing/berita/js/main.js"></script>

<script src="<?php echo base_url() ?>desain/assets/node_modules/datatables/jquery.dataTables.min.js"></script>
<!-- start - This is for export functionality only -->

<script type="text/javascript">
var slideIndex = 1;
$(document).ready(function() {

$('.myTable').DataTable();

showSlides(slideIndex);
});

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
  }
</script>
