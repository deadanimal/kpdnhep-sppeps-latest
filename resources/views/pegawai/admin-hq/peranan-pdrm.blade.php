@extends('layouts.base-admin-hq')

@section('content')

    <div class="container-fluid py-4">
        <div class="p-3">

            <div>
                <h5>Peranan PDRM</h5>
            </div>

            <div class="container-fluid mt-4" style="padding: 0px !important;">
                <div class="card">

                    <div class="card-header" style="background-color: #f7e8ff;">
                        <h6> Carian Pegawai PDRM</h6>
                    </div>

                    <div class="card-body p-3">
                        <div class="row p-3 mb-0">
                            <form method="POST" action="/cari_pdrm">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <input class="form-control form-control-sm" type="number" name="no_kp"
                                            placeholder="No Kad Pengenalan" />
                                    </div>

                                    <div class="col">
                                        <button class="btn btn-sm bg-gradient-info text-uppercases" type="submit"
                                            name="search"><i class="fas fa-search fa-2x"></i> Cari</button>

                                        <a href="/peranan_pdrm" class="btn btn-sm bg-gradient-danger text-uppercases"
                                            name="search">Set Semula</a>
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
                        <h6> Senarai Peranan Pegawai PDRM</h6>
                    </div>

                    <div class="card-body p-3">
                        <div class="row p-3 pb-0 mb-0">
                            <div class="col form-group d-flex justify-content-end mb-0 p-0" id="datatable_search">
                                <a class="btn btn-sm bg-gradient-info" data-bs-toggle="modal"
                                    data-bs-target="#modal-form"><i class="fas fa-plus-circle"></i> Tambah</a>
                            </div>
                        </div>


                        <div class="card">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0" id="datatable-basic">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                No.</th>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                NO KAD PENGENALAN</th>
                                            <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                NAMA</th>
                                            <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                Jawatan</th>
                                            <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                Peranan</th>
                                            <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                Status</th>
                                            <th class="text-uppercase text-center text-secondary text-xs opacity-7">Tindakan
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pdrms as $pdrm)
                                            <tr class="text-center">
                                                <td>
                                                    <span
                                                        class="text-secondary text-sm font-weight-bold">{{ $loop->index + 1 }}</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-secondary text-sm font-weight-bold">{{ $pdrm->no_kp }}</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-sm font-weight-bold">
                                                        {{ $pdrm->name }}</span>
                                                </td>

                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-sm font-weight-bold">
                                                        {{ $pdrm->jawatan }}</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-sm font-weight-bold">
                                                        {{ $pdrm->role }}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    @if ($pdrm->status === 'Aktif')
                                                        <span class="badge badge-success"> Aktif</span>
                                                    @elseif ($pdrm->status === "Tidak Aktif")
                                                        <span class="badge badge-danger"> Tidak Aktif</span>
                                                    @endif
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#modal-form2-{{ $pdrm->id }}">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <div class="col-md-4">
                                                <!-- <button type="button" class="btn btn-block btn-default mb-3" data-bs-toggle="modal" data-bs-target="#modal-form">Form</button> -->
                                                <div class="modal fade" id="modal-form2-{{ $pdrm->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-md"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body p-0">
                                                                <div class="card card-plain">
                                                                    <div class="card-header pb-0 text-left">
                                                                        <h3
                                                                            class="font-weight-bolder text-info text-gradient">
                                                                            Kemaskini</h3>
                                                                        <!-- <p class="mb-0">Enter your email and password to sign in</p> -->
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <form method="POST"
                                                                            action="/peranan_pdrm/{{ $pdrm->id }}"
                                                                            role="form text-left">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <div class="form-group">
                                                                                <label for="title">Nama</label>
                                                                                <input type="text" class="form-control"
                                                                                    value="{{ $pdrm->name }}" name="name">
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="title">No. Kad
                                                                                    Pengenalan</label>
                                                                                <input type="text" class="form-control"
                                                                                    value="{{ $pdrm->no_kp }}"
                                                                                    name="no_kp">
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="title">Jawatan </label>
                                                                                <input type="text" class="form-control"
                                                                                    value="{{ $pdrm->jawatan }}"
                                                                                    name="jawatan">
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="title">Agensi/Jabatan</label>
                                                                                <input type="text" class="form-control"
                                                                                    value="{{ $pdrm->agensi }}"
                                                                                    name="agensi">
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="title">E-mel</label>
                                                                                <input type="text" class="form-control"
                                                                                    value="{{ $pdrm->email }}"
                                                                                    name="email">
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="title">No. Telefon</label>
                                                                                <input type="text" class="form-control"
                                                                                    value="{{ $pdrm->no_telefon_bimbit }}"
                                                                                    name="no_telefon_bimbit">
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="content">Status</label>
                                                                                <br>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input"
                                                                                        type="radio" name="status"
                                                                                        value="Aktif" @if ($pdrm->status == 'Aktif') checked @endif>
                                                                                    <label class="form-check-label"
                                                                                        for="active">Aktif</label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input"
                                                                                        type="radio" name="status"
                                                                                        value="Tidak Aktif" @if ($pdrm->status == 'Tidak Aktif') checked @endif>
                                                                                    <label class="form-check-label"
                                                                                        for="notActive">Tidak Aktif</label>
                                                                                </div>

                                                                            </div>
                                                                            <input type="hidden" name="peranan"
                                                                                value="pegawai_pdrm">
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $pdrm->id }}">
                                                                            <div
                                                                                class="text-center d-flex justify-content-end">
                                                                                <button type="button"
                                                                                    class="btn btn-round bg-gradient-danger text-capitalize"
                                                                                    data-bs-dismiss="modal">Batal</button>
                                                                                <button type="Submit"
                                                                                    class="btn btn-round btn-success text-capitalize">Simpan</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>

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



    <div class="col-md-4">
        <!-- <button type="button" class="btn btn-block btn-default mb-3" data-bs-toggle="modal" data-bs-target="#modal-form">Form</button> -->
        <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-left">
                                <h3 class="font-weight-bolder text-info text-gradient">Tambah</h3>
                                <!-- <p class="mb-0">Enter your email and password to sign in</p> -->
                            </div>
                            <div class="card-body">
                                <form method="POST" action="/peranan_pdrm" role="form text-left">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">Nama</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>

                                    <div class="form-group">
                                        <label for="title">No. Kad Pengenalan</label>
                                        <input type="text" class="form-control" name="nric">
                                    </div>

                                    {{-- <div class="form-group">
                                        <label for="title">Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div> --}}

                                    <div class="form-group">
                                        <label for="title">Jawatan </label>
                                        <input type="text" class="form-control" name="jawatan">
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Agensi/Jabatan</label>
                                        <input type="text" class="form-control" name="agensi">
                                    </div>

                                    <div class="form-group">
                                        <label for="title">E-mel</label>
                                        <input type="text" class="form-control" name="email">
                                    </div>

                                    <div class="form-group">
                                        <label for="title">No. Telefon</label>
                                        <input type="text" class="form-control" name="no_telefon">
                                    </div>

                                    <div class="form-group">
                                        <label for="content">Status</label>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" value="Aktif">
                                            <label class="form-check-label" for="active">Aktif</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" value="Tidak Aktif">
                                            <label class="form-check-label" for="notActive">Tidak Aktif</label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="peranan" value="pegawai_pdrm">
                                    <div class="text-center d-flex justify-content-end">
                                        <button type="button" class="btn btn-round bg-gradient-danger text-capitalize"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="Submit"
                                            class="btn btn-round btn-success text-capitalize">Simpan</button>
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

@stop
