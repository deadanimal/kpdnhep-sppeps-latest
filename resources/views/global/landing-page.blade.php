@extends('layouts.baseUser')

@section('content')
    <div class="container-fluid p-0"
        style="background-image: url('/assets/img/background/kpdnhep-building.jpg'); background-attachment: fixed; background-size:cover; background-repeat: no-repeat;">
        <div class="row p-3">

            <div class="row">
                <div id="carouselControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">

                        @foreach ($banlands as $banland)
                            @if ($loop->iteration == 1)
                                <div class="carousel-item active">
                                @else
                                    <div class="carousel-item">
                            @endif
                            <div class="page-header min-vh-50 m-3 border-radius-xl"
                                style="background-image: url('/storage/{{ $banland->jalan }}');">

                            </div>
                    </div>

                    @endforeach

                </div>
                <div class="min-vh-50 position-absolute w-100 top-0 bottom-0">
                    <a class="carousel-control-prev" href="#carouselControls" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon position-absolute bottom-50" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselControls" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon position-absolute bottom-50" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>

        </div>


        <div class="row pb-3">
            <div class="container-fluid px-3">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="info-horizontal bg-gradient-light border-radius-xl p-5">
                            <div class="icon">
                                <svg class="text-danger" width="25px" height="25px" viewBox="0 0 40 44" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>document</title>
                                    <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="Rounded-Icons" transform="translate(-1870.000000, -591.000000)"
                                            fill="#FFFFFF" fill-rule="nonzero">
                                            <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                                <g id="document" transform="translate(154.000000, 300.000000)">
                                                    <path class="color-foreground"
                                                        d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z"
                                                        id="Path" opacity="0.603585379"></path>
                                                    <path class="color-background"
                                                        d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"
                                                        id="Shape"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="description ps-5">
                                <h4 class="mb-4"><b>{{ __('landing.Pengumuman') }}</b></h4>
                                @foreach ($penglands as $pengu)
                                    @if (Session::get('locale') == 'ms')
                                        <h5 style="text-transform:capitalize;">{{ $pengu->tajuk_bm }}</h5>
                                        <p class="mb-4">{{ $pengu->kandungan_bm }}</p>
                                    @else
                                        <h5 style="text-transform:capitalize;">{{ $pengu->tajuk_en }}</h5>
                                        <p class="mb-4">{{ $pengu->kandungan_en }}</p>
                                    @endif

                                @endforeach

                                {{-- <a href="javascript:;" class="text-dark icon-move-right">
                                More about us
                                <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                            </a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="info-horizontal bg-gradient-info border-radius-xl p-5">
                            <div class="icon">
                                <svg class="mt-1" width="25px" height="25px" viewBox="0 0 40 40" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>settings</title>
                                    <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="Rounded-Icons" transform="translate(-2020.000000, -442.000000)"
                                            fill="#FFFFFF" fill-rule="nonzero">
                                            <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                                <g id="settings" transform="translate(304.000000, 151.000000)">
                                                    <polygon id="Path" opacity="0.596981957"
                                                        points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                                                    </polygon>
                                                    <path
                                                        d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z"
                                                        id="Path" opacity="0.596981957"></path>
                                                    <path
                                                        d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z"
                                                        id="Path"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="description ps-5">
                                {{-- <h5 class="text-white">Keterangan Sistem</h5> --}}
                                <p class="font_color">{{ __('landing.sistempercetakanpermit___') }}</p>

                                @can('isPemohon')
                                    <a href="/dashboard" class="btn btn-primary">
                                        {{ __('landing.mohon_sekarang') }}
                                    </a>
                                @else
                                    <a href="/login_" class="btn btn-primary">
                                        {{ __('landing.mohon_sekarang') }}
                                    </a>
                                @endcan



                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop
