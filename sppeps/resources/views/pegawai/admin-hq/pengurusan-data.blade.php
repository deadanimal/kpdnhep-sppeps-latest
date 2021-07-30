@extends('layouts.base-admin-hq')

@section('content')

<div class="container-fluid py-4">
    <div class="p-3">

        <div>
            <h5>Pengurusan Data</h5>
        </div>

        <div class="container-fluid mt-4" style="padding: 0px !important;">
            <div class="card">

                <div class="card-header" style="background-color: #f7e8ff;">
                    <h6> Carian Permohonan</h6>
                </div>

                <div class="card-body p-3">
                    <div class="row p-3 mb-0">
                        <form method="POST" action="">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <input class="form-control form-control-sm" type="text" name="search" placeholder="No Kad Pengenalan" />
                                </div>

                                <!-- <div class="col">
                                    <select class="form-control form-control-sm">
                                        <option>Pilih Negeri</option>
                                        <option value="">perlis</option>
                                        <option value="">Kedah</option>
                                        <option value="">Pulau Pinang</option>
                                        <option value="">Perak</option>
                                        <option value="">Selangor</option>
                                        <option value="">Negeri Sembilan</option>
                                        <option value="">Melaka</option>
                                        <option value="">Johor</option>
                                        <option value="">Kelantan</option>
                                        <option value="">Terengganu</option>
                                        <option value="">Pahang</option>
                                        <option value="">Sabah</option>
                                        <option value="">Sarawak</option>
                                        <option value="">W.P Kuala Lumpur</option>
                                        <option value="">W.P Putrajaya</option>
                                        <option value="">W.P Labuan</option>
                                    </select>
                                </div> -->

                                <div class="col">
                                    <button class="btn btn-sm btn-info text-uppercases" type="submit" name="search"><i class="fas fa-search fa-2x"></i> Cari</button>
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
                    <h6> Kemaskini Permohonan</h6>
                </div>

                <div class="card-body p-3">
                    <!-- <div class="row p-3 mb-0">
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
                    </div> -->


                    <div class="card">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No.</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">NO KAD PENGENALAN</th>
                                        <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">NAMA PEMOHON</th>
                                        <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">No. Permit</th>
                                        <!-- <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">NO KAD PENGENALAN</th> -->
                                        <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">NEGERI</th>
                                        <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">Status permohonan</th>
                                        <th class="text-uppercase text-center text-secondary text-xs opacity-7">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <span class="text-secondary text-sm font-weight-bold">1</span>
                                        </td>
                                        <td>
                                            <span class="text-secondary text-sm font-weight-bold">981209089989</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-sm font-weight-bold"> Abu Samad</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-sm font-weight-bold"> 12345</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-sm font-weight-bold"> Selangor</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-success"> Diluluskan</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="/kemaskini-maklumat-pemohon" class="btn btn-sm bg-gradient-info">
                                                Kemaskini
                                            </a>
                                            <a href="#" class="btn btn-sm bg-gradient-info">
                                                Set Semula
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