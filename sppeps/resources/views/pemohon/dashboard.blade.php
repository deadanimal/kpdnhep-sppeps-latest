@extends('layouts.baseUser')

@section('content')

<div class="container-fluid py-4" style="background-image: url('/assets/img/background/kpdnhep-building.jpg'); background-attachment: fixed; background-size:cover; background-repeat: no-repeat;">

    <div class="container-fluid d-flex justify-content-center" style="height:700px">
        <div id="portalcontent">
            <div class="row p-3" style="height:100%; margin-top: 100px;">

                <div class="col p-3 d-flex align-items-start" [style]="!flag_1 ? 'cursor: not-allowed' : '' ">
                    <a class="nav-link text-white" href="/permohonan-baru">
                        <div class="card d-flex justify-content-center align-items-center" id="rcorners1">
                            <div class="card-body d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" fill="currentColor" class="bi bi-file-earmark-plus-fill" viewBox="0 0 16 16" style="color: #272b4a;">
                                    <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0z" />
                                </svg>
                            </div>
                            <div class="card-footer col d-flex align-items-end justify-content-center">
                                <p class="text-dark text-center" style="font-weight: 500;"><strong> PERMOHONAN BAHARU </strong></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col p-3 d-flex justify-content-center" [style]="!flag_3 ? 'cursor: not-allowed' : '' ">
                    <a class="nav-link text-white" href="/permohonan-pembaharuan">

                        <div class="card d-flex justify-content-center align-items-center" id="rcorners1">
                            <div class="card-body d-flex align-items-center">
                                <i class="fas fa-sync-alt fa-5x" style="color: #272b4a;"></i>
                            </div>
                            <div class="card-footer col d-flex align-items-end">
                                <p class="text-dark text-center"><strong>PERMOHONAN PEMBAHARUAN</strong></p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col p-3 d-flex justify-content-center" [style]="!flag_2 ? 'cursor: not-allowed' : '' ">
                    <a class="nav-link text-white" href="/permohonan-pendua">


                        <div class="card d-flex justify-content-center align-items-center" id="rcorners1">
                            <div class="card-body d-flex align-items-center">
                                <i class="far fa-copy fa-5x" style="color: #272b4a;"></i>
                            </div>
                            <div class="card-footer col d-flex align-items-end">
                                <p class="text-dark text-center"><strong> PERMOHONAN PENDUA</strong></p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col p-3 d-flex justify-content-center" [style]="!flag_4 ? 'cursor: not-allowed' : '' ">
                    <a class="nav-link text-white" href="/permohonan-rayuan">
                        <div class="card d-flex justify-content-center align-items-center" id="rcorners1">
                            <div class="card-body d-flex align-items-center">
                                <i class="fas fa-pencil-alt fa-5x" style="color: #272b4a;"></i>
                            </div>
                            <div class="card-footer col d-flex align-items-end">
                                <p class="text-dark text-center"><strong> PERMOHONAN RAYUAN</strong></p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col p-3 d-flex justify-content-center">
                    <a class="nav-link text-white" href="/status-permohonan">
                        <div class="card d-flex justify-content-center align-items-center" id="rcorners1">
                            <div class="card-body d-flex align-items-center">
                                <i class="fas fa-search fa-5x" style="color: #272b4a;"></i>
                            </div>
                            <div class="card-footer col d-flex align-items-end">
                                <p class="text-dark text-center"><strong> SEMAKAN STATUS PERMOHONAN</strong></p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>


</div>
@stop