$(function(){
  var no_batch = $("#no_batch");
  var tgl_ex = $("#tgl_ex");
  var hrg_bl = $("#hrg_bl");
  var jml = $("#jml");
  var dis = $("#dis");
  var ppn_brng = $("#ppn_brng");
  var g_transaksi;
  var list_barang = [];
  $(document).ready(function(){
    $(".list_idbarang").each(function(){
      list_barang.push($(this).val());
    })
  })


  function cek_ppn(){
    return (hrg_bl.val()*jml.val())*0.1;
  }
  hrg_bl.keyup(function(){
    var ppn = cek_ppn();
    ppn_brng.val(ppn);
  });

  $("#barcode").focus();
  $(document).on("click","#simpan_data",function(e) {
    $("#form").submit();
    $("#barcode").removeAttr("required");
  });

  //aksi request
  function request(new_url,data_input,callback){
    $(".progress").removeAttr("hidden");
    $.ajax({
        xhr: function() {
            var xhr = new window.XMLHttpRequest();

            // Upload progress
            xhr.upload.addEventListener("progress", function(evt){
                if (evt.lengthComputable) {
                    var percentComplete = evt.loaded / evt.total;
                    //Do something with upload progress

                    percentComplete = percentComplete*100;

                    $(".progress-bar").css("width",percentComplete+"%");
                    console.log(percentComplete);
                }
           }, false);

           // Download progress
           xhr.addEventListener("progress", function(evt){
               if (evt.lengthComputable) {
                   var percentComplete = evt.loaded / evt.total;
                   // Do something with download progress
                   percentComplete = percentComplete*100;
                   $(".progress-bar").css("width",percentComplete+"%");
                   console.log(percentComplete);

               }
           }, false);

           return xhr;
        },
        type: "POST",
        url: new_url,
        data : data_input,
        cache:false,
        contentType: false,
        processData: false,
        dataType:"json",
        success: function(data){
          console.log(data.data);
          if(callback) callback(data);
        }
    });
  }

  //Tambah data baru
    $(document).on("submit","#form",function(event){
        // var data = $(this).serialize();
        var data = new FormData(this);
        var new_url = $(this).attr("action");
        request(new_url,data,function(response){
          setTimeout(function(){
            $(".progress").attr("hidden","hidden");
            $(".progress-bar").css("width","0%");
            if (response.status==1) {
              // toastr.success('Berhasil Simpan Data'+response.id, '', {positionClass: 'toast-bottom-right'});
              window.location.href = response.url;
            }else if(response.status==2){
              toastr.error('Harap Pilih Supplier', '', {positionClass: 'toast-bottom-right'});

            }else{
              toastr.error('Gagal Simpan Data', '', {positionClass: 'toast-bottom-right'});

            }
          },1500)
        });
        event.preventDefault();
    });


  $('#barcode').keypress(function (e) {
    if (e.which == 13) {
      var barcode = $("#barcode").val();
      if (barcode=="") {
        $("#barcode").focus();
      }else{
        $.ajax({
            type  : 'POST',
            url   : window.location.origin+"/Barang/get_barang_barcode",
            async : false,
            dataType : 'json',
            data:{"barcode":barcode},
            success : function(response){
                // alert(response.barcode);
                if (response.message==0) {
                  $("#barcode").val("");
                  $("#barcode").focus();
                }else{
                  var option = "";
                  option += "<option value='"+response.satuan_kecil+"' harga='"+response.harga_jual_satuan_kecil+"'>"+response.satuan_kecil+"</option>";
                  option += "<option value='"+response.satuan_sedang+"' harga='"+response.harga_jual_satuan_sedang+"'>"+response.satuan_sedang+"</option>";
                  option += "<option value='"+response.satuan_besar+"' harga='"+response.harga_jual_satuan_besar+"'>"+response.satuan_besar+"</option>";

                  var data ={
                    'idbarang' : response.idbarang,
                    'nama_barang' : response.nama_barang,
                    'hrg_bl' : response.harga_jual_satuan_kecil,
                    'jml' : 1,
                    'dis' : 0,
                    'ppn_brng' : 0,
                    'satuan' :  option,
                  };
                  if (list_barang.indexOf(data.idbarang) > -1) {
                    // alert("Barang ini telah ditambahkan sebelumnya");
                    $("#barcode").val("");
                    $("#barcode").focus();
                  }else{
                    tambahbarang(data);
                    if ($("#tot_ppn").val()!=0||$("#tot_diskon").val()!=0) {
                      _total();
                      total_final();
                    }else{
                      _total();
                    }
                    list_barang.push(data.idbarang);
                    $("#barcode").val("");
                    $("#barcode").focus();
                  }
                }
            }
        })
      }
      // $('form#login').submit();
      // return false;    //<---- Add this line
    }
  });


  // $(document).on("change","#satuan_barang",function(){
  //   var harga = $("#satuan_barang option:selected").val();
  //   $("#hrg_bl").val(harga);
  //   var ppn = cek_ppn();
  //   ppn_brng.val(ppn);
  // });
  jml.keyup(function(){
    var ppn = cek_ppn();
    ppn_brng.val(ppn);
  });
  $(document).on('click','.add_barang',function(){
    var th = $(this);
    var satuan = $(this).attr("satuan");
    var harga_satuan = $(this).attr("harga");

    var data ={
      'idbarang' : $(th).attr('id'),
      'nama_barang' : $(th).attr('nm'),
      'hrg_bl' : harga_satuan,
      'jml' : 1,
      'dis' : 0,
      'ppn_brng' : 0,
      'satuan' :  satuan,
    };
    if (list_barang.indexOf(data.idbarang) > -1) {
      alert("Barang ini telah ditambahkan sebelumnya");
    }else{
      tambahbarang(data);

      list_barang.push(data.idbarang);
    }

  });

  function flush_form(){
    tgl_ex.val("");
    no_batch.val("");
    hrg_bl.val("");
    jml.val("");
    dis.val("");
    dis.ppn_brng.val("");
  };

  $(document).on('click','.hapus',function(){
    // deleteRow(this);
    var row = (this);
    var index = row.parentNode.parentNode.rowIndex;
    var index_array = index-1;
    list_barang.splice(index_array, 1);
    $(this).parent().parent().remove();

  });

  $(document).on('click','.pilih_barang',function(){
    var data = {
      'idbarang' : $(this).attr("id")
    };
    myajax_request(base_url+"PembelianBarang/get_barang",data,tambahbarang);
  });
  function prefix() {
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    for (var i = 0; i < 1; i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));
    return text;
  }
  function tambahbarang(res) {
    var pr = prefix();
    var kode = res.idbarang;
    var nama = res.nama_barang,no_batch = res.no_batch,tgl_ex=res.tgl_ex,
    hrg_bl = res.hrg_bl,jml=res.jml,dis=res.dis,ppn=res.ppn_brng,satuan=res.satuan;
    var ttl_harga = parseInt((hrg_bl*jml));

    var option = res.satuan;
    var markup = "<tr>" +
    "<td><input hidden value='"+ kode +"' name='idbarang[]'><input hidden value='"+option+"' name='satuan[]' id='satuan"+kode+"'>"+ nama +"</td>" +
    "<td>"+option+"</td>" +
    "<td><input type='number' min='1' id='jml"+kode+"' kode='"+kode+"' class='form-control jml_beli' name='jumlah[]' value='1'></td>" +
    "<td><button type=\"button\"  class=\"hapus btn btn-danger btn-sm btn-circle\" data-toggle=\"tooltip\" data-placement=\"top\" data-original-title=\"Hapus Data\"><i class=\"fa fa-trash\"></i></button></td>"+
    "</tr>";
    $("tbody#barang").append(markup);
    // $("#scrollmodal").modal('toggle');
    // $('.mdb-select'+kode).material_select();
    $('.money'+kode).simpleMoneyFormat();

  }
  $(document).on("blur",".diskon",function(){
    $("#tot_diskon").val(0);
    $("#tot_ppn").val(0);
    var kode = $(this).attr("kode");
    var diskon = $(this).val();
    if (diskon=='' || diskon<0) {
      $(this).val(0);
    }
      hitung_total_saja(kode);

  })
  $(document).on("blur","#tot_diskon",function(){
    // var kode = $(this).attr("kode");
    // var tot_diskon = $(this).val();
    // if (tot_diskon=='' || tot_diskon<0) {
    //   $(this).val(0);
    // }
    //   // hitung_total_saja(kode);
    // _total_2($(this),$("#tot_ppn"));
    _total_baru();

  })
  $(document).on("blur","#tot_ppn",function(){
    // var kode = $(this).attr("kode");
    // var tot_ppn = $(this).val();
    // if (tot_ppn=='' || tot_ppn<0) {
    //   $(this).val(0);
    // }
    //   // hitung_total_saja(kode);
    // _total_2($("#tot_diskon"),$(this));
    _total_baru();
  })
  $(document).on("blur",".ppn_barang",function(){
    $("#tot_diskon").val(0);
    $("#tot_ppn").val(0);
    var kode = $(this).attr("kode");
    var ppn = $(this).val();
    if (ppn=='' || ppn<0) {
      $(this).val(0);
    }
      hitung_total_saja(kode);

  })
  $(document).on("blur",".jml_beli",function(){
    var jml = $(this).val();
    var kode = $(this).attr("kode");
    if (jml=='' || jml<1) {
      $(this).val(1);
    }
      hitung_total_saja(kode);

  })
  $(document).on("blur",".beli",function(){
    var hrg = $(this).val();
    var kode = $(this).attr("kode");
    if (hrg=='' || hrg<0) {
      $(this).val(0);
    }
      hitung_total_saja(kode);

  })
  function hitung_total_saja(kode){

    var hrg = removeComas($("#hrg"+kode).val());
    var jml = $("#jml"+kode).val();
    var diskon = $("#diskon"+kode).val();
    var ppn = $("#ppn"+kode).val();
    console.log(hrg);
    var diskon_percent = parseInt(diskon)/100;
    var ppn_pecent = parseInt(ppn)/100;
    var total_ppn = parseInt(hrg)*parseInt(jml)*ppn_pecent;
    var total_diskon = parseInt(hrg)*parseInt(jml)*diskon_percent;

    console.log(total_ppn);
    if (!isFinite(total_ppn)) {
      total_ppn = 0;
    }
    if (!isFinite(total_diskon)) {
      total_diskon = 0;
    }
    console.log(total_ppn);
    var ttl = (((parseInt(hrg)*parseInt(jml))+parseInt(total_ppn))-parseInt(total_diskon));
    console.log(ttl);
    if (isNaN(ttl)) {
      ttl = 0;
    }
    $("#label_ttl_"+kode).text("Rp."+addCommas(ttl));
    $(".ttl_harga"+kode).val(ttl);
    if ($("#tot_ppn").val()!=0||$("#tot_diskon").val()!=0) {
      _total();
      total_final();
    }else{
      _total();
    }
  }
  $(document).on("change",".pil_satuan",function(){
    var kode = $(this).attr("kode");
    var hrg = $("option:selected",this).attr("harga");
    var satuan = $("option:selected",this).val();
    var jml = $("#jml"+kode).val();
    $("#hrg"+kode).val(hrg);
    $("#hrg"+kode).simpleMoneyFormat();
    $("#satuan"+kode).val(satuan);
    hitung_total_saja(kode);

  })
  function _total_baru() {
    $('.ppn_barang').each(function(){
      var kode = $(this).attr("kode");
      $("#ppn"+kode).val(0);
      $("#diskon"+kode).val(0);
      hitung_total_saja(kode);
    });
    total_final();
  }
  function total_final(){
    var hrg = $("#tot_harga").val();
    var ppn = $("#tot_ppn").val();
    var diskon = $("#tot_diskon").val();
    var diskon_percent = parseInt(diskon)/100;
    var ppn_pecent = parseInt(ppn)/100;
    var total_ppn = parseInt(hrg)*ppn_pecent;
    var total_diskon = parseInt(hrg)*diskon_percent;

    // console.log(total_ppn);
    if (!isFinite(total_ppn)) {
      total_ppn = 0;
    }
    if (!isFinite(total_diskon)) {
      total_diskon = 0;
    }
    // console.log(total_ppn);
    var ttl = (parseInt(hrg)+parseInt(total_ppn))-parseInt(total_diskon);
    // console.log(ttl);

    $("#bayar_final").text("Rp."+addCommas(ttl));
    $(".bayar_final").val(ttl);

  }

  $(document).on('keyup','.bayar',function(){
    var bayar = removeComas($(this).val());
    var transaksi = $(".bayar_final").val();
    var sisa = parseInt(transaksi)-parseInt(bayar);
    // if(sisa<0){
    //   sisa=0;
    // }
    console.log(transaksi);
    console.log(sisa);
    // if (!isNaN(sisa)) {
      $(".sisa").val(sisa);
      $("#sisa").text("Rp."+addCommas(sisa));
    // }else{
    //   $("#sisa").text("Rp.0");
    //   $(".sisa").val(0);
    // }
  });

  function _total(){
    // var total_diskon = [];
    // var total_ppn = [];
    var total_harga = [];
    // var total_ppn_final = 0;
    // var total_diskon_final = 0;
    var total_harga_final = 0;
    // var bayar = 0;
    // $('.diskon_barang').each(function(){
    //   total_diskon.push($(this).val());
    // });
    // $('.ppn_barang').each(function(){
    //   total_ppn.push($(this).val());
    // });
    $('.ttl_harga_barang').each(function(){
      total_harga.push($(this).val());
    });
    for(var i=0;i<total_harga.length;i++){
      // total_diskon_final = total_diskon_final+parseInt(total_diskon[i]);
      // total_ppn_final = total_ppn_final+parseInt(total_ppn[i]);
      total_harga_final = total_harga_final+parseInt(total_harga[i]);
    }
    // bayar = (parseInt(total_harga_final)+parseInt(total_ppn_final))-parseInt(total_diskon_final);
    // if(bayar<0){
    //   bayar = 0;
    // }
    // $("#t_disk").text("Rp."+addCommas(total_diskon_final));
    // $("#t_ppn").text("Rp."+addCommas(total_ppn_final));
    $("#t_harga").text("Rp."+addCommas(total_harga_final));
    // $("#tot_diskon").val(total_diskon_final);
    // $("#tot_ppn").val(total_ppn_final);
    $("#tot_harga").val(total_harga_final);
    $("#bayar_final").text("Rp."+addCommas(total_harga_final));
    $(".bayar_final").val(total_harga_final);
    // g_transaksi = bayar;
    // cek_sisa();
  }
  // $(document).on('keyup','.bayar',function(){
  //   cek_sisa();
  // });
  function cek_sisa(){
    var bayar = $(".bayar").val();
    var sisa = g_transaksi-bayar;
    // if(sisa<0){
    //   sisa=0;
    // }
    if (!isNaN(sisa)) {
      $(".sisa").val(sisa);
      $("#sisa").text("Rp."+addCommas(sisa));
    }else{
      $("#sisa").text("Rp.0");
      $(".sisa").val(0);
    }
  }
  // function deleteRow(r) {
  //   var i = r.parentNode.parentNode.rowIndex;
  //   document.getElementById("list_pembelian_barang").deleteRow(i);
  // }
  function addCommas(nStr){
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
      x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
  }
  function removeComas(nilai){
    var hasil   = nilai.split(',');
    var shasil = "";
    for (var i = 0; i < hasil.length; i++) {
        shasil = shasil +""+ hasil[i];
    }
    return shasil;

  }
  function alphaOnly(event) {
    // alert("dhakd");
    var key = event.keyCode;
    if (key >= 48 && key <= 57){
      return key;
    };
  };


  async function play_camera() {
    try {
      /* Ask for "environnement" (rear) camera if available (mobile),
       * will fallback to only available otherwise (desktop).
       * User will be prompted if (s)he allows camera to be started */
      const stream = await navigator.mediaDevices.getUserMedia({
        video: {
          facingMode: "environment",
        },
        audio: false,
      });
      const video = document.getElementById("video-preview");
      video.srcObject = stream;
      video.setAttribute("playsinline", true); /* otherwise iOS safari starts fullscreen */
      video.play();
      setTimeout(tick, 100); /* We launch the tick function 100ms later (see next step) */

    } catch(err) {
      console.log(err); /* User probably refused to grant access*/
    };
  };
  function tick() {
      const video = document.getElementById('video-preview');
      const qrCanvasElement = document.getElementById('qr-canvas');
      const qrCanvas = qrCanvasElement.getContext('2d');
      let width;
      let height;

      if (video.readyState === video.HAVE_ENOUGH_DATA) {
          qrCanvasElement.height = video.videoHeight;
          qrCanvasElement.width = video.videoWidth;
          qrCanvas.drawImage(video, 0, 0, qrCanvasElement.width, qrCanvasElement.height);

          try {
            const result = qrcode.decode();
            // console.log(result)
            // document.getElementById("hasil").innerHTML = result;
            // ambil data
            let url = window.location.origin+"/Barang/get_satu_barang";
            $.ajax({
              type  : 'POST',
              url   : url,
              async : false,
              dataType : 'json',
              data:{'idbarang':result},
              success : function(response){
                var data ={
                  'idbarang' : result,
                  'nama_barang' : response.nama_barang,
                  'hrg_bl' : 0,
                  'jml' : 1,
                  'dis' : 0,
                  'ppn_brng' : 0,
                  'satuan' :  response.satuan,
                };
                if (list_barang.indexOf(data.idbarang) > -1) {
                  alert("Barang ini telah ditambahkan sebelumnya");
                  // $("#smallmodal").modal("toggle");
                }else{
                  tambahbarang(data);
                  list_barang.push(data.idbarang);
                  /* Video can now be stopped */
                  video.pause();
                  video.src = '';
                  video.srcObject.getVideoTracks().forEach(track => track.stop());

                  /* Display Canvas and hide video stream */
                  qrCanvasElement.classList.remove('hidden');
                  video.classList.add('hidden');
                  $("#smallmodal").modal("toggle");
                }
              }
            })





          } catch(e) {
            /* No Op */
          }
        }

        /* If no QR could be decoded from image copied in canvas */
        if (!video.classList.contains('hidden'))
            setTimeout(tick, 100);
    }
    $(document).on("click","#scan",function(){
      const video = document.getElementById('video-preview');
      const qrCanvasElement = document.getElementById('qr-canvas');
      qrCanvasElement.classList.add('hidden');
      video.classList.remove('hidden');
      play_camera();

    })

});
