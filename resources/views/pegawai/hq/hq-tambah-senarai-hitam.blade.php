@extends('layouts.base-admin-hq')

@section('content')

    <div class="container-fluid py-4">
        <div class="wrapper">
            <div id="formContent">

                <div class="p-3">

                    <div>
                        <h5>Tambah Senarai Hitam Pemohon</h5>
                    </div>

                    <div class="container-fluid mt-4" style="padding: 0px !important;">
                        <div class="card">

                            <div class="card-header" style="background-color: #f5e7f2;">
                                <h6> Carian Pemohon</h6>
                            </div>

                            <div class="card-body p-3">
                                <form method="POST" action="/cari-tambah-senarai-hitam">
                                    @csrf

                                    <div class="row">
                                        <div class="col">
                                            <input type="text" name="no_kp" class="form-control"
                                                placeholder="No Kad Pengenalan">
                                        </div>
                                        <div class="col">
                                            <input type="submit" class="btn btn-info" value="Cari">
                                            <a href="/tambah-senarai-hitam" class="btn btn-danger">Set Semula</a>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="container-fluid mt-4" style="padding: 0px !important;">
                        <div class="card">

                            <div class="card-header" style="background-color: #f5e7f2;">
                                <h6> Senarai Pemohon</h6>
                            </div>

                            <div class="card-body p-3">



                                <div class="card">
                                    <div class="table-responsive">
                                        <table class="table align-items-center mb-0" id="datatable-basic">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                        No.</th>
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
                                                        Status</th>
                                                    <th class="text-uppercase text-center text-secondary text-xs opacity-7">
                                                        Tindakan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pemohon as $pemohon)
                                                    <tr>
                                                        <td>
                                                            <span
                                                                class="text-secondary text-sm font-weight-bold">{{ $loop->index + 1 }}</span>
                                                        </td>

                                                        <td class="align-middle text-center text-sm">
                                                            <span
                                                                class="text-secondary text-sm font-weight-bold">{{ $pemohon->name }}</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span
                                                                class="text-secondary text-sm font-weight-bold">{{ $pemohon->no_kp }}</span>
                                                        </td>
                                                        <td class="align-middle text-center text-sm">
                                                            <span class="text-secondary text-sm font-weight-bold">
                                                                {{ $pemohon->negeri }}</span>
                                                        </td>
                                                        <td class="align-middle text-center text-sm">
                                                            @if ($pemohon->status_permohonan === 'diluluskan')
                                                                <span class="badge badge-success"> Sah</span>
                                                            @elseif ($pemohon->status_permohonan === 'tidak_diluluskan')
                                                                <span class="badge badge-danger">Tidak Sah</span>
                                                            @else
                                                                <span class="badge badge-secondary">Dalam Proses</span>
                                                            @endif

                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <button class="btn btn-sm btn-danger btn-sm"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modal-form2-{{ $pemohon->id }}">
                                                                Senarai Hitam
                                                            </button>
                                                        </td>
                                                    </tr>

                                                    <div class="modal fade" id="modal-form2-{{ $pemohon->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="modal-form"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-md"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body p-0">
                                                                    <div class="card card-plain">
                                                                        <div class="card-header pb-0 text-left">
                                                                            <h3
                                                                                class="h4 font-weight-bolder text-info text-gradient">
                                                                                Senarai Hitam</h3>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <form method="POST"
                                                                                action="/senarai-hitam/{{ $pemohon->id }}"
                                                                                role="form text-left">
                                                                                @csrf
                                                                                @method('PUT')

                                                                                <div class="row">

                                                                                    <label>Catatan </label>

                                                                                    <div class="input-group mb-3">
                                                                                        <textarea class="form-control"
                                                                                            id="catatan"
                                                                                            name="catatan_senarai_hitam"></textarea>
                                                                                    </div>

                                                                                </div>
                                                                                {{-- <input type="hidden" name="id" value="{{ $permohonan->id }}"> --}}
                                                                                <input type="hidden" name="jenis_tindakan"
                                                                                    value="tambah_senarai_hitam">

                                                                                <div class="d-flex justify-content-end">
                                                                                    <button type="button"
                                                                                        class="btn btn-round bg-gradient-danger text-capitalize"
                                                                                        data-bs-dismiss="modal">Batal</button>
                                                                                    <button type="Submit"
                                                                                        class="btn btn-round bg-gradient-success text-capitalize">Simpan</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
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
        </div>
    </div>

    <div class="col-md-4">

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
