@extends('layouts.base-admin-hq')

@section('content')

    <div class="container-fluid py-4">


        <div class="p-3">

            <div>
                <h5>Cetakan Permit</h5>
            </div>

            <div class="container-fluid mt-4" style="padding: 0px !important;">
                <div class="card">

                    <div class="card-header" style="background-color: #f5e7f2;">
                        <h6> Carian Pemohon</h6>
                    </div>

                    <div class="card-body p-3">
                        <form method="POST" action="/carian_pemohon">
                            @csrf

                            <div class="row">
                                <div class="col">
                                    <input type="text" name="no_kp" class="form-control" placeholder="No Kad Pengenalan">
                                </div>
                                <div class="col">
                                    <input type="submit" class="btn btn-info">
                                    <a href="/cetakan_permit" class="btn btn-danger">Set Semula</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>


            <div class="container-fluid mt-4" style="padding: 0px !important;">
                <div class="card">

                    <div class="card-header" style="background-color: #f5e7f2;">
                        <h6>Senarai Permohonan</h6>
                    </div>

                    <div class="card-body p-3">
                        {{-- <div class="row p-3 mb-0">
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
                       
                    </div> --}}


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
                                                NEGERI</th>
                                            <!-- <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">TINDAKAN PEGAWAI</th> -->
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
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-sm font-weight-bold">
                                                        {{ $permohonan->negeri }}</span>
                                                </td>

                                                <td class="align-middle text-center text-sm">
                                                    <span class="badge badge-success"> Diluluskan</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    {{-- <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#modal-form">Kemaskini</button> --}}
                                                    {{-- <button class="btn btn-sm btn-primary">Lihat</button> --}}
                                                    @if ($permohonan->jenis_permohonan == 'Baharu')
                                                        <button type="button" class="btn btn-sm btn-primary mb-3"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modal-form-kemaskini-baru-{{ $permohonan->id }}">Kemaskini</button>
                                                    @else
                                                        <button type="button" class="btn btn-sm btn-primary mb-3"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modal-form-kemaskini-lain-{{ $permohonan->id }}">Kemaskini</button>
                                                    @endif
                                                    @if ($permohonan->cetak_status == 1)
                                                        <button class="btn btn-sm btn-primary" disabled>Cetak Permit</button>
                                                    @else
                                                        {{-- <a href="/cetak_permit/{{ $permohonan->id }}" onclick="maelHensem($permohonan->id)" --}}
                                                        <a onclick="maelHensem({!! $permohonan->id !!})"
                                                            class="btn btn-sm btn-primary">Cetak Permit</a>
                                                    @endif

                                                </td>
                                            </tr>


                                            <div class="col-md-4">
                                                <div class="modal fade"
                                                    id="modal-form-kemaskini-baru-{{ $permohonan->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-sm"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body p-0">
                                                                <div class="card card-plain">
                                                                    <div class="card-header pb-0 text-left">
                                                                        <h4
                                                                            class="font-weight-bolder text-info text-gradient">
                                                                            Kemaskini Maklumat</h4>
                                                                        {{-- <p class="mb-0">Enter your email and password to
                                                                            sign in</p> --}}
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <form role="form text-left" method="POST"
                                                                            action="/cetakan_permit/{{ $permohonan->id }}">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $permohonan->id }}">
                                                                            <label>Nama</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    value="{{ $permohonan->nama }}"
                                                                                    readonly>
                                                                            </div>

                                                                            <label>No. Kad Pengenalan</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    value="{{ $permohonan->no_kp }}"
                                                                                    readonly>
                                                                            </div>

                                                                            <label>No. Permit</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    name="no_permit">
                                                                            </div>

                                                                            {{-- <label>No. Siri</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    name="no_siri">
                                                                            </div> --}}

                                                                            <div class="text-center">
                                                                                <button type="button"
                                                                                    class="btn bg-gradient-danger mt-4 mb-0" data-bs-dismiss="modal">Batal</button>
                                                                                <button type="submit"
                                                                                    class="btn bg-gradient-success mt-4 mb-0">Simpan</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="modal fade"
                                                    id="modal-form-kemaskini-lain-{{ $permohonan->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-sm"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body p-0">
                                                                <div class="card card-plain">
                                                                    <div class="card-header pb-0 text-left">
                                                                        <h4
                                                                            class="font-weight-bolder text-info text-gradient">
                                                                            Kemaskini Maklumat</h4>
                                                                        {{-- <p class="mb-0">Enter your email and password to
                                                                            sign in</p> --}}
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <form role="form text-left" method="POST"
                                                                            action="/cetakan_permit/{{ $permohonan->id }}">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $permohonan->id }}">
                                                                            <label>Nama</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    value="{{ $permohonan->nama }}"
                                                                                    readonly>
                                                                            </div>

                                                                            <label>No. Kad Pengenalan</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    value="{{ $permohonan->no_kp }}"
                                                                                    readonly>
                                                                            </div>

                                                                            <label>No. Permit</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    name="no_permit"
                                                                                    value="{{ $permohonan->no_permit }}"
                                                                                    readonly>
                                                                            </div>

                                                                            <label>No. Siri</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    name="no_siri">
                                                                            </div>

                                                                            <div class="text-center">
                                                                                <button type="button"
                                                                                    class="btn bg-gradient-danger mt-4 mb-0" data-bs-dismiss="modal">Batal</button>
                                                                                <button type="submit"
                                                                                    class="btn bg-gradient-success mt-4 mb-0">Simpan</button>
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
                                        {{-- <tr>
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
                                            <span class="badge badge-danger"> Belum Dibayar</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal-form">Kemaskini</button>
                                            <button class="btn btn-sm btn-primary">Lihat</button>
                                            <button class="btn btn-sm btn-primary">Cetak Permit</button>
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
                                            <span class="text-secondary text-sm font-weight-bold"> Permohonan Pembaharuan</span>
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
                                            <span class="badge badge-success"> Telah Dibayar</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal-form2">Kemaskini</button>
                                            <button class="btn btn-sm btn-primary">Lihat</button>
                                            <button class="btn btn-sm btn-primary">Cetak Permit</button>
                                        </td>
                                    </tr> --}}
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
        {{-- <button type="button" class="btn btn-block btn-default mb-3" data-bs-toggle="modal" data-bs-target="#modal-form">Form</button> --}}
        <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-left">
                                <h3 class="h4 font-weight-bolder text-info text-gradient">Kemaskini Bayaran</h3>
                            </div>
                            <div class="card-body">
                                <form role="form text-left">

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>No. Kad Pengenalan</label>
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                    aria-label="ic" aria-describedby="ic-addon" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Nama Pemohan</label>
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control form-control-sm" placeholder="nama"
                                                    aria-label="nama" aria-describedby="nama-addon" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Jenis Bayaran</label>
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                    aria-label="jenis" aria-describedby="jenis-addon" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Jumlah Bayaran (RM)</label>
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                    aria-label="jumlah" aria-describedby="jumlah-addon" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Jenis Permohonan</label>
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                    aria-label="jenis-p" aria-describedby="jenis-p-addon" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Tarikh Permohonan Diluluskan</label>
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                    aria-label="tarikh-p" aria-describedby="tarikh-p-addon" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Tarikh Bayar</label>
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                    aria-label="tarikh-b" aria-describedby="tarikh-b-addon" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>No Resit</label>
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                    aria-label="noResit" aria-describedby="noResit-addon">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Cara Bayaran</label>
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <!-- <input type="text" class="form-control form-control-sm" placeholder="" aria-label="noResit" aria-describedby="noResit-addon" > -->

                                                <select name="cara-bayaran" id="cara-bayaran"
                                                    class="form-control form-control-sm">
                                                    <option value="">--Sila Pilih--</option>
                                                    <option value="Wang pos">Wang pos</option>
                                                    <option value="Kiriman Wang">Kiriman Wang</option>
                                                    <option value="Wang pos">Bank Draf</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>No. Siri</label>
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                    aria-label="noResit" aria-describedby="noResit-addon">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>No. Permit</label>
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                    aria-label="noResit" aria-describedby="noResit-addon">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="text-center">
                                                                                        <button type="button" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Sign in</button>
                                                                                    </div> -->

                                    <div>
                                        <input type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0"
                                            value="Hantar">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-4">
        {{-- <button type="button" class="btn btn-block btn-default mb-3" data-bs-toggle="modal" data-bs-target="#modal-form">Form</button> --}}
        <div class="modal fade" id="modal-form2" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-left">
                                <h3 class="h4 font-weight-bolder text-info text-gradient">Maklumat Pembayaran</h3>
                            </div>
                            <div class="card-body">
                                <form role="form text-left">

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>No. Kad Pengenalan</label>
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                    aria-label="ic" aria-describedby="ic-addon" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Nama Pemohan</label>
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control form-control-sm" placeholder="nama"
                                                    aria-label="nama" aria-describedby="nama-addon" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Jenis Bayaran</label>
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                    aria-label="jenis" aria-describedby="jenis-addon" value="Automaktik"
                                                    disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Jumlah Bayaran (RM)</label>
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                    aria-label="jumlah" aria-describedby="jumlah-addon" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Jenis Permohonan</label>
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                    aria-label="jenis-p" aria-describedby="jenis-p-addon" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Tarikh Permohonan Diluluskan</label>
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                    aria-label="tarikh-p" aria-describedby="tarikh-p-addon" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Tarikh Transaksi</label>
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                    aria-label="tarikh-b" aria-describedby="tarikh-b-addon" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Cara Bayaran</label>
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                    aria-label="cara-bayaran" aria-describedby="cara-bayaran-addon"
                                                    value="Atas Talian" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Nama Bank</label>
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                    aria-label="nama-bank" aria-describedby="nama-bank-addon" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Jumlah Bayaran</label>
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                    aria-label="jumlah-bayaran" aria-describedby="jumlah-bayaran-addon"
                                                    disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>No. Siri</label>
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                    aria-label="noResit" aria-describedby="noResit-addon">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>No. Permit</label>
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control form-control-sm" placeholder=""
                                                    aria-label="noResit" aria-describedby="noResit-addon">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="text-center">
                                                                                        <button type="button" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Sign in</button>
                                                                                    </div> -->

                                    <div>
                                        <input type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0"
                                            value="Hantar">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
            function maelHensem(id) {     
                window.location.href = '/cetak_permit/' + id;
                setTimeout(() => { window.location.reload(true);  }, 1000);
                
            }        
    </script>

    <script src="https://demos.creative-tim.com/test/soft-ui-dashboard-pro/assets/js/plugins/datatables.js"
        type="text/javascript"></script>
    <script type="text/javascript">
        const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
            searchable: false,
            fixedHeight: true
        });

    </script>

@stop
