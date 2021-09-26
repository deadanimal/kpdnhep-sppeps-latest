<h5>Notifikasi Peranan Pegawai</h5>

<p>Salam Sejahtera,</p>
<br>
<p>Anda telah diberi peranan bagi sistem SPPEPS sebagai:</p>
<p>
<ul>
    @foreach ($peranan as $peranan)
        <li>
            @if ($peranan->name == 'pemproses_negeri')
                Pegawai pemproses negeri
            @elseif ($peranan->name == "penyokong_negeri")
                Pegawai penyokong negeri
            @elseif ($peranan->name == "pelulus_negeri")
                Pegawai pelulus negeri
            @elseif ($peranan->name == "pemproses_hq")
                Pegawai pemproses HQ
            @elseif ($peranan->name == "penyokong_hq")
                Pegawai penyokong HQ
            @elseif ($peranan->name == "pelulus_hq")
                Pegawai pelulus HQ
            @elseif ($peranan->name == "pentadbir_sistem")
                Pegawai pentadbir sistem
            @elseif ($peranan->name == "pentadbir_pengurusan_maklumat")
                Pegawai pengurusan maklumat
            @elseif ($peranan->name == "penguatkuasa")
                Pegawai penguatkuasa
            @endif
        </li>
    @endforeach

</ul>
</p>
<br>
<br>
<p><strong>Sistem Permohonan Permit Ejen Pemilikan Semula (SPPEPS)</strong></p>
<p><strong>Kementerian Perdagangan Dalam Negeri dan Hal Ehwal Pengguna</strong></p>
<hr>
<p class="font-italic">(Notifikasi ini dihantar secara automatik dari Sistem SPPEPS)</p>
