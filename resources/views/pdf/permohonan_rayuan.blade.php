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

    <img src="assets/img/borang/6.png" alt="" height="510px">

    <p style="position: absolute; left: 250px; top: 60px;"><small>{{ $permohonan->nama }}</small> </p>

    @if ($permohonan->jantina == 'Lelaki')
        <p style="position: absolute; left: 355px; top: 85px;"><strong>/</strong> </p>
    @elseif ($permohonan->jantina == 'Perempuan')
        <p style="position: absolute; left: 545px; top: 85px;"><strong>/</strong> </p>
    @else

    @endif


    @if ($permohonan->sebab_permohonan_ditolak == 'Gagal tapisan')
        <p style="position: absolute; left: 545px; top: 115px;"><strong>/</strong> </p>

    @elseif ($permohonan->sebab_permohonan_ditolak == 'Tiada surat sokongan')
        <p style="position: absolute; left: 545px; top: 145px;"><strong>/</strong> </p>

    @elseif ($permohonan->sebab_permohonan_ditolak == 'Sebab-sebab Lain')
        <p style="position: absolute; left: 545px; top: 175px;"><strong>/</strong> </p>

    @else

    @endif


    @if ($permohonan->rayuan_kali_ke == '1')

        <p style="position: absolute; left: 315px; top: 230px;"><strong>/</strong> </p>

    @elseif ($permohonan->rayuan_kali_ke == '2')

        <p style="position: absolute; left: 395px; top: 230px;"><strong>/</strong> </p>

    @elseif ($permohonan->rayuan_kali_ke == '3')
        <p style="position: absolute; left: 540px; top: 230px;"><strong>/</strong> </p>
    @elseif ($permohonan->rayuan_kali_ke == '4')
        <p style="position: absolute; left: 315px; top: 260px;"><strong>/</strong> </p>
    @elseif ($permohonan->rayuan_kali_ke == '5')
        <p style="position: absolute; left: 395px; top: 260px;"><strong>/</strong> </p>
    @elseif ($permohonan->rayuan_kali_ke == '6')
        <p style="position: absolute; left: 540px; top: 260px;"><strong>/</strong> </p>
    @else

    @endif

    <p style="position: absolute; left: 250px; top: 290px;"><small>aaa{{ $permohonan->alasan_rayuan }}</small>
    </p>

    {{-- <p style="position: absolute; left: 250px; top: 330px;"><small>{{ $permohonan->no_laporan_polis }}</small> </p> --}}


</body>

</html>
