@extends('layouts.base-admin-hq')

@section('content')

    <div class="container-fluid py-4">
        <div class="p-3">

            <div>
                <h5>Tambah Peranan Pegawai</h5>
            </div>

            <form method="POST" action="/peranan_pegawai" class="d-flex justify-content-center font-black"
                style="width: 100%;">
                @csrf
                <div class="container-fluid mt-4" style="padding: 0px !important;">

                    <div class="card">

                        <div class="card-header" style="background-color: #f7e8ff;">
                            <h6> Maklumat Pegawai </h6>
                        </div>

                        <div class="card-body p-3">

                            <div class="card-body">


                                <div class="d-flex justify-content-center flex-wrap" fxLayout="column"
                                    fxLayoutAlign="space-evenly stretch" style="width: 100%;">

                                    <div class="p-3" fxLayout="column" fxLayoutAlign="space-evenly stretch"
                                        style="width: 90%;">


                                        <div class="d-flex flex-nowrap">
                                            <div class="col-5 form-group p-0">
                                                <label for="name">
                                                    <strong>No. Kad Pengenalan</strong>
                                                </label>
                                                <div class="d-flex flex-nowrap align-items-center">
                                                    <input type="text" class="form-control col-9" name="nokp"
                                                        value="{{ $pegawai['nokp'] }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-1"></div>
                                            <div class="col-5 form-group pr-0">
                                                <label for="ic"><strong> Negeri</strong></label>
                                                <input type="text" class="form-control" value="{{ $negeri }}" name="negeri"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-nowrap">
                                            <div class="col-5 form-group p-0">
                                                <label for="name">
                                                    <strong>Nama Staf</strong>
                                                </label>
                                                <div class="d-flex flex-nowrap align-items-center">
                                                    <input type="text" class="form-control col-9"
                                                        value="{{ $pegawai['nama'] }}" name="nama" readonly>
                                                </div>
                                            </div>
                                            <div class="col-1"></div>
                                            <div class="col-5 form-group pr-0">
                                                <label for="ic"><strong> E-mel</strong></label>
                                                <input type="text" class="form-control" value="{{ $pegawai['emel'] }}"
                                                    readonly name="email">
                                            </div>
                                        </div>
                                        <div class="d-flex flex-nowrap">
                                            <div class="col-5 form-group p-0">
                                                <label for="name">
                                                    <strong>Jawatan</strong>
                                                </label>
                                                <div class="d-flex flex-nowrap align-items-center">
                                                    <input type="text" class="form-control col-9"
                                                        value="{{ $pegawai['nama_jawatan'] }}" readonly name="jawatan">
                                                </div>
                                            </div>
                                            <div class="col-1"></div>
                                            <div class="col-5 form-group pr-0">
                                                <label for="ic"><strong>No. Telefon</strong></label>
                                                <input type="text" class="form-control"
                                                    value="{{ $pegawai['no_telefon'] }}" readonly name="no_tel">
                                            </div>
                                        </div>


                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>

                    @if ($negeri === 'WP Putrajaya')
                        <div class="container-fluid mt-4" style="padding: 0px !important;">
                            <div class="card">

                                <div class="card-header" style="background-color: #f7e8ff;">
                                    <h6>Peranan Pegawai </h6>
                                </div>

                                <div class="card-body p-3">
                                    <div class="d-flex justify-content-center flex-wrap" fxLayout="column"
                                        fxLayoutAlign="space-evenly stretch" style="width: 100%;">
										
										<input type="hidden" name="role" value="pegawai_hq">

                                        <div class="p-3" fxLayout="column" fxLayoutAlign="space-evenly stretch"
                                            style="width: 90%;">

                                            <div class="d-flex flex-wrap">

                                                <div class="row " style="width: 100%;">
                                                    <div class="row form-group">
                                                        Peranan Pegawai
                                                    </div>
                                                </div>
                                                <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                                    <div class="row">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="pemproses_negeri" value="1">
                                                            <label class="form-check-label">Pegawai Pemproses Negeri</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                                    <div class="row">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="pemproses_hq" value="4">
                                                            <label class="form-check-label">Pegawai Pemproses HQ</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                                    <div class="row">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="penyokong"
                                                                value="5">
                                                            <label class="form-check-label">Penyokong</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                                    <div class="row">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="pelulus"
                                                                value="6">
                                                            <label class="form-check-label">Pelulus</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                                    <div class="row">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="pentadbir"
                                                                value="7">
                                                            <label class="form-check-label">Pentadbir Sistem HQ</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                                    <div class="row">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="pengurusan_maklumat" value="8">
                                                            <label class="form-check-label">Pentadbir Pengurusan
                                                                Maklumat</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                                    <div class="row">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="penguatkuasa" value="9">
                                                            <label class="form-check-label">Penguatkuasa</label>
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
                                                <a href="/senarai_pegawai" class="btn btn-danger text-capitalize m-1"
                                                    value="HANTAR">Batal</a>

                                                <button type="submit" class="btn btn-success text-capitalize m-1"
                                                    value="HANTAR">Simpan</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @else
                        <div class="container-fluid mt-4" style="padding: 0px !important;">
                            <div class="card">

                                <div class="card-header" style="background-color: #f7e8ff;">
                                    <h6>Peranan Pegawai </h6>
                                </div>
								
								<input type="hidden" name="role" value="pegawai_negeri">

                                <div class="card-body p-3">
                                    <div class="d-flex justify-content-center flex-wrap" fxLayout="column"
                                        fxLayoutAlign="space-evenly stretch" style="width: 100%;">
										
										<input type="hidden" name="role" value="pegawai_negeri">

                                        <div class="p-3" fxLayout="column" fxLayoutAlign="space-evenly stretch"
                                            style="width: 90%;">

                                            <div class="d-flex flex-wrap">

                                                <div class="row " style="width: 100%;">
                                                    <div class="row form-group">
                                                        Peranan Pegawai
                                                    </div>
                                                </div>
                                                <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                                    <div class="row">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="pemproses_negeri" value="1">
                                                            <label class="form-check-label">Pegawai Pemproses Negeri</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                                    <div class="row">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="penyokong"
                                                                value="2">
                                                            <label class="form-check-label">Penyokong</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                                    <div class="row">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="pelulus"
                                                                value="3">
                                                            <label class="form-check-label">Pelulus</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                                    <div class="row">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="penguatkuasa" value="9">
                                                            <label class="form-check-label">Penguatkuasa</label>
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
                                                <a href="/senarai_pegawai" class="btn btn-danger text-capitalize m-1"
                                                    value="HANTAR">Batal</a>

                                                <button type="submit" class="btn btn-success text-capitalize m-1"
                                                    value="HANTAR">Simpan</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </form>
        </div>
    </div>


@stop
