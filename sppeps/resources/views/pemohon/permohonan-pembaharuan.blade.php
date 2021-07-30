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


<div class="container-fluid d-flex justify-content-center flex-wrap">
    <div class="row d-flex justify-content-center" style="width: 100%;">
        <div class="p-2" style="text-align: center; background-color: #e0bbfe; height:100px; width:65%;">
            <h3 class="h4 text-white mt-3"><strong>PERMOHONAN PEMBAHARUAN</strong></h3>
        </div>
    </div>

    <div class="row pt-4 d-flex justify-content-center">

        <form class="col-md-8 d-flex justify-content-center flex-wrap" method="POST" action="">
            @csrf

            <div class="p-2 " style="width: 100%; background-color:#2e095f; border-radius: 10px 10px 0px 0px;">
                <h6 class="text-white m-0">A. Maklumat Permohonan</h6>
            </div>

            <div class="p-3" fxLayout="column" fxLayoutAlign="space-evenly stretch" style="width: 90%;">



                <div class="row form-group p-3 d-flex justify-content-center">

                    <!-- <div class="image-upload">
                        <label for="file-input" class="d-flex justify-content-center">
                            <img class="user-profile" src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.pinterest.com%2Fpin%2F811210951621719706%2F&psig=AOvVaw13UieRu4JqUwvwEubMsvxe&ust=1627373746587000&source=images&cd=vfe&ved=0CAsQjRxqFwoTCPDIveKlgPICFQAAAAAdAAAAABAD" id="user-profile" alt="user-profile" />
                        </label>

                        <input id="file-input" type="file" />
                    </div> -->

                    <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-2.jpg" alt="..." class="avatar avatar-xxl">
                </div>

                <div class="d-flex flex-nowrap pb-2">
                    <div class="col-6 form-group p-0">
                        <label for="name">
                            <i class="fas fa-user"></i><strong> Nama</strong>
                        </label>
                        <div class="d-flex flex-nowrap align-items-center">
                            <input type="text" class="form-control col-9" id="name" aria-describedby="name" [value]="userdata.nama" disabled>
                        </div>
                    </div>
                    <div class="col-1"></div>

                    <div class="col form-group pr-0">
                        <label for="noPermit"><i class="fas fa-id-card"></i><strong> No. Permit</strong></label>
                        <input type="text" class="form-control" value="10523" name="noPermit" disabled>
                    </div>
                    <!-- <div class="col form-group pr-0">
                        <label for="ic"><i class="fas fa-id-card"></i><strong> No Kad Pengenalan</strong></label>
                        <input type="text" class="form-control" id="ic" aria-describedby="ic" [value]="userdata.no_kp" disabled>
                    </div> -->
                </div>

                <div class="d-flex flex-nowrap pb-2">
                    <div class="col-6 form-group p-0">
                        <label for="gender"> <i class="fas fa-venus-mars"></i><strong> Jantina</strong></label>
                        <input type="text" class="form-control" id="ic" aria-describedby="ic" [value]="userdata.no_kp" disabled>
                        <!-- <select name="gender" id="gender" class="form-control">
                            <option value="">--Sila Pilih--</option>
                            <option value="Lelaki">Lelaki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select> -->
                    </div>
                    <div class="col-1"></div>
                    <div class="col form-group pr-0">
                        <label for="ic"><i class="fas fa-id-card"></i><strong> No Kad Pengenalan</strong></label>
                        <input type="text" class="form-control" id="ic" aria-describedby="ic" [value]="userdata.no_kp" disabled>
                    </div>

                </div>

                <div class="d-flex flex-nowrap pb-2">
                    <div class="col-6 form-group p-0">
                        <label for="phone">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                            </svg>
                            <strong> No. Telefon</strong>
                        </label>
                        <div class="d-flex flex-nowrap align-items-center">
                            <input type="text" class="form-control col-2" id="phone1" name="notelefonori" aria-describedby="phone" [(ngModel)]=" this.notelefonori">

                        </div>
                    </div>
                    <div class="col-1"></div>
                    <div class="col form-group pr-0">
                        <label for="age"><i class="fas fa-calendar-alt"></i><strong> Umur</strong></label>
                        <input type="text" class="form-control" id="age" aria-describedby="age" [value]="userdata.umur" disabled>
                    </div>
                </div>

                <div class="d-flex flex-nowrap pb-2">
                    <div class="col-6 form-group p-0">
                        <label for="address"><i class="fas fa-map-marker-alt"></i><strong> Alamat</strong></label>
                        <input type="text" class="col-9 form-control" name="alamat1ori" id="address1" aria-describedby="address" [(ngModel)]="this.alamat1ori">
                        <input type="text" class="col-9 form-control" name="alamat2ori" id="address2" aria-describedby="address" [(ngModel)]="this.alamat2ori">
                        <input type="text" class="col-9 form-control" name="alamat2ori" id="address2" aria-describedby="address" [(ngModel)]="this.alamat2ori">
                    </div>
                    <div class="col-1"></div>
                    <div class="col pr-0">
                        <div class="form-group">
                            <label for="email">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-signpost-fill" viewBox="0 0 16 16">
                                    <path d="M7.293.707A1 1 0 0 0 7 1.414V4H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h5v6h2v-6h3.532a1 1 0 0 0 .768-.36l1.933-2.32a.5.5 0 0 0 0-.64L13.3 4.36a1 1 0 0 0-.768-.36H9V1.414A1 1 0 0 0 7.293.707z" />
                                </svg>
                                <strong> Poskod</strong></label>
                            <input type="number" class="form-control" id="poskod" aria-describedby="poskod" name="poskod" [(ngModel)]="poskodori">
                        </div>
                        <div class="form-group">
                            <label for="state"><i class="fas fa-map"></i><strong> Negeri</strong></label>
                            <select class="form-control" aria-label="Default select example" name="negeri" [(ngModel)]="negeriori">
                                <option selected>--Pilih Negeri--</option>
                                <option value="Perlis">Perlis</option>
                                <option value="Kedah">Kedah</option>
                                <option value="Pulau Pinang">Pulau Pinang</option>
                                <option value="Perak">Perak</option>
                                <option value="Selangor">Selangor</option>
                                <option value="WP Kuala Lumpur">W. P. Kuala Lumpur</option>
                                <option value="WP Putrajaya">W. P. Putrajaya</option>
                                <option value="WP Labuan">W. P. Labuan</option>
                                <option value="Melaka">Melaka</option>
                                <option value="Negeri Sembilan">Negeri Sembilan</option>
                                <option value="Johor">Johor</option>
                                <option value="Pahang">Pahang</option>
                                <option value="Terengganu">Terengganu</option>
                                <option value="Kelantan">Kelantan</option>
                                <option value="Sabah">Sabah</option>
                                <option value="Sarawak">Sarawak</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-nowrap pb-2">
                    <div class="col-6 form-group p-0">
                        <label for="state"><i class="fas fa-map"></i><strong> Negeri Kutipan Permit</strong></label>
                        <select class="form-control" aria-label="Default select example" name="negeri" [(ngModel)]="negeriori">
                            <option selected>--Pilih Negeri--</option>
                            <option value="Perlis">Perlis</option>
                            <option value="Kedah">Kedah</option>
                            <option value="Pulau Pinang">Pulau Pinang</option>
                            <option value="Perak">Perak</option>
                            <option value="Selangor">Selangor</option>
                            <option value="WP Kuala Lumpur">W. P. Kuala Lumpur</option>
                            <option value="WP Putrajaya">W. P. Putrajaya</option>
                            <option value="WP Labuan">W. P. Labuan</option>
                            <option value="Melaka">Melaka</option>
                            <option value="Negeri Sembilan">Negeri Sembilan</option>
                            <option value="Johor">Johor</option>
                            <option value="Pahang">Pahang</option>
                            <option value="Terengganu">Terengganu</option>
                            <option value="Kelantan">Kelantan</option>
                            <option value="Sabah">Sabah</option>
                            <option value="Sarawak">Sarawak</option>
                        </select>
                    </div>
                    <div class="col-1"></div>
                    <div class="col form-group pr-0">
                        <label for="email"><i class="fas fa-envelope"></i><strong> E-mel</strong></label>
                        <input type="email" name="emel" class="form-control" id="email">
                    </div>
                </div>
                <hr>

                <div class="p-2 " style="width: 100%; background-color:#2e095f; border-radius: 10px 10px 0px 0px;">
                    <h6 class="text-white m-0">A. Maklumat Tambahan</h6>
                </div>


                <div class="form-group pb-2">
                    <label for="EPSworkStatus"><i class="fas fa-briefcase"></i><strong> Status Pekerjaan
                            EPS</strong></label>
                    <!-- <input type="text" class="col-5 form-control" id="occupation" aria-describedby="occupation"
                            placeholder=""> -->
                    <div class="row">
                        <div class="col">
                            <input type="radio" name="EPSworkStatus" id="fullTime">
                            <label class="pl-2" for="EPSworkStatus">Sepenuh masa sebagai EPS</label>
                            <br>
                            <div class="row pl-4">
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="date">Dari Tahun: </label>
                                        <div class="col-sm-10">
                                            <!-- patut dlm select senarai tahun-->
                                            <input type="text" class="form-control col-5" name="date" id="date" value="" [disabled]="epsWorkStatusDate" [(ngModel)]="dari_tahun">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <input type="radio" name="EPSworkStatus" id="partTime">
                            <label class="pl-2" for="EPSworkStatus">Pekerjaan Sampingan</label>
                            <div class="row pl-4">
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="occupation">Sila nyatakan pekerjaan
                                            tetap anda: </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control col-5" id="occupation" name="occupation" value="" [disabled]="epsWorkStatusOccu" [(ngModel)]="p_sampingan">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>

                </div>
                <div class="form-group pb-2">
                    <label for="education"><i class="fas fa-graduation-cap"></i><strong> Tahap Pendidikan
                            Tertinggi</strong></label>
                    <!-- <input type="text" class="form-control" id="education" aria-describedby="education" placeholder=""> -->
                    <br>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" [(ngModel)]="tahap_pen" name="education" [value]="0">
                                <label class="form-check-label" for="inlineCheckbox1">Tiada</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" [(ngModel)]="tahap_pen" name="education" [value]="1">
                                <label class="form-check-label" for="inlineCheckbox1">Darjah 6</label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" [(ngModel)]="tahap_pen" name="education" [value]="2">
                                <label class="form-check-label" for="inlineCheckbox1">PMR</label>
                            </div>
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" [(ngModel)]="tahap_pen" name="education" [value]="3">
                                <label class="form-check-label" for="inlineCheckbox1">SPM</label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" [(ngModel)]="tahap_pen" name="education" [value]="4">
                                <label class="form-check-label" for="inlineCheckbox1">Diploma</label>
                            </div>
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" [(ngModel)]="tahap_pen" name="education" [value]="5">
                                <label class="form-check-label" for="inlineCheckbox1">Ijazah/Master</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group pb-2">
                    <label for="education"><i class="fas fa-car"></i><strong> Lesen Memandu Yang
                            Sah</strong></label>
                    <!-- <input type="text" class="form-control" id="education" aria-describedby="education" placeholder=""> -->
                    <br>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="lesen" (click)="insertLesen('B1')" id="inlineCheckbox1" value="B1" [checked]="lesen.includes('B1')">
                                <label class="form-check-label" for="inlineCheckbox1">B1</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="lesen" (click)="insertLesen('B2')" id="inlineCheckbox1" value="B2" [checked]="lesen.includes('B2')">
                                <label class="form-check-label" for="inlineCheckbox1">B2</label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-check ">
                                <input class="form-check-input" type="checkbox" name="lesen" (click)="insertLesen('D')" id="inlineCheckbox1" value="D" [checked]="lesen.includes('D')">
                                <label class="form-check-label" for="inlineCheckbox1">D</label>
                            </div>
                            <div class="form-check ">
                                <input class="form-check-input" type="checkbox" name="lesen" (click)="insertLesen('E')" id="inlineCheckbox1" value="E" [checked]="lesen.includes('E')">
                                <label class="form-check-label" for="inlineCheckbox1">E</label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-check ">
                                <input class="form-check-input" type="checkbox" name="lesen" (click)="insertLesen('F')" id="inlineCheckbox1" value="F" [checked]="lesen.includes('F')">
                                <label class="form-check-label" for="inlineCheckbox1">F</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for=""><strong>Adakah anda bekerja sebagai panel bank/syarikat sewa beli</strong></label>
                    <!-- <input type="text" class="form-control" id="state" aria-describedby="state" placeholder=""> -->


                    <div class="row">
                        <div class="col-3">
                            <input type="radio" name="panelInfo" id="yes" class="form-check-input">
                            <label class="pl-2" for="panelInfo">Ya</label>

                        </div>
                        <div class="col-3">
                            <input type="radio" name="panelInfo" id="no" class="form-check-input">
                            <label class="pl-2" for="panelInfo">Tidak</label>
                        </div>
                        <br>
                        <!-- //if yes appear -->
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

                            <div class="col-5 form-group">
                                <div class="form-group">
                                    <label for="bank" class="col-sm-2"><strong> Bank: </strong></label>
                                    <div class="col-sm-10">
                                        <!-- <input type="text" class="form-control" id="staticEmail" value="email@example.com"> -->
                                        <select name="panelBank" class="col-7 form-control form-control-sm" aria-label="Default select example" [disabled]="formCheck" [(ngModel)]="panel_bank">
                                            <option selected>--Sila Pilih--</option>
                                            <option value="1">Maybank</option>
                                            <option value="2">Bank Rakyat</option>
                                            <option value="3">RHB Bank</option>
                                            <option value="4">HSBC Bank Malaysia</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1"></div>
                            <div class="col-5 form-group">
                                <div class="form-group">
                                    <label for="phoneNumber" class="col-sm">
                                        <strong>No. Telefon (bank):</strong>
                                    </label>
                                    <div class="col-sm-8">

                                        <input type="text" name="phoneNumber" id="phoneNumber" class="form-control form-control-sm">

                                    </div>
                                </div>
                            </div>

                            <div class="form-group row pl-4">
                                <div class="col-md-3">
                                    <label for="panelName">
                                        <strong> <span style="color: red;">*</span>Nama Panel: </strong>
                                    </label>
                                </div>
                                <div class="col">
                                    <input type="text" name="namapanel" class="form-control col-10 form-control-sm" id="panelName">
                                </div>
                            </div>

                            <div class="form-group row pl-4">
                                <div class="col-md-3">
                                    <label for="panelName">
                                        <strong> <span style="color: red;">*</span>No Kad Pengenalan: </strong>
                                    </label>
                                </div>
                                <div class="col">
                                    <input type="text" id="icNumber" class="form-control form-control-sm" placeholder="" name="icNumber">
                                </div>
                            </div>

                            <div class="form-group row pl-4">
                                <div class="col-md-3">
                                    <label for="permitNumber">
                                        <strong> <span style="color: red;">*</span>No Permit: </strong>
                                    </label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control form-control-sm" id="permitNumber" name="no_permit">
                                </div>
                            </div>

                            <div class="form-group row pl-4">
                                <div class="col-md-3">
                                    <label for="phoneNumber">
                                        <strong> <span style="color: red;">*</span>No. Telefon: </strong> </label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control form-control-sm" id="phoneNumber" name="no_telPanel">
                                </div>
                            </div>

                        </div>
                    </div>


                </div>

                <div class="form-group pb-2">
                    <label for=""><strong> Adakah anda pernah menghadiri kursus EPS yang dianjurkan oleh
                            KPDNHEP?</strong></label>
                    <!-- <input type="text" class="form-control" id="state" aria-describedby="state" placeholder=""> -->
                    <div>
                        <input type="radio" name="panelInfo" id="yes" [checked]="!yearAttend" (click)="yearAttendActive()">
                        <label class="pl-2" for="panelInfo">Ya</label>
                        <div class="row ml-5">
                            <div class="col-5">
                                <div class="form-group row">
                                    <label for="yearAttend">Tahun Dihadiri: </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-sm" name="tahunDihadiri">
                                        <!-- <select class="form-control" name="expiryMonth" [disabled]="yearAttend" [(ngModel)]="tahun_h">
                                            <option value="">Pilih Tahun</option>

                                        </select> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="radio" name="panelInfo" id="no" [checked]="yearAttend" (click)="yearAttendDeactive()">
                        <label class="pl-2" for="panelInfo">Tidak</label>
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
                                <input type="file" id="actual-btn" hidden />
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
                                <input type="file" id="actual-btn2" hidden />
                                <!-- our custom upload button -->
                                <label for="actual-btn2" class="upload-btn mt-0">Pilih Fail</label>
                                <!-- name of file chosen -->
                                <span id="file-chosen2" class="mt-1">Tiada Fail Dipilih</span>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label class="mt-1" for="image">Lesen Memandu:</label>
                            </div>
                            <div class="col">
                                <!-- actual upload which is hidden -->
                                <input type="file" id="actual-btn" hidden />
                                <!-- our custom upload button -->
                                <label for="actual-btn" class="upload-btn mt-0">Pilih Fail</label>
                                <!-- name of file chosen -->
                                <span id="file-chosen" class="mt-1">Tiada Fail Dipilih</span>
                                <br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <label class="mt-1" for="image">Surat Sokongan (Bank/Syarikat Sewa Beli):</label>
                            </div>
                            <div class="col">
                                <!-- actual upload which is hidden -->
                                <input type="file" id="actual-btn2" hidden />
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

            <!-- <span><span style="color: red;">*</span>WAJIB diisi</span> -->

            <div class="p-2" style="width: 100%; background-color:#2e095f;">
                <h6 class=" text-white m-0">C. Pengesahan Permohonan</h6>
            </div>

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
                <input type="button" class=" btn btn btn-danger btn-lg m-2" value="BATAL">
                <input type="button" class=" btn btn-info btn-lg m-2" value="SIMPAN">
                <input type="submit" class=" btn btn-success btn-lg m-2" value="HANTAR">
            </div>


        </form>
    </div>

</div>


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