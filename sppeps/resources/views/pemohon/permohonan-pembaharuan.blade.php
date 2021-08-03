@extends('layouts.base-pemohon')

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

<div class=" ">


    <div class="ct-docs-main-container">

        <main class="ct-docs-content-col" role="main">

            <div class="row">
                <div class="col-12 text-center">
                    <h3 class="mt-5">Permohonan Pembaharuan</h3>
                    <!-- <h5 class="text-secondary font-weight-normal">This information will let us know more about you.</h5> -->
                    <div class="multisteps-form mb-5">
                        <!--progress bar-->
                        <div class="row">
                            <div class="col-12 col-lg-8 mx-auto my-5">
                                <div class="multisteps-form__progress">
                                    <button class="multisteps-form__progress-btn js-active" type="button" title="User Info">
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
                                <form class="multisteps-form__form" method="POST" action="/permohonan">
                                    @csrf
                                    <!--single form panel-->
                                    <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                                        <div class="row text-center">
                                            <div class="col-12 mx-auto">
                                                <h5 class="font-weight-normal"><strong>A. Maklumat Permohonan</strong></h5>
                                                <!-- <p>Let us know your name and email address. Use an address you don't mind other users contacting you at</p> -->
                                            </div>
                                        </div>
                                        <div class="multisteps-form__content">
                                            <div class="row mt-3">

                                                <div class="row ">
                                                    <div class="col d-flex justify-content-center flex-wrap">
                                                        <label>
                                                            <div class="position-relative">
                                                                <img src="https://images.unsplash.com/photo-1537511446984-935f663eb1f4?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1920&amp;q=80" class="border-radius-md" width="150" height="150" />

                                                                <input type="hidden" name="gambar_profil" value="1">
                                                                <input type="hidden" name="jenis_permohonan" value="Pembaharuan">
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row mt-2 d-flex justify-content-center flex-wrap">
                                                    <div class="col-md-8 form-group text-center" style="outline: 1px dashed red;">
                                                        <small class="text-xs mb-3">Gambar ini akan digunakan untuk dicetak atas kad permit. <br> Sekiranya ingin menukar, sila ke profil untuk mengubah gambar.</small>
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-nowrap pb-2">
                                                    <div class="col-6 form-group p-0 text-start">
                                                        <label for="name">
                                                            <i class="fas fa-user"></i><strong> Nama</strong>
                                                        </label>
                                                        <div class="d-flex flex-nowrap align-items-center">
                                                            <input type="text" class="form-control col-9" id="name" aria-describedby="name" name="nama" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-1"></div>

                                                    <div class="col form-group pr-0 text-start">
                                                        <label for="noPermit"><i class="fas fa-id-card"></i><strong> No. Permit</strong></label>
                                                        <input type="text" class="form-control" value="10523" name="no_permit" disabled>
                                                    </div>

                                                </div>

                                                <div class="d-flex flex-nowrap pb-2 text-start">
                                                    <div class="col-6 form-group p-0">
                                                        <label for="gender"> <i class="fas fa-venus-mars"></i><strong> Jantina</strong></label>
                                                        <input type="text" class="form-control" name="jantina" disabled>

                                                    </div>
                                                    <div class="col-1"></div>
                                                    <div class="col form-group pr-0 text-start">
                                                        <label for="ic"><i class="fas fa-id-card"></i><strong> No Kad Pengenalan</strong></label>
                                                        <input type="text" class="form-control" id="ic" aria-describedby="ic" name="no_kp" disabled>
                                                    </div>

                                                </div>

                                                <div class="d-flex flex-nowrap pb-2 text-start">
                                                    <div class="col-6 form-group p-0">
                                                        <label for="phone">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                                            </svg>
                                                            <strong> No. Telefon</strong>
                                                        </label>
                                                        <div class="d-flex flex-nowrap align-items-center">
                                                            <input type="text" class="form-control col-2" id="phone1" aria-describedby="phone" name="no_telefon">

                                                        </div>
                                                    </div>
                                                    <div class="col-1"></div>
                                                    <div class="col form-group pr-0">
                                                        <label for="age"><i class="fas fa-calendar-alt"></i><strong> Umur</strong></label>
                                                        <input type="text" class="form-control" id="age" aria-describedby="age" name="umur" disabled>
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-nowrap pb-2 text-start">
                                                    <div class="col-6 form-group p-0">
                                                        <label for="address"><i class="fas fa-map-marker-alt"></i><strong> Alamat</strong></label>
                                                        <input type="text" class="col-9 form-control" name="alamat1" aria-describedby="address">
                                                        <input type="text" class="col-9 form-control" name="alamat2" aria-describedby="address">
                                                        <input type="text" class="col-9 form-control" name="alamat3" aria-describedby="address">
                                                    </div>
                                                    <div class="col-1"></div>
                                                    <div class="col pr-0">
                                                        <div class="form-group">
                                                            <label for="email">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-signpost-fill" viewBox="0 0 16 16">
                                                                    <path d="M7.293.707A1 1 0 0 0 7 1.414V4H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h5v6h2v-6h3.532a1 1 0 0 0 .768-.36l1.933-2.32a.5.5 0 0 0 0-.64L13.3 4.36a1 1 0 0 0-.768-.36H9V1.414A1 1 0 0 0 7.293.707z" />
                                                                </svg>
                                                                <strong> Poskod</strong></label>
                                                            <input type="text" class="form-control" id="poskod" aria-describedby="poskod" name="poskod">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="state"><i class="fas fa-map"></i><strong> Negeri</strong></label>
                                                            <select class="form-control" aria-label="Default select example" name="negeri">
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
                                                                <option value="WP Kuala Lumpur">W. P. Kuala Lumpur</option>
                                                                <option value="WP Putrajaya">W. P. Putrajaya</option>
                                                                <option value="WP Labuan">W. P. Labuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-nowrap pb-2 text-start">
                                                    <div class="col-6 form-group p-0">
                                                        <label for="state"><i class="fas fa-map"></i><strong> Negeri Kutipan Permit</strong></label>
                                                        <select class="form-control" aria-label="Default select example" name="negeri_kutipan_permit">
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
                                                            <option value="WP Kuala Lumpur">W. P. Kuala Lumpur</option>
                                                            <option value="WP Putrajaya">W. P. Putrajaya</option>
                                                            <option value="WP Labuan">W. P. Labuan</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-1"></div>
                                                    <div class="col form-group pr-0">
                                                        <label for="email"><i class="fas fa-envelope"></i><strong> E-mel</strong></label>
                                                        <input type="email" name="emel" class="form-control">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="button-row d-flex mt-4">
                                                <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Seterusnya</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card multisteps-form__panel p-3 border-radius-xl bg-white" data-animation="FadeIn">
                                        <div class="row text-center">
                                            <div class="col-12 mx-auto">
                                                <h5 class="font-weight-normal"><strong>B. Maklumat Tambahan</strong></h5>

                                            </div>
                                        </div>
                                        <div class="multisteps-form__content">
                                            <div class="row mt-4">
                                                <div class="form-group pb-2 text-start">
                                                    <label for="status_pekerjaan_eps"><i class="fas fa-briefcase"></i><strong> Status Pekerjaan
                                                            EPS</strong></label>

                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="radio" name="status_pekerjaan_eps">
                                                            <label class="pl-2" for="EPSworkStatus">Sepenuh masa sebagai EPS</label>
                                                            <br>
                                                            <div class="row pl-4">
                                                                <div class="col">
                                                                    <div class="form-group row">
                                                                        <label for="date">Dari Tahun </label>
                                                                        <div class="col-sm-10">
                                                                            <!-- patut dlm select senarai tahun-->
                                                                            <input type="text" class="form-control col-5" name="tahun_pekerjaan_eps" id="date" value="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <input type="radio" name="status_pekerjaan_eps">
                                                            <label class="pl-2" for="EPSworkStatus">Pekerjaan Sampingan</label>
                                                            <div class="row pl-4">
                                                                <div class="col">
                                                                    <div class="form-group row">
                                                                        <label for="occupation">Sila nyatakan pekerjaan
                                                                            tetap anda </label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control col-5" name="pekerjaan_tetap" value="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>


                                                    </div>

                                                </div>
                                                <div class="form-group pb-2 text-start">
                                                    <label for="education"><i class="fas fa-graduation-cap"></i><strong> Tahap Pendidikan
                                                            Tertinggi</strong></label>

                                                    <br>
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="tahap_pendidikan" value="Tiada">
                                                                <label class="form-check-label" for="inlineCheckbox1">Tiada</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="tahap_pendidikan" value="Darjah 6">
                                                                <label class="form-check-label" for="inlineCheckbox1">Darjah 6</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-check ">
                                                                <input class="form-check-input" type="radio" name="tahap_pendidikan" value="PMR">
                                                                <label class="form-check-label" for="inlineCheckbox1">PMR</label>
                                                            </div>
                                                            <div class="form-check ">
                                                                <input class="form-check-input" type="radio" name="tahap_pendidikan" value="SPM">
                                                                <label class="form-check-label" for="inlineCheckbox1">SPM</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-check ">
                                                                <input class="form-check-input" type="radio" name="tahap_pendidikan" value="Diploma">
                                                                <label class="form-check-label" for="inlineCheckbox1">Diploma</label>
                                                            </div>
                                                            <div class="form-check ">
                                                                <input class="form-check-input" type="radio" name="tahap_pendidikan" value="Ijazah/Master">
                                                                <label class="form-check-label" for="inlineCheckbox1">Ijazah/Master</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group pb-2 text-start">
                                                    <label for="education"><i class="fas fa-car"></i><strong> Lesen Memandu Yang
                                                            Sah</strong></label>
                                                    <!-- <input type="text" class="form-control" id="education" aria-describedby="education" placeholder=""> -->
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="lesen_memandu" id="inlineCheckbox1" value="B1">
                                                                <label class="form-check-label" for="inlineCheckbox1">B1</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="lesen_memandu" id="inlineCheckbox1" value="B2">
                                                                <label class="form-check-label" for="inlineCheckbox1">B2</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-check ">
                                                                <input class="form-check-input" type="checkbox" name="lesen_memandu" id="inlineCheckbox1" value="D">
                                                                <label class="form-check-label" for="inlineCheckbox1">D</label>
                                                            </div>
                                                            <div class="form-check ">
                                                                <input class="form-check-input" type="checkbox" name="lesen_memandu" id="inlineCheckbox1" value="E">
                                                                <label class="form-check-label" for="inlineCheckbox1">E</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-check ">
                                                                <input class="form-check-input" type="checkbox" name="lesen_memandu" id="inlineCheckbox1" value="F">
                                                                <label class="form-check-label" for="inlineCheckbox1">F</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group text-start">
                                                    <label for=""><strong>Adakah anda bekerja sebagai panel bank/syarikat sewa beli?</strong></label>
                                                    <!-- <input type="text" class="form-control" id="state" aria-describedby="state" placeholder=""> -->


                                                    <div class="row">
                                                        <div class="row m-2">
                                                            <div class="col-3 form-check ">
                                                                <input type="radio" name="berkerja_panel_atau_syarikat" id="yes" class="form-check-input ml-3" value="Ya">
                                                                <label class="pl-2 form-check-label" for="panelInfo">Ya</label>

                                                            </div>
                                                            <div class="col-3 form-check">
                                                                <input type="radio" name="berkerja_panel_atau_syarikat" id="no" class="form-check-input" value="Tidak">
                                                                <label class="pl-2 form-check-label" for="panelInfo">Tidak</label>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <!-- //if yes appear -->
                                                        <div class="row">
                                                            <div class="col-5 form-group">
                                                                <div class="form-group">
                                                                    <label for="bank" class="col-sm"><strong>Nama Institusi Kewangan </strong></label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control form-control-sm" name="nama_institusi_kewangan">

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

                                                                        <input type="text" name="no_telefon_institusi_kewangan" id="phoneNumber" class="form-control form-control-sm">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- if no appear -->
                                                        <div>
                                                            <label class="pl-4">
                                                                <strong>Sila nyatakan panel yang anda ikuti dan isi maklumat panel
                                                                    seperti
                                                                    berikut.
                                                                </strong>
                                                            </label>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-1"></div>

                                                            <div class="form-group row pl-4">
                                                                <div class="col-md-3">
                                                                    <label for="panelName">
                                                                        <strong> Nama Panel </strong>
                                                                    </label>
                                                                </div>
                                                                <div class="col">
                                                                    <input type="text" name="nama_panel" class="form-control col-10 form-control-sm" id="panelName">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row pl-4">
                                                                <div class="col-md-3">
                                                                    <label for="panelName">
                                                                        <strong> No. Kad Pengenalan </strong>
                                                                    </label>
                                                                </div>
                                                                <div class="col">
                                                                    <input type="text" id="icNumber" class="form-control form-control-sm" placeholder="" name="no_kp_panel">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row pl-4">
                                                                <div class="col-md-3">
                                                                    <label for="permitNumber">
                                                                        <strong> No. Permit </strong>
                                                                    </label>
                                                                </div>
                                                                <div class="col">
                                                                    <input type="text" class="form-control form-control-sm" id="permitNumber" name="no_permit_panel">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row pl-4">
                                                                <div class="col-md-3">
                                                                    <label for="phoneNumber">
                                                                        <strong> No. Telefon </strong> </label>
                                                                </div>
                                                                <div class="col">
                                                                    <input type="text" class="form-control form-control-sm" id="phoneNumber" name="no_telefon_panel">
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="form-group pb-2 text-start">
                                                    <label for=""><strong> Adakah anda pernah menghadiri kursus EPS yang dianjurkan oleh
                                                            KPDNHEP?</strong></label>
                                                    <div>
                                                        <input type="radio" id="yes" name="kehadiran_kursus_eps" value="Ya">
                                                        <label class="pl-2" for="panelInfo">Ya</label>
                                                        <div class="row ml-5">
                                                            <div class="col-5">
                                                                <div class="form-group row">
                                                                    <label for="yearAttend">Tahun Dihadiri </label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control form-control-sm" name="tahun_dihadiri">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <input type="radio" id="no" name="kehadiran_kursus_eps" value="Tidak">
                                                        <label class="pl-2" for="panelInfo">Tidak</label>
                                                    </div>
                                                </div>

                                                <div class="form-group text-start">

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
                                                                <input type="file" id="actual-btn" hidden name="salinan_kp_depan" />
                                                                <!-- our custom upload button -->
                                                                <label for="actual-btn" class="upload-btn mt-0">Pilih Fail</label>
                                                                <!-- name of file chosen -->
                                                                <span id="file-chosen" class="mt-1">Tiada Fail Dipilih</span>

                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-3">
                                                                <label class="mt-1" for="image">Kad Pengenalan (Belakang)</label>
                                                            </div>
                                                            <div class="col">
                                                                <!-- actual upload which is hidden -->
                                                                <input type="file" id="actual-btn2" hidden name="salinan_kp_belakang" />
                                                                <!-- our custom upload button -->
                                                                <label for="actual-btn2" class="upload-btn mt-0">Pilih Fail</label>
                                                                <!-- name of file chosen -->
                                                                <span id="file-chosen2" class="mt-1">Tiada Fail Dipilih</span>

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <label class="mt-1" for="image">Lesen Memandu</label>
                                                            </div>
                                                            <div class="col">
                                                                <!-- actual upload which is hidden -->
                                                                <input type="file" id="actual-btn" hidden name="salinan_lesen_memandu" />
                                                                <!-- our custom upload button -->
                                                                <label for="actual-btn" class="upload-btn mt-0">Pilih Fail</label>
                                                                <!-- name of file chosen -->
                                                                <span id="file-chosen" class="mt-1">Tiada Fail Dipilih</span>
                                                                <br>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-3">
                                                                <label class="mt-1" for="image">Surat Sokongan (Bank/Syarikat Sewa Beli)</label>
                                                            </div>
                                                            <div class="col">
                                                                <!-- actual upload which is hidden -->
                                                                <input type="file" id="actual-btn2" hidden name="salinan_surat_sokongan" />
                                                                <!-- our custom upload button -->
                                                                <label for="actual-btn2" class="upload-btn mt-0">Pilih Fail</label>
                                                                <!-- name of file chosen -->
                                                                <span id="file-chosen2" class="mt-1">Tiada Fail Dipilih</span>
                                                                <br>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="button-row d-flex mt-4">
                                                <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Kembali</button>
                                                <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Seterusnya</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--single form panel-->
                                    <div class="card multisteps-form__panel p-3 border-radius-xl bg-white" data-animation="FadeIn">
                                        <div class="row text-center">
                                            <div class="col-12 mx-auto">
                                                <h5 class="font-weight-normal"><strong>C. Pengesahan Permohonan</strong></h5>
                                                <!-- <p>One thing I love about the later sunsets is the chance to go for a walk through the neighborhood woods before dinner</p> -->
                                            </div>
                                        </div>
                                        <div class="multisteps-form__content">
                                            <div class="row text-start">
                                                <div class="p-3" fxLayout="column" fxLayoutAlign="space-evenly stretch" style="width: 90%;">

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" (click)="toggleAg()" id="applicationStatement" name="applicationStatement" value="Agree" required>
                                                        <label class="form-check-label" for="applicationStatement">Dengan ini saya mengaku dan
                                                            mengesahkan bahawa semua maklumat dan butir-butir yang dicatatkan dalam
                                                            borang permohonan adalah benar.
                                                            Saya juga faham bahawa, jika mana-mana maklumat yang berkaitan permohonan ini didapati tidak
                                                            benar
                                                            akan menyebabkan permohonan ini
                                                            ditolak.
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="p-3 d-flex justify-content-center">
                                                    <a href="dashboard-pemohon" type="button" class=" btn btn btn-danger btn-lg m-2">BATAL</a>
                                                    <input type="button" class=" btn btn-info btn-lg m-2" value="SIMPAN">
                                                    <input type="submit" class=" btn btn-success btn-lg m-2" value="HANTAR">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="button-row d-flex mt-4 col-12">
                                                    <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Kembali</button>
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

    <script src="https://demos.creative-tim.com/test/soft-ui-dashboard-pro/assets/js/plugins/multistep-form.js" type="text/javascript"></script>

</div>

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

@stop