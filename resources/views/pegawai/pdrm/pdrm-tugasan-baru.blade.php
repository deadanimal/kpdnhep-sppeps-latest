@extends('layouts.base-admin-hq')

@section('content')



    <div class="container-fluid py-4">

        <div class="p-3">

            <div>
                <h5>Semakan Rekod Jenayah</h5>
            </div>

            {{-- <div class="row">
                <div class="col col-md-4">
                    <div class="card card-stats p-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="h6 card-title text-uppercase text-muted mb-0">
                                        permohonan
                                    </h5>

                                    <span class="h5 font-weight-bold mb-0"> 1050 </span>
                                </div>

                                <div class="col-auto">
                                    <div class="p-2"
                                        style="background-color: rgb(168, 228, 252); border-radius:8px; width:fit-content">
                                        <i class="fas fa-file-alt fa-2x" style="color: rgb(51, 142, 245);"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col col-md-4">
                    <div class="card card-stats p-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="h6 card-title text-uppercase text-muted mb-0">
                                        dalam proses
                                    </h5>

                                    <span class="h5 font-weight-bold mb-0"> 1050 </span>
                                </div>

                                <div class="col-auto">
                                    <div class="p-2"
                                        style="background-color: rgb(206, 252, 168); border-radius:8px; width:fit-content">

                                        <i class="fas fa-file-alt fa-2x" style="color: rgb(101, 163, 82);"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col col-md-4">
                    <div class="card card-stats p-3" style="border-radius: 15px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="h6 card-title text-uppercase text-muted mb-0">
                                        selesai
                                    </h5>

                                    <span class="h5 font-weight-bold mb-0"> 1050 </span>
                                </div>

                                <div class="col-auto">
                                    <div class="p-2"
                                        style="background-color: rgb(252, 251, 168); border-radius:8px; width:fit-content">
                                        <!-- <i class="ni ni-active-40"> </i> -->
                                        <i class="fas fa-file-alt fa-2x" style="color: rgb(245, 209, 51);"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- <p class="mt-3 mb-0 text-sm">
                                        <span class="text-success mr-2">
                                            <i class="fa fa-arrow-up"> </i> 3.48%
                                        </span>

                                        <span class="text-nowrap"> Since last month </span>
                                    </p> -->
                        </div>
                    </div>
                </div>

            </div> --}}

            <div class="container-fluid mt-4" style="padding: 0px !important;">
                <div class="card">

                    <div class="card-header" style="background-color: #f7e8ff;">
                        <h6> Carian Permohonan</h6>
                    </div>

                    <div class="card-body p-3">
                        <div class="row p-3 mb-0">
                            <form method="POST" action="/cari">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <input class="form-control form-control-sm" type="number" name="no_kp"
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
                                        <button class="btn btn-sm btn-info text-uppercases text-white" type="submit"><i
                                                class="fas fa-search fa-2x"></i> Cari</button>
                                                <a href="/permohonan" class="btn btn-sm btn-danger">Set Semula</a>
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
                        <h6> Tugasan Baru</h6>
                    </div>

                    <div class="card-body p-3">
                        <!-- <div class="row p-3 mb-0">
                                <div class="col form-group d-flex justify-content-start align-items-center p-0 mb-0">
                                    <label class="d-flex flex-nowrap mb-0">
                                        <span class="pl-0 pt-2 pr-2">Papar</span>
                                        <select name="datatable_length" aria-controls="datatable" class="col form-control form-control-sm" (change)="entriesChange($event)">
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="-1">All</option>
                                        </select>
                                        <span class="p-2">rekod</span>
                                    </label>
                                </div>
                                <div class="col form-group mb-0 p-0" id="datatable_search">

                                </div>
                            </div> -->


                        <div class="card">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0 table-flush" id="datatable-basic">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                No.</th>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                TARIKH DITERIMA</th>
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
                                                Tindakan Pegawai</th>
                                            <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                Status</th>
                                            <th class="text-uppercase text-center text-secondary text-xs opacity-7">Tindakan
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permohonan as $permohonan)
                                            <tr>
                                                <td>
                                                    <span
                                                        class="text-secondary text-sm font-weight-bold">{{ $loop->index + 1 }}</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-secondary text-sm font-weight-bold">{{ date('d-m-Y', strtotime($permohonan->updated_at)) }}</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span
                                                        class="text-secondary text-sm font-weight-bold">{{ $permohonan->jenis_permohonan }}</span>
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
                                                        {{ $permohonan->negeri_kutipan_permit }}</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-sm font-weight-bold">
                                                        {{ $permohonan->pegawai_pdrm }}</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    @if ($permohonan->status_permohonan === 'hantar ke pdrm')
                                                        <span class="badge badge-danger"> Belum Disemak</span>
                                                    @elseif ($permohonan->status_permohonan === 'Dalam Proses')
                                                        <span class="badge badge-warning">Dalam Proses</span>
                                                    @endif
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href="/permohonan/{{ $permohonan->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
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
                                                    <span class="text-secondary text-sm font-weight-bold"> Permohonan Baharu/pembaharuan</span>
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
                                                    <span class="badge badge-warning"> Dalam Proses</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href="/pdrm-maklumat-pemohon">
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

    <script src="https://demos.creative-tim.com/test/soft-ui-dashboard-pro/assets/js/plugins/datatables.js"
        type="text/javascript"></script>
    <script type="text/javascript">
        const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
            searchable: false,
            fixedHeight: true
        });
    </script>
@stop
