@extends('user.dashboard.layout')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Selamat Datang, {{ ucfirst(auth()->user()->name) }}!</h2>
                </div>
                <div class="card-body mb-0">
                    <h3>Grafik Kategori Event dengan Jumlah Event yang banyak di Promosikan.</h3>
                </div>
                <div class="container mt-0">
                    <div class="col-md-12 mt-0" id="cobachart2"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('chartuser')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('cobachart2', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Kategori Event'
        },
        // subtitle: {
        //     text: 'Source: WorldClimate.com'
        // },
        xAxis: {
            categories: {!!json_encode($categories)!!},
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah Kategori dalam Event'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
           
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Jumlah Event',
            data: {!!json_encode($dataevent)!!},

        }]
    });
</script>
@stop