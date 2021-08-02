@extends('layouts.base-pemohon')

@section('content')


<div class="container-fluid d-flex justify-content-center flex-wrap">
    <div class="row">
        <div class="col-12 text-center">
            <h3 class="mt-5"><strong>Semakan Status Permohonan</strong></h3>
            <!-- <h5 class="text-secondary font-weight-normal">This information will let us know more about you.</h5> -->

        </div>
    </div>
    <div class="row mt-4" style="width: 80%;">

        <div class="card">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No.</th>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Tarikh Hantar</th>
                            <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">Jenis Permohonan</th>
                            <th class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">No.Kad Pengenalan</th>
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
                            <td class="align-middle text-center">
                                <span class="text-secondary text-sm font-weight-bold">981209089989</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-sm font-weight-bold">
                                    <span class="badge badge-secondary">Dalam Proses</span>
                                </span>
                            </td>
                            <td class="align-middle">
                                <a href="javascript:;" class="btn btn-sm btn-primary" data-toggle="tooltip" data-original-title="Edit user">
                                    Lihat Maklumat Status
                                </a>

                                <!-- <a href="javascript:;" class="btn btn-sm btn-primary" data-toggle="tooltip" data-original-title="Edit user">
                                    Bayar
                                </a> -->
                            </td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>



    </div>

</div>

@stop