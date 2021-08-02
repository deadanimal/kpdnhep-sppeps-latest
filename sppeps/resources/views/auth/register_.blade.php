@extends('layouts.baseUser')

@section('content')



<div id="container" class="container-fluid d-flex justify-content-center">
    <div class="card card-frame" style="width: 45%;">
        <div class="card-body">
            <div class="container mt-4">
                <h3>Daftar Akaun</h3>
            </div>

            <form method="POST" action="">
                @csrf


                <div class="container mt-4">

                    <div class="form-group mt-3">
                        <label for="nric">No. Kad Pengenalan</label>
                        <input type="text" class="form-control" name="nric" placeholder="" disabled>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mel</label>
                        <input type="email" class="form-control" id="email" placeholder="e.g abc123@gmail.com">
                    </div>

                    <div class="form-group">
                        <label for="password">Kata Laluan</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan kata laluan">
                    </div>

                    <div class="form-group">
                        <label for="password2">Pengesahan Kata Laluan</label>
                        <input type="password2" class="form-control" id="password2" name="password2" placeholder="Masukkan pengesahan kata laluan">
                    </div>

                    <div class="form-group mt-3">
                        <div class="input-group mb-4">
                            <input type="submit" class="btn bg-gradient-info btn-lg w-100 text-capitalize" value="Daftar Akaun">
                        </div>
                    </div>

                </div>
            </form>

        </div>


        <!-- <div class="card-body">
            <div class="container mt-4">
                <h3>Daftar Akaun 2</h3>
            </div>

            <form method="POST" action="">
                @csrf


                <div class="container mt-4">

                <div class="form-group mt-3">
                        <label for="nric">Nama</label>
                        <input type="text" class="form-control" name="nric" placeholder="" disabled>
                    </div>

                    <div class="form-group mt-3">
                        <label for="nric">No. Kad Penganalan</label>
                        <input type="text" class="form-control" name="nric" placeholder="" disabled>
                    </div>

                    <div class="form-group mt-3">
                        <label for="nric">Umur</label>
                        <input type="text" class="form-control" name="nric" placeholder="" disabled>
                    </div>

                    <div class="form-group mt-3">
                        <label for="nric">Tarikh Lahir</label>
                        <input type="text" class="form-control" name="nric" placeholder="" disabled>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mel</label>
                        <input type="email" class="form-control" id="email" placeholder="abc123@gmail.com" disabled>
                    </div>

                    <div class="form-group mt-3">
                        <label for="nric">Jantina</label>
                        <input type="text" class="form-control" name="nric" placeholder="">
                    </div>
                   
                    <div class="form-group mt-3">
                        <div class="input-group mb-4">
                            <input type="submit" class="btn bg-gradient-info btn-lg w-100">
                        </div>
                    </div>

                </div>
            </form>

        </div> -->
    </div>

</div>




@stop