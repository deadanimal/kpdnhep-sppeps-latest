@extends('layouts.baseUser')

@section('content')


    <div id="container" class="container-fluid d-flex justify-content-center full-height" style="height:100vh;">
        <div class="card card-frame mt-4" style="width: 40%;">
            <div class="card-body text-center">

                
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <div class="form-group row">
                            <i class="fas fa-unlock-alt fa-8x text-dark"></i>
                        </div>

                        <div class="form-group mt-5">
                            <label>No. Kad Pengenalan</label>
                            <div class="input-group mb-4">
                                {{-- <span class="input-group-text"><i class="fas fa-envelope"></i></span> --}}
                                <input class="form-control text-center" placeholder="No. Kad Pengenalan" type="number"
                                    id="no_kp" name="no_kp" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>E-mel</label>
                            <div class="input-group mb-4">
                                {{-- <span class="input-group-text"><i class="fas fa-envelope"></i></span> --}}
                                <input class="form-control text-center" placeholder="e.g abc123@gmail.com" type="email"
                                    id="email" name="email" :value="old('email')" required autofocus>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <input type="submit" class="btn bg-gradient-info btn-lg w-100 text-capitalize"
                            value="reset kata laluan">
                    </div>
                </form>
            </div>


        </div>

    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')

@stop
