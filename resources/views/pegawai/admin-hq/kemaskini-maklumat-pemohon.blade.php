@extends('layouts.base-admin-hq')

@section('content')

    <div class="container-fluid py-4">

        <div class="card card-frame">
            <div class="card-header" style="background-color: #f5e7f2;">
                <h6 class="text-uppercade ">Kemaskini Permohonan</h6>
            </div>


            <div class="card-body">
                @foreach ($permohonan as $permohonan)
                    <form method="POST" action="/pengurusan-data/{{ $permohonan->id }}"
                        class="d-flex justify-content-center font-black" style="width: 100%;">
                        @csrf
                        @method('PUT')
                        <div class="d-flex justify-content-center flex-wrap" fxLayout="column"
                            fxLayoutAlign="space-evenly stretch" style="width: 100%;">




                            <div class="p-3" fxLayout="column" fxLayoutAlign="space-evenly stretch" style="width: 90%;">
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
                                            <input type="text" class="form-control col-9" value="{{ $permohonan->nama }}"
                                                readonly name="nama">
                                        </div>
                                    </div>
                                    <div class="col-1"></div>
                                    <div class="col form-group pr-0">
                                        <label for="ic"><strong> No. Kad Pengenalan</strong></label>
                                        <input type="text" class="form-control" value="{{ $permohonan->no_kp }}" readonly name="no_kp">
                                    </div>
                                </div>

                                <div class="d-flex flex-nowrap">
                                    <div class="col-6 form-group p-0">
                                        <label for="age"><strong> Umur</strong></label>
                                        <input type="text" class="form-control col-9" value="{{ $permohonan->umur }}"
                                            readonly name="umur">

                                    </div>
                                    <div class="col-1"></div>
                                    <div class="col form-group pr-0">
                                        <label for="gender"><strong> Jantina</strong></label>
                                        <input type="text" class="form-control" value="{{ $permohonan->jantina }}"
                                            readonly name="jantina">
                                    </div>
                                </div>

                                <div class="d-flex flex-nowrap pb-2">
                                    <div class="col-6 form-group p-0">
                                        <label for="address"><strong> Alamat</strong></label>
                                        <input type="text" class="col-9 form-control" value="{{ $permohonan->alamat1 }}" name="alamat1"
                                            >
                                        <input type="text" class="col-9 form-control" value="{{ $permohonan->alamat2 }}" name="alamat2"
                                            >
                                        <input type="text" class="col-9 form-control" value="{{ $permohonan->alamat3 }}" name="alamat3"
                                            >
                                    </div>
                                    <div class="col-1"></div>
                                    <div class="col pr-0">
                                        <div class="form-group">
                                            <label for="">
                                                <strong> Poskod</strong>
                                            </label>
                                            <input type="text" class="form-control" value="{{ $permohonan->poskod }}"
                                                 name="poskod">
                                        </div>
                                        <div class="form-group">
                                            <label for="state">
                                                <strong>Negeri</strong>
                                            </label>
                                            <input type="text" class="form-control" value="{{ $permohonan->negeri }}"
                                                 name="negeri">
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex flex-nowrap">
                                    <div class="col-6 form-group p-0">
                                        <label for="phoneNumber"><strong>No. Telefon</strong></label>
                                        <input type="text" class="form-control" 
                                            value="{{ $permohonan->no_telefon }}" name="no_telefon">
                                    </div>
                                    <div class="col-1"></div>
                                    <div class="col form-group pr-0">
                                        <label for="email"><strong> E-mel</strong></label>
                                        <input type="email" class="form-control" readonly
                                            value="{{ $permohonan->emel }}" name="emel">
                                    </div>
                                </div>

                                <div class="d-flex flex-nowrap">
                                    <div class="col-6 form-group p-0">
                                        <label for="state"><strong>Negeri Kutipan Permit</strong></label>
                                        <input type="text" class="form-control col-9" 
                                            value="{{ $permohonan->negeri_kutipan_permit }}" name="negeri_kutipan_permit">

                                    </div>
                                    <div class="col-1"></div>
                                    @if ($permohonan->jenis_permohonan === 'Pembaharuan' || $permohonan->jenis_permohonan === 'Pendua' || $permohonan->jenis_permohonan === 'Rayuan')
                                        <div class="col form-group pr-0">
                                            <label for="state"><strong>No. Permit</strong></label>
                                            <input type="text" class="form-control col-9" readonly
                                                value="{{ $permohonan->no_permit }}" name="no_permit">
                                        </div>
                                    @endif
                                </div>
                                @if ($permohonan->jenis_permohonan === 'Baharu')

                                    <div class="d-flex flex-nowrap">
                                        <div class="col-6 form-group p-0">
                                            <label for="occupation"><strong>Pekerjaan Sekarang</strong></label>
                                            <input type="text" class="form-control col-9" 
                                                value="{{ $permohonan->pekerjaan_sekarang }}" name="pekerjaan_sekarang">
                                        </div>
                                        <div class="col-1"></div>
                                        <div class="col form-group pr-0">

                                        </div>
                                    </div>
                                    <div class="d-flex flex-nowrap">
                                        <div class="col-6 form-group p-0">
                                            <label for="education"><strong>Tahap Pendidikan Tertinggi</strong></label>
                                            <input type="text" class="form-control col-9" 
                                                value="{{ $permohonan->tahap_pendidikan }}" name="tahap_pendidikan">
                                        </div>
                                        <div class="col-1"></div>
                                        <div class="col form-group pr-0">
                                            <label for="licence"><strong>Lesen Memandu yang Sah</strong></label>
                                            <input type="text" class="form-control" 
                                                value="{{ $permohonan->lesen_memandu }}" name="lesen_memandu">
                                        </div>
                                    </div>

                                    <div class="d-flex flex-nowrap">
                                        <div class="col-6 form-group p-0">
                                            <label for="question1"><strong>Adakah anda akan bekerja sebagai panel <br>
                                                    bank/syarikat sewa
                                                    beli?</strong></label>
                                            <input type="text" class="form-control col-9" 
                                                value="{{ $permohonan->berkerja_panel_atau_syarikat }}" name="berkerja_panel_atau_syarikat">

                                        </div>
                                        <div class="col-1"></div>
                                        <div class="col form-group pr-0">


                                        </div>
                                    </div>
                                    @if ($permohonan->berkerja_panel_atau_syarikat == 'Ya')
                                        <div class="d-flex flex-nowrap">
                                            <div class="col-6 form-group p-0">
                                                <label for="panelBank"><strong>Nama Institusi Kewangan</strong></label>
                                                <input type="text" class="form-control col-9" 
                                                    value="{{ $permohonan->nama_institusi_kewangan }}" name="nama_institusi_kewangan">

                                            </div>
                                            <div class="col-1"></div>
                                            <div class="col form-group pr-0">
                                                <label for="bankPhoneNumber"><strong>No. Telefon Institusi
                                                        Kewangan</strong></label>
                                                <input type="text" class="form-control col-9" 
                                                    value="{{ $permohonan->no_telefon_institusi_kewangan }}" name="no_telefon_institusi_kewangan">

                                            </div>
                                        </div>

                                    @elseif ($permohonan->berkerja_panel_atau_syarikat == 'Tidak')

                                        <div class="d-flex flex-nowrap">
                                            <label>Panel yang Pemohon ikuti.</label>
                                        </div>

                                        <div class="d-flex flex-nowrap">
                                            <div class="col-6 form-group p-0">
                                                <label for="panelName"><strong>Nama Panel</strong></label>
                                                <input type="text" class="form-control col-9" 
                                                    value="{{ $permohonan->nama_panel }}" name="nama_panel">

                                            </div>
                                            <div class="col-1"></div>
                                            <div class="col form-group pr-0">
                                                <label for="panelIcNumber"><strong>No. Kad Pengenalan
                                                        Panel</strong></label>
                                                <input type="text" class="form-control col-9" 
                                                    value="{{ $permohonan->no_kp_panel }}" name="no_kp_panel">
                                            </div>
                                        </div>

                                        <div class="d-flex flex-nowrap">
                                            <div class="col-6 form-group p-0">
                                                <label for="permitNumber"><strong>No. Permit</strong></label>
                                                <input type="text" class="form-control col-9" 
                                                    value="{{ $permohonan->no_permit_panel }}" name="no_permit_panel">
                                            </div>
                                            <div class="col-1"></div>
                                            <div class="col form-group pr-0">
                                                <label for="panelIcNumber"><strong>No. Telefon Panel</strong></label>
                                                <input type="text" class="form-control col-9" 
                                                    value="{{ $permohonan->no_telefon_panel }}" name="no_telefon_panel">
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
                                            <input type="text" class="form-control col-9" 
                                                value="{{ $permohonan->skop_tugas }}" name="skop_tugas">
                                        </div>
                                        <div class="col-1"></div>
                                        <div class="col form-group pr-0">
                                            <label for="panelIcNumber"><strong>Prosedur dan Peraturan
                                                    EPS</strong></label>
                                            <input type="text" class="form-control col-9" 
                                                value="{{ $permohonan->prosedur_peraturan_eps }}" name="prosedur_peraturan_eps">
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
                                            <input type="text" class="form-control col-9" 
                                                value="{{ $permohonan->status_pekerjaan_eps }}" name="status_pekerjaan_eps">

                                        </div>
                                        <div class="col-1"></div>
                                        <div class="col form-group pr-0">
                                            <!-- <label for="panelIcNumber"><strong>No. Kad Pengenalan Panel</strong></label>
                                                                <input type="text" class="form-control col-9" readonly value="{{ $permohonan->no_kp_panel }}"> -->
                                        </div>
                                    </div>

                                    <div class="d-flex flex-nowrap">

                                        @if ($permohonan->status_pekerjaan_eps === 'sepenuh masa')

                                            <div class="col-6 form-group p-0">
                                                <label for="panelName"><strong>Tahun Pekerjaan EPS</strong></label>
                                                <input type="text" class="form-control col-9" 
                                                    value="{{ $permohonan->tahun_pekerjaan_eps }}" name="tahun_pekerjaan_eps">

                                            </div>
                                            <div class="col-1"></div>

                                        @elseif ( $permohonan->status_pekerjaan_eps === 'pekerjaan sampingan')

                                            <div class="col-6 form-group pr-0">
                                                <label for="panelIcNumber"><strong>Pekerjaan Tetap
                                                        Pemohon</strong></label>
                                                <input type="text" class="form-control col-9" 
                                                    value="{{ $permohonan->pekerjaan_tetap }}" name="pekerjaan_tetap">
                                            </div>

                                        @endif


                                    </div>

                                    <div class="d-flex flex-nowrap">
                                        <div class="col-6 form-group p-0">
                                            <label for="education"><strong>Tahap Pendidikan Tertinggi</strong></label>
                                            <input type="text" class="form-control col-9" 
                                                value="{{ $permohonan->tahap_pendidikan }}" name="tahap_pendidikan">
                                        </div>
                                        <div class="col-1"></div>
                                        <div class="col form-group pr-0">
                                            <label for="licence"><strong>Lesen Memandu yang Sah</strong></label>
                                            <input type="text" class="form-control" 
                                                value="{{ $permohonan->lesen_memandu }}" name="lesen_memandu">
                                        </div>
                                    </div>

                                    <div class="d-flex flex-nowrap">
                                        <div class="col-6 form-group p-0">
                                            <label for="question1"><strong>Adakah anda akan bekerja sebagai panel <br>
                                                    bank/syarikat sewa
                                                    beli?</strong></label>
                                            <input type="text" class="form-control col-9" 
                                                value="{{ $permohonan->berkerja_panel_atau_syarikat }}" name="berkerja_panel_atau_syarikat">

                                        </div>
                                        <div class="col-1"></div>
                                        <div class="col form-group pr-0">
                                        </div>
                                    </div>

                                    @if ($permohonan->berkerja_panel_atau_syarikat === 'Ya')

                                        <div class="d-flex flex-nowrap">
                                            <div class="col-6 form-group p-0">
                                                <label for="panelBank"><strong>Nama Institusi Kewangan</strong></label>
                                                <input type="text" class="form-control col-9" 
                                                    value="{{ $permohonan->nama_institusi_kewangan }}" name="nama_institusi_kewangan">

                                            </div>
                                            <div class="col-1"></div>
                                            <div class="col form-group pr-0">
                                                <label for="bankPhoneNumber"><strong>No. Telefon Institusi
                                                        Kewangan</strong></label>
                                                <input type="text" class="form-control col-9" 
                                                    value="{{ $permohonan->no_telefon_institusi_kewangan }}" name="no_telefon_institusi_kewangan">

                                            </div>
                                        </div>

                                    @elseif ( $permohonan->berkerja_panel_atau_syarikat === "Tidak")

                                        <div class="d-flex flex-nowrap">
                                            <label>Panel yang Pemohon ikuti.</label>
                                        </div>

                                        <div class="d-flex flex-nowrap">
                                            <div class="col-6 form-group p-0">
                                                <label for="panelName"><strong>Nama Panel</strong></label>
                                                <input type="text" class="form-control col-9" 
                                                    value="{{ $permohonan->nama_panel }}" name="nama_panel">

                                            </div>
                                            <div class="col-1"></div>
                                            <div class="col form-group pr-0">
                                                <label for="panelIcNumber"><strong>No. Kad Pengenalan
                                                        Panel</strong></label>
                                                <input type="text" class="form-control col-9" 
                                                    value="{{ $permohonan->no_kp_panel }}" name="no_kp_panel">
                                            </div>
                                        </div>

                                        <div class="d-flex flex-nowrap">
                                            <div class="col-6 form-group p-0">
                                                <label for="permitNumber"><strong>No. Permit</strong></label>
                                                <input type="text" class="form-control col-9" 
                                                    value="{{ $permohonan->no_permit_panel }}" name="no_permit_panel">
                                            </div>
                                            <div class="col-1"></div>
                                            <div class="col form-group pr-0">
                                                <label for="panelIcNumber"><strong>No. Telefon Panel</strong></label>
                                                <input type="text" class="form-control col-9" 
                                                    value="{{ $permohonan->no_telefon_panel }}" name="no_telefon_panel">
                                            </div>
                                        </div>

                                    @endif

                                    <div class="d-flex flex-nowrap">
                                        <div class="col-6 form-group p-0">
                                            <label for="permitNumber"><strong>Adakah Pemohon pernah menghadiri kursus
                                                    EPS yang dianjurkan oleh KPDNHEP?</strong></label>
                                            <input type="text" class="form-control col-9" 
                                                value="{{ $permohonan->kehadiran_kursus_eps }}" name="kehadiran_kursus_eps">
                                        </div>
                                        <div class="col-1"></div>

                                        @if ($permohonan->kehadiran_kursus_eps === 'Ya')
                                            <div class="col form-group pr-0">
                                                <label for="panelIcNumber"><strong>Tahun Dihadiri</strong></label>
                                                <input type="text" class="form-control col-9" 
                                                    value="{{ $permohonan->tahun_dihadiri }}" name="tahun_dihadiri">
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
                                            <input type="text" class="form-control col-9" 
                                                value="{{ $permohonan->alasan_kehilangan }}" name="alasan_kehilangan">
                                        </div>
                                        <div class="col-1"></div>
                                        @if ($permohonan->alasan_kehilangan === 'Lain-lain')
                                            <div class="col form-group pr-0">
                                                <label for="panelIcNumber"><strong>Alasan Lain</strong></label>
                                                <input type="text" class="form-control col-9" 
                                                    value="{{ $permohonan->alasan_lain }}" name="alasan_lain">
                                            </div>
                                        @endif

                                    </div>

                                    <div class="d-flex flex-nowrap">
                                        <div class="col-6 form-group p-0">
                                            <label for="permitNumber"><strong>Penggantian Kali Ke</strong></label>
                                            <input type="text" class="form-control col-9" 
                                                value="{{ $permohonan->penggantian_kali_ke }}" name="penggantian_kali_ke">
                                        </div>
                                        <div class="col-1"></div>
                                        <div class="col form-group pr-0">
                                            <!-- <label for="panelIcNumber"><strong>Alasan Lain</strong></label>
                                                                <input type="text" class="form-control col-9" readonly value="{{ $permohonan->alasan_lain }}"> -->
                                        </div>
                                    </div>

                                    <div class="d-flex flex-nowrap">
                                        <div class="col-6 form-group p-0">
                                            <label for="permitNumber"><strong>Negeri Laporan Polis
                                                    Dibuat</strong></label>
                                            <input type="text" class="form-control col-9" 
                                                value="{{ $permohonan->negeri_laporan_polis }}" name="negeri_laporan_polis">
                                        </div>
                                        <div class="col-1"></div>
                                        <div class="col form-group pr-0">
                                            <label for="panelIcNumber"><strong>No. Repot Polis</strong></label>
                                            <input type="text" class="form-control col-9" 
                                                value="{{ $permohonan->no_laporan_polis }}" name="no_laporan_polis">
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
                                            <input type="text" class="form-control col-9" 
                                                value="{{ $permohonan->sebab_permohonan_ditolak }}" name="sebab_permohonan_ditolak">
                                        </div>
                                        <div class="col-1"></div>

                                        @if ($permohonan->sebab_permohonan_ditolak === 'Sebab-sebab Lain')
                                            <div class="col form-group pr-0">
                                                <label for="panelIcNumber"><strong>Sebab Lain</strong></label>
                                                <input type="text" class="form-control col-9" 
                                                    value="{{ $permohonan->sebab_lain }}" name="sebab_lain">
                                            </div>
                                        @endif

                                    </div>

                                    <div class="d-flex flex-nowrap">
                                        <div class="col-6 form-group p-0">
                                            <label for="permitNumber"><strong>Rayuan Kali Ke</strong></label>
                                            <input type="text" class="form-control col-9" 
                                                value="{{ $permohonan->sebab_permohonan_ditolak }}" name="sebab_permohonan_ditolak">
                                        </div>
                                        <div class="col-1"></div>
                                        <div class="col form-group pr-0">
                                            <label for="permitNumber"><strong>Alasan Rayuan Dikemukakan</strong></label>
                                            <textarea cols="30" rows="3" class="form-control"
                                                 name="alasan_rayuan">{{ $permohonan->alasan_rayuan }}</textarea>
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


                            <div class="p-3 d-flex justify-content-center">
                                <!-- <input type="button" class="btn text-uppercase" style="background-color: #1d1da1; border-radius:25px" value="Batal" (click)="back()"> -->
                                <input type="submit" class="btn bg-gradient-success btn-lg text-uppercase" value="Simpan"
                                    >


                            </div>

                        </div>
                    </form>
                @endforeach
            </div>
        </div>

    </div>
@stop
