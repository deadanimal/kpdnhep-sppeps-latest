@extends('layouts.baseUser')

@section('content')
<div class="container-fluid py-4 d-flex justify-content-center flex-wrap" style="height: 100vh; max-height:600px">
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
                        <form method="POST" action="/cari-eps" class="p-2" style="width: 70%;" >
                            @csrf
                            <div class="form-group text-capitalize d-flex justify-content-center flex-wrap">
                                <label class="pb-3 pt-3" for="nric"><strong>no kad pengenalan atau no. permit</strong> </label>
                                <input type="text" class="form-control text-center" id="nric" name="no_kp_or_permit" placeholder="Sila masukkan no. kad pengenalan tanpa '-'">
                            </div>
                            <div class="form-group text-uppercase d-flex justify-content-center pt-5">
                                <input type="submit" class="btn text-white text-capitalize" style="background-color: #1d1da1;" value="Semak">
                            </div>
                        </form>
                    </div>

                    {{-- <div class="card-body p-3 text-capitalize mt-5" *ngIf="show">
                        <div style="overflow-x:auto;" class="pb-5">

                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                   
                                    <tr>
                                        
                                        <th>No. Kad Pengenalan</th>
                                        <th>Nama EPS</th>
                                        <th>No. Permit</th>
                                        <th>Status EPS</th>
                                    </tr>

                                    <tr>
                                        <td>900908070605</td>
                                        <td>Ali Baba</td>
                                        <td>09872 (WPKL)</td>
                                        <td><span class="badge badge-success">Aktif</span></td>
                                    </tr>
                                </table>
                            </div>
                            
                        </div>
                        
                        <div class="p-3 d-flex justify-content-center">
                            <button type="button" class="btn btn-md text-capitalize" style="background-color: #1d1da1; color:#fff" (click)="toggle()">
                                Kembali</button>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

</div>
@stop