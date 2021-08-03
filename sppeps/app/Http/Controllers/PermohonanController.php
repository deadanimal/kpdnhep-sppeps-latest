<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use Illuminate\Http\Request;

class PermohonanController extends Controller
{
    public function index()
    {
        $permohonan = null;
        //
        return view('pemohon.permohonan-baru', [
            'permohonan' => $permohonan
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // dd($request->jantina);
        $permohonan = new Permohonan;

        $permohonan->jenis_permohonan = $request->jenis_permohonan;
        $permohonan->status_permohonan = $request->status_permohonan;

        $permohonan->gambar_profil = $request->gambar_profil;
        $permohonan->nama = $request->nama;
        $permohonan->no_kp = $request->no_kp;
        $permohonan->jantina = $request->jantina;
        $permohonan->umur = $request->umur;
        $permohonan->no_telefon = $request->no_telefon;
        $permohonan->emel = $request->emel;
        $permohonan->alamat1 = $request->alamat1;
        $permohonan->alamat2 = $request->alamat2;
        $permohonan->alamat3 = $request->alamat3;
        $permohonan->poskod = $request->poskod;
        $permohonan->negeri = $request->negeri;
        $permohonan->negeri_kutipan_permit = $request->negeri_kutipan_permit;

        if ($request->jenis_permohonan == 'Baharu') {

            $permohonan->pekerjaan_sekarang = $request->pekerjaan_sekarang;
            $permohonan->tahap_pendidikan = $request->tahap_pendidikan;
            $permohonan->lesen_memandu = $request->lesen_memandu;
            $permohonan->berkerja_panel_atau_syarikat = $request->berkerja_panel_atau_syarikat;
            $permohonan->nama_institusi_kewangan = $request->nama_institusi_kewangan;
            $permohonan->no_telefon_institusi_kewangan = $request->no_telefon_institusi_kewangan;
            $permohonan->nama_panel = $request->nama_panel;
            $permohonan->no_kp_panel = $request->no_kp_panel;
            $permohonan->no_permit_panel = $request->no_permit_panel;
            $permohonan->no_telefon_panel = $request->no_telefon_panel;
            $permohonan->skop_tugas = $request->skop_tugas;
            $permohonan->prosedur_peraturan_eps = $request->prosedur_peraturan_eps;

            $permohonan->salinan_kp_depan = $request->salinan_kp_depan;
            $permohonan->salinan_kp_belakang = $request->salinan_kp_belakang;
            $permohonan->salinan_lesen_memandu = $request->salinan_lesen_memandu;
        }
        else if ($request->jenis_permohonan == 'Pembaharuan') {

            $permohonan->no_permit = $request->no_permit;

            $permohonan->status_pekerjaan_eps = $request->status_pekerjaan_eps;
            $permohonan->tahun_pekerjaan_eps = $request->tahun_pekerjaan_eps;
            $permohonan->pekerjaan_tetap = $request->pekerjaan_tetap;
            $permohonan->tahap_pendidikan = $request->tahap_pendidikan;
            $permohonan->lesen_memandu = $request->lesen_memandu;
            $permohonan->berkerja_panel_atau_syarikat = $request->berkerja_panel_atau_syarikat;
            $permohonan->nama_institusi_kewangan = $request->nama_institusi_kewangan;
            $permohonan->no_telefon_institusi_kewangan = $request->no_telefon_institusi_kewangan;
            $permohonan->nama_panel = $request->nama_panel;
            $permohonan->no_kp_panel = $request->no_kp_panel;
            $permohonan->no_permit_panel = $request->no_permit_panel;
            $permohonan->no_telefon_panel = $request->no_telefon_panel;
            $permohonan->kehadiran_kursus_eps = $request->kehadiran_kursus_eps;
            $permohonan->tahun_dihadiri = $request->tahun_dihadiri;

            $permohonan->salinan_kp_depan = $request->salinan_kp_depan;
            $permohonan->salinan_kp_belakang = $request->salinan_kp_belakang;
            $permohonan->salinan_lesen_memandu = $request->salinan_lesen_memandu;
            $permohonan->salinan_surat_sokongan = $request->salinan_surat_sokongan;
        }
        else if ($request->jenis_permohonan == 'Pendua') {

            $permohonan->no_permit = $request->no_permit;

            $permohonan->alasan_kehilangan = $request->alasan_kehilangan;
            $permohonan->alasan_lain = $request->alasan_lain;
            $permohonan->penggantian_kali_ke = $request->penggantian_kali_ke;
            $permohonan->negeri_laporan_polis = $request->negeri_laporan_polis;
            $permohonan->no_laporan_polis = $request->no_laporan_polis;

            $permohonan->salinan_kp_depan = $request->salinan_kp_depan;
            $permohonan->salinan_kp_belakang = $request->salinan_kp_belakang;
            $permohonan->salinan_laporan_polis = $request->salinan_laporan_polis;

        }
        else if ($request->jenis_permohonan == 'Rayuan') {

            $permohonan->no_permit = $request->no_permit;

            $permohonan->sebab_permohonan_ditolak = $request->sebab_permohonan_ditolak;
            $permohonan->sebab_lain = $request->sebab_lain;
            $permohonan->rayuan_kali_ke = $request->rayuan_kali_ke;
            $permohonan->alasan_rayuan = $request->alasan_rayuan;

            $permohonan->salinan_kp_depan = $request->salinan_kp_depan;
            $permohonan->salinan_kp_belakang = $request->salinan_kp_belakang;
            $permohonan->salinan_tapisan_rekod_jenayah = $request->salinan_tapisan_rekod_jenayah;
            $permohonan->salinan_sokongan_institusi_kewangan = $request->salinan_sokongan_institusi_kewangan;
            $permohonan->salinan_dokumen_sokongan1 = $request->salinan_dokumen_sokongan1;
            $permohonan->salinan_dokumen_sokongan2 = $request->salinan_dokumen_sokongan2;
            $permohonan->salinan_dokumen_sokongan3 = $request->salinan_dokumen_sokongan3;

            

        }


        $permohonan->save();

        return redirect('/dashboard-pemohon');
    }

    public function show(Permohonan $permohonan)
    {
        //
    }

    public function edit(Permohonan $permohonan)
    {
        //
    }

    public function update(Request $request, Permohonan $permohonan)
    {
        //
    }

    public function destroy(Permohonan $permohonan)
    {
        //
    }

    public function semak()
    {
    }

    public function cari()
    {
    }

    public function cetak()
    {
    }

    public function tetap_semula()
    {
    }
}
