@extends('layouts.base-admin-hq')

@section('content')

    <div class="container-fluid py-4">

        <div class="p-1">

            <div>
                <h4>Peratusan Permit Ditolak</h4>
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
                                            placeholder="" id="start-date" value="2018-06-12T19:30" />
                                    </div>
                                    <div class="col-3">
                                        <label for="enddate">Tarikh Akhir</label>
                                        <input class="form-control form-control-sm" type="date" name="enddate"
                                            placeholder="" id="end-date" />
                                    </div>
                                    <div class="col d-flex justify-content-start align-items-end mt-3">

                                        <button class="btn  bg-gradient-info text-uppercases m-2 " type="submit"
                                            name="search"><i class="fas fa-search"></i> cari</button>
                                        <a href="/laporan-statistik/peratusan-permit-ditolak"
                                            class="btn  bg-gradient-danger text-uppercases m-2" type="reset" name="search"
                                            (click)="reset()">set
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
                                        <h5> Permit Ditolak mengikut Jantina</h5>
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
                                        <h5> Permit Ditolak Mengikut Jantina</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body p-3">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0" id="tablepenolakanpermitjantina">
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
                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">
                                                    1</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    Lelaki
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($penolakanjantinalelaki == null)
                                                        0
                                                    @else
                                                        {{ $penolakanjantinalelaki }}
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
                                                    @if ($penolakanjantinalelaki == null)
                                                        0
                                                    @else
                                                        {{ $penolakanjantinalelaki }}
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
                                        <h5> Permit Ditolak Mengikut Negeri</h5>
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
                                        <h5> Permit Ditolak Mengikut Negeri</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body p-3">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0" id="tablepenolakanpermitnegeri">
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
                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">
                                                    1</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    Johor
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($penolakannegerijohor == null)
                                                        0
                                                    @else
                                                        {{ $penolakannegerijohor }}
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
                                                    @if ($penolakannegerikedah == null)
                                                        0
                                                    @else
                                                        {{ $penolakannegerikedah }}
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
                                                    @if ($penolakannegerikelantan == null)
                                                        0
                                                    @else
                                                        {{ $penolakannegerikelantan }}
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
                                                    @if ($penolakannegerimelaka == null)
                                                        0
                                                    @else
                                                        {{ $penolakannegerimelaka }}
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
                                                    @if ($penolakannegerinegerisembilan == null)
                                                        0
                                                    @else
                                                        {{ $penolakannegerinegerisembilan }}
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
                                                    @if ($penolakannegeripahang == null)
                                                        0
                                                    @else
                                                        {{ $penolakannegeripahang }}
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
                                                    @if ($penolakannegeripulaupinang == null)
                                                        0
                                                    @else
                                                        {{ $penolakannegeripulaupinang }}
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
                                                    @if ($penolakannegeriperak == null)
                                                        0
                                                    @else
                                                        {{ $penolakannegeriperak }}
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
                                                    @if ($penolakannegeriperlis == null)
                                                        0
                                                    @else
                                                        {{ $penolakannegeriperlis }}
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
                                                    @if ($penolakannegeriselangor == null)
                                                        0
                                                    @else
                                                        {{ $penolakannegeriselangor }}
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
                                                    @if ($penolakannegeriterengganu == null)
                                                        0
                                                    @else
                                                        {{ $penolakannegeriterengganu }}
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
                                                    @if ($penolakannegerisabah == null)
                                                        0
                                                    @else
                                                        {{ $penolakannegerisabah }}
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
                                                    @if ($penolakannegerisarawak == null)
                                                        0
                                                    @else
                                                        {{ $penolakannegerisarawak }}
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
                                                    @if ($penolakannegerikualalumpur == null)
                                                        0
                                                    @else
                                                        {{ $penolakannegerikualalumpur }}
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
                                                    @if ($penolakannegerilabuan == null)
                                                        0
                                                    @else
                                                        {{ $penolakannegerilabuan }}
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
                                                    @if ($penolakannegeriputrajaya == null)
                                                        0
                                                    @else
                                                        {{ $penolakannegeriputrajaya }}
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
                                <h5> Senarai Permit Ditolak</h5>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-3">
                        <div class="row">
                            <div class="card">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0" id="tablepermitditolak">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-center text-xs font-weight-bolder opacity-7">
                                                    No.</th>
                                                <th
                                                    class="text-uppercase text-center text-secondary font-weight-bolder opacity-7">
                                                    Jenis Permohonan</th>
                                                <th
                                                    class="text-uppercase text-center text-secondary font-weight-bolder opacity-7">
                                                    Nama Pemohon</th>
                                                <th
                                                    class="text-uppercase text-center text-secondary font-weight-bolder opacity-7">
                                                    No. Kad Pengenalan</th>
                                                <th
                                                    class="text-uppercase text-center text-secondary font-weight-bolder opacity-7">
                                                    Negeri Kutipan Permit</th>
                                                <th
                                                    class="text-uppercase text-center text-secondary font-weight-bolder opacity-7">
                                                    Tarikh Permit Ditolak</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($penolakans as $penolakan)
                                                <tr>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $loop->index + 1 }}</td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $penolakan->jenis_permohonan }}
                                                    </td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $penolakan->nama }}
                                                    </td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $penolakan->no_kp }}
                                                    </td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $penolakan->negeri_kutipan_permit }}
                                                    </td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ date('d-m-Y', strtotime($penolakan->updated_at)) }}
                                                        {{-- {{ $penolakan->updated_at }} --}}
                                                    </td>
                                                </tr>

                                            @endforeach
                                        </tbody>
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

            var data = {!! json_encode($penolaks) !!};
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
            chart.exporting.filePrefix = "Permit Ditolak mengikut Negeri";
            var title = chart.titles.create();
            title.text = "Permit Ditolak mengikut Negeri";
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

            var data = {!! json_encode($penollaks) !!};
            chart.data = data;

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
            chart.exporting.filePrefix = "Permit Ditolak mengikut Jantina";
            var title = chart.titles.create();
            title.text = "Permit Ditolak mengikut Jantina";
            var options = chart.exporting.getFormatOptions("pdf");
            options.addURL = false;
            chart.exporting.setFormatOptions("pdf", options);

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
            $('#tablepermitditolak').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        title: 'Senarai Permit Ditolak'
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Senarai Permit Ditolak'
                    },
                ],
            });
        });

        $(document).ready(function() {
            $('#tablepenolakanpermitjantina').DataTable({
                dom: 'Bfrtip',
                "searching": false,
                "paging": false,
                "info": false,
                buttons: [{
                        extend: 'excelHtml5',
                        title: 'Permit Ditolak Mengikut Jantina'
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Permit Ditolak Mengikut Jantina',
                    },
                ],
            });
        });

        $(document).ready(function() {
            $('#tablepenolakanpermitnegeri').DataTable({
                dom: 'Bfrtip',
                "searching": false,
                "info": false,
                "paging": false,
                pageLength: 4,
                buttons: [{
                        extend: 'excelHtml5',
                        title: 'Permit Ditolak Mengikut Negeri'
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Permit Ditolak Mengikut Negeri',
                    },
                ],
            });
        });
    </script>

@stop
