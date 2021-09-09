@extends('layouts.baseUser')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="p-2 text-capitalize">
                <h5 class="h3 text-dark pt-4 text-center"><strong>{{ __('landing.arkib_bergambar') }}</strong></h5>
            </div>
        </div>
        <div class="row d-flex justify-content-center text-center">

            @foreach ($arkgamlans as $arkgamlan)
                <div class="card col-3 move-on-hover">
                    <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                        <a href="/arkib-bergambar/{{ $arkgamlan->id }}" class="d-block">
                            <img src="/storage/{{ $arkgamlan->jalan }}" class="img-fluid border-radius-lg"
                                style="max-height: 200px">
                        </a>
                    </div>

                    <div class="card-body pt-2">
                        @if (Session::get('locale') == 'en')
                            <a href="/arkib-bergambar/{{ $arkgamlan->id }}" class="card-title h5 d-block text-darker">
                                {{ $arkgamlan->nama_en }}
                            </a>
                        @else
                            <a href="/arkib-bergambar/{{ $arkgamlan->id }}" class="card-title h5 d-block text-darker">
                                {{ $arkgamlan->nama_ms }}
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop
