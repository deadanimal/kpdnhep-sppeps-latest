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
                    <h6> Carian Log Pengguna</h6>
                </div>

                <div class="card-body p-3">
                    <div class="row p-3 mb-0">
                        <form method="POST" action="">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="tarikhmula">No. Kad Pengenalan</label>
                                    <input class="form-control form-control-sm" type="text" name="ic" />
                                </div>
                                <div class="col">
                                    <label for="tarikhmula">Tarikh Mula</label>
                                    <input class="form-control form-control-sm" type="date" name="tarikhmula" />
                                </div>

                                <div class="col">
                                    <label for="tarikhtamat">Tarikh Tamat</label>
                                    <input class="form-control form-control-sm" type="date" name="tarikhtamat" />
                                </div>

                                <div class="col">
                                    <br>
                                    <button class="btn btn-sm bg-gradient-info text-capitalize" type="submit" name="search"><i class="fas fa-search fa-2x"></i> Cari</button>
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
                    <h6> Senarai Pengguna</h6>
                </div>

                <div class="card-body p-3">
                    <div class="row p-3 mb-0">
                        <div class="col form-group d-flex justify-content-start align-items-center p-0 mb-0">
                            <label class="d-flex flex-nowrap mb-0">
                                <span class="pl-0 pt-2 pr-2">Papar </span>
                                <select name="datatable_length" aria-controls="datatable" class="col form-control form-control-sm" (change)="entriesChange($event)">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="-1">All</option>
                                </select>
                                <span class="p-2">rekod</span>
                            </label>
                        </div>
                        <!-- <div class="col form-group mb-0 p-0" id="datatable_search">
                            <div class="row">
                                <div class="col-sm-4 d-flex justify-content-end m-0">
                                    <label class="pr-2 m-0 mt-2" for="search">Carian: </label>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-sm" type="text" name="search" placeholder="Carian" (keyup)="updateFilter($event)" />
                                </div>
                            </div>
                        </div> -->
                    </div>


                    <div class="card">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No.</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">No. Kad Pengenalan</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Nama Pengguna</th>
                                        <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">E-mel</th>
                                        <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">Status</th>
                                        <!-- <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">NO KAD PENGENALAN</th> -->
                                        <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">NEGERI</th>
                                        <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">Jawatan</th>
                                        <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">tarikh terakhir login</th>
                                        <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">peranan</th>
                                        <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <span class="text-secondary text-sm font-weight-bold">1</span>
                                        </td>
                                        <td>
                                            <span class="text-secondary text-sm font-weight-bold">970304050689</span>
                                        </td>
                                        <td>
                                            <span class="text-secondary text-sm font-weight-bold">Abu Samad</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-sm font-weight-bold"> example@blabla.com</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-sm font-weight-bold">
                                                <span class="badge badge-success"> Aktif</span>
                                            </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-sm font-weight-bold"> Selangor</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            Pembantu Tadbir
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            15/02/2021 12:09:13
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            Pegawai Pemproses Negeri
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="/lihat-log-pengguna" class="btn btn-sm bg-gradient-info">
                                                Lihat Log
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
@stop