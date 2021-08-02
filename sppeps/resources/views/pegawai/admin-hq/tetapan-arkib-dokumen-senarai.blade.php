@extends('layouts.base-admin-hq')

@section('content')

<div class="container-fluid py-4">

    <div class="p-3">
        <div>
            <h4>Arkib Dokumen</h4>
        </div>



        <div class="card card-frame">

            <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                <div class="row d-flex flex-nowrap">
                    <div class="col">
                        <h5>Senarai Arkib Dokumen</h5>
                    </div>

                </div>

                <div class="col">
                    <div class="col d-flex justify-content-end">
                        <button class="btn bg-gradient-info" data-bs-toggle="modal" data-bs-target="#modal-form"> <i class="fas fa-plus-circle"></i> Tambah</button>
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
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tajuk Dokumen MS</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tajuk Dokumen EN</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan Dokumen MS</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan Dokumen EN</th>
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
                                <td class="text-sm font-weight-normal">Keterangan 1</td>
                                <td class="text-sm font-weight-normal">Keterangan 2</td>
                                <!-- <td class="text-sm font-weight-normal"><i class="fab fa-accusoft"></i></td> -->
                                <td class="text-sm font-weight-normal">2011/04/25</td>
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
                                    <!-- <a>
                                        <i class="far fa-list-alt"></i>
                                    </a> -->
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm font-weight-normal">2</td>
                                <td class="text-sm font-weight-normal">Edinburgh</td>
                                <td class="text-sm font-weight-normal">Edinburgh</td>
                                <td class="text-sm font-weight-normal">Keterangan 1</td>
                                <td class="text-sm font-weight-normal">Keterangan 2</td>
                                <!-- <td class="text-sm font-weight-normal"><i class="fab fa-accusoft"></i></td> -->
                                <td class="text-sm font-weight-normal">2011/04/25</td>
                                <td class="text-sm font-weight-normal">
                                    <span class="badge badge-danger">Tidak Aktif</span>

                                </td>
                                <td class="text-sm font-weight-normal">

                                    <a data-bs-toggle="modal" data-bs-target="#modal-form2">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="#">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                    <!-- <a>
                                        <i class="far fa-list-alt"></i>
                                    </a> -->

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
                                    <label for="title">Tajuk Dokumen MS</label>
                                    <input type="text" class="form-control form-control-sm" id="titlems" aria-describedby="titlems" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="title">Tajuk Dokumen EN</label>
                                    <input type="text" class="form-control form-control-sm" id="titleen" aria-describedby="titleen" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="title">Keterangan Dokumen MS</label>
                                    <!-- <input type="text" class="form-control" id="keteranganms" aria-describedby="keteranganms" placeholder=""> -->
                                    <textarea class="form-control" id="keteranganms" rows="3" name="keteranganms"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="title">Keterangan Dokumen EN</label>
                                    <textarea class="form-control" id="keteranganen" rows="3" name="keteranganen"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="dokumen">Dokumen</label>
                                    <br>
                                    <label class="btn bg-gradient-info form-control col-6">
                                        <i class="fa fa-image"></i> Pilih Fail<input type="file" style="display: none;" name="image">
                                    </label>
                                    <div id="fileList">Tiada Dokumen Dipilih</div>
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
                                    <button type="Submit" class="btn btn-round bg-gradient-success text-capitalize">Simpan</button>
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
    <!-- <button type="button" class="btn btn-block btn-default mb-3" data-bs-toggle="modal" data-bs-target="#modal-form2">Form</button> -->
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
                                    <label for="title">Tajuk Dokumen MS</label>
                                    <input type="text" class="form-control form-control-sm" id="titlems" aria-describedby="titlems" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="title">Tajuk Dokumen EN</label>
                                    <input type="text" class="form-control form-control-sm" id="titleen" aria-describedby="titleen" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="title">Keterangan Dokumen MS</label>
                                    <!-- <input type="text" class="form-control" id="keteranganms" aria-describedby="keteranganms" placeholder=""> -->
                                    <textarea class="form-control" id="keteranganms" rows="3" name="keteranganms"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="title">Keterangan Dokumen EN</label>
                                    <textarea class="form-control" id="keteranganen" rows="3" name="keteranganen"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="dokumen">Dokumen</label>
                                    <br>
                                    <label class="btn bg-gradient-info form-control col-6">
                                        <i class="fa fa-image"></i> Pilih Fail<input type="file" style="display: none;" name="image">
                                    </label>
                                    <div id="fileList">Tiada Dokumen Dipilih</div>
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
                                    <button type="Submit" class="btn btn-round bg-gradient-success text-capitalize">Simpan</button>
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
<script src="/assets/js/plugins/flatpickr.min.js"></script>
@stop