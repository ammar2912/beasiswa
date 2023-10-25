/*
Template Name: Elite Admin
Author: Wrappixel

File: js
*/
var link = window.location.origin;
function get_data(jenis_filter,periode){
  // alert(jenis_filter);
  $.ajax({
    type: 'POST',
    url: link+"/Grafik/get_grafik_responden/",
    data: { jenis_filter: jenis_filter,periode:periode },
    dataType : 'json',
    async : false,
    success: function(response) {
      // alert(response)
      grafik(response);
    }

  });
};

$(document).ready(function(){
  $(document).on("click","#filter_button",function(){
    var periode = $("#periode option:selected").val();
    var jenis_filter = $("#filter option:selected").val();
    // alert(periode);
    var data = {jenis_filter:"jenis_kelamin",periode:"seminggu"};
    // alert(link);
    if (periode=='') {
      alert("harap pilih periode");

    }else{
      if (jenis_filter=='') {
        alert("harap pilih jenis filter")
      }else{
        get_data(jenis_filter,periode);
      }
    }
  })
})
//Flot Pie Chart
function grafik(res){
  // $(function () {
      var data = res ;
      // [{
      //     label: "Ksosong"
      //     , data: 10
      //     , color: "#4f5467"
      // , }]
      var plotObj = $.plot($("#responden"), data, {
          series: {
              pie: {
                  show: true,
                 radius: 1,
                 label: {
                     show: true,
                     radius: 2/3,
                     threshold: 0.1
                 }
              }
          }
          , grid: {
              hoverable: true
          }
          , color: "#FFFFFF"
          , tooltip: true
          , tooltipOpts: {
              content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
              shifts: {
                  x: 20
                  , y: 0
              }
              , defaultTheme: false
          }
      });
  // });
}
