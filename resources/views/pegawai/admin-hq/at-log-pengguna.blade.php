@extends('layouts.base-admin-hq')

@section('content')

    <div class="container-fluid py-4">
        <div class="p-3">

            <div>
                <h5>Audit Trails</h5>
            </div>

            <div class="container-fluid mt-4" style="padding: 0px !important;">
                <div class="card">

                    <div class="card-header" style="background-color: #f7e8ff;">
                        <h6> Carian Log Pengguna</h6>
                    </div>

                    <div class="card-body p-3">
                        <div class="row p-3 mb-0">
                            <form method="POST" action="">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <label for="tarikhmula">No. Kad Pengenalan</label>
                                        <input class="form-control form-control-sm" type="text" name="ic" />
                                    </div>
                                    <div class="col">
                                        <label for="tarikhmula">Tarikh Mula</label>
                                        <input class="form-control form-control-sm" type="date" name="tarikhmula" />
                                    </div>

                                    <div class="col">
                                        <label for="tarikhtamat">Tarikh Tamat</label>
                                        <input class="form-control form-control-sm" type="date" name="tarikhtamat" />
                                    </div>

                                    <div class="col">
                                        <br>
                                        <button class="btn btn-sm bg-gradient-info text-capitalize" type="submit"
                                            name="search"><i class="fas fa-search fa-2x"></i> Cari</button>
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
                        <h6> Senarai Pengguna</h6>
                    </div>

                    <div class="card-body p-3">

                        <div class="card">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0" id="datatable-basic">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                No.</th>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                No. Kad Pengenalan</th>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                Nama Pengguna</th>
                                            <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                E-mel</th>
                                            <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                Status</th>
                                            <!-- <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">NO KAD PENGENALAN</th> -->
                                            <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                NEGERI</th>
                                            <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                Jawatan</th>
                                            {{-- <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                tarikh terakhir login</th> --}}
                                            <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                peranan</th>
                                            <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pegawais as $pegawai)
                                            <tr>
                                                <td>
                                                    <span
                                                        class="text-secondary text-sm font-weight-bold">{{ $loop->index + 1 }}</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-secondary text-sm font-weight-bold">{{ $pegawai->no_kp }}</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-secondary text-sm font-weight-bold">{{ $pegawai->name }}</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-sm font-weight-bold">
                                                        {{ $pegawai->email }}</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-sm font-weight-bold">
                                                        <span class="badge badge-success"> {{ $pegawai->status }}</span>
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-sm font-weight-bold">
                                                        {{ $pegawai->negeri }}</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    {{ $pegawai->jawatan }}
                                                </td>
                                                {{-- <td class="align-middle text-center text-sm">
                                                    15/02/2021 12:09:13
                                                </td> --}}
                                                <td class="align-middle text-center text-sm">
                                                    {{ $pegawai->role }}
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href="/log_pengguna/{{ $pegawai->id }}" class="btn btn-sm bg-gradient-info">
                                                        Lihat Log
                                                    </a>
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
    <script src="https://demos.creative-tim.com/test/soft-ui-dashboard-pro/assets/js/plugins/datatables.js"
        type="text/javascript"></script>
    <script type="text/javascript">
        const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
            searchable: false,
            fixedHeight: true
        });
    </script>
@stop
