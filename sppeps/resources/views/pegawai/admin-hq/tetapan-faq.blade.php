@extends('layouts.base-admin-hq')

@section('content')

<div class="container-fluid py-4">

    <div class="p-3">
        <div>
            <h4>Soalan Lazim (FAQ)</h4>
        </div>

        <div class="card card-frame mt-4">

            <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                <div class="row d-flex flex-nowrap">
                    <div class="col">
                        <h5>Senarai Kategori</h5>
                    </div>

                    <div class="col">
                        <div class="col d-flex justify-content-end">
                            <button class="btn bg-gradient-info btn-sm" data-bs-toggle="modal" data-bs-target="#modal-form">Tambah</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">


                <table class="table table-flush" id="datatable-basic">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Kategori MS</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Kategori EN</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-sm font-weight-normal">1</td>
                            <td class="text-sm font-weight-normal">Umum</td>
                            <td class="text-sm font-weight-normal">Umum</td>
                            <td class="text-sm font-weight-normal">
                                <span class="badge badge-info">Aktif</span>
                            </td>
                            <td class="text-sm font-weight-normal">
                                <a data-bs-toggle="modal" data-bs-target="#modal-form2">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a href="#">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>



        <div class="card card-frame mt-4">

            <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                <div class="row d-flex flex-nowrap">
                    <div class="col">
                        <h5>Senarai FAQ</h5>
                    </div>

                </div>

                <div class="col">
                    <div class="col d-flex justify-content-end">
                        <button class="btn bg-gradient-info" data-bs-toggle="modal" data-bs-target="#modal-form3"> <i class="fas fa-plus-circle"></i> Tambah</button>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <div class="row p-3 mb-0">
                    <div class="col form-group d-flex justify-content-start align-items-center p-0 mb-0">
                        <label class="d-flex flex-nowrap mb-0">
                            <span class="pl-0 p-2">Papar</span>
                            <select name="datatable_length" aria-controls="datatable" class="col form-control form-control-sm" (change)="entriesChange($event)">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                            </select>
                            <span class="p-2">rekod</span>
                        </label>
                    </div>
                    <div class="col form-group">
                        <div class="row">
                            <div class="col">
                                <label class="pr-2" for="search">Carian: </label>
                            </div>
                            <div class="col">
                                <input class="form-control form-control-sm" type="text" name="search" placeholder="Carian" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-flush" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">tajuk</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">kandungan</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> turutan</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">kategori</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tarikh Kemaskini</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-sm font-weight-normal">1</td>
                                <td class="text-sm font-weight-normal">Edinburgh</td>
                                <td class="text-sm font-weight-normal">Edinburgh</td>
                                <td class="text-sm font-weight-normal">1</td>
                                <td class="text-sm font-weight-normal">Umum</td>
                                <td class="text-sm font-weight-normal">25-06-2017</td>
                                <td class="text-sm font-weight-normal">
                                    <span class="badge badge-info">Aktif</span>

                                </td>
                                <td class="text-sm font-weight-normal">
                                    <a data-bs-toggle="modal" data-bs-target="#modal-form4">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="#">
                                        <i class="far fa-trash-alt"></i>
                                    </a>

                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm font-weight-normal">1</td>
                                <td class="text-sm font-weight-normal">Edinburgh</td>
                                <td class="text-sm font-weight-normal">Edinburgh</td>
                                <td class="text-sm font-weight-normal">2</td>
                                <td class="text-sm font-weight-normal">Umum</td>
                                <td class="text-sm font-weight-normal">25-06-2017</td>
                                <td class="text-sm font-weight-normal">
                                    <span class="badge badge-danger">Tidak Aktif</span>

                                </td>
                                <td class="text-sm font-weight-normal">
                                    <a data-bs-toggle="modal" data-bs-target="#modal-form4">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="#">
                                        <i class="far fa-trash-alt"></i>
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
                                    <label for="title">Nama Kategori MS</label>
                                    <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="title">Nama Kategori EN</label>
                                    <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="">
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
                                    <label for="title">Nama Kategori MS</label>
                                    <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="title">Nama Kategori EN</label>
                                    <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="">
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
    <div class="modal fade" id="modal-form3" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
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
                                    <label for="title">Tajuk MS</label>
                                    <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="title">Tajuk EN</label>
                                    <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="title">Kandungan MS</label>
                                    <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="title">Kandungan EN</label>
                                    <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="title">Turutan</label>
                                    <!-- <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="" > -->
                                    <select name="turutan" id="turutan" class="form-control">
                                        <option value="">--Sila Pilih--</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="title">Kategori</label>
                                    <!-- <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="" > -->
                                    <select name="kategori" id="kategori" class="form-control">
                                        <option value="">--Sila Pilih--</option>
                                        <option value="umum">Umum</option>
                                    </select>
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
    <div class="modal fade" id="modal-form4" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
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
                                    <label for="title">Tajuk MS</label>
                                    <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="title">Tajuk EN</label>
                                    <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="title">Kandungan MS</label>
                                    <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="title">Kandungan EN</label>
                                    <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="title">Turutan</label>
                                    <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="title">Kategori</label>
                                    <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="">
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

<script src="https://demos.creative-tim.com/test/soft-ui-dashboard-pro/assets/js/plugins/datatables.js" type="text/javascript"></script>
@stop