@extends('layouts.base-admin-hq')

@section('content')

<div class="container-fluid py-4">
    <div class="p-3">

        <div>
            <h5> Peranan Pegawai</h5>
        </div>

        <div class="container-fluid mt-4" style="padding: 0px !important;">
            <div class="card">

                <div class="card-header" style="background-color: #f7e8ff;">
                    <h6> Maklumat Pegawai </h6>
                </div>

                <div class="card-body p-3">

                    <div class="card-body">

                        <form class="d-flex justify-content-center font-black" style="width: 100%;">
                            <div class="d-flex justify-content-center flex-wrap" fxLayout="column" fxLayoutAlign="space-evenly stretch" style="width: 100%;">

                                <div class="p-3" fxLayout="column" fxLayoutAlign="space-evenly stretch" style="width: 90%;" *ngFor="let infos of info">

                                    <div class="d-flex flex-nowrap">
                                        <div class="col-5 form-group p-0">
                                            <label for="name">
                                                <strong>No. Kad Pengenalan</strong>
                                            </label>
                                            <div class="d-flex flex-nowrap align-items-center">
                                                <input type="text" class="form-control col-9" id="name" aria-describedby="name" placeholder="" [value]="infos.name" disabled>
                                            </div>
                                        </div>
                                        <div class="col-1"></div>
                                        <div class="col-5 form-group pr-0">
                                            <label for="ic"><strong> Negeri</strong></label>
                                            <input type="text" class="form-control" id="ic" aria-describedby="ic" placeholder="" [value]="infos.no_kp" disabled>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-nowrap">
                                        <div class="col-5 form-group p-0">
                                            <label for="name">
                                                <strong>Nama Staf</strong>
                                            </label>
                                            <div class="d-flex flex-nowrap align-items-center">
                                                <input type="text" class="form-control col-9" id="name" aria-describedby="name" placeholder="" [value]="infos.name" disabled>
                                            </div>
                                        </div>
                                        <div class="col-1"></div>
                                        <div class="col-5 form-group pr-0">
                                            <label for="ic"><strong> E-mel</strong></label>
                                            <input type="text" class="form-control" id="ic" aria-describedby="ic" placeholder="" [value]="infos.no_kp" disabled>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-nowrap">
                                        <div class="col-5 form-group p-0">
                                            <label for="name">
                                                <strong>Jawatan</strong>
                                            </label>
                                            <div class="d-flex flex-nowrap align-items-center">
                                                <input type="text" class="form-control col-9" id="name" aria-describedby="name" placeholder="" [value]="infos.name" disabled>
                                            </div>
                                        </div>
                                        <div class="col-1"></div>
                                        <div class="col-5 form-group pr-0">
                                            <label for="ic"><strong>No. Telefon</strong></label>
                                            <input type="text" class="form-control" id="ic" aria-describedby="ic" placeholder="" [value]="infos.no_kp" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="container-fluid mt-4" style="padding: 0px !important;">
                <div class="card">

                    <div class="card-header" style="background-color: #f7e8ff;">
                        <h6> Kemaskini Peranan Pegawai </h6>
                    </div>

                    <div class="card-body p-3">
                        <form class="d-flex justify-content-center font-black" style="width: 100%;" (ngSubmit)="onSubmit(submit)">
                            <div class="d-flex justify-content-center flex-wrap" fxLayout="column" fxLayoutAlign="space-evenly stretch" style="width: 100%;">

                                <div class="p-3" fxLayout="column" fxLayoutAlign="space-evenly stretch" style="width: 90%;">

                                    <div class="d-flex flex-nowrap">
                                        <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                            <label for="action" class="col-sm-2 ">Peranan</label>
                                            <div class="col-sm-5">
                                                <!-- <input type="text" class="form-control col-9" id="action" aria-describedby="" placeholder="" value="Telah Dihantar ke Badan Agensi(PDRM)" disabled> -->
                                                <select name="peranan" id="peranan" class="form-control form-control-sm">
                                                    <option value="">Sila Pilih</option>
                                                    <option value="Pegawai Pemproses Negeri">Pegawai Pemproses Negeri</option>
                                                    <option value="Penyokong">Penyokong</option>
                                                    <option value="Pelulus">Pelulus</option>
                                                    <option value="Penguatkuasa">Penguatkuasa</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-nowrap">
                                        <div class="form-group">

                                            <label for="content">Status</label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status" id="active" value="option1">
                                                <label class="form-check-label" for="active">Aktif</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status" id="notActive" value="option2">
                                                <label class="form-check-label" for="notActive">Tidak Aktif</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="p-3 d-flex justify-content-center">
                                        <a href="/tambah-peranan-pegawai" class="btn btn-danger text-capitalize m-1" value="HANTAR">Batal</a>

                                        <button type="submit" class="btn btn-success text-capitalize m-1" value="HANTAR">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>



                    </div>

                </div>
            </div>

            <div class="container-fluid mt-4" style="padding: 0px !important;">
                <div class="card">

                    <div class="card-header" style="background-color: #f7e8ff;">
                        <h6> Kemaskini Peranan Pegawai </h6>
                    </div>

                    <div class="card-body p-3">
                        <form class="d-flex justify-content-center font-black" style="width: 100%;" (ngSubmit)="onSubmit(submit)">
                            <div class="d-flex justify-content-center flex-wrap" fxLayout="column" fxLayoutAlign="space-evenly stretch" style="width: 100%;">

                                <div class="p-3" fxLayout="column" fxLayoutAlign="space-evenly stretch" style="width: 90%;">

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
                                                        <select name="peranan" id="peranan" class="form-control form-control-sm">
                                                            <option value="">Sila Pilih</option>
                                                            <option value="Pegawai Pemproses Negeri">Pegawai Pemproses Negeri</option>
                                                            <option value="Pegawai Pemproses HQ">Pegawai Pemproses HQ</option>
                                                            <option value="Penyokong">Penyokong</option>
                                                            <option value="Pelulus">Pelulus</option>
                                                            <option value="Pentadbir Sistem HQ">Pentadbir Sistem HQ</option>
                                                            <option value="Pentadbir Pengurusan Maklumat">Pentadbir Pengurusan Maklumat</option>
                                                            <option value="Penguatkuasa">Penguatkuasa</option>
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
                                                        <select name="peranan" id="peranan" class="form-control form-control-sm">
                                                            <option value="">Sila Pilih</option>
                                                            <option value="Pegawai Pemproses Negeri">Pegawai Pemproses Negeri</option>
                                                            <option value="Pegawai Pemproses HQ">Pegawai Pemproses HQ</option>
                                                            <option value="Penyokong">Penyokong</option>
                                                            <option value="Pelulus">Pelulus</option>
                                                            <option value="Pentadbir Sistem HQ">Pentadbir Sistem HQ</option>
                                                            <option value="Pentadbir Pengurusan Maklumat">Pentadbir Pengurusan Maklumat</option>
                                                            <option value="Penguatkuasa">Penguatkuasa</option>
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
                                                        <select name="peranan" id="peranan" class="form-control form-control-sm">
                                                            <option value="">Sila Pilih</option>
                                                            <option value="Pegawai Pemproses Negeri">Pegawai Pemproses Negeri</option>
                                                            <option value="Pegawai Pemproses HQ">Pegawai Pemproses HQ</option>
                                                            <option value="Penyokong">Penyokong</option>
                                                            <option value="Pelulus">Pelulus</option>
                                                            <option value="Pentadbir Sistem HQ">Pentadbir Sistem HQ</option>
                                                            <option value="Pentadbir Pengurusan Maklumat">Pentadbir Pengurusan Maklumat</option>
                                                            <option value="Penguatkuasa">Penguatkuasa</option>
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
                                                        <select name="peranan" id="peranan" class="form-control form-control-sm">
                                                            <option value="">Sila Pilih</option>
                                                            <option value="Pegawai Pemproses Negeri">Pegawai Pemproses Negeri</option>
                                                            <option value="Pegawai Pemproses HQ">Pegawai Pemproses HQ</option>
                                                            <option value="Penyokong">Penyokong</option>
                                                            <option value="Pelulus">Pelulus</option>
                                                            <option value="Pentadbir Sistem HQ">Pentadbir Sistem HQ</option>
                                                            <option value="Pentadbir Pengurusan Maklumat">Pentadbir Pengurusan Maklumat</option>
                                                            <option value="Penguatkuasa">Penguatkuasa</option>
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
                                                        <select name="peranan" id="peranan" class="form-control form-control-sm">
                                                            <option value="">Sila Pilih</option>
                                                            <option value="Pegawai Pemproses Negeri">Pegawai Pemproses Negeri</option>
                                                            <option value="Pegawai Pemproses HQ">Pegawai Pemproses HQ</option>
                                                            <option value="Penyokong">Penyokong</option>
                                                            <option value="Pelulus">Pelulus</option>
                                                            <option value="Pentadbir Sistem HQ">Pentadbir Sistem HQ</option>
                                                            <option value="Pentadbir Pengurusan Maklumat">Pentadbir Pengurusan Maklumat</option>
                                                            <option value="Penguatkuasa">Penguatkuasa</option>
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
                                                        <select name="peranan" id="peranan" class="form-control form-control-sm">
                                                            <option value="">Sila Pilih</option>
                                                            <option value="Pegawai Pemproses Negeri">Pegawai Pemproses Negeri</option>
                                                            <option value="Pegawai Pemproses HQ">Pegawai Pemproses HQ</option>
                                                            <option value="Penyokong">Penyokong</option>
                                                            <option value="Pelulus">Pelulus</option>
                                                            <option value="Pentadbir Sistem HQ">Pentadbir Sistem HQ</option>
                                                            <option value="Pentadbir Pengurusan Maklumat">Pentadbir Pengurusan Maklumat</option>
                                                            <option value="Penguatkuasa">Penguatkuasa</option>
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
                                                        <select name="peranan" id="peranan" class="form-control form-control-sm">
                                                            <option value="">Sila Pilih</option>
                                                            <option value="Pegawai Pemproses Negeri">Pegawai Pemproses Negeri</option>
                                                            <option value="Pegawai Pemproses HQ">Pegawai Pemproses HQ</option>
                                                            <option value="Penyokong">Penyokong</option>
                                                            <option value="Pelulus">Pelulus</option>
                                                            <option value="Pentadbir Sistem HQ">Pentadbir Sistem HQ</option>
                                                            <option value="Pentadbir Pengurusan Maklumat">Pentadbir Pengurusan Maklumat</option>
                                                            <option value="Penguatkuasa">Penguatkuasa</option>
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
                                                <input class="form-check-input" type="radio" name="status" id="active" value="option1">
                                                <label class="form-check-label" for="active">Aktif</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status" id="notActive" value="option2">
                                                <label class="form-check-label" for="notActive">Tidak Aktif</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="p-3 d-flex justify-content-center">
                                        <a href="/tambah-peranan-pegawai" class="btn btn-danger text-capitalize m-1" value="HANTAR">Batal</a>

                                        <button type="submit" class="btn btn-success text-capitalize m-1" value="HANTAR">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>



                    </div>

                </div>
            </div>
        </div>

    </div>
    @stop