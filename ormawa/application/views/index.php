<?php
  if ($this->session->userdata("user")==null || empty($this->session->userdata("user") )) {

    redirect(base_url()."Login");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>desain/logo_polije.png">
  <title>SIM ORMAWA</title>
  <link href="<?php echo base_url()?>desain/assets/node_modules/morrisjs/morris.css" rel="stylesheet">
  <!--Toaster Popup message CSS -->
  <link href="<?php echo base_url()?>desain/assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="<?php echo base_url()?>desain/dist/css/style.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="<?php echo base_url()?>desain/dist/css/style2.css" rel="stylesheet">
  <!-- Dashboard 1 Page CSS -->
  <link href="<?php echo base_url()?>desain/dist/css/pages/dashboard1.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>desain/MyCSS.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>desain/assets/node_modules/icheck/skins/all.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>desain/dist/css/pages/form-icheck.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>desain/dist/css/pages/file-upload.css" rel="stylesheet">
  <!-- <link href="<?php echo base_url(); ?>desain/dist/css/main.css" rel="stylesheet"> -->
  <!-- autocomplate -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/easy-autocomplete/1.3.5/easy-autocomplete.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/easy-autocomplete/1.3.5/easy-autocomplete.themes.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/3.0.1/introjs-rtl.min.css" integrity="sha512-ZwmBfD3D5QxY10LWvnuWLO9uTzIZtyGCGnEsUsvvUG9QruzQNytTTtJEr6SoqMKUq43UtO58pXPVek+B7mDbEg==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/3.0.1/introjs.css" integrity="sha512-8gb3kOvRlmcG93nKo/0rqLCwUNyeYpWyCtvKhy7I738TL/MMr/l57TH6lVoGArd1lcgtWCrty9a2KDnctRuFmg==" crossorigin="anonymous" />
  <link href="<?php echo base_url(); ?>desain/assets/node_modules/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>desain/assets/node_modules/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>desain/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>desain/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

  <!-- select2 -->
  <link href="<?php echo base_url(); ?>desain/assets/node_modules/select2/dist/css/select2.min.css" rel="stylesheet" />

  <!-- steps -->
  <link href="<?php echo base_url(); ?>desain/assets/node_modules/wizard/steps.css" rel="stylesheet">
  <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
  <!-- flot chart -->
  <link href="<?php echo base_url(); ?>desain/dist/css/pages/float-chart.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>desain/dist/css/pages/other-pages.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>desain/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
  <script src="<?php echo base_url(); ?>desain/assets/node_modules/toast-master/js/jquery.toast.js"></script>
  <script src="<?php echo base_url();?>desain/dist/js/pages/jquery.PrintArea.js" type="text/JavaScript"></script>
  <style>
  .modal { overflow: auto !important; }
  </style>
</head>

<body class="skin-blue fixed-layout">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/3.0.1/intro.min.js" integrity="sha512-Y3bwrs/uUQhiNsD26Mpr5YvfG18EY0J+aNxYI7ZQPJlM9H+lElGpuh/JURVJR/NBE+p1JZ+sVE773Un4zQcagg==" crossorigin="anonymous"></script>

  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <!-- <div class="preloader">
  <div class="loader">
  <div class="loader__figure"></div>
  <p class="loader__label">Utama Husada</p>
</div>
</div> -->
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
  <!-- Topbar header - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
      <!-- ============================================================== -->
      <!-- Logo -->
      <!-- ============================================================== -->
      <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo base_url() ?>">
          <!-- Logo icon --><b>
          <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
          <!-- Dark Logo icon -->
          <!-- <img src="<?php echo base_url(); ?>desain/toko.png" style="max-width: 55px;" alt="homepage" class="dark-logo" /> -->
          <!-- Light Logo icon -->
          <!-- <img src="<?php echo base_url(); ?>desain/toko.png" style="max-width: 55px;" alt="homepage" class="light-logo" /> -->
        </b>
        <!--End Logo icon -->
        <span class="hidden-xs"><span class="font-bold">SIM</span>ORMAWA</span>
      </a>
    </div>
    <!-- ============================================================== -->
    <!-- End Logo -->
    <!-- ============================================================== -->
    <div class="navbar-collapse">
      <!-- ============================================================== -->
      <!-- toggle and nav items -->
      <!-- ============================================================== -->
      <ul class="navbar-nav mr-auto">
        <!-- This is  -->
        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-sm-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
        <!-- ============================================================== -->
        <!-- Search -->
        <!-- ============================================================== -->
        <!-- <li class="nav-item">
        <form class="app-search d-none d-md-block d-lg-block">
        <input type="text" class="form-control" placeholder="Search & enter">
      </form>
    </li> -->
  </ul>
  <!-- ============================================================== -->
  <!-- User profile and search -->
  <!-- ============================================================== -->
  <ul class="navbar-nav my-lg-0">
    <!-- ============================================================== -->
    <!-- Comment -->
    <!-- ============================================================== -->
    <!-- Load Notif -->
    <!-- ============================================================== -->
    <!-- End mega menu -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- User Profile -->
    <!-- ============================================================== -->
    <li class="nav-item dropdown u-pro">
      <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="<?php echo base_url(); ?>desain/user.png" alt="user" class="">
        <span class="hidden-md-down"><?php echo $this->session->userdata("user")?> &nbsp;<i class="fa fa-angle-down"></i></span> </a>
        <div class="dropdown-menu dropdown-menu-right animated flipInY">
          <a href="<?php echo base_url(); ?>Login/logout" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
          <!-- <small class="dropdown-item"><i class="fa fa-setting"></i>Setting</small> -->
          <!-- <a href="<?php echo base_url(); ?>Login/logout" class="dropdown-item"><i class="fa fa-key"></i> Ubah Password</a> -->
        </div>
      </li>
      <!-- ============================================================== -->
      <!-- End User Profile -->
      <!-- ============================================================== -->
    </ul>
  </div>
</nav>
<div class="progress progress-success progress-sm" hidden="hidden">
    <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0"
        aria-valuemin="0" aria-valuemax="100"></div>
</div>
</header>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav">
        <?php $this->load->view('menu')?>
      </ul>
    </nav>
  <!-- End Sidebar navigation -->
  </div>
<!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
  <!-- ============================================================== -->
  <!-- Container fluid  -->
  <!-- ============================================================== -->
  <div class="container-fluid">

    <div class="row page-titles">
      <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">
          <?php if($this->session->userdata('jenis_user') == 'ormawa'){
            $this->db->where('status_anggaran',1);
            $dana = $this->db->get_where('tb_anggaran_ormawa',array('id_ormawa' => $this->session->userdata('id')))->row();
            ?>
            <h5><strong>&nbsp;&nbsp;<span class="fa fa-square" style="color:green"></span> DANA ANGGARAN TERSISA : <?=rupe(@$dana->anggaran_sisa);?></strong></h5>
        <?php } ?>
        </h4>
      </div>

      <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
          <ol class="breadcrumb">

            <li class="breadcrumb-item">
              <a href="<?php echo base_url().@$this->uri->segment(1); ?>"><?php echo @$this->uri->segment(1); ?></a>
            </li>
            <?php if ($this->uri->segment(2) !== null): ?>
              <li class="breadcrumb-item active"><?php echo @$this->uri->segment(2); ?></li>
            <?php endif; ?>
          </ol>
        </div>
      </div>
    </div>
    <?php
    if ($this->session->flashdata()) {
      echo $this->session->flashdata('notif');
    }
    ?>
    <?php $this->load->view($body); ?>

    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->



    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- End Container fluid  -->
  <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<footer class="footer">
  © <?php echo date("Y")?> E-SOLUSINDO
</footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<!-- Bootstrap popper Core JavaScript -->
<script src="<?php echo base_url(); ?>desain/assets/node_modules/popper/popper.min.js"></script>
<script src="<?php echo base_url(); ?>desain/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="<?php echo base_url(); ?>desain/dist/js/perfect-scrollbar.jquery.min.js"></script>
<!--Wave Effects -->
<script src="<?php echo base_url(); ?>desain/dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="<?php echo base_url(); ?>desain/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="<?php echo base_url(); ?>desain/dist/js/custom.min.js"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!--morris JavaScript -->
<script src="<?php echo base_url(); ?>desain/assets/node_modules/raphael/raphael-min.js"></script>
<script src="<?php echo base_url(); ?>desain/assets/node_modules/morrisjs/morris.min.js"></script>
<script src="<?php echo base_url(); ?>desain/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
<!-- Popup message jquery -->
<script src="<?php echo base_url(); ?>desain/assets/node_modules/toast-master/js/jquery.toast.js"></script>
<!-- jQuery peity -->
<script src="<?php echo base_url(); ?>desain/assets/node_modules/peity/jquery.peity.min.js"></script>
<script src="<?php echo base_url(); ?>desain/assets/node_modules/peity/jquery.peity.init.js"></script>
<!--stickey kit -->
<script src="<?php echo base_url(); ?>desain/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
<script src="<?php echo base_url(); ?>desain/assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
<!-- This is data table -->
<script src="<?php echo base_url(); ?>desain/assets/node_modules/datatables/jquery.dataTables.min.js"></script>
<!-- icheck -->
<script src="<?php echo base_url(); ?>desain/assets/node_modules/icheck/icheck.min.js"></script>
<script src="<?php echo base_url(); ?>desain/assets/node_modules/icheck/icheck.init.js"></script>
<script src="<?php echo base_url(); ?>desain/dist/js/pages/jasny-bootstrap.js"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<!-- select2 -->
<script src="<?php echo base_url(); ?>desain/assets/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>desain/dist/js/pages/mask.js"></script>
<!-- Editable -->
<script type="text/javascript" src="<?php echo base_url();?>desain/assets/node_modules/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.js"></script>

<!-- end - This is for export functionality only -->
<script src="<?php echo base_url(); ?>desain/assets/node_modules/switchery/dist/switchery.min.js"></script>
<script src="<?php echo base_url(); ?>desain/assets/node_modules/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>desain/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="<?php echo base_url(); ?>desain/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>desain/assets/node_modules/multiselect/js/jquery.multi-select.js"></script>
<!-- Chart JS -->
<script src="<?php echo base_url(); ?>desain/assets/node_modules/echarts/echarts-all.js"></script>
<!-- Sweet-Alert  -->
<script src="<?php echo base_url()?>desain/assets/node_modules/sweetalert/sweetalert.min.js"></script>
<script src="<?php echo base_url()?>desain/dist/js/sweet.js"></script>
<script src="<?php echo base_url()?>desain/dist/js/main.js"></script>
<!-- autocomplate -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/easy-autocomplete/1.3.5/jquery.easy-autocomplete.min.js"></script>
<!-- steps -->
<script src="<?php echo base_url()?>desain/assets/node_modules/wizard/jquery.steps.min.js"></script>
<script src="<?php echo base_url()?>desain/assets/node_modules/wizard/jquery.validate.min.js"></script>
<script src="<?php echo base_url()?>desain/assets/node_modules/wizard/steps.js"></script>
<!-- Tour Bootstrap -->
<?php
  if($this->uri->segment(1)=="DashboardKemahasiswaan"){
?>
<script type="text/javascript">

  Morris.Donut({
  element: 'morris-donut1',
  data: [
    {label: "Belum Terpakai", value: <?=$tidak_terpakai;?> },
    {label: "Terpakai", value: <?=$terpakai;?>},
  ],
  colors: ['#ffae00', 'rgb(0, 188, 212)', 'rgb(255, 152, 0)']
  });


  Morris.Bar({
    element: 'bar1',
    data: [
      <?php foreach ($data_batang as $value) {?>
      { y: 'Periode : <?=$value->periode;?>', a: <?=$value->BEM;?>, b: <?=$value->MPM;?>, c:<?=$value->UKM;?>, d :<?=$value->HMJ;?> },
      <?php } ?>
    ],
    xkey: 'y',
    ykeys: ['a', 'b', 'c', 'd'],
    labels: ['BEM', 'MPM','UKM', 'HMJ']
  });


</script>
<?php } ?>

<!-- PIMPINAN -->
<?php
  if($this->uri->segment(1)=="DashboardPimpinan"){
?>
<script type="text/javascript">

Morris.Donut({
element: 'morris-donut2',
data: [
  {label: "Belum Terpakai", value: <?=$tidak_terpakai;?> },
  {label: "Terpakai", value: <?=$terpakai;?>},
],
colors: ['#ffae00', 'rgb(0, 188, 212)', 'rgb(255, 152, 0)']
});


Morris.Bar({
  element: 'bar2',
  data: [
    <?php foreach ($data_batang as $value) {?>
    { y: 'Periode : <?=$value->periode;?>', a: <?=$value->BEM;?>, b: <?=$value->MPM;?>, c:<?=$value->UKM;?>, d :<?=$value->HMJ;?> },
    <?php } ?>
  ],
  xkey: 'y',
  ykeys: ['a', 'b', 'c', 'd'],
  labels: ['BEM', 'MPM','UKM', 'HMJ']
});

</script>
<?php } ?>

<script>

$(document).ready(function () {

  // Data Picker Initialization
  $('.datepicker').pickadate();
  // Material Select Initialization
  $('.mdb-select').material_select();
  $(document).on("click",".hapus-disable",function(){
    $("#Hapus_disable").modal("toggle");
  })
  $(document).on("click",".hapus-aktif",function(){
    $("#Hapus_aktif").modal("toggle");
  })
  $('.optgroup').multiSelect({
    selectableOptgroup: true
  });
  $('#public-methods').multiSelect();
  $( ".tanggal" ).datepicker({
    format:'dd/mm/yyyy',
    formatSubmit: 'yyyy-mm-dd',
    showButtonPanel: true,
  });
  $('.tanggalku').pickadate({
    // Escape any “rule” characters with an exclamation mark (!).
    format: 'dd-mm-yyyy',
    formatSubmit: 'yyyy-mm-dd',
  })

  $(document).on("click",".to-top",function(){
      $('html, body').animate({scrollTop : 0},500);
  })
  $(document).on("click",".to-top-modal",function(){
      $('.modal').animate({ scrollTop: 0 }, 'slow');
  })

  // select2
  $('.myselect2').select2({
      closeOnSelect: true
  });

  $('#myTable').DataTable();

  });

  </script>
  <script type="text/javascript">
  $('document').ready(function() {
    // localStorage.setItem('doneTour', 'lala');
    var notif = $("#tot_notif").val();
    $(".jumlah_notif_apotek").text(notif);
    $(document).on('click',".id_checkbox", function (e) {
      // alert("kadjakdja");
      $("#jumlah_pilih").html($("input.id_checkbox:checked").length);
      if ($("input.id_checkbox:checked").length == 0) {
        $(".btn_hapus").addClass("btn-outline-white");
        $(".btn_hapus").removeClass("btn-outline-danger");
        $(".btn_hapus").addClass("hapus-disable");
        $(".btn_hapus").removeClass("hapus-aktif");
        $(".select-all").prop("checked",false);

      } else {
        $(".btn_hapus").removeClass("btn-outline-white");
        $(".btn_hapus").addClass("btn-outline-danger");
        $(".btn_hapus").addClass("hapus-aktif");
        $(".btn_hapus").removeClass("hapus-disable");
      }
    });
    $(document).on('click',".select-all", function (e) {
      // alert('djahjhd');
      var th = $(this);
      if ($("input.id_checkbox:checked").length == 0) {
        $("input.id_checkbox").prop("checked",true);
        $(".btn_hapus").removeClass("btn-outline-white");
        $(".btn_hapus").addClass("btn-outline-danger");
        $(".btn_hapus").addClass("hapus-aktif");
        $(".btn_hapus").removeClass("hapus-disable");
      } else {
        $("input.id_checkbox").prop("checked",false);
        $(".btn_hapus").addClass("btn-outline-white");
        $(".btn_hapus").removeClass("btn-outline-danger");
        $(".btn_hapus").addClass("hapus-disable");
        $(".btn_hapus").removeClass("hapus-aktif");
        if ($(th).prop("checked")==true) {
          $(th).prop("checked",false);
        }
      }
      $("#jumlah_pilih").html($("input.id_checkbox:chsecked").length);

    });
    $(document).on("blur",'.in_max',function(){
      var nilai = parseInt($(this).val());
      if (nilai > 6) {
        $(this).val(6);
      }else if (nilai < 0) {
        $(this).val(1);
      }
    })
  });



  </script>
  <!-- ============================================================== -->
  <!-- Plugin JavaScript -->
  <!-- ============================================================== -->

  <script src="<?php echo base_url(); ?>desain/assets/node_modules/moment/moment.js"></script>
  <script src="<?php echo base_url(); ?>desain/assets/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
  <!-- Clock Plugin JavaScript -->
  <script src="<?php echo base_url(); ?>desain/assets/node_modules/clockpicker/dist/jquery-clockpicker.min.js"></script>
  <!-- Color Picker Plugin JavaScript -->
  <script src="<?php echo base_url(); ?>desain/assets/node_modules/jquery-asColorPicker-master/libs/jquery-asColor.js"></script>
  <script src="<?php echo base_url(); ?>desain/assets/node_modules/jquery-asColorPicker-master/libs/jquery-asGradient.js"></script>
  <script src="<?php echo base_url(); ?>desain/assets/node_modules/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
  <!-- Date Picker Plugin JavaScript -->
  <script src="<?php echo base_url(); ?>desain/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- Date range Plugin JavaScript -->
  <script src="<?php echo base_url(); ?>desain/assets/node_modules/timepicker/bootstrap-timepicker.min.js"></script>
  <script src="<?php echo base_url(); ?>desain/assets/node_modules/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Flot Charts JavaScript -->
  <script src="<?php echo base_url(); ?>desain/assets/node_modules/flot/excanvas.js"></script>
  <script src="<?php echo base_url(); ?>desain/assets/node_modules/flot/jquery.flot.js"></script>
  <script src="<?php echo base_url(); ?>desain/assets/node_modules/flot/jquery.flot.pie.js"></script>
  <script src="<?php echo base_url(); ?>desain/assets/node_modules/flot/jquery.flot.time.js"></script>
  <script src="<?php echo base_url(); ?>desain/assets/node_modules/flot/jquery.flot.stack.js"></script>
  <script src="<?php echo base_url(); ?>desain/assets/node_modules/flot/jquery.flot.crosshair.js"></script>
  <script src="<?php echo base_url(); ?>desain/assets/node_modules/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
  <script src="<?php echo base_url(); ?>desain/dist/js/pages/flot-data.js"></script>

</body>

</html>

<?php
function rupe($angka){

	$hasil_rupiah = "Rp. ".number_format($angka,2,',','.');
	return $hasil_rupiah;

}
?>
