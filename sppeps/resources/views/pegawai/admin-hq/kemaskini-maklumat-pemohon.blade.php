@extends('layouts.base-admin-hq')

@section('content')

<div class="container-fluid py-4">

    <div class="card card-frame">
        <div class="card-header" style="background-color: #f5e7f2;">
            <h6 class="text-uppercade ">Kemaskini Permohonan</h6>
        </div>


        <div class="card-body">

            <form class="d-flex justify-content-center font-black" style="width: 100%;">
                <div class="d-flex justify-content-center flex-wrap" fxLayout="column" fxLayoutAlign="space-evenly stretch" style="width: 100%;">

                    <div class="p-3" fxLayout="column" fxLayoutAlign="space-evenly stretch" style="width: 90%;" *ngFor="let infos of info">
                        <div class="row form-group p-3 d-flex justify-content-center">

                            <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-2.jpg" alt="..." class="avatar avatar-xxl">
                        </div>

                        <div class="d-flex flex-nowrap">
                            <div class="col-6 form-group p-0">
                                <label for="name">
                                    <strong>Nama</strong>
                                </label>
                                <div class="d-flex flex-nowrap align-items-center">
                                    <input type="text" class="form-control col-9" id="name" aria-describedby="name" placeholder="" [value]="infos.name" disabled>
                                </div>
                            </div>
                            <div class="col-1"></div>
                            <div class="col form-group pr-0">
                                <label for="ic"><strong> No. Kad Pengenalan</strong></label>
                                <input type="text" class="form-control" id="ic" aria-describedby="ic" placeholder="" [value]="infos.no_kp" disabled>
                            </div>
                        </div>

                        <div class="d-flex flex-nowrap">
                            <div class="col-6 form-group p-0">
                                <label for="age"><strong> Umur</strong></label>
                                <input type="text" class="form-control col-9" id="age" aria-describedby="age" placeholder="" value="25 Tahun" [value]="infos.umur" disabled>

                            </div>
                            <div class="col-1"></div>
                            <div class="col form-group pr-0">
                                <label for="gender"><strong> Jantina</strong></label>
                                <input type="text" class="form-control" id="age" aria-describedby="age" placeholder="" value="Perempuan" [value]="infos.jantina">
                            </div>
                        </div>

                        <div class="d-flex flex-nowrap">
                            <div class="col-6 form-group p-0">

                                <label for="address"><strong> Alamat</strong></label>
                                <input type="text" class="col-9 form-control" id="address1" aria-describedby="address" placeholder="" [value]="info.alamat">
                                <input type="text" class="col-9 form-control" id="address2" aria-describedby="address" placeholder="" [value]="infos.alamat2">
                            </div>
                            <div class="col-1"></div>
                            <div class="col form-group pr-0">
                                <label for="email"><strong> E-mel</strong></label>
                                <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="" [value]="infos.emel">
                            </div>
                        </div>

                        <div class="d-flex flex-nowrap">
                            <div class="col-6 form-group p-0">
                                <label for="state"><strong>Negeri</strong></label>
                                <input type="text" class="form-control col-9" id="state" aria-describedby="state" placeholder="" value="Selangor" [value]="infos.negeri">
                                <!-- <select class="form-control form-control-sm" aria-label="Default select example" name="negeri">
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
                                </select> -->
                            </div>
                            <div class="col-1"></div>
                            <div class="col form-group pr-0">
                                <label for="phoneNumber"><strong>No. Telefon</strong></label>
                                <input type="text" class="form-control" id="phoneNumber" aria-describedby="phoneNumber" placeholder="" value="01234567890" [value]="infos.notelbimbit">
                            </div>
                        </div>

                        <div class="d-flex flex-nowrap">
                            <div class="col-6 form-group p-0">
                                <label for="occupation"><strong>Pekerjaan Sekarang</strong></label>
                                <input type="text" class="form-control col-9" id="occupation" aria-describedby="occupation" placeholder="" value="Kontraktor" [value]="infos.pekerjaan_skrg">

                            </div>
                            <div class="col-1"></div>
                            <div class="col form-group pr-0">
                                <label for="licence"><strong>Lesen Memandu yang Sah</strong></label>
                                <input type="text" class="form-control" id="licence" aria-describedby="licence" placeholder="" value="B2, D" [value]="infos.lesen_sah">
                            </div>
                        </div>
                        <div class="d-flex flex-nowrap">
                            <div class="col-6 form-group p-0">
                                <label for="education"><strong>Tahap Pendidikan Tertinggi</strong></label>
                                <input type="text" class="form-control col-9" id="education" aria-describedby="education" placeholder="" value="Ijazah" [value]="infos.pendidikan_tinggi">

                            </div>
                        </div>

                        <div class="d-flex flex-nowrap">
                            <div class="col-6 form-group p-0">
                                <label for="question1"><strong>Adakah anda akan bekerja sebagai panel <br> bank/syarikat sewa
                                        beli?</strong></label>
                                <input type="text" class="form-control col-9" id="question1" aria-describedby="question1" placeholder="" value="Ya" [value]="infos.bank_or_sewa">

                            </div>
                            <div class="col-1"></div>
                            <div class="col form-group pr-0">
                                <label for=""><strong>Adakah anda tahu tentang aktviti pemilikan semula barangan di bawah
                                        Akta Sewa Beli 1967?</strong></label>

                            </div>
                        </div>

                        <div class="d-flex flex-nowrap">
                            <div class="col-6 form-group p-0">
                                <label for="panelBank"><strong>Nama Panel Bank</strong></label>
                                <input type="text" class="form-control col-9" id="panelBank" aria-describedby="panelBank" placeholder="" value="Maybank Berhad" [value]="infos.panel_bank">

                            </div>
                            <div class="col-1"></div>
                            <div class="col form-group pr-0">
                                <label for="jobScope"><strong>Skop Tugas EPS</strong></label>
                                <input type="text" class="form-control" id="jobScope" aria-describedby="jobScope" placeholder="" value="Ya" [value]="infos.akta_tugas">
                            </div>
                        </div>

                        <div class="d-flex flex-nowrap">
                            <div class="col-6 form-group p-0">
                                <label for="bankPhoneNumber"><strong>No. Telefon Bank</strong></label>
                                <input type="text" class="form-control col-9" id="bankPhoneNumber" aria-describedby="bankPhoneNumber" placeholder="" [value]="infos.notel_bank">

                            </div>
                            <div class="col-1"></div>
                            <div class="col form-group pr-0">
                                <label for="procedure"><strong>Prosedur dan Peraturan EPS</strong></label>
                                <input type="text" class="form-control" id="procedure" aria-describedby="procedure" placeholder="" value="Tidak" [value]="infos.akta_eps">
                            </div>
                        </div>

                        <div class="d-flex flex-nowrap">
                            <div class="col-6 form-group p-0">
                                <div class="col form-group p-0">
                                    <label for="panelName"><strong>Nama Panel</strong></label>
                                    <input type="text" class="form-control col-9" id="panelName" aria-describedby="panelName" placeholder="" [value]="infos.nama_panel">

                                </div>
                                <div class="col-1"></div>
                                <div class="col form-group p-0">
                                    <label for="panelIcNumber"><strong>No. Kad Pengenalan</strong></label>
                                    <input type="text" class="form-control col-9" id="panelIcNumber" aria-describedby="panelIcNumber" placeholder="" [value]="infos.ic_panel" nric_panel>

                                </div>

                                <div class="col form-group p-0">
                                    <label for="permitNumber"><strong>No. Permit</strong></label>
                                    <input type="text" class="form-control col-9" id="permitNumber" aria-describedby="permitNumber" placeholder="" [value]="infos.no_permit" noPermit>

                                </div>

                            </div>
                            <div class="col-1"></div>
                            <div class="col form-group pr-0">
                                <span><strong>Lampiran Dokumen</strong></span>

                                <ol>
                                    <div class="row p-2">
                                        <div class="col">
                                            <li>Salinan Lesen Memandu</li>
                                        </div>
                                        <div class="col">
                                            <button class="btn btn-sm text-white" style="background-color: #1d1da1;" (click)="display()"><i class="fas fa-file-alt"></i> Lihat
                                                Lampiran</button>
                                        </div>
                                        <div *ngIf="view == true">
                                            <img src="" />
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col">
                                            <li> Salinan Kad Pengenalan</li>
                                        </div>
                                        <div class="col">
                                            <button class="btn btn-sm text-white" style="background-color: #1d1da1;" (click)="display()"><i class="fas fa-file-alt"></i> Lihat
                                                Lampiran</button>
                                        </div>
                                        <div *ngIf="view == true">
                                            <img src="" />
                                        </div>
                                    </div>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div class="p-3 d-flex justify-content-center" *ngIf="click == true">
                        <!-- <input type="button" class="btn text-uppercase" style="background-color: #1d1da1; border-radius:25px" value="Batal" (click)="back()"> -->
                        <input type="button" class="btn bg-gradient-success btn-lg text-uppercase" value="Simpan" (click)="toggle()">


                    </div>

                </div>
            </form>
        </div>
    </div>

</div>
@stop