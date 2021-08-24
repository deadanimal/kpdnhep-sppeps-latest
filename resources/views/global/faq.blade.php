@extends('layouts.baseUser')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="p-2 text-capitalize">
                <h5 class="h3 text-dark pt-4 text-center"><strong>Soalan Lazim (FAQ)</strong></h5>
            </div>
        </div>

        <div class="row m-4">
            <div class="accordion-1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 mx-auto">
                            @foreach ($katefaqls as $index => $katefaql)
                                <div class="accordion" id="accordionKategori-{{ $katefaql->id }}">
                                    <div class="accordion-item mb-3">
                                        <h5 class="accordion-header" id="{{ $katefaql->id }}">
                                            <button class="accordion-button border-bottom font-weight-bold collapsed"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne-{{ $index }}" aria-expanded="false"
                                                aria-controls="collapseOne-{{ $index }}">
                                                {{ $katefaql->nama_kategori_bm }}
                                                <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3"
                                                    aria-hidden="true"></i>
                                                <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3"
                                                    aria-hidden="true"></i>
                                            </button>
                                        </h5>
                                        <div id="collapseOne-{{ $index }}" data-bs-parent="#accordionKategori-{{ $katefaql->id }}"
                                            style="">
                                            <div class="accordion-body text-sm opacity-8">
                                                @foreach ($faqls as $index => $faql)
                                                    <div class="accordion" id="accordionFaqLand">
                                                        <div class="accordion-item mb-3">
                                                            <h5 class="accordion-header" id="{{ $faql->id }}">
                                                                <button
                                                                    class="accordion-button border-bottom font-weight-bold collapsed"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseTwo-{{ $index }}"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapseTwo-{{ $index }}">
                                                                    {{ $faql->tajuk_bm }}
                                                                    <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3"
                                                                        aria-hidden="true"></i>
                                                                    <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3"
                                                                        aria-hidden="true"></i>
                                                                </button>
                                                            </h5>
                                                            <div id="collapseTwo-{{ $index }}"
                                                                data-bs-parent="#accordionFaqLand" style="">
                                                                <div class="accordion-body text-sm opacity-8">
                                                                    {{ $faql->kandungan_bm }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="accordion-1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 mx-auto">
                            <div class="accordion" id="accordionRental">
                                <div class="accordion-item mb-3">
                                    <h5 class="accordion-header" id="headingOne">
                                        <button class="accordion-button border-bottom font-weight-bold" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false"
                                            aria-controls="collapseOne">
                                            How do I order?
                                            <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3"
                                                aria-hidden="true"></i>
                                            <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3"
                                                aria-hidden="true"></i>
                                        </button>
                                    </h5>
                                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                        data-bs-parent="#accordionRental" style="">
                                        <div class="accordion-body text-sm opacity-8">
                                            We’re not always in the position that we want to be at. We’re
                                            constantly growing. We’re constantly making mistakes. We’re
                                            constantly trying to express ourselves and actualize our dreams.
                                            If you have the opportunity to play this game
                                            of life you need to appreciate every moment. A lot of people
                                            don’t appreciate the moment until it’s passed.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mb-3">
                                    <h5 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button border-bottom font-weight-bold" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            How can i make the payment?
                                            <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3"
                                                aria-hidden="true"></i>
                                            <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3"
                                                aria-hidden="true"></i>
                                        </button>
                                    </h5>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                        data-bs-parent="#accordionRental">
                                        <div class="accordion-body text-sm opacity-8">
                                            It really matters and then like it really doesn’t matter. What
                                            matters is the people who are sparked by it. And the people who
                                            are like offended by it, it doesn’t matter. Because it's about
                                            motivating the doers. Because I’m here to follow my dreams and
                                            inspire other people to follow their dreams, too.
                                            <br>
                                            We’re not always in the position that we want to be at. We’re
                                            constantly growing. We’re constantly making mistakes. We’re
                                            constantly trying to express ourselves and actualize our dreams.
                                            If you have the opportunity to play this game of life you need
                                            to appreciate every moment. A lot of people don’t appreciate the
                                            moment until it’s passed.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    @stop
