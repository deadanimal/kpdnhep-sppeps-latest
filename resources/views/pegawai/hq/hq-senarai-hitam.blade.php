@extends('layouts.base-admin-hq')

@section('content')

    <div class="container-fluid py-4">
        <div class="wrapper">
            <div id="formContent">

                <div class="p-3">

                    <div>
                        <h5>Senarai Hitam Pemohon</h5>
                    </div>

                    <div class="container-fluid mt-4" style="padding: 0px !important;">
                        <div class="card">

                            <div class="card-header" style="background-color: #f5e7f2;">
                                <h6> Carian Pemohon</h6>
                            </div>

                            <div class="card-body p-3">
                                <form method="POST" action="/cari-senarai-hitam">
                                    @csrf

                                    <div class="row">
                                        <div class="col">
                                            <input type="text" name="no_kp" class="form-control form-control-sm"
                                                placeholder="No Kad Pengenalan">
                                        </div>
                                        <div class="col">
                                            <select class="form-control form-control-sm" aria-label="Default select example"
                                                name="negeri">
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

                                        {{-- <div class="col">
                                            <select class="form-control form-control-sm" name="jenis_permohonan">
                                                <option value="null">Pilih Jenis Permohonan</option>
                                                <option value="Baharu">Permohonan Baharu</option>
                                                <option value="Pembaharuan">Permohonan Pembaharuan</option>
                                                <option value="Pendua">Permohonan Pendua</option>
                                                <option value="Rayuan">Permohonan Rayuan</option>
                                            </select>
                                        </div> --}}
                                        <div class="col">
                                            <input type="submit" class="btn btn-sm bg-gradient-info" value="Cari">
                                            <a href="/senarai-hitam" class="btn btn-sm btn-danger">Set Semula</a>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="container-fluid mt-4" style="padding: 0px !important;">
                        <div class="card">

                            <div class="card-header" style="background-color: #f5e7f2;">
                                <h6> Pemohon yang Disenarai Hitam</h6>
                            </div>

                            <div class="card-body">
                                <div class="row p-3 mb-0">
                                    <div class="col form-group d-flex justify-content-start align-items-center p-0 mb-0">

                                    </div>
                                    <div class="col form-group d-flex justify-content-end mb-0 p-0" id="datatable_search">
                                        <a class="btn btn-sm bg-gradient-primary" href="/tambah-senarai-hitam">Tambah
                                            Senarai Hitam</a>
                                    </div>
                                </div>

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
                                                        catatan</th>
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
                                                            <span class="text-secondary text-sm font-weight-bold">1</span>
                                                        </td>

                                                        <td class="align-middle text-center text-sm">
                                                            <span class="text-secondary text-sm font-weight-bold">
                                                                {{ $pemohon->name }}</span>
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
                                                            <span class="text-secondary text-sm font-weight-bold">
                                                                {{ $pemohon->catatan_senarai_hitam }}</span>
                                                        </td>
                                                        <td class="align-middle text-center text-sm">
                                                            @if ($pemohon->status_permohonan == 'disenarai_hitam')
                                                                <span class="badge badge-dark"> Disenarai Hitam</span>
                                                            @endif
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <button class="btn btn-sm bg-gradient-info"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modal-form2-{{ $pemohon->id }}">
                                                                Kemaskini
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
                                                                                Pembatalan Permit</h3>
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
                                                                                            name="catatan_senarai_hitam">{{ $pemohon->catatan_senarai_hitam }}</textarea>
                                                                                    </div>

                                                                                </div>
                                                                                <input type="hidden" name="jenis_tindakan"
                                                                                    value="kemaskini_senarai_hitam">

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
        <div class="modal fade" id="modal-form2" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-left">
                                <h3 class="h4 font-weight-bolder text-info text-gradient">Kemaskini Pembatalan Permit</h3>
                            </div>
                            <div class="card-body">
                                <form role="form text-left">

                                    <div class="row">

                                        <label>Catatan</label>

                                        <div class="input-group mb-3">
                                            <textarea class="form-control" id="catatan" name="catatan"
                                                value="catatan"></textarea>
                                        </div>

                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-round bg-gradient-danger text-capitalize"
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
    </div>

    <script src="https://demos.creative-tim.com/test/soft-ui-dashboard-pro/assets/js/plugins/datatables.js"
        type="text/javascript"></script>
    <script type="text/javascript">
        const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
            searchable: false,
            fixedHeight: true
        });
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
@stop
