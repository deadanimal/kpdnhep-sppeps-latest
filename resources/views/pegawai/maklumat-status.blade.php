@extends('layouts.base-penyokong')

@section('content')

<style>
    /* OTHERS */

    *:focus {
        outline: none;
    }

    #icon {
        width: 20%;
    }

    .timeline {
        list-style: none;
        padding: 20px 0 20px;
        position: relative;
    }

    .timeline:before {
        top: 0;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 3px;
        background-color: #eeeeee;
        left: 25px;
        margin-right: -1.5px;
    }

    .timeline>li {
        margin-bottom: 20px;
        position: relative;
    }

    .timeline>li:before,
    .timeline>li:after {
        content: " ";
        display: table;
    }

    .timeline>li:after {
        clear: both;
    }

    .timeline>li:before,
    .timeline>li:after {
        content: " ";
        display: table;
    }

    .timeline>li:after {
        clear: both;
    }

    .timeline>li>.timeline-panel {
        width: calc(100% - 75px);
        float: right;
        border: 1px solid #d4d4d4;
        border-radius: 2px;
        padding: 20px;
        position: relative;
        -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
        box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
    }

    .timeline>li>.timeline-panel:before {
        position: absolute;
        top: 26px;
        left: -15px;
        display: inline-block;
        border-top: 15px solid transparent;
        border-right: 15px solid #ccc;
        border-left: 0 solid #ccc;
        border-bottom: 15px solid transparent;
        content: " ";
    }

    .timeline>li>.timeline-panel:after {
        position: absolute;
        top: 27px;
        left: -14px;
        display: inline-block;
        border-top: 14px solid transparent;
        border-right: 14px solid #fff;
        border-left: 0 solid #fff;
        border-bottom: 14px solid transparent;
        content: " ";
    }

    .timeline>li>.timeline-badge {
        color: #fff;
        width: 50px;
        height: 50px;
        line-height: 50px;
        font-size: 1.4em;
        text-align: center;
        position: absolute;
        top: 16px;
        left: 0px;
        margin-right: -25px;
        background-color: #999999;
        z-index: 100;
        border-top-right-radius: 50%;
        border-top-left-radius: 50%;
        border-bottom-right-radius: 50%;
        border-bottom-left-radius: 50%;
    }

    .timeline>li.timeline-inverted>.timeline-panel {
        float: left;
    }

    .timeline>li.timeline-inverted>.timeline-panel:before {
        border-right-width: 0;
        border-left-width: 15px;
        right: -15px;
        left: auto;
    }

    .timeline>li.timeline-inverted>.timeline-panel:after {
        border-right-width: 0;
        border-left-width: 14px;
        right: -14px;
        left: auto;
    }

    .timeline-badge.primary {
        background-color: #95effb !important;
    }

    .timeline-badge.success {
        background-color: #9df0d1 !important;
    }

    .timeline-badge.warning {
        background-color: #f0ad4e !important;
    }

    .timeline-badge.danger {
        background-color: #ffcfda !important;
    }

    .timeline-badge.info {
        background-color: #5bc0de !important;
    }

    .timeline-title {
        margin-top: 0;
        color: inherit;
    }

    .timeline-body>p,
    .timeline-body>ul {
        margin-bottom: 0;
    }

    .timeline-body>p+p {
        margin-top: 5px;
    }

    .timeline-body {
        display: none;
    }
</style>

<div class="container-fluid py-4">

    <div class="p-3">

        <div>
            <h5>Semakan Status Permohonan</h5>
        </div>


        <div class="container-fluid mt-4" style="padding: 0px !important;">
            <div class="card">

                <div class="card-header" style="background-color: #f7e8ff;">
                    <div class="row">
                        <div class="col">
                            <h6> Maklumat Status</h6>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <a href="#" class="btn btn-sm bg-gradient-info">
                                kembali
                            </a>

                        </div>

                    </div>

                </div>

                <div class="card-body p-3">
                    <div class="row p-3 mb-0">
                        <p>Nama Pemohon : Yuzrita binti Md. Yusoff</p>
                        <p>No. Kad Pengenalan : 950215018562</p>
                        <p>Jenis Permohonan : Permohonan Baharu/Permohonan Pembaharuan</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mt-4" style="padding: 0px !important;">
            <div class="card">

                <div class="card-header" style="background-color: #f7e8ff;">
                    <h6> Status Permohonan</h6>
                </div>

                <div class="card-body p-3">

                    <div class="container mb-5 ml-0">
                        <div class="row">
                            <div class="col-md offset-md-3" style="margin-left: 5% !important; max-width: none; flex:none">
                                <!-- <h4>Latest News</h4> -->
                                <ul class="timeline">
                                    <li class="disable" style="width: 90%;">
                                        <div class="timeline-badge primary">
                                            <i class="far fa-address-card text-dark"></i>
                                        </div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <span class="text-muted">9 Mac 2021, 10.08 AM</span>
                                                <h4 class="h5 timeline-title"><strong>Kutipan Permit</strong></h4>
                                                <p>
                                                    Permit telah tersedia untuk dikutip. Nullam id dolor id nibh ultricies vehicula
                                                    ut id elit. Cum sociis natoque penatibus et magnis dis parturient montes,
                                                    nascetur ridiculus mus. Cum sociis natoque penatibus et magnis dis parturient
                                                    montes, nascetur ridiculus mus.
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li style="width: 90%;">
                                        <div class="timeline-badge success">
                                            <i class="fas fa-dollar-sign text-dark"></i>
                                        </div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <span class="text-muted">9 Mac 2021, 10.08 AM</span>
                                                <h4 class="h5 timeline-title"><strong>Bayaran</strong></h4>
                                                <p>
                                                    Bayaran RM20 perlu dibuat di kaunter cawangan KPDNHEP. Nullam id dolor id nibh
                                                    ultricies vehicula ut id elit. Cum sociis natoque penatibus et magnis dis
                                                    parturient montes, nascetur ridiculus mus. Cum sociis natoque penatibus et
                                                    magnis dis parturient montes, nascetur ridiculus mus.
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li style="width: 90%;">
                                        <div class="timeline-badge danger">
                                            <i class="fas fa-check-circle text-dark"></i>
                                        </div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <span class="text-muted">9 Mac 2021, 10.08 AM</span>
                                                <h4 class="h5 timeline-title"><strong>Kelulusan</strong></h4>
                                                <p>
                                                    Permohonan telah diluluskan. Nullam id dolor id nibh ultricies vehicula ut id
                                                    elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
                                                    ridiculus mus. Cum sociis natoque penatibus et magnis dis parturient montes,
                                                    nascetur ridiculus mus.
                                                </p>
                                            </div>
                                        </div>
                                    </li>

                                    <li style="width: 90%;">
                                        <div class="timeline-badge success">
                                            <i class="fas fa-thumbs-up text-dark"></i>
                                        </div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <span class="text-muted">9 Mac 2021, 10.08 AM</span>
                                                <h4 class="h5 timeline-title"><strong>Syor</strong></h4>
                                                <p>
                                                    Permohonan sedang dalam proses untuk disokong. Nullam id dolor id nibh ultricies
                                                    vehicula ut id elit. Cum sociis natoque penatibus
                                                    et magnis dis parturient montes, nascetur ridiculus mus. Cum sociis natoque
                                                    penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li style="width: 90%;">
                                        <div class="timeline-badge primary"><i class="fas fa-gavel text-dark"></i>
                                        </div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <span class="text-muted">9 Mac 2021, 10.08 AM</span>
                                                <h4 class="h5 timeline-title"><strong>Tapisan PDRM</strong></h4>
                                                <p>
                                                    Pemohon mempunyai 3 rekod jenayah. Nullam id dolor id nibh ultricies vehicula ut
                                                    id elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
                                                    ridiculus mus. Cum sociis natoque penatibus et magnis dis parturient montes,
                                                    nascetur ridiculus mus.
                                                </p>
                                            </div>
                                        </div>
                                    </li>

                                    <li style="width: 90%;">
                                        <div class="timeline-badge danger">
                                            <i class="far fa-check-square text-dark"></i>
                                        </div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <span class="text-muted">9 Mac 2021, 10.08 AM</span>
                                                <h4 class="h5 timeline-title"><strong>Pengesahan Dokumen</strong></h4>
                                                <p>
                                                    Permohonan lengkap dan telah disemak oleh pegawai pemproses Negeri dan pegawai
                                                    pemproses HQ. Nullam id dolor id nibh ultricies vehicula ut id elit. Cum sociis
                                                    natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cum
                                                    sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus
                                                    mus.
                                                </p>
                                            </div>
                                        </div>
                                    </li>

                                    <li style="width: 90%;">
                                        <div class="timeline-badge success"><i class="fas fa-file-alt text-dark"></i></div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <span class="text-muted">9 Mac 2021, 10.08 AM</span>
                                                <h4 class="h5 timeline-title"><strong>Permohonan</strong></h4>

                                                <p>Permohonan telah dihantar pada hari Selasa, 16/03/2021. Nullam id dolor id nibh
                                                    ultricies vehicula ut id elit. Cum sociis natoque penatibus et magnis dis
                                                    parturient montes, nascetur ridiculus mus. Cum sociis natoque penatibus et
                                                    magnis dis parturient montes, nascetur ridiculus mus.å</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@stop