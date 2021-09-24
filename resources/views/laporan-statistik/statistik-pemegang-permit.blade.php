@extends('layouts.base-admin-hq')

@section('content')

    <div class="container-fluid py-4">


        <div class="p-3">
            <div>
                <h4>Statistik Pemegang Permit</h4>
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
                                        <a href="/laporan-statistik/statistik-pemegang-permit"
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
                                        <h5> Pemegang Permit yang Sah dan Aktif Mengikut Jantina</h5>
                                        <label> Graf ini hanya menunjukkan bulan di dalam tahun <?php $year = date('Y');
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
                                        <h5> Pemegang Permit yang Sah dan Aktif Mengikut Jantina</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body p-3">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0" id="tablepegangpermitjantina">
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
                                            @foreach ($pegangpermitjantinas as $pegangpermitjantina)
                                                <tr>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $loop->index + 1 }}</td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $pegangpermitjantina->jantina }}
                                                    </td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $pegangpermitjantina->jumlah }}
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

            <div class="container-fluid mt-4">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card m-2">

                            <div class="card-header" style="background-color: #f7e8ff;">

                                <div class="row mb-0">
                                    <div class="col">
                                        <h5> Pemegang Permit yang Sah dan Aktif Mengikut Negeri</h5>
                                        <label> Graf ini hanya menunjukkan bulan di dalam tahun <?php $year = date('Y');
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
                                        <h5> Pemegang Permit yang Sah dan Aktif Mengikut Negeri</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body p-3">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0" id="tablepegangpermitnegeri">
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
                                            @foreach ($pegangpermitnegeris as $pegangpermitnegeri)
                                                <tr>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $loop->index + 1 }}</td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $pegangpermitnegeri->negeri_kutipan_permit }}
                                                    </td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $pegangpermitnegeri->jumlah }}
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

            <div class="container-fluid mt-4">
                <div class="card m-2">

                    <div class="card-header" style="background-color: #f7e8ff;">

                        <div class="row mb-0">
                            <div class="col">
                                <h5> Senarai Pemegang Permit yang Sah dan Aktif</h5>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-3">

                        <div class="row">
                            <div class="card">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0" id="tablepegangpermit">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-center text-xs font-weight-bolder opacity-7">
                                                    No.</th>
                                                <th
                                                    class="text-uppercase text-center text-secondary font-weight-bolder opacity-7">
                                                    No. Permit</th>
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
                                                    Jenis Permohonan</th>
                                                <th
                                                    class="text-uppercase text-center text-secondary font-weight-bolder opacity-7">
                                                    Tempoh Sah Laku</th>
                                                <th
                                                    class="text-uppercase text-center text-secondary font-weight-bolder opacity-7">
                                                    Tarikh Mula</th>
                                                <th
                                                    class="text-uppercase text-center text-secondary font-weight-bolder opacity-7">
                                                    Tarikh Tamat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pegangpermits as $pegangpermit)
                                                <tr>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $loop->index + 1 }}</td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $pegangpermit->no_permit }}
                                                    </td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $pegangpermit->nama }}
                                                    </td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $pegangpermit->no_kp }}
                                                    </td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $pegangpermit->negeri_kutipan_permit }}
                                                    </td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $pegangpermit->jenis_permohonan }}
                                                    </td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $pegangpermit->tempoh_kelulusan }}
                                                    </td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ date('d-m-Y', strtotime($pegangpermit->tarikh_diluluskan)) }}
                                                    </td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ date('d-m-Y', strtotime($pegangpermit->tarikh_tamat_permit)) }}
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



        <!-- Styles -->
        <style>
            #chartdiv,
            #chartdiv2 {
                width: 100%;
                height: 500px;
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

                var data = {!! json_encode($pegapermit) !!};
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

                createSeries("Kedah", "Kedah");
                createSeries("Selangor", "Selangor");
                createSeries("Pulau Pinang", "Pulau Pinang");
                createSeries("Perak", "Perak");
                createSeries("Melaka", "Melaka");
                createSeries("Negeri Sembilan", "Negeri Sembilan");
                createSeries("Johor", "Johor");
                createSeries("Pahang", "Pahang");
                createSeries("Terengganu", "Terengganu");
                createSeries("Kelantan", "Kelantan");
                createSeries("Sabah", "Sabah");
                createSeries("Sarawak", "Sarawak");
                createSeries("WP Kuala Lumpur", "W. P. Kuala Lumpur");
                createSeries("WP Putrajaya", "W. P. Putrajaya");
                createSeries("WP Labuan", "W. P. Labuan");
                createSeries("Perlis", "Perlis");

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
                chart.exporting.filePrefix = "Pemegang Permit yang Sah dan Aktif mengikut Negeri";
                var title = chart.titles.create();
                title.text = "Pemegang Permit yang Sah dan Aktif mengikut Negeri";
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

                var data = {!! json_encode($pegpermit) !!};
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
                chart.exporting.filePrefix = "Pemegang Permit yang Sah dan Aktif mengikut Jantina";
                var title = chart.titles.create();
                title.text = "Pemegang Permit yang Sah dan Aktif mengikut Jantina";
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
                $('#tablepegangpermit').DataTable({
                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'excelHtml5',
                            title: 'Senarai Pemegang Permit yang Sah dan Aktif'
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Senarai Pemegang Permit yang Sah dan Aktif'
                        },
                    ],
                });
            });

            $(document).ready(function() {
                $('#tablepegangpermitjantina').DataTable({
                    dom: 'Bfrtip',
                    "searching": false,
                    "paging": false,
                    "info": false,
                    buttons: [{
                            extend: 'excelHtml5',
                            title: 'Kelulusan Permit Mengikut Jantina'
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Kelulusan Permit Mengikut Jantina',
                        },
                    ],
                });
            });

            $(document).ready(function() {
                $('#tablepegangpermitnegeri').DataTable({
                    dom: 'Bfrtip',
                    "searching": false,
                    "info": false,
                    pageLength: 4,
                    buttons: [{
                            extend: 'excelHtml5',
                            title: 'Kelulusan Permit Mengikut Negeri'
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Kelulusan Permit Mengikut Negeri',
                        },
                    ],
                });
            });
        </script>

    @stop
