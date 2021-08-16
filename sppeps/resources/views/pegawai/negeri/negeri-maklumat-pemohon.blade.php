@extends('layouts.base-admin-hq')

@section('content')

    <div class="container-fluid py-4">

        <div class="p-3">

            <div>
                <h5>Semakan Permohonan</h5>
            </div>

            <div class="pt-4">

                <div class="card card-frame">
                    <div class="card-header" style="background-color: #f5e7f2;">
                        <h6 class="text-capitalize ">maklumat permohonan</h6>
                    </div>


                    <div class="card-body">

                        <form class="d-flex justify-content-center font-black" style="width: 100%;">
                            <div class="d-flex justify-content-center flex-wrap" fxLayout="column"
                                fxLayoutAlign="space-evenly stretch" style="width: 100%;">

                                <div class="p-3" fxLayout="column" fxLayoutAlign="space-evenly stretch" style="width: 90%;"
                                    *ngFor="let infos of info">
                                    <div class="row form-group p-3 d-flex justify-content-center">

                                        <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-2.jpg"
                                            alt="..." class="avatar avatar-xxl">
                                    </div>

                                    <div class="d-flex flex-nowrap">
                                        <div class="col-6 form-group p-0">
                                            <label for="name">
                                                <strong>Nama</strong>
                                            </label>
                                            <div class="d-flex flex-nowrap align-items-center">
                                                <input type="text" class="form-control col-9"
                                                    value="{{ $permohonan->nama }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-1"></div>
                                        <div class="col form-group pr-0">
                                            <label for="ic"><strong> No. Kad Pengenalan</strong></label>
                                            <input type="text" class="form-control" value="{{ $permohonan->no_kp }}"
                                                disabled>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-nowrap">
                                        <div class="col-6 form-group p-0">
                                            <label for="age"><strong> Umur</strong></label>
                                            <input type="text" class="form-control col-9" value="{{ $permohonan->umur }}"
                                                disabled>

                                        </div>
                                        <div class="col-1"></div>
                                        <div class="col form-group pr-0">
                                            <label for="gender"><strong> Jantina</strong></label>
                                            <input type="text" class="form-control" value="{{ $permohonan->jantina }}"
                                                disabled>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-nowrap pb-2">
                                        <div class="col-6 form-group p-0">
                                            <label for="address"><strong> Alamat</strong></label>
                                            <input type="text" class="col-9 form-control"
                                                value="{{ $permohonan->alamat1 }}" disabled>
                                            <input type="text" class="col-9 form-control"
                                                value="{{ $permohonan->alamat2 }}" disabled>
                                            <input type="text" class="col-9 form-control"
                                                value="{{ $permohonan->alamat3 }}" disabled>
                                        </div>
                                        <div class="col-1"></div>
                                        <div class="col pr-0">
                                            <div class="form-group">
                                                <label for="">
                                                    <strong> Poskod</strong>
                                                </label>
                                                <input type="text" class="form-control" value="{{ $permohonan->poskod }}"
                                                    disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="state">
                                                    <strong>Negeri</strong>
                                                </label>
                                                <input type="text" class="form-control" value="{{ $permohonan->negeri }}"
                                                    disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-nowrap">
                                        <div class="col-6 form-group p-0">
                                            <label for="phoneNumber"><strong>No. Telefon</strong></label>
                                            <input type="text" class="form-control" disabled
                                                value="{{ $permohonan->no_telefon }}">
                                        </div>
                                        <div class="col-1"></div>
                                        <div class="col form-group pr-0">
                                            <label for="email"><strong> E-mel</strong></label>
                                            <input type="email" class="form-control" disabled
                                                value="{{ $permohonan->emel }}">
                                        </div>
                                    </div>

                                    <div class="d-flex flex-nowrap">
                                        <div class="col-6 form-group p-0">
                                            <label for="state"><strong>Negeri Kutipan Permit</strong></label>
                                            <input type="text" class="form-control col-9" disabled
                                                value="{{ $permohonan->negeri_kutipan_permit }}">

                                        </div>
                                        <div class="col-1"></div>
                                        @if ($permohonan->jenis_permohonan === 'Pembaharuan' || $permohonan->jenis_permohonan === 'Pendua' || $permohonan->jenis_permohonan === 'Rayuan')
                                            <div class="col form-group pr-0">
                                                <label for="state"><strong>No. Permit</strong></label>
                                                <input type="text" class="form-control col-9" disabled
                                                    value="{{ $permohonan->no_permit }}">
                                            </div>
                                        @endif
                                    </div>
                                    @if ($permohonan->jenis_permohonan === 'Baharu')

                                        <div class="d-flex flex-nowrap">
                                            <div class="col-6 form-group p-0">
                                                <label for="occupation"><strong>Pekerjaan Sekarang</strong></label>
                                                <input type="text" class="form-control col-9" disabled
                                                    value="{{ $permohonan->pekerjaan_sekarang }}">
                                            </div>
                                            <div class="col-1"></div>
                                            <div class="col form-group pr-0">

                                            </div>
                                        </div>
                                        <div class="d-flex flex-nowrap">
                                            <div class="col-6 form-group p-0">
                                                <label for="education"><strong>Tahap Pendidikan Tertinggi</strong></label>
                                                <input type="text" class="form-control col-9" disabled
                                                    value="{{ $permohonan->tahap_pendidikan }}">
                                            </div>
                                            <div class="col-1"></div>
                                            <div class="col form-group pr-0">
                                                <label for="licence"><strong>Lesen Memandu yang Sah</strong></label>
                                                <input type="text" class="form-control" disabled
                                                    value="{{ $permohonan->lesen_memandu }}">
                                            </div>
                                        </div>

                                        <div class="d-flex flex-nowrap">
                                            <div class="col-6 form-group p-0">
                                                <label for="question1"><strong>Adakah anda akan bekerja sebagai panel <br>
                                                        bank/syarikat sewa
                                                        beli?</strong></label>
                                                <input type="text" class="form-control col-9" disabled
                                                    value="{{ $permohonan->berkerja_panel_atau_syarikat }}">

                                            </div>
                                            <div class="col-1"></div>
                                            <div class="col form-group pr-0">


                                            </div>
                                        </div>
                                        @if ($permohonan->berkerja_panel_atau_syarikat == 'Ya')
                                            <div class="d-flex flex-nowrap">
                                                <div class="col-6 form-group p-0">
                                                    <label for="panelBank"><strong>Nama Institusi Kewangan</strong></label>
                                                    <input type="text" class="form-control col-9" disabled
                                                        value="{{ $permohonan->nama_institusi_kewangan }}">

                                                </div>
                                                <div class="col-1"></div>
                                                <div class="col form-group pr-0">
                                                    <label for="bankPhoneNumber"><strong>No. Telefon Institusi
                                                            Kewangan</strong></label>
                                                    <input type="text" class="form-control col-9" disabled
                                                        value="{{ $permohonan->no_telefon_institusi_kewangan }}">

                                                </div>
                                            </div>

                                        @elseif ($permohonan->berkerja_panel_atau_syarikat == 'Tidak')

                                            <div class="d-flex flex-nowrap">
                                                <label>Panel yang Pemohon ikuti.</label>
                                            </div>

                                            <div class="d-flex flex-nowrap">
                                                <div class="col-6 form-group p-0">
                                                    <label for="panelName"><strong>Nama Panel</strong></label>
                                                    <input type="text" class="form-control col-9" disabled
                                                        value="{{ $permohonan->nama_panel }}">

                                                </div>
                                                <div class="col-1"></div>
                                                <div class="col form-group pr-0">
                                                    <label for="panelIcNumber"><strong>No. Kad Pengenalan
                                                            Panel</strong></label>
                                                    <input type="text" class="form-control col-9" disabled
                                                        value="{{ $permohonan->no_kp_panel }}">
                                                </div>
                                            </div>

                                            <div class="d-flex flex-nowrap">
                                                <div class="col-6 form-group p-0">
                                                    <label for="permitNumber"><strong>No. Permit</strong></label>
                                                    <input type="text" class="form-control col-9" disabled
                                                        value="{{ $permohonan->no_permit_panel }}">
                                                </div>
                                                <div class="col-1"></div>
                                                <div class="col form-group pr-0">
                                                    <label for="panelIcNumber"><strong>No. Telefon Panel</strong></label>
                                                    <input type="text" class="form-control col-9" disabled
                                                        value="{{ $permohonan->no_telefon_panel }}">
                                                </div>
                                            </div>

                                        @endif




                                        <div class="d-flex flex-nowrap">
                                            <label>Adakah Pemohon tahu tentang aktiviti pemilikan semula barangan di bawah
                                                Akta
                                                Sewa Beli 1967?</label>
                                        </div>
                                        <div class="d-flex flex-nowrap">
                                            <div class="col-6 form-group p-0">
                                                <label for="permitNumber"><strong>Skop Tugas</strong></label>
                                                <input type="text" class="form-control col-9" disabled
                                                    value="{{ $permohonan->skop_tugas }}">
                                            </div>
                                            <div class="col-1"></div>
                                            <div class="col form-group pr-0">
                                                <label for="panelIcNumber"><strong>Prosedur dan Peraturan
                                                        EPS</strong></label>
                                                <input type="text" class="form-control col-9" disabled
                                                    value="{{ $permohonan->prosedur_peraturan_eps }}">
                                            </div>
                                        </div>

                                        <div class="d-flex flex-nowrap">
                                            <div class="col form-group pr-0">
                                                <label><strong>Lampiran Dokumen</strong></label>
                                                <ol>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <li><label>Salinan Kad Pengenalan (Depan)</label> </li>
                                                        </div>
                                                        <div class="col">
                                                            <button class="btn btn-sm text-white"
                                                                style="background-color: #1d1da1;" (click)="display()"><i
                                                                    class="fas fa-file-alt"></i> Lihat
                                                                Lampiran</button>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <li><label>Salinan Kad Pengenalan (Belakang)</label> </li>
                                                        </div>
                                                        <div class="col">
                                                            <button class="btn btn-sm text-white"
                                                                style="background-color: #1d1da1;" (click)="display()"><i
                                                                    class="fas fa-file-alt"></i> Lihat
                                                                Lampiran</button>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <li><label>Salinan Lesen Memandu</label> </li>
                                                        </div>
                                                        <div class="col">
                                                            <button class="btn btn-sm text-white"
                                                                style="background-color: #1d1da1;" (click)="display()"><i
                                                                    class="fas fa-file-alt"></i> Lihat
                                                                Lampiran</button>
                                                        </div>
                                                    </div>

                                                </ol>
                                            </div>
                                        </div>

                                    @elseif ($permohonan->jenis_permohonan === 'Pembaharuan')
                                        <div class="d-flex flex-nowrap">
                                            <div class="col-6 form-group p-0">
                                                <label for="panelName"><strong>Status Pekerjaan EPS</strong></label>
                                                <input type="text" class="form-control col-9" disabled
                                                    value="{{ $permohonan->status_pekerjaan_eps }}">

                                            </div>
                                            <div class="col-1"></div>
                                            <div class="col form-group pr-0">
                                                <!-- <label for="panelIcNumber"><strong>No. Kad Pengenalan Panel</strong></label>
                                                                                    <input type="text" class="form-control col-9" disabled value="{{ $permohonan->no_kp_panel }}"> -->
                                            </div>
                                        </div>

                                        <div class="d-flex flex-nowrap">

                                            @if ($permohonan->status_pekerjaan_eps === 'sepenuh masa')

                                                <div class="col-6 form-group p-0">
                                                    <label for="panelName"><strong>Tahun Pekerjaan EPS</strong></label>
                                                    <input type="text" class="form-control col-9" disabled
                                                        value="{{ $permohonan->tahun_pekerjaan_eps }}">

                                                </div>
                                                <div class="col-1"></div>

                                            @elseif ( $permohonan->status_pekerjaan_eps === 'pekerjaan sampingan')

                                                <div class="col-6 form-group pr-0">
                                                    <label for="panelIcNumber"><strong>Pekerjaan Tetap
                                                            Pemohon</strong></label>
                                                    <input type="text" class="form-control col-9" disabled
                                                        value="{{ $permohonan->pekerjaan_tetap }}">
                                                </div>

                                            @endif


                                        </div>

                                        <div class="d-flex flex-nowrap">
                                            <div class="col-6 form-group p-0">
                                                <label for="education"><strong>Tahap Pendidikan Tertinggi</strong></label>
                                                <input type="text" class="form-control col-9" disabled
                                                    value="{{ $permohonan->tahap_pendidikan }}">
                                            </div>
                                            <div class="col-1"></div>
                                            <div class="col form-group pr-0">
                                                <label for="licence"><strong>Lesen Memandu yang Sah</strong></label>
                                                <input type="text" class="form-control" disabled
                                                    value="{{ $permohonan->lesen_memandu }}">
                                            </div>
                                        </div>

                                        <div class="d-flex flex-nowrap">
                                            <div class="col-6 form-group p-0">
                                                <label for="question1"><strong>Adakah anda akan bekerja sebagai panel <br>
                                                        bank/syarikat sewa
                                                        beli?</strong></label>
                                                <input type="text" class="form-control col-9" disabled
                                                    value="{{ $permohonan->berkerja_panel_atau_syarikat }}">

                                            </div>
                                            <div class="col-1"></div>
                                            <div class="col form-group pr-0">
                                            </div>
                                        </div>

                                        @if ($permohonan->berkerja_panel_atau_syarikat === 'Ya')

                                            <div class="d-flex flex-nowrap">
                                                <div class="col-6 form-group p-0">
                                                    <label for="panelBank"><strong>Nama Institusi Kewangan</strong></label>
                                                    <input type="text" class="form-control col-9" disabled
                                                        value="{{ $permohonan->nama_institusi_kewangan }}">

                                                </div>
                                                <div class="col-1"></div>
                                                <div class="col form-group pr-0">
                                                    <label for="bankPhoneNumber"><strong>No. Telefon Institusi
                                                            Kewangan</strong></label>
                                                    <input type="text" class="form-control col-9" disabled
                                                        value="{{ $permohonan->no_telefon_institusi_kewangan }}">

                                                </div>
                                            </div>

                                        @elseif ( $permohonan->berkerja_panel_atau_syarikat === "Tidak")

                                            <div class="d-flex flex-nowrap">
                                                <label>Panel yang Pemohon ikuti.</label>
                                            </div>

                                            <div class="d-flex flex-nowrap">
                                                <div class="col-6 form-group p-0">
                                                    <label for="panelName"><strong>Nama Panel</strong></label>
                                                    <input type="text" class="form-control col-9" disabled
                                                        value="{{ $permohonan->nama_panel }}">

                                                </div>
                                                <div class="col-1"></div>
                                                <div class="col form-group pr-0">
                                                    <label for="panelIcNumber"><strong>No. Kad Pengenalan
                                                            Panel</strong></label>
                                                    <input type="text" class="form-control col-9" disabled
                                                        value="{{ $permohonan->no_kp_panel }}">
                                                </div>
                                            </div>

                                            <div class="d-flex flex-nowrap">
                                                <div class="col-6 form-group p-0">
                                                    <label for="permitNumber"><strong>No. Permit</strong></label>
                                                    <input type="text" class="form-control col-9" disabled
                                                        value="{{ $permohonan->no_permit_panel }}">
                                                </div>
                                                <div class="col-1"></div>
                                                <div class="col form-group pr-0">
                                                    <label for="panelIcNumber"><strong>No. Telefon Panel</strong></label>
                                                    <input type="text" class="form-control col-9" disabled
                                                        value="{{ $permohonan->no_telefon_panel }}">
                                                </div>
                                            </div>

                                        @endif

                                        <div class="d-flex flex-nowrap">
                                            <div class="col-6 form-group p-0">
                                                <label for="permitNumber"><strong>Adakah Pemohon pernah menghadiri kursus
                                                        EPS yang dianjurkan oleh KPDNHEP?</strong></label>
                                                <input type="text" class="form-control col-9" disabled
                                                    value="{{ $permohonan->kehadiran_kursus_eps }}">
                                            </div>
                                            <div class="col-1"></div>

                                            @if ($permohonan->kehadiran_kursus_eps === 'Ya')
                                                <div class="col form-group pr-0">
                                                    <label for="panelIcNumber"><strong>Tahun Dihadiri</strong></label>
                                                    <input type="text" class="form-control col-9" disabled
                                                        value="{{ $permohonan->tahun_dihadiri }}">
                                                </div>
                                            @endif

                                        </div>

                                        <div class="d-flex flex-nowrap">
                                            <div class="col form-group pr-0">
                                                <label><strong>Lampiran Dokumen</strong></label>
                                                <ol>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <li><label>Salinan Kad Pengenalan (Depan)</label> </li>
                                                        </div>
                                                        <div class="col">
                                                            <button class="btn btn-sm text-white"
                                                                style="background-color: #1d1da1;" (click)="display()"><i
                                                                    class="fas fa-file-alt"></i> Lihat
                                                                Lampiran</button>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <li><label>Salinan Kad Pengenalan (Belakang)</label> </li>
                                                        </div>
                                                        <div class="col">
                                                            <button class="btn btn-sm text-white"
                                                                style="background-color: #1d1da1;" (click)="display()"><i
                                                                    class="fas fa-file-alt"></i> Lihat
                                                                Lampiran</button>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <li><label>Salinan Lesen Memandu</label> </li>
                                                        </div>
                                                        <div class="col">
                                                            <button class="btn btn-sm text-white"
                                                                style="background-color: #1d1da1;" (click)="display()"><i
                                                                    class="fas fa-file-alt"></i> Lihat
                                                                Lampiran</button>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <li><label>Surat Sokongan (Bank/Syarikat Sewa Beli)</label>
                                                            </li>
                                                        </div>
                                                        <div class="col">
                                                            <button class="btn btn-sm text-white"
                                                                style="background-color: #1d1da1;" (click)="display()"><i
                                                                    class="fas fa-file-alt"></i> Lihat
                                                                Lampiran</button>
                                                        </div>
                                                    </div>

                                                </ol>
                                            </div>
                                        </div>
                                    @elseif ($permohonan->jenis_permohonan === 'Pendua')

                                        <div class="d-flex flex-nowrap">
                                            <div class="col-6 form-group p-0">
                                                <label for="permitNumber"><strong>Alasan Kehilangan</strong></label>
                                                <input type="text" class="form-control col-9" disabled
                                                    value="{{ $permohonan->alasan_kehilangan }}">
                                            </div>
                                            <div class="col-1"></div>
                                            @if ($permohonan->alasan_kehilangan === 'Lain-lain')
                                                <div class="col form-group pr-0">
                                                    <label for="panelIcNumber"><strong>Alasan Lain</strong></label>
                                                    <input type="text" class="form-control col-9" disabled
                                                        value="{{ $permohonan->alasan_lain }}">
                                                </div>
                                            @endif

                                        </div>

                                        <div class="d-flex flex-nowrap">
                                            <div class="col-6 form-group p-0">
                                                <label for="permitNumber"><strong>Penggantian Kali Ke</strong></label>
                                                <input type="text" class="form-control col-9" disabled
                                                    value="{{ $permohonan->penggantian_kali_ke }}">
                                            </div>
                                            <div class="col-1"></div>
                                            <div class="col form-group pr-0">
                                                <!-- <label for="panelIcNumber"><strong>Alasan Lain</strong></label>
                                                                                    <input type="text" class="form-control col-9" disabled value="{{ $permohonan->alasan_lain }}"> -->
                                            </div>
                                        </div>

                                        <div class="d-flex flex-nowrap">
                                            <div class="col-6 form-group p-0">
                                                <label for="permitNumber"><strong>Negeri Laporan Polis
                                                        Dibuat</strong></label>
                                                <input type="text" class="form-control col-9" disabled
                                                    value="{{ $permohonan->negeri_laporan_polis }}">
                                            </div>
                                            <div class="col-1"></div>
                                            <div class="col form-group pr-0">
                                                <label for="panelIcNumber"><strong>No. Repot Polis</strong></label>
                                                <input type="text" class="form-control col-9" disabled
                                                    value="{{ $permohonan->no_laporan_polis }}">
                                            </div>
                                        </div>

                                        <div class="d-flex flex-nowrap">
                                            <div class="col form-group pr-0">
                                                <label><strong>Lampiran Dokumen</strong></label>
                                                <ol>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <li><label>Salinan Kad Pengenalan (Depan)</label> </li>
                                                        </div>
                                                        <div class="col">
                                                            <button class="btn btn-sm text-white"
                                                                style="background-color: #1d1da1;" (click)="display()"><i
                                                                    class="fas fa-file-alt"></i> Lihat
                                                                Lampiran</button>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <li><label>Salinan Kad Pengenalan (Belakang)</label> </li>
                                                        </div>
                                                        <div class="col">
                                                            <button class="btn btn-sm text-white"
                                                                style="background-color: #1d1da1;" (click)="display()"><i
                                                                    class="fas fa-file-alt"></i> Lihat
                                                                Lampiran</button>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <li><label>Salinan Repot Polis</label> </li>
                                                        </div>
                                                        <div class="col">
                                                            <button class="btn btn-sm text-white"
                                                                style="background-color: #1d1da1;" (click)="display()"><i
                                                                    class="fas fa-file-alt"></i> Lihat
                                                                Lampiran</button>
                                                        </div>
                                                    </div>

                                                </ol>
                                            </div>
                                        </div>
                                    @elseif ($permohonan->jenis_permohonan === 'Rayuan')
                                        <div class="d-flex flex-nowrap">
                                            <div class="col-6 form-group p-0">
                                                <label for="permitNumber"><strong>Sebab Permohonan Ditolak</strong></label>
                                                <input type="text" class="form-control col-9" disabled
                                                    value="{{ $permohonan->sebab_permohonan_ditolak }}">
                                            </div>
                                            <div class="col-1"></div>

                                            @if ($permohonan->sebab_permohonan_ditolak === 'Sebab-sebab Lain')
                                                <div class="col form-group pr-0">
                                                    <label for="panelIcNumber"><strong>Sebab Lain</strong></label>
                                                    <input type="text" class="form-control col-9" disabled
                                                        value="{{ $permohonan->sebab_lain }}">
                                                </div>
                                            @endif

                                        </div>

                                        <div class="d-flex flex-nowrap">
                                            <div class="col-6 form-group p-0">
                                                <label for="permitNumber"><strong>Rayuan Kali Ke</strong></label>
                                                <input type="text" class="form-control col-9" disabled
                                                    value="{{ $permohonan->sebab_permohonan_ditolak }}">
                                            </div>
                                            <div class="col-1"></div>
                                            <div class="col form-group pr-0">
                                                <label for="permitNumber"><strong>Alasan Rayuan Dikemukakan</strong></label>
                                                <textarea cols="30" rows="3" class="form-control"
                                                    readonly>{{ $permohonan->alasan_rayuan }}</textarea>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-nowrap">
                                            <div class="col form-group pr-0">
                                                <label><strong>Lampiran Dokumen</strong></label>
                                                <ol>
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <li><label>Salinan Kad Pengenalan (Depan)</label> </li>
                                                        </div>
                                                        <div class="col">
                                                            <button class="btn btn-sm text-white"
                                                                style="background-color: #1d1da1;" (click)="display()"><i
                                                                    class="fas fa-file-alt"></i> Lihat
                                                                Lampiran</button>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <li><label>Salinan Kad Pengenalan (Belakang)</label> </li>
                                                        </div>
                                                        <div class="col">
                                                            <button class="btn btn-sm text-white"
                                                                style="background-color: #1d1da1;" (click)="display()"><i
                                                                    class="fas fa-file-alt"></i> Lihat
                                                                Lampiran</button>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <li><label>Surat Tapisan Rekod Jenayah daripada PDRM Bukit
                                                                    Aman</label> </li>
                                                        </div>
                                                        <div class="col">
                                                            <button class="btn btn-sm text-white"
                                                                style="background-color: #1d1da1;" (click)="display()"><i
                                                                    class="fas fa-file-alt"></i> Lihat
                                                                Lampiran</button>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <li><label>Surat Sokongan daripada Institusi Kewangan</label>
                                                            </li>
                                                        </div>
                                                        <div class="col">
                                                            <button class="btn btn-sm text-white"
                                                                style="background-color: #1d1da1;" (click)="display()"><i
                                                                    class="fas fa-file-alt"></i> Lihat
                                                                Lampiran</button>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <li><label>Dokumen Sokongan Lain 1</label> </li>
                                                        </div>
                                                        <div class="col">
                                                            <button class="btn btn-sm text-white"
                                                                style="background-color: #1d1da1;" (click)="display()"><i
                                                                    class="fas fa-file-alt"></i> Lihat
                                                                Lampiran</button>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <li><label>Dokumen Sokongan Lain 2</label> </li>
                                                        </div>
                                                        <div class="col">
                                                            <button class="btn btn-sm text-white"
                                                                style="background-color: #1d1da1;" (click)="display()"><i
                                                                    class="fas fa-file-alt"></i> Lihat
                                                                Lampiran</button>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <li><label>Dokumen Sokongan Lain 3</label> </li>
                                                        </div>
                                                        <div class="col">
                                                            <button class="btn btn-sm text-white"
                                                                style="background-color: #1d1da1;" (click)="display()"><i
                                                                    class="fas fa-file-alt"></i> Lihat
                                                                Lampiran</button>
                                                        </div>
                                                    </div>

                                                </ol>
                                            </div>
                                        </div>


                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="pt-4">
                @if ($permohonan->status_permohonan === 'hantar')

                    <div class="card card-frame">

                        <div class="card-header" style="background-color: #f5e7f2;">
                            <h6 class="text-uppercade ">Pengesahan Semakan Permohonan</h6>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/permohonan/{{ $permohonan->id }}"
                                class="d-flex justify-content-center font-black" style="width: 100%;">
                                @csrf
                                @method('PUT')
                                <div class="d-flex justify-content-center flex-wrap" fxLayout="column"
                                    fxLayoutAlign="space-evenly stretch" style="width: 100%;">

                                    <div class="p-3" fxLayout="column" fxLayoutAlign="space-evenly stretch"
                                        style="width: 90%;">
                                        @if ($errors->any())
                                            <div class="alert alert-warning text-sm text-start">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="d-flex flex-nowrap">
                                            <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                                <label for="action" class="col-sm-3 ">Tindakan</label>
                                                <div class="col-sm-5">
                                                    <select id="action" class="form-control" name="tindakan" required>
                                                        <option>--Sila Pilih--</option>
                                                        <option value="Permohonan Lengkap">Permohonan Lengkap</option>
                                                        <option value="Permohonan Tidak Lengkap">Permohonan Tidak Lengkap
                                                        </option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-nowrap">
                                            <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                                <label for="catatan" class="col-sm-3 ">Catatan</label>
                                                <div class="col-sm-5">
                                                    <textarea class="form-control" name="catatan_pegawai_negeri"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="jenis_tindakan" value="semakan_permohonan">

                                        <div class="modal fade" id="modal-1" tabindex="-1" role="dialog"
                                            aria-labelledby="modal-default" aria-hidden="true">
                                            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title" id="modal-title-default">Notifikasi</h6>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <p>Pengesahan permohonan akan dihantar.</p>
                                                        <p>Adakah anda pasti mahu menghantar?</p>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-center">
                                                        <button type="button" class="btn btn-danger  ml-auto"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-success text-uppercase ml-auto"
                                                            value="HANTAR">HANTAR</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="p-3 d-flex justify-content-center">
                                            <a href="/permohonan" type="button"
                                                class="btn btn-danger text-uppercase m-1">BATAL</a>
                                            <button type="button" class="btn btn-success text-uppercase m-1"
                                                data-bs-toggle="modal" data-bs-target="#modal-1">HANTAR</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @elseif ($permohonan->status_permohonan === 'hantar_ke_penyokong_negeri')

                    <div class="card card-frame">

                        <div class="card-header" style="background-color: #f5e7f2;">
                            <h6 class="text-uppercade ">Sokongan Permohonan</h6>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/permohonan/{{ $permohonan->id }}"
                                class="d-flex justify-content-center font-black" style="width: 100%;"
                                (ngSubmit)="onSubmit(submit)">
                                @csrf
                                @method('PUT')
                                <div class="d-flex justify-content-center flex-wrap" fxLayout="column"
                                    fxLayoutAlign="space-evenly stretch" style="width: 100%;">

                                    <div class="p-3" fxLayout="column" fxLayoutAlign="space-evenly stretch"
                                        style="width: 90%;">
                                        @if ($permohonan->jenis_permohonan == 'Pembaharuan')
                                            <div class="d-flex flex-nowrap">
                                                <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                                    <label for="" class="col-sm-3 ">Keputusan Tapisan PDRM</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control form-control-sm"
                                                            value="{{ $permohonan->rekod_jenayah }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="d-flex flex-nowrap">
                                            <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                                <label for="action" class="col-sm-3 ">Tindakan</label>
                                                <div class="col-sm-5">
                                                    <select id="sokongan" class="form-control form-control-sm"
                                                        name="tindakan">
                                                        <option>Sila Pilih</option>
                                                        <option value="Disokong">Disokong</option>
                                                        <option value="Tidak Disokong">Tidak Disokong</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
                                        <script type="text/javascript">
                                            $(function() {
                                                $("#sokongan").change(function() {
                                                    if ($(this).val() == "Disokong") {
                                                        $("#dvPassport").show();
                                                    } else {
                                                        $("#dvPassport").hide();
                                                    }
                                                });
                                            });
                                        </script>

                                        <div id="dvPassport" style="display: none">
                                            <div class="d-flex flex-nowrap">
                                                <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                                    <label for="action" class="col-sm-3 ">Tempoh Kelulusan</label>
                                                    <div class="col-sm-5">
                                                        <select id="action" class="form-control form-control-sm"
                                                            name="tempoh_kelulusan">
                                                            <option>Sila Pilih</option>
                                                            <option value="1 tahun">1 Tahun</option>
                                                            <option value="2 tahun">2 Tahun</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-nowrap">
                                            <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                                <label for="comment" class="col-sm-3 ">Catatan</label>
                                                <div class="col-sm-5">
                                                    <textarea class="form-control form-control-sm" id="catatan"
                                                        name="catatan_penyokong"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="jenis_tindakan" value="sokongan_permohonan">

                                        <div class="modal fade" id="modal-4" tabindex="-1" role="dialog"
                                            aria-labelledby="modal-default" aria-hidden="true">
                                            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title" id="modal-title-default">Notifikasi</h6>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <p>Permohonan akan dihantar ke penyokong</p>
                                                        <p>Adakah anda pasti mahu menghantar?</p>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-center">
                                                        <button type="button" class="btn btn-danger  ml-auto"
                                                            data-bs-dismiss="modal">BATAL</button>
                                                        <button type="submit" class="btn btn-success text-uppercase ml-auto"
                                                            value="HANTAR">HANTAR</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="p-3 d-flex justify-content-center">
                                            <a href="/permohonan" type="button"
                                                class="btn btn-danger text-uppercase m-1">BATAL</a>
                                            <button type="button" class="btn btn-success text-uppercase m-1"
                                                data-bs-toggle="modal" data-bs-target="#modal-4">HANTAR</button>

                                        </div>


                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                @elseif ($permohonan->status_permohonan === 'disokong_negeri' || $permohonan->status_permohonan ===
                    'tidak_disokong_negeri')

                    <div class="card card-frame">

                        <div class="card-header" style="background-color: #f5e7f2;">
                            <h6 class="text-uppercade ">Kelulusan Permohonan</h6>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/permohonan/{{ $permohonan->id }}"
                                class="d-flex justify-content-center font-black" style="width: 100%;">
                                @csrf
                                @method('PUT')
                                <div class="d-flex justify-content-center flex-wrap" fxLayout="column"
                                    fxLayoutAlign="space-evenly stretch" style="width: 100%;">

                                    <div class="p-3" fxLayout="column" fxLayoutAlign="space-evenly stretch"
                                        style="width: 90%;">

                                        <div class="d-flex flex-nowrap">
                                            <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                                <label for="" class="col-sm-3 ">Keputusan Tapisan PDRM</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control"
                                                        value="{{ $permohonan->rekod_jenayah }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-nowrap">
                                            <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                                <label for="" class="col-sm-3 ">Syor</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control"
                                                        value="{{ $permohonan->sokongan }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-nowrap">
                                            <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                                <label for="" class="col-sm-3 ">Tempoh Kelulusan</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control"
                                                        value="{{ $permohonan->tempoh_kelulusan }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-nowrap">
                                            <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                                <label for="action" class="col-sm-3 ">Tindakan</label>
                                                <div class="col-sm-5">
                                                    <select id="action" class="form-control" name="tindakan">
                                                        <option selected>Sila Pilih</option>
                                                        <option value="Diluluskan">Diluluskan</option>
                                                        <option value="Tidak Diluluskan">Tidak Diluluskan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="jenis_tindakan" value="kelulusan_permohonan">

                                        <div class="d-flex flex-nowrap">
                                            <div class="form-group row d-flex flex-nowrap" style="width: 100%;">
                                                <label for="comment" class="col-sm-3 ">Catatan</label>
                                                <div class="col-sm-5">
                                                    <textarea class="form-control" id="comment" rows="3"
                                                        name="catatan_pelulus"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="modal-4" tabindex="-1" role="dialog"
                                            aria-labelledby="modal-default" aria-hidden="true">
                                            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title" id="modal-title-default">Notifikasi</h6>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <p>Pengesahan permohonan akan dihantar.</p>
                                                        <p>Adakah anda pasti mahu menghantar?</p>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-center">
                                                        <button type="button" class="btn btn-danger  ml-auto"
                                                            data-bs-dismiss="modal">BATAL</button>
                                                        <button type="submit" class="btn btn-success text-uppercase ml-auto"
                                                            value="HANTAR">HANTAR</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="p-3 d-flex justify-content-center">
                                            <a href="/permohonan" type="button"
                                                class="btn btn-danger text-uppercase m-1">BATAL</a>
                                            <button type="button" class="btn btn-success text-uppercase m-1"
                                                data-bs-toggle="modal" data-bs-target="#modal-4">HANTAR</button>
                                            <!-- <button type="submit" class="btn btn-success text-uppercase m-1" value="HANTAR">HANTAR</button> -->
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                @endif

            </div>

        </div>


    </div>



@stop
