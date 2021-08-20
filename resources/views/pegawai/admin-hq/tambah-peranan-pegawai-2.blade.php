@extends('layouts.base-admin-hq')

@section('content')

    <div class="container-fluid py-4">
        <div class="p-3">

            <div>
                <h5> Peranan Pegawai</h5>
            </div>


            <div class="container-fluid mt-4" style="padding: 0px !important;">
                @foreach ($pegawais as $pegawai)
                    <div class="card">

                        <div class="card-header" style="background-color: #f7e8ff;">
                            <h6> Maklumat Pegawai </h6>
                        </div>

                        <div class="card-body p-3">

                            <div class="card-body">

                                <form class="d-flex justify-content-center font-black" style="width: 100%;">
                                    <div class="d-flex justify-content-center flex-wrap" fxLayout="column"
                                        fxLayoutAlign="space-evenly stretch" style="width: 100%;">

                                        <div class="p-3" fxLayout="column" fxLayoutAlign="space-evenly stretch"
                                            style="width: 90%;" *ngFor="let infos of info">


                                            <div class="d-flex flex-nowrap">
                                                <div class="col-5 form-group p-0">
                                                    <label for="name">
                                                        <strong>No. Kad Pengenalan</strong>
                                                    </label>
                                                    <div class="d-flex flex-nowrap align-items-center">
                                                        <input type="text" class="form-control col-9"
                                                            value="{{ $pegawai->no_kp }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-1"></div>
                                                <div class="col-5 form-group pr-0">
                                                    <label for="ic"><strong> Negeri</strong></label>
                                                    <input type="text" class="form-control" value="{{ $pegawai->negeri }}"
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-nowrap">
                                                <div class="col-5 form-group p-0">
                                                    <label for="name">
                                                        <strong>Nama Staf</strong>
                                                    </label>
                                                    <div class="d-flex flex-nowrap align-items-center">
                                                        <input type="text" class="form-control col-9"
                                                            value="{{ $pegawai->name }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-1"></div>
                                                <div class="col-5 form-group pr-0">
                                                    <label for="ic"><strong> E-mel</strong></label>
                                                    <input type="text" class="form-control" value="{{ $pegawai->email }}"
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-nowrap">
                                                <div class="col-5 form-group p-0">
                                                    <label for="name">
                                                        <strong>Jawatan</strong>
                                                    </label>
                                                    <div class="d-flex flex-nowrap align-items-center">
                                                        <input type="text" class="form-control col-9"
                                                            value="{{ $pegawai->jawatan }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-1"></div>
                                                <div class="col-5 form-group pr-0">
                                                    <label for="ic"><strong>No. Telefon</strong></label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $pegawai->no_telefon_bimbit }}" disabled>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>


                    @if ($pegawai->negeri === 'WP Putrajaya')
                        <div class="container-fluid mt-4" style="padding: 0px !important;">
                            <div class="card">

                                <div class="card-header" style="background-color: #f7e8ff;">
                                    <h6> Kemaskini Peranan Pegawai </h6>
                                </div>

                                <div class="card-body p-3">
                                    <form method="POST" action="/peranan_pegawai/{{ $pegawai->id }}"
                                        class="d-flex justify-content-center font-black" style="width: 100%;">
                                        @csrf
                                        @method('PUT')
                                        <div class="d-flex justify-content-center flex-wrap" fxLayout="column"
                                            fxLayoutAlign="space-evenly stretch" style="width: 100%;">

                                            <div class="p-3" fxLayout="column" fxLayoutAlign="space-evenly stretch"
                                                style="width: 90%;">

                                                <div class="d-flex flex-wrap">
                                                    <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                                        <div class="row">
                                                            <div class="col-1">
                                                                <label for="peranan">Peranan</label>
                                                            </div>
                                                            <div class="col-1">
                                                                1
                                                            </div>
                                                            <div class="col">
                                                                <div class="col-5">
                                                                    <!-- <input type="text" class="form-control col-9" id="action" aria-describedby="" placeholder="" value="Telah Dihantar ke Badan Agensi(PDRM)" disabled> -->
                                                                    <select name="peranan1" id="peranan"
                                                                        class="form-control form-control-sm">
                                                                        <option value="">Sila Pilih</option>
                                                                        <option value="1">Pegawai Pemproses Negeri</option>
                                                                        <option value="4">Pegawai Pemproses HQ</option>
                                                                        <option value="5">Penyokong</option>
                                                                        <option value="6">Pelulus</option>
                                                                        <option value="7">Pentadbir Sistem HQ
                                                                        </option>
                                                                        <option value="8">
                                                                            Pentadbir
                                                                            Pengurusan Maklumat</option>
                                                                        <option value="9">Penguatkuasa</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                                        <div class="row">
                                                            <div class="col-1">

                                                            </div>
                                                            <div class="col-1">
                                                                2
                                                            </div>
                                                            <div class="col">
                                                                <div class="col-5">
                                                                    <!-- <input type="text" class="form-control col-9" id="action" aria-describedby="" placeholder="" value="Telah Dihantar ke Badan Agensi(PDRM)" disabled> -->
                                                                    <select name="peranan2" id="peranan"
                                                                        class="form-control form-control-sm">
                                                                        <option value="">Sila Pilih</option>
                                                                        <option value="1">Pegawai Pemproses Negeri</option>
                                                                        <option value="4">Pegawai Pemproses HQ</option>
                                                                        <option value="5">Penyokong</option>
                                                                        <option value="6">Pelulus</option>
                                                                        <option value="7">Pentadbir Sistem HQ
                                                                        </option>
                                                                        <option value="8">
                                                                            Pentadbir
                                                                            Pengurusan Maklumat</option>
                                                                        <option value="9">Penguatkuasa</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                                        <div class="row">
                                                            <div class="col-1">

                                                            </div>
                                                            <div class="col-1">
                                                                3
                                                            </div>
                                                            <div class="col">
                                                                <div class="col-5">
                                                                    <!-- <input type="text" class="form-control col-9" id="action" aria-describedby="" placeholder="" value="Telah Dihantar ke Badan Agensi(PDRM)" disabled> -->
                                                                    <select name="peranan3" id="peranan"
                                                                        class="form-control form-control-sm">
                                                                        <option value="">Sila Pilih</option>
                                                                        <option value="1">Pegawai Pemproses Negeri</option>
                                                                        <option value="4">Pegawai Pemproses HQ</option>
                                                                        <option value="5">Penyokong</option>
                                                                        <option value="6">Pelulus</option>
                                                                        <option value="7">Pentadbir Sistem HQ
                                                                        </option>
                                                                        <option value="8">
                                                                            Pentadbir
                                                                            Pengurusan Maklumat</option>
                                                                        <option value="9">Penguatkuasa</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                                        <div class="row">
                                                            <div class="col-1">

                                                            </div>
                                                            <div class="col-1">
                                                                4
                                                            </div>
                                                            <div class="col">
                                                                <div class="col-5">
                                                                    <!-- <input type="text" class="form-control col-9" id="action" aria-describedby="" placeholder="" value="Telah Dihantar ke Badan Agensi(PDRM)" disabled> -->
                                                                    <select name="peranan4" id="peranan"
                                                                        class="form-control form-control-sm">
                                                                        <option value="">Sila Pilih</option>
                                                                        <option value="1">Pegawai Pemproses Negeri</option>
                                                                        <option value="4">Pegawai Pemproses HQ</option>
                                                                        <option value="5">Penyokong</option>
                                                                        <option value="6">Pelulus</option>
                                                                        <option value="7">Pentadbir Sistem HQ
                                                                        </option>
                                                                        <option value="8">
                                                                            Pentadbir
                                                                            Pengurusan Maklumat</option>
                                                                        <option value="9">Penguatkuasa</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                                        <div class="row">
                                                            <div class="col-1">

                                                            </div>
                                                            <div class="col-1">
                                                                5
                                                            </div>
                                                            <div class="col">
                                                                <div class="col-5">
                                                                    <!-- <input type="text" class="form-control col-9" id="action" aria-describedby="" placeholder="" value="Telah Dihantar ke Badan Agensi(PDRM)" disabled> -->
                                                                    <select name="peranan5" id="peranan"
                                                                        class="form-control form-control-sm">
                                                                        <option value="">Sila Pilih</option>
                                                                        <option value="1">Pegawai Pemproses Negeri</option>
                                                                        <option value="4">Pegawai Pemproses HQ</option>
                                                                        <option value="5">Penyokong</option>
                                                                        <option value="6">Pelulus</option>
                                                                        <option value="7">Pentadbir Sistem HQ
                                                                        </option>
                                                                        <option value="8">
                                                                            Pentadbir
                                                                            Pengurusan Maklumat</option>
                                                                        <option value="9">Penguatkuasa</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                                        <div class="row">
                                                            <div class="col-1">

                                                            </div>
                                                            <div class="col-1">
                                                                6
                                                            </div>
                                                            <div class="col">
                                                                <div class="col-5">
                                                                    <!-- <input type="text" class="form-control col-9" id="action" aria-describedby="" placeholder="" value="Telah Dihantar ke Badan Agensi(PDRM)" disabled> -->
                                                                    <select name="peranan6" id="peranan"
                                                                        class="form-control form-control-sm">
                                                                        <option value="">Sila Pilih</option>
                                                                        <option value="1">Pegawai Pemproses Negeri</option>
                                                                        <option value="4">Pegawai Pemproses HQ</option>
                                                                        <option value="5">Penyokong</option>
                                                                        <option value="6">Pelulus</option>
                                                                        <option value="7">Pentadbir Sistem HQ
                                                                        </option>
                                                                        <option value="8">
                                                                            Pentadbir
                                                                            Pengurusan Maklumat</option>
                                                                        <option value="9">Penguatkuasa</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                                        <div class="row">
                                                            <div class="col-1">

                                                            </div>
                                                            <div class="col-1">
                                                                7
                                                            </div>
                                                            <div class="col">
                                                                <div class="col-5">
                                                                    <!-- <input type="text" class="form-control col-9" id="action" aria-describedby="" placeholder="" value="Telah Dihantar ke Badan Agensi(PDRM)" disabled> -->
                                                                    <select name="peranan6" id="peranan"
                                                                        class="form-control form-control-sm">
                                                                        <option value="">Sila Pilih</option>
                                                                        <option value="1">Pegawai Pemproses Negeri</option>
                                                                        <option value="4">Pegawai Pemproses HQ</option>
                                                                        <option value="5">Penyokong</option>
                                                                        <option value="6">Pelulus</option>
                                                                        <option value="7">Pentadbir Sistem HQ
                                                                        </option>
                                                                        <option value="8">
                                                                            Pentadbir
                                                                            Pengurusan Maklumat</option>
                                                                        <option value="9">Penguatkuasa</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-nowrap">
                                                    <div class="form-group">
                                                        <label for="content">Status</label>
                                                        <br>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="status"
                                                                id="active" value="Aktif">
                                                            <label class="form-check-label" for="active">Aktif</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="status"
                                                                id="notActive" value="Tidak Aktif">
                                                            <label class="form-check-label" for="notActive">Tidak
                                                                Aktif</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="p-3 d-flex justify-content-center">
                                                    <a href="/tambah-peranan-pegawai"
                                                        class="btn btn-danger text-capitalize m-1" value="HANTAR">Batal</a>

                                                    <button type="submit" class="btn btn-success text-capitalize m-1"
                                                        value="HANTAR">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="container-fluid mt-4" style="padding: 0px !important;">
                            <div class="card">

                                <div class="card-header" style="background-color: #f7e8ff;">
                                    <h6> Kemaskini Peranan Pegawai </h6>
                                </div>

                                <div class="card-body p-3">
                                    <form method="POST" action="/peranan_pegawai/{{ $pegawai->id }}"
                                        class="d-flex justify-content-center font-black" style="width: 100%;">
                                        @csrf
                                        @method('PUT')

                                        <div class="d-flex justify-content-center flex-wrap" fxLayout="column"
                                            fxLayoutAlign="space-evenly stretch" style="width: 100%;">

                                            <div class="p-3" fxLayout="column" fxLayoutAlign="space-evenly stretch"
                                                style="width: 90%;">

                                                <div class="d-flex flex-wrap">
                                                    <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                                        <div class="row">
                                                            <div class="col-1">
                                                                <label for="peranan">Peranan</label>
                                                            </div>
                                                            <div class="col-1">
                                                                1
                                                            </div>
                                                            <div class="col">
                                                                <div class="col-5">
                                                                    <!-- <input type="text" class="form-control col-9" id="action" aria-describedby="" placeholder="" value="Telah Dihantar ke Badan Agensi(PDRM)" disabled> -->
                                                                    <select name="peranan1" id="peranan"
                                                                        class="form-control form-control-sm">
                                                                        <option value="">Sila Pilih</option>
                                                                        <option value="1">Pegawai Pemproses
                                                                            Negeri
                                                                        </option>
                                                                        <option value="2">Penyokong</option>
                                                                        <option value="3">Pelulus</option>
                                                                        <option value="9">Penguatkuasa</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                                        <div class="row">
                                                            <div class="col-1">

                                                            </div>
                                                            <div class="col-1">
                                                                2
                                                            </div>
                                                            <div class="col">
                                                                <div class="col-5">
                                                                    <!-- <input type="text" class="form-control col-9" id="action" aria-describedby="" placeholder="" value="Telah Dihantar ke Badan Agensi(PDRM)" disabled> -->
                                                                    <select name="peranan2" id="peranan"
                                                                        class="form-control form-control-sm">
                                                                        <option value="">Sila Pilih</option>
                                                                        <option value="1">Pegawai Pemproses
                                                                            Negeri
                                                                        </option>
                                                                        <option value="2">Penyokong</option>
                                                                        <option value="3">Pelulus</option>
                                                                        <option value="9">Penguatkuasa</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                                        <div class="row">
                                                            <div class="col-1">

                                                            </div>
                                                            <div class="col-1">
                                                                3
                                                            </div>
                                                            <div class="col">
                                                                <div class="col-5">
                                                                    <!-- <input type="text" class="form-control col-9" id="action" aria-describedby="" placeholder="" value="Telah Dihantar ke Badan Agensi(PDRM)" disabled> -->
                                                                    <select name="peranan3" id="peranan"
                                                                        class="form-control form-control-sm">
                                                                        <option value="">Sila Pilih</option>
                                                                        <option value="1">Pegawai Pemproses
                                                                            Negeri
                                                                        </option>
                                                                        <option value="2">Penyokong</option>
                                                                        <option value="3">Pelulus</option>
                                                                        <option value="9">Penguatkuasa</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                                        <div class="row">
                                                            <div class="col-1">

                                                            </div>
                                                            <div class="col-1">
                                                                4
                                                            </div>
                                                            <div class="col">
                                                                <div class="col-5">
                                                                    <!-- <input type="text" class="form-control col-9" id="action" aria-describedby="" placeholder="" value="Telah Dihantar ke Badan Agensi(PDRM)" disabled> -->
                                                                    <select name="peranan4" id="peranan4"
                                                                        class="form-control form-control-sm">
                                                                        <option value="">Sila Pilih</option>
                                                                        <option value="1">Pegawai Pemproses
                                                                            Negeri
                                                                        </option>
                                                                        <option value="2">Penyokong</option>
                                                                        <option value="3">Pelulus</option>
                                                                        <option value="9">Penguatkuasa</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="d-flex flex-nowrap">
                                                        <div class="form-group">
                                                            <label for="content">Status</label>
                                                            <br>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="status"
                                                                    value="Aktif">
                                                                <label class="form-check-label" for="active">Aktif</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="status"
                                                                    value="Tidak Aktif">
                                                                <label class="form-check-label" for="notActive">Tidak
                                                                    Aktif</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="p-3 d-flex justify-content-center">
                                                        <a href="/tambah-peranan-pegawai"
                                                            class="btn btn-danger text-capitalize m-1"
                                                            value="HANTAR">Batal</a>

                                                        <button type="submit" class="btn btn-success text-capitalize m-1"
                                                            value="HANTAR">Simpan</button>
                                                    </div>
                                                </div>
                                            </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    @endif



                @endforeach
            </div>

        </div>
    @stop
