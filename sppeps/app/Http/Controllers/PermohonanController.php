<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewPermohonan;
use App\Mail\PermohonanTidakLengkap;
use App\Mail\KelulusanPermohonan;
use App\Mail\SemakanPDRM;
use App\Mail\PermohonanPemohon;
use League\CommonMark\Node\Inline\Newline;

class PermohonanController extends Controller
{
    public function index(Request $request)
    {

        $user = $request->user();
        $user_role = $user->role;
        $user_id = $user->id;

        if ($user_role == 'pegawai_negeri') {
            $permohonan = Permohonan::whereIn('status_permohonan', ['hantar', 'hantar ke penyokong'])->get();

            return view('pegawai.negeri.negeri-tugasan-baru', [
                'permohonan' => $permohonan
            ]);
        } else if ($user_role == 'pegawai_hq') {
            $permohonan = Permohonan::whereIn('status_permohonan', ['Permohonan Lengkap', 'disemak pdrm', 'Disokong', 'Tidak Disokong'])->get();

            return view('pegawai.hq.hq-tugasan-baru', [
                'permohonan' => $permohonan
            ]);
        } else if ($user_role == 'pegawai_pdrm') {
            $permohonan = Permohonan::whereIn('status_permohonan', ['hantar ke pdrm', 'Dalam Proses'])->get();
            // $permohonan = Permohonan::whereIn('status_permohonan', ['hantar', 'Permohonan Lengkap'])->get();

            return view('pegawai.pdrm.pdrm-tugasan-baru', [
                'permohonan' => $permohonan
            ]);
        } else if ($user_role == 'pentadbir') {
            $permohonan = Permohonan::where('status_permohonan', 'disemak')->get();
        } else if ($user_role == 'pemohon') {
            $permohonan = Permohonan::where('user_id', $user_id)->get();
            return view('pemohon.status-permohonan', [
                'permohonan' => $permohonan
            ]);
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        // $p_negeri = User::where('role', 'pegawai_negeri')->get();

        // dd($p_negeri);
        // dd($request->input('lesen_memandu'));

        $user = $request->user();
        $user_id = $user->id;

        $permohonan = new Permohonan;

        $permohonan->user_id = $user_id;

        if ($request->status == 'HANTAR') {
            $validated = $request->validate([
                'no_telefon' => 'required',
                'emel' => 'required',
                'alamat1' => 'required',
                'alamat2' => 'required',
                'alamat3' => 'required',
                'poskod' => 'required',
                'negeri' => 'required',
                'negeri_kutipan_permit' => 'required',
            ]);
        }

        $permohonan->jenis_permohonan = $request->jenis_permohonan;
        if ($request->status == 'SIMPAN') {
            $permohonan->status_permohonan = 'simpan';
        } elseif ($request->status == 'HANTAR') {
            $permohonan->status_permohonan = 'hantar';
        }

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

            if ($request->status == 'HANTAR') {
                $validated = $request->validate([
                    'jantina' => 'required',
                    'pekerjaan_sekarang' => 'required',
                    'tahap_pendidikan' => 'required',
                    'lesen_memandu' => 'required',
                    'berkerja_panel_atau_syarikat' => 'required',
                    'skop_tugas' => 'required',
                    'prosedur_peraturan_eps' => 'required',
                ]);

                if ($request->berkerja_panel_atau_syarikat == 'Ya') {
                    $validated = $request->validate([
                        'nama_institusi_kewangan' => 'required',
                        'no_telefon_institusi_kewangan' => 'required',
                    ]);
                } elseif ($request->berkerja_panel_atau_syarikat == 'Tidak') {
                    $validated = $request->validate([
                        'nama_panel' => 'required',
                        'no_kp_panel' => 'required',
                        'no_permit_panel' => 'required',
                        'no_telefon_panel' => 'required',
                    ]);
                }
            }

            $permohonan->pekerjaan_sekarang = $request->pekerjaan_sekarang;
            $permohonan->tahap_pendidikan = $request->tahap_pendidikan;

            if ($request->status == 'HANTAR')
                $permohonan->lesen_memandu = implode(",", $request->lesen_memandu);
            else
                $permohonan->lesen_memandu =  $request->lesen_memandu;

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
        } else if ($request->jenis_permohonan == 'Pembaharuan') {

            if ($request->status == 'HANTAR') {
                $validated = $request->validate([
                    'status_pekerjaan_eps' => 'required',
                    'tahap_pendidikan' => 'required',
                    'lesen_memandu' => 'required',
                    'berkerja_panel_atau_syarikat' => 'required',
                    'kehadiran_kursus_eps' => 'required',
                ]);

                if ($request->status_pekerjaan_eps == 'sepenuh masa') {
                    $validated = $request->validate([
                        'tahun_pekerjaan_eps' => 'required',
                    ]);
                } elseif ($request->status_pekerjaan_eps == 'pekerjaan sampingan') {
                    $validated = $request->validate([
                        'pekerjaan_tetap' => 'required',
                    ]);
                }

                if ($request->berkerja_panel_atau_syarikat == 'Ya') {
                    $validated = $request->validate([
                        'nama_institusi_kewangan' => 'required',
                        'no_telefon_institusi_kewangan' => 'required',
                    ]);
                } elseif ($request->berkerja_panel_atau_syarikat == 'Tidak') {
                    $validated = $request->validate([
                        'nama_panel' => 'required',
                        'no_kp_panel' => 'required',
                        'no_permit_panel' => 'required',
                        'no_telefon_panel' => 'required',
                    ]);
                }

                if ($request->kehadiran_kursus_eps == 'Ya') {
                    $validated = $request->validate([
                        'tahun_dihadiri' => 'required',
                    ]);
                }
            }

            $permohonan->no_permit = $request->no_permit;

            $permohonan->status_pekerjaan_eps = $request->status_pekerjaan_eps;
            $permohonan->tahun_pekerjaan_eps = $request->tahun_pekerjaan_eps;
            $permohonan->pekerjaan_tetap = $request->pekerjaan_tetap;
            $permohonan->tahap_pendidikan = $request->tahap_pendidikan;
            if ($request->status == 'HANTAR')
                $permohonan->lesen_memandu = implode(",", $request->lesen_memandu);
            else
                $permohonan->lesen_memandu =  $request->lesen_memandu;
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
        } else if ($request->jenis_permohonan == 'Pendua') {

            if ($request->status == 'HANTAR') {
                $validated = $request->validate([
                    'alasan_kehilangan' => 'required',
                    'penggantian_kali_ke' => 'required',
                    'negeri_laporan_polis' => 'required',
                    'no_laporan_polis' => 'required',
                ]);
                if ($request->alasan_kehilangan == 'Lain-lain') {
                    $validated = $request->validate([
                        'alasan_lain' => 'required',
                    ]);
                }
            }

            $permohonan->no_permit = $request->no_permit;

            $permohonan->alasan_kehilangan = $request->alasan_kehilangan;
            $permohonan->alasan_lain = $request->alasan_lain;
            $permohonan->penggantian_kali_ke = $request->penggantian_kali_ke;
            $permohonan->negeri_laporan_polis = $request->negeri_laporan_polis;
            $permohonan->no_laporan_polis = $request->no_laporan_polis;

            $permohonan->salinan_kp_depan = $request->salinan_kp_depan;
            $permohonan->salinan_kp_belakang = $request->salinan_kp_belakang;
            $permohonan->salinan_laporan_polis = $request->salinan_laporan_polis;
        } else if ($request->jenis_permohonan == 'Rayuan') {

            if ($request->status == 'HANTAR') {
                $validated = $request->validate([
                    'sebab_permohonan_ditolak' => 'required',
                    'rayuan_kali_ke' => 'required',
                    'alasan_rayuan' => 'required',
                ]);
                if ($request->sebab_permohonan_ditolak == 'Sebab-sebab Lain') {
                    $validated = $request->validate([
                        'sebab_lain' => 'required',
                    ]);
                }
            }

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



        if ($request->status == 'HANTAR') {
            $penerimas_emails = User::where('role', 'pegawai_negeri')->get();
            foreach ($penerimas_emails as $recipient) {
                Mail::to($recipient->email)->send(new NewPermohonan($permohonan));
            }

            Mail::to($request->emel)->send(new PermohonanPemohon($permohonan));
        }

        if ($request->status == 'HANTAR') {
            return redirect('/permohonan-berjaya');
        } else {
            return redirect('/permohonan-disimpan');
        }
    }

    public function show(Permohonan $permohonan, Request $request)
    {

        $user = $request->user();
        $user_role = $user->role;

        if ($user_role == 'pegawai_negeri') {
            return view('pegawai.negeri.negeri-maklumat-pemohon', [
                'permohonan' => $permohonan
            ]);
        }
        if ($user_role == 'pegawai_hq') {
            return view('pegawai.hq.hq-maklumat-pemohon', [
                'permohonan' => $permohonan
            ]);
        }
        if ($user_role == 'pegawai_pdrm') {
            return view('pegawai.pdrm.pdrm-maklumat-pemohon', [
                'permohonan' => $permohonan
            ]);
        }
        if ($user_role == 'pemohon') {
            if ($permohonan->jenis_permohonan == "Baharu") {
                // dd($permohonan->lesen_memandu);
                $lesen_memandus = explode(",", $permohonan->lesen_memandu);
                return view('pemohon.kemaskini-baru', [
                    'permohonan' => $permohonan,
                    'lesen_memandu1' => $lesen_memandus,
                    'lesen_memandu2' => $lesen_memandus,
                    'lesen_memandu3' => $lesen_memandus,
                    'lesen_memandu4' => $lesen_memandus,
                    'lesen_memandu5' => $lesen_memandus,
                ]);
            } else if ($permohonan->jenis_permohonan == "Pembaharuan") {

                // use of explode
                $lesen_memandus = explode(",", $permohonan->lesen_memandu);

                return view('pemohon.kemaskini-pembaharuan', [
                    'permohonan' => $permohonan,
                    'lesen_memandu1' => $lesen_memandus,
                    'lesen_memandu2' => $lesen_memandus,
                    'lesen_memandu3' => $lesen_memandus,
                    'lesen_memandu4' => $lesen_memandus,
                    'lesen_memandu5' => $lesen_memandus,
                ]);
            } else if ($permohonan->jenis_permohonan == "Pendua") {
                return view('pemohon.kemaskini-pendua', [
                    'permohonan' => $permohonan,
                ]);
            } else if ($permohonan->jenis_permohonan == "Rayuan") {
                return view('pemohon.kemaskini-rayuan', [
                    'permohonan' => $permohonan,
                ]);
            }
        }
    }

    public function edit(Permohonan $permohonan)
    {
        //
    }

    public function update(Request $request, Permohonan $permohonan)
    {
        // dd($permohonan);
        $user = $request->user();
        $user_role = $user->role;

        if ($user_role == 'pegawai_negeri') {
            if ($request->tindakan == "Permohonan Lengkap" || $request->tindakan == "Permohonan Tidak Lengkap") {
                $permohonan->status_permohonan = $request->tindakan;
                $permohonan->catatan_pegawai_negeri = $request->catatan_pegawai_negeri;

                if ($request->tindakan == "Permohonan Tidak Lengkap") {
                    $penerimas_emails = User::where('id', $permohonan->user_id)->get();
                    // dd($penerimas_emails);
                    foreach ($penerimas_emails as $recipient) {
                        Mail::to($recipient->email)->send(new PermohonanTidakLengkap($permohonan));
                    }
                }
            } else {
                $permohonan->sokongan = $request->tindakan;
                $permohonan->status_permohonan = $request->tindakan;
                $permohonan->tempoh_kelulusan = $request->tempoh_kelulusan;
                $permohonan->catatan_penyokong = $request->catatan_penyokong;
            }
        } else if ($user_role == 'pegawai_hq') {
            if ($request->jenis_tindakan == "permohonan_baru_pembaharuan") {
                if ($request->tindakan == "Hantar Permohonan kepada Badan Agensi (PDRM)") {
                    $permohonan->status_permohonan = "hantar ke pdrm";
                    $permohonan->catatan_pegawai_hq = $request->catatan_pegawai_hq;
                }
            } else if ($request->jenis_tindakan == "permohonan_pendua_rayuan") {
                $permohonan->status_permohonan = $request->tindakan;
                $permohonan->catatan_pegawai_hq = $request->catatan_pegawai_hq;

                if ($permohonan->jenis_permohonan == "Rayuan") {
                    $permohonan->bayaran_fi = 10;
                } else if ($permohonan->jenis_permohonan == "Pendua") {
                    $permohonan->bayaran_fi = 20;
                }

                $penerimas_emails = User::where('id', $permohonan->user_id)->get();

                foreach ($penerimas_emails as $recipient) {
                    Mail::to($recipient->email)->send(new KelulusanPermohonan($permohonan));
                }
            } else if ($request->jenis_tindakan == "hantar_ke_penyokong") {
                $permohonan->status_permohonan = $request->tindakan;
            } else if ($request->jenis_tindakan == "kelulusan_permohonan") {

                $permohonan->status_permohonan = $request->tindakan;
                $permohonan->catatan_pelulus = $request->catatan_pelulus;

                if ($permohonan->tempoh_kelulusan == "1 tahun") {
                    $permohonan->bayaran_fi = 10;
                    $permohonan->tarikh_diluluskan = date("Y-m-d");
                    $permohonan->tarikh_tamat_permit = date('Y-m-d', strtotime('+1 years'));

                } else if ($permohonan->tempoh_kelulusan == "2 tahun") {
                    $permohonan->bayaran_fi = 20;
                    $permohonan->tarikh_diluluskan = date("Y-m-d");
                    $permohonan->tarikh_tamat_permit = date('Y-m-d', strtotime('+2 years'));
                }

                $penerimas_emails = User::where('id', $permohonan->user_id)->get();
                // dd($penerimas_emails);
                foreach ($penerimas_emails as $recipient) {
                    Mail::to($recipient->email)->send(new KelulusanPermohonan($permohonan));
                }
            } else if ($request->jenis_tindakan == "tambah_senarai_hitam") {
                // dd($request);
                $permohonan->status_permohonan = 'disenarai hitam';
                $permohonan->catatan_senarai_hitam = $request->catatan_senarai_hitam;
                $permohonan->save();
                return redirect('/senarai-hitam');
            } else if ($request->jenis_tindakan == "kemaskini_senarai_hitam") {
                // dd($request);
                // $permohonan->status_permohonan = 'disenarai hitam';
                $permohonan->catatan_senarai_hitam = $request->catatan_senarai_hitam;
                $permohonan->save();
                return redirect('/senarai-hitam');
            }
        } else if ($user_role == 'pegawai_pdrm') {
            if ($request->tindakan == "Dalam Proses") {

                $user_name = $user->name;
                $permohonan->pegawai_pdrm = $user_name;
                $permohonan->status_permohonan = $request->tindakan;
                $permohonan->catatan_pdrm = $request->catatan_pdrm;
                $permohonan->save();

                return redirect('/permohonan');
            } else {
                $permohonan->rekod_jenayah = $request->tindakan;
                $permohonan->status_permohonan = 'disemak pdrm';

                $permohonan->catatan_pdrm = $request->catatan_pdrm;
                $permohonan->save();

                $penerimas_emails = User::where('role', 'pegawai_hq')->get();
                foreach ($penerimas_emails as $recipient) {
                    Mail::to($recipient->email)->send(new SemakanPDRM($permohonan));
                }

                return redirect('/tugasan-selesai');
            }
        } else if ($user_role == 'pemohon') {
            if ($request->status == 'HANTAR') {
                $validated = $request->validate([
                    'no_telefon' => 'required',
                    'emel' => 'required',
                    'alamat1' => 'required',
                    'alamat2' => 'required',
                    'alamat3' => 'required',
                    'poskod' => 'required',
                    'negeri' => 'required',
                    'negeri_kutipan_permit' => 'required',
                ]);
            }

            $permohonan->jenis_permohonan = $request->jenis_permohonan;
            if ($request->status == 'SIMPAN') {
                $permohonan->status_permohonan = 'simpan';
            } elseif ($request->status == 'HANTAR') {
                $permohonan->status_permohonan = 'hantar';
            }

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

                if ($request->status == 'HANTAR') {
                    $validated = $request->validate([
                        'jantina' => 'required',
                        'pekerjaan_sekarang' => 'required',
                        'tahap_pendidikan' => 'required',
                        'lesen_memandu' => 'required',
                        'berkerja_panel_atau_syarikat' => 'required',
                        'skop_tugas' => 'required',
                        'prosedur_peraturan_eps' => 'required',
                    ]);

                    if ($request->berkerja_panel_atau_syarikat == 'Ya') {
                        $validated = $request->validate([
                            'nama_institusi_kewangan' => 'required',
                            'no_telefon_institusi_kewangan' => 'required',
                        ]);
                    } elseif ($request->berkerja_panel_atau_syarikat == 'Tidak') {
                        $validated = $request->validate([
                            'nama_panel' => 'required',
                            'no_kp_panel' => 'required',
                            'no_permit_panel' => 'required',
                            'no_telefon_panel' => 'required',
                        ]);
                    }
                }

                $permohonan->pekerjaan_sekarang = $request->pekerjaan_sekarang;
                $permohonan->tahap_pendidikan = $request->tahap_pendidikan;

                if ($request->status == 'HANTAR')
                    $permohonan->lesen_memandu = implode(",", $request->lesen_memandu);
                else
                    $permohonan->lesen_memandu =  $request->lesen_memandu;


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
            } else if ($request->jenis_permohonan == 'Pembaharuan') {

                if ($request->status == 'HANTAR') {
                    $validated = $request->validate([
                        'status_pekerjaan_eps' => 'required',
                        'tahap_pendidikan' => 'required',
                        'lesen_memandu' => 'required',
                        'berkerja_panel_atau_syarikat' => 'required',
                        'kehadiran_kursus_eps' => 'required',
                    ]);

                    if ($request->status_pekerjaan_eps == 'sepenuh masa') {
                        $validated = $request->validate([
                            'tahun_pekerjaan_eps' => 'required',
                        ]);
                    } elseif ($request->status_pekerjaan_eps == 'pekerjaan sampingan') {
                        $validated = $request->validate([
                            'pekerjaan_tetap' => 'required',
                        ]);
                    }

                    if ($request->berkerja_panel_atau_syarikat == 'Ya') {
                        $validated = $request->validate([
                            'nama_institusi_kewangan' => 'required',
                            'no_telefon_institusi_kewangan' => 'required',
                        ]);
                    } elseif ($request->berkerja_panel_atau_syarikat == 'Tidak') {
                        $validated = $request->validate([
                            'nama_panel' => 'required',
                            'no_kp_panel' => 'required',
                            'no_permit_panel' => 'required',
                            'no_telefon_panel' => 'required',
                        ]);
                    }

                    if ($request->kehadiran_kursus_eps == 'Ya') {
                        $validated = $request->validate([
                            'tahun_dihadiri' => 'required',
                        ]);
                    }
                }

                $permohonan->no_permit = $request->no_permit;

                $permohonan->status_pekerjaan_eps = $request->status_pekerjaan_eps;
                $permohonan->tahun_pekerjaan_eps = $request->tahun_pekerjaan_eps;
                $permohonan->pekerjaan_tetap = $request->pekerjaan_tetap;
                $permohonan->tahap_pendidikan = $request->tahap_pendidikan;
                if ($request->status == 'HANTAR')
                    $permohonan->lesen_memandu = implode(",", $request->lesen_memandu);
                else
                    $permohonan->lesen_memandu =  $request->lesen_memandu;
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
            } else if ($request->jenis_permohonan == 'Pendua') {

                if ($request->status == 'HANTAR') {
                    $validated = $request->validate([
                        'alasan_kehilangan' => 'required',
                        'penggantian_kali_ke' => 'required',
                        'negeri_laporan_polis' => 'required',
                        'no_laporan_polis' => 'required',
                    ]);
                    if ($request->alasan_kehilangan == 'Lain-lain') {
                        $validated = $request->validate([
                            'alasan_lain' => 'required',
                        ]);
                    }
                }

                $permohonan->no_permit = $request->no_permit;

                $permohonan->alasan_kehilangan = $request->alasan_kehilangan;
                $permohonan->alasan_lain = $request->alasan_lain;
                $permohonan->penggantian_kali_ke = $request->penggantian_kali_ke;
                $permohonan->negeri_laporan_polis = $request->negeri_laporan_polis;
                $permohonan->no_laporan_polis = $request->no_laporan_polis;

                $permohonan->salinan_kp_depan = $request->salinan_kp_depan;
                $permohonan->salinan_kp_belakang = $request->salinan_kp_belakang;
                $permohonan->salinan_laporan_polis = $request->salinan_laporan_polis;
            } else if ($request->jenis_permohonan == 'Rayuan') {

                if ($request->status == 'HANTAR') {
                    $validated = $request->validate([
                        'sebab_permohonan_ditolak' => 'required',
                        'rayuan_kali_ke' => 'required',
                        'alasan_rayuan' => 'required',
                    ]);
                    if ($request->sebab_permohonan_ditolak == 'Sebab-sebab Lain') {
                        $validated = $request->validate([
                            'sebab_lain' => 'required',
                        ]);
                    }
                }

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

            if ($request->status == 'HANTAR') {
                $penerimas_emails = User::where('role', 'pegawai_negeri')->get();
                foreach ($penerimas_emails as $recipient) {
                    Mail::to($recipient->email)->send(new NewPermohonan($permohonan));
                }
            }

            return redirect('/dashboard');
        }

        $permohonan->save();

        return redirect('/tugasan-selesai');
    }

    public function destroy(Permohonan $permohonan)
    {
        //
    }

    public function semak()
    {
    }

    public function cari(Request $request)
    {
        // dd($request);
        $user = $request->user();
        $user_role = $user->role;

        if ($user_role == 'pegawai_negeri') {
            if ($request->no_kp != null && $request->jenis_permohonan == "null") {
                $permohonans = Permohonan::where([
                    ['no_kp', '=', $request->no_kp],
                    ['status_permohonan', '=', 'hantar']
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp],
                    ['status_permohonan', '=', 'hantar ke penyokong'],
                ])->get();
            } else if ($request->no_kp == null && $request->jenis_permohonan != "null") {
                $permohonans = Permohonan::where([
                    ['jenis_permohonan', '=', $request->jenis_permohonan],
                    ['status_permohonan', '=', 'hantar']
                ])->orWhere([
                    ['jenis_permohonan', '=', $request->jenis_permohonan],
                    ['status_permohonan', '=', 'hantar ke penyokong'],
                ])->get();
            } else {
                $permohonans = Permohonan::where([
                    ['no_kp', '=', $request->no_kp],
                    ['jenis_permohonan', '=', $request->jenis_permohonan],
                    ['status_permohonan', '=', 'hantar']
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp],
                    ['jenis_permohonan', '=', $request->jenis_permohonan],
                    ['status_permohonan', '=', 'hantar ke penyokong'],
                ])->get();
            }
            return view('pegawai.negeri.negeri-tugasan-baru', [
                'permohonan' => $permohonans,
            ]);
        } else if ($user_role == 'pegawai_hq') {
            if ($request->no_kp == null && $request->negeri == "null" && $request->jenis_permohonan != "null") {
                $permohonans = Permohonan::where([
                    ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'Permohonan Lengkap']
                ])->orWhere([
                    ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'disemak pdrm'],
                ])->orWhere([
                    ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'Disokong'],
                ])->orWhere([
                    ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'Tidak Disokong'],
                ])->get();
            } else if ($request->no_kp == null && $request->negeri != "null" && $request->jenis_permohonan == "null") {
                $permohonans = Permohonan::where([
                    ['negeri', '=', $request->negeri], ['status_permohonan', '=', 'Permohonan Lengkap']
                ])->orWhere([
                    ['negeri', '=', $request->negeri], ['status_permohonan', '=', 'disemak pdrm'],
                ])->orWhere([
                    ['negeri', '=', $request->negeri], ['status_permohonan', '=', 'Disokong'],
                ])->orWhere([
                    ['negeri', '=', $request->negeri], ['status_permohonan', '=', 'Tidak Disokong'],
                ])->get();
            } else if ($request->no_kp == null && $request->negeri != "null" && $request->jenis_permohonan != "null") {
                $permohonans = Permohonan::where([
                    ['negeri', '=', $request->negeri], ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'Permohonan Lengkap']
                ])->orWhere([
                    ['negeri', '=', $request->negeri], ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'disemak pdrm'],
                ])->orWhere([
                    ['negeri', '=', $request->negeri], ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'Disokong'],
                ])->orWhere([
                    ['negeri', '=', $request->negeri], ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'Tidak Disokong'],
                ])->get();
            } else if ($request->no_kp != null && $request->negeri == "null" && $request->jenis_permohonan == "null") {
                $permohonans = Permohonan::where([
                    ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'Permohonan Lengkap']
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'disemak pdrm'],
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'Disokong'],
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'Tidak Disokong'],
                ])->get();
            } else if ($request->no_kp != null && $request->negeri == "null" && $request->jenis_permohonan != "null") {
                $permohonans = Permohonan::where([
                    ['no_kp', '=', $request->no_kp], ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'Permohonan Lengkap']
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'disemak pdrm'],
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'Disokong'],
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'Tidak Disokong'],
                ])->get();
            } else if ($request->no_kp != null && $request->negeri != "null" && $request->jenis_permohonan == "null") {
                $permohonans = Permohonan::where([
                    ['no_kp', '=', $request->no_kp], ['negeri', '=', $request->negeri], ['status_permohonan', '=', 'Permohonan Lengkap']
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['negeri', '=', $request->negeri], ['status_permohonan', '=', 'disemak pdrm'],
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['negeri', '=', $request->negeri], ['status_permohonan', '=', 'Disokong'],
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['negeri', '=', $request->negeri], ['status_permohonan', '=', 'Tidak Disokong'],
                ])->get();
            } else {
                $permohonans = Permohonan::where([
                    ['no_kp', '=', $request->no_kp], ['negeri', '=', $request->negeri], ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'Permohonan Lengkap']
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['negeri', '=', $request->negeri], ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'disemak pdrm'],
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['negeri', '=', $request->negeri], ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'Disokong'],
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['negeri', '=', $request->negeri], ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'Tidak Disokong'],
                ])->get();
            }
            return view('pegawai.hq.hq-tugasan-baru', [
                'permohonan' => $permohonans,
            ]);
        } else if ($user_role == 'pegawai_pdrm') {
            // dd($request);

            if ($request->no_kp != null && $request->negeri == "null") {
                $permohonans = Permohonan::where([
                    ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'hantar ke pdrm']
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'Dalam Proses'],
                ])->get();
            } else if ($request->no_kp == null && $request->negeri != "null") {
                $permohonans = Permohonan::where([
                    ['negeri', '=', $request->negeri], ['status_permohonan', '=', 'hantar ke pdrm']
                ])->orWhere([
                    ['negeri', '=', $request->negeri], ['status_permohonan', '=', 'Dalam Proses'],
                ])->get();
            } else {
                $permohonans = Permohonan::where([
                    ['no_kp', '=', $request->no_kp], ['negeri', '=', $request->negeri], ['status_permohonan', '=', 'hantar ke pdrm']
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['negeri', '=', $request->negeri], ['status_permohonan', '=', 'Dalam Proses'],
                ])->get();
            }
            return view('pegawai.hq.hq-tugasan-baru', [
                'permohonan' => $permohonans,
            ]);
        }
    }

    public function cetak()
    {
    }

    public function tetap_semula()
    {
    }

    public function borang(Request $request)
    {
        dd($request);
    }
}
