<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use App\Models\User;
use App\Models\Audit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewPermohonan;
use App\Mail\PermohonanTidakLengkap;
use App\Mail\KelulusanPermohonan;
use App\Mail\SemakanPDRM;
use App\Mail\PermohonanPemohon;
use League\CommonMark\Node\Inline\Newline;

use PDF;
use Dompdf\Dompdf;


# import Validator
use Illuminate\Support\Facades\Validator;



class PermohonanController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $user_role = $user->role;
        $user_id = $user->id;
        $user_roles = $user->roles;
        $user_negeri = $user->negeri;
        // var_dump($user_roles);
        // dd($user_roles[0]->name);
        if ($user_role == 'pegawai_pdrm') {
            $permohonan = Permohonan::whereIn('status_permohonan', ['hantar ke pdrm', 'Dalam Proses'])->get();

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
        // dd($request);
        $user = $request->user();
        $user_id = $user->id;

        $permohonan = new Permohonan;

        $permohonan->user_id = $user_id;
        $permohonan->gambar_pemohon = $request->gambar_pemohon;

        if ($request->status == 'HANTAR') {

            // $validated = $request->validate([
            //     'negeri_kutipan_permit' => 'required',
            // ]);
            # Write Manual Validation
            $validated = Validator::make($request->all(), [
                'no_telefon' => 'required',
                'emel' => 'required',
                'alamat1' => 'required',
                'alamat2' => 'required',
                'alamat3' => 'required',
                'poskod' => 'required',
                'negeri' => 'required',
                'negeri_kutipan_permit' => 'required',
            ]);

            # Write Manual Redirect if Validation Fail
            if ($validated->fails()) {

                
                if ($request->jenis_permohonan == "Baharu") {
                    $pemohons = User::where('id', $user_id)->get();
                    return view('pemohon.permohonan-baru', [
                        'pemohon' => $pemohons,
                        'errors' => $validated->errors()
                    ]);
                } else if ($request->jenis_permohonan == "Pembaharuan") {
                    $pemohons = User::where('id', $user_id)->get();
                    return view('pemohon.permohonan-pembaharuan', [
                        'pemohon' => $pemohons,
                        'errors' => $validated->errors()
                    ]);
                } else if ($request->jenis_permohonan == "Pendua") {
                    $pemohons = User::where('id', $user_id)->get();
                    return view('pemohon.permohonan-pendua', [
                        'pemohon' => $pemohons,
                        'errors' => $validated->errors()
                    ]);
                } else if ($request->jenis_permohonan == "Rayuan") {
                    $pemohons = User::where('id', $user_id)->get();
                    return view('pemohon.permohonan-rayuan', [
                        'pemohon' => $pemohons,
                        'errors' => $validated->errors()
                    ]);
                }
            };
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

                # Write Manual Validation
                $validated = Validator::make($request->all(), [
                    'jantina' => 'required',
                    'pekerjaan_sekarang' => 'required',
                    'tahap_pendidikan' => 'required',
                    'lesen_memandu' => 'required',
                    'berkerja_panel_atau_syarikat' => 'required',
                    'skop_tugas' => 'required',
                    'prosedur_peraturan_eps' => 'required',
                ]);

                if ($request->berkerja_panel_atau_syarikat == 'Ya') {
                    $validated = Validator::make($request->all(), [
                        'nama_institusi_kewangan' => 'required',
                        'no_telefon_institusi_kewangan' => 'required',
                    ]);
                } elseif ($request->berkerja_panel_atau_syarikat == 'Tidak') {
                    $validated = Validator::make($request->all(), [
                        'nama_panel' => 'required',
                        'no_kp_panel' => 'required',
                        'no_permit_panel' => 'required',
                        'no_telefon_panel' => 'required',
                    ]);
                }

                # Write Manual Redirect if Validation Fail
                if ($validated->fails()) {
                    dd($validated->errors());
                    $pemohons = User::where('id', $user_id)->get();
                    return view('pemohon.permohonan-baru', [
                        'pemohon' => $pemohons,
                        'errors' => $validated->errors()
                    ]);
                };
            }

            $permohonan->pekerjaan_sekarang = $request->pekerjaan_sekarang;
            $permohonan->tahap_pendidikan = $request->tahap_pendidikan;


            $permohonan->lesen_memandu = implode(",", $request->lesen_memandu);


            $permohonan->berkerja_panel_atau_syarikat = $request->berkerja_panel_atau_syarikat;

            $permohonan->nama_institusi_kewangan = $request->nama_institusi_kewangan;
            $permohonan->no_telefon_institusi_kewangan = $request->no_telefon_institusi_kewangan;

            $permohonan->nama_panel = $request->nama_panel;
            $permohonan->no_kp_panel = $request->no_kp_panel;
            $permohonan->no_permit_panel = $request->no_permit_panel;
            $permohonan->no_telefon_panel = $request->no_telefon_panel;

            $permohonan->skop_tugas = $request->skop_tugas;
            $permohonan->prosedur_peraturan_eps = $request->prosedur_peraturan_eps;


            if ($request->hasFile('kp_depan')) {
                $salinan_kp_depan = $request->file('kp_depan')->store('dokumen');
                $permohonan->salinan_kp_depan = $salinan_kp_depan;
            }

            if ($request->hasFile('salinan_kp_belakang')) {
                $salinan_kp_belakang = $request->file('salinan_kp_belakang')->store('dokumen');
                $permohonan->salinan_kp_belakang = $salinan_kp_belakang;
            }

            if ($request->hasFile('salinan_lesen_memandu')) {
                $salinan_lesen_memandu = $request->file('salinan_lesen_memandu')->store('dokumen');
                $permohonan->salinan_lesen_memandu = $salinan_lesen_memandu;
            }
        } else if ($request->jenis_permohonan == 'Pembaharuan') {

            if ($request->status == 'HANTAR') {

                # Write Manual Validation
                $validated = Validator::make($request->all(), [
                    'status_pekerjaan_eps' => 'required',
                    'tahap_pendidikan' => 'required',
                    'lesen_memandu' => 'required',
                    'berkerja_panel_atau_syarikat' => 'required',
                    'kehadiran_kursus_eps' => 'required',
                ]);

                if ($request->status_pekerjaan_eps == 'sepenuh masa') {
                    $validated = Validator::make($request->all(), [
                        'tahun_pekerjaan_eps' => 'required',
                    ]);
                } elseif ($request->status_pekerjaan_eps == 'pekerjaan sampingan') {
                    $validated = $request->validate([
                        'pekerjaan_tetap' => 'required',
                    ]);
                }

                if ($request->berkerja_panel_atau_syarikat == 'Ya') {
                    $validated = Validator::make($request->all(), [
                        'nama_institusi_kewangan' => 'required',
                        'no_telefon_institusi_kewangan' => 'required',
                    ]);
                } elseif ($request->berkerja_panel_atau_syarikat == 'Tidak') {
                    $validated = Validator::make($request->all(), [
                        'nama_panel' => 'required',
                        'no_kp_panel' => 'required',
                        'no_permit_panel' => 'required',
                        'no_telefon_panel' => 'required',
                    ]);
                }

                if ($request->kehadiran_kursus_eps == 'Ya') {
                    $validated = Validator::make($request->all(), [
                        'tahun_dihadiri' => 'required',
                    ]);
                }

                # Write Manual Redirect if Validation Fail
                if ($validated->fails()) {
                    $pemohons = User::where('id', $user_id)->get();
                    return view('pemohon.permohonan-pembaharuan', [
                        'pemohon' => $pemohons,
                        'errors' => $validated->errors()
                    ]);
                };
            }

            $permohonan->no_permit = $request->no_permit;

            $permohonan->status_pekerjaan_eps = $request->status_pekerjaan_eps;
            $permohonan->tahun_pekerjaan_eps = $request->tahun_pekerjaan_eps;
            $permohonan->pekerjaan_tetap = $request->pekerjaan_tetap;
            $permohonan->tahap_pendidikan = $request->tahap_pendidikan;

            $permohonan->lesen_memandu = implode(",", $request->lesen_memandu);

            $permohonan->berkerja_panel_atau_syarikat = $request->berkerja_panel_atau_syarikat;
            $permohonan->nama_institusi_kewangan = $request->nama_institusi_kewangan;
            $permohonan->no_telefon_institusi_kewangan = $request->no_telefon_institusi_kewangan;
            $permohonan->nama_panel = $request->nama_panel;
            $permohonan->no_kp_panel = $request->no_kp_panel;
            $permohonan->no_permit_panel = $request->no_permit_panel;
            $permohonan->no_telefon_panel = $request->no_telefon_panel;
            $permohonan->kehadiran_kursus_eps = $request->kehadiran_kursus_eps;
            $permohonan->tahun_dihadiri = $request->tahun_dihadiri;

            if ($request->hasFile('kp_depan')) {
                $salinan_kp_depan = $request->file('kp_depan')->store('dokumen');
                $permohonan->salinan_kp_depan = $salinan_kp_depan;
            }

            if ($request->hasFile('salinan_kp_belakang')) {
                $salinan_kp_belakang = $request->file('salinan_kp_belakang')->store('dokumen');
                $permohonan->salinan_kp_belakang = $salinan_kp_belakang;
            }

            if ($request->hasFile('salinan_lesen_memandu')) {
                $salinan_lesen_memandu = $request->file('salinan_lesen_memandu')->store('dokumen');
                $permohonan->salinan_lesen_memandu = $salinan_lesen_memandu;
            }

            if ($request->hasFile('salinan_surat_sokongan')) {
                $salinan_surat_sokongan = $request->file('salinan_surat_sokongan')->store('dokumen');
                $permohonan->salinan_surat_sokongan = $salinan_surat_sokongan;
            }
        } else if ($request->jenis_permohonan == 'Pendua') {

            if ($request->status == 'HANTAR') {

                # Write Manual Validation
                $validated = Validator::make($request->all(), [
                    'alasan_kehilangan' => 'required',
                    'penggantian_kali_ke' => 'required',
                    'negeri_laporan_polis' => 'required',
                    'no_laporan_polis' => 'required',
                ]);

                if ($request->alasan_kehilangan == 'Lain-lain') {
                    $validated = Validator::make($request->all(), [
                        'alasan_lain' => 'required',
                    ]);
                }

                # Write Manual Redirect if Validation Fail
                if ($validated->fails()) {
                    $pemohons = User::where('id', $user_id)->get();
                    return view('pemohon.permohonan-pendua', [
                        'pemohon' => $pemohons,
                        'errors' => $validated->errors()
                    ]);
                };
            }

            $permohonan->no_permit = $request->no_permit;

            $permohonan->alasan_kehilangan = $request->alasan_kehilangan;
            $permohonan->alasan_lain = $request->alasan_lain;
            $permohonan->penggantian_kali_ke = $request->penggantian_kali_ke;
            $permohonan->negeri_laporan_polis = $request->negeri_laporan_polis;
            $permohonan->no_laporan_polis = $request->no_laporan_polis;

            if ($request->hasFile('salinan_kp_depan')) {
                $salinan_kp_depan = $request->file('salinan_kp_depan')->store('dokumen');
                $permohonan->salinan_kp_depan = $salinan_kp_depan;
            }

            if ($request->hasFile('salinan_kp_belakang')) {
                $salinan_kp_belakang = $request->file('salinan_kp_belakang')->store('dokumen');
                $permohonan->salinan_kp_belakang = $salinan_kp_belakang;
            }

            if ($request->hasFile('salinan_laporan_polis')) {
                $salinan_laporan_polis = $request->file('salinan_laporan_polis')->store('dokumen');
                $permohonan->salinan_laporan_polis = $salinan_laporan_polis;
            }
        } else if ($request->jenis_permohonan == 'Rayuan') {

            if ($request->status == 'HANTAR') {

                # Write Manual Validation
                $validated = Validator::make($request->all(), [
                    'sebab_permohonan_ditolak' => 'required',
                    'rayuan_kali_ke' => 'required',
                    'alasan_rayuan' => 'required',
                ]);

                if ($request->sebab_permohonan_ditolak == 'Sebab-sebab Lain') {
                    $validated = Validator::make($request->all(), [
                        'sebab_lain' => 'required',
                    ]);
                }

                # Write Manual Redirect if Validation Fail
                if ($validated->fails()) {
                    $pemohons = User::where('id', $user_id)->get();
                    return view('pemohon.permohonan-rayuan', [
                        'pemohon' => $pemohons,
                        'errors' => $validated->errors()
                    ]);
                };
            }

            $permohonan->no_permit = $request->no_permit;

            $permohonan->sebab_permohonan_ditolak = $request->sebab_permohonan_ditolak;
            $permohonan->sebab_lain = $request->sebab_lain;
            $permohonan->rayuan_kali_ke = $request->rayuan_kali_ke;
            $permohonan->alasan_rayuan = $request->alasan_rayuan;


            if ($request->hasFile('kp_depan')) {
                $salinan_kp_depan = $request->file('kp_depan')->store('dokumen');
                $permohonan->salinan_kp_depan = $salinan_kp_depan;
            }

            if ($request->hasFile('salinan_kp_belakang')) {
                $salinan_kp_belakang = $request->file('salinan_kp_belakang')->store('dokumen');
                $permohonan->salinan_kp_belakang = $salinan_kp_belakang;
            }

            if ($request->hasFile('salinan_tapisan_rekod_jenayah')) {
                $salinan_tapisan_rekod_jenayah = $request->file('salinan_tapisan_rekod_jenayah')->store('dokumen');
                $permohonan->salinan_tapisan_rekod_jenayah = $salinan_tapisan_rekod_jenayah;
            }

            if ($request->hasFile('salinan_sokongan_institusi_kewangan')) {
                $salinan_sokongan_institusi_kewangan = $request->file('salinan_sokongan_institusi_kewangan')->store('dokumen');
                $permohonan->salinan_sokongan_institusi_kewangan = $salinan_sokongan_institusi_kewangan;
            }

            if ($request->hasFile('salinan_dokumen_sokongan1')) {
                $salinan_dokumen_sokongan1 = $request->file('salinan_dokumen_sokongan1')->store('dokumen');
                $permohonan->salinan_dokumen_sokongan1 = $salinan_dokumen_sokongan1;
            }

            if ($request->hasFile('salinan_dokumen_sokongan2')) {
                $salinan_dokumen_sokongan2 = $request->file('salinan_dokumen_sokongan2')->store('dokumen');
                $permohonan->salinan_dokumen_sokongan2 = $salinan_dokumen_sokongan2;
            }

            if ($request->hasFile('salinan_dokumen_sokongan3')) {
                $salinan_dokumen_sokongan3 = $request->file('salinan_dokumen_sokongan3')->store('dokumen');
                $permohonan->salinan_dokumen_sokongan3 = $salinan_dokumen_sokongan3;
            }
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
        // dd($request);
        $user = $request->user();
        $user_role = $user->role;
        $user_negeri = $user->negeri;

        if ($user_role == 'pegawai_negeri') {

            if ($request->jenis_tindakan == "semakan_permohonan") {
                if ($permohonan->jenis_permohonan == "Baharu" || $permohonan->jenis_permohonan == "Pembaharuan" || $permohonan->jenis_permohonan == "Rayuan") {
                    if ($request->tindakan == "Permohonan Lengkap") {
                        $permohonan->status_permohonan = "hantar_ke_pemproses_hq";
                        $permohonan->catatan_pegawai_negeri = $request->catatan_pegawai_negeri;

                        $audit = new Audit;
                        $audit->id_pegawai = $user->id;
                        $audit->nama_pegawai = $user->name;
                        $audit->model_name = 'Permohonan';
                        $audit->model_id = $permohonan->id;
                        $audit->id_pemohon = $permohonan->user_id;
                        $audit->description = 'Hantar permohonan lengkap ke pemproses HQ';
                        $audit->save();
                    } else if ($request->tindakan == "Permohonan Tidak Lengkap") {
                        $permohonan->status_permohonan = "Permohonan Tidak Lengkap";
                        $permohonan->catatan_pegawai_negeri = $request->catatan_pegawai_negeri;

                        $penerimas_emails = $permohonan->emel;
                        Mail::to($penerimas_emails)->send(new PermohonanTidakLengkap($permohonan));

                        $audit = new Audit;
                        $audit->id_pegawai = $user->id;
                        $audit->nama_pegawai = $user->name;
                        $audit->model_name = 'Permohonan';
                        $audit->model_id = $permohonan->id;
                        $audit->id_pemohon = $permohonan->user_id;
                        $audit->description = 'Kemaskini permohonan tidak lengkap';
                        $audit->save();
                    }
                } else if ($permohonan->jenis_permohonan == "Pendua") {
                    if ($request->tindakan == "Permohonan Lengkap") {
                        $permohonan->status_permohonan = "hantar_ke_penyokong_negeri";
                        $permohonan->catatan_pegawai_negeri = $request->catatan_pegawai_negeri;

                        $audit = new Audit;
                        $audit->id_pegawai = $user->id;
                        $audit->nama_pegawai = $user->name;
                        $audit->model_name = 'Permohonan';
                        $audit->model_id = $permohonan->id;
                        $audit->id_pemohon = $permohonan->user_id;
                        $audit->description = 'Hantar permohonan lengkap ke pemproses negeri';
                        $audit->save();
                    } else if ($request->tindakan == "Permohonan Tidak Lengkap") {
                        $permohonan->status_permohonan = "Permohonan Tidak Lengkap";
                        $permohonan->catatan_pegawai_negeri = $request->catatan_pegawai_negeri;

                        $penerimas_emails = $permohonan->emel;
                        Mail::to($penerimas_emails)->send(new PermohonanTidakLengkap($permohonan));

                        $audit = new Audit;
                        $audit->id_pegawai = $user->id;
                        $audit->nama_pegawai = $user->name;
                        $audit->model_name = 'Permohonan';
                        $audit->model_id = $permohonan->id;
                        $audit->id_pemohon = $permohonan->user_id;
                        $audit->description = 'Kemaskini permohonan tidak lengkap';
                        $audit->save();
                    }
                }
                $permohonan->save();

                return redirect('/pemproses_negeri_tugasan_selesai');
            } else if ($request->jenis_tindakan == "sokongan_permohonan") {
                if ($request->tindakan == "Disokong") {
                    $permohonan->status_permohonan = "disokong_negeri";
                    $permohonan->sokongan = $request->tindakan;
                    $permohonan->tempoh_kelulusan =  $request->tempoh_kelulusan;
                    $permohonan->catatan_penyokong = $request->catatan_penyokong;

                    $audit = new Audit;
                    $audit->id_pegawai = $user->id;
                    $audit->nama_pegawai = $user->name;
                    $audit->model_name = 'Permohonan';
                    $audit->model_id = $permohonan->id;
                    $audit->id_pemohon = $permohonan->user_id;
                    $audit->description = 'Menyokong permohonan ' . $permohonan->id;
                    $audit->save();
                } else if ($request->tindakan == "Tidak Disokong") {
                    $permohonan->status_permohonan = "tidak_disokong_negeri";
                    $permohonan->sokongan = $request->tindakan;
                    $permohonan->catatan_penyokong = $request->catatan_penyokong;

                    $audit = new Audit;
                    $audit->id_pegawai = $user->id;
                    $audit->nama_pegawai = $user->name;
                    $audit->model_name = 'Permohonan';
                    $audit->model_id = $permohonan->id;
                    $audit->id_pemohon = $permohonan->user_id;
                    $audit->description = 'Tidak menyokong permohonan ' . $permohonan->id;
                    $audit->save();
                }
                $permohonan->save();

                return redirect('/penyokong_negeri_tugasan_selesai');

                // $permohonans = Permohonan::where([
                //     ['negeri_kutipan_permit', '=', $user_negeri], ['status_permohonan', '=', 'disokong_negeri']
                // ])->orWhere([
                //     ['negeri_kutipan_permit', '=', $user_negeri], ['status_permohonan', '=', 'tidak_disokong_negeri']
                // ])->get();

                // return view('pegawai.negeri.negeri-tugasan-selesai', [
                //     'permohonan' => $permohonans
                // ]);
            } else if ($request->jenis_tindakan == "kelulusan_permohonan") {

                $permohonan->status_permohonan = $request->tindakan;
                $permohonan->catatan_pelulus = $request->catatan_pelulus;

                if ($permohonan->jenis_permohonan == "Baharu" || $permohonan->jenis_permohonan == "Pembaharuan") {
                    if ($permohonan->tempoh_kelulusan == "1 tahun") {
                        $permohonan->bayaran_fi = 10;
                        $permohonan->tarikh_diluluskan = date("Y-m-d");
                        $permohonan->tarikh_tamat_permit = date('Y-m-d', strtotime('+1 years'));
                    } else if ($permohonan->tempoh_kelulusan == "2 tahun") {
                        $permohonan->bayaran_fi = 20;
                        $permohonan->tarikh_diluluskan = date("Y-m-d");
                        $permohonan->tarikh_tamat_permit = date('Y-m-d', strtotime('+2 years'));
                    }

                    $audit = new Audit;
                    $audit->id_pegawai = $user->id;
                    $audit->nama_pegawai = $user->name;
                    $audit->model_name = 'Permohonan';
                    $audit->model_id = $permohonan->id;
                    $audit->id_pemohon = $permohonan->user_id;
                    $audit->description = 'Meluluskan permohonan ' . $permohonan->id;
                    $audit->save();
                } else if ($permohonan->jenis_permohonan == "Pendua") {
                    $permohonan->bayaran_fi = 20;
                    $permohonan->tarikh_diluluskan = date("Y-m-d");
                    $permohonan->tarikh_tamat_permit = date('Y-m-d', strtotime('+2 years'));

                    $audit = new Audit;
                    $audit->id_pegawai = $user->id;
                    $audit->nama_pegawai = $user->name;
                    $audit->model_name = 'Permohonan';
                    $audit->model_id = $permohonan->id;
                    $audit->id_pemohon = $permohonan->user_id;
                    $audit->description = 'Tidak meluluskan permohonan ' . $permohonan->id;
                    $audit->save();
                }

                if ($request->tindakan == "Tidak Diluluskan") {
                    $user = User::find($permohonan->user_id);

                    $user->status_permohonan = "tidak_diluluskan";
                    $user->save();
                }


                $penerimas_emails = User::where('id', $permohonan->user_id)->get();
                // dd($penerimas_emails);
                foreach ($penerimas_emails as $recipient) {
                    Mail::to($recipient->email)->send(new KelulusanPermohonan($permohonan));
                }
                $permohonan->save();

                return redirect('/pelulus_negeri_tugasan_selesai');
            }

            $permohonan->save();

            return redirect('/tugasan-selesai');
        } else if ($user_role == 'pegawai_hq') {

            if ($request->jenis_tindakan == "hantar_ke_pdrm") {
                $permohonan->status_permohonan = "hantar ke pdrm";
                $permohonan->catatan_pegawai_hq = $request->catatan_pegawai_hq;

                $permohonan->save();

                $audit = new Audit;
                $audit->id_pegawai = $user->id;
                $audit->nama_pegawai = $user->name;
                $audit->model_name = 'Permohonan';
                $audit->model_id = $permohonan->id;
                $audit->id_pemohon = $permohonan->user_id;
                $audit->description = 'Hantar permohonan ' . $permohonan->id . ' ke PDRM';
                $audit->save();

                return redirect('/pemproses_hq_tugasan_selesai');
            } else if ($request->jenis_tindakan == "hantar_ke_penyokong") {
                if ($permohonan->jenis_permohonan == "Baharu") {
                    $permohonan->status_permohonan = "hantar_ke_penyokong_hq";
                    // dd($permohonan->status_permohonan);

                    $permohonan->save();

                    $audit = new Audit;
                    $audit->id_pegawai = $user->id;
                    $audit->nama_pegawai = $user->name;
                    $audit->model_name = 'Permohonan';
                    $audit->model_id = $permohonan->id;
                    $audit->id_pemohon = $permohonan->user_id;
                    $audit->description = 'Hantar Permohonan ke penyokong HQ';
                    $audit->save();

                    return redirect('/pemproses_hq_tugasan_selesai');
                } else if ($permohonan->jenis_permohonan == "Pembaharuan") {
                    // dd($request);
                    $permohonan->status_permohonan = "hantar_ke_penyokong_negeri";

                    $permohonan->save();

                    $audit = new Audit;
                    $audit->id_pegawai = $user->id;
                    $audit->nama_pegawai = $user->name;
                    $audit->model_name = 'Permohonan';
                    $audit->model_id = $permohonan->id;
                    $audit->id_pemohon = $permohonan->user_id;
                    $audit->description = 'Hantar Permohonan ke penyokong negeri';
                    $audit->save();

                    return redirect('/pemproses_hq_tugasan_selesai');
                }
            } else if ($request->jenis_tindakan == "sokongan_permohonan") {
                if ($request->tindakan == "Disokong") {
                    $permohonan->status_permohonan = "disokong_hq";
                    $permohonan->sokongan = $request->tindakan;
                    $permohonan->tempoh_kelulusan =  $request->tempoh_kelulusan;
                    $permohonan->catatan_penyokong = $request->catatan_penyokong;

                    $permohonan->save();
                    // $mael = "1";
                    $audit = new Audit;
                    $audit->id_pegawai = $user->id;
                    $audit->nama_pegawai = $user->name;
                    $audit->model_name = 'Permohonan';
                    $audit->model_id = $permohonan->id;
                    $audit->id_pemohon = $permohonan->user_id;
                    $audit->description = 'Menyokong permohonan' . $permohonan->id;
                    $audit->save();

                    return redirect('/penyokong_hq_tugasan_selesai');
                } else if ($request->tindakan == "Tidak Disokong") {
                    $permohonan->status_permohonan = "tidak_disokong_hq";
                    $permohonan->sokongan = $request->tindakan;
                    $permohonan->catatan_penyokong = $request->catatan_penyokong;

                    $permohonan->save();

                    $audit = new Audit;
                    $audit->id_pegawai = $user->id;
                    $audit->nama_pegawai = $user->name;
                    $audit->model_name = 'Permohonan';
                    $audit->model_id = $permohonan->id;
                    $audit->id_pemohon = $permohonan->user_id;
                    $audit->description = 'Tidak menyokong permohonan' . $permohonan->id;
                    $audit->save();

                    return redirect('/penyokong_hq_tugasan_selesai');
                }
            } else if ($request->jenis_tindakan == "kelulusan_permohonan") {

                $permohonan->status_permohonan = $request->tindakan;
                $permohonan->catatan_pelulus = $request->catatan_pelulus;

                if ($request->tindakan == "Diluluskan") {
                    if ($permohonan->tempoh_kelulusan == "1 tahun") {
                        $permohonan->bayaran_fi = 10;
                        $permohonan->tarikh_diluluskan = date("Y-m-d");
                        $permohonan->tarikh_tamat_permit = date('Y-m-d', strtotime('+1 years'));
                    } else if ($permohonan->tempoh_kelulusan == "2 tahun") {
                        $permohonan->bayaran_fi = 20;
                        $permohonan->tarikh_diluluskan = date("Y-m-d");
                        $permohonan->tarikh_tamat_permit = date('Y-m-d', strtotime('+2 years'));
                    }

                    $audit = new Audit;
                    $audit->id_pegawai = $user->id;
                    $audit->nama_pegawai = $user->name;
                    $audit->model_name = 'Permohonan';
                    $audit->model_id = $permohonan->id;
                    $audit->id_pemohon = $permohonan->user_id;
                    $audit->description = "Meluluskan permohonan " . $permohonan->id;
                    $audit->save();
                } else if ($request->tindakan == "Tidak Diluluskan") {


                    $user = User::find($permohonan->user_id);

                    $user->status_permohonan = "tidak_diluluskan";
                    $user->save();

                    $audit = new Audit;
                    $audit->id_pegawai = $user->id;
                    $audit->nama_pegawai = $user->name;
                    $audit->model_name = 'Permohonan';
                    $audit->model_id = $permohonan->id;
                    $audit->id_pemohon = $permohonan->user_id;
                    $audit->description = "Tidak meluluskan permohonan " . $permohonan->id;
                    $audit->save();
                }

                $penerimas_emails = User::where('id', $permohonan->user_id)->get();
                foreach ($penerimas_emails as $recipient) {
                    Mail::to($recipient->email)->send(new KelulusanPermohonan($permohonan));
                }
                $permohonan->save();

                if ($permohonan->jenis_permohonan == "Rayuan") {
                    return redirect('/pemproses_hq_tugasan_selesai');
                }

                return redirect('/pelulus_hq_tugasan_selesai');

            } else if ($request->jenis_tindakan == "tambah_senarai_hitam") {
                // dd($request);
                $permohonan->status_permohonan = 'disenarai hitam';
                $permohonan->catatan_senarai_hitam = $request->catatan_senarai_hitam;
                $permohonan->save();

                $audit = new Audit;
                $audit->id_pegawai = $user->id;
                $audit->nama_pegawai = $user->name;
                $audit->model_name = 'Permohonan';
                $audit->model_id = $permohonan->id;
                $audit->id_pemohon = $permohonan->user_id;
                $audit->description = "Menyenarai hitam permohonan " . $permohonan->id;
                $audit->save();

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

                $audit = new Audit;
                $audit->id_pegawai = $user->id;
                $audit->nama_pegawai = $user->name;
                $audit->model_name = 'Permohonan';
                $audit->model_id = $permohonan->id;
                $audit->id_pemohon = $permohonan->user_id;
                $audit->description = "Semak rekod jenayah " . $permohonan->id;
                $audit->save();

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

                $audit = new Audit;
                $audit->id_pegawai = $user->id;
                $audit->nama_pegawai = $user->name;
                $audit->model_name = 'Permohonan';
                $audit->model_id = $permohonan->id;
                $audit->id_pemohon = $permohonan->user_id;
                $audit->description = "Semak rekod jenayah " . $request->tindakan;
                $audit->save();

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


                $permohonan->lesen_memandu = implode(",", $request->lesen_memandu);



                $permohonan->berkerja_panel_atau_syarikat = $request->berkerja_panel_atau_syarikat;

                $permohonan->nama_institusi_kewangan = $request->nama_institusi_kewangan;
                $permohonan->no_telefon_institusi_kewangan = $request->no_telefon_institusi_kewangan;

                $permohonan->nama_panel = $request->nama_panel;
                $permohonan->no_kp_panel = $request->no_kp_panel;
                $permohonan->no_permit_panel = $request->no_permit_panel;
                $permohonan->no_telefon_panel = $request->no_telefon_panel;

                $permohonan->skop_tugas = $request->skop_tugas;
                $permohonan->prosedur_peraturan_eps = $request->prosedur_peraturan_eps;

                if ($request->hasFile('kp_depan')) {
                    $salinan_kp_depan = $request->file('kp_depan')->store('dokumen');
                    $permohonan->salinan_kp_depan = $salinan_kp_depan;
                }

                if ($request->hasFile('salinan_kp_belakang')) {
                    $salinan_kp_belakang = $request->file('salinan_kp_belakang')->store('dokumen');
                    $permohonan->salinan_kp_belakang = $salinan_kp_belakang;
                }

                if ($request->hasFile('salinan_lesen_memandu')) {
                    $salinan_lesen_memandu = $request->file('salinan_lesen_memandu')->store('dokumen');
                    $permohonan->salinan_lesen_memandu = $salinan_lesen_memandu;
                }
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


                $permohonan->lesen_memandu = implode(",", $request->lesen_memandu);


                $permohonan->berkerja_panel_atau_syarikat = $request->berkerja_panel_atau_syarikat;
                $permohonan->nama_institusi_kewangan = $request->nama_institusi_kewangan;
                $permohonan->no_telefon_institusi_kewangan = $request->no_telefon_institusi_kewangan;
                $permohonan->nama_panel = $request->nama_panel;
                $permohonan->no_kp_panel = $request->no_kp_panel;
                $permohonan->no_permit_panel = $request->no_permit_panel;
                $permohonan->no_telefon_panel = $request->no_telefon_panel;
                $permohonan->kehadiran_kursus_eps = $request->kehadiran_kursus_eps;
                $permohonan->tahun_dihadiri = $request->tahun_dihadiri;


                if ($request->hasFile('kp_depan')) {
                    $salinan_kp_depan = $request->file('kp_depan')->store('dokumen');
                    $permohonan->salinan_kp_depan = $salinan_kp_depan;
                }

                if ($request->hasFile('salinan_kp_belakang')) {
                    $salinan_kp_belakang = $request->file('salinan_kp_belakang')->store('dokumen');
                    $permohonan->salinan_kp_belakang = $salinan_kp_belakang;
                }

                if ($request->hasFile('salinan_lesen_memandu')) {
                    $salinan_lesen_memandu = $request->file('salinan_lesen_memandu')->store('dokumen');
                    $permohonan->salinan_lesen_memandu = $salinan_lesen_memandu;
                }

                if ($request->hasFile('salinan_surat_sokongan')) {
                    $salinan_surat_sokongan = $request->file('salinan_surat_sokongan')->store('dokumen');
                    $permohonan->salinan_surat_sokongan = $salinan_surat_sokongan;
                }
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


                if ($request->hasFile('salinan_kp_depan')) {
                    $salinan_kp_depan = $request->file('salinan_kp_depan')->store('dokumen');
                    $permohonan->salinan_kp_depan = $salinan_kp_depan;
                }

                if ($request->hasFile('salinan_kp_belakang')) {
                    $salinan_kp_belakang = $request->file('salinan_kp_belakang')->store('dokumen');
                    $permohonan->salinan_kp_belakang = $salinan_kp_belakang;
                }

                if ($request->hasFile('salinan_laporan_polis')) {
                    $salinan_laporan_polis = $request->file('salinan_laporan_polis')->store('dokumen');
                    $permohonan->salinan_laporan_polis = $salinan_laporan_polis;
                }
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

                if ($request->hasFile('kp_depan')) {
                    $salinan_kp_depan = $request->file('kp_depan')->store('dokumen');
                    $permohonan->salinan_kp_depan = $salinan_kp_depan;
                }

                if ($request->hasFile('salinan_kp_belakang')) {
                    $salinan_kp_belakang = $request->file('salinan_kp_belakang')->store('dokumen');
                    $permohonan->salinan_kp_belakang = $salinan_kp_belakang;
                }

                if ($request->hasFile('salinan_tapisan_rekod_jenayah')) {
                    $salinan_tapisan_rekod_jenayah = $request->file('salinan_tapisan_rekod_jenayah')->store('dokumen');
                    $permohonan->salinan_tapisan_rekod_jenayah = $salinan_tapisan_rekod_jenayah;
                }

                if ($request->hasFile('salinan_sokongan_institusi_kewangan')) {
                    $salinan_sokongan_institusi_kewangan = $request->file('salinan_sokongan_institusi_kewangan')->store('dokumen');
                    $permohonan->salinan_sokongan_institusi_kewangan = $salinan_sokongan_institusi_kewangan;
                }

                if ($request->hasFile('salinan_dokumen_sokongan1')) {
                    $salinan_dokumen_sokongan1 = $request->file('salinan_dokumen_sokongan1')->store('dokumen');
                    $permohonan->salinan_dokumen_sokongan1 = $salinan_dokumen_sokongan1;
                }

                if ($request->hasFile('salinan_dokumen_sokongan2')) {
                    $salinan_dokumen_sokongan2 = $request->file('salinan_dokumen_sokongan2')->store('dokumen');
                    $permohonan->salinan_dokumen_sokongan2 = $salinan_dokumen_sokongan2;
                }

                if ($request->hasFile('salinan_dokumen_sokongan3')) {
                    $salinan_dokumen_sokongan3 = $request->file('salinan_dokumen_sokongan3')->store('dokumen');
                    $permohonan->salinan_dokumen_sokongan3 = $salinan_dokumen_sokongan3;
                }
            }

            $permohonan->save();

            if ($request->status == 'HANTAR') {
                $penerimas_emails = User::where('role', 'pegawai_negeri')->get();
                foreach ($penerimas_emails as $recipient) {
                    Mail::to($recipient->email)->send(new NewPermohonan($permohonan));
                }
            }

            if ($request->status == 'HANTAR') {
                return redirect('/permohonan-berjaya');
            } else {
                return redirect('/permohonan-disimpan');
            }
        }

        $permohonan->save();

        return redirect('/tugasan-selesai');
    }

    public function destroy(Permohonan $permohonan)
    {
        //
    }

    public function maklumatPermohonan(Permohonan $permohonan, Request $request)
    {
        // dd($request);
        $permohonan = Permohonan::where('id', $request->id)->get();

        return view('pemohon.maklumat-status', [
            'permohonan' => $permohonan,
        ]);
    }

    public function cari(Request $request)
    {
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
            return view('pegawai.pdrm.pdrm-tugasan-baru', [
                'permohonan' => $permohonans,
            ]);
        }
    }

    public function cetak(Request $request)
    {
        // dd($request);
        $permohonans = Permohonan::find($request->id);

        $data = '';

        // dd($permohonans);

        if ($permohonans->jenis_permohonan == "Baharu") {
            $pdf = PDF::loadView('pdf.permohonan_baharu', [
                'permohonan' => $permohonans
            ]);
            $nama_lesen = time() . '-permohonan_baharu';
            return $pdf->download($nama_lesen . '.pdf');
        } else if ($permohonans->jenis_permohonan == "Pembaharuan") {
            $pdf = PDF::loadView('pdf.permohonan_pembaharuan', [
                'permohonan' => $permohonans
            ]);
            $nama_lesen = time() . '-permohonan_pembaharuan';
            return $pdf->download($nama_lesen . '.pdf');
        } else if ($permohonans->jenis_permohonan == "Pendua") {
            $pdf = PDF::loadView('pdf.permohonan_pendua', [
                'permohonan' => $permohonans
            ]);
            $nama_lesen = time() . '-permohonan_pendua';
            return $pdf->download($nama_lesen . '.pdf');
        } else if ($permohonans->jenis_permohonan == "Rayuan") {
            $pdf = PDF::loadView('pdf.permohonan_rayuan', [
                'permohonan' => $permohonans
            ]);
            $nama_lesen = time() . '-permohonan_rayuan';
            return $pdf->download($nama_lesen . '.pdf');
        }
    }

    public function tetap_semula()
    {
    }
}
