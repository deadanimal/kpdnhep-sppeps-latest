@extends('layouts.base-admin-hq')

@section('content')

    <style type="text/css">
        html,
        body {
            height: 100%;
            margin: 0;
        }

    </style>

    <div id="container" class="container-fluid d-flex justify-content-center" style="height: initial;">
        <div class="card card-frame mt-4 col-md-8 col-xs-2" style="width: 40%;">
            <div class="card-header text-center">
                <h4><strong>Tukar Kata Laluan</strong> </h5>
            </div>
            <div class="card-body pt-0 text-center">
                <form method="POST" action="/change-password">
                    @csrf

                    @foreach ($errors->all() as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Kata Laluan Sekarang</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="current_password"
                                autocomplete="current-password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Kata Laluan Baru</label>

                        <div class="col-md-6">
                            <input id="new_password" type="password" class="form-control" name="new_password"
                                autocomplete="current-password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Pengesahan Kata Laluan
                            Baru</label>

                        <div class="col-md-6">
                            <input id="new_confirm_password" type="password" class="form-control"
                                name="new_confirm_password" autocomplete="current-password">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Update Password
                            </button>
                        </div>
                    </div>
                </form>
            </div>


        </div>

    </div>




@stop
