@extends('layouts.baseUser')

@section('content')



    <div id="container" class="container-fluid d-flex justify-content-center">
        <div class="card card-frame" style="width: 45%;">
            <div class="card-body">
                <div class="container mt-4">
                    <h3>{{ __('landing.kemaskini_profil') }}</h3>
                </div>

                <div class="card card-plain">
                    <div class="card-body">
                        <form role="form text-left" method="POST" action="/profil/{{ $pemohon->id }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <div class="row ">
                                    <div class="col d-flex justify-content-center">
                                        <label>
                                            <div class="position-relative">
                                                @if ($pemohon->gambar_profil === '/assets/img/icons/default_profile.png')
                                                    <img src="{{ $pemohon->gambar_profil }}" class="border-radius-md"
                                                        width="150" height="150" />
                                                @else
                                                    <img src="/storage/{{ $pemohon->gambar_profil }}"
                                                        class="border-radius-md" width="150" height="150" />
                                                @endif

                                                <a
                                                    class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2">
                                                    <i class="fa fa-pen top-0" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="" aria-hidden="true"
                                                        data-bs-original-title="Edit Image"
                                                        aria-label="Edit Image"></i><span class="sr-only">Edit
                                                        Image</span>
                                                </a>
                                            </div>
                                            <input type="file" style="display: none;" name="gambar_profil">
                                        </label>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="form-group" style="outline: 1px dashed red;">
                                        <small
                                            class="text-xs mb-3">{{ __('landing.pemohon_perlu_memasukan___') }}</small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="title">{{ __('landing.nama') }}</label>
                                <input type="text" class="form-control form-control-sm" name="name" placeholder=""
                                    value="{{ $pemohon->name }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="title">{{ __('landing.no_kp') }}</label>
                                <input type="text" class="form-control form-control-sm" placeholder="" name="no_kp"
                                    value="{{ $pemohon->no_kp }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="title">{{ __('landing.umur') }}</label>
                                <input type="text" class="form-control form-control-sm" placeholder="" name="umur"
                                    value="{{ $pemohon->umur }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="title">{{ __('landing.tarikh_lahir') }}</label>
                                <input type="text" class="form-control form-control-sm" placeholder="" name="tarikh_lahir"
                                    value="{{ $pemohon->tarikh_lahir }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="title">{{ __('landing.emel') }}</label>
                                <input type="text" class="form-control form-control-sm" placeholder="" name="email"
                                    value="{{ $pemohon->email }}" readonly>
                            </div>


                            <div class="form-group">
                                <label for="title">{{ __('landing.jantina') }}</label>
                                <!-- <input type="text" class="form-control"   placeholder="" > -->

                                <select name="jantina" id="jantina" class="form-control form-control-sm">
                                    <option value="">--{{ __('landing.sila_pilih') }}--</option>
                                    <option {{ $pemohon->jantina == 'Lelaki' ? 'selected' : '' }} value="Lelaki">
                                        {{ __('landing.lelaki') }}
                                    </option>
                                    <option {{ $pemohon->jantina == 'Perempuan' ? 'selected' : '' }} value="Perempuan">
                                        {{ __('landing.perempuan') }}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="title">{{ __('landing.alamat') }}</label>
                                <input type="text" class="form-control form-control-sm" name="alamat1"
                                    value="{{ $pemohon->alamat1 }}" placeholder="Alamat baris 1">
                                <input type="text" class="form-control form-control-sm" name="alamat2"
                                    value="{{ $pemohon->alamat2 }}" placeholder="Alamat baris 2">
                                <input type="text" class="form-control form-control-sm" name="alamat3"
                                    value="{{ $pemohon->alamat3 }}" placeholder="Alamat baris 3">
                            </div>

                            <div class="form-group">
                                <label for="title">{{ __('landing.poskod') }}</label>
                                <input type="text" class="form-control form-control-sm" name="poskod"
                                    value="{{ $pemohon->poskod }}" placeholder=" e.g 62623">
                            </div>

                            <div class="form-group">
                                <label>{{ __('landing.negeri') }}</label>
                                <select class="form-control form-control-sm" aria-label="Default select example"
                                    name="negeri">
                                    <option value="">--{{ __('landing.pilih_negeri') }}--</option>
                                    <option {{ $pemohon->negeri == 'Perlis' ? 'selected' : '' }} value="Perlis">Perlis
                                    </option>
                                    <option {{ $pemohon->negeri == 'Kedah' ? 'selected' : '' }} value="Kedah">Kedah
                                    </option>
                                    <option {{ $pemohon->negeri == 'Pulau Pinang' ? 'selected' : '' }}
                                        value="Pulau Pinang">Pulau Pinang</option>
                                    <option {{ $pemohon->negeri == 'Perak' ? 'selected' : '' }} value="Perak">Perak
                                    </option>
                                    <option {{ $pemohon->negeri == 'Selangor' ? 'selected' : '' }} value="Selangor">
                                        Selangor</option>
                                    <option {{ $pemohon->negeri == 'Melaka' ? 'selected' : '' }} value="Melaka">Melaka
                                    </option>
                                    <option {{ $pemohon->negeri == 'Negeri Sembilan' ? 'selected' : '' }}
                                        value="Negeri Sembilan">Negeri Sembilan</option>
                                    <option {{ $pemohon->negeri == 'Johor' ? 'selected' : '' }} value="Johor">Johor
                                    </option>
                                    <option {{ $pemohon->negeri == 'Pahang' ? 'selected' : '' }} value="Pahang">Pahang
                                    </option>
                                    <option {{ $pemohon->negeri == 'Terengganu' ? 'selected' : '' }} value="Terengganu">
                                        Terengganu</option>
                                    <option {{ $pemohon->negeri == 'Kelantan' ? 'selected' : '' }} value="Kelantan">
                                        Kelantan</option>
                                    <option {{ $pemohon->negeri == 'Sabah' ? 'selected' : '' }} value="Sabah">Sabah
                                    </option>
                                    <option {{ $pemohon->negeri == 'Sarawak' ? 'selected' : '' }} value="Sarawak">
                                        Sarawak</option>
                                    <option {{ $pemohon->negeri == 'WP Kuala Lumpur' ? 'selected' : '' }}
                                        value="WP Kuala Lumpur">W. P. Kuala Lumpur
                                    </option>
                                    <option {{ $pemohon->negeri == 'WP Putrajaya' ? 'selected' : '' }}
                                        value="WP Putrajaya">W. P. Putrajaya</option>
                                    <option {{ $pemohon->negeri == 'WP Labuan' ? 'selected' : '' }} value="WP Labuan">
                                        W. P. Labuan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="title">{{ __('landing.no_telefon_bimbit') }}</label>
                                <input type="text" class="form-control form-control-sm" name="no_telefon_bimbit"
                                    value="{{ $pemohon->no_telefon_bimbit }}" placeholder="e.g 1234567890">
                            </div>

                            <div class="form-group">
                                <label for="title"> {{ __('landing.no_telefon_rumah') }}</label>
                                <input type="text" class="form-control form-control-sm" name="no_telefon_rumah"
                                    value="{{ $pemohon->no_telefon_rumah }}" placeholder="e.g 1234567890">
                            </div>

                            <div class="form-group">
                                <label for="title"> {{ __('landing.no_telefon_pejabat') }}</label>
                                <input type="text" class="form-control form-control-sm" name="no_telefon_pejabat"
                                    value="{{ $pemohon->no_telefon_pejabat }}" placeholder="e.g 1234567890">
                            </div>
                            <div class="text-center d-flex justify-content-end">
                                @if ($pemohon->profil_update != 0)
                                    <a href="/profil" type="button" class="btn btn-round bg-gradient-danger text-capitalize"
                                        data-bs-dismiss="modal">{{ __('landing.batal') }}</a>
                                @endif

                                <button type="Submit"
                                    class="btn btn-round bg-gradient-success text-capitalize">{{ __('landing.simpan') }}</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>

    </div>

@stop
