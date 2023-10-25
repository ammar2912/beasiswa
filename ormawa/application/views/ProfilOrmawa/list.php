<div class="row">
  <div class="col-12">
    <div class="card card-cascade narrower z-depth-1">
      <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <div>
              <!-- <button type="button" class="btn btn_hapus btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data"><i class="fas fa-trash-alt mt-0"></i></button>
              <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Jumlah Item Terpilih"><span id="jumlah_pilih">0</span></button> -->
            </div>
            <a href="" class="white-text mx-3">Profil Ormawa</a>
            <div>
              <!-- <a href="<?php base_url(); ?>ApprovePrestasi/input" class="float-right">
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tambah Data Baru"><i class="fas fa-plus mt-0"></i></button>
              </a> -->
            </div>
      </div>
      <div class="card-body">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 col-xs-6 b-r"> <strong>Jenis Ormawa</strong>
                    <br>
                    <p class="text-muted">Himpunan Mahasiswa Jurusan</p>
                </div>
                <div class="col-md-3 col-xs-6 b-r"> <strong>Nama Ormawa</strong>
                    <br>
                    <p class="text-muted">HMJ Pertanian</p>
                </div>
                <!-- <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                    <br>
                    <p class="text-muted">johnathan@admin.com</p>
                </div>
                <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                    <br>
                    <p class="text-muted">London</p>
                </div> -->
            </div>
            <hr>
            <h5 class="font-medium m-t-30"><strong>Tentang Ormawa</strong> </h5>
            <p class="m-t-30">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="alert"><?php echo $this->Core->Hapus_disable(); ?></div>
<div id="modal"><?php echo $this->Core->Hapus_aktif(); ?></div>
