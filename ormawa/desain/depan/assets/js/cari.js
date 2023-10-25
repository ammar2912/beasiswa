$(document).ready(function(){
  // aksi request
  let url = window.location.origin;
  function request(new_url,data_input,callback){
    $.ajax({
        type: "POST",
        url: new_url,
        data : data_input,
        // cache:false,
        // contentType: false,
        // processData: false,
        dataType:"json",
        success: function(data){
          console.log(data.data);
          if(callback) callback(data);
        }
    });
  }

  $(document).on("click","#cari",function(){
    let key = $("#key").val();
    let telepon = $("#nomor_telepon").val();
    let data = {'key':key,'telepon':telepon};
    // alert(key);
    $('#js-preloader').removeClass('loaded');
    request(url+"/Beranda/get_data",data,function(response){
      setTimeout(function(){
        $("#hasil").html(response.html);

        $('#js-preloader').addClass('loaded');

      },1500)
    });
  })

  $(document).on("click","#cari_tagihan",function(){
    let key = $("#key_tagihan").val();
    let telepon = $("#telepon").val();
    let data = {'key':key,'telepon':telepon};
    // alert(key);
    $('#js-preloader').removeClass('loaded');
    request(url+"/Beranda/get_data_tagihan",data,function(response){
      setTimeout(function(){
        $("#hasil_tagihan").html(response.html);

        $('#js-preloader').addClass('loaded');

      },1500)
    });
  })
})
