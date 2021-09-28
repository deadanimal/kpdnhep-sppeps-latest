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
    <img src="storage/{{ $permohonan->gambar_pemohon }}" alt="" height="140px" width="100px"
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
        @if ($permohonan->tarikh_diluluskan != null)
            <small>{{ date('d/m/Y', strtotime($permohonan->tarikh_diluluskan)) }}</small>
        @endif

    </p>
    <p style="position: absolute; left: 470px; top: 245px;">
        @if ($permohonan->tarikh_tamat_permit != null)
            <small>{{ date('d/m/Y', strtotime($permohonan->tarikh_tamat_permit)) }}</small>
        @endif

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
    <br><br><br><br>

    <img src="assets/img/borang/5.png" alt="" height="400px">

    <p style="position: absolute; left: 250px; top: 70px;"><small>{{ $permohonan->nama }}</small> </p>

    @if ($permohonan->jantina == 'Lelaki')
        <p style="position: absolute; left: 360px; top: 95px;"><strong>/</strong> </p>
    @elseif ($permohonan->jantina == 'Perempuan')
        <p style="position: absolute; left: 550px; top: 95px;"><strong>/</strong> </p>
    @else

    @endif

    @if ($permohonan->alasan_kehilangan == 'Kecurian')
        {{-- curi --}}
        <p style="position: absolute; left: 360px; top: 125px;"><strong>/</strong> </p>

    @elseif ($permohonan->alasan_kehilangan == 'Kebakaran')
        {{-- bakar --}}
        <p style="position: absolute; left: 360px; top: 170px;"><strong>/</strong> </p>

    @elseif ($permohonan->alasan_kehilangan == 'Keciciran')
        {{-- cicir --}}
        <p style="position: absolute; left: 545px; top: 130px;"><strong>/</strong> </p>

    @elseif ($permohonan->alasan_kehilangan == 'Lain-lain')
        {{-- lain2 --}}
        <p style="position: absolute; left: 545px; top: 170px;"><strong>/</strong> </p>
        <p style="position: absolute; left: 430px; top: 205px;"><small>{{ $permohonan->alasan_lain }}</small> </p>
    @else

    @endif

    @if ($permohonan->penggantian_kali_ke == '1')

        <p style="position: absolute; left: 315px; top: 230px;"><strong>/</strong> </p>

    @elseif ($permohonan->penggantian_kali_ke == '2')

        <p style="position: absolute; left: 395px; top: 230px;"><strong>/</strong> </p>

    @elseif ($permohonan->penggantian_kali_ke == '3')
        <p style="position: absolute; left: 540px; top: 230px;"><strong>/</strong> </p>
    @elseif ($permohonan->penggantian_kali_ke == '4')
        <p style="position: absolute; left: 315px; top: 260px;"><strong>/</strong> </p>
    @elseif ($permohonan->penggantian_kali_ke == '5')
        <p style="position: absolute; left: 395px; top: 260px;"><strong>/</strong> </p>
    @elseif ($permohonan->penggantian_kali_ke == '6')
        <p style="position: absolute; left: 540px; top: 260px;"><strong>/</strong> </p>
    @else

    @endif

    <p style="position: absolute; left: 250px; top: 300px;"><small>{{ $permohonan->negeri_laporan_polis }}</small>
    </p>

    <p style="position: absolute; left: 250px; top: 330px;"><small>{{ $permohonan->no_laporan_polis }}</small> </p>


</body>

</html>
