@extends('layouts.base-admin-hq')

@section('content')

    <div class="container-fluid py-4">

        <div class="p-1">

            <div>
                <h4>Laporan Sejarah Permohonan</h4>
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
                                        <a href="/laporan-statistik/laporan-sejarah-permohonan"
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
                                        <h5> Sejarah Permohonan mengikut Jantina</h5>
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
                                        <h5> Sejarah Permohonan mengikut Jantina</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body p-3">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0" id="tablesejarahjantina">
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
                                                    @if ($sejarahjantinalelakis == null)
                                                        0
                                                    @else
                                                        {{ $sejarahjantinalelakis }}
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
                                                    @if ($sejarahjantinaperempuans == null)
                                                        0
                                                    @else
                                                        {{ $sejarahjantinaperempuans }}
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
                                        <h5> Sejarah Permohonan mengikut Negeri</h5>
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
                                        <h5> Sejarah Permohonan mengikut Negeri</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body p-3">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0" id="tablesejarahnegeri">
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
                                                    @if ($sejarahnegerijohor == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerijohor }}
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
                                                    @if ($sejarahnegerikedah == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerikedah }}
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
                                                    @if ($sejarahnegerikelantan == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerikelantan }}
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
                                                    @if ($sejarahnegerimelaka == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerimelaka }}
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
                                                    @if ($sejarahnegerinegerisembilan == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerinegerisembilan }}
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
                                                    @if ($sejarahnegeripahang == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeripahang }}
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
                                                    @if ($sejarahnegeripulaupinang == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeripulaupinang }}
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
                                                    @if ($sejarahnegeriperak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriperak }}
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
                                                    @if ($sejarahnegeriperlis == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriperlis }}
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
                                                    @if ($sejarahnegeriselangor == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriselangor }}
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
                                                    @if ($sejarahnegeriterengganu == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriterengganu }}
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
                                                    @if ($sejarahnegerisabah == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerisabah }}
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
                                                    @if ($sejarahnegerisarawak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerisarawak }}
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
                                                    @if ($sejarahnegerikualalumpur == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerikualalumpur }}
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
                                                    @if ($sejarahnegerilabuan == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerilabuan }}
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
                                                    @if ($sejarahnegeriputrajaya == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriputrajaya }}
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
                    <div class="col-lg-12">
                        <div class="card m-2">
                            <div class="card-header" style="background-color: #f7e8ff;">

                                <div class="row mb-0">
                                    <div class="col">
                                        <h5> Sejarah Permohonan mengikut Negeri (Baharu)</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body p-3">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0" id="tablesejarahnegeribaharu">
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
                                                    Baharu</th>
                                                <th
                                                    class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                    Lulus</th>
                                                <th
                                                    class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                    Tolak</th>
                                                <th
                                                    class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                    Dalam Proses</th>
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
                                                    @if ($sejarahnegerijohorbaharu == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerijohorbaharu }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerijohorbaharululus == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerijohorbaharululus }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerijohorbaharutolak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerijohorbaharutolak }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerijohorbaharuproses == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerijohorbaharuproses }}
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
                                                    @if ($sejarahnegerikedahbaharu == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerikedahbaharu }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerikedahbaharululus == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerikedahbaharululus }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerikedahbaharutolak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerikedahbaharutolak }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerikedahbaharuproses == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerikedahbaharuproses }}
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
                                                    @if ($sejarahnegerikelantanbaharu == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerikelantanbaharu }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerikelantanbaharululus == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerikelantanbaharululus }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerikelantanbaharutolak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerikelantanbaharutolak }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerikelantanbaharuproses == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerikelantanbaharuproses }}
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
                                                    @if ($sejarahnegerimelakabaharu == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerimelakabaharu }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerimelakabaharululus == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerimelakabaharululus }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerimelakabaharutolak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerimelakabaharutolak }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerimelakabaharuproses == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerimelakabaharuproses }}
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
                                                    @if ($sejarahnegerinegerisembilanbaharu == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerinegerisembilanbaharu }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerinegerisembilanbaharululus == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerinegerisembilanbaharululus }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerinegerisembilanbaharutolak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerinegerisembilanbaharutolak }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerinegerisembilanbaharuproses == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerinegerisembilanbaharuproses }}
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
                                                    @if ($sejarahnegeripahangbaharu == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeripahangbaharu }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeripahangbaharululus == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeripahangbaharululus }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeripahangbaharutolak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeripahangbaharutolak }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeripahangbaharuproses == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeripahangbaharuproses }}
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
                                                    @if ($sejarahnegeripulaupinangbaharu == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeripulaupinangbaharu }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeripulaupinangbaharululus == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeripulaupinangbaharululus }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeripulaupinangbaharutolak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeripulaupinangbaharutolak }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeripulaupinangbaharuproses == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeripulaupinangbaharuproses }}
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
                                                    @if ($sejarahnegeriperakbaharu == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriperakbaharu }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeriperakbaharululus == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriperakbaharululus }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeriperakbaharutolak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriperakbaharutolak }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeriperakbaharuproses == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriperakbaharuproses }}
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
                                                    @if ($sejarahnegeriperlisbaharu == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriperlisbaharu }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeriperlisbaharululus == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriperlisbaharululus }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeriperlisbaharutolak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriperlisbaharutolak }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeriperlisbaharuproses == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriperlisbaharuproses }}
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
                                                    @if ($sejarahnegeriselangorbaharu == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriselangorbaharu }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeriselangorbaharululus == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriselangorbaharululus }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeriselangorbaharutolak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriselangorbaharutolak }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeriselangorbaharuproses == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriselangorbaharuproses }}
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
                                                    @if ($sejarahnegeriterengganubaharu == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriterengganubaharu }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeriterengganubaharululus == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriterengganubaharululus }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeriterengganubaharutolak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriterengganubaharutolak }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeriterengganubaharuproses == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriterengganubaharuproses }}
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
                                                    @if ($sejarahnegerisabahbaharu == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerisabahbaharu }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerisabahbaharululus == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerisabahbaharululus }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerisabahbaharutolak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerisabahbaharutolak }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerisabahbaharuproses == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerisabahbaharuproses }}
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
                                                    @if ($sejarahnegerisarawakbaharu == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerisarawakbaharu }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerisarawakbaharululus == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerisarawakbaharululus }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerisarawakbaharutolak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerisarawakbaharutolak }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerisarawakbaharuproses == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerisarawakbaharuproses }}
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
                                                    @if ($sejarahnegerikualalumpurbaharu == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerikualalumpurbaharu }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerikualalumpurbaharululus == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerikualalumpurbaharululus }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerikualalumpurbaharutolak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerikualalumpurbaharutolak }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerikualalumpurbaharuproses == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerikualalumpurbaharuproses }}
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
                                                    @if ($sejarahnegerilabuanbaharu == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerilabuanbaharu }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerilabuanbaharululus == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerilabuanbaharululus }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerilabuanbaharutolak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerilabuanbaharutolak }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerilabuanbaharuproses == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerilabuanbaharuproses }}
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
                                                    @if ($sejarahnegeriputrajayabaharu == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriputrajayabaharu }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeriputrajayabaharululus == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriputrajayabaharululus }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeriputrajayabaharutolak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriputrajayabaharutolak }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeriputrajayabaharuproses == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriputrajayabaharuproses }}
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
                    <div class="col-lg-12">
                        <div class="card m-2">
                            <div class="card-header" style="background-color: #f7e8ff;">

                                <div class="row mb-0">
                                    <div class="col">
                                        <h5> Sejarah Permohonan mengikut Negeri (Pembaharuan)</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body p-3">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0" id="tablesejarahnegeripembaharuan">
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
                                                    Pembaharuan</th>
                                                <th
                                                    class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                    Lulus</th>
                                                <th
                                                    class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                    Tolak</th>
                                                <th
                                                    class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                    Dalam Proses</th>
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
                                                    @if ($sejarahnegerijohorpembaharuan == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerijohorpembaharuan }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerijohorpembaharuanlulus == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerijohorpembaharuanlulus }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerijohorpembaharuantolak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerijohorpembaharuantolak }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerijohorpembaharuanproses == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerijohorpembaharuanproses }}
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
                                                    @if ($sejarahnegerikedahpembaharuan == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerikedahpembaharuan }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerikedahpembaharuanlulus == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerikedahpembaharuanlulus }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerikedahpembaharuantolak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerikedahpembaharuantolak }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerikedahpembaharuanproses == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerikedahpembaharuanproses }}
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
                                                    @if ($sejarahnegerikelantanpembaharuan == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerikelantanpembaharuan }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerikelantanpembaharuanlulus == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerikelantanpembaharuanlulus }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerikelantanpembaharuantolak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerikelantanpembaharuantolak }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerikelantanpembaharuanproses == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerikelantanpembaharuanproses }}
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
                                                    @if ($sejarahnegerimelakapembaharuan == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerimelakapembaharuan }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerimelakapembaharuanlulus == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerimelakapembaharuanlulus }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerimelakapembaharuantolak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerimelakapembaharuantolak }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerimelakapembaharuanproses == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerimelakapembaharuanproses }}
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
                                                    @if ($sejarahnegerinegerisembilanpembaharuan == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerinegerisembilanpembaharuan }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerinegerisembilanpembaharuanlulus == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerinegerisembilanpembaharuanlulus }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerinegerisembilanpembaharuantolak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerinegerisembilanpembaharuantolak }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerinegerisembilanpembaharuanproses == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerinegerisembilanpembaharuanproses }}
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
                                                    @if ($sejarahnegeripahangpembaharuan == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeripahangpembaharuan }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeripahangpembaharuanlulus == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeripahangpembaharuanlulus }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeripahangpembaharuantolak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeripahangpembaharuantolak }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeripahangpembaharuanproses == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeripahangpembaharuanproses }}
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
                                                    @if ($sejarahnegeripulaupinangpembaharuan == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeripulaupinangpembaharuan }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeripulaupinangpembaharuanlulus == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeripulaupinangpembaharuanlulus }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeripulaupinangpembaharuantolak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeripulaupinangpembaharuantolak }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeripulaupinangpembaharuanproses == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeripulaupinangpembaharuanproses }}
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
                                                    @if ($sejarahnegeriperakpembaharuan == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriperakpembaharuan }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeriperakpembaharuanlulus == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriperakpembaharuanlulus }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeriperakpembaharuantolak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriperakpembaharuantolak }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeriperakpembaharuanproses == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriperakpembaharuanproses }}
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
                                                    @if ($sejarahnegeriperlispembaharuan == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriperlispembaharuan }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeriperlispembaharuanlulus == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriperlispembaharuanlulus }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeriperlispembaharuantolak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriperlispembaharuantolak }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeriperlispembaharuanproses == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriperlispembaharuanproses }}
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
                                                    @if ($sejarahnegeriselangorpembaharuan == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriselangorpembaharuan }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeriselangorpembaharuanlulus == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriselangorpembaharuanlulus }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeriselangorpembaharuantolak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriselangorpembaharuantolak }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeriselangorpembaharuanproses == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriselangorpembaharuanproses }}
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
                                                    @if ($sejarahnegeriterengganupembaharuan == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriterengganupembaharuan }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeriterengganupembaharuanlulus == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriterengganupembaharuanlulus }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeriterengganupembaharuantolak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriterengganupembaharuantolak }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeriterengganupembaharuanproses == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriterengganupembaharuanproses }}
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
                                                    @if ($sejarahnegerisabahpembaharuan == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerisabahpembaharuan }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerisabahpembaharuanlulus == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerisabahpembaharuanlulus }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerisabahpembaharuantolak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerisabahpembaharuantolak }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerisabahpembaharuanproses == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerisabahpembaharuanproses }}
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
                                                    @if ($sejarahnegerisarawakpembaharuan == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerisarawakpembaharuan }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerisarawakpembaharuanlulus == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerisarawakpembaharuanlulus }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerisarawakpembaharuantolak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerisarawakpembaharuantolak }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerisarawakpembaharuanproses == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerisarawakpembaharuanproses }}
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
                                                    @if ($sejarahnegerikualalumpurpembaharuan == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerikualalumpurpembaharuan }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerikualalumpurpembaharuanlulus == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerikualalumpurpembaharuanlulus }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerikualalumpurpembaharuantolak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerikualalumpurpembaharuantolak }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerikualalumpurpembaharuanproses == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerikualalumpurpembaharuanproses }}
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
                                                    @if ($sejarahnegerilabuanpembaharuan == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerilabuanpembaharuan }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerilabuanpembaharuanlulus == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerilabuanpembaharuanlulus }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerilabuanpembaharuantolak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerilabuanpembaharuantolak }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegerilabuanpembaharuanproses == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegerilabuanpembaharuanproses }}
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
                                                    @if ($sejarahnegeriputrajayapembaharuan == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriputrajayapembaharuan }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeriputrajayapembaharuanlulus == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriputrajayapembaharuanlulus }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeriputrajayapembaharuantolak == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriputrajayapembaharuantolak }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($sejarahnegeriputrajayapembaharuanproses == null)
                                                        0
                                                    @else
                                                        {{ $sejarahnegeriputrajayapembaharuanproses }}
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
                                <h5> Senarai Sejarah Permohonan Pemohon</h5>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-3">

                        <div class="row">
                            <div class="card">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0" id="tablesejarahpermohonan">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-center text-xs font-weight-bolder opacity-7">
                                                    No.</th>
                                                <th
                                                    class="text-uppercase text-center text-secondary font-weight-bolder opacity-7">
                                                    Nama Pemohon</th>
                                                <th
                                                    class="text-uppercase text-center text-secondary font-weight-bolder opacity-7">
                                                    No. Kad Pengenalan</th>
                                                <th
                                                    class="text-uppercase text-center text-secondary font-weight-bolder opacity-7">
                                                    Jenis Permohonan</th>
                                                <th
                                                    class="text-uppercase text-center text-secondary font-weight-bolder opacity-7">
                                                    Negeri Kutipan Permit</th>
                                                <th
                                                    class="text-uppercase text-center text-secondary font-weight-bolder opacity-7">
                                                    Status Permohonan</th>
                                                <th
                                                    class="text-uppercase text-center text-secondary font-weight-bolder opacity-7">
                                                    Tarikh Lulus Permit</th>
                                                <th
                                                    class="text-uppercase text-center text-secondary font-weight-bolder opacity-7">
                                                    Tarikh Tamat Permit</th>
                                                <th
                                                    class="text-uppercase text-center text-secondary font-weight-bolder opacity-7">
                                                    Tarikh Hantar Permohonan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sejarahs as $sejarah)
                                                <tr>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $loop->index + 1 }}</td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $sejarah->nama }}
                                                    </td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $sejarah->no_kp }}
                                                    </td>
                                                    <td class="text-sm font-weight-normal">
                                                        {{ $sejarah->jenis_permohonan }}
                                                    </td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $sejarah->negeri_kutipan_permit }}
                                                    </td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{-- {{ $sejarah->status_permohonan }} --}}
                                                        @if ($sejarah->status_permohonan == 'Diluluskan')
                                                            Diluluskan
                                                        @elseif ($sejarah->status_permohonan == 'Tidak Diluluskan')
                                                            Tidak Diluluskan
                                                        @else
                                                            Dalam Proses
                                                        @endif
                                                    </td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ date('d-m-Y', strtotime($sejarah->tarikh_diluluskan)) }}
                                                    </td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ date('d-m-Y', strtotime($sejarah->tarikh_tamat_permit)) }}
                                                    </td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ date('d-m-Y', strtotime($sejarah->updated_at)) }}
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

            var data = {!! json_encode($sejahs) !!};
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
            chart.exporting.filePrefix = "Sejarah Permohonan mengikut Negeri";
            var title = chart.titles.create();
            title.text = "Sejarah Permohonan mengikut Negeri";
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

            var data = {!! json_encode($sejs) !!};
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
            chart.exporting.filePrefix = "Sejarah Permohonan mengikut Jantina";
            var title = chart.titles.create();
            title.text = "Sejarah Permohonan mengikut Jantina";
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
            $('#tablesejarahpermohonan').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        // title: 'Senarai Sejarah Permohonan Pemohon'
                        <?php 
                                if ($start_time != null && $end_time != null){
                                    ?>
                        title: 'Senarai Sejarah Permohonan Pemohon ({{ date('d-m-Y', strtotime($start_time)) }} sehingga {{ date('d-m-Y', strtotime($end_time)) }})'
                        <?php
                                }
                                else{
                                    ?>
                        title: 'Senarai Sejarah Permohonan Pemohon'
                        <?php
                                }
                        ?>
                    },
                    {
                        extend: 'pdfHtml5',
                        <?php 
                                if ($start_time != null && $end_time != null){
                                    ?>
                        title: 'Senarai Sejarah Permohonan Pemohon ({{ date('d-m-Y', strtotime($start_time)) }} sehingga {{ date('d-m-Y', strtotime($end_time)) }})'
                        <?php
                                }
                                else{
                                    ?>
                        title: 'Senarai Sejarah Permohonan Pemohon'
                        <?php
                                }
                        ?>
                        // title: 'Senarai Sejarah Permohonan Pemohon'
                    },
                ],
            });
        });

        $(document).ready(function() {
            $('#tablesejarahjantina').DataTable({
                dom: 'Bfrtip',
                "searching": false,
                "paging": false,
                "info": false,
                buttons: [{
                        extend: 'excelHtml5',
                        // title: 'Sejarah Permohonan Mengikut Jantina'
                        <?php 
                                if ($start_time != null && $end_time != null){
                                    ?>
                        title: 'Sejarah Permohonan Mengikut Jantina ({{ date('d-m-Y', strtotime($start_time)) }} sehingga {{ date('d-m-Y', strtotime($end_time)) }})'
                        <?php
                                }
                                else{
                                    ?>
                        title: 'Sejarah Permohonan Mengikut Jantina'
                        <?php
                                }
                        ?>
                    },
                    // {
                    //     extend: 'pdfHtml5',
                    //     title: 'Sejarah Permohonan Mengikut Jantina',
                    // },
                    {
                        extend: 'pdfHtml5',
                        <?php 
                                if ($start_time != null && $end_time != null){
                                    ?>
                        title: 'Sejarah Permohonan Mengikut Jantina ({{ date('d-m-Y', strtotime($start_time)) }} sehingga {{ date('d-m-Y', strtotime($end_time)) }})'
                        <?php
                                }
                                else{
                                    ?>
                        title: 'Sejarah Permohonan Mengikut Jantina'
                        <?php
                                }
                        ?>
                    },
                ],
            });
        });

        $(document).ready(function() {
            $('#tablesejarahnegeri').DataTable({
                dom: 'Bfrtip',
                "searching": false,
                "info": false,
                "paging": false,
                pageLength: 16,
                buttons: [{
                        extend: 'excelHtml5',
                        // title: 'Sejarah Permohonan Mengikut Negeri'
                        <?php 
                                if ($start_time != null && $end_time != null){
                                    ?>
                        title: 'Sejarah Permohonan Mengikut Negeri ({{ date('d-m-Y', strtotime($start_time)) }} sehingga {{ date('d-m-Y', strtotime($end_time)) }})'
                        <?php
                                }
                                else{
                                    ?>
                        title: 'Sejarah Permohonan Mengikut Negeri'
                        <?php
                                }
                        ?>
                    },
                    // {
                    //     extend: 'pdfHtml5',
                    //     title: 'Sejarah Permohonan Mengikut Negeri',
                    // },
                    {
                        extend: 'pdfHtml5',
                        <?php 
                                if ($start_time != null && $end_time != null){
                                    ?>
                        title: 'Sejarah Permohonan Mengikut Negeri ({{ date('d-m-Y', strtotime($start_time)) }} sehingga {{ date('d-m-Y', strtotime($end_time)) }})'
                        <?php
                                }
                                else{
                                    ?>
                        title: 'Sejarah Permohonan Mengikut Negeri'
                        <?php
                                }
                        ?>
                    },
                ],
            });
        });

        $(document).ready(function() {
            $('#tablesejarahnegeribaharu').DataTable({
                dom: 'Bfrtip',
                "searching": false,
                "info": false,
                "paging": false,
                pageLength: 16,
                buttons: [{
                        extend: 'excelHtml5',
                        // title: 'Sejarah Permohonan Mengikut Negeri (Baharu)'
                        <?php 
                                if ($start_time != null && $end_time != null){
                                    ?>
                        title: 'Sejarah Permohonan Mengikut Negeri (Baharu) ({{ date('d-m-Y', strtotime($start_time)) }} sehingga {{ date('d-m-Y', strtotime($end_time)) }})'
                        <?php
                                }
                                else{
                                    ?>
                        title: 'Sejarah Permohonan Mengikut Negeri (Baharu)'
                        <?php
                                }
                        ?>
                    },
                    // {
                    //     extend: 'pdfHtml5',
                    //     title: 'Sejarah Permohonan Mengikut Negeri',
                    // },
                    {
                        extend: 'pdfHtml5',
                        <?php 
                                if ($start_time != null && $end_time != null){
                                    ?>
                        title: 'Sejarah Permohonan Mengikut Negeri (Baharu) ({{ date('d-m-Y', strtotime($start_time)) }} sehingga {{ date('d-m-Y', strtotime($end_time)) }})'
                        <?php
                                }
                                else{
                                    ?>
                        title: 'Sejarah Permohonan Mengikut Negeri (Baharu)'
                        <?php
                                }
                        ?>
                    },
                ],
            });
        });
        $(document).ready(function() {
            $('#tablesejarahnegeripembaharuan').DataTable({
                dom: 'Bfrtip',
                "searching": false,
                "info": false,
                "paging": false,
                pageLength: 16,
                buttons: [{
                        extend: 'excelHtml5',
                        // title: 'Sejarah Permohonan Mengikut Negeri (Pembaharuan)'
                        <?php 
                                if ($start_time != null && $end_time != null){
                                    ?>
                        title: 'Sejarah Permohonan Mengikut Negeri (Pembaharuan) ({{ date('d-m-Y', strtotime($start_time)) }} sehingga {{ date('d-m-Y', strtotime($end_time)) }})'
                        <?php
                                }
                                else{
                                    ?>
                        title: 'Sejarah Permohonan Mengikut Negeri (Pembaharuan)'
                        <?php
                                }
                        ?>
                    },
                    // {
                    //     extend: 'pdfHtml5',
                    //     title: 'Sejarah Permohonan Mengikut Negeri',
                    // },
                    {
                        extend: 'pdfHtml5',
                        <?php 
                                if ($start_time != null && $end_time != null){
                                    ?>
                        title: 'Sejarah Permohonan Mengikut Negeri (Pembaharuan) ({{ date('d-m-Y', strtotime($start_time)) }} sehingga {{ date('d-m-Y', strtotime($end_time)) }})'
                        <?php
                                }
                                else{
                                    ?>
                        title: 'Sejarah Permohonan Mengikut Negeri (Pembaharuan)'
                        <?php
                                }
                        ?>
                    },
                ],
            });
        });
    </script>

@stop
