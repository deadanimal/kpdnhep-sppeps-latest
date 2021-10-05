@extends('layouts.base-admin-hq')

@section('content')

    <div class="container-fluid py-4">

        <div class="p-1">

            <div>
                <h4>Peratusan Kelulusan Permit</h4>
            </div>

            <div class="container-fluid mt-4">
                <div class="card m-2">

                    <div class="card-header" style="background-color: #f7e8ff;">
                        <h5> Carian</h5>
                    </div>

                    <div class="card-body p-3">
                        <div class="row p-3 pl-0 mb-0">
                            <form style="width: 100%;" (ngSubmit)="filterCharts()">

                                <div class="row">

                                    <div class="col-3">
                                        <label for="startdate">Tarikh Mula</label>
                                        <input class="form-control form-control-sm" type="date" name="startdate"
                                            placeholder="" id="start-date" />
                                    </div>
                                    <div class="col-3">
                                        <label for="enddate">Tarikh Akhir</label>
                                        <input class="form-control form-control-sm" type="date" name="enddate"
                                            placeholder="" id="end-date" />
                                    </div>
                                    <div class="col d-flex justify-content-start align-items-end mt-3">

                                        <button class="btn  bg-gradient-info text-uppercases m-2 " type="submit"
                                            name="search"><i class="fas fa-search"></i> cari</button>
                                        <a href="/laporan-statistik/peratusan-kelulusan-permit"
                                            class="btn  bg-gradient-danger text-uppercases m-2" (click)="reset()">set
                                            semula</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid mt-4">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card m-2">

                            <div class="card-header" style="background-color: #f7e8ff;">

                                <div class="row mb-0">
                                    <div class="col">
                                        <h5> Kelulusan Permit Mengikut Jantina</h5>
                                        <label> Graf ini hanya menunjukkan data bulanan pada tahun <?php $year = date('Y');
echo $year; ?>
                                            sahaja</label>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body p-3">
                                <div class="chart" style="height: initial;">
                                    <div class="amchart" id="chartdiv" style="height: 400px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex">
                        <div class="card m-2">
                            <div class="card-header" style="background-color: #f7e8ff;">

                                <div class="row mb-0">
                                    <div class="col">
                                        <h5> Kelulusan Permit Mengikut Jantina</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body p-3">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0" id="tablekelulusanpermitjantina">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                    No.</th>
                                                <th
                                                    class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                                    Jantina</th>
                                                <th
                                                    class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                    Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach ($kelulusanjantinas as $kelulusanjantina)
                                                <tr>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $loop->index + 1 }}</td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $kelulusanjantina->jantina }}
                                                    </td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $kelulusanjantina->jumlah }}
                                                    </td>
                                                </tr>

                                            @endforeach --}}

                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">
                                                    1</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    Lelaki
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($kelulusanjantinalelakis == null)
                                                        0
                                                    @else
                                                        {{ $kelulusanjantinalelakis }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">
                                                    2</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    Perempuan
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($kelulusanjantinaperempuans == null)
                                                        0
                                                    @else
                                                        {{ $kelulusanjantinaperempuans }}
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="container-fluid mt-4">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card m-2">

                            <div class="card-header" style="background-color: #f7e8ff;">

                                <div class="row mb-0">
                                    <div class="col">
                                        <h5> Kelulusan Permit Mengikut Negeri</h5>
                                        <label> Graf ini hanya menunjukkan data bulanan pada tahun <?php $year = date('Y');
echo $year; ?>
                                            sahaja</label>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body p-3">
                                <div class="chart" style="height: initial;">
                                    <div class="amchart" id="chartdiv2" style="height: 400px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex">
                        <div class="card m-2">
                            <div class="card-header" style="background-color: #f7e8ff;">

                                <div class="row mb-0">
                                    <div class="col">
                                        <h5> Kelulusan Permit Mengikut Negeri</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body p-3">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0" id="tablekelulusanpermitnegeri">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                    No.</th>
                                                <th
                                                    class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                                    Negeri Kutipan Permit</th>
                                                <th
                                                    class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                    Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach ($kelulusannegeris as $kelulusannegeri)
                                                <tr>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $loop->index + 1 }}</td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $kelulusannegeri->negeri_kutipan_permit }}
                                                    </td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $kelulusannegeri->jumlah }}
                                                    </td>
                                                </tr>

                                            @endforeach --}}

                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">
                                                    1</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    Johor
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($kelulusannegerijohor == null)
                                                        0
                                                    @else
                                                        {{ $kelulusannegerijohor }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">
                                                    2</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    Kedah
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($kelulusannegerikedah == null)
                                                        0
                                                    @else
                                                        {{ $kelulusannegerikedah }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">
                                                    3</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    Kelantan
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($kelulusannegerikelantan == null)
                                                        0
                                                    @else
                                                        {{ $kelulusannegerikelantan }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">
                                                    4</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    Melaka
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($kelulusannegerimelaka == null)
                                                        0
                                                    @else
                                                        {{ $kelulusannegerimelaka }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">
                                                    5</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    Negeri Sembilan
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($kelulusannegerinegerisembilan == null)
                                                        0
                                                    @else
                                                        {{ $kelulusannegerinegerisembilan }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">
                                                    6</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    Pahang
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($kelulusannegeripahang == null)
                                                        0
                                                    @else
                                                        {{ $kelulusannegeripahang }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">
                                                    7</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    Pulau Pinang
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($kelulusannegeripulaupinang == null)
                                                        0
                                                    @else
                                                        {{ $kelulusannegeripulaupinang }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">
                                                    8</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    Perak
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($kelulusannegeriperak == null)
                                                        0
                                                    @else
                                                        {{ $kelulusannegeriperak }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">
                                                    9</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    Perlis
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($kelulusannegeriperlis == null)
                                                        0
                                                    @else
                                                        {{ $kelulusannegeriperlis }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">
                                                    10</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    Selangor
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($kelulusannegeriselangor == null)
                                                        0
                                                    @else
                                                        {{ $kelulusannegeriselangor }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">
                                                    11</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    Terengganu
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($kelulusannegeriterengganu == null)
                                                        0
                                                    @else
                                                        {{ $kelulusannegeriterengganu }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">
                                                    12</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    Sabah
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($kelulusannegerisabah == null)
                                                        0
                                                    @else
                                                        {{ $kelulusannegerisabah }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">
                                                    13</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    Sarawak
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($kelulusannegerisarawak == null)
                                                        0
                                                    @else
                                                        {{ $kelulusannegerisarawak }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">
                                                    14</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    W.P. Kuala Lumpur
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($kelulusannegerikualalumpur == null)
                                                        0
                                                    @else
                                                        {{ $kelulusannegerikualalumpur }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">
                                                    15</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    W.P. Labuan
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($kelulusannegerilabuan == null)
                                                        0
                                                    @else
                                                        {{ $kelulusannegerilabuan }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">
                                                    16</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    W.P. Putrajaya
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($kelulusannegeriputrajaya == null)
                                                        0
                                                    @else
                                                        {{ $kelulusannegeriputrajaya }}
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="container-fluid mt-4">
                <div class="card m-2">

                    <div class="card-header" style="background-color: #f7e8ff;">

                        <div class="row mb-0">
                            <div class="col">
                                <h5> Senarai Permit Lulus</h5>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-3">

                        {{-- <div class="row p-3 mb-0">
                            <div class="col form-group d-flex justify-content-start align-items-center p-0 mb-0">
                                <label class="d-flex flex-nowrap mb-0">
                                    <span class="p-2">Negeri</span>
                                    <select name="datatable_length" aria-controls="datatable"
                                        class="col form-control form-control-sm" (change)="updateStateFilter($event)">
                                        <option selected>Semua</option>
                                        <option value="Perlis">Perlis</option>
                                        <option value="Kedah">Kedah</option>
                                        <option value="Pulau Pinang">Pulau Pinang</option>
                                        <option value="Perak">Perak</option>
                                        <option value="Selangor">Selangor</option>
                                        <option value="Melaka">Melaka</option>
                                        <option value="Negeri Sembilan">Negeri Sembilan</option>
                                        <option value="Johor">Johor</option>
                                        <option value="Pahang">Pahang</option>
                                        <option value="Terengganu">Terengganu</option>
                                        <option value="Kelantan">Kelantan</option>
                                        <option value="Sabah">Sabah</option>
                                        <option value="Sarawak">Sarawak</option>
                                        <option value="WP Kuala Lumpur">W. P. Kuala Lumpur</option>
                                        <option value="WP Putrajaya">W. P. Putrajaya</option>
                                        <option value="WP Labuan">W. P. Labuan</option>
                                    </select>
                                </label>
                            </div>
                        </div> --}}

                        <div class="row">
                            <div class="card">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0" id="tablekelulusanpermit">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-center text-xs font-weight-bolder opacity-7">
                                                    No.</th>
                                                <th
                                                    class="text-uppercase text-center text-secondary font-weight-bolder opacity-7">
                                                    No. Permit</th>
                                                {{-- <th
                                                    class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                    Jenis Permohonan</th> --}}
                                                <th
                                                    class="text-uppercase text-center text-secondary font-weight-bolder opacity-7">
                                                    Tarikh Permit Lulus</th>
                                                <th
                                                    class="text-uppercase text-center text-secondary font-weight-bolder opacity-7">
                                                    Tarikh Mula Permit</th>
                                                <th
                                                    class="text-uppercase text-center text-secondary font-weight-bolder opacity-7">
                                                    Tarikh Tamat Permit</th>
                                                <th
                                                    class="text-uppercase text-center text-secondary font-weight-bolder opacity-7">
                                                    Nama Pemohon</th>
                                                <th
                                                    class="text-uppercase text-center text-secondary font-weight-bolder opacity-7">
                                                    No. Kad Pengenalan</th>
                                                <th
                                                    class="text-uppercase text-center text-secondary font-weight-bolder opacity-7">
                                                    Negeri Kutipan Permit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kelulusans as $kelulusan)
                                                <tr>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $loop->index + 1 }}</td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $kelulusan->no_permit }}
                                                    </td>
                                                    {{-- <td class="text-sm font-weight-normal">
                                                        {{ $kelulusan->jenis_permohonan }}
                                                    </td> --}}
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ date('d-m-Y', strtotime($kelulusan->tarikh_diluluskan)) }}
                                                    </td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ date('d-m-Y', strtotime($kelulusan->tarikh_cetakan)) }}
                                                    </td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ date('d-m-Y', strtotime($kelulusan->tarikh_tamat_permit)) }}
                                                    </td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $kelulusan->nama }}
                                                    </td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $kelulusan->no_kp }}
                                                    </td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $kelulusan->negeri_kutipan_permit }}
                                                    </td>
                                                </tr>

                                            @endforeach
                                        </tbody>
                                        {{-- <tfoot>
                                            @foreach ($kelulusans as $kelulusan)
                                                <tr>
                                                    <th>{{ $kelulusan->negeri }}</th>
                                                </tr>
                                            @endforeach

                                        </tfoot> --}}
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <!-- Styles -->
    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
        }

        #chartdiv2 {
            width: 100%;
            min-height: 700px;
        }

    </style>

    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

    <!-- Chart code -->
    <script>
        am4core.ready(function() {

            am4core.useTheme(am4themes_animated);
            am4core.addLicense('ch-custom-attribution');

            var chart = am4core.create("chartdiv2", am4charts.XYChart);

            var data = {!! json_encode($kelulus) !!};
            chart.data = data;

            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "monthname";
            categoryAxis.renderer.grid.template.location = 0;


            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.inside = true;
            valueAxis.renderer.labels.template.disabled = true;
            valueAxis.min = 0;

            function createSeries(field, name) {

                var series = chart.series.push(new am4charts.ColumnSeries());
                series.name = name;
                series.dataFields.valueY = field;
                series.dataFields.categoryX = "monthname";
                series.sequencedInterpolation = true;

                series.stacked = true;

                series.columns.template.width = am4core.percent(60);
                series.columns.template.tooltipText =
                    "[bold]{name}[/]\n[font-size:14px]{categoryX}: {valueY}";

                var labelBullet = series.bullets.push(new am4charts.LabelBullet());
                labelBullet.label.text = "{valueY}";
                labelBullet.locationY = 0.5;
                labelBullet.label.hideOversized = true;

                return series;
            }

            createSeries("Johor", "Johor");
            createSeries("Kedah", "Kedah");
            createSeries("Kelantan", "Kelantan");
            createSeries("Melaka", "Melaka");
            createSeries("Negeri Sembilan", "Negeri Sembilan");
            createSeries("Pahang", "Pahang");
            createSeries("Pulau Pinang", "Pulau Pinang");
            createSeries("Perak", "Perak");
            createSeries("Perlis", "Perlis");
            createSeries("Selangor", "Selangor");
            createSeries("Terengganu", "Terengganu");
            createSeries("Sabah", "Sabah");
            createSeries("Sarawak", "Sarawak");
            createSeries("WP Kuala Lumpur", "W. P. Kuala Lumpur");
            createSeries("WP Labuan", "W. P. Labuan");
            createSeries("WP Putrajaya", "W. P. Putrajaya");

            // Legend
            chart.legend = new am4charts.Legend();

            // Enable export
            chart.exporting.menu = new am4core.ExportMenu();
            chart.exporting.menu.items = [{
                "label": "...",
                "menu": [{
                        "type": "png",
                        "label": "PNG"
                    },
                    {
                        "type": "pdf",
                        "label": "PDF"
                    },
                ]
            }];
            chart.exporting.menu.align = "right";
            chart.exporting.menu.verticalAlign = "top";
            chart.exporting.filePrefix = "Kelulusan Permit mengikut Negeri";
            var title = chart.titles.create();
            title.text = "Kelulusan Permit mengikut Negeri";
            var options = chart.exporting.getFormatOptions("pdf");
            options.addURL = false;
            chart.exporting.setFormatOptions("pdf", options);
        });

        am4core.ready(function() {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            // Create chart instance
            var chart = am4core.create("chartdiv", am4charts.PieChart);

            var data = {!! json_encode($klels) !!};
            chart.data = data;
            // Add data
            // chart.data = [{
            //     "country": "Lithuania",
            //     "litres": 501.9
            // }, {
            //     "country": "Czechia",
            //     "litres": 301.9
            // }, ];

            // Add and configure Series
            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "jumlah";
            pieSeries.dataFields.category = "jantina";
            pieSeries.slices.template.stroke = am4core.color("#fff");
            pieSeries.slices.template.strokeOpacity = 1;

            // This creates initial animation
            pieSeries.hiddenState.properties.opacity = 1;
            pieSeries.hiddenState.properties.endAngle = -90;
            pieSeries.hiddenState.properties.startAngle = -90;

            chart.hiddenState.properties.radius = am4core.percent(0);

            // Enable export
            chart.exporting.menu = new am4core.ExportMenu();
            chart.exporting.menu.items = [{
                "label": "...",
                "menu": [{
                        "type": "png",
                        "label": "PNG"
                    },
                    {
                        "type": "pdf",
                        "label": "PDF"
                    },
                ]
            }];
            chart.exporting.menu.align = "right";
            chart.exporting.menu.verticalAlign = "top";
            chart.exporting.filePrefix = "Kelulusan Permit mengikut Jantina";
            var title = chart.titles.create();
            if (startdate != null) {
                title.text = "Kelulusan Permit mengikut Jantina";
                var options = chart.exporting.getFormatOptions("pdf");
                options.addURL = false;
                chart.exporting.setFormatOptions("pdf", options);
            } else {
                title.text = "Kelulusan Permit mengikut Jantina";
                var options = chart.exporting.getFormatOptions("pdf");
                options.addURL = false;
                chart.exporting.setFormatOptions("pdf", options);
            }


        }); // end am4core.ready()
    </script>


    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

    <script src="https://demos.creative-tim.com/test/soft-ui-dashboard-pro/assets/js/plugins/datatables.js"
        type="text/javascript"></script>
    {{-- <script type="text/javascript">
        const dataTableBasickelulusan = new simpleDatatables.DataTable("#tablekelulusanpermit", {
            searchable: true,
            fixedHeight: true
        });
        
    </script> --}}

    <script>
        $(document).ready(function() {
            $('#tablekelulusanpermit').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        <?php 
                                if ($start_time != null && $end_time != null){
                                    ?>
                        title: 'Senarai Permit Lulus ({{ date('d-m-Y', strtotime($start_time)) }} sehingga {{ date('d-m-Y', strtotime($end_time)) }})'
                        <?php
                                }
                                else{
                                    ?>
                        title: 'Senarai Permit Lulus'
                        <?php
                                }
                                    ?>
                    },
                    {
                        extend: 'pdfHtml5',
                        <?php 
                                if ($start_time != null && $end_time != null){
                                    ?>
                        title: 'Senarai Permit Lulus ({{ date('d-m-Y', strtotime($start_time)) }} sehingga {{ date('d-m-Y', strtotime($end_time)) }})'
                        <?php
                                }
                                else{
                                    ?>
                        title: 'Senarai Permit Lulus'
                        <?php
                                }
                                    ?>
                    },
                ],
                // buttons: [{
                //         extend: 'excelHtml5',
                //         title: 'Senarai Permit Lulus'
                //     },
                //     {
                //         extend: 'pdfHtml5',
                //         title: 'Senarai Permit Lulus',
                //         orientation: 'landscape',
                //         pageSize: 'LEGAL'
                //     },
                //     // {
                //     //     extend: 'printHtml5',
                //     //     title: 'Data export'
                //     // }
                // ],
                // "oLanguage": {
                //     "sSearch": "Carian:",
                //     "sZeroRecords": "Tiada rekod ditemui",
                //     "oPaginate": {
                //         "sNext": ">",
                //         "sPrevious": "<",
                //     }
                // }
            });
        });

        $(document).ready(function() {
            $('#tablekelulusanpermitjantina').DataTable({
                dom: 'Bfrtip',
                "searching": false,
                "paging": false,
                "info": false,
                buttons: [{
                        extend: 'excelHtml5',
                        <?php 
                                if ($start_time != null && $end_time != null){
                                    ?>
                        title: 'Kelulusan Permit Mengikut Jantina ({{ date('d-m-Y', strtotime($start_time)) }} sehingga {{ date('d-m-Y', strtotime($end_time)) }})'
                        <?php
                                }
                                else{
                                    ?>
                        title: 'Kelulusan Permit Mengikut Jantina'
                        <?php
                                }
                        ?>
                    },
                    {
                        extend: 'pdfHtml5',
                        <?php 
                                if ($start_time != null && $end_time != null){
                                    ?>
                        title: 'Kelulusan Permit Mengikut Jantina ({{ date('d-m-Y', strtotime($start_time)) }} sehingga {{ date('d-m-Y', strtotime($end_time)) }})'
                        <?php
                                }
                                else{
                                    ?>
                        title: 'Kelulusan Permit Mengikut Jantina'
                        <?php
                                }
                        ?>
                    },
                ],
                // buttons: [{
                //         extend: 'excelHtml5',
                //         title: 'Kelulusan Permit Mengikut Jantina'
                //     },
                //     {
                //         extend: 'pdfHtml5',
                //         title: 'Kelulusan Permit Mengikut Jantina',
                //     },
                // ],
            });
        });

        $(document).ready(function() {
            $('#tablekelulusanpermitnegeri').DataTable({
                dom: 'Bfrtip',
                "searching": false,
                "info": false,
                "paging": false,
                pageLength: 16,
                buttons: [{
                        extend: 'excelHtml5',
                        <?php 
                                if ($start_time != null && $end_time != null){
                                    ?>
                        title: 'Kelulusan Permit Mengikut Negeri ({{ date('d-m-Y', strtotime($start_time)) }} sehingga {{ date('d-m-Y', strtotime($end_time)) }})'
                        <?php
                                }
                                else{
                                    ?>
                        title: 'Kelulusan Permit Mengikut Negeri'
                        <?php
                                }
                        ?>
                    },
                    {
                        extend: 'pdfHtml5',
                        <?php 
                                if ($start_time != null && $end_time != null){
                                    ?>
                        title: 'Kelulusan Permit Mengikut Negeri ({{ date('d-m-Y', strtotime($start_time)) }} sehingga {{ date('d-m-Y', strtotime($end_time)) }})'
                        <?php
                                }
                                else{
                                    ?>
                        title: 'Kelulusan Permit Mengikut Negeri'
                        <?php
                                }
                        ?>
                    },
                ],
                // buttons: [{
                //         extend: 'excelHtml5',
                //         title: 'Kelulusan Permit Mengikut Negeri'
                //     },
                //     {
                //         extend: 'pdfHtml5',
                //         title: 'Kelulusan Permit Mengikut Negeri',
                //     },
                // ],
            });
        });
    </script>
@stop
