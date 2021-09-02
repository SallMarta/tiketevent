@extends('admin.layout')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Selamat datang di Admin Dashboard!</h2>
                </div>
                <div class="row ml-4 mt-4">
                    <div class="col-xl-3 col-sm-6">
                      <div class="card card-mini mb-4" style="background:#1abec9">
                        <div class="card-body">
                          <h2 class="mb-1">{{ $jumlahEventTerkonfirmasi }}</h2>
                          <p style="color:white">Event di Promosikan</p>
                          <!-- <div class="chartjs-wrapper">
                            <canvas id="barChart"></canvas>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
              <div class="card card-mini mb-4" style="background:#1abec9">
                <div class="card-body">
                  <h2 class="mb-1">{{ $jumlahTiketTerjual }}</h2>
                  <p style="color:white">Tiket Terjual</p>
                          <!-- <div class="chartjs-wrapper">
                            <canvas id="barChart"></canvas>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="col-md-12" id="cobachart1"></div>
        </div>
    </div>
</div>
</div>
</div>
@stop

@section('chart')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('cobachart1', {
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