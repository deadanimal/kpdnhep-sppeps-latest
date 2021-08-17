@extends('layouts.baseUser')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="p-2 text-capitalize">
                <h5 class="h3 text-dark pt-4 text-center"><strong>Arkib Bergambar</strong></h5>
            </div>
        </div>
        <div class="row d-flex justify-content-center text-center">

            @foreach ($arkgamlans as $arkgamlan)
                <div class="card col-3 move-on-hover">
                    <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                        <a href="/arkib-bergambar/{{$arkgamlan->id}}" class="d-block">
                            <img src="/storage/{{$arkgamlan->jalan}}" class="img-fluid border-radius-lg" style="max-height: 200px">
                        </a>
                    </div>

                    <div class="card-body pt-2">
                        <a href="/arkib-bergambar/{{$arkgamlan->id}}" class="card-title h5 d-block text-darker">
                            {{ $arkgamlan->nama_ms }}
                        </a>
                    </div>
                </div>
            @endforeach

            {{-- <div class="card col-3 move-on-hover">
                <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                    <a href="/arkib-bergambar-senarai" class="d-block">
                        <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/nastuh.jpg"
                            class="img-fluid border-radius-lg">
                    </a>
                </div>

                <div class="card-body pt-2">
                    <a href="javascript:;" class="card-title h5 d-block text-darker">
                        Arkib Bergambar 1
                    </a>
                </div>
            </div>

            <div class="card col-3 move-on-hover">
                <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                    <a href="javascript:;" class="d-block">
                        <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/nastuh.jpg"
                            class="img-fluid border-radius-lg">
                    </a>
                </div>

                <div class="card-body pt-2">
                    <a href="javascript:;" class="card-title h5 d-block text-darker">
                        Arkib Bergambar 2
                    </a>
                </div>
            </div>

            <div class="card col-3 move-on-hover">
                <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                    <a href="javascript:;" class="d-block">
                        <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/nastuh.jpg"
                            class="img-fluid border-radius-lg">
                    </a>
                </div>

                <div class="card-body pt-2">
                    <a href="javascript:;" class="card-title h5 d-block text-darker">
                        Arkib Bergambar 3
                    </a>
                </div>
            </div> --}}
        </div>
    </div>
@stop
