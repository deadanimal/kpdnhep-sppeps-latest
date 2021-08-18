@extends('layouts.baseUser')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="p-2 text-capitalize">
                <h5 class="h3 text-dark pt-4 text-center"><strong>Arkib Dokumen</strong></h5>
            </div>
        </div>
        <div class="row d-flex justify-content-center text-center">

            @foreach ($arkibdokumens as $senaraidokumen)
                <div class="card col-3 move-on-hover">
                    <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                        <a href="/arkib-dokumen/{{ $senaraidokumen->id }}" class="d-block">
                            <img src="/storage/{{ $senaraidokumen->jalan }}" class="img-fluid border-radius-lg" style="max-height: 200px">
                        </a>
                    </div>

                    <div class="card-body pt-2">
                        <a href="/arkib-dokumen/{{ $senaraidokumen->id }}" class="card-title h5 d-block text-darker">
                            {{ $senaraidokumen->nama_ms }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@stop
