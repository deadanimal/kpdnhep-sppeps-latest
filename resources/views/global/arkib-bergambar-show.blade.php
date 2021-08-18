@extends('layouts.baseUser')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="p-2 text-capitalize">
                <h5 class="h3 text-dark pt-4 text-center"><strong>Arkib Bergambar</strong></h5>
            </div>
        </div>
        <div class="row d-flex justify-content-center text-center">

            @foreach ($senaraigamlands as $gambaq)
                <div class="col-md-3 p-2">
                    <a href="/arkib-bergambar-info/{{$gambaq->id}}">
                        <div class="card card-background move-on-hover">
                            <div class="full-background">
                                <img src="/storage/{{$gambaq->jalan1}}" class="d-block w-100" alt="Tiada Gambar" style="max-height: 200px">
                            </div>
                            <div class="card-body pt-12">
                                <h4 class="text-white">{{ $gambaq->tajuk_ms }}</h4>
                                <p>{{ $gambaq->kandungan_ms }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                {{-- <div class="card col-3 move-on-hover">
                    <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                        <a href="/arkib-bergambar/{{ $arkgamlan->id }}" class="d-block">
                            <img src="{{ url('/storage/', $arkgamlan->jalan) }}" class="img-fluid border-radius-lg"
                                style="max-height: 200px">
                        </a>
                    </div>

                    <div class="card-body pt-2">
                        <a href="javascript:;" class="card-title h5 d-block text-darker">
                            {{ $arkgamlan->nama_ms }}
                        </a>
                    </div>
                </div> --}}
            @endforeach
        </div>
    </div>
@stop
