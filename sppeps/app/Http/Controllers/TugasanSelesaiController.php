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

        if ($user_role == 'pegawai_negeri') {
            $permohonan = Permohonan::whereIn('status_permohonan', ['Permohonan Lengkap', 'Permohonan Tidak Lengkap', 'disemak pdrm', 'Disokong', 'Tidak Disokong', 'hantar ke pdrm', 'Dalam Proses', 'Diluluskan', 'Tidak Diluluskan'])->get();

            return view('pegawai.negeri.negeri-tugasan-selesai', [
                'permohonan' => $permohonan
            ]);
        } else if ($user_role == 'pegawai_hq') {
            $permohonan = Permohonan::whereIn('status_permohonan', ['hantar ke pdrm', 'Dalam Proses', 'hantar ke penyokong', 'Diluluskan', 'Tidak Diluluskan',])->get();

            return view('pegawai.hq.hq-tugasan-selesai', [
                'permohonan' => $permohonan
            ]);
        } else if ($user_role == 'pegawai_pdrm') {
            $permohonan = Permohonan::whereIn('status_permohonan', ['disemak pdrm', 'Diluluskan', 'Tidak Diluluskan', 'Disokong', 'Tidak Disokong'])->get();
            // $permohonan = Permohonan::whereIn('status_permohonan', ['hantar', 'Permohonan Lengkap'])->get();

            return view('pegawai.pdrm.pdrm-tugasan-selesai', [
                'permohonan' => $permohonan
            ]);
        } else if ($user_role == 'pentadbir') {
            // $permohonan = Permohonan::where('status_permohonan', 'disemak')->get();
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
}
