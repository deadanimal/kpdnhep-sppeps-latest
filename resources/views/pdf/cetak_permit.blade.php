<html>

<head>
    <meta http-equiv=Content-Type content="text/html; charset=UTF-8">

    <style type="text/css">
        p {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10px;
            text-transform: uppercase;
            font-weight: bold;
        }

    </style>

</head>

<body>
    {{-- <img src="assets/img/borang/1.png" alt="" height="950px"> --}}
    {{-- //left --}}

    <img src="storage/{{ $permohonan->gambar_pemohon }}" alt="gambar_passport"
        style="height: 95px; width: 80px; position: absolute; left: 258px; top: 185px;">

    {{-- <img src="/assets/img/borang/Capture.PNG" alt="gambar_passport"
        style="height: 95px; position: absolute; left: 258px; top: 185px; border-style: solid;"> --}}

    <div style="position: absolute; left: 65px; top: 190px; width:5cm">
        <p style="font-family: Arial, Helvetica, sans-serif; font-size: 11px; text-transform: uppercase;">
            <small><b>
                    {{-- <strong> --}}
                    <p>Nama: {{ $permohonan->nama }}</p>
                    <p>No Kad Pengenalan: {{ $permohonan->no_kp }}</p>
                    <p>No. Permit: {{ $permohonan->no_permit }}</p>
                    <p>Tempoh Sah Laku: {{ date('d/m/y', strtotime($permohonan->tarikh_diluluskan)) }}
                        -
                        {{ date('d/m/y', strtotime($permohonan->tarikh_tamat_permit)) }} </p>

                    {{-- </strong> --}}
                </b>
            </small>
        </p>
    </div>

    {{-- //right --}}

    <img src="storage/{{ $permohonan->gambar_pemohon }}" alt="gambar_passport"
        style="height: 95px; width: 80px; position: absolute; left: 573px; top: 185px;">

    <div style="position: absolute; left: 380px; top: 190px; width:5cm">
        <p style="font-family: Arial, Helvetica, sans-serif; font-size: 11px; text-transform: uppercase;">
            <small><b>
                    {{-- <strong> --}}
                    <p>Nama: {{ $permohonan->nama }}</p>
                    <p>No Kad Pengenalan: {{ $permohonan->no_kp }}</p>
                    <p>No. Permit: {{ $permohonan->no_permit }}</p>
                    <p>Tempoh Sah Laku: {{ date('d/m/y', strtotime($permohonan->tarikh_diluluskan)) }}
                        -
                        {{ date('d/m/y', strtotime($permohonan->tarikh_tamat_permit)) }} </p>


                    {{-- </strong> --}}
                </b>
            </small>
        </p>
    </div>


</body>

</html>
