@extends('layouts.baseUser')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="p-2 text-capitalize">
                <h5 class="h3 text-dark pt-4 text-center"><strong> Arkib Bergambar</strong></h5>
            </div>
            <div class="p-2 text-capitalize">
                <h6 class="text- capitalize text-bold text-center">Arkib Bergambar 1 - Gambar 1</h6>
            </div>
        </div>

        <div class="row m-4">
            @foreach ($infogambars as $infogambar)
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
                    <p>nama program: {{ $infogambar->tajuk_ms }}</p>
                    <p>tempat: {{ $infogambar->lokasi }}</p>
                    <p>tarikh : {{ $infogambar->tarikh_mula }}</p>
                    <p>keterangan</p>
                    <p>{{ $infogambar->kandungan_ms }}</p>

                </div>
            @endforeach
        </div>
    </div>

@stop
