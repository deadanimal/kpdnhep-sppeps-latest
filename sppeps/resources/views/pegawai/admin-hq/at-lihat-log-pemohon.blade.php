@extends('layouts.base-admin-hq')

@section('content')

<div class="container-fluid py-4">
    <div class="p-3">

        <div>
            <h5>Audit Trails</h5>
        </div>

        <div class="container-fluid mt-4" style="padding: 0px !important;">
            <div class="card">

                <div class="card-header" style="background-color: #f7e8ff;">
                    <h6>Log Pemohon</h6>
                </div>

                <div class="card-body p-3">
                    <div class="row">
                        <p>Nama Pemohon : Yuzrita binti Md. Yusoff</p>
                        <p>No. Kad Pengenalan : 980706050403</p>
                        <p>Negeri : Perak</p>
                        <!-- <p>Capaian : Pelulus</p> -->

                    </div>
                    <div class="row p-3 mb-0">
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
                        <div class="col form-group mb-0 p-0" id="datatable_search">
                            <div class="row">
                                <div class="col-sm-4 d-flex justify-content-end m-0">
                                    <label class="pr-2 m-0 mt-2" for="search">Cari Rekod: </label>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-sm" type="text" name="search" placeholder="Carian" (keyup)="updateFilter($event)" />
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No.</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">tarikh</th>
                                        <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">Dikemaskini Oleh</th>
                                        <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">deskripsi</th>
                                        <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">Catatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <span class="text-secondary text-sm font-weight-bold">1</span>
                                        </td>
                                        <td>
                                            <span class="text-secondary text-sm font-weight-bold">
                                                15/01/2021 10:23
                                            </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            Abu Samad
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-sm font-weight-bold">
                                                Tukar Status dari Pembaharuan ke Permohonan Pembaharuan Tidak Disokong
                                            </span>
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
@stop