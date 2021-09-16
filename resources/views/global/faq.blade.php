@extends('layouts.baseUser')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="p-2 text-capitalize">
                <h5 class="h3 text-dark pt-4 text-center"><strong>{{ __('landing.soalan_lazim') }} (FAQ)</strong></h5>
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
                                                @if (Session::get('locale') == 'en')
                                                    {{ $katefaql->nama_kategori_en }}
                                                @else
                                                    {{ $katefaql->nama_kategori_bm }}
                                                @endif
                                                <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3"
                                                    aria-hidden="true"></i>
                                                <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3"
                                                    aria-hidden="true"></i>
                                            </button>
                                        </h5>
                                        <div id="collapseOne-{{ $index }}"
                                            data-bs-parent="#accordionKategori-{{ $katefaql->id }}" style="" class="collapse hide">
                                            <div class="accordion-body text-sm opacity-8">
                                                @foreach ($faqls as $index => $faql)
                                                    @if ($faql->kategori_id == $katefaql->id)
                                                        <div class="accordion" id="accordionFaqLand">
                                                            <div class="accordion-item mb-3">
                                                                <h5 class="accordion-header" id="{{ $faql->id }}">
                                                                    <button
                                                                        class="accordion-button border-bottom font-weight-bold collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseTwo-{{ $index }}"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapseTwo-{{ $index }}">
                                                                        @if (Session::get('locale') == 'en')
                                                                            {{ $faql->tajuk_en }}
                                                                        @else
                                                                            {{ $faql->tajuk_bm }}
                                                                        @endif
                                                                        <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3"
                                                                            aria-hidden="true"></i>
                                                                        <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3"
                                                                            aria-hidden="true"></i>
                                                                    </button>
                                                                </h5>
                                                                <div id="collapseTwo-{{ $index }}"
                                                                    data-bs-parent="#accordionFaqLand" style="" class="collapse hide">
                                                                    <div class="accordion-body text-sm opacity-8">
                                                                        @if (Session::get('locale') == 'en')
                                                                            {{ $faql->kandungan_en }}
                                                                        @else
                                                                            {{ $faql->kandungan_bm }}
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
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
