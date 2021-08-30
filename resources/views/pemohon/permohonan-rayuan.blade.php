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
                        <h3 class="mt-5"><strong>Permohonan Rayuan</strong></h3>
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
                                    <form class="multisteps-form__form" method="POST" action="/permohonan"
                                        enctype="multipart/form-data">
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
                                                    @foreach ($pemohon as $pemohon)
                                                        <div class="row ">
                                                            <div class="col d-flex justify-content-center flex-wrap">
                                                                <label>
                                                                    <div class="position-relative">
                                                                        <img src="storage/{{ $pemohon->gambar_profil }}"
                                                                            class="border-radius-md" width="150"
                                                                            height="150" />
                                                                        <input type="hidden" name="gambar_pemohon"
                                                                            value="{{ $pemohon->gambar_profil }}">
                                                                        <input type="hidden" name="jenis_permohonan"
                                                                            value="Rayuan">
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2 d-flex justify-content-center flex-wrap">
                                                            <div class="col-md-8 form-group text-center"
                                                                style="outline: 1px dashed red;">
                                                                <small class="text-xs mb-3">Gambar ini akan digunakan untuk
                                                                    dicetak atas kad permit. <br> Sekiranya ingin menukar,
                                                                    sila
                                                                    ke profil untuk mengubah gambar.</small>
                                                            </div>
                                                        </div>



                                                        <div class="d-flex flex-nowrap pb-2">
                                                            <div class="col-6 form-group p-0 text-start">
                                                                <label for="name">
                                                                    <i class="fas fa-user"></i><strong> Nama</strong>
                                                                </label>
                                                                <div class="d-flex flex-nowrap align-items-center">
                                                                    <input type="text" class="form-control col-9"
                                                                        value="{{ $pemohon->name }}" name="nama" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-1"></div>

                                                            <div class="col form-group pr-0 text-start">
                                                                <label for="noPermit"><i class="fas fa-id-card"></i><strong>
                                                                        No. Permit</strong></label>
                                                                <input type="text" class="form-control" value="{{ $pemohon->no_permit }}"
                                                                    name="no_permit" readonly>
                                                            </div>

                                                        </div>

                                                        <div class="d-flex flex-nowrap pb-2 text-start">
                                                            <div class="col-6 form-group p-0">
                                                                <label for="gender"> <i
                                                                        class="fas fa-venus-mars"></i><strong>
                                                                        Jantina</strong></label>
                                                                <input type="text" class="form-control" name="jantina"
                                                                    value="{{ $pemohon->jantina }}" readonly>

                                                            </div>
                                                            <div class="col-1"></div>
                                                            <div class="col form-group pr-0 text-start">
                                                                <label for="ic"><i class="fas fa-id-card"></i><strong> No
                                                                        Kad Pengenalan</strong></label>
                                                                <input type="text" class="form-control" id="ic"
                                                                    aria-describedby="ic" name="no_kp" readonly
                                                                    value="{{ $pemohon->no_kp }}">
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
                                                                    <strong> No. Telefon</strong>
                                                                </label>
                                                                <div class="d-flex flex-nowrap align-items-center">
                                                                    <input type="text" class="form-control col-2"
                                                                        id="phone1" aria-describedby="phone"
                                                                        name="no_telefon"
                                                                        value="{{ $pemohon->no_telefon_bimbit }}">

                                                                </div>
                                                            </div>
                                                            <div class="col-1"></div>
                                                            <div class="col form-group pr-0">
                                                                <label for="age"><i class="fas fa-calendar-alt"></i><strong>
                                                                        Umur</strong></label>
                                                                <input type="text" class="form-control" id="age"
                                                                    aria-describedby="age" name="umur" readonly
                                                                    value="{{ $pemohon->umur }}">
                                                            </div>
                                                        </div>

                                                        <div class="d-flex flex-nowrap pb-2 text-start">
                                                            <div class="col-6 form-group p-0">
                                                                <label for="address"><i
                                                                        class="fas fa-map-marker-alt"></i><strong>
                                                                        Alamat</strong></label>
                                                                <input type="text" class="col-9 form-control" name="alamat1"
                                                                    value="{{ $pemohon->alamat1 }}"
                                                                    aria-describedby="address">
                                                                <input type="text" class="col-9 form-control" name="alamat2"
                                                                    value="{{ $pemohon->alamat2 }}"
                                                                    aria-describedby="address">
                                                                <input type="text" class="col-9 form-control" name="alamat3"
                                                                    value="{{ $pemohon->alamat3 }}"
                                                                    aria-describedby="address">
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

                                                        <div class="d-flex flex-nowrap pb-2 text-start">
                                                            <div class="col-6 form-group p-0">
                                                                <label for="state"><i class="fas fa-map"></i><strong> Negeri
                                                                        Kutipan Permit</strong></label>
                                                                <select class="form-control"
                                                                    aria-label="Default select example"
                                                                    name="negeri_kutipan_permit">
                                                                    <option selected>--Pilih Negeri--</option>
                                                                    <option value="Perlis">Perlis</option>
                                                                    <option value="Kedah">Kedah</option>
                                                                    <option value="Pulau Pinang">Pulau Pinang</option>
                                                                    <option value="Perak">Perak</option>
                                                                    <option value="Selangor">Selangor</option>
                                                                    <option value="Melaka">Melaka</option>
                                                                    <option value="Negeri Sembilan">Negeri Sembilan</option>
                                                                    <option value="Johor">Johor</option>
                                                                    <option value="Pahang">Pahang</option>
                                                                    <option value="Terengganu">Terengganu</option>
                                                                    <option value="Kelantan">Kelantan</option>
                                                                    <option value="Sabah">Sabah</option>
                                                                    <option value="Sarawak">Sarawak</option>
                                                                    <option value="WP Kuala Lumpur">W. P. Kuala Lumpur
                                                                    </option>
                                                                    <option value="WP Putrajaya">W. P. Putrajaya</option>
                                                                    <option value="WP Labuan">W. P. Labuan</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-1"></div>
                                                            <div class="col form-group pr-0">
                                                                <label for="email"><i class="fas fa-envelope"></i><strong>
                                                                        E-mel</strong></label>
                                                                <input type="email" name="emel" class="form-control"
                                                                    value="{{ $pemohon->email }}">
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
                                            <div class="multisteps-form__content">
                                                <div class="row mt-4">
                                                    <div class="form-group pb-2 pt-4 text-start">
                                                        <label for="resonTolose"><strong> Sebab Permohonan
                                                                Ditolak</strong></label>
                                                        <!-- <input type="text" class="form-control" id="education" aria-describedby="education" placeholder=""> -->
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="gagal_tapisan" name="sebab_permohonan_ditolak"
                                                                        value="Gagal tapisan">
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox1">Gagal tapisan
                                                                        keselamatan</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="tiada_surat_sokongan"
                                                                        name="sebab_permohonan_ditolak"
                                                                        value="Tiada surat sokongan">
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox1">Tiada surat sokongan</label>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-check ">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="lain_lain" name="sebab_permohonan_ditolak"
                                                                        value="Sebab-sebab Lain">
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox1">Sebab-sebab Lain</label>
                                                                    <br>
                                                                    <div id="sebab_lain_box" style="display: none;">
                                                                        <label for="other_reason">Sila Nyatakan </label>
                                                                        <input type="text" class="form-control col-6"
                                                                            name="sebab_lain" id="sebab_lain" />
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
                                                        <label for="resonTolose"><strong> Permohonan Rayuan Kali
                                                                Ke</strong></label>
                                                        <!-- <input type="text" class="form-control" id="education" aria-describedby="education" placeholder=""> -->
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="inlineCheckbox2" name="rayuan_kali_ke"
                                                                        value="1">
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox1">1</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="inlineCheckbox3" name="rayuan_kali_ke"
                                                                        value="2">
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox1">2</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-check ">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="inlineCheckbox4" name="rayuan_kali_ke"
                                                                        value="3">
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox1">3</label>
                                                                </div>
                                                                <div class="form-check ">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="inlineCheckbox5" name="rayuan_kali_ke"
                                                                        value="4">
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox1">4</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="form-check ">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="inlineCheckbox6" name="rayuan_kali_ke"
                                                                        value="5">
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox1">5</label>
                                                                </div>
                                                                <div class="form-check ">
                                                                    <input class="form-check-input" type="radio"
                                                                        id="inlineCheckbox7" name="rayuan_kali_ke"
                                                                        value="6">
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox1">Lebih daripada 5</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group text-start">
                                                        <label for="alasanRayuan"> <strong> Alasan Rayuan
                                                                Dikemukakan</strong></label>
                                                        <textarea class="form-control col-7" id="alasanRayuan"
                                                            aria-describedby="alasanRayuan" name="alasan_rayuan"
                                                            rows="3"></textarea>
                                                    </div>

                                                    <div class="form-group text-start">

                                                        <div class="row form-group">
                                                            <label class="pb-2"><strong> Muat Naik Dokumen</strong></label>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-3">
                                                                <label class="mt-1">Kad Pengenalan (Depan)</label>
                                                            </div>
                                                            <div class="col">
                                                                <!-- actual upload which is hidden -->
                                                                <input type="file" id="actual-btn" hidden name="kp_depan" />
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
                                                                <label class="col mt-1" for="image"> Surat Tapisan Rekod
                                                                    Jenayah daripada PDRM Bukit Aman</label>
                                                            </div>
                                                            <div class="col">
                                                                <!-- actual upload which is hidden -->
                                                                <input type="file" id="actual-btn3" hidden
                                                                    name="salinan_tapisan_rekod_jenayah" />
                                                                <!-- our custom upload button -->
                                                                <label for="actual-btn3" class="upload-btn mt-0">Pilih
                                                                    Fail</label>
                                                                <!-- name of file chosen -->
                                                                <span id="file-chosen3" class="mt-1">Tiada Fail
                                                                    Dipilih</span>
                                                                <br>

                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-3">
                                                                <label class="col mt-1" for="image"> Surat Sokongan daripada
                                                                    Institusi Kewangan</label>
                                                            </div>
                                                            <div class="col">
                                                                <!-- actual upload which is hidden -->
                                                                <input type="file" id="actual-btn4" hidden
                                                                    name="salinan_sokongan_institusi_kewangan" />
                                                                <!-- our custom upload button -->
                                                                <label for="actual-btn4" class="upload-btn mt-0">Pilih
                                                                    Fail</label>
                                                                <!-- name of file chosen -->
                                                                <span id="file-chosen4" class="mt-1">Tiada Fail
                                                                    Dipilih</span>
                                                                <br>

                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-3">
                                                                <label class="col mt-1" for="image">Dokumen Sokongan Lain 1
                                                                    (jika ada)</label>
                                                            </div>
                                                            <div class="col">
                                                                <!-- actual upload which is hidden -->
                                                                <input type="file" id="actual-btn5" hidden
                                                                    name="salinan_dokumen_sokongan1" />
                                                                <!-- our custom upload button -->
                                                                <label for="actual-btn5" class="upload-btn mt-0">Pilih
                                                                    Fail</label>
                                                                <!-- name of file chosen -->
                                                                <span id="file-chosen5" class="mt-1">Tiada Fail
                                                                    Dipilih</span>
                                                                <br>

                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-3">
                                                                <label class="col mt-1" for="image">Dokumen Sokongan Lain 2
                                                                    (jika ada)</label>
                                                            </div>
                                                            <div class="col">
                                                                <!-- actual upload which is hidden -->
                                                                <input type="file" id="actual-btn6" hidden
                                                                    name="salinan_dokumen_sokongan2" />
                                                                <!-- our custom upload button -->
                                                                <label for="actual-btn6" class="upload-btn mt-0">Pilih
                                                                    Fail</label>
                                                                <!-- name of file chosen -->
                                                                <span id="file-chosen6" class="mt-1">Tiada Fail
                                                                    Dipilih</span>
                                                                <br>

                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-3">
                                                                <label class="col mt-1" for="image">Dokumen Sokongan Lain 3
                                                                    (jika ada)</label>
                                                            </div>
                                                            <div class="col">
                                                                <!-- actual upload which is hidden -->
                                                                <input type="file" id="actual-btn7" hidden
                                                                    name="salinan_dokumen_sokongan3" />
                                                                <!-- our custom upload button -->
                                                                <label for="actual-btn7" class="upload-btn mt-0">Pilih
                                                                    Fail</label>
                                                                <!-- name of file chosen -->
                                                                <span id="file-chosen7" class="mt-1">Tiada Fail
                                                                    Dipilih</span>
                                                                <br>

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
                                                                value="Agree" onchange="check_agree()">
                                                            <label class="form-check-label text-justify"
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
                                                                    <p>Permohonan rayuan anda akan dihantar</p>
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
                                                        <a href="dashboard" type="button"
                                                            class=" btn btn btn-danger btn-lg m-2">BATAL</a>
                                                        <input type="submit" class=" btn btn-info btn-lg m-2" name="status"
                                                            value="SIMPAN">
                                                        <button type="button"
                                                            class="btn btn-success btn-lg text-uppercase m-2"
                                                            data-bs-toggle="modal" data-bs-target="#modal-1" id="hantar"
                                                            disabled>HANTAR</button>
                                                        <!-- <input type="submit" class=" btn btn-success btn-lg m-2" name="status" value="HANTAR"> -->
                                                    </div>


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
