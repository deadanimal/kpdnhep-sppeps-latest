@extends('layouts.base-pdrm')

@section('content')

<div class="container-fluid py-4">
    <div class="wrapper">


        <div class="p-3">

            <div>
                <h5>Semakan Rekod Jenayah</h5>
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

                                    <div class="col">
                                        <select class="form-control form-control-sm">
                                            <option>Pilih Negeri</option>
                                            <option value="">perlis</option>
                                            <option value="">Kedah</option>
                                            <option value="">p. pinang</option>
                                            <option value="">perak</option>
                                            <option value="">selangor</option>
                                            <option value="">n 9</option>
                                            <option value="">melaka</option>
                                            <option value="">johor</option>
                                            <option value="">kltn</option>
                                            <option value="">ganu</option>
                                            <option value="">phg</option>
                                            <option value="">sbh</option>
                                            <option value="">srwk</option>
                                            <option value="">w.p kl</option>
                                            <option value="">w.p putrajaya</option>
                                            <option value="">w.p labuan</option>


                                        </select>
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-sm btn-info text-uppercases text-white" type="submit" name="search"><i class="fas fa-search fa-2x"></i> Cari</button>
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
                        <h6> Tugasan Selesai</h6>
                    </div>

                    <div class="card-body p-3">
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
                            <!-- <div class="col form-group d-flex justify-content-end mb-0 p-0" id="datatable_search">
                                    <label class="col-form-label pr-2" for="search">Cari Rekod: </label>
                                    <input class="col-6 form-control" type="text" name="search" placeholder="" (keyup)="updateFilter($event)" />
                                </div> -->
                        </div>


                        <div class="card">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No.</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">TARIKH PERMOHONAN</th>
                                            <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">JENIS PERMOHONAN</th>
                                            <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">NAMA PEMOHON</th>
                                            <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">NO KAD PENGENALAN</th>
                                            <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">NEGERI</th>
                                            <!-- <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">TINDAKAN PEGAWAI</th> -->
                                            <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">Status</th>
                                            <th class="text-uppercase text-center text-secondary text-xs opacity-7">Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
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
                                            <!-- <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-sm font-weight-bold"> </span>
                                                </td> -->
                                            <td class="align-middle text-center text-sm">
                                                <span class="badge badge-success"> Telah Disemak</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <!-- <a href="/pdrm-maklumat-pemohon"> -->
                                                    <i class="fas fa-edit"></i>
                                                <!-- </a> -->
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


</div>
@stop