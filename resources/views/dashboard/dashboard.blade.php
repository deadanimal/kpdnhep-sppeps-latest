@extends('layouts.baseUser')

@section('content')

    <div class="container-fluid py-4"
        style="background-image: url('/assets/img/background/kpdnhep-building.jpg'); background-attachment: fixed; background-size:cover; background-repeat: no-repeat;">
        <!-- <button type="button" class="btn btn-block btn-default mb-3" data-bs-toggle="modal" data-bs-target="#modal-form">Borang Profile</button>
                                                                                                                                                        <a href="/kemaskini-profil">Kemaskini Profil</a> -->

        <div class="container-fluid d-flex justify-content-center" style="height:700px">
            <div id="portalcontent">
                <div class="row p-3" style="height:100%; margin-top: 100px;">

                    @if ($user->status_permohonan == null)
                        <div class="col p-3 d-flex align-items-start">
                            <a class="nav-link text-white" href="/permohonan_baharu">
                                <div class="card d-flex justify-content-center align-items-center" id="rcorners1">
                                    <div class="card-body d-flex align-items-center">
                                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90"
                                                    fill="currentColor" class="bi bi-file-earmark-plus-fill"
                                                    viewBox="0 0 16 16" style="color: #272b4a;">
                                                    <path
                                                        d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0z" />
                                                </svg> --}}
                                        <i class="fas fa-file-medical fa-5x text-dark"></i>
                                    </div>
                                    <div class="card-footer col d-flex align-items-end justify-content-center">
                                        <p class="text-dark text-center" style="font-weight: 500;"><strong>
                                                @if (Session::get('locale') == 'ms')
                                                    NEW <br> APPLICATION
                                                @else
                                                    PERMOHONAN <br> BAHARU
                                                @endif

                                            </strong></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @else
                        <div class="col p-3 d-flex align-items-start">
                            <a class="nav-link text-white">
                                <div class="card d-flex justify-content-center align-items-center" id="rcorners1">
                                    <div class="card-body d-flex align-items-center">
                                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90"
                                                fill="currentColor" class="bi bi-file-earmark-plus-fill"
                                                viewBox="0 0 16 16" style="color: #272b4a;">
                                                <path
                                                    d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0z" />
                                            </svg> --}}
                                        <i class="fas fa-file-medical fa-5x text-dark"></i>
                                    </div>
                                    <div class="card-footer col d-flex align-items-end justify-content-center">
                                        <p class="text-dark text-center" style="font-weight: 500;"><strong>
                                                @if (Session::get('locale') == 'ms')
                                                    NEW <br> APPLICATION
                                                @else
                                                    PERMOHONAN <br> BAHARU
                                                @endif

                                            </strong></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif

                    @if ($user->status_permohonan == 'diluluskan')
                        <div class="col p-3 d-flex align-items-start">
                            <a class="nav-link text-white" href="/permohonan_pembaharuan">
                                <div class="card d-flex justify-content-center align-items-center" id="rcorners1">
                                    <div class="card-body d-flex align-items-center">
                                        <i class="fas fa-sync-alt fa-5x" style="color: #272b4a;"></i>
                                    </div>
                                    <div class="card-footer col d-flex align-items-end">
                                        <p class="text-dark text-center">
                                            <strong>
                                                @if (Session::get('locale') == 'ms')
                                                    RENEWAL <br> APPLICATION
                                                @else
                                                    PERMOHONAN <br> PEMBAHARUAN
                                                @endif
                                            </strong>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>

                    @else
                        <div class="col p-3 d-flex align-items-start">
                            <a class="nav-link text-white">
                                <div class="card d-flex justify-content-center align-items-center" id="rcorners1">
                                    <div class="card-body d-flex align-items-center">
                                        <i class="fas fa-sync-alt fa-5x" style="color: #272b4a;"></i>
                                    </div>
                                    <div class="card-footer col d-flex align-items-end">
                                        <p class="text-dark text-center">
                                            <strong>
                                                @if (Session::get('locale') == 'ms')
                                                    RENEWAL <br> APPLICATION
                                                @else
                                                    PERMOHONAN <br> PEMBAHARUAN
                                                @endif
                                            </strong>
                                        </p>
                                    </div>
                                </div>

                            </a>
                        </div>
                    @endif



                    @if ($user->status_permohonan == 'diluluskan')
                        <div class="col p-3 d-flex align-items-start">
                            <a class="nav-link text-white" href="/permohonan_pendua">
                                <div class="card d-flex justify-content-center align-items-center" id="rcorners1">
                                    <div class="card-body d-flex align-items-center">
                                        <i class="far fa-copy fa-5x" style="color: #272b4a;"></i>
                                    </div>
                                    <div class="card-footer col d-flex align-items-end">
                                        <p class="text-dark text-center">
                                            <strong>
                                                @if (Session::get('locale') == 'en')
                                                    DUPLICATE <br> APPLICATION
                                                @else
                                                    PERMOHONAN <br> PENDUA
                                                @endif

                                            </strong>
                                        </p>
                                    </div>
                                </div>

                            </a>
                        </div>
                    @else
                        <div class="col p-3 d-flex align-items-start">
                            <a class="nav-link text-white">
                                <div class="card d-flex justify-content-center align-items-center" id="rcorners1">
                                    <div class="card-body d-flex align-items-center">
                                        <i class="far fa-copy fa-5x" style="color: #272b4a;"></i>
                                    </div>
                                    <div class="card-footer col d-flex align-items-end">
                                        <p class="text-dark text-center">
                                            <strong>
                                                @if (Session::get('locale') == 'en')
                                                    DUPLICATE <br> APPLICATION
                                                @else
                                                    PERMOHONAN <br> PENDUA
                                                @endif

                                            </strong>
                                        </p>
                                    </div>
                                </div>

                            </a>
                        </div>
                    @endif


                    @if ($user->status_permohonan == 'tidak_diluluskan')
                        <div class="col p-3 d-flex align-items-start">
                            <a class="nav-link text-white" href="/permohonan_rayuan">
                                <div class="card d-flex justify-content-center align-items-center" id="rcorners1">
                                    <div class="card-body d-flex align-items-center">
                                        <i class="fas fa-pencil-alt fa-5x" style="color: #272b4a;"></i>
                                    </div>
                                    <div class="card-footer col d-flex align-items-end">
                                        <p class="text-dark text-center">
                                            <strong>
                                                @if (Session::get('locale') == 'ms')
                                                    APPEAL <br> APPLICATION
                                                @else

                                                    PERMOHONAN <br> RAYUAN
                                                @endif

                                            </strong>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @else
                        <div class="col p-3 d-flex align-items-start">
                            <a class="nav-link text-white">
                                <div class="card d-flex justify-content-center align-items-center" id="rcorners1">
                                    <div class="card-body d-flex align-items-center">
                                        <i class="fas fa-pencil-alt fa-5x" style="color: #272b4a;"></i>
                                    </div>
                                    <div class="card-footer col d-flex align-items-end">
                                        <p class="text-dark text-center">
                                            <strong>
                                                @if (Session::get('locale') == 'ms')
                                                    APPEAL <br> APPLICATION
                                                @else

                                                    PERMOHONAN <br> RAYUAN
                                                @endif

                                            </strong>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif

                    {{-- <div class="col p-3 d-flex justify-content-center"> --}}

                    <div class="col p-3 d-flex align-items-start">
                        <a class="nav-link text-white" href="/permohonan">
                            <div class="card d-flex justify-content-center align-items-center" id="rcorners1">
                                <div class="card-body d-flex align-items-center">
                                    <i class="fas fa-search fa-4x" style="color: #272b4a;"></i>
                                </div>
                                <div class="card-footer col d-flex align-items-end">
                                    <p class="text-dark text-center">
                                        <strong>
                                            @if (Session::get('locale') == 'ms')
                                                APPLICATION<br> STATUS
                                            @else
                                                STATUS <br> PERMOHONAN
                                            @endif

                                        </strong>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
@stop
