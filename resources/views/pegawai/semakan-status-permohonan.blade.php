@extends('layouts.base-admin-hq')

@section('content')

    <div class="container-fluid py-4">

        <div class="p-3">

            <div class="row">
                <h5>Semakan Status Permohonan</h5>
            </div>

            <div class="row container-fluid mt-4" style="padding: 0px !important;">
                <div class="card">

                    <div class="card-header" style="background-color: #f7e8ff;">
                        <h6>Carian Pemohon</h6>
                    </div>

                    <div class="card-body p-3">
                        <div class="row p-3 mb-0">
                            <form method="POST" action="">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <input class="form-control form-control-sm" type="text" name="search"
                                            placeholder="No Kad Pengenalan" />
                                    </div>
                                    <!-- <div class="col">
                                                        <select class="form-control form-control-sm">
                                                            <option>Pilih Jenis Permohonan</option>
                                                            <option>Permohonan Baharu</option>
                                                            <option>Permohonan Pembaharuan</option>
                                                        </select>
                                                    </div> -->
                                    <div class="col">
                                        <button class="btn btn-sm btn-info text-uppercases text-white" type="submit"
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
                        <h6> Senarai Status Permohonan</h6>
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
                                                TARIKH PERMOHONAN</th>
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
                                                Negeri</th>
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
                                                        class="text-secondary text-sm font-weight-bold">{{ $permohonan->created_at }}</span>
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
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-sm font-weight-bold">{{ $permohonan->negeri }}</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    @if ($permohonan->status_permohonan === 'Diluluskan')
                                                        <span class="text-secondary text-sm font-weight-bold">
                                                            <span class="badge badge-success">Diluluskan</span>
                                                        </span>
                                                    @elseif ($permohonan->status_permohonan === 'Tidak Diluluskan')
                                                        <span class="text-secondary text-sm font-weight-bold">
                                                            <span class="badge badge-danger">Tidak Diluluskan</span>
                                                        </span>
                                                    @else
                                                        <span class="text-secondary text-sm font-weight-bold">
                                                            <span class="badge badge-secondary">Dalam Proses</span>
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href="/semakan_permohonan/{{ $permohonan->id }}"
                                                        class="btn btn-sm bg-gradient-info text-capitalize">
                                                        lihat maklumat status
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
