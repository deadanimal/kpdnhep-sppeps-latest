@extends('layouts.base-admin-hq')

@section('content')

    <div class="container-fluid py-4">
        <div class="p-3">

            <div>
                <h5>Pengurusan Data</h5>
            </div>

            <div class="container-fluid mt-4" style="padding: 0px !important;">
                <div class="card">

                    <div class="card-header" style="background-color: #f7e8ff;">
                        <h6> Carian Permohonan</h6>
                    </div>

                    <div class="card-body p-3">
                        <div class="row p-3 mb-0">
                            <form method="POST" action="/cari_pengurusan_data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <input class="form-control form-control-sm" type="text" name="no_kp"
                                            placeholder="No Kad Pengenalan" />
                                    </div>

                                    <div class="col">
                                        <button class="btn btn-sm btn-info text-uppercases" type="submit" name="search"><i
                                                class="fas fa-search fa-2x"></i> Cari</button>
                                        <a href="/pengurusan-data" class="btn btn-sm btn-danger">Set Semula</a>
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
                        <h6> Kemaskini Permohonan</h6>
                    </div>

                    <div class="card-body p-3">

                        <div class="card">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0 table-flush" id="datatable-basic">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                No.</th>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                NO KAD PENGENALAN</th>
                                            <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                NAMA PEMOHON</th>
                                            <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                No. Permit</th>
                                            <!-- <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">NO KAD PENGENALAN</th> -->
                                            <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                NEGERI</th>
                                            <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                Status permohonan</th>
                                            <th class="text-uppercase text-center text-secondary text-xs opacity-7">Tindakan
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permohonans as $permohonan)
                                            <tr>
                                                <td>
                                                    <span
                                                        class="text-secondary text-sm font-weight-bold">{{ $loop->index + 1 }}</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-secondary text-sm font-weight-bold">{{ $permohonan->no_kp }}</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-sm font-weight-bold">
                                                        {{ $permohonan->nama }}</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-sm font-weight-bold">
                                                        {{ $permohonan->no_permit }}</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-sm font-weight-bold">
                                                        {{ $permohonan->negeri }}</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    {{-- <span class="badge badge-success"> </span> --}}
                                                    {{ $permohonan->status_permohonan }}
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href="/pengurusan-data/{{ $permohonan->id }}"
                                                        class="btn btn-sm bg-gradient-info">
                                                        Kemaskini
                                                    </a>

                                                    <button type="button" class="btn bg-gradient-danger btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal-{{ $permohonan->id }}">
                                                        Set Semula
                                                    </button>


                                                </td>
                                            </tr>

                                            <!-- Button trigger modal -->
                                            {{-- <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                Launch demo modal
                                            </button> --}}

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal-{{ $permohonan->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Notifikasi</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Adakah anda pasti mahu set semula cetakan permit?
                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-center">
                                                            <button type="button" class="btn bg-gradient-danger"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <a href="/set_semula/{{ $permohonan->id }}"
                                                                class="btn bg-gradient-success">
                                                                Ya
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
