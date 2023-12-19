<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/vendor/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/vendor/quill/quill.snow.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/vendor/quill/quill.bubble.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/vendor/remixicon/remixicon.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/vendor/simple-datatables/style.css'); ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a  class="logo d-flex align-items-center">
        <img src="<?=base_url('desain/logo_polije.png')?>" alt="">
        <span class="d-none d-lg-block" style="font-size: smaller;">Kemahasiswaan POLIJE</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            
            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?= base_url('admin/logout'); ?>">
                <i class="bi bi-box-arrow-right"></i>
                <span>LogOut</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Beasiswa</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="usermanagement" class="non-active">
              <i class="bi bi-circle"></i><span>User Management</span>
            </a>
          </li>
          <li>
            <a class="active">
              <i class="bi bi-circle"></i><span>Data Beasiwa</span>
            </a>
          </li>
          <li>
            <a href="usermanagement" class="non-active">
              <i class="bi bi-circle"></i><span>Verifikasi</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      
        </ul>
      </li><!-- End Icons Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle d-flex justify-content-between align-items-center">
      <h1>Data Beasiswa</h1>
      <a class="bi bi-file-plus-fill fs-3" href="<?= base_url('databeasiswa/tambahbeasiswa'); ?>"></a>
    </div>
    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Beasiswa</li>
          <li class="breadcrumb-item">Data Beasiswa</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Nama Beasiswa</th>
                    <th>Deskripsi</th>
                    <th>Penyelenggara</th>
                    <th>Lama Beasiswa</th>
                    <th data-type="date" data-format="YYYY/DD/MM">Tanggal Pendaftaran</th>
                    <th data-type="date" data-format="YYYY/DD/MM">Tanggal Penutupan</th>
                    <th>persyaratan</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($all_data as $data): ?>
                <tr>
                    <td><?= $data->id ?></td>
                    <td><?= $data->namabeasiswa ?></td>
                    <td><?= $data->deskripsi ?></td>
                    <td><?= $data->penyelenggara ?></td>
                    <td><?= $data->lamabeasiswa ?></td>
                    <td><?= $data->tanggalpendaftaran?></td>
                    <td><?= $data->tanggalpenutupan ?></td>
                    <td><?= $data->persyaratan ?></td>
                    <td>
                    <a href="<?= base_url('DataBeasiswa/edit/' . $data->id) ?>" class="btn btn-sm btn-warning">
                        Edit
                    </a>
                    </td>
                </tr>
            <?php endforeach; ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="credits">
      Designed by Beasiswa
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
<script src="<?php echo base_url('assets/vendor/apexcharts/apexcharts.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/chart.js/chart.umd.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/echarts/echarts.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/quill/quill.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/simple-datatables/simple-datatables.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/tinymce/tinymce.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/php-email-form/validate.js'); ?>"></script>

<!-- Template Main JS File -->
<script src="<?php echo base_url('assets/js/main.js'); ?>"></script>

</body>

</html>