@extends('layouts.baseUser')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="p-2 text-capitalize">
                <h5 class="h3 text-dark pt-4 text-center"><strong>{{ __('landing.arkib_dokumen') }}</strong></h5>
                {{-- {!! Session::get('locale') !!} --}}
            </div>
        </div>
        <div class="row d-flex justify-content-center text-center">

            @foreach ($arkibdokumens as $senaraidokumen)
                <div class="card col-4 move-on-hover">
                    <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                        <a href="/arkib-dokumen-senarai/{{ $senaraidokumen->id }}" class="d-block">
                            <img src="/storage/{{ $senaraidokumen->jalan }}" class="img-fluid border-radius-lg"
                                style="max-height: 200px">
                        </a>
                    </div>

                    <div class="card-body pt-2">
                        @if (Session::get('locale') == 'en')
                            <a href="/arkib-dokumen-senarai/{{ $senaraidokumen->id }}"
                                class="card-title h5 d-block text-darker">
                                {{ $senaraidokumen->nama_en }}
                            </a>
                        @else
                            <a href="/arkib-dokumen-senarai/{{ $senaraidokumen->id }}"
                                class="card-title h5 d-block text-darker">
                                {{ $senaraidokumen->nama_ms }}
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@stop
