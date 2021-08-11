@extends('layouts.baseUser')

@section('content')


    <div class="container-fluid d-flex justify-content-center flex-wrap">
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="mt-5"><strong>Semakan Status Permohonan</strong></h3>
                <!-- <h5 class="text-secondary font-weight-normal">This information will let us know more about you.</h5> -->

            </div>
        </div>
        <div class="row mt-4" style="width: 80%;">

            <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0" id="datatable-basic">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No.</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Tarikh
                                    Hantar</th>
                                <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                    Jenis Permohonan</th>
                                <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                    No.Kad Pengenalan</th>
                                <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                    Status</th>
                                <th class="text-uppercase text-center text-secondary text-xs opacity-7">Tindakan</th>
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
                                            class="text-secondary text-sm font-weight-bold">{{ $permohonan->created_at }}</span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span
                                            class="text-secondary text-sm font-weight-bold">{{ $permohonan->jenis_permohonan }}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span
                                            class="text-secondary text-sm font-weight-bold">{{ $permohonan->no_kp }}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        @if ($permohonan->status_permohonan === 'simpan')
                                            <span class="text-secondary text-sm font-weight-bold">
                                                <span class="badge badge-warning">Draf</span>
                                            </span>
                                        @elseif ($permohonan->status_permohonan === 'Diluluskan')
                                            <span class="text-secondary text-sm font-weight-bold">
                                                <span class="badge badge-success">Diluluskan</span>
                                            </span>
                                        @elseif ($permohonan->status_permohonan === 'Tidak Diluluskan')
                                            <span class="text-secondary text-sm font-weight-bold">
                                                <span class="badge badge-danger">Dalam Proses</span>
                                            </span>
                                        @else
                                            <span class="text-secondary text-sm font-weight-bold">
                                                <span class="badge badge-secondary">Dalam Proses</span>
                                            </span>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        @if ($permohonan->status_permohonan === 'simpan')
                                            <a href="permohonan/{{ $permohonan->id }}" class="btn btn-sm btn-primary"
                                                data-toggle="tooltip" data-original-title="Edit user">
                                                Kemaskini
                                            </a>
                                        @else
                                            <a href="/maklumat-status-pemohon" class="btn btn-sm btn-primary"
                                                data-toggle="tooltip" data-original-title="Edit user">
                                                Lihat Maklumat Status
                                            </a>
                                        @endif

                                        <!-- <a href="javascript:;" class="btn btn-sm btn-primary" data-toggle="tooltip" data-original-title="Edit user">
                                        Bayar
                                    </a> -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="row mt-4 d-flex justify-content-center">

                    <div class="col d-flex justify-content-center">
                        <a href="/dashboard" class="btn btn-sm btn-info">Kembali Ke Menu Utama</a>
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
