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
                        <form method="POST" action="">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <input class="form-control form-control-sm" type="text" name="search" placeholder="No Kad Pengenalan" />
                                </div>

                                <div class="col">
                                    <button class="btn btn-sm bg-gradient-info text-uppercases" type="submit" name="search"><i class="fas fa-search fa-2x"></i> Cari</button>
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
                    <div class="row p-3 mb-0">
                        <div class="col form-group d-flex justify-content-start align-items-center p-0 mb-0">
                            <label class="d-flex flex-nowrap mb-0">
                                <span class="pl-0 p-2">Papar</span>
                                <select name="datatable_length" aria-controls="datatable" class="col form-control form-control-sm" (change)="entriesChange($event)">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="-1">All</option>
                                </select>
                                <span class="p-2">rekod</span>
                            </label>
                        </div>
                        <div class="col form-group d-flex justify-content-end mb-0 p-0" id="datatable_search">
                            <a class="btn btn-sm bg-gradient-info" data-bs-toggle="modal" data-bs-target="#modal-form"><i class="fas fa-plus-circle"></i> Tambah</a>
                        </div>
                    </div>


                    <div class="card">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No.</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">NO KAD PENGENALAN</th>
                                        <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">NAMA</th>
                                        <!-- <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">No. Permit</th> -->
                                        <!-- <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">NO KAD PENGENALAN</th> -->
                                        <!-- <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">NEGERI</th> -->
                                        <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">Jawatan</th>
                                        <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">Peranan</th>
                                        <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">Status</th>
                                        <th class="text-uppercase text-center text-secondary text-xs opacity-7">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center">
                                        <td>
                                            <span class="text-secondary text-sm font-weight-bold">1</span>
                                        </td>
                                        <td>
                                            <span class="text-secondary text-sm font-weight-bold">981209089989</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-sm font-weight-bold"> Abu Samad</span>
                                        </td>
                                        <!-- <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-sm font-weight-bold"> Selangor</span>
                                        </td> -->
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-sm font-weight-bold"> Pembantu Tadbir</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-sm font-weight-bold"> Pegawai PDRM</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-success"> Aktif</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a data-bs-toggle="modal" data-bs-target="#modal-form2">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        </td>
                                    </tr>



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
                            <form role="form text-left">
                                <div class="form-group">
                                    <label for="title">Nama</label>
                                    <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="" >
                                </div>

                                <div class="form-group">
                                    <label for="title">No. Kad Pengenalan</label>
                                    <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="" >
                                </div>

                                <div class="form-group">
                                    <label for="title">Jawatan </label>
                                    <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="" >
                                </div>

                                <div class="form-group">
                                    <label for="title">Agensi/Jabatan</label>
                                    <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="" >
                                </div>

                                <div class="form-group">
                                    <label for="title">E-mel</label>
                                    <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="" >
                                </div>

                                <div class="form-group">
                                    <label for="title">No. Telefon</label>
                                    <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="" >
                                </div>

                                <div class="form-group">
                                    <label for="title">Peranan</label>
                                    <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="" >
                                </div>

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
                                <div class="text-center d-flex justify-content-end">
                                    <button type="button" class="btn btn-round bg-gradient-danger text-capitalize" data-bs-dismiss="modal">Batal</button>
                                    <button type="Submit" class="btn btn-round btn-success text-capitalize">Simpan</button>
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
    <!-- <button type="button" class="btn btn-block btn-default mb-3" data-bs-toggle="modal" data-bs-target="#modal-form">Form</button> -->
    <div class="modal fade" id="modal-form2" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-info text-gradient">Kemaskini</h3>
                            <!-- <p class="mb-0">Enter your email and password to sign in</p> -->
                        </div>
                        <div class="card-body">
                            <form role="form text-left">
                                <div class="form-group">
                                    <label for="title">Nama</label>
                                    <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="" >
                                </div>

                                <div class="form-group">
                                    <label for="title">No. Kad Pengenalan</label>
                                    <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="" >
                                </div>

                                <div class="form-group">
                                    <label for="title">Jawatan </label>
                                    <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="" >
                                </div>

                                <div class="form-group">
                                    <label for="title">Agensi/Jabatan</label>
                                    <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="" >
                                </div>

                                <div class="form-group">
                                    <label for="title">E-mel</label>
                                    <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="" >
                                </div>

                                <div class="form-group">
                                    <label for="title">No. Telefon</label>
                                    <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="" >
                                </div>

                                <div class="form-group">
                                    <label for="title">Peranan</label>
                                    <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="" >
                                </div>

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
                                <div class="text-center d-flex justify-content-end">
                                    <button type="button" class="btn btn-round bg-gradient-danger text-capitalize" data-bs-dismiss="modal">Batal</button>
                                    <button type="Submit" class="btn btn-round btn-success text-capitalize">Simpan</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop