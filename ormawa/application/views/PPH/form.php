<div class="row p-t-20">

  <div class="col-md-12 col-xl-4">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">FILE DAFTAR BP</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="file" name="file" id="file" class="form-control" placeholder="file" value="" >
      </div>

    </div>
  </div>

  <div class="col-md-12 col-xl-4"></div>
</div>

<hr style="height:2px"></hr>
<div class="row p-t-20 data" style="margin-bottom:50px">
  <div class="col-md-12 col-xl-12">
    <div class="form-group animated flipIn">
      <label for="exampleInputuname">FILE BUKTI</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
        </div>
        <input type="file" multiple name="files[]" class="form-control" placeholder="file" value="">
      </div>

    </div>
  </div>
</div>
<!-- <div class="row p-t-20" style="margin-bottom:150px">
  <button class="btn btn-sm btn-primary" id="tambah" type="button">Tambah File</button>
</div> -->
<script>
  $(document).ready(function(){
    let no =1;
    $(document).on("click","#tambah",function(){
      // alert("lalal");
        no++;
        let html='<div class="col-md-12 col-xl-12">'
          +'<div class="form-group animated flipIn">'
            +'<label for="exampleInputuname">FILE BUKTI '+no+'</label>'
            +'<div class="input-group mb-3">'
              +'<div class="input-group-prepend">'
                +'<span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>'
              +'</div>'
              +'<input type="file" name="files[]" class="form-control" placeholder="file" value="">'
            +'</div>'
          +'</div>'
        +'</div>';
        $(".data").append(html);
    });

  });

</script>
