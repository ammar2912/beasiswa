<script type="text/javascript">

var ctx1 = document.getElementById("GrafikMahasiswa").getContext("2d");
var data1 = {
    labels: [<?php foreach ($grafik_mahasiswa as $value): ?>"<?php echo $value->tahun ?>",<?php endforeach; ?> ],
    datasets: [
      // KEBIDANAN
        {
            label: "My Second dataset",
            fillColor: "rgba(13,238,178,0.8)",
            strokeColor: "rgba(243,245,246,0.9)",
            pointColor: "rgba(243,245,246,0.9)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(243,245,246,0.9)",
            data: [<?php foreach ($grafik_mahasiswa as $value): ?><?php echo $value->jml ?>,<?php endforeach; ?> ]
        }
        // PERAWAT
        // ,{
        //     label: "My First dataset",
        //     fillColor: "rgba(152,235,239,0.8)",
        //     strokeColor: "rgba(152,235,239,0.8)",
        //     pointColor: "rgba(152,235,239,1)",
        //     pointStrokeColor: "#fff",
        //     pointHighlightFill: "#fff",
        //     pointHighlightStroke: "rgba(152,235,239,1)",
        //     data: [0, 59, 80, 58, 20, 55, 40]
        // }

    ]
};

var chart1 = new Chart(ctx1).Line(data1, {
    scaleShowGridLines : true,
    scaleGridLineColor : "rgba(0,0,0,.005)",
    scaleGridLineWidth : 0,
    scaleShowHorizontalLines: true,
    scaleShowVerticalLines: true,
    bezierCurve : true,
    bezierCurveTension : 0.4,
    pointDot : true,
    pointDotRadius : 4,
    pointDotStrokeWidth : 1,
    pointHitDetectionRadius : 2,
    datasetStroke : true,
tooltipCornerRadius: 2,
    datasetStrokeWidth : 2,
    datasetFill : true,
    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
    responsive: true
});
</script>
