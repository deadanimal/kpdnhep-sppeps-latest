<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;

class JenisTugasanControiller extends Controller
{
    public function tugasan_baru_pemproses_negeri(Request $request)
    {

        $user = $request->user();
        $user_role = $user->role;
        $user_id = $user->id;
        $user_roles = $user->roles;
        $user_negeri = $user->negeri;

        if ($user_role == 'pegawai_negeri') {
            if ($request->jenis_tindakan == "pemproses_negeri") {
                $permohonan = Permohonan::where([
                    ['negeri_kutipan_permit', '=', $user_negeri], ['status_permohonan', '=', 'hantar']
                ])->get();

                return view('pegawai.negeri.negeri-tugasan-baru', [
                    'permohonan' => $permohonan
                ]);
            }
        }
    }

    public function tugasan_baru_penyokong_negeri(Request $request)
    {
        $user = $request->user();
        $user_role = $user->role;
        $user_id = $user->id;
        $user_roles = $user->roles;
        $user_negeri = $user->negeri;

        if ($user_role == 'pegawai_negeri') {
            if ($request->jenis_tindakan == "penyokong_negeri") {
                $permohonan = Permohonan::where([
                    ['negeri_kutipan_permit', '=', $user_negeri], ['status_permohonan', '=', 'hantar_ke_penyokong_negeri']
                ])->get();

                return view('pegawai.negeri.negeri-tugasan-baru', [
                    'permohonan' => $permohonan
                ]);
            }
        }
    }

    public function tugasan_baru_pelulus_negeri(Request $request)
    {
        // dd($request);
        $user = $request->user();
        $user_role = $user->role;
        $user_id = $user->id;
        $user_roles = $user->roles;
        $user_negeri = $user->negeri;

        if ($user_role == 'pegawai_negeri') {
            if ($request->jenis_tindakan == "pelulus_negeri") {
                $permohonan = Permohonan::where([
                    ['negeri_kutipan_permit', '=', $user_negeri], ['status_permohonan', '=', 'disokong_negeri']
                ])->orwhere([
                    ['negeri_kutipan_permit', '=', $user_negeri], ['status_permohonan', '=', 'tidak_disokong_negeri']
                ])->get();

                return view('pegawai.negeri.negeri-tugasan-baru', [
                    'permohonan' => $permohonan
                ]);
            }
        }
    }

    public function tugasan_baru_pemproses_negeri_hq(Request $request)
    {
        $user = $request->user();
        $user_role = $user->role;
        $user_id = $user->id;
        $user_roles = $user->roles;
        $user_negeri = $user->negeri;

        if ($user_role == 'pegawai_hq') {
            if ($request->jenis_tindakan == "pemproses_negeri") {
                $permohonan = Permohonan::where([
                    ['negeri_kutipan_permit', '=', $user_negeri], ['status_permohonan', '=', 'hantar']
                ])->get();

                return view('pegawai.negeri.negeri-tugasan-baru', [
                    'permohonan' => $permohonan
                ]);
            }
        }
    }

    public function tugasan_baru_pemproses_hq(Request $request)
    {
        // dd($request);
        $user = $request->user();
        $user_role = $user->role;
        $user_id = $user->id;
        $user_roles = $user->roles;
        $user_negeri = $user->negeri;
        if ($user_role == 'pegawai_hq') {
            // dd($request);
            if ($request->jenis_tindakan == "pemproses_hq") {

                $permohonan = Permohonan::where([
                    ['status_permohonan', '=', 'hantar_ke_pemproses_hq']
                ])->orwhere([
                    ['status_permohonan', '=', 'disemak pdrm']
                ])->get();

                return view('pegawai.hq.hq-tugasan-baru', [
                    'permohonan' => $permohonan
                ]);
            }
        }
    }


    public function tugasan_baru_penyokong_hq(Request $request)
    {
        // dd($request);
        $user = $request->user();
        $user_role = $user->role;
        $user_id = $user->id;
        $user_roles = $user->roles;
        $user_negeri = $user->negeri;

        $permohonan = Permohonan::where([
            ['status_permohonan', '=', 'hantar_ke_penyokong_hq']
        ])->get();

        return view('pegawai.hq.hq-tugasan-baru', [
            'permohonan' => $permohonan
        ]);
    }

    public function tugasan_baru_pelulus_hq(Request $request)
    {
        $user = $request->user();
        $user_role = $user->role;
        $user_id = $user->id;
        $user_roles = $user->roles;
        $user_negeri = $user->negeri;
        if ($request->jenis_tindakan == "pelulus_hq") {
            $permohonan = Permohonan::where([
                ['status_permohonan', '=', 'disokong_hq']
            ])->orWhere([
                ['status_permohonan', '=', 'tidak_disokong_hq']
            ])->get();
            return view('pegawai.hq.hq-tugasan-baru', [
                'permohonan' => $permohonan
            ]);
        }
    }
}
