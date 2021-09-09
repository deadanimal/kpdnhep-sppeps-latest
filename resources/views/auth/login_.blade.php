@extends('layouts.baseUser')

@section('content')


    <div id="container" class="container-fluid d-flex justify-content-center" style="height: 100vh;">
        <div class="card card-frame" style="width: 40%;">
            <div class="card-body">

                <!-- <div class="col-lg-3"> -->
                <div class="nav-wrapper position-relative end-0">
                    <ul class="nav nav-pills nav-fill flex-row p-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#preview-tabs-simple"
                                role="tab" aria-selected="true">
                                {{ __('landing.pemohon') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#code-tabs-simple" role="tab"
                                aria-selected="false">
                                {{ __('landing.pegawai_admin') }}
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- </div> -->

                <div class="tab-content tab-space">
                    <div class="tab-pane active text-center" id="preview-tabs-simple">

                        <form method="POST" action="/login">
                            @csrf
                            <div class="container mt-4">
                                <div class="form-group row">
                                    <i class="fas fa-user-circle fa-8x text-dark"></i>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="ic">{{ __('landing.no_kp') }}</label>
                                    <div class="input-group mb-4">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        <input class="form-control" placeholder="e.g XXXXXXXXXXXX" type="text"
                                            name="no_kp">
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="password">{{ __('landing.kata_laluan') }}</label>
                                    <div class="input-group mb-4">

                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        <input class="form-control" placeholder="Masukkan kata laluan" type="password"
                                            name="password">
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <div class="input-group mb-4 d-flex justify-content-end">
                                        <a href="/lupa-kata-laluan">
                                            <small>
                                                {{ __('landing.lupa_kata_laluan') }}
                                            </small>
                                        </a>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <div class="input-group mb-4">
                                        <input type="submit" class="btn bg-gradient-info btn-lg w-100 text-capitalize"
                                            value="{{ __('landing.log_masuk') }}">
                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>
                    <div class="tab-pane text-center" id="code-tabs-simple">

                        <form method="POST" action="/login">
                            @csrf
                            <div class="container mt-4">
                                <div class="form-group row">
                                    <i class="fas fa-users fa-8x text-dark"></i>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="ic"> {{ __('landing.no_kp') }}</label>
                                    <div class="input-group mb-4">

                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        <input class="form-control" placeholder="e.g XXXXXXXXXXXX" type="text"
                                            name="no_kp">
                                    </div>
                                </div>
                                {{-- <div class="form-group mt-3">
                                <label for="ic">E-mel</label>
                                <div class="input-group mb-4">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input class="form-control" placeholder="sppeps@gmail.com" type="email" name="email">
                                </div>
                            </div> --}}
                                <div class="form-group mt-3">
                                    <label for="password">{{ __('landing.kata_laluan') }}</label>
                                    <div class="input-group mb-4">

                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        <input class="form-control" placeholder="Masukkan kata laluan" type="password"
                                            name="password">
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <div class="input-group mb-4 d-flex justify-content-end">
                                        <a href="/lupa-kata-laluan">
                                            <small>
                                                {{ __('landing.lupa_kata_laluan') }}
                                            </small>
                                        </a>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <div class="input-group mb-4">
                                        <input type="submit" class="btn bg-gradient-info btn-lg w-100 text-capitalize"
                                            value="{{ __('landing.log_masuk') }}">
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>

    </div>




@stop
