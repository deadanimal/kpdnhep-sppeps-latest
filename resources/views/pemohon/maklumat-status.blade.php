@extends('layouts.baseUser')

@section('content')

    <style>
        /*********** Steps Start***************/
        .horizontal-tabs-steps {
            position: relative;
        }

        .horizontal-tabs-steps .nav-item {
            z-index: 1;
            position: relative;
        }

        .horizontal-tabs-steps .nav-item:after {
            content: "";
            border-top: 5px dotted #4da3ff;
            position: absolute;
            z-index: 0;
            top: 35px;
            width: 160px;
            left: 0px;
            transition: border 1s ease-out;
            transition-delay: 0s, 0s, 0.1s;
        }

        .horizontal-tabs-steps .nav-item:last-child:after {
            content: "";
            border-top: 0px dotted #4da3ff;
        }

        .horizontal-tabs-steps .nav-item:first-child::before {
            content: "";
            border-top: 0px dotted #4da3ff;
        }

        .horizontal-tabs-steps .nav-item.complete-step:after {
            content: "";
            border-top: 5px dotted #4d7ed2;
            position: absolute;
            z-index: 0;
            top: 12px;
            width: 265px;
            left: 0px;
            transition: border 1s ease-out;
            transition-delay: 0s, 0s, 0.1s
        }

        .horizontal-tabs-steps .nav-link {
            background: #fff;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            color: #3c4858;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 12px;
            border: 2px solid #4d7ed2;
            z-index: 1;
            position: relative;
        }

        /* .horizontal-tabs-steps .nav-link:hover {
                                                                                    background: #22437c;
                                                                                    border: 2px solid #22437c;
                                                                                    color: #fff !important;
                                                                                    transition: 0.3s all;
                                                                                } */

        .horizontal-tabs-steps .horizontal-tabs-steps .nav-link span {
            color: #fff !important;
        }

        .horizontal-tabs-steps .nav-item h6 {
            font-size: 12px;
        }

        .horizontal-tabs-steps .nav-item.show .nav-link,
        .horizontal-tabs-steps .nav-link.active {
            color: #fff;
            background-color: #22437c;
            border-color: #22437c;
            width: 60px;
            height: 60px;
            border-radius: 50%;
        }

        .horizontal-tabs-steps .nav-link.active span {
            color: #fff;
            font-weight: 500 !important;
        }

        .horizontal-tabs-steps .checked-steps span {
            display: none;
        }

        .horizontal-tabs-steps .checked-steps {
            background-color: #22437c !important;
            border: 1px solid #22437c !important;
            color: #fff !important;
        }

        .horizontal-tabs-steps .checked-steps:after {
            content: "\f00c";
            font-family: FontAwesome;
            color: #fff;
        }

        /*********** Steps End***************/

    </style>

    <div class="container-fluid d-flex justify-content-center flex-wrap">
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="mt-5"><strong>Maklumat Status Permohonan</strong></h3>
                <!-- <h5 class="text-secondary font-weight-normal">This information will let us know more about you.</h5> -->

            </div>
        </div>
        <div class="row mt-4" style="width: 80%;">
            <div class="card card-frame">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h4>Status Permohonan</h4>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <a href="/permohonan" class="btn btn-sm btn-info">Kembali</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        @foreach ($permohonan as $permohonan)

                            @if ($permohonan->jenis_permohonan == 'Baharu' || $permohonan->jenis_permohonan == 'Pembaharuan')
                                @if ($permohonan->status_permohonan == 'hantar')

                                    <!---------------Platform Tour----------------->
                                    <div class="platform-tour-wrapper py-3 ">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs justify-content-between border-0 horizontal-tabs-steps">
                                            <li class="nav-item">
                                                <a class="nav-link active m-2" data-toggle="tab"><span>1</span>
                                                </a>
                                                <h6 class="text-center mt-1">Penerimaan <br> Permohonan</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>2</span></a>
                                                <h6 class="text-center mt-1">Pengesahan <br> Permohonan</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>3</span></a>
                                                <h6 class="text-center mt-1">Tapisan <br> PDRM </h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>4</span></a>
                                                <h6 class="text-center mt-1">Syor</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>5</span></a>
                                                <h6 class="text-center mt-1">Kelulusan</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>6</span></a>
                                                <h6 class="text-center mt-1">Bayaran</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>7</span></a>
                                                <h6 class="text-center mt-1">Kutipan <br> Permit</h6>
                                            </li>
                                        </ul>
                                    </div>

                                @elseif ($permohonan->status_permohonan == 'Permohonan Lengkap')

                                    <div class="platform-tour-wrapper py-3 ">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs justify-content-between border-0 horizontal-tabs-steps">
                                            <li class="nav-item">
                                                <a class="nav-link active m-2" data-toggle="tab"><span>1</span>
                                                </a>
                                                <h6 class="text-center mt-1">Penerimaan <br> Permohonan</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link active m-2" data-toggle="tab"><span>2</span></a>
                                                <h6 class="text-center mt-1">Pengesahan <br> Permohonan</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>3</span></a>
                                                <h6 class="text-center mt-1">Tapisan <br> PDRM </h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>4</span></a>
                                                <h6 class="text-center mt-1">Syor</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>5</span></a>
                                                <h6 class="text-center mt-1">Kelulusan</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>6</span></a>
                                                <h6 class="text-center mt-1">Bayaran</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>7</span></a>
                                                <h6 class="text-center mt-1">Kutipan <br> Permit</h6>
                                            </li>
                                        </ul>
                                    </div>

                                @elseif ($permohonan->status_permohonan == 'disemak pdrm')

                                    <div class="platform-tour-wrapper py-3 ">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs justify-content-between border-0 horizontal-tabs-steps">
                                            <li class="nav-item">
                                                <a class="nav-link active m-2" data-toggle="tab"><span>1</span>
                                                </a>
                                                <h6 class="text-center mt-1">Penerimaan <br> Permohonan</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link active m-2" data-toggle="tab"><span>2</span></a>
                                                <h6 class="text-center mt-1">Pengesahan <br> Permohonan</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link active m-2" data-toggle="tab"><span>3</span></a>
                                                <h6 class="text-center mt-1">Tapisan <br> PDRM </h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>4</span></a>
                                                <h6 class="text-center mt-1">Syor</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>5</span></a>
                                                <h6 class="text-center mt-1">Kelulusan</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>6</span></a>
                                                <h6 class="text-center mt-1">Bayaran</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>7</span></a>
                                                <h6 class="text-center mt-1">Kutipan <br> Permit</h6>
                                            </li>
                                        </ul>
                                    </div>

                                @elseif ($permohonan->status_permohonan == 'disokong_hq' ||
                                    $permohonan->status_permohonan
                                    == 'disokong_negeri')

                                    <div class="platform-tour-wrapper py-3 ">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs justify-content-between border-0 horizontal-tabs-steps">
                                            <li class="nav-item">
                                                <a class="nav-link active m-2" data-toggle="tab"><span>1</span>
                                                </a>
                                                <h6 class="text-center mt-1">Penerimaan <br> Permohonan</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link active m-2" data-toggle="tab"><span>2</span></a>
                                                <h6 class="text-center mt-1">Pengesahan <br> Permohonan</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link active m-2" data-toggle="tab"><span>3</span></a>
                                                <h6 class="text-center mt-1">Tapisan <br> PDRM </h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link active m-2" data-toggle="tab"><span>4</span></a>
                                                <h6 class="text-center mt-1">Syor</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>5</span></a>
                                                <h6 class="text-center mt-1">Kelulusan</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>6</span></a>
                                                <h6 class="text-center mt-1">Bayaran</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>7</span></a>
                                                <h6 class="text-center mt-1">Kutipan <br> Permit</h6>
                                            </li>
                                        </ul>
                                    </div>



                                @elseif ($permohonan->status_permohonan == 'Diluluskan')

                                    <div class="platform-tour-wrapper py-3 ">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs justify-content-between border-0 horizontal-tabs-steps">
                                            <li class="nav-item">
                                                <a class="nav-link active m-2" data-toggle="tab"><span>1</span>
                                                </a>
                                                <h6 class="text-center mt-1">Penerimaan <br> Permohonan</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link active m-2" data-toggle="tab"><span>2</span></a>
                                                <h6 class="text-center mt-1">Pengesahan <br> Permohonan</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link active m-2" data-toggle="tab"><span>3</span></a>
                                                <h6 class="text-center mt-1">Tapisan <br> PDRM </h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link active m-2" data-toggle="tab"><span>4</span></a>
                                                <h6 class="text-center mt-1">Syor</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link active m-2" data-toggle="tab"><span>5</span></a>
                                                <h6 class="text-center mt-1">Kelulusan</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>6</span></a>
                                                <h6 class="text-center mt-1">Bayaran</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>7</span></a>
                                                <h6 class="text-center mt-1">Kutipan <br> Permit</h6>
                                            </li>
                                        </ul>
                                    </div>

                                @endif

                            @elseif ($permohonan->jenis_permohonan == 'Pendua')

                                @if ($permohonan->status_permohonan == 'hantar')
                                    <div class="platform-tour-wrapper py-3 ">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs justify-content-between border-0 horizontal-tabs-steps">
                                            <li class="nav-item">
                                                <a class="nav-link active m-2" data-toggle="tab"><span>1</span>
                                                </a>
                                                <h6 class="text-center mt-1">Penerimaan <br> Permohonan</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>2</span></a>
                                                <h6 class="text-center mt-1">Syor</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>3</span></a>
                                                <h6 class="text-center mt-1">Kelulusan</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>4</span></a>
                                                <h6 class="text-center mt-1">Bayaran</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>5</span></a>
                                                <h6 class="text-center mt-1">Kutipan <br> Permit</h6>
                                            </li>
                                        </ul>
                                    </div>Î

                                @elseif ($permohonan->status_permohonan == 'disokong_negeri')
                                    <div class="platform-tour-wrapper py-3 ">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs justify-content-between border-0 horizontal-tabs-steps">
                                            <li class="nav-item">
                                                <a class="nav-link active m-2" data-toggle="tab"><span>1</span>
                                                </a>
                                                <h6 class="text-center mt-1">Penerimaan <br> Permohonan</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link active m-2" data-toggle="tab"><span>2</span></a>
                                                <h6 class="text-center mt-1">Syor</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>3</span></a>
                                                <h6 class="text-center mt-1">Kelulusan</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>4</span></a>
                                                <h6 class="text-center mt-1">Bayaran</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>5</span></a>
                                                <h6 class="text-center mt-1">Kutipan <br> Permit</h6>
                                            </li>
                                        </ul>
                                    </div>Î

                                @elseif ($permohonan->status_permohonan == 'Diluluskan')

                                    <div class="platform-tour-wrapper py-3 ">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs justify-content-between border-0 horizontal-tabs-steps">
                                            <li class="nav-item">
                                                <a class="nav-link active m-2" data-toggle="tab"><span>1</span>
                                                </a>
                                                <h6 class="text-center mt-1">Penerimaan <br> Permohonan</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link active m-2" data-toggle="tab"><span>2</span></a>
                                                <h6 class="text-center mt-1">Syor</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link active m-2" data-toggle="tab"><span>3</span></a>
                                                <h6 class="text-center mt-1">Kelulusan</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>4</span></a>
                                                <h6 class="text-center mt-1">Bayaran</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>5</span></a>
                                                <h6 class="text-center mt-1">Kutipan <br> Permit</h6>
                                            </li>
                                        </ul>
                                    </div>Î

                                @endif



                            @elseif ($permohonan->jenis_permohonan == 'Rayuan')

                                @if ($permohonan->status_permohonan == 'hantar')
                                    <div class="platform-tour-wrapper py-3 ">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs justify-content-between border-0 horizontal-tabs-steps">
                                            <li class="nav-item">
                                                <a class="nav-link active m-2" data-toggle="tab"><span>1</span>
                                                </a>
                                                <h6 class="text-center mt-1">Penerimaan <br> Permohonan</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>2</span></a>
                                                <h6 class="text-center mt-1">Pengesahan <br> Permohonan</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>3</span></a>
                                                <h6 class="text-center mt-1">Bayaran</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>3</span></a>
                                                <h6 class="text-center mt-1">Kutipan <br> Permit</h6>
                                            </li>
                                        </ul>
                                    </div>

                                @elseif ($permohonan->status_permohonan == 'hantar_ke_hq')
                                    <div class="platform-tour-wrapper py-3 ">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs justify-content-between border-0 horizontal-tabs-steps">
                                            <li class="nav-item">
                                                <a class="nav-link active m-2" data-toggle="tab"><span>1</span>
                                                </a>
                                                <h6 class="text-center mt-1">Penerimaan <br> Permohonan</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link active m-2" data-toggle="tab"><span>2</span></a>
                                                <h6 class="text-center mt-1">Pengesahan <br> Permohonan</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>3</span></a>
                                                <h6 class="text-center mt-1">Bayaran</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>3</span></a>
                                                <h6 class="text-center mt-1">Kutipan <br> Permit</h6>
                                            </li>
                                        </ul>
                                    </div>

                                @elseif ($permohonan->status_permohonan == 'Diluluskan')

                                    <div class="platform-tour-wrapper py-3 ">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs justify-content-between border-0 horizontal-tabs-steps">
                                            <li class="nav-item">
                                                <a class="nav-link active m-2" data-toggle="tab"><span>1</span>
                                                </a>
                                                <h6 class="text-center mt-1">Penerimaan <br> Permohonan</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link active m-2" data-toggle="tab"><span>2</span></a>
                                                <h6 class="text-center mt-1">Pengesahan <br> Permohonan</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>3</span></a>
                                                <h6 class="text-center mt-1">Bayaran</h6>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link m-2" data-toggle="tab"><span>3</span></a>
                                                <h6 class="text-center mt-1">Kutipan <br> Permit</h6>
                                            </li>
                                        </ul>
                                    </div>

                                @endif






                            @endif




                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>


@stop
