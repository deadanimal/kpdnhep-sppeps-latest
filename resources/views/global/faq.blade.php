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
                            @foreach ($katefaqls as $katefaql)
                                <div class="accordion" id="accordionKategoriLand">
                                    <div class="accordion-item mb-3">
                                        <h5 class="accordion-header" id="{{ $katefaql->id }}">
                                            <button class="accordion-button border-bottom font-weight-bold collapsed"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne-{{ $katefaql->id }}" aria-expanded="false"
                                                aria-controls="collapseOne-{{ $katefaql->id }}">
                                                {{ $katefaql->nama_kategori_bm }}
                                                <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3"
                                                    aria-hidden="true"></i>
                                                <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3"
                                                    aria-hidden="true"></i>
                                            </button>
                                        </h5>
                                        <div id="collapseOne-{{ $katefaql->id }}" data-bs-parent="#accordionKategoriLand"
                                            style="">
                                            <div class="accordion-body text-sm opacity-8">
                                                @foreach ($faqls as $faql)
                                                    <div class="accordion" id="accordionFaqLand">
                                                        <div class="accordion-item mb-3">
                                                            <h5 class="accordion-header" id="{{ $faql->id }}">
                                                                <button
                                                                    class="accordion-button border-bottom font-weight-bold collapsed"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseTwo-{{ $faql->id }}"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapseTwo-{{ $faql->id }}">
                                                                    {{ $faql->tajuk_bm }}
                                                                    <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3"
                                                                        aria-hidden="true"></i>
                                                                    <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3"
                                                                        aria-hidden="true"></i>
                                                                </button>
                                                            </h5>
                                                            <div id="collapseTwo-{{ $faql->id }}"
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
        </div>

    </div>
@stop
