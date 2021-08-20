@extends('layouts.baseUser')

@section('content')



    <div id="container" class="container-fluid d-flex justify-content-center">
        <div class="card card-frame" style="width: 45%;">
            <div class="card-body">
                <div class="container mt-4">
                    <h3>Profil</h3>
                </div>

                <div class="card card-plain">
                    <div class="card-body">
                        <form role="form text-left">
                            @foreach ($pemohon as $pemohon)
                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col d-flex justify-content-center">
                                            <label>
                                                <div class="position-relative"
                                                    style="border-style: solid; border-color: black;">
                                                    @if ($pemohon->gambar_profil === '/assets/img/icons/default_profile.png')
                                                        <img src="{{ $pemohon->gambar_profil }}" class="border-radius-md"
                                                            width="150" height="150" />
                                                    @else
                                                        <img src="storage/{{ $pemohon->gambar_profil }}"
                                                            class="border-radius-md" width="150" height="150" />
                                                    @endif

                                                </div>

                                            </label>
                                        </div>
                                    </div>

                                </div>



                                <div class="form-group">
                                    <label for="title">Nama</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $pemohon->name }}"
                                        placeholder="" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="title">No. Kad Pengenalan</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $pemohon->no_kp }}"
                                        placeholder="" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="title">Umur</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $pemohon->umur }}"
                                        placeholder="" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="title">Tarikh Lahir</label>
                                    <input type="text" class="form-control form-control-sm"
                                        value="{{ $pemohon->tarikh_lahir }}" placeholder="" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="title">E-mel</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $pemohon->email }}"
                                        placeholder="" disabled>
                                </div>



                                <div class="form-group">
                                    <label for="title">Jantina</label>
                                    <input type="text" class="form-control" value="{{ $pemohon->jantina }}" placeholder=""
                                        disabled>


                                </div>

                                <div class="form-group">
                                    <label for="title">Alamat</label>
                                    <input type="text" class="form-control form-control-sm"
                                        value="{{ $pemohon->alamat1 }}" placeholder="Alamat baris 1" disabled>
                                    <input type="text" class="form-control form-control-sm"
                                        value="{{ $pemohon->alamat2 }}" placeholder="Alamat baris 2" disabled>
                                    <input type="text" class="form-control form-control-sm"
                                        value="{{ $pemohon->alamat3 }}" placeholder="Alamat baris 3" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="title">Poskod</label>
                                    <input type="text" class="form-control form-control-sm"
                                        value="{{ $pemohon->poskod }}" placeholder="" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Negeri</label>
                                    <input type="text" class="form-control form-control-sm"
                                        value="{{ $pemohon->negeri }}" placeholder="" disabled>

                                </div>

                                <div class="form-group">
                                    <label for="title">No. Telefon Bimbit</label>
                                    <input type="text" class="form-control form-control-sm"
                                        value="{{ $pemohon->no_telefon_bimbit }}" placeholder="" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="title">No. Telefon Rumah</label>
                                    <input type="text" class="form-control form-control-sm"
                                        value="{{ $pemohon->no_telefon_rumah }}" placeholder="" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="title">No. Telefon Pejabat</label>
                                    <input type="text" class="form-control form-control-sm"
                                        value="{{ $pemohon->no_telefon_pejabat }}" placeholder="" disabled>
                                </div>
                                <div class="text-center d-flex justify-content-end">
                                    <!-- <button type="button" class="btn btn-round bg-gradient-danger text-capitalize" data-bs-dismiss="modal">Batal</button> -->
                                    <a href="/profil/{{ $pemohon->id }}"
                                        class="btn btn-round bg-gradient-info text-capitalize">Kemaskini Profil</a>
                                </div>

                            @endforeach
                        </form>
                    </div>

                </div>

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
