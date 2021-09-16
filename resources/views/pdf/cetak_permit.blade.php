{{-- @foreach ($permohonan as $permohonan) --}}

<img src="storage/{{ $permohonan->gambar_pemohon }}" alt="gambar_passport" style="height: 100px"><br>
Nama: {{ $permohonan->nama }} <br>
No Kad Pengenalan: {{ $permohonan->no_kp }} <br>
No. Permit: {{ $permohonan->no_permit }} <br>
Tempoh Sah Laku {{ $permohonan->tarikh_diluluskan }} - {{ $permohonan->tarikh_tamat_permit }}
{{-- @endforeach --}}
