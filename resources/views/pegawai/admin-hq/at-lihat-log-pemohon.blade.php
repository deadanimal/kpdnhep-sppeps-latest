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
                        

                        <div class="row">
                            <div class="col">

                                <h6>Log Pemohon</h6>
                            </div>
                            <div class="col d-flex justify-content-end">
    
                                <a href="/log_pemohon" class="btn btn-info btn-sm">
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-3">
                        <div class="row">
                            @foreach ($pemohon as $pemohon)


                                <p>Nama Pemohon : {{ $pemohon->name }}</p>
                                <p>No. Kad Pengenalan : {{ $pemohon->no_kp }}</p>
                                <p>Negeri : {{ $pemohon->negeri }}</p>
                                <!-- <p>Capaian : Pelulus</p> -->
                            @endforeach

                        </div>

                        <div class="card">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                No.</th>
                                            <th
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                                tarikh</th>
                                            <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                Dikemaskini Oleh</th>
                                            <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                deskripsi</th>
                                            <th
                                                class="text-uppercase text-center  text-secondary text-xs font-weight-bolder opacity-7">
                                                Catatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($audit as $audit)


                                            <tr>
                                                <td>
                                                    <span
                                                        class="text-secondary text-sm font-weight-bold">{{ $loop->index + 1 }}</span>
                                                </td>
                                                <td>
                                                    <span class="text-secondary text-sm font-weight-bold">
                                                        {{ $audit->created_at }}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    {{ $audit->nama_pegawai }}
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-sm font-weight-bold">
                                                        {{ $audit->description }}
                                                    </span>
                                                </td>

                                            </tr>
                                        @endforeach

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
