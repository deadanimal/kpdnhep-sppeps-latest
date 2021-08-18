@extends('layouts.baseUser')

@section('content')

    <style type="text/css">
        html,
        body {
            height: 100%;
            margin: 0;
        }

    </style>


    <div id="container" class="container-fluid d-flex justify-content-center" style="height: 70%;">
        <div class="card card-frame mt-4" style="width: 40%;">
            <div class="card-body text-center">

                <form method="POST" action="">
                    @csrf
                    <div class="container mt-4">
                        <div class="form-group row">
                            <i class="fas fa-unlock-alt fa-8x text-dark"></i>
                        </div>

                        <div class="form-group mt-5">
                            <label>E-mel</label>
                            <div class="input-group mb-4">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input class="form-control text-center" placeholder="e.g abc123@gmail.com" type="email"
                                    id="email" name="email" :value="old('email')" required autofocus>
                            </div>
                        </div>
                        <!-- <div class="form-group mt-3">
                            <div class="input-group mb-4">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input class="form-control" placeholder="Kata laluan baru" type="password">
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="input-group mb-4">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input class="form-control" placeholder="Pengesahan kata laluan baru" type="password">
                            </div>
                        </div> -->
                        <div class="form-group mt-3">
                            <div class="input-group mb-4">
                                <input type="submit" class="btn bg-gradient-info btn-lg w-100 text-capitalize"
                                    value="reset kata laluan">
                            </div>
                        </div>

                    </div>
                </form>
            </div>


        </div>

    </div>


@stop
