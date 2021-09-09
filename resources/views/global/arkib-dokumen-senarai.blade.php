@extends('layouts.baseUser')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="p-2 text-capitalize">
                <h5 class="h3 text-dark pt-4 text-center"><strong>{{ __('landing.arkib_dokumen') }}</strong></h5>
            </div>

            <div class="p-2 text-capitalize">
                <h6 class="text- capitalize text-bold text-center">{{ __('landing.arkib_dokumen') }} </h6>
            </div>

        </div>
        <div class="row d-flex justify-content-center m-4">

            <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    No.</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{ __('landing.tajuk') }}
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{ __('landing.keterangan') }}</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{ __('landing.tarikh_kemaskini') }}</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{ __('landing.tindakan') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($infodokumens as $infodokumen)
                                <tr>
                                    <td class="text-center text-sm font-weight-normal">{{ $loop->index + 1 }}</td>
                                    <td class="text-center text-sm font-weight-normal">
                                        @if (Session::get('locale') == 'en')
                                            {{ $infodokumen->tajuk_en }}
                                        @else
                                            {{ $infodokumen->tajuk_ms }}
                                        @endif
                                    </td>
                                    <td class="text-center text-sm font-weight-normal">
                                        @if (Session::get('locale') == 'en')
                                            {{ $infodokumen->kandungan_en }}
                                        @else
                                            {{ $infodokumen->kandungan_ms }}
                                        @endif
                                    </td>
                                    <td class="text-center text-sm font-weight-normal">{{ $infodokumen->updated_at }}</td>
                                    <td class="text-center text-sm font-weight-normal">
                                        <a href="/storage/{{ $infodokumen->jalan1 }}" target="_blank"
                                            class="btn btn-sm bg-gradient-info">
                                            {{ __('landing.lihat_dokumen') }}
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
