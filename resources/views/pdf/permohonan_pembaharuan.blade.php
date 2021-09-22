<html>

<head>
    <meta http-equiv=Content-Type content="text/html; charset=UTF-8">

    <style>
        page[size="A4"] {
            width: 21cm;
            height: 29.7cm;
            /* padding: 30px; */
        }

        /* body{
            margin: 30px;
            margin-top: 30px;
        } */

    </style>

</head>

<body>



    <img src="assets/img/borang/1.png" alt="" height="950px">
    <div style="background-color: white; position: absolute; left: 530px; top: 110px; height:145px; width:200px"></div>
    <img src="storage/{{ $permohonan->gambar_pemohon }}" alt="" height="140px"
        style="position: absolute; left: 540px; top: 110px; border-style: solid;">

    @if ($permohonan->jenis_permohonan === 'Baharu')

        <p style="position: absolute; left: 300px; top: 275px;"><strong>/</strong></p>

    @elseif ($permohonan->jenis_permohonan === 'Pembaharuan')

        <p style="position: absolute; left: 410px; top: 275px;"><strong>/</strong></p>

    @elseif ($permohonan->jenis_permohonan === 'Pendua')

        <p style="position: absolute; left: 555px; top: 275px;"><strong>/</strong></p>

    @endif

    <p style="position: absolute; left: 290px; top: 320px;"><small>{{ $permohonan->nama }}</small> </p>
    <p style="position: absolute; left: 290px; top: 340px;"><small>{{ $permohonan->no_kp }}</small> </p>
    <p style="position: absolute; left: 290px; top: 360px;"><small>{{ $permohonan->alamat1 }}</small> </p>
    <p style="position: absolute; left: 290px; top: 380px;"><small>{{ $permohonan->alamat2 }}</small> </p>
    <p style="position: absolute; left: 290px; top: 400px;"><small>{{ $permohonan->alamat3 }}</small> </p>
    <p style="position: absolute; left: 290px; top: 425px;"><small>{{ $permohonan->negeri }}</small> </p>

    <p style="position: absolute; left: 290px; top: 448px;"><small>{{ $permohonan->umur }}</small> </p>

    <p style="position: absolute; left: 290px; top: 468px;"><small>{{ $user->no_telefon_rumah }}</small> </p>
    <p style="position: absolute; left: 535px; top: 468px;"><small>{{ $user->no_telefon_bimbit }}</small> </p>

    <p style="position: absolute; left: 290px; top: 490px;"><small>{{ $permohonan->emel }}</small> </p>

    @if ($permohonan->jenis_permohonan === 'Pembaharuan')

        <p style="position: absolute; left: 290px; top: 545px;"><small>{{ $user->no_permit }}</small></p>

    @elseif ($permohonan->jenis_permohonan === 'Pendua')

        <p style="position: absolute; left: 290px; top: 545px;"><small>{{ $user->no_permit }}</small></p>

    @endif

    <p style="position: absolute; left: 290px; top: 578px;">
        <small>{{ date('d', strtotime($permohonan->tarikh_tamat_permit)) }}</small>
    </p>
    <p style="position: absolute; left: 380px; top: 578px;">
        <small>{{ date('m', strtotime($permohonan->tarikh_tamat_permit)) }}</small>
    </p>
    <p style="position: absolute; left: 465px; top: 578px;">
        <small>{{ date('Y', strtotime($permohonan->tarikh_tamat_permit)) }}</small>
    </p>

    <p style="position: absolute; left: 490px; top: 775px;"><small>{{ $permohonan->nama }} <br>
            {{ $permohonan->no_kp }}</small> </p>
    <p style="position: absolute; left: 490px; top: 600px;"><small></small> </p>

    {{-- //////////////////////////////////////////// --}}
    <br><br><br>

    <img src="assets/img/borang/2.png" alt="" height="950px">


    @if ($permohonan->rekod_jenayah == 'Ada Rekod Jenayah')
        <p style="position: absolute; left: 120px; top: 105px;"><strong>/</strong> </p>
    @elseif ($permohonan->rekod_jenayah == 'Tiada Rekod Jenayah')
        <p style="position: absolute; left: 400px; top: 105px;"><strong>/</strong> </p>
    @else

    @endif

    @if ($permohonan->sokongan == 'Disokong')
        <span>
            <p style="position: absolute; left: 120px; top: 165px;"><strong>/</strong> </p>
        </span>
    @elseif ($permohonan->sokongan == 'Tidak Disokong')
        <span>
            <p style="position: absolute; left: 400px; top: 165px;"><strong>/</strong> </p>
        </span>
    @else

    @endif

    {{-- <p style="position: absolute; left: 120px; top: 245px;"><small>{{ $permohonan->tempoh_kelulusan }}</small> </p> --}}
    <p style="position: absolute; left: 120px; top: 245px;">
        <small>{{ Str::limit($permohonan->tempoh_kelulusan, 2, '') }}</small>
    </p>

    <p style="position: absolute; left: 325px; top: 245px;">
        <small>{{ date('d/m/Y', strtotime($permohonan->tarikh_diluluskan)) }}</small>
    </p>
    <p style="position: absolute; left: 470px; top: 245px;">
        <small>{{ date('d/m/Y', strtotime($permohonan->tarikh_tamat_permit)) }}</small>
    </p>

    <p style="position: absolute; left: 220px; top: 460px;">
        <small>{{ $user->no_permit }}</small>
    </p>

    <p style="position: absolute; left: 290px; top: 485px;">
        <small>{{ $permohonan->no_siri }}</small>
    </p>

    @if ($permohonan->status_permohonan == 'Diluluskan')
        <p style="position: absolute; left: 120px; top: 590px;"><strong>/</strong> </p>
    @elseif ($permohonan->status_permohonan == 'Tidak Diluluskan')
        <p style="position: absolute; left: 400px; top: 590px;"><strong>/</strong> </p>
    @else

    @endif

    <p style="position: absolute; left: 130px; top: 645px;">
        <small>{{ $permohonan->catatan_pelulus }}</small>
    </p>



    {{-- //////////////////////////////////////////// --}}
    <br><br><br>

    <img src="assets/img/borang/4.png" alt="" height="750px">

    <p style="position: absolute; left: 270px; top: 70px;"><small>{{ $permohonan->nama }}</small> </p>

    @if ($permohonan->jantina == 'Lelaki')
        <p style="position: absolute; left: 365px; top: 95px;"><strong>/</strong> </p>
    @elseif ($permohonan->jantina == 'Perempuan')
        <p style="position: absolute; left: 590px; top: 95px;"><strong>/</strong> </p>
    @else

    @endif

    @if ($permohonan->status_pekerjaan_eps == 'sepenuh masa')
        <p style="position: absolute; left: 460px; top: 130px;"><strong>/</strong> </p>
        <p style="position: absolute; left: 580px; top: 130px;">
            <small>{{ $permohonan->tahun_pekerjaan_eps }}</small>
        </p>
    @elseif ($permohonan->status_pekerjaan_eps == 'pekerjaan sampingan')
        <p style="position: absolute; left: 460px; top: 160px;"><strong>/</strong> </p>
        <p style="position: absolute; left: 500px; top: 190px;"><strong>{{ $permohonan->pekerjaan_tetap }}</strong>
        </p>
    @else

    @endif

    @if ($permohonan->tahap_pendidikan == 'Tiada')
        <p style="position: absolute; left: 325px; top: 228px;"><strong>/</strong> </p>
    @elseif ($permohonan->tahap_pendidikan == 'Darjah 6')
        <p style="position: absolute; left: 325px; top: 260px;"><strong>/</strong> </p>
    @elseif ($permohonan->tahap_pendidikan == 'PMR')
        <p style="position: absolute; left: 420px; top: 228px;"><strong>/</strong> </p>
    @elseif ($permohonan->tahap_pendidikan == 'SPM')
        <p style="position: absolute; left: 420px; top: 260px;"><strong>/</strong> </p>
    @elseif ($permohonan->tahap_pendidikan == 'Diploma')
        <p style="position: absolute; left: 520px; top: 228px;"><strong>/</strong> </p>
    @elseif ($permohonan->tahap_pendidikan == 'Ijazah/Master')
        <p style="position: absolute; left: 520px; top: 260px;"><strong>/</strong> </p>
    @else

    @endif


    @foreach ($lesen as $lesen)
        @if ($lesen == 'B1')
            <p style="position: absolute; left: 325px; top: 295px;"><strong>/</strong> </p>
        @elseif ($lesen == 'B2')
            <p style="position: absolute; left: 385px; top: 295px;"><strong>/</strong> </p>
        @elseif ($lesen == 'D')
            <p style="position: absolute; left: 430px; top: 295px;"><strong>/</strong> </p>
        @elseif ($lesen == 'E')
            <p style="position: absolute; left: 472px; top: 295px;"><strong>/</strong> </p>
        @elseif ($lesen == 'F')
            <p style="position: absolute; left: 520px; top: 295px;"><strong>/</strong> </p>
        @else

        @endif
    @endforeach



    @if ($permohonan->berkerja_panel_atau_syarikat == 'Ya')
        <p style="position: absolute; left: 300px; top: 335px;"><strong>/</strong> </p>
        <p style="position: absolute; left: 480px; top: 335px;">
            <small>{{ $permohonan->nama_institusi_kewangan }}</small>
        </p>
        <p style="position: absolute; left: 550px; top: 348px;">
            <small>{{ $permohonan->no_telefon_institusi_kewangan }}</small>
        </p>
    @elseif ($permohonan->berkerja_panel_atau_syarikat == 'Tidak')
        <p style="position: absolute; left: 300px; top: 395px;"><strong>/</strong> </p>
        <p style="position: absolute; left: 435px; top: 435px;"><small> {{ $permohonan->nama_panel }}</small> </p>
        <p style="position: absolute; left: 435px; top: 455px;"><small> {{ $permohonan->no_kp_panel }}</small> </p>
        <p style="position: absolute; left: 435px; top: 475px;"><small> {{ $permohonan->no_permit_panel }}</small>
        </p>
        <p style="position: absolute; left: 435px; top: 495px;"><small> {{ $permohonan->no_telefon_panel }}</small>
        </p>

    @endif


    @if ($permohonan->kehadiran_kursus_eps == 'Ya')
        <p style="position: absolute; left: 305px; top: 540px;"><strong>/</strong> </p>
        <p style="position: absolute; left: 450px; top: 540px;"><small>{{ $permohonan->tahun_dihadiri }}</small> </p>
    @elseif ($permohonan->kehadiran_kursus_eps == 'Tidak')
        <p style="position: absolute; left: 305px; top: 565px;"><strong>/</strong> </p>
    @endif


</body>

</html>
