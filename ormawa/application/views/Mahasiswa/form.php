<div class="row p-t-20">
  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">NIM</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM Mahasiswa"  value="<?php echo @$mahasiswa['nim']?>" required>
      </div>
    </div>
  </div>
  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Nama Mahasiswa</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Mahasiswa" value="<?php echo @$mahasiswa['nama']?>" required>
      </div>
    </div>
  </div>

  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Jurusan</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <select name="jurusan" id="jurusan" class="form-control select2 col-md-12" required>
          <?php if (empty(@$mahasiswa['jurusan'])){ ?>
          <option value=""> Pilih Jurusan</option>
          <?php } ?>
          <?php foreach ($jurusan as $value): ?>
            <option value="<?=$value->id?>" <?php if($value->id == @$mahasiswa['jurusan']){ echo "selected"; } ?> > <?=$value->nama_jurusan?> </option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
  </div>

  <div class="col-md-12 col-xl-6">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">Prodi</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <select name="prodi" id="prodi" class="form-control select2 col-md-12" required>
           <?php if (!empty(@$mahasiswa['prodi'])){ ?>
          <?php foreach (@$prodi as $value): ?>
            <option id="opsi_city" value="<?=$value->id?>" <?php if($value->id == @$mahasiswa['prodi']){ echo "selected"; } ?> > <?=$value->nama_prodi?> </option>
          <?php endforeach; ?>
        <?php } ?>
        </select>
      </div>
    </div>
  </div>


<script type="text/javascript">
$(document).ready(function(){

$('#jurusan').change(function(){
  var id=$(this).val();
  var url='<?=base_url('')?>Mahasiswa/cek_prodi'
  $.ajax({
    url : url,
    method : "POST",
    data : {id: id},
    async : true,
    dataType : 'json',
    success: function(data){
      // console.log(data);
      if(data!=0){
      $('#opsi_city').css("display", "none");
      var html = '';
      var i;
      for(i=0; i<data.length; i++){
        html += '<option value='+data[i].id+'>'+data[i].nama_prodi+'</option>';
      }
      $('#prodi').html(html);
      }else{

      }

    }
  });
  // alert(id);
  return false;
});

});
</script>
