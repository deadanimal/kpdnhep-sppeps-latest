@extends('layouts.base-admin-hq')

@section('content')

    <div class="container-fluid py-4">
        <div class="wrapper">
            <div id="formContent">

                <div class="p-3">

                    <div>
                        <h5>Semakan Permohonan</h5>
                    </div>

                    <div class="container-fluid mt-4" style="padding: 0px !important;">
                        <div class="card">

                            <div class="card-header" style="background-color: #f7e8ff;">
                                <h6> Carian Permohonan</h6>
                            </div>

                            <div class="card-body p-3">
                                <div class="row p-3 mb-0">
                                    <form method="POST" action="/cari-tugasan-selesai">
                                        @csrf
                                        <div class="row">
                                            <div class="col">
                                                <input class="form-control form-control-sm" type="text" name="no_kp"
                                                    placeholder="No Kad Pengenalan" />
                                            </div>

                                            <div class="col">
                                                <select class="form-control form-control-sm" name="negeri">
                                                    <option value="null">--Pilih Negeri--</option>
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
                                            </div>

                                            <div class="col">
                                                <select class="form-control form-control-sm" name="jenis_permohonan">
                                                    <option value="null">Pilih Jenis Permohonan</option>
                                                    <option value="Baharu">Permohonan Baharu</option>
                                                    <option value="Pembaharuan">Permohonan Pembaharuan</option>
                                                    <option value="Pendua">Permohonan Pendua</option>
                                                    <option value="Rayuan">Permohonan Rayuan</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <button class="btn btn-sm btn-info text-uppercases text-white"
                                                    type="submit"><i class="fas fa-search fa-2x"></i> Cari</button>
                                                <a href="/tugasan-selesai" class="btn btn-sm btn-danger">Set Semula</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="container-fluid mt-4" style="padding: 0px !important;">
                        <div class="card">

                            <div class="card-header" style="background-color: #f7e8ff;">
                                <h6> Tugasan Selesai</h6>
                            </div>

                            <div class="card-body p-3">

                                <div class="card">
                                    <div class="table-responsive">
                                        <table class="table align-items-center mb-0 table-flush" id="datatable-basic">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                        No.</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                        TARIKH Disemak</th>
                                                    <th
                                                        class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                        JENIS PERMOHONAN</th>
                                                    <th
                                                        class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                        NAMA PEMOHON</th>
                                                    <th
                                                        class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                        NO KAD PENGENALAN</th>
                                                    <th
                                                        class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                        NEGERI</th>
                                                    <th
                                                        class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                        Catatan</th>

                                                    <th
                                                        class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                        Status</th>
                                                    <!-- <th class="text-uppercase text-center text-secondary text-xs opacity-7">Tindakan</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($permohonan as $permohonan)
                                                    <tr>
                                                        <td>
                                                            <span class="text-secondary text-sm font-weight-bold">1</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="text-secondary text-sm font-weight-bold">{{ $permohonan->updated_at }}</span>
                                                        </td>
                                                        <td class="align-middle text-center text-sm">
                                                            <span class="text-secondary text-sm font-weight-bold">
                                                                {{ $permohonan->jenis_permohonan }}</span>
                                                        </td>
                                                        <td class="align-middle text-center text-sm">
                                                            <span class="text-secondary text-sm font-weight-bold">
                                                                {{ $permohonan->nama }}</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span
                                                                class="text-secondary text-sm font-weight-bold">{{ $permohonan->no_kp }}</span>
                                                        </td>
                                                        <td class="align-middle text-center text-sm">
                                                            <span class="text-secondary text-sm font-weight-bold">
                                                                {{ $permohonan->negeri }}</span>
                                                        </td>
                                                        <td class="align-middle text-center text-sm">
                                                            <span class="text-secondary text-sm font-weight-bold">
                                                                {{ $permohonan->catatan_pelulus }}</span>
                                                        </td>
                                                        </td>
                                                        <td class="align-middle text-center text-sm">
                                                            @if ($permohonan->status_permohonan === 'Diluluskan')
                                                                <span class="badge badge-success"> Diluluskan</span>
                                                            @elseif ($permohonan->status_permohonan ===
                                                                'Tidak Diluluskan')
                                                                <span class="badge badge-danger"> Tidak Diluluskan</span>
                                                            
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                <!-- <tr>
                                                            <td>
                                                                <span class="text-secondary text-sm font-weight-bold">1</span>
                                                            </td>
                                                            <td>
                                                                <span class="text-secondary text-sm font-weight-bold">22/11/2021 10:39:12</span>
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                <span class="text-secondary text-sm font-weight-bold"> Permohonan Baharu</span>
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                <span class="text-secondary text-sm font-weight-bold"> Abu Samad</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span class="text-secondary text-sm font-weight-bold">981209089989</span>
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                <span class="text-secondary text-sm font-weight-bold"> Selangor</span>
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                <span class="text-secondary text-sm font-weight-bold"> Catatan 1</span>
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                <span class="badge badge-success"> Telah Dihantar ke PDRM</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <a href="">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                            </td>
                                                        </tr> -->
                                                <!-- <tr>
                                                            <td>
                                                                <span class="text-secondary text-sm font-weight-bold">1</span>
                                                            </td>
                                                            <td>
                                                                <span class="text-secondary text-sm font-weight-bold">22/11/2021 10:39:12</span>
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                <span class="text-secondary text-sm font-weight-bold"> Permohonan Baharu</span>
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                <span class="text-secondary text-sm font-weight-bold"> Abu Samad</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span class="text-secondary text-sm font-weight-bold">981209089989</span>
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                <span class="text-secondary text-sm font-weight-bold"> Selangor</span>
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                <span class="text-secondary text-sm font-weight-bold"> Catatan 2</span>
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                <span class="badge badge-success"> Telah Dihantar Ke Penyokong</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <a href="">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <span class="text-secondary text-sm font-weight-bold">1</span>
                                                            </td>
                                                            <td>
                                                                <span class="text-secondary text-sm font-weight-bold">22/11/2021 10:39:12</span>
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                <span class="text-secondary text-sm font-weight-bold"> Permohonan Rayuan</span>
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                <span class="text-secondary text-sm font-weight-bold"> Abu Samad</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span class="text-secondary text-sm font-weight-bold">981209089989</span>
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                <span class="text-secondary text-sm font-weight-bold"> Selangor</span>
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                <span class="text-secondary text-sm font-weight-bold"> Catatan 3</span>
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                <span class="badge badge-success">Diluluskan</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <a href="">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span class="text-secondary text-sm font-weight-bold">1</span>
                                                            </td>
                                                            <td>
                                                                <span class="text-secondary text-sm font-weight-bold">22/11/2021 10:39:12</span>
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                <span class="text-secondary text-sm font-weight-bold"> Permohonan Pendua</span>
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                <span class="text-secondary text-sm font-weight-bold"> Abu Samad</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span class="text-secondary text-sm font-weight-bold">981209089989</span>
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                <span class="text-secondary text-sm font-weight-bold"> Selangor</span>
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                <span class="text-secondary text-sm font-weight-bold">Catatan 4 </span>
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                <span class="badge badge-danger"> Tidak Diluluskan</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <a href="">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                            </td>
                                                        </tr> -->
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


    </div>
    <script src="https://demos.creative-tim.com/test/soft-ui-dashboard-pro/assets/js/plugins/datatables.js"
        type="text/javascript"></script>
    <script type="text/javascript">
        const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
            searchable: false,
            fixedHeight: true
        });
    </script>

@stop
