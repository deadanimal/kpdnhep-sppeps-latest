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

                <form method="POST" action="/semakan_no_kp">
                    @csrf

                    @if (session()->has('error'))
                        <div class="alert alert-warning">
                            {{ session()->get('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-warning">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif

                    <div class="form-group mt-3">
                        <label for="nric">No. Kad Pengenalan</label>
                        <input type="text" class="form-control" name="no_kp" placeholder="e.g XXXXXXXXXXXX">
                    </div>

                    <div class="form-group mt-4 mb-4">
                        <div class="captcha">
                            <span>{!! captcha_img() !!}</span>
                            {{-- <button type="button" class="btn btn-secondary" class="reload" id="reload">
                                &#x21bb;
                            </button> --}}
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                    </div>
                    <div class="form-group mt-3">
                        <div class="input-group mb-4">
                            <input type="submit" value="Semak" class="btn bg-gradient-info btn-lg w-100 text-capitalize">
                            {{-- <a href="/register_" class="btn bg-gradient-info btn-lg w-100 text-capitalize">Daftar</a> --}}
                        </div>
                    </div>
                </form>
            </div>


        </div>

    </div>

    <script type="text/javascript">
        $('#reload').click(function() {
            $.ajax({
                type: 'GET',
                url: 'reload-captcha',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    </script>




@stop
