@extends('layouts.baseUser')

@section('content')
<div class="container-fluid py-4 d-flex justify-content-center flex-wrap">
    <div class="row">
        <div class="p-2 text-capitalize">
            <h5 class="h3 text-dark pt-4 text-center"><strong>Semakan Status EPS</strong></h5>
        </div>
    </div>

    <div class="row m-4" style="width: 80%;">
        <div class="card card-frame">
            <div class="card-body">
                <div class="container p-2 m-0 d-flex justify-content-center flex-wrap" style="height: 100%; width: 100%;">
                    <div class="row p-2 m-0" style="width: 100%; justify-content:center" *ngIf="search">
                        <form class="p-2" style="width: 70%;" (ngSubmit)="toggle()">
                            <div class="form-group text-capitalize d-flex justify-content-center flex-wrap">
                                <label class="pb-3 pt-3" for="nric"><strong>no kad pengenalan atau no. permit</strong> </label>
                                <input type="text" class="form-control text-center" id="nric" placeholder="Sila masukkan no. kad pengenalan tanpa '-'">
                            </div>
                            <div class="form-group text-uppercase d-flex justify-content-center pt-5">
                                <input type="submit" class="btn text-white" style="background-color: #1d1da1;" value="Semak" (click)="semakEPS()">
                            </div>
                        </form>
                    </div>

                    <div class="card-body p-3 text-capitalize mt-5" *ngIf="show">
                        <div style="overflow-x:auto;" class="pb-5">

                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <!-- <table style="width: 100%;" *ngIf="userdata !== null; else null"> -->
                                    <tr>
                                        <!-- <th>No.</th> -->
                                        <th>No. Kad Pengenalan</th>
                                        <th>Nama Ejen</th>
                                        <th>No. Permit</th>
                                        <th>Status EPS</th>
                                    </tr>

                                    <tr>
                                        <!-- <td>1</td> -->
                                        <td>900908070605</td>
                                        <td>Ali Baba</td>
                                        <td>09872</td>
                                        <td><span class="badge badge-success">Aktif</span></td>
                                    </tr>
                                </table>
                            </div>
                            <!-- <ng-template #null>
                                <p>Your data does not exist. Please check your entered number or contact administrator for help.</p>
                            </ng-template> -->
                        </div>
                        <!-- add padding top -->
                        <div class="p-3 d-flex justify-content-center">
                            <button type="button" class="btn btn-md text-capitalize" style="background-color: #1d1da1; color:#fff" (click)="toggle()">
                                Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@stop