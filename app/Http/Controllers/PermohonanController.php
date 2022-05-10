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
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use PDF;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;


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
            $permohonan = Permohonan::where('user_id', $user_id)->orderBy('updated_at', 'DESC')->get();
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

            $rules = [
                'no_telefon' => 'required',
                'emel' => 'required',
                'alamat1' => 'required',
                'alamat2' => 'required',
                'alamat3' => 'required',
                'poskod' => 'required',
                'negeri' => 'required',
                'negeri_kutipan_permit' => 'required',
            ];

            // $messages = [
            //     'required' => 'The :attribute is required',
            // ];

            $validator = Validator::make($request->all(), $rules, $messages = [
                'required' => ' :attribute perlu diisi',
            ]);

            // # Write Manual Redirect if Validation Fail
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator->errors());
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

            $rules = [
                'salinan_kp_depan' => 'max:500',
                'salinan_kp_belakang' => 'max:1024',
                'salinan_lesen_memandu' => 'max:1024',
            ];
            $validator = Validator::make($request->all(), $rules, $messages = [
                'max' => 'Size file :attribute tidak boleh melebihi 1mb'
            ]);
            if ($validator->fails()) {
                // $validator->errors()= "";
                return Redirect::back()->withErrors($validator->errors());
            };

            if ($request->status == 'HANTAR') {

                $rules = [
                    'jantina' => 'required',
                    'pekerjaan_sekarang' => 'required',
                    'tahap_pendidikan' => 'required',
                    'lesen_memandu' => 'required',
                    'berkerja_panel_atau_syarikat' => 'required',
                    'skop_tugas' => 'required',
                    'prosedur_peraturan_eps' => 'required',
                    'prosedur_peraturan_eps' => 'required',
                    'salinan_kp_depan' => 'required|max:500',
                    'salinan_kp_belakang' => 'required|max:500',
                    'salinan_lesen_memandu' => 'required|max:500',
                ];


                $validator = Validator::make($request->all(), $rules, $messages = [
                    'required' => ' :attribute perlu diisi',
                    'max' => 'Size file :attribute tidak boleh melebihi 1mb'
                ]);

                if ($validator->fails()) {
                    return Redirect::back()->withErrors($validator->errors());
                };

                ////////////////////
                if ($request->berkerja_panel_atau_syarikat == 'Ya') {
                    $rules = [
                        'nama_institusi_kewangan' => 'required',
                        'no_telefon_institusi_kewangan' => 'required',
                    ];
                } elseif ($request->berkerja_panel_atau_syarikat == 'Tidak') {
                    $rules = [
                        'nama_panel' => 'required',
                        'no_kp_panel' => 'required',
                        'no_permit_panel' => 'required',
                        'no_telefon_panel' => 'required',
                    ];
                }

                $validator = Validator::make($request->all(), $rules, $messages = [
                    'required' => ' :attribute perlu diisi',
                ]);

                if ($validator->fails()) {
                    return Redirect::back()->withErrors($validator->errors());
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


            if ($request->hasFile('salinan_kp_depan')) {
                $salinan_kp_depan = $request->file('salinan_kp_depan')->store('dokumen');
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

                $rules = [
                    'status_pekerjaan_eps' => 'required',
                    'tahap_pendidikan' => 'required',
                    'lesen_memandu' => 'required',
                    'berkerja_panel_atau_syarikat' => 'required',
                    'kehadiran_kursus_eps' => 'required',
                    'kp_depan' => 'required',
                    'salinan_kp_belakang' => 'required|max:1024',
                    'salinan_lesen_memandu' => 'required|max:1024',
                    'salinan_surat_sokongan' => 'required|max:1024',
                ];

                $validator = Validator::make($request->all(), $rules, $messages = [
                    'required' => ' :attribute perlu diisi',
                    'max' => 'Size file :attribute tidak boleh melebihi 1mb'
                ]);

                if ($validator->fails()) {
                    return Redirect::back()->withErrors($validator->errors());
                };

                //////////////////////////
                if ($request->status_pekerjaan_eps == 'sepenuh masa') {
                    $rules = [
                        'tahun_pekerjaan_eps' => 'required',
                    ];
                } elseif ($request->status_pekerjaan_eps == 'pekerjaan sampingan') {
                    $rules = [
                        'pekerjaan_tetap' => 'required',
                    ];
                }
                $validator = Validator::make($request->all(), $rules, $messages = [
                    'required' => ' :attribute perlu diisi',
                ]);
                if ($validator->fails()) {
                    return Redirect::back()->withErrors($validator->errors());
                };

                //////////////////////
                if ($request->berkerja_panel_atau_syarikat == 'Ya') {
                    $rules = [
                        'nama_institusi_kewangan' => 'required',
                        'no_telefon_institusi_kewangan' => 'required',
                    ];
                } elseif ($request->berkerja_panel_atau_syarikat == 'Tidak') {
                    $rules = [
                        'nama_panel' => 'required',
                        'no_kp_panel' => 'required',
                        'no_permit_panel' => 'required',
                        'no_telefon_panel' => 'required',
                    ];
                }
                $validator = Validator::make($request->all(), $rules, $messages = [
                    'required' => ' :attribute perlu diisi',
                ]);
                if ($validator->fails()) {
                    return Redirect::back()->withErrors($validator->errors());
                };

                ///////////////////////
                if ($request->kehadiran_kursus_eps == 'Ya') {
                    $rules = [
                        'tahun_dihadiri' => 'required',
                    ];
                    $validator = Validator::make($request->all(), $rules, $messages = [
                        'required' => ' :attribute perlu diisi',
                    ]);
                    if ($validator->fails()) {
                        return Redirect::back()->withErrors($validator->errors());
                    };
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

                $rules = [
                    'alasan_kehilangan' => 'required',
                    'penggantian_kali_ke' => 'required',
                    'negeri_laporan_polis' => 'required',
                    'no_laporan_polis' => 'required',
                    'salinan_kp_depan' => 'required|max:1024',
                    'salinan_kp_belakang' => 'required|max:1024',
                    'salinan_laporan_polis' => 'required|max:1024',
                ];

                $validator = Validator::make($request->all(), $rules, $messages = [
                    'required' => ' :attribute perlu diisi',
                    'max' => 'Size file :attribute tidak boleh melebihi 1mb'
                ]);
                if ($validator->fails()) {
                    return Redirect::back()->withErrors($validator->errors());
                };

                if ($request->alasan_kehilangan == 'Lain-lain') {
                    $rules = [
                        'alasan_lain' => 'required',
                    ];
                    $validator = Validator::make($request->all(), $rules, $messages = [
                        'required' => ' :attribute perlu diisi',
                    ]);
                    if ($validator->fails()) {
                        return Redirect::back()->withErrors($validator->errors());
                    };
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

                $rules = [
                    'sebab_permohonan_ditolak' => 'required',
                    'rayuan_kali_ke' => 'required',
                    'alasan_rayuan' => 'required',
                    'kp_depan' => 'required',
                    'salinan_kp_belakang' => 'required|max:1024',
                    'salinan_tapisan_rekod_jenayah' => 'required|max:1024',
                    'salinan_sokongan_institusi_kewangan' => 'required|max:1024',
                    'salinan_dokumen_sokongan1' => 'max:1024',
                    'salinan_dokumen_sokongan2' => 'max:1024',
                    'salinan_dokumen_sokongan3' => 'max:1024',
                ];


                $validator = Validator::make($request->all(), $rules, $messages = [
                    'required' => ' :attribute perlu diisi',
                    'max' => 'Size file :attribute tidak boleh melebihi 1mb'
                ]);
                if ($validator->fails()) {
                    return Redirect::back()->withErrors($validator->errors());
                };

                if ($request->sebab_permohonan_ditolak == 'Sebab-sebab Lain') {
                    $rules = [
                        'sebab_lain' => 'required',
                    ];
                    $validator = Validator::make($request->all(), $rules, $messages = [
                        'required' => ' :attribute perlu diisi',
                    ]);
                    if ($validator->fails()) {
                        return Redirect::back()->withErrors($validator->errors());
                    };
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
            // $penerimas_emails = User::where([
            //     ['roles', 'pemproses_negeri'],
            //     // ['negeri', $permohonan->negeri_kutipan_permit]
            // ])->get();

            $penerimas_emails = User::whereHas("roles", function ($q) use ($request) {
                $q->where("name", "pemproses_negeri")->where('negeri', $request->negeri_kutipan_permit);
            })->get();

            // dd($penerimas_emails);
            foreach ($penerimas_emails as $recipient) {
                Http::post('https://webhook.site/cf0f89d6-c464-45d2-956c-363995f9b914', [
                    'data' => $permohonan
                ]);
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


            $userrole = Auth::user()->roles;
            foreach ($userrole as $user) {
                if ($user->name == "pemproses_negeri") {
                    return view('pegawai.negeri.negeri-maklumat-pemohon', [
                        'permohonan' => $permohonan
                    ]);
                }
            }

            // return view('pegawai.hq.hq-maklumat-pemohon', [
            //     'permohonan' => $permohonan
            // ]);
        }
        if ($user_role == 'pegawai_pdrm') {
            return view('pegawai.pdrm.pdrm-maklumat-pemohon', [
                'permohonan' => $permohonan
            ]);
        }
        if ($user_role == 'pemohon') {

            $user = $request->user();
            $user_role = $user->role;
            $user_id = $user->id;

            $pemohons = User::where('id', $user_id)->get()->first();

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
                    'pemohon' => $pemohons
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
                    'pemohon' => $pemohons
                ]);
            } else if ($permohonan->jenis_permohonan == "Pendua") {
                return view('pemohon.kemaskini-pendua', [
                    'permohonan' => $permohonan,
                    'pemohon' => $pemohons
                ]);
            } else if ($permohonan->jenis_permohonan == "Rayuan") {
                return view('pemohon.kemaskini-rayuan', [
                    'permohonan' => $permohonan,
                    'pemohon' => $pemohons
                ]);
            }
        }
    }

    public function show_pegawai_hq($id)
    {

        // dd($id);
        $permohonan = Permohonan::find($id);
        return view('pegawai.hq.hq-maklumat-pemohon', [
            'permohonan' => $permohonan
        ]);
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

                        $permohonan->tarikh_penerimaan = date('Y-m-d H:i:s');



                        $audit = new Audit;
                        $audit->id_pegawai = $user->id;
                        $audit->nama_pegawai = $user->name;
                        $audit->model_name = 'Permohonan';
                        $audit->model_id = $permohonan->id;
                        $audit->id_pemohon = $permohonan->user_id;
                        $audit->description = 'Hantar permohonan lengkap ke pemproses HQ';
                        $audit->info_pemohon = $permohonan->jenis_permohonan . " " . $permohonan->nama . " " . $permohonan->no_kp;
                        $audit->save();
                    } else if ($request->tindakan == "Permohonan Tidak Lengkap") {

                        $permohonan->tarikh_penerimaan = date('Y-m-d H:i:s');

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
                        $audit->info_pemohon = $permohonan->jenis_permohonan . " " . $permohonan->nama . " " . $permohonan->no_kp;
                        $audit->save();
                    }
                } else if ($permohonan->jenis_permohonan == "Pendua") {
                    if ($request->tindakan == "Permohonan Lengkap") {

                        $permohonan->tarikh_penerimaan = date('Y-m-d H:i:s');
                        $permohonan->status_permohonan = "hantar_ke_penyokong_negeri";
                        $permohonan->catatan_pegawai_negeri = $request->catatan_pegawai_negeri;

                        $permohonan->tarikh_pengesahan = date('Y-m-d H:i:s');

                        $audit = new Audit;
                        $audit->id_pegawai = $user->id;
                        $audit->nama_pegawai = $user->name;
                        $audit->model_name = 'Permohonan';
                        $audit->model_id = $permohonan->id;
                        $audit->id_pemohon = $permohonan->user_id;
                        $audit->description = 'Hantar permohonan lengkap ke pemproses negeri';
                        $audit->info_pemohon = $permohonan->jenis_permohonan . " " . $permohonan->nama . " " . $permohonan->no_kp;
                        $audit->save();
                    } else if ($request->tindakan == "Permohonan Tidak Lengkap") {

                        $permohonan->tarikh_penerimaan = date('Y-m-d H:i:s');
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
                        $audit->info_pemohon = $permohonan->jenis_permohonan . " " . $permohonan->nama . " " . $permohonan->no_kp;
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

                    $permohonan->tarikh_sokongan = date('Y-m-d H:i:s');

                    $audit = new Audit;
                    $audit->id_pegawai = $user->id;
                    $audit->nama_pegawai = $user->name;
                    $audit->model_name = 'Permohonan';
                    $audit->model_id = $permohonan->id;
                    $audit->id_pemohon = $permohonan->user_id;
                    $audit->description = 'Menyokong permohonan';
                    $audit->info_pemohon = $permohonan->jenis_permohonan . " " . $permohonan->nama . " " . $permohonan->no_kp;
                    $audit->save();
                } else if ($request->tindakan == "Tidak Disokong") {

                    $permohonan->status_permohonan = "tidak_disokong_negeri";
                    $permohonan->sokongan = $request->tindakan;
                    $permohonan->catatan_penyokong = $request->catatan_penyokong;

                    $permohonan->tarikh_sokongan = date('Y-m-d H:i:s');

                    $audit = new Audit;
                    $audit->id_pegawai = $user->id;
                    $audit->nama_pegawai = $user->name;
                    $audit->model_name = 'Permohonan';
                    $audit->model_id = $permohonan->id;
                    $audit->id_pemohon = $permohonan->user_id;
                    $audit->description = 'Tidak menyokong permohonan ';
                    $audit->info_pemohon = $permohonan->jenis_permohonan . " " . $permohonan->nama . " " . $permohonan->no_kp;
                    $audit->save();
                }
                $permohonan->save();

                return redirect('/penyokong_negeri_tugasan_selesai');
            } else if ($request->jenis_tindakan == "kelulusan_permohonan") {

                $permohonan->status_permohonan = $request->tindakan;
                $permohonan->catatan_pelulus = $request->catatan_pelulus;

                if ($permohonan->jenis_permohonan == "Baharu" || $permohonan->jenis_permohonan == "Pembaharuan") {
                    if ($permohonan->tempoh_kelulusan == "1 tahun") {
                        $permohonan->bayaran_fi = 10;
                        $permohonan->tarikh_diluluskan = date("Y-m-d H:i:s");
                        // $permohonan->tarikh_tamat_permit = date('Y-m-d', strtotime('+1 years -1 days'));
                    } else if ($permohonan->tempoh_kelulusan == "2 tahun") {
                        $permohonan->bayaran_fi = 20;
                        $permohonan->tarikh_diluluskan = date("Y-m-d H:i:s");
                        // $permohonan->tarikh_tamat_permit = date('Y-m-d', strtotime('+2 years -1 days'));
                    }

                    $audit = new Audit;
                    $audit->id_pegawai = $user->id;
                    $audit->nama_pegawai = $user->name;
                    $audit->model_name = 'Permohonan';
                    $audit->model_id = $permohonan->id;
                    $audit->id_pemohon = $permohonan->user_id;
                    $audit->description = 'Meluluskan permohonan';
                    $audit->info_pemohon = $permohonan->jenis_permohonan . " " . $permohonan->nama . " " . $permohonan->no_kp;
                    $audit->save();
                } else if ($permohonan->jenis_permohonan == "Pendua") {
                    $permohonan->bayaran_fi = 20;
                    $permohonan->tarikh_diluluskan = date("Y-m-d H:i:s");
                    // $permohonan->tarikh_tamat_permit = date('Y-m-d', strtotime('+2 years'));

                    $audit = new Audit;
                    $audit->id_pegawai = $user->id;
                    $audit->nama_pegawai = $user->name;
                    $audit->model_name = 'Permohonan';
                    $audit->model_id = $permohonan->id;
                    $audit->id_pemohon = $permohonan->user_id;
                    $audit->description = 'Tidak meluluskan permohonan';
                    $audit->info_pemohon = $permohonan->jenis_permohonan . " " . $permohonan->nama . " " . $permohonan->no_kp;
                    $audit->save();
                }

                if ($request->tindakan == "Tidak Diluluskan") {
                    $user = User::find($permohonan->user_id);

                    $user->status_permohonan = "tidak_diluluskan";
                    $permohonan->tarikh_diluluskan = date('Y-m-d H:i:s');
                    $user->save();
                } else if ($request->tindakan == "Diluluskan") {
                    $user = User::find($permohonan->user_id);

                    $user->status_permohonan = "diluluskan";
                    $user->save();

                    $permohonan->tarikh_diluluskan = date('Y-m-d H:i:s');
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

            if ($request->jenis_tindakan == "semakan_permohonan") {
                if ($permohonan->jenis_permohonan == "Baharu" || $permohonan->jenis_permohonan == "Pembaharuan" || $permohonan->jenis_permohonan == "Rayuan") {
                    if ($request->tindakan == "Permohonan Lengkap") {
                        $permohonan->status_permohonan = "hantar_ke_pemproses_hq";
                        $permohonan->catatan_pegawai_negeri = $request->catatan_pegawai_negeri;

                        $permohonan->tarikh_penerimaan = date('Y-m-d H:i:s');

                        $audit = new Audit;
                        $audit->id_pegawai = $user->id;
                        $audit->nama_pegawai = $user->name;
                        $audit->model_name = 'Permohonan';
                        $audit->model_id = $permohonan->id;
                        $audit->id_pemohon = $permohonan->user_id;
                        $audit->description = 'Hantar permohonan lengkap ke pemproses HQ';
                        $audit->info_pemohon = $permohonan->jenis_permohonan . " " . $permohonan->nama . " " . $permohonan->no_kp;
                        $audit->save();
                    } else if ($request->tindakan == "Permohonan Tidak Lengkap") {

                        $permohonan->tarikh_penerimaan = date('Y-m-d H:i:s');
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
                        $audit->info_pemohon = $permohonan->jenis_permohonan . " " . $permohonan->nama . " " . $permohonan->no_kp;
                        $audit->save();
                    }
                } else if ($permohonan->jenis_permohonan == "Pendua") {
                    if ($request->tindakan == "Permohonan Lengkap") {

                        $permohonan->tarikh_penerimaan = date('Y-m-d H:i:s');
                        $permohonan->status_permohonan = "hantar_ke_penyokong_negeri";
                        $permohonan->catatan_pegawai_negeri = $request->catatan_pegawai_negeri;

                        $permohonan->tarikh_pengesahan = date('Y-m-d H:i:s');

                        $audit = new Audit;
                        $audit->id_pegawai = $user->id;
                        $audit->nama_pegawai = $user->name;
                        $audit->model_name = 'Permohonan';
                        $audit->model_id = $permohonan->id;
                        $audit->id_pemohon = $permohonan->user_id;
                        $audit->description = 'Hantar permohonan lengkap ke pemproses negeri';
                        $audit->info_pemohon = $permohonan->jenis_permohonan . " " . $permohonan->nama . " " . $permohonan->no_kp;
                        $audit->save();
                    } else if ($request->tindakan == "Permohonan Tidak Lengkap") {

                        $permohonan->tarikh_penerimaan = date('Y-m-d H:i:s');
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
                        $audit->info_pemohon = $permohonan->jenis_permohonan . " " . $permohonan->nama . " " . $permohonan->no_kp;
                        $audit->save();
                    }
                }
                $permohonan->save();

                return redirect('/pemproses_negeri_tugasan_selesai');
            } else if ($request->jenis_tindakan == "hantar_ke_pdrm") {

                $permohonan->tarikh_pengesahan = date('Y-m-d H:i:s');
                $permohonan->status_permohonan = "hantar ke pdrm";
                $permohonan->catatan_pegawai_hq = $request->catatan_pegawai_hq;

                $permohonan->save();

                $audit = new Audit;
                $audit->id_pegawai = $user->id;
                $audit->nama_pegawai = $user->name;
                $audit->model_name = 'Permohonan';
                $audit->model_id = $permohonan->id;
                $audit->id_pemohon = $permohonan->user_id;
                $audit->description = 'Hantar permohonan ke PDRM';
                $audit->info_pemohon = $permohonan->jenis_permohonan . " " . $permohonan->nama . " " . $permohonan->no_kp;
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
                    $audit->info_pemohon = $permohonan->jenis_permohonan . " " . $permohonan->nama . " " . $permohonan->no_kp;
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
                    $audit->info_pemohon = $permohonan->jenis_permohonan . " " . $permohonan->nama . " " . $permohonan->no_kp;
                    $audit->save();

                    return redirect('/pemproses_hq_tugasan_selesai');
                }
            } else if ($request->jenis_tindakan == "sokongan_permohonan") {
                if ($request->tindakan == "Disokong") {
                    $permohonan->status_permohonan = "disokong_hq";
                    $permohonan->sokongan = $request->tindakan;
                    $permohonan->tempoh_kelulusan =  $request->tempoh_kelulusan;
                    $permohonan->catatan_penyokong = $request->catatan_penyokong;

                    $permohonan->tarikh_sokongan = date('Y-m-d H:i:s');

                    $permohonan->save();
                    // $mael = "1";
                    $audit = new Audit;
                    $audit->id_pegawai = $user->id;
                    $audit->nama_pegawai = $user->name;
                    $audit->model_name = 'Permohonan';
                    $audit->model_id = $permohonan->id;
                    $audit->id_pemohon = $permohonan->user_id;
                    $audit->description = 'Menyokong permohonan';
                    $audit->info_pemohon = $permohonan->jenis_permohonan . " " . $permohonan->nama . " " . $permohonan->no_kp;
                    $audit->save();

                    return redirect('/penyokong_hq_tugasan_selesai');
                } else if ($request->tindakan == "Tidak Disokong") {
                    $permohonan->status_permohonan = "tidak_disokong_hq";
                    $permohonan->sokongan = $request->tindakan;
                    $permohonan->catatan_penyokong = $request->catatan_penyokong;

                    $permohonan->tarikh_sokongan = date('Y-m-d H:i:s');

                    $permohonan->save();

                    $audit = new Audit;
                    $audit->id_pegawai = $user->id;
                    $audit->nama_pegawai = $user->name;
                    $audit->model_name = 'Permohonan';
                    $audit->model_id = $permohonan->id;
                    $audit->id_pemohon = $permohonan->user_id;
                    $audit->description = 'Tidak menyokong permohonan';
                    $audit->info_pemohon = $permohonan->jenis_permohonan . " " . $permohonan->nama . " " . $permohonan->no_kp;
                    $audit->save();

                    return redirect('/penyokong_hq_tugasan_selesai');
                }
            } else if ($request->jenis_tindakan == "kelulusan_permohonan") {

                $permohonan->status_permohonan = $request->tindakan;


                if ($permohonan->jenis_permohonan == "Rayuan") {
                    $permohonan->catatan_pegawai_hq = $request->catatan_pelulus;
                    $permohonan->tempoh_kelulusan = $request->tempoh_kelulusan;
                } else {
                    $permohonan->catatan_pelulus = $request->catatan_pelulus;
                }

                if ($request->tindakan == "Diluluskan") {

                    // $permohonan->tarikh_pengesahan = date('Y-m-d H:i:s');

                    $user = User::find($permohonan->user_id);

                    $user->status_permohonan = "diluluskan";
                    $user->save();

                    if ($permohonan->tempoh_kelulusan == "1 tahun") {
                        $permohonan->bayaran_fi = 10;
                        $permohonan->tarikh_diluluskan = date("Y-m-d H:i:s");
                        // $permohonan->tarikh_tamat_permit = date('Y-m-d', strtotime('+1 years -1 days'));
                    } else if ($permohonan->tempoh_kelulusan == "2 tahun") {
                        $permohonan->bayaran_fi = 20;
                        $permohonan->tarikh_diluluskan = date("Y-m-d H:i:s");
                        // $permohonan->tarikh_tamat_permit = date('Y-m-d', strtotime('+2 years -1 days'));
                    }

                    $audit = new Audit;
                    $audit->id_pegawai = $user->id;
                    $audit->nama_pegawai = $user->name;
                    $audit->model_name = 'Permohonan';
                    $audit->model_id = $permohonan->id;
                    $audit->id_pemohon = $permohonan->user_id;
                    $audit->description = "Meluluskan permohonan";
                    $audit->info_pemohon = $permohonan->jenis_permohonan . " " . $permohonan->nama . " " . $permohonan->no_kp;
                    $audit->save();
                } else if ($request->tindakan == "Tidak Diluluskan") {


                    $user = User::find($permohonan->user_id);
                    $permohonan->tarikh_diluluskan = date('Y-m-d H:i:s');

                    $user->status_permohonan = "tidak_diluluskan";
                    $user->save();

                    $audit = new Audit;
                    $audit->id_pegawai = $user->id;
                    $audit->nama_pegawai = $user->name;
                    $audit->model_name = 'Permohonan';
                    $audit->model_id = $permohonan->id;
                    $audit->id_pemohon = $permohonan->user_id;
                    $audit->description = "Tidak meluluskan permohonan";
                    $audit->info_pemohon = $permohonan->jenis_permohonan . " " . $permohonan->nama . " " . $permohonan->no_kp;
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
                $audit->description = "Menyenarai hitam permohonan";
                $audit->info_pemohon = $permohonan->jenis_permohonan . " " . $permohonan->nama . " " . $permohonan->no_kp;
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
                $audit->description = "Semak rekod jenayah";
                $audit->info_pemohon = $permohonan->jenis_permohonan . " " . $permohonan->nama . " " . $permohonan->no_kp;
                $audit->save();

                return redirect('/permohonan');
            } else {
                $permohonan->rekod_jenayah = $request->tindakan;
                $permohonan->status_permohonan = 'disemak pdrm';

                $permohonan->tarikh_semakan_pdrm = date('Y-m-d H:i:s');

                $permohonan->catatan_pdrm = $request->catatan_pdrm;
                $permohonan->save();

                $penerimas_emails = User::whereHas("roles", function ($q) {
                    $q->where("name", "pemproses_hq");
                })->get();

                // $penerimas_emails = User::where('role', 'pegawai_hq')->get();
                foreach ($penerimas_emails as $recipient) {
                    Mail::to($recipient->email)->send(new SemakanPDRM($permohonan));
                }

                $audit = new Audit;
                $audit->id_pegawai = $user->id;
                $audit->nama_pegawai = $user->name;
                $audit->model_name = 'Permohonan';
                $audit->model_id = $permohonan->id;
                $audit->id_pemohon = $permohonan->user_id;
                $audit->description = "Semak rekod jenayah";
                $audit->info_pemohon = "Jenis Permohonan " . $permohonan->jenis_permohonan . " " . "Nama " . $permohonan->nama . " " . "no kad pengenalan " . $permohonan->no_kp;
                $audit->save();

                return redirect('/tugasan-selesai');
            }
        } else if ($user_role == 'pemohon') {

            //$permohonan->user_id = $user_id;
            $permohonan->gambar_pemohon = $request->gambar_pemohon;

            $permohonan->gambar_pemohon = $request->gambar_pemohon;

            if ($request->status == 'HANTAR') {

                $rules = [
                    'no_telefon' => 'required',
                    'emel' => 'required',
                    'alamat1' => 'required',
                    'alamat2' => 'required',
                    'alamat3' => 'required',
                    'poskod' => 'required',
                    'negeri' => 'required',
                    'negeri_kutipan_permit' => 'required',
                ];

                // $messages = [
                //     'required' => 'The :attribute is required',
                // ];

                $validator = Validator::make($request->all(), $rules, $messages = [
                    'required' => ' :attribute perlu diisi',
                ]);

                // # Write Manual Redirect if Validation Fail
                if ($validator->fails()) {
                    return Redirect::back()->withErrors($validator->errors());
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

                    $rules = [
                        'jantina' => 'required',
                        'pekerjaan_sekarang' => 'required',
                        'tahap_pendidikan' => 'required',
                        'lesen_memandu' => 'required',
                        'berkerja_panel_atau_syarikat' => 'required',
                        'skop_tugas' => 'required',
                        'prosedur_peraturan_eps' => 'required',
                        'prosedur_peraturan_eps' => 'required',
                        'salinan_kp_depan' => 'required|max:1024',
                        'salinan_kp_belakang' => 'required|max:1024',
                        'salinan_lesen_memandu' => 'required|max:1024',
                    ];


                    $validator = Validator::make($request->all(), $rules, $messages = [
                        'required' => ' :attribute perlu diisi',
                        'max' => 'Size file :attribute tidak boleh melebihi 1mb'
                    ]);

                    if ($validator->fails()) {
                        return Redirect::back()->withErrors($validator->errors());
                    };

                    ////////////////////
                    if ($request->berkerja_panel_atau_syarikat == 'Ya') {
                        $rules = [
                            'nama_institusi_kewangan' => 'required',
                            'no_telefon_institusi_kewangan' => 'required',
                        ];
                    } elseif ($request->berkerja_panel_atau_syarikat == 'Tidak') {
                        $rules = [
                            'nama_panel' => 'required',
                            'no_kp_panel' => 'required',
                            'no_permit_panel' => 'required',
                            'no_telefon_panel' => 'required',
                        ];
                    }

                    $validator = Validator::make($request->all(), $rules, $messages = [
                        'required' => ' :attribute perlu diisi',
                    ]);

                    if ($validator->fails()) {
                        return Redirect::back()->withErrors($validator->errors());
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


                if ($request->hasFile('salinan_kp_depan')) {
                    $salinan_kp_depan = $request->file('salinan_kp_depan')->store('dokumen');
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

                    $rules = [
                        'status_pekerjaan_eps' => 'required',
                        'tahap_pendidikan' => 'required',
                        'lesen_memandu' => 'required',
                        'berkerja_panel_atau_syarikat' => 'required',
                        'kehadiran_kursus_eps' => 'required',
                        'kp_depan' => 'required',
                        'salinan_kp_belakang' => 'required|max:1024',
                        'salinan_lesen_memandu' => 'required|max:1024',
                        'salinan_surat_sokongan' => 'required|max:1024',
                    ];

                    $validator = Validator::make($request->all(), $rules, $messages = [
                        'required' => ' :attribute perlu diisi',
                        'max' => 'Size file :attribute tidak boleh melebihi 1mb'
                    ]);

                    if ($validator->fails()) {
                        return Redirect::back()->withErrors($validator->errors());
                    };

                    //////////////////////////
                    if ($request->status_pekerjaan_eps == 'sepenuh masa') {
                        $rules = [
                            'tahun_pekerjaan_eps' => 'required',
                        ];
                    } elseif ($request->status_pekerjaan_eps == 'pekerjaan sampingan') {
                        $rules = [
                            'pekerjaan_tetap' => 'required',
                        ];
                    }
                    $validator = Validator::make($request->all(), $rules, $messages = [
                        'required' => ' :attribute perlu diisi',
                    ]);
                    if ($validator->fails()) {
                        return Redirect::back()->withErrors($validator->errors());
                    };

                    //////////////////////
                    if ($request->berkerja_panel_atau_syarikat == 'Ya') {
                        $rules = [
                            'nama_institusi_kewangan' => 'required',
                            'no_telefon_institusi_kewangan' => 'required',
                        ];
                    } elseif ($request->berkerja_panel_atau_syarikat == 'Tidak') {
                        $rules = [
                            'nama_panel' => 'required',
                            'no_kp_panel' => 'required',
                            'no_permit_panel' => 'required',
                            'no_telefon_panel' => 'required',
                        ];
                    }
                    $validator = Validator::make($request->all(), $rules, $messages = [
                        'required' => ' :attribute perlu diisi',
                    ]);
                    if ($validator->fails()) {
                        return Redirect::back()->withErrors($validator->errors());
                    };

                    ///////////////////////
                    if ($request->kehadiran_kursus_eps == 'Ya') {
                        $rules = [
                            'tahun_dihadiri' => 'required',
                        ];
                        $validator = Validator::make($request->all(), $rules, $messages = [
                            'required' => ' :attribute perlu diisi',
                        ]);
                        if ($validator->fails()) {
                            return Redirect::back()->withErrors($validator->errors());
                        };
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

                    $rules = [
                        'alasan_kehilangan' => 'required',
                        'penggantian_kali_ke' => 'required',
                        'negeri_laporan_polis' => 'required',
                        'no_laporan_polis' => 'required',
                        'salinan_kp_depan' => 'required|max:1024',
                        'salinan_kp_belakang' => 'required|max:1024',
                        'salinan_laporan_polis' => 'required|max:1024',
                    ];

                    $validator = Validator::make($request->all(), $rules, $messages = [
                        'required' => ' :attribute perlu diisi',
                        'max' => 'Size file :attribute tidak boleh melebihi 1mb'
                    ]);
                    if ($validator->fails()) {
                        return Redirect::back()->withErrors($validator->errors());
                    };

                    if ($request->alasan_kehilangan == 'Lain-lain') {
                        $rules = [
                            'alasan_lain' => 'required',
                        ];
                        $validator = Validator::make($request->all(), $rules, $messages = [
                            'required' => ' :attribute perlu diisi',
                        ]);
                        if ($validator->fails()) {
                            return Redirect::back()->withErrors($validator->errors());
                        };
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

                    $rules = [
                        'sebab_permohonan_ditolak' => 'required',
                        'rayuan_kali_ke' => 'required',
                        'alasan_rayuan' => 'required',
                        'kp_depan' => 'required',
                        'salinan_kp_belakang' => 'required|max:1024',
                        'salinan_tapisan_rekod_jenayah' => 'required|max:1024',
                        'salinan_sokongan_institusi_kewangan' => 'required|max:1024',
                        'salinan_dokumen_sokongan1' => 'max:1024',
                        'salinan_dokumen_sokongan2' => 'max:1024',
                        'salinan_dokumen_sokongan3' => 'max:1024',
                    ];


                    $validator = Validator::make($request->all(), $rules, $messages = [
                        'required' => ' :attribute perlu diisi',
                        'max' => 'Size file :attribute tidak boleh melebihi 1mb'
                    ]);
                    if ($validator->fails()) {
                        return Redirect::back()->withErrors($validator->errors());
                    };

                    if ($request->sebab_permohonan_ditolak == 'Sebab-sebab Lain') {
                        $rules = [
                            'sebab_lain' => 'required',
                        ];
                        $validator = Validator::make($request->all(), $rules, $messages = [
                            'required' => ' :attribute perlu diisi',
                        ]);
                        if ($validator->fails()) {
                            return Redirect::back()->withErrors($validator->errors());
                        };
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
                // $penerimas_emails = User::where('role', 'pegawai_negeri')->get();
                $penerimas_emails = User::whereHas("roles", function ($q) use ($request) {
                    $q->where("name", "pemproses_negeri")->where('negeri', $request->negeri_kutipan_permit);
                })->get();

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

    public function cetak($id)
    {
        // dd($request);
        $permohonans = Permohonan::find($id);
        $user = User::find($permohonans->user_id);

        $lesen_memandus = explode(",", $permohonans->lesen_memandu);



        if ($permohonans->jenis_permohonan == "Baharu") {

            $pdf = PDF::loadView('pdf.permohonan_baharu', [
                'masa' => time(),
                'permohonan' => $permohonans,
                'user' => $user,
                'lesen' => $lesen_memandus
            ]);

            $nama_lesen = time() . '-permohonan_baharu';

            Storage::put('/pdf/' . $nama_lesen, $pdf->output());

            $file = public_path() . "/storage/pdf/" . $nama_lesen;

            $headers = [
                'Content-Type' => 'application/pdf',
            ];

            return response()->download($file, $nama_lesen . '.pdf', $headers);

            // return $pdf->download($nama_lesen . '.pdf');
        } else if ($permohonans->jenis_permohonan == "Pembaharuan") {
            $pdf = PDF::loadView('pdf.permohonan_pembaharuan', [
                'masa' => time(),
                'permohonan' => $permohonans,
                'user' => $user,
                'lesen' => $lesen_memandus
            ]);
            $nama_lesen = time() . '-permohonan_pembaharuan';
            return $pdf->download($nama_lesen . '.pdf');
        } else if ($permohonans->jenis_permohonan == "Pendua") {
            $pdf = PDF::loadView('pdf.permohonan_pendua', [
                'masa' => time(),
                'permohonan' => $permohonans,
                'user' => $user,
                'lesen' => $lesen_memandus
            ]);
            $nama_lesen = time() . '-permohonan_pendua';
            return $pdf->download($nama_lesen . '.pdf');
        } else if ($permohonans->jenis_permohonan == "Rayuan") {
            // dd('$permohonan');
            $pdf = PDF::loadView('pdf.permohonan_rayuan', [
                'masa' => time(),
                'permohonan' => $permohonans,
                'user' => $user,
                'lesen' => $lesen_memandus
            ]);
            $nama_lesen = time() . '-permohonan_rayuan';
            return $pdf->download($nama_lesen . '.pdf');
        }
    }

    public function tetap_semula()
    {
    }
}
