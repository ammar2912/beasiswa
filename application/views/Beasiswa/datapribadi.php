<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Input Bio Data</title>
</head>

<body>
<!-- header -->
  <header>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="<?= base_url('desain/logo_polije.png') ?>" alt="Logo" width="30" height="24"
            class="d-inline-block align-text-top">
          BEASISWA
        </a>

      </div>
    </nav>
  </header>
<!-- endheader -->

  <div class="container-fluid">
    <div class="row flex-nowrap">
      <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-light">
        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
<!-- sidebar -->
          <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            < </li>
              <li>
                <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-amazon" viewBox="0 0 16 16">
                    <path
                      d="M10.813 11.968c.157.083.36.074.5-.05l.005.005a89.521 89.521 0 0 1 1.623-1.405c.173-.143.143-.372.006-.563l-.125-.17c-.345-.465-.673-.906-.673-1.791v-3.3l.001-.335c.008-1.265.014-2.421-.933-3.305C10.404.274 9.06 0 8.03 0 6.017 0 3.77.75 3.296 3.24c-.047.264.143.404.316.443l2.054.22c.19-.009.33-.196.366-.387.176-.857.896-1.271 1.703-1.271.435 0 .929.16 1.188.55.264.39.26.91.257 1.376v.432c-.199.022-.407.044-.621.065-1.113.114-2.397.246-3.36.67C3.873 5.91 2.94 7.08 2.94 8.798c0 2.2 1.387 3.298 3.168 3.298 1.506 0 2.328-.354 3.489-1.54l.167.246c.274.405.456.675 1.047 1.166ZM6.03 8.431C6.03 6.627 7.647 6.3 9.177 6.3v.57c.001.776.002 1.434-.396 2.133-.336.595-.87.961-1.465.961-.812 0-1.286-.619-1.286-1.533ZM.435 12.174c2.629 1.603 6.698 4.084 13.183.997.28-.116.475.078.199.431C13.538 13.96 11.312 16 7.57 16 3.832 16 .968 13.446.094 12.386c-.24-.275.036-.4.199-.299l.142.087Z" />
                    <path
                      d="M13.828 11.943c.567-.07 1.468-.027 1.645.204.135.176-.004.966-.233 1.533-.23.563-.572.961-.762 1.115-.191.154-.333.094-.23-.137.105-.23.684-1.663.455-1.963-.213-.278-1.177-.177-1.625-.13l-.09.009c-.095.008-.172.017-.233.024-.193.021-.245.027-.274-.032-.074-.209.779-.556 1.347-.623Z" />
                  </svg>
                  <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Profile</span> </a>
                <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                  <li class="w-100">
                    <a href="#" class="nav-link px-sm-4"> <span class="d-none d-sm-inline">Data Pribadi</span> </a>
                  </li>
                  <li>
                    <a href="#" class="nav-link px-sm-4"> <span class="d-none d-sm-inline">Data Akademik</span> </a>
                  </li>
                  <li>
                    <a href="#" class="nav-link px-sm-4"> <span class="d-none d-sm-inline">Data Keluarga</span> </a>
                  </li>
                  <li>
                    <a href="#" class="nav-link px-sm-4"> <span class="d-none d-sm-inline">Data Rekening</span> </a>
                  </li>
                  <li>
                    <a href="#" class="nav-link px-sm-4"> <span class="d-none d-sm-inline">Dokumen</span> </a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#" class="nav-link px-0 align-middle">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16"
                    height="16" fill="currentColor" class="bi bi-emoji-heart-eyes" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path
                      d="M11.315 10.014a.5.5 0 0 1 .548.736A4.498 4.498 0 0 1 7.965 13a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .548-.736h.005l.017.005.067.015.252.055c.215.046.515.108.857.169.693.124 1.522.242 2.152.242.63 0 1.46-.118 2.152-.242a26.58 26.58 0 0 0 1.109-.224l.067-.015.017-.004.005-.002zM4.756 4.566c.763-1.424 4.02-.12.952 3.434-4.496-1.596-2.35-4.298-.952-3.434m6.488 0c1.398-.864 3.544 1.838-.952 3.434-3.067-3.554.19-4.858.952-3.434" />
                  </svg>
                  <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Status Beasiswa</span></a>
              </li>
              <li>
                <a href="#" class="nav-link px-0 align-middle">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16"
                    height="16" fill="currentColor" class="bi bi-heartbreak-fill" viewBox="0 0 16 16">
                    <path
                      d="M8.931.586 7 3l1.5 4-2 3L8 15C22.534 5.396 13.757-2.21 8.931.586ZM7.358.77 5.5 3 7 7l-1.5 3 1.815 4.537C-6.533 4.96 2.685-2.467 7.358.77Z" />
                  </svg>
                  <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">History</span></a>
              </li>

              </li>
<!-- sidebar end -->
          </ul>
          <hr>
        </div>
      </div>
      <form action="/submit_form" method="post">
      <div class="container">
  <h2 class="text-center">Data Output</h2>
  <div class="d-flex flex-row  mb-3 p-2">
  <div class="p-2  border-right">
  <img src="<?= base_url('desain/fotopas.png') ?>" alt="Deskripsi Gambar"width="250" height="300">
</div>
<div class="p-2  border-right">
  <div class="output-container">
    <div class="mb-3">
      <label for="nik" class="form-label">NIK:</label>
      <span id="nik" class="output-field">1234567890123456</span>
    </div>
    <div class="mb-3">
      <label for="nama" class="form-label">Nama:</label>
      <span id="nama" class="output-field">John Doe</span>
    </div>
    <div class="mb-3">
      <label for="jenisKelamin" class="form-label">Jenis Kelamin:</label>
      <span id="jenisKelamin" class="output-field">Laki-Laki</span>
    </div>
    <div class="mb-3">
      <label for="alamat" class="form-label">Alamat:</label>
      <span id="alamat" class="output-field">Jl. Contoh No. 123</span>
    </div>
    </div></div>
  </div>
</div>


      <!-- <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4">
      <h2>Edit Bio Data</h2>
      <form>
        <div class="mb-3">
          <label for="fullName" class="form-label">Full Name</label>
          <input type="text" class="form-control" id="fullName" placeholder="Enter your full name">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" placeholder="Enter your email">
        </div>
        <div class="mb-3">
          <label for="address" class="form-label">Address</label>
          <textarea class="form-control" id="address" rows="3" placeholder="Enter your address"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
      </form>
    </main> -->
      </div>
    </div>
  </div>
  <div class="row">
    <nav id="sidebar" class="col-md-2 col-lg-2 d-md-block bg-light sidebar">
      
    </nav>

    
  </div>
  </div>


  
  <footer class="fixed-bottom text-center bg-dark text-white p-2">
    &copy; 2023 Your Company Name. All rights reserved.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>