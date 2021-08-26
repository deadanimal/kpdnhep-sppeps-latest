{{-- @foreach ($permohonan as $permohonan) --}}
    Nama: {{ $permohonan->nama }} <br>
    No Kad Pengenalan: {{ $permohonan->no_kp }} <br>
    No. Permit: {{ $permohonan->no_permit }} <br>
    Tempoh Sah Laku {{ $permohonan->tarikh_diluluskan }} - {{ $permohonan->tarikh_tamat_permit }}
{{-- @endforeach --}}
