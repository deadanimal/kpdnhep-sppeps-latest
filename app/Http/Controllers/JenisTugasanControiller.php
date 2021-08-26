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


        $permohonan = Permohonan::where([
            ['negeri_kutipan_permit', '=', $user_negeri], ['status_permohonan', '=', 'hantar']
        ])->get();

        return view('pegawai.negeri.negeri-tugasan-baru', [
            'permohonan' => $permohonan
        ]);
    }

    public function cari_tugasan_baru_pemproses_negeri(Request $request)
    {
        $user = $request->user();
        $user_negeri = $user->negeri;

        if ($request->no_kp != null && $request->jenis_permohonan == "null") {
            $permohonans = Permohonan::where([
                ['negeri_kutipan_permit', '=', $user_negeri],
                ['no_kp', '=', $request->no_kp],
                ['status_permohonan', '=', 'hantar']
            ])->get();
        } else if ($request->no_kp == null && $request->jenis_permohonan != "null") {
            $permohonans = Permohonan::where([
                ['negeri_kutipan_permit', '=', $user_negeri],
                ['jenis_permohonan', '=', $request->jenis_permohonan],
                ['status_permohonan', '=', 'hantar']
            ])->get();
        } else {
            $permohonans = Permohonan::where([
                ['negeri_kutipan_permit', '=', $user_negeri],
                ['no_kp', '=', $request->no_kp],
                ['jenis_permohonan', '=', $request->jenis_permohonan],
                ['status_permohonan', '=', 'hantar']
            ])->get();
        }
        return view('pegawai.negeri.negeri-tugasan-baru', [
            'permohonan' => $permohonans,
        ]);
    }

    public function tugasan_baru_penyokong_negeri(Request $request)
    {
        $user = $request->user();
        $user_role = $user->role;
        $user_id = $user->id;
        $user_roles = $user->roles;
        $user_negeri = $user->negeri;

        $permohonan = Permohonan::where([
            ['negeri_kutipan_permit', '=', $user_negeri], ['status_permohonan', '=', 'hantar_ke_penyokong_negeri']
        ])->get();

        return view('pegawai.penyokong.penyokong-negeri-tugasan-baru', [
            'permohonan' => $permohonan
        ]);
    }

    public function cari_tugasan_baru_penyokong_negeri(Request $request)
    {
        $user = $request->user();
        $user_negeri = $user->negeri;

        if ($request->no_kp != null && $request->jenis_permohonan == "null") {
            $permohonans = Permohonan::where([
                ['negeri_kutipan_permit', '=', $user_negeri],
                ['no_kp', '=', $request->no_kp],
                ['status_permohonan', '=', 'hantar_ke_penyokong_negeri']
            ])->get();
        } else if ($request->no_kp == null && $request->jenis_permohonan != "null") {
            $permohonans = Permohonan::where([
                ['negeri_kutipan_permit', '=', $user_negeri],
                ['jenis_permohonan', '=', $request->jenis_permohonan],
                ['status_permohonan', '=', 'hantar_ke_penyokong_negeri']
            ])->get();
        } else {
            $permohonans = Permohonan::where([
                ['negeri_kutipan_permit', '=', $user_negeri],
                ['no_kp', '=', $request->no_kp],
                ['jenis_permohonan', '=', $request->jenis_permohonan],
                ['status_permohonan', '=', 'hantar_ke_penyokong_negeri']
            ])->get();
        }
        return view('pegawai.penyokong.penyokong-negeri-tugasan-barus', [
            'permohonan' => $permohonans,
        ]);
    }

    public function tugasan_baru_pelulus_negeri(Request $request)
    {
        $user = $request->user();
        $user_negeri = $user->negeri;


        $permohonan = Permohonan::where([
            ['negeri_kutipan_permit', '=', $user_negeri], ['status_permohonan', '=', 'disokong_negeri']
        ])->orwhere([
            ['negeri_kutipan_permit', '=', $user_negeri], ['status_permohonan', '=', 'tidak_disokong_negeri']
        ])->get();

        return view('pegawai.pelulus.pelulus-negeri-tugasan-baru', [
            'permohonan' => $permohonan
        ]);
    }

    public function cari_tugasan_baru_pelulus_negeri(Request $request)
    {
        $user = $request->user();
        $user_negeri = $user->negeri;

        if ($request->no_kp != null && $request->jenis_permohonan == "null") {
            $permohonans = Permohonan::where([
                ['negeri_kutipan_permit', '=', $user_negeri],
                ['no_kp', '=', $request->no_kp],
                ['status_permohonan', '=', 'disokong_negeri']
            ])->orWhere([
                ['negeri_kutipan_permit', '=', $user_negeri],
                ['no_kp', '=', $request->no_kp],
                ['status_permohonan', '=', 'tidak_disokong_negeri']
            ])->get();
        } else if ($request->no_kp == null && $request->jenis_permohonan != "null") {
            $permohonans = Permohonan::where([
                ['negeri_kutipan_permit', '=', $user_negeri],
                ['jenis_permohonan', '=', $request->jenis_permohonan],
                ['status_permohonan', '=', 'disokong_negeri']
            ])->orWhere([
                ['negeri_kutipan_permit', '=', $user_negeri],
                ['jenis_permohonan', '=', $request->jenis_permohonan],
                ['status_permohonan', '=', 'tidak_disokong_negeri']
            ])->get();
        } else {
            $permohonans = Permohonan::where([
                ['negeri_kutipan_permit', '=', $user_negeri],
                ['no_kp', '=', $request->no_kp],
                ['jenis_permohonan', '=', $request->jenis_permohonan],
                ['status_permohonan', '=', 'disokong_negeri']
            ])->orWhere([
                ['negeri_kutipan_permit', '=', $user_negeri],
                ['no_kp', '=', $request->no_kp],
                ['jenis_permohonan', '=', $request->jenis_permohonan],
                ['status_permohonan', '=', 'tidak_disokong_negeri']
            ])->get();
        }
        return view('pegawai.penyokong.penyokong-negeri-tugasan-barus', [
            'permohonan' => $permohonans,
        ]);
    }

    

    public function tugasan_baru_pemproses_hq(Request $request)
    {
        $permohonan = Permohonan::where([
            ['status_permohonan', '=', 'hantar_ke_pemproses_hq']
        ])->orwhere([
            ['status_permohonan', '=', 'disemak pdrm']
        ])->get();

        return view('pegawai.hq.hq-tugasan-baru', [
            'permohonan' => $permohonan
        ]);
    }

    public function cari_tugasan_baru_pemproses_hq(Request $request)
    {
        
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
