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
        <div class="card-body text-center">

            <form method="POST" action="">
                @csrf
                <div class="form-group mt-3">
                    <label for="nric">No. Kad Pengenalan</label>
                    <input type="text" class="form-control" name="nric" placeholder="e.g XXXXXXXXXXXX">
                </div>

                <div class="form-group mt-3">
                    <label for="nric">Kod keselamatan</label>
                    <input type="text" class="form-control" name="nric" placeholder="Masukkan kod keselamatan">
                </div>
                <div class="form-group mt-3">
                    <div class="input-group mb-4">
                        <input type="submit" value="Semak" class="btn bg-gradient-info btn-lg w-100 text-capitalize">
                        <a href="/register" class="btn bg-gradient-info btn-lg w-100 text-capitalize">Daftar</a>
                    </div>
                </div>
            </form>
        </div>


    </div>

</div>




@stop