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
                        <h3 class="mt-5">Permohonan Baharu</h3>
                        <!-- <h5 class="text-secondary font-weight-normal">This information will let us know more about you.</h5> -->
                        <div class="multisteps-form mb-5">
                            <!--progress bar-->
                            <div class="row">
                                <div class="col-12 col-lg-8 mx-auto my-5">
                                    <div class="multisteps-form__progress">
                                        <button class="multisteps-form__progress-btn js-active" type="button"
                                            title="User Info">
                                            <span>A. Maklumat Permohonan</span>
                                        </button>
                                        <button class="multisteps-form__progress-btn" type="button" title="Address">
                                            <span>B. Maklumat Tambahan</span>
                                        </button>
                                        <button class="multisteps-form__progress-btn" type="button" title="Order Info">
                                            <span>C. Pengesahan Permohonan</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!--form panels-->
                            <div class="row">
                                <div class="col-12 col-lg-8 m-auto">
                                    <form id="form-mael" class="multisteps-form__form" method="POST" action="/permohonan">
                                        @csrf
                                        <!--single form panel-->
                                        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active"
                                            data-animation="FadeIn">
                                            <div class="row text-center">
                                                <div class="col-12 mx-auto">
                                                    <h5 class="font-weight-normal"><strong>A. Maklumat Permohonan</strong>
                                                    </h5>
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
                                                                    <img src="https://images.unsplash.com/photo-1537511446984-935f663eb1f4?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1920&amp;q=80"
                                                                        class="border-radius-md" width="150" height="150" />

                                                                    <input type="hidden" name="gambar_profil" value="1">
                                                                    <input type="hidden" name="jenis_permohonan"
                                                                        value="Baharu">
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2 d-flex justify-content-center flex-wrap">
                                                        <div class="col-md-8 form-group text-center"
                                                            style="outline: 1px dashed red;">
                                                            <small class="text-xs mb-3">Gambar ini akan digunakan untuk
                                                                dicetak atas kad permit. <br> Sekiranya ingin menukar, sila
                                                                ke profil untuk mengubah gambar.</small>
                                                        </div>
                                                    </div>

                                                    @foreach ($pemohon as $pemohon)

                                                        <div class="d-flex flex-wrap pb-2">
                                                            <div class="col-6 form-group p-0">
                                                                <label for="name">
                                                                    <i class="fas fa-user"></i><strong> Nama</strong>
                                                                </label>
                                                                <div class="d-flex flex-nowrap align-items-center">
                                                                    <input type="text" name="nama"
                                                                        class="form-control col-9" id="name"
                                                                        value="{{ $pemohon->name }}" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-1"></div>
                                                            <div class="col form-group pr-0">
                                                                <label for="ic"><i class="fas fa-id-card"></i><strong> No
                                                                        Kad Pengenalan</strong></label>
                                                                <input type="text" name="no_kp" class="form-control"
                                                                    readonly value="{{ $pemohon->no_kp }}">
                                                            </div>
                                                        </div>

                                                        <div class="d-flex flex-nowrap pb-2">
                                                            <div class="col-6 form-group p-0">
                                                                <label for="gender"> <i
                                                                        class="fas fa-venus-mars"></i><strong>
                                                                        Jantina</strong></label>
                                                                <!-- <input type="text" class="form-control" id="ic" aria-describedby="ic" value="userdata.no_kp" disabled> -->
                                                                <select id="gender" class="form-control" name="jantina">
                                                                    <option value="">--Sila Pilih--</option>
                                                                    <option value="Lelaki" @if ($pemohon->jantina == 'Lelaki') selected @endif>Lelaki
                                                                    </option>
                                                                    <option value="Perempuan" @if ($pemohon->jantina == 'Perempuan') selected @endif>Perempuan
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="col-1"></div>
                                                            <div class="col form-group pr-0">
                                                                <label for="age"><i class="fas fa-calendar-alt"></i><strong>
                                                                        Umur</strong></label>
                                                                <input type="text" class="form-control" id="age"
                                                                    aria-describedby="age" name="umur"
                                                                    value="{{ $pemohon->umur }}" readonly>
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
                                                                    <strong> No. Telefon</strong>
                                                                </label>
                                                                <div class="d-flex flex-nowrap align-items-center">
                                                                    <input type="text" class="form-control col-2"
                                                                        id="phone1" name="no_telefon"
                                                                        aria-describedby="phone"
                                                                        value="{{ $pemohon->no_telefon_bimbit }}">

                                                                </div>
                                                            </div>
                                                            <div class="col-1"></div>
                                                            <div class="col form-group pr-0">
                                                                <label for="email"><i class="fas fa-envelope"></i><strong>
                                                                        E-mel</strong></label>
                                                                <input type="email" name="emel" class="form-control"
                                                                    id="email" aria-describedby="email"
                                                                    value="{{ $pemohon->email }}">
                                                            </div>
                                                        </div>

                                                        <div class="d-flex flex-nowrap pb-2">
                                                            <div class="col-6 form-group p-0">
                                                                <label for="address"><i
                                                                        class="fas fa-map-marker-alt"></i><strong>
                                                                        Alamat</strong></label>
                                                                <input type="text" class="col-9 form-control" name="alamat1"
                                                                    id="address1" aria-describedby="address"
                                                                    value="{{ $pemohon->alamat1 }}">
                                                                <input type="text" class="col-9 form-control" name="alamat2"
                                                                    id="address2" aria-describedby="address"
                                                                    value="{{ $pemohon->alamat1 }}">
                                                                <input type="text" class="col-9 form-control" name="alamat3"
                                                                    id="address2" aria-describedby="address"
                                                                    value="{{ $pemohon->alamat1 }}">
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
                                                                        <strong> Poskod</strong></label>
                                                                    <input type="text" class="form-control" id="poskod"
                                                                        aria-describedby="poskod" name="poskod"
                                                                        value="{{ $pemohon->poskod }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="state"><i class="fas fa-map"></i><strong>
                                                                            Negeri</strong></label>
                                                                    <select class="form-control"
                                                                        aria-label="Default select example" name="negeri">
                                                                        <option value="">--Pilih Negeri--</option>
                                                                        <option @if ($pemohon->negeri == 'Perlis') selected @endif
                                                                            value="Perlis">Perlis</option>
                                                                        <option @if ($pemohon->negeri == 'Kedah') selected @endif
                                                                            value="Kedah">Kedah</option>
                                                                        <option @if ($pemohon->negeri == 'Pulau Pinang') selected @endif
                                                                            value="Pulau Pinang">Pulau Pinang</option>
                                                                        <option @if ($pemohon->negeri == 'Perak') selected @endif
                                                                            value="Perak">Perak</option>
                                                                        <option @if ($pemohon->negeri == 'Selangor') selected @endif
                                                                            value="Selangor">Selangor</option>
                                                                        <option @if ($pemohon->negeri == 'Melaka') selected @endif
                                                                            value="Melaka">Melaka</option>
                                                                        <option @if ($pemohon->negeri == 'Negeri Sembilan') selected @endif
                                                                            value="Negeri Sembilan">Negeri Sembilan
                                                                        </option>
                                                                        <option @if ($pemohon->negeri == 'Johor') selected @endif
                                                                            value="Johor">Johor</option>
                                                                        <option @if ($pemohon->negeri == 'Pahang') selected @endif
                                                                            value="Pahang">Pahang</option>
                                                                        <option @if ($pemohon->negeri == 'Terengganu') selected @endif
                                                                            value="Terengganu">Terengganu</option>
                                                                        <option @if ($pemohon->negeri == 'Kelantan') selected @endif
                                                                            value="Kelantan">Kelantan</option>
                                                                        <option @if ($pemohon->negeri == 'Sabah') selected @endif
                                                                            value="Sabah">Sabah</option>
                                                                        <option @if ($pemohon->negeri == 'Sarawak') selected @endif
                                                                            value="Sarawak">Sarawak</option>
                                                                        <option @if ($pemohon->negeri == 'WP Kuala Lumpur') selected @endif
                                                                            value="WP Kuala Lumpur">W. P. Kuala Lumpur
                                                                        </option>
                                                                        <option @if ($pemohon->negeri == 'WP Putrajaya') selected @endif
                                                                            value="WP Putrajaya">W. P. Putrajaya
                                                                        </option>
                                                                        <option @if ($pemohon->negeri == 'WP Labuan') selected @endif
                                                                            value="WP Labuan">W. P. Labuan</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex flex-nowrap pb-2">
                                                            <div class="col-6 form-group p-0">
                                                                <div class="form-group">
                                                                    <label for="state"><i class="fas fa-map"></i><strong>
                                                                            Negeri
                                                                            Kutipan Permit</strong></label>
                                                                    <select class="form-control"
                                                                        aria-label="Default select example"
                                                                        name="negeri_kutipan_permit">
                                                                        <option value="">--Pilih Negeri--</option>
                                                                        <option value="Perlis">Perlis</option>
                                                                        <option value="Kedah">Kedah</option>
                                                                        <option value="Pulau Pinang">Pulau Pinang</option>
                                                                        <option value="Perak">Perak</option>
                                                                        <option value="Selangor">Selangor</option>
                                                                        <option value="Melaka">Melaka</option>
                                                                        <option value="Negeri Sembilan">Negeri Sembilan
                                                                        </option>
                                                                        <option value="Johor">Johor</option>
                                                                        <option value="Pahang">Pahang</option>
                                                                        <option value="Terengganu">Terengganu</option>
                                                                        <option value="Kelantan">Kelantan</option>
                                                                        <option value="Sabah">Sabah</option>
                                                                        <option value="Sarawak">Sarawak</option>
                                                                        <option value="WP Kuala Lumpur">W. P. Kuala Lumpur
                                                                        </option>
                                                                        <option value="WP Putrajaya">W. P. Putrajaya
                                                                        </option>
                                                                        <option value="WP Labuan">W. P. Labuan</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="button-row d-flex mt-4">
                                                    <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next"
                                                        type="button" title="Next">Seterusnya</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--single form panel-->
                                        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white"
                                            data-animation="FadeIn">
                                            <div class="row text-center">
                                                <div class="col-12 mx-auto">
                                                    <h5 class="font-weight-normal"><strong>B. Maklumat Tambahan</strong>
                                                    </h5>
                                                    <!-- <p>Give us more details about you. What do you enjoy doing in your spare time?</p> -->
                                                </div>
                                            </div>
                                            <div class="multisteps-form__content p-3 text-start">
                                                <div class="row mt-4">
                                                    <div class="form-group pb-2">
                                                        <div class="col-6 form-group p-0">
                                                            <label for="occupation"><i class="fas fa-briefcase"></i><strong>
                                                                    Pekerjaan
                                                                    Sekarang</strong></label>
                                                            <input type="text" class="col-5 form-control" id="occupation"
                                                                name="pekerjaan_sekarang">
                                                        </div>
                                                    </div>

                                                    <div class="form-group pb-2">
                                                        <label for="education"><i class="fas fa-graduation-cap"></i><strong>
                                                                Tahap Pendidikan
                                                                Tertinggi</strong></label>
                                                        <!-- <input type="text" class="form-control" id="education" aria-describedby="education" placeholder=""> -->
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="tahap_pendidikan" value="Tiada">
                                                                    <label class="form-check-label">Tiada</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="tahap_pendidikan" value="Darjah 6">
                                                                    <label class="form-check-label">Darjah 6</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-check ">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="tahap_pendidikan" value="PMR">
                                                                    <label class="form-check-label">PMR</label>
                                                                </div>
                                                                <div class="form-check ">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="tahap_pendidikan" value="SPM">
                                                                    <label class="form-check-label">SPM</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-check ">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="tahap_pendidikan" value="Diploma">
                                                                    <label class="form-check-label">Diploma</label>
                                                                </div>
                                                                <div class="form-check ">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="tahap_pendidikan" value="Ijazah/Master">
                                                                    <label class="form-check-label">Ijazah/Master</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group pb-2">
                                                        <label for="education"><i class="fas fa-car"></i><strong> Lesen
                                                                Memandu Yang
                                                                Sah</strong></label>
                                                        <!-- <input type="text" class="form-control" id="education" aria-describedby="education" placeholder=""> -->
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="lesen_memandu[]" value="B2">
                                                                    <label class="form-check-label">B1</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="lesen_memandu[]" value="B2">
                                                                    <label class="form-check-label">B2</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-check ">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="lesen_memandu[]" value="D">
                                                                    <label class="form-check-label">D</label>
                                                                </div>
                                                                <div class="form-check ">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="lesen_memandu[]" value="E">
                                                                    <label class="form-check-label">E</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-check ">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="lesen_memandu[]" value="F">
                                                                    <label class="form-check-label">F</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for=""><strong>Adakah anda bekerja sebagai panel
                                                                bank/syarikat sewa beli?</strong></label>
                                                        <!-- <input type="text" class="form-control" id="state" aria-describedby="state" placeholder=""> -->


                                                        <div class="row">
                                                            <div class="row m-2">
                                                                <div class="col-3 form-check ">
                                                                    <input type="radio" name="berkerja_panel_atau_syarikat"
                                                                        id="bekerja_panel" class="form-check-input ml-3"
                                                                        value="Ya" onclick="clearForm2()">
                                                                    <label class="pl-2 form-check-label"
                                                                        for="panelInfo">Ya</label>

                                                                </div>
                                                                <div class="col-3 form-check">
                                                                    <input type="radio" name="berkerja_panel_atau_syarikat"
                                                                        id="tidak_bekerja_panel" class="form-check-input"
                                                                        value="Tidak" onclick="clearForm()">
                                                                    <label class="pl-2 form-check-label"
                                                                        for="panelInfo">Tidak</label>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <!-- //if yes appear -->
                                                            <div class="row" id="institusi_kewangan" style="display: none;">
                                                                <div class="col-5 form-group">
                                                                    <div class="form-group">
                                                                        <label for="bank" class="col-sm"><strong>Nama
                                                                                Institusi Kewangan </strong></label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text"
                                                                                class="form-control form-control-sm"
                                                                                name="nama_institusi_kewangan" id="nama_institusi_kewangan">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="col-1"></div> -->
                                                                <div class="col-5 form-group">
                                                                    <div class="form-group">
                                                                        <label for="phoneNumber" class="col-sm">
                                                                            <strong>No. Telefon Institusi Kewangan</strong>
                                                                        </label>
                                                                        <div class="col-sm-8">

                                                                            <input type="text"
                                                                                name="no_telefon_institusi_kewangan"
                                                                                id="phoneNumber"
                                                                                class="form-control form-control-sm" id="no_telefon_institusi_kewangan">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- if no appear -->
                                                            <div class="row" id="maklumat_panel" style="display: none;">
                                                                <div>
                                                                    <label class="pl-4">
                                                                        <strong>Sila nyatakan panel yang anda ikuti dan isi
                                                                            maklumat panel
                                                                            seperti
                                                                            berikut.
                                                                        </strong>
                                                                    </label>
                                                                </div>
                                                                <div class="row ">
                                                                    <div class="col-1"></div>

                                                                    <div class="form-group row pl-4">
                                                                        <div class="col-md-3">
                                                                            <label for="nama_panel">
                                                                                <strong> Nama Panel </strong>
                                                                            </label>
                                                                        </div>
                                                                        <div class="col">
                                                                            <input type="text" name="nama_panel"
                                                                                class="form-control col-10 form-control-sm"
                                                                                id="nama_panel">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row pl-4">
                                                                        <div class="col-md-3">
                                                                            <label for="no_kp_panel">
                                                                                <strong> No. Kad Pengenalan </strong>
                                                                            </label>
                                                                        </div>
                                                                        <div class="col">
                                                                            <input type="text" id="no_kp_panel"
                                                                                class="form-control form-control-sm"
                                                                                placeholder="" name="no_kp_panel">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row pl-4">
                                                                        <div class="col-md-3">
                                                                            <label for="no_permit_panel">
                                                                                <strong> No. Permit </strong>
                                                                            </label>
                                                                        </div>
                                                                        <div class="col">
                                                                            <input type="text"
                                                                                class="form-control form-control-sm"
                                                                                id="no_permit_panel" name="no_permit_panel">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row pl-4">
                                                                        <div class="col-md-3">
                                                                            <label for="no_telefon_panel">
                                                                                <strong> No. Telefon </strong> </label>
                                                                        </div>
                                                                        <div class="col">
                                                                            <input type="text"
                                                                                class="form-control form-control-sm"
                                                                                id="no_telefon_panel" name="no_telefon_panel">
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>


                                                    </div>

                                                    <div class="form-group">
                                                        <label for="activityInfo"><strong> Adakah anda tahu tentang aktiviti
                                                                pemilikan semula barangan
                                                                di bawah
                                                                Akta
                                                                Sewa Beli 1967?</strong></label>

                                                        <div class="row">
                                                            <div class="col">
                                                                <label>Skop Tugas</label>
                                                                <div class="form-group">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="skop_tugas" value="Ya">
                                                                        <label class="form-check-label">Ya</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="skop_tugas" value="Tidak">
                                                                        <label class="form-check-label"
                                                                            for="jobScope">Tidak</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col">
                                                                <label>Prosedur dan Peraturan EPS</label>
                                                                <div class="form-group">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="yes" name="prosedur_peraturan_eps"
                                                                            value="Ya">
                                                                        <label class="form-check-label"
                                                                            for="procedure">Ya</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" id="no"
                                                                            name="prosedur_peraturan_eps" value="Tidak">
                                                                        <label class="form-check-label"
                                                                            for="procedure">Tidak</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">

                                                        <div class="row form-group">
                                                            <label class="pb-2"><strong> Muat Naik Dokumen</strong></label>
                                                        </div>

                                                        <div class="form-group">

                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <label class="mt-1">Kad Pengenalan (Depan)</label>
                                                                </div>
                                                                <div class="col">
                                                                    <!-- actual upload which is hidden -->
                                                                    <input type="file" id="actual-btn" hidden
                                                                        name="salinan_kp_depan" />
                                                                    <!-- our custom upload button -->
                                                                    <label for="actual-btn" class="upload-btn mt-0">Pilih
                                                                        Fail</label>
                                                                    <!-- name of file chosen -->
                                                                    <span id="file-chosen" class="mt-1">Tiada Fail
                                                                        Dipilih</span>

                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <label class="mt-1" for="image">Kad Pengenalan
                                                                        (Belakang)</label>
                                                                </div>
                                                                <div class="col">
                                                                    <!-- actual upload which is hidden -->
                                                                    <input type="file" id="actual-btn2" hidden
                                                                        name="salinan_kp_belakang" />
                                                                    <!-- our custom upload button -->
                                                                    <label for="actual-btn2" class="upload-btn mt-0">Pilih
                                                                        Fail</label>
                                                                    <!-- name of file chosen -->
                                                                    <span id="file-chosen2" class="mt-1">Tiada Fail
                                                                        Dipilih</span>

                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <label class="mt-1" for="image">Lesen Memandu</label>
                                                                </div>
                                                                <div class="col">
                                                                    <!-- actual upload which is hidden -->
                                                                    <input type="file" id="actual-btn3" hidden
                                                                        name="salinan_lesen_memandu" />
                                                                    <!-- our custom upload button -->
                                                                    <label for="actual-btn3" class="upload-btn mt-0">Pilih
                                                                        Fail</label>
                                                                    <!-- name of file chosen -->
                                                                    <span id="file-chosen3" class="mt-1">Tiada Fail
                                                                        Dipilih</span>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="button-row d-flex mt-4">
                                                    <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button"
                                                        title="Prev">Kembali</button>
                                                    <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next"
                                                        type="button" title="Next">Seterusnya</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--single form panel-->
                                        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white"
                                            data-animation="FadeIn">
                                            <div class="row text-center">
                                                <div class="col-12 mx-auto">
                                                    <h5 class="font-weight-normal"><strong>C. Pengesahan Permohonan</strong>
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
                                                                id="applicationStatement" name="applicationStatement"
                                                                value="Agree">
                                                            <label class="form-check-label"
                                                                for="applicationStatement">Dengan ini saya mengaku dan
                                                                mengesahkan bahawa semua maklumat dan butir-butir yang
                                                                dicatatkan dalam
                                                                borang permohonan adalah benar.
                                                                Saya juga faham bahawa, jika mana-mana maklumat yang
                                                                berkaitan permohonan ini didapati tidak
                                                                benar
                                                                akan menyebabkan permohonan ini
                                                                ditolak.
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
                                                                        Notifikasi</h6>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    <p>Permohonan baharu anda akan dihantar</p>
                                                                    <p>Adakah anda pasti mahu menghantar?</p>

                                                                </div>
                                                                <div class="modal-footer d-flex justify-content-center">
                                                                    <button type="button" class="btn btn-danger  ml-auto"
                                                                        data-bs-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn btn-success ml-auto"
                                                                        name="status" value="HANTAR">Ya</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="p-3 d-flex justify-content-center">
                                                        <a href="/dashboard" type="button"
                                                            class=" btn btn btn-danger btn-lg m-2">BATAL</a>
                                                        <input type="submit" class=" btn btn-info btn-lg m-2" name="status"
                                                            value="SIMPAN" id="simpan">
                                                        <button type="button"
                                                            class="btn btn-success btn-lg text-uppercase m-2"
                                                            data-bs-toggle="modal" data-bs-target="#modal-1">HANTAR</button>
                                                        <!-- <input type="submit" class=" btn btn-success btn-lg m-2" name="status" value="HANTAR"> -->
                                                    </div>

                                                    <script>
                                                        $(document).ready(function() {
                                                            $("#simpan").click(function() {
                                                                $('#'
                                                                    applicationStatement).attr('required', true);
                                                                document.getElementById("GFG_down").innerHTML = "Required attribute enabled";
                                                            });
                                                        });
                                                    </script>
                                                </div>
                                                <div class="row">
                                                    <div class="button-row d-flex mt-4 col-12">
                                                        <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button"
                                                            title="Prev">Kembali</button>
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
    function clearForm(){
        document.getElementById('nama_institusi_kewangan').value = '';
        document.getElementById('no_telefon_institusi_kewangan').value = '';
    }

    function clearForm2(){
        document.getElementById('nama_panel').value = '';
        document.getElementById('no_kp_panel').value = '';
        document.getElementById('no_permit_panel').value = '';
        document.getElementById('no_telefon_panel').value = '';
    }
</script>

@stop
