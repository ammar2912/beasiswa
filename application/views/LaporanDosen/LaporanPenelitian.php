
<div class="row">
  <div class="col-12">
    <div class="card card-cascade narrower z-depth-1">
      <div class="view view-cascade gradient-card-header aqua-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <div></div>
            <a href="" class="white-text mx-3">LAPORAN KEMAJUAN PENELITIAN</a>
            <div>
            </div>
      </div>
      <div class="card-body">
        <div class="row p-t-20">
          <div class="col-md-8">
            <div class="form-group animated flipIn">
              <?php $jadwal = $this->Core->getJadwal() ?>

              <div class="input-daterange input-group" id="date-range">
                  <input type="text" class="form-control" name="start" id="mulai" value="<?php echo date("m/d/Y", strtotime($jadwal['mulai'])) ?>"/>
                  <div class="input-group-append">
                      <span class="input-group-text bg-info b-0 text-white">TO</span>
                  </div>
                  <input type="text" class="form-control" name="end" id="akhir" value="<?php echo date("m/d/Y", strtotime($jadwal['selesai'])) ?>"/>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <button type="button" onclick="getData()" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-search"></i>  Filter</button>
          </div>
        </div>
        <ul class="nav nav-tabs customtab" role="tablist">
            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home2" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Terlambat Upload</span></a> </li>
            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile2" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Laporan Keseluruhan</span></a> </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="home2" role="tabpanel">
              <div class="table-responsive">
                <table id="myTable" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                              <th width="10%">#</th>
                                <th>NIK</th>
                                <th>Nama Dosen</th>
                                <th>Judul</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="hasil">

                        </tbody>
                    </table>
              </div>
            </div>
            <div class="tab-pane" id="profile2" role="tabpanel">
              <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                              <th width="10%">#</th>
                                <th>NIK</th>
                                <th>Nama Dosen</th>
                                <th>Judul Penelitian</th>
                                <th>Sumber Dana</th>
                                <th>Tgl Upload</th>
                                <th>Jml Lap.Kemajuan</th>
                            </tr>
                        </thead>
                        <tbody id="laporan">

                        </tbody>
                    </table>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$( document ).ready(function() {
    getData();
});
  function getData() {
    // alert("asd");
    var awal = $("#awal").val();
    var akhir = $("#akhir").val();
    $.ajax({
          type: "POST",
          url: "<?php echo base_url() ?>LaporanDosen/getLaporanPenelitian",
          data: {awal:awal, akhir:akhir},
          success: function(data){
            // alert(data);
            $("#hasil").html(data);
          }
    });
    $.ajax({
          type: "POST",
          url: "<?php echo base_url() ?>LaporanDosen/getRekapLaporanPenelitian",
          data: {awal:awal, akhir:akhir},
          success: function(data){
            // alert(data);
            $("#laporan").html(data);
          }
    });
  }
</script>
