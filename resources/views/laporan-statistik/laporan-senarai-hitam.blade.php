@extends('layouts.base-admin-hq')

@section('content')

    <div class="container-fluid py-4">

        <div class="p-3">

            <div>
                <h4>Laporan Permohonan Disenarai Hitam</h4>
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

                        <div class="row mb-0">
                            <div class="col">
                                <h5> Permohonan Disenarai Hitam mengikut Jantina</h5>
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

                        <div class="row mb-0">
                            <div class="col">
                                <h5> Permohonan Disenarai Hitam mengikut Negeri</h5>
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
                                <h5> Senarai Pemohon Disenarai Hitam</h5>
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
                                    <table class="table align-items-center mb-0" id="tablesenaraihitam">
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
                                                    class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                    Tarikh Disenarai Hitam</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($senaraihitams as $senaraihitam)
                                                <tr>
                                                    <td class="text-sm font-weight-normal">{{ $loop->index + 1 }}</td>
                                                    <td class="text-sm font-weight-normal">{{ $senaraihitam->no_permit }}
                                                    </td>
                                                    <td class="text-sm font-weight-normal">{{ $senaraihitam->nama }}
                                                    </td>
                                                    <td class="text-sm font-weight-normal">{{ $senaraihitam->no_kp }}
                                                    </td>
                                                    <td class="text-sm font-weight-normal">{{ $senaraihitam->negeri }}
                                                    </td>
                                                    <td class="text-sm font-weight-normal">
                                                        {{ $senaraihitam->jenis_permohonan }}
                                                    </td>
                                                    <td class="text-sm font-weight-normal">{{ $senaraihitam->updated_at }}
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

            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            // Create chart instance
            var chart = am4core.create("chartdiv", am4charts.XYChart);

            //

            // Increase contrast by taking evey second color
            chart.colors.step = 2;

            // Add data
            chart.data = generateChartData();

            // Create axes
            var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
            dateAxis.renderer.minGridDistance = 50;

            // Create series
            function createAxisAndSeries(field, name, opposite, bullet) {
                var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
                if (chart.yAxes.indexOf(valueAxis) != 0) {
                    valueAxis.syncWithAxis = chart.yAxes.getIndex(0);
                }

                var series = chart.series.push(new am4charts.LineSeries());
                series.dataFields.valueY = field;
                series.dataFields.dateX = "date";
                series.strokeWidth = 2;
                series.yAxis = valueAxis;
                series.name = name;
                series.tooltipText = "{name}: [bold]{valueY}[/]";
                series.tensionX = 0.8;
                series.showOnInit = true;

                var interfaceColors = new am4core.InterfaceColorSet();

                switch (bullet) {
                    case "triangle":
                        var bullet = series.bullets.push(new am4charts.Bullet());
                        bullet.width = 12;
                        bullet.height = 12;
                        bullet.horizontalCenter = "middle";
                        bullet.verticalCenter = "middle";

                        var triangle = bullet.createChild(am4core.Triangle);
                        triangle.stroke = interfaceColors.getFor("background");
                        triangle.strokeWidth = 2;
                        triangle.direction = "top";
                        triangle.width = 12;
                        triangle.height = 12;
                        break;
                    case "rectangle":
                        var bullet = series.bullets.push(new am4charts.Bullet());
                        bullet.width = 10;
                        bullet.height = 10;
                        bullet.horizontalCenter = "middle";
                        bullet.verticalCenter = "middle";

                        var rectangle = bullet.createChild(am4core.Rectangle);
                        rectangle.stroke = interfaceColors.getFor("background");
                        rectangle.strokeWidth = 2;
                        rectangle.width = 10;
                        rectangle.height = 10;
                        break;
                    default:
                        var bullet = series.bullets.push(new am4charts.CircleBullet());
                        bullet.circle.stroke = interfaceColors.getFor("background");
                        bullet.circle.strokeWidth = 2;
                        break;
                }

                valueAxis.renderer.line.strokeOpacity = 1;
                valueAxis.renderer.line.strokeWidth = 2;
                valueAxis.renderer.line.stroke = series.stroke;
                valueAxis.renderer.labels.template.fill = series.stroke;
                valueAxis.renderer.opposite = opposite;
            }

            createAxisAndSeries("visits", "Visits", false, "circle");
            createAxisAndSeries("views", "Views", true, "triangle");
            createAxisAndSeries("hits", "Hits", true, "rectangle");

            // Add legend
            chart.legend = new am4charts.Legend();

            // Add cursor
            chart.cursor = new am4charts.XYCursor();

            // generate some random data, quite different range
            function generateChartData() {
                var chartData = [];
                var firstDate = new Date();
                firstDate.setDate(firstDate.getDate() - 100);
                firstDate.setHours(0, 0, 0, 0);

                var visits = 1600;
                var hits = 2900;
                var views = 8700;

                for (var i = 0; i < 15; i++) {
                    // we create date objects here. In your data, you can have date strings
                    // and then set format of your dates using chart.dataDateFormat property,
                    // however when possible, use date objects, as this will speed up chart rendering.
                    var newDate = new Date(firstDate);
                    newDate.setDate(newDate.getDate() + i);

                    visits += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
                    hits += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
                    views += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);

                    chartData.push({
                        date: newDate,
                        visits: visits,
                        hits: hits,
                        views: views
                    });
                }
                return chartData;
            }

        }); // end am4core.ready()

        am4core.ready(function() {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            // Create chart instance
            var chart = am4core.create("chartdiv2", am4charts.XYChart);


            // Add data
            chart.data = [{
                "year": "2016",
                "europe": 2.5,
                "namerica": 2.5,
                "asia": 2.1,
                "lamerica": 0.3,
                "meast": 0.2,
                "africa": 0.1
            }, {
                "year": "2017",
                "europe": 2.6,
                "namerica": 2.7,
                "asia": 2.2,
                "lamerica": 0.3,
                "meast": 0.3,
                "africa": 0.1
            }, {
                "year": "2018",
                "europe": 2.8,
                "namerica": 2.9,
                "asia": 2.4,
                "lamerica": 0.3,
                "meast": 0.3,
                "africa": 0.1
            }];

            // Create axes
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "year";
            categoryAxis.renderer.grid.template.location = 0;


            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.inside = true;
            valueAxis.renderer.labels.template.disabled = true;
            valueAxis.min = 0;

            // Create series
            function createSeries(field, name) {

                // Set up series
                var series = chart.series.push(new am4charts.ColumnSeries());
                series.name = name;
                series.dataFields.valueY = field;
                series.dataFields.categoryX = "year";
                series.sequencedInterpolation = true;

                // Make it stacked
                series.stacked = true;

                // Configure columns
                series.columns.template.width = am4core.percent(60);
                series.columns.template.tooltipText = "[bold]{name}[/]\n[font-size:14px]{categoryX}: {valueY}";

                // Add label
                var labelBullet = series.bullets.push(new am4charts.LabelBullet());
                labelBullet.label.text = "{valueY}";
                labelBullet.locationY = 0.5;
                labelBullet.label.hideOversized = true;

                return series;
            }

            createSeries("europe", "Europe");
            createSeries("namerica", "North America");
            createSeries("asia", "Asia-Pacific");
            createSeries("lamerica", "Latin America");
            createSeries("meast", "Middle-East");
            createSeries("africa", "Africa");

            // Legend
            chart.legend = new am4charts.Legend();

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
            $('#tablesenaraihitam').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf', 'print'
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
