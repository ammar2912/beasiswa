
<?php echo form_open('PPH/delete');?>

<div class="row">
  <div class="col-12">
    <div class="card card-cascade narrower z-depth-1">
      <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <div>
              <button type="button" class="btn btn_hapus btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data"><i class="fas fa-trash-alt mt-0"></i></button>
              <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Jumlah Item Terpilih"><span id="jumlah_pilih">0</span></button>
            </div>
            <a href="" class="white-text mx-3">Data PPH</a>
            <div>
              <a href="<?php base_url(); ?>PPH/input_baru" class="float-right">
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tambah Data Baru">Upload File</button>
              </a>
              <a href="<?php base_url(); ?>PPH/input" class="float-right">
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tambah Data Baru"><i class="fas fa-pencil-alt mt-0"></i></button>
              </a>
            </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="table" class="table table-bordered table-striped">
          <thead>
              <tr>
                  <th width="10%"><input type="checkbox" class="form-check-input select-all" id="tableMaterialChec">
                  <label class="form-check-label" for="tableMaterialChec"></label>
                  </th>
                  <th>Nomor</th>
                  <th>Nama</th>
                  <th>NIK</th>
                  <th>NPWP</th>
                  <th>Tanggal</th>
                  <th>Pajak</th>
                  <th>Bruto</th>
                  <th>Email</th>
                  <th>Telepon</th>
                  <th>File Tagihan</th>
                  <th>Opsi</th>
              </tr>
          </thead>
          <tbody>
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
<?php $this->load->view($form_dialog)?>

<script>
$(document).ready(function(){
  $(document).on("click",".file",function(){
    // alert("dahdjha");
    let url = $(this).attr("link");
    // var pdfId = document.getElementById("pdfId");
    // pdfId.removeChild(pdfId.childNodes[0]);
    // var embed = document.createElement('embed');
    // embed.setAttribute('src', embedUrl);
    //         embed.setAttribute('type', 'audio/mpeg');
    //         pdfId.appendChild(embed);
    // $("#data-file").attr("src",url);
    $('embed').replaceWith($('embed').clone().attr('src',url));
  })
 $('#table tbody').on('click', 'td', function () {
    // alert();
    let checkbox = $(this).find(".id_checkbox");
    if (checkbox.prop("checked")) {
      checkbox.prop("checked",false);
    }else{
      checkbox.prop("checked",true);
    }
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
  table = $('#table').DataTable({

          "processing": true,
          "serverSide": true,
          "order": [],

          "ajax": {
              "url": "<?php echo base_url('PPH/get_pph')?>",
              "type": "POST"
          },


          "columnDefs": [
          {
              "targets": [ 0 ],
              "orderable": false,
          },
          ],

  });
});
$(function(){
  var base_url = '<?php echo base_url()?>';
  function myajax_request(url,data,callback){
    $.ajax({
        type  : 'POST',
        url   : url,
        async : false,
        dataType : 'json',
        data:data,
        success : function(response){
            callback(response);
        }
    })
  }

  $(document).on('click','.detail_barang',function(){
    var data_barang = {
      'id_barang' : $(this).attr('id'),
    };
    // alert(data_barang.id_barang);
    myajax_request(base_url+"PPH/get_data_barang",data_barang,function(res){
      $("#idbarang").val(res.barcode);
      $("#nama_barang").val(res.nama_barang);
      $("#kategori_barang").val(res.kelompok);
      $("#jenis_barang").val(res.kalompok);
      $("#dosis").val(res.dosis);
      $("#kegunaan").val(res.kegunaan);
      $("#kandungan").val(res.kandungan);
      $("#satuan_besar").val(res.satuan_besar);
      $("#satuan_sedang").val(res.satuan_sedang);
      $("#satuan_kecil").val(res.satuan_kecil);
      $("#harga_satuan_besar").val("Rp."+res.harga_beli_satuan_besar);
      $("#harga_satuan_sedang").val("Rp."+res.harga_beli_satuan_sedang);
      $("#harga_satuan_kecil").val("Rp."+res.harga_beli_satuan_kecil);
      $("#rawat_jalan").val("Rp."+res.harga_jual_satuan_besar);
      $("#kelas_3").val("Rp."+res.harga_jual_satuan_sedang);
      $("#kelas_2").val("Rp."+res.harga_jual_satuan_kecil);
    });
  });
});

</script>
