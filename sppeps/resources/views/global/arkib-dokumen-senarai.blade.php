@extends('layouts.baseUser')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="p-2 text-capitalize">
                <h5 class="h3 text-dark pt-4 text-center"><strong>Arkib Dokumen</strong></h5>
            </div>
            <div class="p-2 text-capitalize">
                <h6 class="text- capitalize text-bold text-center">Arkib Dokumen 1</h6>
            </div>
        </div>
        <div class="row d-flex justify-content-center m-4">

            <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tajuk
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Keterangan</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Tarikh Kemaskini</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($infodokumens as $infodokumen)
                                <tr>
                                    <td class="text-sm font-weight-normal">{{ $loop->index + 1 }}</td>
                                    <td class="text-sm font-weight-normal">{{ $infodokumen->tajuk_ms }}</td>
                                    <td class="text-sm font-weight-normal">{{ $infodokumen->kandungan_ms }}</td>
                                    <td class="text-sm font-weight-normal">{{ $infodokumen->updated_at }}</td>
                                    <td class="text-sm font-weight-normal">
                                        <a href="/storage/{{ $infodokumen->jalan1 }}" target="_blank"
                                            class="btn btn-sm bg-gradient-info" data-original-title="Edit user">
                                            Lihat
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
@stop
