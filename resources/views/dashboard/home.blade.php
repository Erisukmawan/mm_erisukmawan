@extends('templates/header')

@push('style')

@endpush
<!-- page content -->
@section('content')
<div class="">

<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
        <h2>Home Page</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        </div>
    </div>
    </div>
</div>
</div>
<!-- /page content -->
@endsection

@push('js')
<script>

window.onload = function () {
    var dataPenjualan = [];
    var dataJmlTransaksi = [];

    var chart;

    $.get("{{ url('data_penjualan')}}/0", function(data){
        $.each(data, function(key,value){
            let date = value['tgl_faktur'];
            let year = date.substring(0,4);
            let month = date.substring(5,7)-1;
            let day = date.substring(8,10);
            // console.log(year+"-"+month+"-"+day);
            dataPenjualan.push({
                x: new Date(year, month, day),
                y: parseInt(value['total_bayar'])
            });

             dataJmlTransaksi.push({
                x: new Date(year, month, day),
                y: parseInt(value['jml_transaksi'])
            });
        });

        chart = new CanvasJS.Chart("chartContainer", {
        title:{
            text: "Grafik Pendapatan"
        },
        axisY:{
            title: "Penjualan",
            lineColor: "#C24642",
            tickColor: "#C24642",
            labelFontColor: "#C24642",
            titleFontColor: "#C24642",
            includeZero: true,
            suffix: ""
        },
        axisY2: {
            title: "Pendapatan",
            lineColor: "#7F6084",
            tickColor: "#7F6084",
            labelFontColor: "#7F6084",
            titleFontColor: "#7F6084",
            includeZero: true,
            prefix: "",
            suffix: ""
        },
        toolTip: {
            shared: true
        },
        legend: {
            cursor: "pointer",
            itemclick: toggleDataSeries
        },
        data: [
        {
            type: "line",
            name: "Penjualan",
            color: "#C24642",
            axisYIndex: 0,
            showInLegend: true,
            dataPoints: dataJmlTransaksi
        },
        {
            type: "line",
            name: "Pendapatan",
            color: "#7F6084",
            axisYType: "secondary",
            showInLegend: true,
            dataPoints: dataPenjualan
        }]
    });
    chart.render();
    updateChart();
    });


function updateChart(){
    console.log(dataJmlTransaksi);
    $.get("{{ url('data_penjualan')}}/"+dataJmlTransaksi.length, function(data){
        $.each(data, function(key,value){
            let date = value['tgl_faktur'];
            let year = date.substring(0,4);
            let month = date.substring(5,7)-1;
            let day = date.substring(8,10);
            console.log(year+"-"+month+"-"+day);
            dataPenjualan.push({
                x: new Date(year, month, day),
                y: parseInt(value['total_bayar'])
            });

            if(dataPenjualan.length == 1)
                 dataJmlTransaksi.pop({
                        x: new Date(year, month, day),
                        y: parseInt(value['jml_transaksi'])
                    });
            else
                dataJmlTransaksi.push({
                    x: new Date(year, month, day),
                    y: parseInt(value['jml_transaksi'])
                });

        });
    });
    chart.render();
    setTimeout(function(){updateChart()},10000);
}

function toggleDataSeries(e) {
	if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else {
		e.dataSeries.visible = true;
	}
	e.chart.render();
}

}
</script>
@endpush


