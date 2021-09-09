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

    <div class="docs ">
        <div class="ct-docs-main-container">

            <main class="ct-docs-content-col" role="main">

                <div class="row">
                    <div class="col-12 text-center">
                        <h3 class="mt-5"><strong>{{ __('landing.permohonan_rayuan') }}</strong></h3>
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
                                    <form class="multisteps-form__form" method="POST" action="/permohonan/{{ $permohonan->id }}">
                                        @csrf
                                        @method('PUT')
                                        <!--single form panel-->
                                        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active"
                                            data-animation="FadeIn">
                                            <div class="row text-center">
                                                <div class="col-12 mx-auto">
                                                    <h5 class="font-weight-normal"><strong>A. {{ __('landing.maklumat_permohonan') }}</strong>
                                                    </h5>
                                                    <!-- <p>Let us know your name and email address. Use an address you don't mind other users contacting you at</p> -->
                                                </div>
                                            </div>
                                            <div class="multisteps-form__content">
                                                @if ($errors->any())
                                                    <div class="alert alert-warning text-sm text-start">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                <div class="row mt-3">
                                                    <div class="row ">
                                                        <div class="col d-flex justify-content-center flex-wrap">
                                                            <label>
                                                                <div class="position-relative">
                                                                    <img src="/storage/{{ $permohonan->gambar_pemohon}}"
                                                                        class="border-radius-md" width="150"
                                                                        height="150" />
                                                                    {{-- <input type="hidden" name="gambar_pemohon" value="{{ $pemohon->gambar_profil}}"> --}}
                                                                    <input type="hidden" name="jenis_permohonan"
                                                                        value="Baharu">
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2 d-flex justify-content-center flex-wrap">
                                                        <div class="col-md-8 form-group text-center"
                                                            style="outline: 1px dashed red;">
                                                            <small class="text-xs mb-3">{{ __('landing.gamabr_ini_akan___') }} <br> {{ __('landing.sekiranya_ingin_menukar___') }}</small>
                                                        </div>
                                                    </div>



                                                    <div class="d-flex flex-nowrap pb-2">
                                                        <div class="col-6 form-group p-0 text-start">
                                                            <label for="name">
                                                                <i class="fas fa-user"></i><strong> {{ __('landing.nama') }}</strong>
                                                            </label>
                                                            <div class="d-flex flex-nowrap align-items-center">
                                                                <input type="text" class="form-control col-9"
                                                                    value="{{ $permohonan->nama }}" name="nama" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-1"></div>

                                                        <div class="col form-group pr-0 text-start">
                                                            <label for="noPermit"><i class="fas fa-id-card"></i><strong>
                                                                {{ __('landing.no_permit') }}</strong></label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $permohonan->no_permit }}" name="no_permit"
                                                                readonly>
                                                        </div>

                                                    </div>

                                                    <div class="d-flex flex-nowrap pb-2 text-start">
                                                        <div class="col-6 form-group p-0">
                                                            <label for="gender"> <i class="fas fa-venus-mars"></i><strong>
                                                                {{ __('landing.jantina') }}</strong></label>
                                                            <input type="text" class="form-control" name="jantina"
                                                                value="{{ $permohonan->jantina }}" readonly>

                                                        </div>
                                                        <div class="col-1"></div>
                                                        <div class="col form-group pr-0 text-start">
                                                            <label for="ic"><i class="fas fa-id-card"></i><strong> {{ __('landing.no_kp') }}</strong></label>
                                                            <input type="text" class="form-control" id="ic"
                                                                aria-describedby="ic" name="no_kp" readonly
                                                                value="{{ $permohonan->no_kp }}">
                                                        </div>

                                                    </div>

                                                    <div class="d-flex flex-nowrap pb-2 text-start">
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
                                                                    aria-describedby="phone" name="no_telefon"
                                                                    value="{{ $permohonan->no_telefon }}">

                                                            </div>
                                                        </div>
                                                        <div class="col-1"></div>
                                                        <div class="col form-group pr-0">
                                                            <label for="age"><i class="fas fa-calendar-alt"></i><strong>
                                                                {{ __('landing.umur') }}</strong></label>
                                                            <input type="text" class="form-control" id="age"
                                                                aria-describedby="age" name="umur"
                                                                value="{{ $permohonan->umur }}" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex flex-nowrap pb-2 text-start">
                                                        <div class="col-6 form-group p-0">
                                                            <label for="address"><i
                                                                    class="fas fa-map-marker-alt"></i><strong>
                                                                        {{ __('landing.alamat') }}</strong></label>
                                                            <input type="text" class="col-9 form-control" name="alamat1"
                                                                aria-describedby="address"
                                                                value="{{ $permohonan->alamat1 }}">
                                                            <input type="text" class="col-9 form-control" name="alamat2"
                                                                aria-describedby="address"
                                                                value="{{ $permohonan->alamat2 }}">
                                                            <input type="text" class="col-9 form-control" name="alamat3"
                                                                aria-describedby="address"
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
                                                                    <option disabled value="">--{{ __('landing.pilih_negeri') }}--</option>
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

                                                    <div class="d-flex flex-nowrap pb-2 text-start">
                                                        <div class="col-6 form-group p-0">
                                                            <label for="state"><i class="fas fa-map"></i><strong> {{ __('landing.negeri_kutipan_permit') }}</strong></label>
                                                            <select class="form-control" aria-label="Default select example"
                                                                name="negeri_kutipan_permit">
                                                                <option disabled value="">--{{ __('landing.pilih_negeri') }}--</option>
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
                                                        <div class="col-1"></div>
                                                        <div class="col form-group pr-0">
                                                            <label for="email"><i class="fas fa-envelope"></i><strong>
                                                                {{ __('landing.emel') }}</strong></label>
                                                            <input type="email" name="emel" class="form-control"
                                                                value="{{ $permohonan->emel }}">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="button-row d-flex mt-4">
                                                    <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next"
                                                        type="button" title="Next">{{ __('landing.seterusnya') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--single form panel-->
                                        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white"
                                            data-animation="FadeIn">
                                            <div class="row text-center">
                                                <div class="col-12 mx-auto">
                                                    <h5 class="font-weight-normal"><strong>B. {{ __('landing.maklumat_tambahan') }}</strong>
                                                    </h5>
                                                    <!-- <p>Give us more details about you. What do you enjoy doing in your spare time?</p> -->
                                                </div>
                                            </div>
                                            <div class="multisteps-form__content">
                                                <div class="row mt-4">
                                                    <div class="form-group pb-2 pt-4 text-start">
                                                        <label for="resonTolose"><strong> {{ __('landing.sebab_permohonan_ditolak') }}</strong></label>
                                                        <!-- <input type="text" class="form-control" id="education" aria-describedby="education" placeholder=""> -->
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="gagal_tapisan" name="sebab_permohonan_ditolak"
                                                                        value="Gagal tapisan"
                                                                        {{ $permohonan->sebab_permohonan_ditolak == 'Gagal tapisan' ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox1">{{ __('landing.gagal_tapisan') }}</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="tiada_surat_sokongan"
                                                                        name="sebab_permohonan_ditolak"
                                                                        value="Tiada surat sokongan"
                                                                        {{ $permohonan->sebab_permohonan_ditolak == 'Tiada surat sokongan' ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox1">{{ __('landing.tiada_surat_sokongan') }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-check ">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="lain_lain" name="sebab_permohonan_ditolak"
                                                                        value="Sebab-sebab Lain"
                                                                        {{ $permohonan->sebab_permohonan_ditolak == 'Sebab-sebab Lain' ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox1">{{ __('landing.sebab_lain') }}</label>
                                                                    <br>
                                                                    <div id="sebab_lain_box" @if ($permohonan->sebab_permohonan_ditolak != 'Sebab-sebab Lain') style="display: none;" @endif>
                                                                        <label for="other_reason">{{ __('landing.Sila_Nyatakan') }} </label>
                                                                        <input type="text" class="form-control col-6"
                                                                            name="sebab_lain" id="sebab_lain"
                                                                            value="{{ $permohonan->sebab_lain }}" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                                    <script>
                                                        $(document).ready(function() {
                                                            $("#lain_lain").click(function() {
                                                                $("#sebab_lain_box").show();
                                                            });
                                                            $("#tiada_surat_sokongan").click(function() {
                                                                $("#sebab_lain_box").hide();
                                                                document.getElementById('sebab_lain').value = '';
                                                            });
                                                            $("#gagal_tapisan").click(function() {
                                                                $("#sebab_lain_box").hide();
                                                                document.getElementById('sebab_lain').value = '';
                                                            });
                                                        });
                                                    </script>

                                                    <div class="form-group text-start">
                                                        <label for="resonTolose"><strong> {{ __('landing.permohonan_rayuan_kali_ke') }}</strong></label>
                                                        <!-- <input type="text" class="form-control" id="education" aria-describedby="education" placeholder=""> -->
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="inlineCheckbox2" name="rayuan_kali_ke" value="1"
                                                                        {{ $permohonan->rayuan_kali_ke == '1' ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox1">1</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="inlineCheckbox3" name="rayuan_kali_ke" value="2"
                                                                        {{ $permohonan->rayuan_kali_ke == '2' ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox1">2</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-check ">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="inlineCheckbox4" name="rayuan_kali_ke" value="3"
                                                                        {{ $permohonan->rayuan_kali_ke == '3' ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox1">3</label>
                                                                </div>
                                                                <div class="form-check ">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="inlineCheckbox5" name="rayuan_kali_ke" value="4"
                                                                        {{ $permohonan->rayuan_kali_ke == '4' ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox1">4</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-check ">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="inlineCheckbox6" name="rayuan_kali_ke" value="5"
                                                                        {{ $permohonan->rayuan_kali_ke == '5' ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox1">5</label>
                                                                </div>
                                                                <div class="form-check ">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="inlineCheckbox7" name="rayuan_kali_ke" value="6"
                                                                        {{ $permohonan->rayuan_kali_ke == '6' ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox1">{{ __('landing.lebih_daripada_5') }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group text-start">
                                                        <label for="alasanRayuan"> <strong> {{ __('landing.alasan_rayuan') }}</strong></label>
                                                        <textarea class="form-control col-7" id="alasanRayuan"
                                                            aria-describedby="alasanRayuan" name="alasan_rayuan"
                                                            rows="3">{{ $permohonan->alasan_rayuan }}</textarea>
                                                    </div>

                                                    <div class="form-group text-start">

                                                        <div class="row form-group">
                                                            <label class="pb-2"><strong> {{ __('landing.muat_naik_dokumen') }}</strong></label>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-3">
                                                                <label class="mt-1">{{ __('landing.ic_depan') }}</label>
                                                            </div>
                                                            <div class="col">
                                                                <!-- actual upload which is hidden -->
                                                                <input type="file" id="actual-btn" hidden
                                                                    name="salinan_kp_depan" />
                                                                <!-- our custom upload button -->
                                                                <label for="actual-btn" class="upload-btn mt-0">{{ __('landing.pilih_fail') }}</label>
                                                                <!-- name of file chosen -->
                                                                <span id="file-chosen" class="mt-1"><a
                                                                    href="/storage/{{ $permohonan->salinan_kp_depan }}"
                                                                    target="_blank">{{ $permohonan->salinan_kp_depan }}</a></span>

                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-3">
                                                                <label class="mt-1" for="image">{{ __('landing.ic_belakang') }}</label>
                                                            </div>
                                                            <div class="col">
                                                                <!-- actual upload which is hidden -->
                                                                <input type="file" id="actual-btn2" hidden
                                                                    name="salinan_kp_belakang" />
                                                                <!-- our custom upload button -->
                                                                <label for="actual-btn2" class="upload-btn mt-0">{{ __('landing.pilih_fail') }}</label>
                                                                <!-- name of file chosen -->
                                                                <span id="file-chosen" class="mt-1"><a
                                                                    href="/storage/{{ $permohonan->salinan_kp_belakang }}"
                                                                    target="_blank">{{ $permohonan->salinan_kp_belakang }}</a></span>

                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-3">
                                                                <label class="col mt-1" for="image"> {{ __('landing.surat_tapisan_rekod_jenayah') }}</label>
                                                            </div>
                                                            <div class="col">
                                                                <!-- actual upload which is hidden -->
                                                                <input type="file" id="actual-btn3" hidden
                                                                    name="salinan_tapisan_rekod_jenayah" />
                                                                <!-- our custom upload button -->
                                                                <label for="actual-btn3" class="upload-btn mt-0">{{ __('landing.pilih_fail') }}</label>
                                                                <!-- name of file chosen -->
                                                                <span id="file-chosen" class="mt-1"><a
                                                                    href="/storage/{{ $permohonan->salinan_tapisan_rekod_jenayah }}"
                                                                    target="_blank">{{ $permohonan->salinan_tapisan_rekod_jenayah }}</a></span>
                                                                <br>

                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-3">
                                                                <label class="col mt-1" for="image"> {{ __('landing.surat_sokongan_daripada_institusi_kewangan') }}</label>
                                                            </div>
                                                            <div class="col">
                                                                <!-- actual upload which is hidden -->
                                                                <input type="file" id="actual-btn4" hidden
                                                                    name="salinan_sokongan_institusi_kewangan" />
                                                                <!-- our custom upload button -->
                                                                <label for="actual-btn4" class="upload-btn mt-0"> {{ __('landing.pilih_fail') }}</label>
                                                                <!-- name of file chosen -->
                                                                <span id="file-chosen" class="mt-1"><a
                                                                    href="/storage/{{ $permohonan->salinan_sokongan_institusi_kewangan }}"
                                                                    target="_blank">{{ $permohonan->salinan_sokongan_institusi_kewangan }}</a></span>
                                                                <br>

                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-3">
                                                                <label class="col mt-1" for="image">{{ __('landing.dokumen_sokongan_1') }}</label>
                                                            </div>
                                                            <div class="col">
                                                                <!-- actual upload which is hidden -->
                                                                <input type="file" id="actual-btn5" hidden
                                                                    name="salinan_dokumen_sokongan1" />
                                                                <!-- our custom upload button -->
                                                                <label for="actual-btn5" class="upload-btn mt-0">{{ __('landing.pilih_fail') }}</label>
                                                                <!-- name of file chosen -->
                                                                <span id="file-chosen" class="mt-1"><a
                                                                    href="/storage/{{ $permohonan->salinan_dokumen_sokongan1 }}"
                                                                    target="_blank">{{ $permohonan->salinan_dokumen_sokongan1 }}</a></span>
                                                                <br>

                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-3">
                                                                <label class="col mt-1" for="image">{{ __('landing.dokumen_sokongan_2') }}</label>
                                                            </div>
                                                            <div class="col">
                                                                <!-- actual upload which is hidden -->
                                                                <input type="file" id="actual-btn6" hidden
                                                                    name="salinan_dokumen_sokongan2" />
                                                                <!-- our custom upload button -->
                                                                <label for="actual-btn6" class="upload-btn mt-0">{{ __('landing.pilih_fail') }}</label>
                                                                <!-- name of file chosen -->
                                                                <span id="file-chosen" class="mt-1"><a
                                                                    href="/storage/{{ $permohonan->salinan_dokumen_sokongan2 }}"
                                                                    target="_blank">{{ $permohonan->salinan_dokumen_sokongan2 }}</a></span>
                                                                <br>

                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-3">
                                                                <label class="col mt-1" for="image">{{ __('landing.dokumen_sokongan_3') }}</label>
                                                            </div>
                                                            <div class="col">
                                                                <!-- actual upload which is hidden -->
                                                                <input type="file" id="actual-btn7" hidden
                                                                    name="salinan_dokumen_sokongan3" />
                                                                <!-- our custom upload button -->
                                                                <label for="actual-btn7" class="upload-btn mt-0">{{ __('landing.pilih_fail') }}</label>
                                                                <!-- name of file chosen -->
                                                                <span id="file-chosen" class="mt-1"><a
                                                                    href="/storage/{{ $permohonan->salinan_dokumen_sokongan3 }}"
                                                                    target="_blank">{{ $permohonan->salinan_dokumen_sokongan3 }}</a></span>
                                                                <br>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="button-row d-flex mt-4">
                                                    <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button"
                                                        title="Prev">{{ __('landing.kembali') }}</button>
                                                    <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next"
                                                        type="button" title="Next">{{ __('landing.seterusnya') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--single form panel-->
                                        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white"
                                            data-animation="FadeIn">
                                            <div class="row text-center">
                                                <div class="col-12 mx-auto">
                                                    <h5 class="font-weight-normal"><strong>C. {{ __('landing.pengesahan_permohonan') }}</strong>
                                                    </h5>
                                                    <!-- <p>One thing I love about the later sunsets is the chance to go for a walk through the neighborhood woods before dinner</p> -->
                                                </div>
                                            </div>
                                            <div class="multisteps-form__content">
                                                <div class="row text-start">
                                                    <div class="p-3" fxLayout="column" fxLayoutAlign="space-evenly stretch"
                                                        style="width: 90%;">

                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                (click)="toggleAg()" id="applicationStatement"
                                                                name="applicationStatement" value="Agree" onchange="check_agree()">
                                                            <label class="form-check-label text-justify"
                                                                for="applicationStatement">{{ __('landing.dengan_ini_saya_mengaku___') }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" id="modal-1" tabindex="-1" role="dialog"
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
                                                                    <p>{{ __('landing.permohonan_rayuan_akan_dihantar') }}</p>
                                                                    <p>{{ __('landing.adakah_anda_pasti') }}</p>
                                                                </div>
                                                                <div class="modal-footer d-flex justify-content-center">
                                                                    <button type="button" class="btn btn-danger  ml-auto"
                                                                        data-bs-dismiss="modal">{{ __('landing.batal') }}</button>
                                                                    <button type="submit" class="btn btn-success ml-auto"
                                                                        name="status" value="HANTAR">{{ __('landing.ya') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="p-3 d-flex justify-content-center">
                                                        <a href="/permohonan" type="button"
                                                            class=" btn btn btn-danger btn-lg m-2 text-uppercase">{{ __('landing.batal') }}</a>
                                                        <button type="submit" class=" btn btn-info btn-lg m-2 text-uppercase" name="status"
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
                                                        <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button"
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
        const actualBtn4 = document.getElementById('actual-btn4');
        const fileChosen4 = document.getElementById('file-chosen4');

        actualBtn4.addEventListener('change', function() {
            fileChosen4.textContent = this.files[0].name
        })
    </script>

    <script>
        const actualBtn5 = document.getElementById('actual-btn5');
        const fileChosen5 = document.getElementById('file-chosen5');

        actualBtn5.addEventListener('change', function() {
            fileChosen5.textContent = this.files[0].name
        })
    </script>

    <script>
        const actualBtn6 = document.getElementById('actual-btn6');
        const fileChosen6 = document.getElementById('file-chosen6');

        actualBtn6.addEventListener('change', function() {
            fileChosen6.textContent = this.files[0].name
        })
    </script>

    <script>
        const actualBtn7 = document.getElementById('actual-btn7');
        const fileChosen7 = document.getElementById('file-chosen7');

        actualBtn7.addEventListener('change', function() {
            fileChosen7.textContent = this.files[0].name
        })
    </script>




@stop
