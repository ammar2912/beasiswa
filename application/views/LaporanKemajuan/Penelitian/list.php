
<?php echo form_open('Penelitian/delete');

?>


<div class="row">
  <div class="col-12">
    <div class="card card-cascade narrower z-depth-1">
      <div class="view view-cascade gradient-card-header aqua-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <div></div>
            <a href="" class="white-text mx-3">LAPORAN KEMAJUAN PENELITIAN</a>
            <div>
              <?php
              // if ($_SESSION['jabatan'] == "dosen" && $this->Core->cekJadwal()):
              if ($_SESSION['jabatan'] == "dosen"):
              ?> 
                <a href="<?php echo base_url(); ?>LaporanKemajuanPenelitian/input/<?php echo $this->uri->segment(3) ?>" class="float-right">
                  <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tambah Data Baru"><i class="fas fa-pencil-alt mt-0"></i></button>
                </a>
              <?php endif; ?>
            </div>
      </div>
      <div class="card-body">
        <div class="row p-t-20">
            <div class="col-md-12">
              <h6 class="card-subtitle"><b>Penelitian Terapan | Tahun Pelaksanaan <?php echo $penelitian->tahun_pelaksanaan ?></b>
                <br>
                Tahun Ke <?php echo date("Y")-date("Y", strtotime($penelitian->tanggal_awal)) ?> dari <?php echo date("Y", strtotime($penelitian->tanggal_sampai))-date("Y", strtotime($penelitian->tanggal_awal))  ?> Tahun
              </h6>
              <label class=" card-subtitle cyan-text"><h5>Judul Penelitian : <?php echo $penelitian->judul ?></h5></label>
            </div>
          <div class="col-md-3">
            <div class="form-group animated flipIn">
              <label for="exampleInputuname">Tahun Laporan Kemajuan</label>
              <div class="input-group">
                <input type="hidden" name="id_laporan" id="id_laporan" value="<?php echo $this->uri->segment("3") ?>">
                <select name="tahun" id="tahun" class="mdb-select colorful-select dropdown-info sm-form">
                  <?php for ($i=date("Y", strtotime($penelitian->tanggal_awal)); $i < (date("Y") + 5); $i++) { ?>
                    <option value="<?php echo $i ?>" <?php if (date("Y") == $i): ?>
                      selected
                    <?php endif; ?>><?php echo $i ?></option>
                  <?php } ?>


                </select>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group animated flipIn">
              <label for="exampleInputuname">Filter</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <!-- <span class="input-group-text" id="basic-addon1"><i class="ti-instagram"></i></span> -->
                </div>
                <!-- <input type="text" name="noBPJS" id="noBPJS" class="form-control" placeholder="xxxxxxxxxxxxx" value=""> -->
                <button type="button" onclick="getData()" class="btn btn-info waves-effect waves-light"><i class="fa fa-search"></i>  Filter</button>
              </div>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table id="myTable" class="table table-bordered table-hover table-striped">
                  <thead>
                      <tr>
                        <th width="5%">#</th>
                          <th>Ringkasan</th>
                          <th>Kata Kunci</th>
                          <th width="10%">Tanggal Laporan</th>
                          <th width="%3">Detail</th>
                      </tr>
                  </thead>
                  <tbody id="hasil">

                  </tbody>
              </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="alert"><?php echo $this->Core->Hapus_disable(); ?></div>
<div id="modal"><?php echo $this->Core->Hapus_aktif(); ?></div>
<?php echo form_close();?>
<script type="text/javascript">
$( document ).ready(function() {
    getData();
});
  function getData() {
    // alert("asd");
    var tahun = $("#tahun").val();
    var id = $("#id_laporan").val();
    $.ajax({
          type: "POST",
          url: "<?php echo base_url() ?>LaporanKemajuanPenelitian/dataLaporan",
          data: {tahun:tahun, id:id},
          success: function(data){
            // alert(data);
            $("#hasil").html(data);
          }
    });
  }
</script>
