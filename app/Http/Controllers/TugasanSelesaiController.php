<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;

class TugasanSelesaiController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $user_role = $user->role;
        $user_id = $user->id;
        $user_roles = $user->roles;
        $user_negeri = $user->negeri;

        // $permohonan = Permohonan::where([
        //     ['negeri_kutipan_permit', '=', $user_negeri], ['status_permohonan', '=', 'hantar_ke_penyokong_negeri']
        // ])->get();

        if ($user_role == 'pegawai_pdrm') {
            $permohonan = Permohonan::where([
                ['jenis_permohonan', '=', 'Baharu'], ['status_permohonan', '=', 'disemak pdrm'],
            ])->orWhere([
                ['jenis_permohonan', '=', 'Baharu'], ['status_permohonan', '=', 'Diluluskan'],
            ])->orWhere([
                ['jenis_permohonan', '=', 'Baharu'], ['status_permohonan', '=', 'Tidak Diluluskan'],
            ])->orWhere([
                ['jenis_permohonan', '=', 'Baharu'], ['status_permohonan', '=', 'disokong_hq'],
            ])->orWhere([
                ['jenis_permohonan', '=', 'Baharu'], ['status_permohonan', '=', 'tidak_disokong_hq'],
            ])->orWhere([
                ['jenis_permohonan', '=', 'Baharu'], ['status_permohonan', '=', 'disokong_negeri'],
            ])->orWhere([
                ['jenis_permohonan', '=', 'Baharu'], ['status_permohonan', '=', 'tidak_disokong_negeri'],
            ])->orWhere([
                ['jenis_permohonan', '=', 'Pembaharuan'], ['status_permohonan', '=', 'disemak pdrm'],
            ])->orWhere([
                ['jenis_permohonan', '=', 'Pembaharuan'], ['status_permohonan', '=', 'Diluluskan'],
            ])->orWhere([
                ['jenis_permohonan', '=', 'Pembaharuan'], ['status_permohonan', '=', 'Tidak Diluluskan'],
            ])->orWhere([
                ['jenis_permohonan', '=', 'Pembaharuan'], ['status_permohonan', '=', 'disokong_hq'],
            ])->orWhere([
                ['jenis_permohonan', '=', 'Pembaharuan'], ['status_permohonan', '=', 'tidak_disokong_hq'],
            ])->orWhere([
                ['jenis_permohonan', '=', 'Pembaharuan'], ['status_permohonan', '=', 'disokong_negeri'],
            ])->orWhere([
                ['jenis_permohonan', '=', 'Pembaharuan'], ['status_permohonan', '=', 'tidak_disokong_negeri'],
            ])->get();

            return view('pegawai.pdrm.pdrm-tugasan-selesai', [
                'permohonan' => $permohonan
            ]);
        }
    }

    public function cari(Request $request)
    {
        $user = $request->user();
        $user_role = $user->role;

        if ($user_role == 'pegawai_negeri') {
            if ($request->no_kp != null && $request->jenis_permohonan == "null") {
                $permohonans = Permohonan::where([
                    ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'Permohonan Lengkap']
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'Permohonan Tidak Lengkap'],
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'disemak pdrm'],
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'Disokong'],
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'Tidak Disokong'],
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'hantar ke pdrm'],
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'Dalam Proses'],
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'Diluluskan'],
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'Tidak Diluluskan'],
                ])->get();
            } else if ($request->no_kp == null && $request->jenis_permohonan != "null") {
                $permohonans = Permohonan::where([
                    ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'Permohonan Lengkap']
                ])->orWhere([
                    ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'Permohonan Tidak Lengkap'],
                ])->orWhere([
                    ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'disemak pdrm'],
                ])->orWhere([
                    ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'Disokong'],
                ])->orWhere([
                    ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'Tidak Disokong'],
                ])->orWhere([
                    ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'hantar ke pdrm'],
                ])->orWhere([
                    ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'Dalam Proses'],
                ])->orWhere([
                    ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'Diluluskan'],
                ])->orWhere([
                    ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'Tidak Diluluskan'],
                ])->get();
            } else {
                $permohonans = Permohonan::where([
                    ['jenis_permohonan', '=', $request->jenis_permohonan], ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'Permohonan Lengkap']
                ])->orWhere([
                    ['jenis_permohonan', '=', $request->jenis_permohonan], ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'Permohonan Tidak Lengkap'],
                ])->orWhere([
                    ['jenis_permohonan', '=', $request->jenis_permohonan], ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'disemak pdrm'],
                ])->orWhere([
                    ['jenis_permohonan', '=', $request->jenis_permohonan], ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'Disokong'],
                ])->orWhere([
                    ['jenis_permohonan', '=', $request->jenis_permohonan], ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'Tidak Disokong'],
                ])->orWhere([
                    ['jenis_permohonan', '=', $request->jenis_permohonan], ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'hantar ke pdrm'],
                ])->orWhere([
                    ['jenis_permohonan', '=', $request->jenis_permohonan], ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'Dalam Proses'],
                ])->orWhere([
                    ['jenis_permohonan', '=', $request->jenis_permohonan], ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'Diluluskan'],
                ])->orWhere([
                    ['jenis_permohonan', '=', $request->jenis_permohonan], ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'Tidak Diluluskan'],
                ])->get();
            }
            return view('pegawai.negeri.negeri-tugasan-selesai', [
                'permohonan' => $permohonans,
            ]);
        } else if ($user_role == 'pegawai_hq') {
            if ($request->no_kp == null && $request->negeri == "null" && $request->jenis_permohonan != "null") {
                $permohonans = Permohonan::where([
                    ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'hantar ke pdrm']
                ])->orWhere([
                    ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'Diluluskan'],
                ])->orWhere([
                    ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'Tidak Diluluskan'],
                ])->orWhere([
                    ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'hantar ke penyokong'],
                ])->get();
            } else if ($request->no_kp == null && $request->negeri != "null" && $request->jenis_permohonan == "null") {
                $permohonans = Permohonan::where([
                    ['negeri', '=', $request->negeri], ['status_permohonan', '=', 'hantar ke pdrm']
                ])->orWhere([
                    ['negeri', '=', $request->negeri], ['status_permohonan', '=', 'Diluluskan'],
                ])->orWhere([
                    ['negeri', '=', $request->negeri], ['status_permohonan', '=', 'Tidak Diluluskan'],
                ])->orWhere([
                    ['negeri', '=', $request->negeri], ['status_permohonan', '=', 'hantar ke penyokong'],
                ])->get();
            } else if ($request->no_kp == null && $request->negeri != "null" && $request->jenis_permohonan != "null") {
                $permohonans = Permohonan::where([
                    ['negeri', '=', $request->negeri], ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'hantar ke pdrm']
                ])->orWhere([
                    ['negeri', '=', $request->negeri], ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'Diluluskan'],
                ])->orWhere([
                    ['negeri', '=', $request->negeri], ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'Tidak Diluluskan'],
                ])->orWhere([
                    ['negeri', '=', $request->negeri], ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'hantar ke penyokong'],
                ])->get();
            } else if ($request->no_kp != null && $request->negeri == "null" && $request->jenis_permohonan == "null") {
                $permohonans = Permohonan::where([
                    ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'hantar ke pdrm']
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'Diluluskan'],
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'Tidak Diluluskan'],
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'hantar ke penyokong'],
                ])->get();
            } else if ($request->no_kp != null && $request->negeri == "null" && $request->jenis_permohonan != "null") {
                $permohonans = Permohonan::where([
                    ['no_kp', '=', $request->no_kp], ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'hantar ke pdrm']
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'Diluluskan'],
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'Tidak Diluluskan'],
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'hantar ke penyokong'],
                ])->get();
            } else if ($request->no_kp != null && $request->negeri != "null" && $request->jenis_permohonan == "null") {
                $permohonans = Permohonan::where([
                    ['no_kp', '=', $request->no_kp], ['negeri', '=', $request->negeri], ['status_permohonan', '=', 'hantar ke pdrm']
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['negeri', '=', $request->negeri], ['status_permohonan', '=', 'Diluluskan'],
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['negeri', '=', $request->negeri], ['status_permohonan', '=', 'Tidak Diluluskan'],
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['negeri', '=', $request->negeri], ['status_permohonan', '=', 'hantar ke penyokong'],
                ])->get();
            } else {
                $permohonans = Permohonan::where([
                    ['no_kp', '=', $request->no_kp], ['negeri', '=', $request->negeri], ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'hantar ke pdrm']
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['negeri', '=', $request->negeri], ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'Diluluskan'],
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['negeri', '=', $request->negeri], ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'Tidak Diluluskan'],
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['negeri', '=', $request->negeri], ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'hantar ke penyokong'],
                ])->get();
            }
            return view('pegawai.hq.hq-tugasan-selesai', [
                'permohonan' => $permohonans,
            ]);
        } elseif ($user_role == 'pegawai_pdrm') {

            // dd($request);
            if ($request->no_kp != null && $request->negeri == "null") {
                $permohonans = Permohonan::where([
                    ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'disemak pdrm']
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'Diluluskan'],
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'Tidak Diluluskan'],
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'Disokong'],
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'Tidak Disokong'],
                ])->get();
            } else if ($request->no_kp == null && $request->negeri != "null") {
                $permohonans = Permohonan::where([
                    ['negeri', '=', $request->negeri], ['status_permohonan', '=', 'disemak pdrm']
                ])->orWhere([
                    ['negeri', '=', $request->negeri], ['status_permohonan', '=', 'Diluluskan'],
                ])->orWhere([
                    ['negeri', '=', $request->negeri], ['status_permohonan', '=', 'Tidak Diluluskan'],
                ])->orWhere([
                    ['negeri', '=', $request->negeri], ['status_permohonan', '=', 'Disokong'],
                ])->orWhere([
                    ['negeri', '=', $request->negeri], ['status_permohonan', '=', 'Tidak Disokong'],
                ])->get();
            } else {
                $permohonans = Permohonan::where([
                    ['no_kp', '=', $request->no_kp], ['negeri', '=', $request->negeri], ['status_permohonan', '=', 'disemak pdrm']
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['negeri', '=', $request->negeri], ['status_permohonan', '=', 'Diluluskan'],
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['negeri', '=', $request->negeri], ['status_permohonan', '=', 'Tidak Diluluskan'],
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['negeri', '=', $request->negeri], ['status_permohonan', '=', 'Disokong'],
                ])->orWhere([
                    ['no_kp', '=', $request->no_kp], ['negeri', '=', $request->negeri], ['status_permohonan', '=', 'Tidak Disokong'],
                ])->get();
            }
            return view('pegawai.hq.hq-tugasan-selesai', [
                'permohonan' => $permohonans,
            ]);
        }
    }

    public function tugasan_selesai_pemproses_negeri(Request $request)
    {
        // dd($request);
        $user = $request->user();
        $user_role = $user->role;
        $user_id = $user->id;
        $user_roles = $user->roles;
        $user_negeri = $user->negeri;


        $permohonan = Permohonan::where([
            ['negeri_kutipan_permit', '=', $user_negeri], ['status_permohonan', '=', 'hantar_ke_pemproses_hq']
        ])->orWhere([
            ['negeri_kutipan_permit', '=', $user_negeri], ['status_permohonan', '=', 'disemak pdrm']
        ])->orWhere([
            ['negeri_kutipan_permit', '=', $user_negeri], ['status_permohonan', '=', 'hantar ke pdrm']
        ])->orWhere([
            ['negeri_kutipan_permit', '=', $user_negeri], ['status_permohonan', '=', 'Dalam Proses']
        ])->orWhere([
            ['negeri_kutipan_permit', '=', $user_negeri], ['status_permohonan', '=', 'hantar_ke_penyokong_hq']
        ])->orWhere([
            ['negeri_kutipan_permit', '=', $user_negeri], ['status_permohonan', '=', 'disokong_hq']
        ])->orWhere([
            ['negeri_kutipan_permit', '=', $user_negeri], ['status_permohonan', '=', 'hantar_ke_penyokong_negeri']
        ])->orWhere([
            ['negeri_kutipan_permit', '=', $user_negeri], ['status_permohonan', '=', 'disokong_negeri']
        ])->orWhere([
            ['negeri_kutipan_permit', '=', $user_negeri], ['status_permohonan', '=', 'Diluluskan']
        ])->orWhere([
            ['negeri_kutipan_permit', '=', $user_negeri], ['status_permohonan', '=', 'Tidak Diluluskan']
        ])->get();

        return view('pegawai.negeri.negeri-tugasan-selesai', [
            'permohonan' => $permohonan
        ]);
    }

    public function tugasan_selesai_penyokong_negeri(Request $request)
    {
        $user = $request->user();
        $user_role = $user->role;
        $user_id = $user->id;
        $user_roles = $user->roles;
        $user_negeri = $user->negeri;

        // dd($request->jenis_tindakan);
        $permohonan = Permohonan::where([
            ['negeri_kutipan_permit', '=', $user_negeri], ['sokongan', '=', 'Disokong']
        ])->orWhere([
            ['negeri_kutipan_permit', '=', $user_negeri], ['sokongan', '=', 'Tidak Disokong']
        ])->get();

        return view('pegawai.tugasan_selesai.penyokong_negeri', [
            'permohonan' => $permohonan
        ]);
    }

    public function tugasan_selesai_pelulus_negeri(Request $request)
    {
        $user = $request->user();
        $user_role = $user->role;
        $user_id = $user->id;
        $user_roles = $user->roles;
        $user_negeri = $user->negeri;


        $permohonan = Permohonan::where([
            ['negeri_kutipan_permit', '=', $user_negeri], ['jenis_permohonan', '=', 'Pembaharuan'], ['status_permohonan', '=', 'Diluluskan']
        ])->orwhere([
            ['negeri_kutipan_permit', '=', $user_negeri], ['jenis_permohonan', '=', 'Pembaharuan'], ['status_permohonan', '=', 'Tidak Diluluskan']
        ])->orwhere([
            ['negeri_kutipan_permit', '=', $user_negeri], ['jenis_permohonan', '=', 'Pendua'], ['status_permohonan', '=', 'Diluluskan']
        ])->orWhere([
            ['negeri_kutipan_permit', '=', $user_negeri], ['jenis_permohonan', '=', 'Pendua'], ['status_permohonan', '=', 'Tidak Diluluskan']
        ])->get();

        return view('pegawai.tugasan_selesai.pelulus_negeri', [
            'permohonan' => $permohonan
        ]);
    }

    public function tugasan_selesai_pemproses_hq(Request $request)
    {

        $permohonan = Permohonan::where([
            ['status_permohonan', '=', 'hantar_ke_penyokong_hq']
        ])->orwhere([
            ['status_permohonan', '=', 'disokong_hq']
        ])->orwhere([
            ['status_permohonan', '=', 'tidak_disokong_hq']
        ])->orwhere([
            ['status_permohonan', '=', 'hantar_ke_penyokong_negeri']
        ])->orwhere([
            ['status_permohonan', '=', 'disokong_negeri']
        ])->orwhere([
            ['status_permohonan', '=', 'tidak_disokong_negeri']
        ])->orwhere([
            ['status_permohonan', '=', 'Diluluskan']
        ])->orwhere([
            ['status_permohonan', '=', 'Tidak Diluluskan']
        ])->orwhere([
            ['status_permohonan', '=', 'hantar ke pdrm']
        ])->orwhere([
            ['status_permohonan', '=', 'Dalam Proses']
        ])->get();

        return view('pegawai.hq.hq-tugasan-selesai', [
            'permohonan' => $permohonan
        ]);
    }


    public function tugasan_selesai_penyokong_hq(Request $request)
    {
        // dd($request);
        $user = $request->user();
        // dd($request);

        $permohonan = Permohonan::where([
            ['jenis_permohonan', '=', 'Baharu'], ['status_permohonan', '=', 'disokong_hq']
        ])->orWhere([
            ['jenis_permohonan', '=', 'Baharu'], ['status_permohonan', '=', 'tidak_disokong_hq']
        ])->orWhere([
            ['jenis_permohonan', '=', 'Baharu'], ['status_permohonan', '=', 'Diluluskan']
        ])->orWhere([
            ['jenis_permohonan', '=', 'Baharu'], ['status_permohonan', '=', 'Tidak Diluluskan']
        ])->get();

        return view('pegawai.tugasan_selesai.penyokong_hq', [
            'permohonan' => $permohonan
        ]);
    }

    public function tugasan_selesai_pelulus_hq()
    {

        $permohonan = Permohonan::where([
            ['jenis_permohonan', '=', 'Baharu'], ['status_permohonan', '=', 'Diluluskan']
        ])->orWhere([
            ['jenis_permohonan', '=', 'Baharu'], ['status_permohonan', '=', 'Tidak Diluluskan']
        ])->get();

        return view('pegawai.tugasan_selesai.pelulus_hq', [
            'permohonan' => $permohonan
        ]);
    }
}
