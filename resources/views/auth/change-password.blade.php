@extends('layouts.baseUser')

@section('content')

    <style type="text/css">
        html,
        body {
            height: 100%;
            margin: 0;
        }

    </style>


    <div id="container" class="container-fluid d-flex justify-content-center" style="height: initial;">
        <div class="card card-frame mt-4" style="width: 40%;">
            <div class="card-header text-center">
                <h4><strong>Tukar Kata Laluan</strong> </h5>
            </div>
            <div class="card-body pt-0 text-center">
                @if ($errors->any())
                    <div class="alert alert-warning">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif

                <form method="POST" action="/tukar_kata_laluan">
                    @csrf
                    {{-- @method('PUT') --}}
                    <div class="container">


                        <div class="form-group mt-3">
                            <label>Kata Laluan Sekarang</label>
                            <div class="input-group mb-4">
                                <!-- <span class="input-group-text"><i class="fas fa-envelope"></i></span> -->
                                <input class="form-control text-center" placeholder="Masukkan kata laluan sekarang"
                                    type="password" name="cur_pass">
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label>Kata Laluan Baru</label>
                            <div class="input-group mb-4">
                                <!-- <span class="input-group-text"><i class="fas fa-envelope"></i></span> -->
                                <input class="form-control text-center" placeholder="Masukkan kata laluan baru"
                                    type="password" name="new_pass">
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label>Pengesahan Kata Laluan Baru</label>
                            <div class="input-group mb-4">
                                <!-- <span class="input-group-text"><i class="fas fa-envelope"></i></span> -->
                                <input class="form-control text-center" placeholder="Masukkan pengasahan kata laluan baru"
                                    type="password" name="confirm_new_pass">
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
                                <input type="submit" class="btn bg-gradient-info btn-lg w-100" value="Tukar Kata Laluan">
                            </div>
                        </div>

                    </div>
                </form>
            </div>


        </div>

    </div>




@stop
