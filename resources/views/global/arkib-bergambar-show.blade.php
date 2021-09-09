@extends('layouts.baseUser')

@section('content')
    <div class="container-fluid py-4" style="height: 100vh;">
        <div class="row">
            <div class="p-2 text-capitalize">
                <h5 class="h3 text-dark pt-4 text-center"><strong>{{ __('landing.arkib_bergambar') }}</strong></h5>
            </div>
        </div>
        <div class="row d-flex justify-content-center text-center">

            @foreach ($senaraigamlands as $gambaq)
                <div class="col-md-3 p-2">
                    <a href="/arkib-bergambar-info/{{ $gambaq->id }}">
                        <div class="card card-background move-on-hover">
                            <div class="full-background">
                                <img src="/storage/{{ $gambaq->jalan1 }}" class="d-block w-100" alt="Tiada Gambar"
                                    style="max-height: 200px">
                            </div>
                            <div class="card-body pt-12">
                                @if (Session::get('locale') == 'en')
                                    <h4 class="text-white">{{ $gambaq->tajuk_en }}</h4>
                                    <p>{{ $gambaq->kandungan_en }}</p>
                                @else
                                    <h4 class="text-white">{{ $gambaq->tajuk_ms }}</h4>
                                    <p>{{ $gambaq->kandungan_ms }}</p>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@stop
