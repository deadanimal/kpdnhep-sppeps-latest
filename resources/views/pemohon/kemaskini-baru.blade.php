@extends('layouts.baseUser')

@section('content')

    <style>
        .upload-btn {
            background-color: indigo;
            color: white;
            padding: 0.5rem;
            font-family: sans-serif;
            border-radius: 0.3rem;
            cursor: pointer;
            margin-top: 1rem;
        }

        #file-chosen {
            margin-left: 0.3rem;
            font-family: sans-serif;
        }

    </style>


    <div class="docs mb-3">

        <div class="ct-docs-main-container">

            <main class="ct-docs-content-col" role="main">

                <div class="row">
                    <div class="col-12 text-center">
                        <h3 class="mt-5">{{ __('landing.permohonan_baharu') }}</h3>
                        <!-- <h5 class="text-secondary font-weight-normal">This information will let us know more about you.</h5> -->
                        <div class="multisteps-form mb-5">
                            <!--progress bar-->
                            <div class="row">
                                <div class="col-12 col-lg-8 mx-auto my-5">
                                    <div class="multisteps-form__progress">
                                        <button class="multisteps-form__progress-btn js-active" type="button"
                                            title="User Info">
                                            <span>A. {{ __('landing.maklumat_permohonan') }}</span>
                                        </button>
                                        <button class="multisteps-form__progress-btn" type="button" title="Address">
                                            <span>B. {{ __('landing.maklumat_tambahan') }}</span>
                                        </button>
                                        <button class="multisteps-form__progress-btn" type="button" title="Order Info">
                                            <span>C. {{ __('landing.pengesahan_permohonan') }}</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!--form panels-->
                            <div class="row">
                                <div class="col-12 col-lg-8 m-auto">
                                    <form class="multisteps-form__form" method="POST"
                                        action="/permohonan/{{ $permohonan->id }}">
                                        @csrf
                                        @method('PUT')
                                        <!--single form panel-->
                                        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active"
                                            data-animation="FadeIn">
                                            <div class="row text-center">
                                                <div class="col-12 mx-auto">
                                                    <h5 class="font-weight-normal"><strong>A.
                                                            {{ __('landing.maklumat_permohonan') }}</strong></h5>
                                                    <!-- <p>Let us know your name and email address. Use an address you don't mind other users contacting you at</p> -->
                                                </div>
                                            </div>
                                            <div class="multisteps-form__content text-start">


                                                @if ($errors->any())
                                                    <div class="alert alert-warning text-sm">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                <div class="row mt-3 p-3">
                                                    <div class="row ">
                                                        <div class="col d-flex justify-content-center flex-wrap">
                                                            <label>
                                                                <div class="position-relative">
                                                                    {{-- <img src="/storage/{{ $permohonan->gambar_pemohon }}"
                                                                        class="border-radius-md" width="150" height="150" /> --}}
                                                                    <img src="/storage/{{ $pemohon->gambar_profil }}"
                                                                        class="border-radius-md" width="150" height="150" />

                                                                    <input type="hidden" name="gambar_pemohon"
                                                                        value="{{ $pemohon->gambar_profil }}">

                                                                    <input type="hidden" name="jenis_permohonan"
                                                                        value="Baharu">
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2 d-flex justify-content-center flex-wrap">
                                                        <div class="col-md-8 form-group text-center"
                                                            style="outline: 1px dashed red;">
                                                            <small
                                                                class="text-xs mb-3">{{ __('landing.gamabr_ini_akan___') }}<br>
                                                                {{ __('landing.sekiranya_ingin_menukar___') }}</small>
                                                        </div>
                                                    </div>


                                                    <div class="d-flex flex-wrap pb-2">
                                                        <div class="col-6 form-group p-0">
                                                            <label for="name">
                                                                <i class="fas fa-user"></i><strong>
                                                                    {{ __('landing.nama') }}</strong>
                                                            </label>
                                                            <div class="d-flex flex-nowrap align-items-center">
                                                                <input type="text" name="nama" class="form-control col-9"
                                                                    id="name" value="{{ $permohonan->nama }}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-1"></div>
                                                        <div class="col form-group pr-0">
                                                            <label for="ic"><i class="fas fa-id-card"></i><strong>
                                                                    {{ __('landing.no_kp') }}</strong></label>
                                                            <input type="text" name="no_kp" class="form-control" id="ic"
                                                                value="{{ $permohonan->no_kp }}" readonly>
                                                        </div>
                                                    </div>


                                                    <div class="d-flex flex-nowrap pb-2">
                                                        <div class="col-6 form-group p-0">
                                                            <label for="gender"> <i class="fas fa-venus-mars"></i><strong>
                                                                    {{ __('landing.jantina') }}</strong></label>
                                                            <!-- <input type="text" class="form-control" id="ic" aria-describedby="ic" value="userdata.no_kp" disabled> -->

                                                            <select id="gender" class="form-control" name="jantina">
                                                                <option disabled value="">
                                                                    --{{ __('landing.sila_pilih') }}--</option>
                                                                <option
                                                                    {{ $permohonan->jantina == 'Lelaki' ? 'selected' : '' }}
                                                                    value="Lelaki">{{ __('landing.lelaki') }}</option>
                                                                <option
                                                                    {{ $permohonan->jantina == 'Perempuan' ? 'selected' : '' }}
                                                                    value="Perempuan">{{ __('landing.perempuan') }}
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <div class="col-1"></div>
                                                        <div class="col form-group pr-0">
                                                            <label for="age"><i class="fas fa-calendar-alt"></i><strong>
                                                                    {{ __('landing.umur') }}</strong></label>
                                                            <input type="text" class="form-control" id="age"
                                                                value="{{ $permohonan->umur }}" name="umur" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex flex-nowrap pb-2">
                                                        <div class="col-6 form-group p-0">
                                                            <label for="phone">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd"
                                                                        d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                                                </svg>
                                                                <strong> {{ __('landing.no_telafon') }}</strong>
                                                            </label>
                                                            <div class="d-flex flex-nowrap align-items-center">
                                                                <input type="text" class="form-control col-2" id="phone1"
                                                                    name="no_telefon" aria-describedby="phone"
                                                                    value="{{ $permohonan->no_telefon }}">

                                                            </div>
                                                        </div>
                                                        <div class="col-1"></div>
                                                        <div class="col form-group pr-0">
                                                            <label for="email"><i class="fas fa-envelope"></i><strong>
                                                                    {{ __('landing.emel') }}</strong></label>
                                                            <input type="email" name="emel" class="form-control"
                                                                id="email" value="{{ $permohonan->emel }}">
                                                        </div>
                                                    </div>

                                                    <div class="d-flex flex-nowrap pb-2">
                                                        <div class="col-6 form-group p-0">
                                                            <label for="address"><i
                                                                    class="fas fa-map-marker-alt"></i><strong>
                                                                    {{ __('landing.alamat') }}</strong></label>
                                                            <input type="text" class="col-9 form-control" name="alamat1"
                                                                id="address1" aria-describedby="address"
                                                                value="{{ $permohonan->alamat1 }}">
                                                            <input type="text" class="col-9 form-control" name="alamat2"
                                                                id="address2" aria-describedby="address"
                                                                value="{{ $permohonan->alamat2 }}">
                                                            <input type="text" class="col-9 form-control" name="alamat3"
                                                                id="address2" aria-describedby="address"
                                                                value="{{ $permohonan->alamat3 }}">
                                                        </div>
                                                        <div class="col-1"></div>
                                                        <div class="col pr-0">
                                                            <div class="form-group">
                                                                <label for="email">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="currentColor"
                                                                        class="bi bi-signpost-fill" viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M7.293.707A1 1 0 0 0 7 1.414V4H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h5v6h2v-6h3.532a1 1 0 0 0 .768-.36l1.933-2.32a.5.5 0 0 0 0-.64L13.3 4.36a1 1 0 0 0-.768-.36H9V1.414A1 1 0 0 0 7.293.707z" />
                                                                    </svg>
                                                                    <strong> {{ __('landing.poskod') }}</strong></label>
                                                                <input type="text" class="form-control" id="poskod"
                                                                    aria-describedby="poskod" name="poskod"
                                                                    value="{{ $permohonan->poskod }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="state"><i class="fas fa-map"></i><strong>
                                                                        {{ __('landing.negeri') }}</strong></label>
                                                                <select class="form-control"
                                                                    aria-label="Default select example" name="negeri">
                                                                    <option disabled value="">
                                                                        --{{ __('landing.pilih_negeri') }}--</option>
                                                                    <option
                                                                        {{ $permohonan->negeri == 'Perlis' ? 'selected' : '' }}
                                                                        value="Perlis">Perlis</option>
                                                                    <option
                                                                        {{ $permohonan->negeri == 'Kedah' ? 'selected' : '' }}
                                                                        value="Kedah">Kedah</option>
                                                                    <option
                                                                        {{ $permohonan->negeri == 'Pulau Pinang' ? 'selected' : '' }}
                                                                        value="Pulau Pinang">Pulau Pinang</option>
                                                                    <option
                                                                        {{ $permohonan->negeri == 'Perak' ? 'selected' : '' }}
                                                                        value="Perak">Perak</option>
                                                                    <option
                                                                        {{ $permohonan->negeri == 'Selangor' ? 'selected' : '' }}
                                                                        value="Selangor">Selangor</option>
                                                                    <option
                                                                        {{ $permohonan->negeri == 'Melaka' ? 'selected' : '' }}
                                                                        value="Melaka">Melaka</option>
                                                                    <option
                                                                        {{ $permohonan->negeri == 'Negeri Sembilan' ? 'selected' : '' }}
                                                                        value="Negeri Sembilan">Negeri Sembilan</option>
                                                                    <option
                                                                        {{ $permohonan->negeri == 'Johor' ? 'selected' : '' }}
                                                                        value="Johor">Johor</option>
                                                                    <option
                                                                        {{ $permohonan->negeri == 'Pahang' ? 'selected' : '' }}
                                                                        value="Pahang">Pahang</option>
                                                                    <option
                                                                        {{ $permohonan->negeri == 'Terengganu' ? 'selected' : '' }}
                                                                        value="Terengganu">Terengganu</option>
                                                                    <option
                                                                        {{ $permohonan->negeri == 'Kelantan' ? 'selected' : '' }}
                                                                        value="Kelantan">Kelantan</option>
                                                                    <option
                                                                        {{ $permohonan->negeri == 'Sabah' ? 'selected' : '' }}
                                                                        value="Sabah">Sabah</option>
                                                                    <option
                                                                        {{ $permohonan->negeri == 'Sarawak' ? 'selected' : '' }}
                                                                        value="Sarawak">Sarawak</option>
                                                                    <option
                                                                        {{ $permohonan->negeri == 'WP Kuala Lumpur' ? 'selected' : '' }}
                                                                        value="WP Kuala Lumpur">W. P. Kuala Lumpur</option>
                                                                    <option
                                                                        {{ $permohonan->negeri == 'WP Putrajaya' ? 'selected' : '' }}
                                                                        value="WP Putrajaya">W. P. Putrajaya</option>
                                                                    <option
                                                                        {{ $permohonan->negeri == 'WP Labuan' ? 'selected' : '' }}
                                                                        value="WP Labuan">W. P. Labuan</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex flex-nowrap pb-2">
                                                        <div class="col-6 form-group p-0">
                                                            <div class="form-group">
                                                                <label for="state"><i
                                                                        class="fas fa-map"></i><strong>{{ __('landing.negeri_kutipan_permit') }}</strong></label>
                                                                <select class="form-control"
                                                                    aria-label="Default select example"
                                                                    name="negeri_kutipan_permit">
                                                                    <option disabled value="">
                                                                        --{{ __('landing.pilih_negeri') }}--</option>
                                                                    <option
                                                                        {{ $permohonan->negeri_kutipan_permit == 'Perlis' ? 'selected' : '' }}
                                                                        value="Perlis">Perlis</option>
                                                                    <option
                                                                        {{ $permohonan->negeri_kutipan_permit == 'Kedah' ? 'selected' : '' }}
                                                                        value="Kedah">Kedah</option>
                                                                    <option
                                                                        {{ $permohonan->negeri_kutipan_permit == 'Pulau Pinang' ? 'selected' : '' }}
                                                                        value="Pulau Pinang">Pulau Pinang</option>
                                                                    <option
                                                                        {{ $permohonan->negeri_kutipan_permit == 'Perak' ? 'selected' : '' }}
                                                                        value="Perak">Perak</option>
                                                                    <option
                                                                        {{ $permohonan->negeri_kutipan_permit == 'Selangor' ? 'selected' : '' }}
                                                                        value="Selangor">Selangor</option>
                                                                    <option
                                                                        {{ $permohonan->negeri_kutipan_permit == 'Melaka' ? 'selected' : '' }}
                                                                        value="Melaka">Melaka</option>
                                                                    <option
                                                                        {{ $permohonan->negeri_kutipan_permit == 'Negeri Sembilan' ? 'selected' : '' }}
                                                                        value="Negeri Sembilan">Negeri Sembilan</option>
                                                                    <option
                                                                        {{ $permohonan->negeri_kutipan_permit == 'Johor' ? 'selected' : '' }}
                                                                        value="Johor">Johor</option>
                                                                    <option
                                                                        {{ $permohonan->negeri_kutipan_permit == 'Pahang' ? 'selected' : '' }}
                                                                        value="Pahang">Pahang</option>
                                                                    <option
                                                                        {{ $permohonan->negeri_kutipan_permit == 'Terengganu' ? 'selected' : '' }}
                                                                        value="Terengganu">Terengganu</option>
                                                                    <option
                                                                        {{ $permohonan->negeri_kutipan_permit == 'Kelantan' ? 'selected' : '' }}
                                                                        value="Kelantan">Kelantan</option>
                                                                    <option
                                                                        {{ $permohonan->negeri_kutipan_permit == 'Sabah' ? 'selected' : '' }}
                                                                        value="Sabah">Sabah</option>
                                                                    <option
                                                                        {{ $permohonan->negeri_kutipan_permit == 'Sarawak' ? 'selected' : '' }}
                                                                        value="Sarawak">Sarawak</option>
                                                                    <option
                                                                        {{ $permohonan->negeri_kutipan_permit == 'WP Kuala Lumpur' ? 'selected' : '' }}
                                                                        value="WP Kuala Lumpur">W. P. Kuala Lumpur</option>
                                                                    <option
                                                                        {{ $permohonan->negeri_kutipan_permit == 'WP Putrajaya' ? 'selected' : '' }}
                                                                        value="WP Putrajaya">W. P. Putrajaya</option>
                                                                    <option
                                                                        {{ $permohonan->negeri_kutipan_permit == 'WP Labuan' ? 'selected' : '' }}
                                                                        value="WP Labuan">W. P. Labuan</option>
                                                                </select>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="button-row d-flex mt-4">
                                                    <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next"
                                                        type="button"
                                                        title="Next">{{ __('landing.seterusnya') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--single form panel-->
                                        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white"
                                            data-animation="FadeIn">
                                            <div class="row text-center">
                                                <div class="col-12 mx-auto">
                                                    <h5 class="font-weight-normal"><strong>B.
                                                            {{ __('landing.maklumat_tambahan') }}</strong></h5>
                                                    <!-- <p>Give us more details about you. What do you enjoy doing in your spare time?</p> -->
                                                </div>
                                            </div>
                                            <div class="multisteps-form__content p-3 text-start">
                                                <div class="row mt-4">
                                                    <div class="form-group pb-2">
                                                        <div class="col-6 form-group p-0">
                                                            <label for="occupation"><i class="fas fa-briefcase"></i><strong>
                                                                    {{ __('landing.pekerjaan_sekarang') }}</strong></label>
                                                            <input type="text" class="col-5 form-control" id="occupation"
                                                                name="pekerjaan_sekarang"
                                                                value="{{ $permohonan->pekerjaan_sekarang }}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group pb-2">
                                                        <label for="education"><i class="fas fa-graduation-cap"></i><strong>
                                                                {{ __('landing.tahap_pendidikan_tertinggi') }}</strong></label>
                                                        <!-- <input type="text" class="form-control" id="education" aria-describedby="education" placeholder=""> -->
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        {{ $permohonan->tahap_pendidikan == 'Tiada' ? 'checked' : '' }}
                                                                        name="tahap_pendidikan" value="Tiada">
                                                                    <label
                                                                        class="form-check-label">{{ __('landing.tiada') }}</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        {{ $permohonan->tahap_pendidikan == 'Darjah 6' ? 'checked' : '' }}
                                                                        name="tahap_pendidikan" value="Darjah 6">
                                                                    <label
                                                                        class="form-check-label">{{ __('landing.darjah_6') }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-check ">
                                                                    <input class="form-check-input" type="radio"
                                                                        {{ $permohonan->tahap_pendidikan == 'PMR' ? 'checked' : '' }}
                                                                        name="tahap_pendidikan" value="PMR">
                                                                    <label class="form-check-label">PMR</label>
                                                                </div>
                                                                <div class="form-check ">
                                                                    <input class="form-check-input" type="radio"
                                                                        {{ $permohonan->tahap_pendidikan == 'SPM' ? 'checked' : '' }}
                                                                        name="tahap_pendidikan" value="SPM">
                                                                    <label class="form-check-label">SPM</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-check ">
                                                                    <input class="form-check-input" type="radio"
                                                                        {{ $permohonan->tahap_pendidikan == 'Diploma' ? 'checked' : '' }}
                                                                        name="tahap_pendidikan" value="Diploma">
                                                                    <label class="form-check-label">Diploma</label>
                                                                </div>
                                                                <div class="form-check ">
                                                                    <input class="form-check-input" type="radio"
                                                                        {{ $permohonan->tahap_pendidikan == 'Ijazah/Master' ? 'checked' : '' }}
                                                                        name="tahap_pendidikan" value="Ijazah/Master">
                                                                    <label
                                                                        class="form-check-label">{{ __('landing.ijazah_master') }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group pb-2">
                                                        <label for="education"><i class="fas fa-car"></i><strong>
                                                                {{ __('landing.lesen_memandu') }}</strong></label>
                                                        <!-- <input type="text" class="form-control" id="education" aria-describedby="education" placeholder=""> -->
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-3">

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="lesen_memandu[]" id="inlineCheckbox1"
                                                                        value="B1" @foreach ($lesen_memandu1 as $lesen_memandu)
                                                                    {{ $lesen_memandu == 'B1' ? 'checked' : '' }}
                                                                    @endforeach>
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox1">B1</label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="lesen_memandu[]" id="inlineCheckbox1"
                                                                        value="B2" @foreach ($lesen_memandu2 as $lesen_memandu)
                                                                    {{ $lesen_memandu == 'B2' ? 'checked' : '' }}
                                                                    @endforeach>
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox1">B2
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-check ">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="lesen_memandu[]" id="inlineCheckbox1"
                                                                        value="D" @foreach ($lesen_memandu3 as $lesen_memandu)
                                                                    {{ $lesen_memandu == 'D' ? 'checked' : '' }}
                                                                    @endforeach>

                                                                    <label class="form-check-label" for="inlineCheckbox1">D
                                                                    </label>
                                                                </div>
                                                                <div class="form-check ">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="lesen_memandu[]" id="inlineCheckbox1"
                                                                        value="E" @foreach ($lesen_memandu4 as $lesen_memandu)
                                                                    {{ $lesen_memandu == 'E' ? 'checked' : '' }}
                                                                    @endforeach
                                                                    >
                                                                    <label class="form-check-label" for="inlineCheckbox1">E
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-check ">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="lesen_memandu[]" id="inlineCheckbox1"
                                                                        value="F" @foreach ($lesen_memandu4 as $lesen_memandu)
                                                                    {{ $lesen_memandu == 'F' ? 'checked' : '' }}
                                                                    @endforeach
                                                                    >
                                                                    <label class="form-check-label" for="inlineCheckbox1">F
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label
                                                            for=""><strong>{{ __('landing.pernah_bekarja_sebagai_panel_bank') }}</strong></label>
                                                        <!-- <input type="text" class="form-control" id="state" aria-describedby="state" placeholder=""> -->


                                                        <div class="row">
                                                            <div class="row m-2">
                                                                <div class="col-3 form-check ">
                                                                    <input type="radio" name="berkerja_panel_atau_syarikat"
                                                                        onclick="clearForm()" id="bekerja_panel"
                                                                        class="form-check-input ml-3" value="Ya"
                                                                        {{ $permohonan->berkerja_panel_atau_syarikat == 'Ya' ? 'checked' : '' }}>
                                                                    <label class="pl-2 form-check-label"
                                                                        for="panelInfo">{{ __('landing.ya') }}</label>

                                                                </div>
                                                                <div class="col-3 form-check">
                                                                    <input type="radio" name="berkerja_panel_atau_syarikat"
                                                                        onclick="clearForm2()" id="tidak_bekerja_panel"
                                                                        class="form-check-input" value="Tidak"
                                                                        {{ $permohonan->berkerja_panel_atau_syarikat == 'Tidak' ? 'checked' : '' }}>
                                                                    <label class="pl-2 form-check-label"
                                                                        for="panelInfo">{{ __('landing.tidak') }}</label>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <!-- //if yes appear -->
                                                            <div class="row" id="institusi_kewangan"
                                                                @if ($permohonan->berkerja_panel_atau_syarikat == 'Ya')
                                                                style="display: block;"
                                                            @else
                                                                style="display: none;"
                                                                @endif
                                                                >
                                                                <div class="col-5 form-group">
                                                                    <div class="form-group">
                                                                        <label for="bank"
                                                                            class="col-sm"><strong>{{ __('landing.nama_institusi_kewangan') }}
                                                                            </strong></label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text"
                                                                                class="form-control form-control-sm"
                                                                                id="nama_institusi_kewangan"
                                                                                name="nama_institusi_kewangan"
                                                                                value="{{ $permohonan->nama_institusi_kewangan }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="col-1"></div> -->
                                                                <div class="col-5 form-group">
                                                                    <div class="form-group">
                                                                        <label for="phoneNumber" class="col-sm">
                                                                            <strong>{{ __('landing.no_telefon_institusi_kewangan') }}</strong>
                                                                        </label>
                                                                        <div class="col-sm-8">

                                                                            <input type="text"
                                                                                name="no_telefon_institusi_kewangan"
                                                                                id="no_telefon_institusi_kewangan"
                                                                                class="form-control form-control-sm"
                                                                                value="{{ $permohonan->no_telefon_institusi_kewangan }}">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- if no appear -->
                                                            <div class="row" id="maklumat_panel" @if ($permohonan->berkerja_panel_atau_syarikat == 'Tidak')
                                                                style="display: block;"
                                                            @else
                                                                style="display: none;"
                                                                @endif
                                                                >
                                                                <div>
                                                                    <label class="pl-4">
                                                                        <strong>{{ __('landing.sila_nyatakan_panel___') }}
                                                                        </strong>
                                                                    </label>
                                                                </div>
                                                                <div class="row ">
                                                                    <div class="col-1"></div>

                                                                    <div class="form-group row pl-4">
                                                                        <div class="col-md-3">
                                                                            <label for="panelName">
                                                                                <strong> {{ __('landing.panel_name') }}
                                                                                </strong>
                                                                            </label>
                                                                        </div>
                                                                        <div class="col">
                                                                            <input type="text" name="nama_panel"
                                                                                class="form-control col-10 form-control-sm"
                                                                                id="nama_panel"
                                                                                value="{{ $permohonan->nama_panel }}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row pl-4">
                                                                        <div class="col-md-3">
                                                                            <label for="panelName">
                                                                                <strong> {{ __('landing.no_kp') }}
                                                                                </strong>
                                                                            </label>
                                                                        </div>
                                                                        <div class="col">
                                                                            <input type="text" id="no_kp_panel"
                                                                                class="form-control form-control-sm"
                                                                                placeholder="" name="no_kp_panel"
                                                                                value="{{ $permohonan->no_kp_panel }}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row pl-4">
                                                                        <div class="col-md-3">
                                                                            <label for="permitNumber">
                                                                                <strong> {{ __('landing.no_permit') }}
                                                                                </strong>
                                                                            </label>
                                                                        </div>
                                                                        <div class="col">
                                                                            <input type="text"
                                                                                class="form-control form-control-sm"
                                                                                id="no_permit_panel" name="no_permit_panel"
                                                                                value="{{ $permohonan->no_permit_panel }}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row pl-4">
                                                                        <div class="col-md-3">
                                                                            <label for="phoneNumber">
                                                                                <strong>{{ __('landing.no_telafon') }}
                                                                                </strong> </label>
                                                                        </div>
                                                                        <div class="col">
                                                                            <input type="text"
                                                                                class="form-control form-control-sm"
                                                                                id="no_telefon_panel"
                                                                                name="no_telefon_panel"
                                                                                value="{{ $permohonan->no_telefon_panel }}">
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>


                                                    </div>

                                                    <div class="form-group">
                                                        <label
                                                            for="activityInfo"><strong>{{ __('landing.adakah_anda_tahu___') }}</strong></label>

                                                        <div class="row">
                                                            <div class="col">
                                                                <label>{{ __('landing.skop_tugas') }}</label>
                                                                <div class="form-group">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="skop_tugas" value="Ya"
                                                                            {{ $permohonan->skop_tugas == 'Ya' ? 'checked' : '' }}>
                                                                        <label
                                                                            class="form-check-label">{{ __('landing.ya') }}</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="skop_tugas" value="Tidak"
                                                                            {{ $permohonan->skop_tugas == 'Tidak' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="jobScope">{{ __('landing.tidak') }}</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col">
                                                                <label>{{ __('landing.prosedur_peraturan') }}</label>
                                                                <div class="form-group">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="yes" name="prosedur_peraturan_eps"
                                                                            value="Ya"
                                                                            {{ $permohonan->prosedur_peraturan_eps == 'Ya' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="procedure">{{ __('landing.ya') }}</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="no" name="prosedur_peraturan_eps"
                                                                            value="Tidak"
                                                                            {{ $permohonan->prosedur_peraturan_eps == 'Tidak' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="procedure">{{ __('landing.tidak') }}</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">

                                                        <div class="row form-group">
                                                            <label class="pb-2"><strong>
                                                                    {{ __('landing.muat_naik_dokumen') }}</strong></label>
                                                        </div>

                                                        <div class="form-group">

                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <label
                                                                        class="mt-1">{{ __('landing.ic_depan') }}</label>
                                                                </div>
                                                                <div class="col">
                                                                    <!-- actual upload which is hidden -->
                                                                    <input type="file" id="actual-btn" hidden
                                                                        name="salinan_kp_depan" />
                                                                    <!-- our custom upload button -->
                                                                    <label for="actual-btn"
                                                                        class="upload-btn mt-0">{{ __('landing.pilih_fail') }}</label>
                                                                    <!-- name of file chosen -->
                                                                    <span id="file-chosen" class="mt-1"><a
                                                                            href="/storage/{{ $permohonan->salinan_kp_depan }}"
                                                                            target="_blank">{{ $permohonan->salinan_kp_depan }}</a></span>

                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <label class="mt-1"
                                                                        for="image">{{ __('landing.ic_belakang') }}</label>
                                                                </div>
                                                                <div class="col">
                                                                    <!-- actual upload which is hidden -->
                                                                    <input type="file" id="actual-btn2" hidden
                                                                        name="salinan_kp_belakang" />
                                                                    <!-- our custom upload button -->
                                                                    <label for="actual-btn2"
                                                                        class="upload-btn mt-0">{{ __('landing.pilih_fail') }}</label>
                                                                    <!-- name of file chosen -->
                                                                    <span id="file-chosen" class="mt-1"><a
                                                                            href="/storage/{{ $permohonan->salinan_kp_belakang }}"
                                                                            target="_blank">{{ $permohonan->salinan_kp_belakang }}</a></span>

                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <label class="mt-1"
                                                                        for="image">{{ __('landing.lesen_memandu_s') }}</label>
                                                                </div>
                                                                <div class="col">
                                                                    <!-- actual upload which is hidden -->
                                                                    <input type="file" id="actual-btn3" hidden
                                                                        name="salinan_lesen_memandu" />
                                                                    <!-- our custom upload button -->
                                                                    <label for="actual-btn3"
                                                                        class="upload-btn mt-0">{{ __('landing.pilih_fail') }}</label>
                                                                    <!-- name of file chosen -->
                                                                    <span id="file-chosen" class="mt-1"><a
                                                                            href="/storage/{{ $permohonan->salinan_lesen_memandu }}"
                                                                            target="_blank">{{ $permohonan->salinan_lesen_memandu }}</a></span>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="button-row d-flex mt-4 mb-4">
                                                    <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button"
                                                        title="Prev">{{ __('landing.kembali') }}</button>
                                                    <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next"
                                                        type="button"
                                                        title="Next">{{ __('landing.seterusnya') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--single form panel-->
                                        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white"
                                            data-animation="FadeIn">
                                            <div class="row text-center">
                                                <div class="col-12 mx-auto">
                                                    <h5 class="font-weight-normal"><strong>C.
                                                            {{ __('landing.pengesahan_permohonan') }}</strong></h5>
                                                    <!-- <p>One thing I love about the later sunsets is the chance to go for a walk through the neighborhood woods before dinner</p> -->
                                                </div>
                                            </div>
                                            <div class="multisteps-form__content">
                                                <div class="row text-start">
                                                    <div class="p-3" fxLayout="column"
                                                        fxLayoutAlign="space-evenly stretch" style="width: 90%;">

                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="applicationStatement" name="applicationStatement"
                                                                value="Agree" onchange="check_agree()">
                                                            <label class="form-check-label"
                                                                for="applicationStatement">{{ __('landing.dengan_ini_saya_mengaku___') }}
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="modal show" id="modal-1" tabindex="-1" role="dialog"
                                                        aria-labelledby="modal-default" aria-hidden="true">
                                                        <div class="modal-dialog modal- modal-dialog-centered modal-"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h6 class="modal-title" id="modal-title-default">
                                                                        {{ __('landing.notifukasi') }}</h6>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    <p>{{ __('landing.permohonan_baharu_akan_dihantar') }}
                                                                    </p>
                                                                    <p>{{ __('landing.adakah_anda_pasti') }}</p>

                                                                </div>
                                                                <div class="modal-footer d-flex justify-content-center">
                                                                    <button type="button" class="btn btn-danger  ml-auto"
                                                                        data-bs-dismiss="modal">{{ __('landing.batal') }}</button>
                                                                    <button type="submit" class="btn btn-success ml-auto"
                                                                        name="status"
                                                                        value="HANTAR">{{ __('landing.ya') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="p-3 d-flex justify-content-center">
                                                        <a href="/permohonan" type="button"
                                                            class=" btn btn btn-danger btn-lg m-2">{{ __('landing.batal') }}</a>
                                                        <button type="submit"
                                                            class=" btn btn-info btn-lg m-2 text-uppercase" name="status"
                                                            value="SIMPAN">{{ __('landing.simpan') }}</button>
                                                        <button type="button"
                                                            class="btn btn-success btn-lg text-uppercase m-2"
                                                            data-bs-toggle="modal" data-bs-target="#modal-1" id="hantar"
                                                            disabled>{{ __('landing.hantar') }}</button>
                                                        <!-- <input type="submit" class=" btn btn-success btn-lg m-2" name="status" value="HANTAR"> -->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="button-row d-flex mt-4 col-12">
                                                        <button class="btn bg-gradient-light mb-0 js-btn-prev"
                                                            type="button"
                                                            title="Prev">{{ __('landing.kembali') }}</button>
                                                        <!-- <button class="btn bg-gradient-dark ms-auto mb-0" type="button" title="Send">Send</button> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <script src="https://demos.creative-tim.com/test/soft-ui-dashboard-pro/assets/js/plugins/multistep-form.js"
                type="text/javascript"></script>

    </div>

    <script>
        function check_agree() {
            if ($('#applicationStatement').prop("checked") == true) {
                $('#hantar').prop("disabled", false);
            } else {
                $('#hantar').prop("disabled", true);
            }
        }
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#bekerja_panel").click(function() {
                $("#maklumat_panel").hide();
                $("#institusi_kewangan").show();
            });
            $("#tidak_bekerja_panel").click(function() {
                $("#maklumat_panel").show();
                $("#institusi_kewangan").hide();
            });
        });
    </script>

    <script>
        const actualBtn = document.getElementById('actual-btn');

        const fileChosen = document.getElementById('file-chosen');

        actualBtn.addEventListener('change', function() {
            fileChosen.textContent = this.files[0].name
        })
    </script>
    <script>
        const actualBtn2 = document.getElementById('actual-btn2');

        const fileChosen2 = document.getElementById('file-chosen2');

        actualBtn2.addEventListener('change', function() {
            fileChosen2.textContent = this.files[0].name
        })
    </script>
    <script>
        const actualBtn3 = document.getElementById('actual-btn3');

        const fileChosen3 = document.getElementById('file-chosen3');

        actualBtn3.addEventListener('change', function() {
            fileChosen3.textContent = this.files[0].name
        })
    </script>


    <script>
        function clearForm() {
            document.getElementById('nama_institusi_kewangan').value = '';
            document.getElementById('no_telefon_institusi_kewangan').value = '';
        }

        function clearForm2() {
            document.getElementById('nama_panel').value = '';
            document.getElementById('no_kp_panel').value = '';
            document.getElementById('no_permit_panel').value = '';
            document.getElementById('no_telefon_panel').value = '';
        }
    </script>

@stop
