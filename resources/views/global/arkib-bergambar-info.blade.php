@extends('layouts.baseUser')

@section('content')
    <div class="container-fluid py-4" style="height: 100vh;">
        <div class="row">
            <div class="p-2 text-capitalize">

                <h5 class="h3 text-dark pt-4 text-center"><strong> {{ __('landing.arkib_bergambar') }}</strong></h5>

            </div>
        </div>

        <div class="row m-4">
            @foreach ($infogambars as $infogambar)
                <div class="p-2 text-capitalize">
                    @if (Session::get('locale') == 'en')
                        <h6 class="text-capitalize text-bold text-center">{{ $infogambar->tajuk_en }}</h6>
                    @else
                        <h6 class="text-capitalize text-bold text-center">{{ $infogambar->tajuk_ms }}</h6>
                    @endif
                </div>
                <div class="col-md-6">

                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @if ($infogambar->jalan1 !== null)
                                <div class="carousel-item active">
                                    <div class="page-header min-vh-50 m-3 border-radius-xl">
                                        <img src="/storage/{{ $infogambar->jalan1 }}" class="d-block w-100" alt="..."
                                            style="max-height: 400px">
                                    </div>
                                </div>
                            @endif

                            @if ($infogambar->jalan2 !== null)
                                <div class="carousel-item">
                                    <div class="page-header min-vh-50 m-3 border-radius-xl">
                                        <img src="/storage/{{ $infogambar->jalan2 }}" class="d-block w-100" alt="..."
                                            style="max-height: 400px">
                                    </div>
                                </div>
                            @endif

                            @if ($infogambar->jalan3 !== null)
                                <div class="carousel-item">
                                    <div class="page-header min-vh-50 m-3 border-radius-xl">
                                        <img src="/storage/{{ $infogambar->jalan3 }}" class="d-block w-100" alt="..."
                                            style="max-height: 400px">
                                    </div>
                                </div>
                            @endif

                            @if ($infogambar->jalan4 !== null)
                                <div class="carousel-item">
                                    <div class="page-header min-vh-50 m-3 border-radius-xl">
                                        <img src="/storage/{{ $infogambar->jalan4 }}" class="d-block w-100" alt="..."
                                            style="max-height: 400px">
                                    </div>
                                </div>
                            @endif

                            @if ($infogambar->jalan5 !== null)
                                <div class="carousel-item">
                                    <div class="page-header min-vh-50 m-3 border-radius-xl">
                                        <img src="/storage/{{ $infogambar->jalan5 }}" class="d-block w-100" alt="..."
                                            style="max-height: 400px">
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="min-vh-75 position-absolute w-100 top-0">
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon position-absolute bottom-50"
                                    aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon position-absolute bottom-50"
                                    aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">

                    <p>{{ __('landing.nama_program') }}: 
                    @if (Session::get('locale') == 'en')
                            {{ $infogambar->tajuk_en }}
                        @else
                            {{ $infogambar->tajuk_ms }}
                        @endif
                    </p>
                    <p>{{ __('landing.tempat') }}: {{ $infogambar->lokasi }}</p>
                    <p>{{ __('landing.tarikh') }} : {{ $infogambar->tarikh_mula }}</p>
                    <p>{{ __('landing.keterangan') }}</p>
                    <p> @if (Session::get('locale') == 'en')
                            {{ $infogambar->kandungan_en }}
                        @else
                            {{ $infogambar->kandungan_ms }}
                        @endif
                    </p>


                </div>
            @endforeach
        </div>
    </div>

@stop
