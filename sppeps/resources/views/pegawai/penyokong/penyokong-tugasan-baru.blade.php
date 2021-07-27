@extends('layouts.base-penyokong')

@section('content')

<div class="container-fluid py-4">

    <div class="p-3">

        <div>
            <h5>Semakan Permohonan</h5>
        </div>

        <div class="row">
            <div class="col-xl col-md-4">

                <div class="card card-stats p-3" style="border-radius: 15px; height:100%">
                    <div class="card-body" [ngSwitch]="appLog">
                        <div class="row">
                            <div class="col">
                                <h5 class="h6 card-title text-uppercase text-muted mb-0">
                                    PERMOHONAN
                                </h5>

                                <span class="h5 font-weight-bold mb-0"> 3982 </span>
                            </div>

                            <div class="col-auto" (click)="onShowApplicationLog()">
                                <div class="">
                                    <!-- <i class="ni ni-active-40"> </i> -->
                                    <i class="fas fa-ellipsis-h" [@rotatedState]='rotateApp'></i>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3" *ngSwitchDefault>
                            <div class="col-2">
                                <div style="align-items: center; justify-content:center">
                                    <div class="p-2" style="background-color: rgb(168, 228, 252); border-radius:8px; width:fit-content">
                                        <!-- <i class="ni ni-active-40"> </i> -->
                                        <i class="fas fa-file-alt fa-2x" style="color: rgb(51, 142, 245);"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <p class="mb-0 text-sm">
                                    <span class="mr-2">
                                        <!-- <i class="fa fa-arrow-up"> </i> 3.48% -->
                                        <strong>Baharu</strong>
                                    </span>
                                    <br>
                                    <span class="text-nowrap"> 2902</span>
                                </p>
                            </div>
                        </div>
                        <div class="row pt-3" *ngSwitchCase="'2'">
                            <div class="col-2">
                                <div style="align-items: center; justify-content:center">
                                    <div class="p-2" style="background-color: rgb(206, 252, 168); border-radius:8px; width:fit-content">
                                        <!-- <i class="ni ni-active-40"> </i> -->
                                        <i class="fas fa-file-alt fa-2x" style="color: rgb(101, 163, 82);"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <p class="mb-0 text-sm">
                                    <span class="mr-2">
                                        <!-- <i class="fa fa-arrow-up"> </i> 3.48% -->
                                        <strong>Pembaharuan</strong>
                                    </span>
                                    <br>
                                    <span class="text-nowrap"> 2902</span>
                                </p>
                            </div>
                        </div>
                        <div class="row pt-3" *ngSwitchCase="'3'">
                            <div class="col-2">
                                <div style="align-items: center; justify-content:center">
                                    <div class="p-2" style="background-color: rgb(252, 251, 168); border-radius:8px; width:fit-content">
                                        <!-- <i class="ni ni-active-40"> </i> -->
                                        <i class="fas fa-file-alt fa-2x" style="color: rgb(245, 209, 51);"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <p class="mb-0 text-sm">
                                    <span class="mr-2">
                                        <!-- <i class="fa fa-arrow-up"> </i> 3.48% -->
                                        <strong>Pendua</strong>
                                    </span>
                                    <br>
                                    <span class="text-nowrap"> 2902</span>
                                </p>
                            </div>
                        </div>
                        <div class="row pt-3" *ngSwitchCase="'4'">
                            <div class="col-2">
                                <div style="align-items: center; justify-content:center">
                                    <div class="p-2" style="background-color: rgb(250, 160, 160); border-radius:8px; width:fit-content">
                                        <!-- <i class="ni ni-active-40"> </i> -->
                                        <i class="fas fa-file-alt fa-2x" style="color: rgb(245, 51, 51);"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <p class="mb-0 text-sm">
                                    <span class="mr-2">
                                        <!-- <i class="fa fa-arrow-up"> </i> 3.48% -->
                                        <strong>Rayuan</strong>
                                    </span>
                                    <br>
                                    <span class="text-nowrap"> 2902</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl col-md-4">
                <div class="card card-stats p-3" style="border-radius: 15px; height:100%">
                    <div class="card-body" [ngSwitch]="inprocess">
                        <div class="row">
                            <div class="col">
                                <h5 class="h6 card-title text-uppercase text-muted mb-0">
                                    DALAM PROSES
                                </h5>

                                <span class="h5 font-weight-bold mb-0"> 3982 </span>
                            </div>

                            <div class="col-auto" (click)="onShowInProcess()">
                                <div class="">
                                    <!-- <i class="ni ni-active-40"> </i> -->
                                    <i class="fas fa-ellipsis-h" [@rotatedState]='rotateInProg'></i>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3" *ngSwitchDefault>
                            <div class="col-2">
                                <div style="align-items: center; justify-content:center">
                                    <div class="p-2" style="background-color: rgb(168, 228, 252); border-radius:8px; width:fit-content">
                                        <!-- <i class="ni ni-active-40"> </i> -->
                                        <i class="fas fa-file-alt fa-2x" style="color: rgb(51, 142, 245);"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <p class="mb-0 text-sm">
                                    <span class="mr-2">
                                        <!-- <i class="fa fa-arrow-up"> </i> 3.48% -->
                                        <strong>Baharu</strong>
                                    </span>
                                    <br>
                                    <span class="text-nowrap"> 2902</span>
                                </p>
                            </div>
                        </div>
                        <div class="row pt-3" *ngSwitchCase="'2'">
                            <div class="col-2">
                                <div style="align-items: center; justify-content:center">
                                    <div class="p-2" style="background-color: rgb(206, 252, 168); border-radius:8px; width:fit-content">
                                        <!-- <i class="ni ni-active-40"> </i> -->
                                        <i class="fas fa-file-alt fa-2x" style="color: rgb(101, 163, 82);"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <p class="mb-0 text-sm">
                                    <span class="mr-2">
                                        <!-- <i class="fa fa-arrow-up"> </i> 3.48% -->
                                        <strong>Pembaharuan</strong>
                                    </span>
                                    <br>
                                    <span class="text-nowrap"> 2902</span>
                                </p>
                            </div>
                        </div>
                        <div class="row pt-3" *ngSwitchCase="'3'">
                            <div class="col-2">
                                <div style="align-items: center; justify-content:center">
                                    <div class="p-2" style="background-color: rgb(252, 251, 168); border-radius:8px; width:fit-content">
                                        <!-- <i class="ni ni-active-40"> </i> -->
                                        <i class="fas fa-file-alt fa-2x" style="color: rgb(245, 209, 51);"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <p class="mb-0 text-sm">
                                    <span class="mr-2">
                                        <!-- <i class="fa fa-arrow-up"> </i> 3.48% -->
                                        <strong>Pendua</strong>
                                    </span>
                                    <br>
                                    <span class="text-nowrap"> 2902</span>
                                </p>
                            </div>
                        </div>
                        <div class="row pt-3" *ngSwitchCase="'4'">
                            <div class="col-2">
                                <div style="align-items: center; justify-content:center">
                                    <div class="p-2" style="background-color: rgb(250, 160, 160); border-radius:8px; width:fit-content">
                                        <!-- <i class="ni ni-active-40"> </i> -->
                                        <i class="fas fa-file-alt fa-2x" style="color: rgb(245, 51, 51);"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <p class="mb-0 text-sm">
                                    <span class="mr-2">
                                        <!-- <i class="fa fa-arrow-up"> </i> 3.48% -->
                                        <strong>Rayuan</strong>
                                    </span>
                                    <br>
                                    <span class="text-nowrap"> 2902</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl col-md-4">
                <div class="card card-stats p-3" style="border-radius: 15px; height:100%">
                    <div class="card-body" [ngSwitch]="finished">
                        <div class="row">
                            <div class="col">
                                <h5 class="h6 card-title text-uppercase text-muted mb-0">
                                    SELESAI
                                </h5>

                                <span class="h5 font-weight-bold mb-0"> 3982 </span>
                            </div>

                            <div class="col-auto" (click)="onShowFinishied()">
                                <div class="">
                                    <!-- <i class="ni ni-active-40"> </i> -->
                                    <i class="fas fa-ellipsis-h" [@rotatedState]='rotatefinished'></i>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3" *ngSwitchDefault>
                            <div class="col-2">
                                <div style="align-items: center; justify-content:center">
                                    <div class="p-2" style="background-color: rgb(168, 228, 252); border-radius:8px; width:fit-content">
                                        <!-- <i class="ni ni-active-40"> </i> -->
                                        <i class="fas fa-file-alt fa-2x" style="color: rgb(51, 142, 245);"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <p class="mb-0 text-sm">
                                    <span class="mr-2">
                                        <!-- <i class="fa fa-arrow-up"> </i> 3.48% -->
                                        <strong>Baharu</strong>
                                    </span>
                                    <br>
                                    <span class="text-nowrap"> 2902</span>
                                    <br>
                                    <span>
                                        <small>
                                            <i class="far fa-check-circle" style="color: rgb(123, 223, 84);"></i>
                                            632 permohonan
                                            lulus
                                        </small>
                                    </span>
                                    <br>
                                    <span>
                                        <small>
                                            <i class="far fa-times-circle" style="color: rgb(250, 82, 82);"></i>
                                            1000 permohonan
                                            gagal
                                        </small>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="row pt-3" *ngSwitchCase="'2'">
                            <div class="col-2">
                                <div style="align-items: center; justify-content:center">
                                    <div class="p-2" style="background-color: rgb(206, 252, 168); border-radius:8px; width:fit-content">
                                        <!-- <i class="ni ni-active-40"> </i> -->
                                        <i class="fas fa-file-alt fa-2x" style="color: rgb(101, 163, 82);"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <p class="mb-0 text-sm">
                                    <span class="mr-2">
                                        <!-- <i class="fa fa-arrow-up"> </i> 3.48% -->
                                        <strong>Pembaharuan</strong>
                                    </span>
                                    <br>
                                    <span class="text-nowrap"> 2902</span>
                                    <br>
                                    <span>
                                        <small>
                                            <i class="far fa-check-circle" style="color: rgb(123, 223, 84);"></i>
                                            632 permohonan
                                            lulus
                                        </small>
                                    </span>
                                    <br>
                                    <span>
                                        <small>
                                            <i class="far fa-times-circle" style="color: rgb(250, 82, 82);"></i>
                                            1000 permohonan
                                            gagal
                                        </small>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="row pt-3" *ngSwitchCase="'3'">
                            <div class="col-2">
                                <div style="align-items: center; justify-content:center">
                                    <div class="p-2" style="background-color: rgb(252, 251, 168); border-radius:8px; width:fit-content">
                                        <!-- <i class="ni ni-active-40"> </i> -->
                                        <i class="fas fa-file-alt fa-2x" style="color: rgb(245, 209, 51);"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <p class="mb-0 text-sm">
                                    <span class="mr-2">
                                        <!-- <i class="fa fa-arrow-up"> </i> 3.48% -->
                                        <strong>Pendua</strong>
                                    </span>
                                    <br>
                                    <span class="text-nowrap"> 2902</span>
                                    <br>
                                    <span>
                                        <small>
                                            <i class="far fa-check-circle" style="color: rgb(123, 223, 84);"></i>
                                            632 permohonan
                                            lulus
                                        </small>
                                    </span>
                                    <br>
                                    <span>
                                        <small>
                                            <i class="far fa-times-circle" style="color: rgb(250, 82, 82);"></i>
                                            1000 permohonan
                                            gagal
                                        </small>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="row pt-3" *ngSwitchCase="'4'">
                            <div class="col-2">
                                <div style="align-items: center; justify-content:center">
                                    <div class="p-2" style="background-color: rgb(250, 160, 160); border-radius:8px; width:fit-content">
                                        <!-- <i class="ni ni-active-40"> </i> -->
                                        <i class="fas fa-file-alt fa-2x" style="color: rgb(245, 51, 51);"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <p class="mb-0 text-sm">
                                    <span class="mr-2">
                                        <!-- <i class="fa fa-arrow-up"> </i> 3.48% -->
                                        <strong>Rayuan</strong>
                                    </span>
                                    <br>
                                    <span class="text-nowrap"> 2902</span>
                                    <br>
                                    <span>
                                        <small>
                                            <i class="far fa-check-circle" style="color: rgb(123, 223, 84);"></i>
                                            632 permohonan
                                            lulus
                                        </small>
                                    </span>
                                    <br>
                                    <span>
                                        <small>
                                            <i class="far fa-times-circle" style="color: rgb(250, 82, 82);"></i>
                                            1000 permohonan
                                            gagal
                                        </small>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                        <option>Pilih Jenis Permohonan</option>
                                        <option>Permohonan Baharu</option>
                                        <option>Permohonan Pembaharuan</option>
                                        <option>Permohonan Pendua</option>
                                        <option>Permohonan Rayuan</option>
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
                    <h6> Tugasan Baru</h6>
                </div>

                <div class="card-body p-3">
                    <div class="row p-3 mb-0">
                        <div class="col form-group d-flex justify-content-start align-items-center p-0 mb-0">
                            <label class="d-flex flex-nowrap mb-0">
                                <span class="pl-0 pt-2 pr-2">papar</span>
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
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">TARIKH PERMOHONAN</th>
                                        <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">JENIS PERMOHONAN</th>
                                        <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">NAMA PEMOHON</th>
                                        <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">NO KAD PENGENALAN</th>
                                        <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">NEGERI</th>
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
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-danger"> Belum Disemak</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="/penyokong-maklumat-pemohon">
                                                <i class="fas fa-edit"></i>
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