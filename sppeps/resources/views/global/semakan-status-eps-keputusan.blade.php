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
                    <div class="container p-2 m-0 d-flex justify-content-center flex-wrap"
                        style="height: 100%; width: 100%;">
                        <div class="card-body p-3 text-capitalize mt-5" *ngIf="show">
                            <div style="overflow-x:auto;" class="pb-5">

                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0">
                                        <!-- <table style="width: 100%;" *ngIf="userdata !== null; else null"> -->

                                        <tr>
                                            <!-- <th>No.</th> -->
                                            <th>No. Kad Pengenalan</th>
                                            <th>Nama EPS</th>
                                            <th>No. Permit</th>
                                            <th>Status EPS</th>
                                        </tr>

                                        @foreach ($keputusans as $keputusan)

                                            <tr>
                                                <!-- <td>1</td> -->
                                                <td>{{ $keputusan->no_kp }}</td>
                                                <td>{{ $keputusan->nama }}</td>
                                                <td>{{ $keputusan->no_permit }}</td>
                                                <td>
                                                    @if ($keputusan->tarikh_diluluskan <= $currentDate && $keputusan->tarikh_tamat_permit >= $currentDate)
                                                        <span class="badge badge-success">Aktif</span>
                                                    @else
                                                        <span class="badge badge-danger">Tidak Aktif</span>
                                                    @endif
                                                </td>
                                            </tr>

                                        @endforeach
                                    </table>
                                </div>
                                <!-- <ng-template #null>
                                            <p>Your data does not exist. Please check your entered number or contact administrator for help.</p>
                                        </ng-template> -->
                            </div>
                            <!-- add padding top -->
                            <div class="p-3 d-flex justify-content-center">
                                <a href="/semakan-status-eps" type="button" class="btn btn-md text-capitalize"
                                    style="background-color: #1d1da1; color:#fff">
                                    Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop
