@extends('layouts.baseUser')

@section('content')



    <div id="container" class="container-fluid d-flex justify-content-center">
        <div class="card card-frame" style="width: 45%;">
            <div class="card-body">
                <div class="container mt-4">
                    <h3>Daftar Akaun</h3>
                </div>

                <form method="POST" action="/register_user">
                    @csrf

                    <input type="hidden" name="age" value="{{ $age }}">
                    <input type="hidden" name="tarikh_lahir" value="{{ $tarikh_lahir }}">
                    <div class="container mt-4">

                        <div class="form-group mt-3">
                            <label for="nric">{{ __('landing.no_kp') }}</label>
                            <input type="text" class="form-control" name="no_kp" value="{{ $no_kp }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('landing.nama') }}</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="{{ __('landing.nama_penuh') }}">
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('landing.emel') }}</label>
                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="e.g abc123@gmail.com">
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('landing.kata_laluan') }}</label>
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="{{ __('landing.masukkan_kata_laluan') }}">
                        </div>

                        <div class="form-group">
                            <label for="password2">{{ __('landing.pengesahan_kata_laluan') }}</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                id="password_confirmation" placeholder="{{ __('landing.masukkan_pengesahan_kata_laluan') }}">
                        </div>

                        <div class="form-group mt-3">
                            <div class="input-group mb-4">
                                <input type="submit" class="btn bg-gradient-info btn-lg w-100 text-capitalize"
                                    value="{{ __('landing.daftar_akaun') }}">
                            </div>
                        </div>

                    </div>
                </form>

            </div>

        </div>

    </div>




@stop
