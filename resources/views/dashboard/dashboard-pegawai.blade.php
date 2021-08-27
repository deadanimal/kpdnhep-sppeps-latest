@extends('layouts.base-admin-hq')

@section('content')

<div class="container-fluid py-4">

    <div class="p-3">

        <div class="row">
            <div class="col-xl col-md-4">

                <div class="card card-stats p-3" style="border-radius: 15px; height:100%">
                    <div class="card-body" [ngSwitch]="appLog">
                        <div class="row">
                            <div class="col">
                                <h5 class="h6 card-title text-uppercase text-muted mb-0">
                                    PERMOHONAN
                                </h5>

                                <span class="h5 font-weight-bold mb-0"> {{ $bilpermohonan }} </span>
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
                                    <span class="text-nowrap"> {{ $permohonanbaharus }} </span>
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
                                    <span class="text-nowrap"> {{ $permohonanpembaharuans }}</span>
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
                                    <span class="text-nowrap"> {{ $permohonanpenduas }}</span>
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
                                    <span class="text-nowrap"> {{ $permohonanrayuans }}</span>
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

                                <span class="h5 font-weight-bold mb-0"> {{ $bildalamproses }} </span>
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
                                    <span class="text-nowrap"> {{ $prosesbaharus }}</span>
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
                                    <span class="text-nowrap"> {{ $prosespembaharuans }}</span>
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
                                    <span class="text-nowrap"> {{ $prosespenduas }}</span>
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
                                    <span class="text-nowrap"> {{ $prosesrayuans }}</span>
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

                                <span class="h5 font-weight-bold mb-0"> {{ $bilselesai }} </span>
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
                                    <span class="text-nowrap"> {{ $bilbaharu }}</span>
                                    <br>
                                    <span>
                                        <small>
                                            <i class="far fa-check-circle" style="color: rgb(123, 223, 84);"></i>
                                            {{ $baharululus }} permohonan
                                            lulus
                                        </small>
                                    </span>
                                    <br>
                                    <span>
                                        <small>
                                            <i class="far fa-times-circle" style="color: rgb(250, 82, 82);"></i>
                                            {{ $baharutaklulus }} permohonan
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
                                    <span class="text-nowrap"> {{ $bilpembaharuan }}</span>
                                    <br>
                                    <span>
                                        <small>
                                            <i class="far fa-check-circle" style="color: rgb(123, 223, 84);"></i>
                                            {{ $pembaharuanlulus }} permohonan
                                            lulus
                                        </small>
                                    </span>
                                    <br>
                                    <span>
                                        <small>
                                            <i class="far fa-times-circle" style="color: rgb(250, 82, 82);"></i>
                                            {{ $pembaharuantaklulus }} permohonan
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
                                    <span class="text-nowrap"> {{ $bilpendua }}</span>
                                    <br>
                                    <span>
                                        <small>
                                            <i class="far fa-check-circle" style="color: rgb(123, 223, 84);"></i>
                                            {{ $pendualulus }} permohonan
                                            lulus
                                        </small>
                                    </span>
                                    <br>
                                    <span>
                                        <small>
                                            <i class="far fa-times-circle" style="color: rgb(250, 82, 82);"></i>
                                            {{ $penduataklulus }} permohonan
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
                                    <span class="text-nowrap"> {{ $bilrayuan }}</span>
                                    <br>
                                    <span>
                                        <small>
                                            <i class="far fa-check-circle" style="color: rgb(123, 223, 84);"></i>
                                            {{ $rayuanlulus }} permohonan
                                            lulus
                                        </small>
                                    </span>
                                    <br>
                                    <span>
                                        <small>
                                            <i class="far fa-times-circle" style="color: rgb(250, 82, 82);"></i>
                                            {{ $rayuantaklulus }} permohonan
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
    </div>

</div>
@stop