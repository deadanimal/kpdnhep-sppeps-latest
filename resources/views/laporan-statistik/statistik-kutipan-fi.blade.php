@extends('layouts.base-admin-hq')

@section('content')

    <div class="container-fluid py-4">

        <div class="p-3">

            <div>
                <h4>Statistik Kutipan FI</h4>
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
                                        <button class="btn  bg-gradient-danger text-uppercases m-2" type="reset"
                                            name="search" (click)="reset()">set
                                            semula</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid mt-4">
                <div class="card m-2">

                    <div class="card-header" style="background-color: #f7e8ff;">
                        <!-- <h5> Kelulusan Permit Mengikut Jantina</h5> -->
                        <div class="row mb-0">
                            <div class="col">
                                <h5> Kutipan FI mengikut Jantina</h5>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <select class="btn btn-sm btn-primary dropdown-toggle" id="selectid">
                                    <option disabled selected hidden><b>Cetak</b></option>
                                    <option class="dropdown-item" value="PDF">Pdf</option>
                                    <option class="dropdown-item" value="XLSX">Excel</option>
                                </select>
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

            <div class="container-fluid mt-4">
                <div class="card m-2">

                    <div class="card-header" style="background-color: #f7e8ff;">
                        <!-- <h5> Kelulusan Permit Mengikut Negeri</h5> -->
                        <div class="row mb-0">
                            <div class="col">
                                <h5> Kutipan FI mengikut Negeri</h5>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <select class="btn btn-sm btn-primary dropdown-toggle" id="selectid">
                                    <option disabled selected hidden><b>Cetak</b></option>
                                    <option class="dropdown-item" value="PDF">Pdf</option>
                                    <option class="dropdown-item" value="XLSX">Excel</option>
                                </select>
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

            <div class="container-fluid mt-4">
                <div class="card m-2">

                    <div class="card-header" style="background-color: #f7e8ff;">

                        <div class="row mb-0">
                            <div class="col">
                                <h5> Jumlah Kutipan FI</h5>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-3">

                        <div class="row p-3 mb-0">
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
                        </div>

                        <div class="row">
                            <div class="card">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0" id="tablekutipanfi">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                    No.</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                    No. Permit</th>
                                                <th
                                                    class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                    Nama Pemohon</th>
                                                <th
                                                    class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                    No. Kad Pengenalan</th>
                                                <th
                                                    class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                    Negeri</th>
                                                <th
                                                    class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                    Jenis Permohonan</th>
                                                <th
                                                    class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                    Jumlah Bayaran</th>
                                                <th
                                                    class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                    Tempoh Sah Laku</th>
                                                <th
                                                    class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                    Tarikh Bayaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kutipanfis as $kutipanfi)
                                                <tr>
                                                    <td class="text-sm font-weight-normal">{{ $loop->index + 1 }}</td>
                                                    <td class="text-sm font-weight-normal">{{ $kutipanfi->no_permit }}
                                                    </td>
                                                    <td class="text-sm font-weight-normal">{{ $kutipanfi->nama }}
                                                    </td>
                                                    <td class="text-sm font-weight-normal">{{ $kutipanfi->no_kp }}
                                                    </td>
                                                    <td class="text-sm font-weight-normal">{{ $kutipanfi->negeri }}
                                                    </td>
                                                    <td class="text-sm font-weight-normal">
                                                        {{ $kutipanfi->jenis_permohonan }}
                                                    </td>
                                                    <td class="text-sm font-weight-normal">{{ $kutipanfi->created_at }}
                                                    </td>
                                                    <td class="text-sm font-weight-normal">{{ $kutipanfi->updated_at }}
                                                    </td>
                                                    <td class="text-sm font-weight-normal">{{ $kutipanfi->updated_at }}
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

            var chart = am4core.create("chartdiv2", am4charts.XYChart);

            var data = {!! json_encode($kutipfis) !!};
            chart.data = data;

            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "year";
            categoryAxis.renderer.grid.template.location = 0;


            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.inside = true;
            valueAxis.renderer.labels.template.disabled = true;
            valueAxis.min = 0;

            function createSeries(field, name) {

                var series = chart.series.push(new am4charts.ColumnSeries());
                series.name = name;
                series.dataFields.valueY = field;
                series.dataFields.categoryX = "year";
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
            createSeries("selangor", "Selangor");
            createSeries("Sabah", "Sabah");
            createSeries("Sarawak", "Sarawak");
            createSeries("WP Kuala Lumpur", "W. P. Kuala Lumpur");
            createSeries("WP Putrajaya", "W. P. Putrajaya");
            createSeries("WP Labuan", "W. P. Labuan");

            // Legend
            chart.legend = new am4charts.Legend();

            // Enable export
            chart.exporting.menu = new am4core.ExportMenu();
            chart.exporting.menu.align = "right";
            chart.exporting.menu.verticalAlign = "top";
            chart.exporting.filePrefix = "Kutipan FI mengikut Negeri";
        });
        am4core.ready(function() {

            am4core.useTheme(am4themes_animated);

            var chart = am4core.create("chartdiv", am4charts.XYChart);

            var data = {!! json_encode($kutips) !!};
            chart.data = data;

            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "month";
            categoryAxis.renderer.grid.template.location = 0;


            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.inside = true;
            valueAxis.renderer.labels.template.disabled = true;
            valueAxis.min = 0;

            function createSeries(field, name) {

                var series = chart.series.push(new am4charts.ColumnSeries());
                series.name = name;
                series.dataFields.valueY = field;
                series.dataFields.categoryX = "month";
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

            createSeries("lelaki", "Lelaki");
            createSeries("perempuan", "Perempuan");

            // Legend
            chart.legend = new am4charts.Legend();

            // Enable export
            chart.exporting.menu = new am4core.ExportMenu();
            chart.exporting.menu.align = "right";
            chart.exporting.menu.verticalAlign = "top";
            chart.exporting.filePrefix = "Kutipan FI mengikut Jantina";
        });
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
            $('#tablekutipanfi').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        title: 'Jumlah Kutipan FI'
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Jumlah Kutipan FI'
                    },
                    // {
                    //     extend: 'printHtml5',
                    //     title: 'Data export'
                    // }
                ],

                // initComplete: function() {
                //     this.api().columns().every(function() {
                //         var column = this;
                //         var select = $('<select><option value=""></option></select>')
                //             .appendTo($(column.footer()).empty())
                //             .on('change', function() {
                //                 var val = $.fn.dataTable.util.escapeRegex(
                //                     $(this).val()
                //                 );

                //                 column
                //                     .search(val ? '^' + val + '$' : '', true, false)
                //                     .draw();
                //             });

                //         column.data().unique().sort().each(function(d, j) {
                //             select.append('<option value="' + d + '">' + d +
                //                 '</option>')
                //         });
                //     });
                // }
            });
        });
    </script>

@stop
