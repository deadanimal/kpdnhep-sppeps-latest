<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;
use App\Models\User;

class SenaraiHitamController extends Controller
{
    public function index(Request $request)
    {
        $permohonan = User::where('status_permohonan', 'disenarai hitam')->get();

        return view('pegawai.hq.hq-senarai-hitam', [
            'permohonan' => $permohonan
        ]);
    }

    public function senaraiDiluluskan(Request $request)
    {
        $permohonan = Permohonan::where('status_permohonan', 'Diluluskan')->get();
        // dd($permohonan);
        return view('pegawai.hq.hq-tambah-senarai-hitam', [
            'permohonan' => $permohonan
        ]);
    }


    public function carisenaraihitam(Request $request)
    {
        // dd($request->no_kp);
        if ($request->no_kp == null && $request->negeri == "null" && $request->jenis_permohonan != "null") {
            $permohonans = Permohonan::where([
                ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'disenarai hitam']
            ])->get();
        } else if ($request->no_kp == null && $request->negeri != "null" && $request->jenis_permohonan == "null") {
            $permohonans = Permohonan::where([
                ['negeri', '=', $request->negeri], ['status_permohonan', '=', 'disenarai hitam']
            ])->get();
        } else if ($request->no_kp == null && $request->negeri != "null" && $request->jenis_permohonan != "null") {
            $permohonans = Permohonan::where([
                ['negeri', '=', $request->negeri], ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'disenarai hitam']
            ])->get();
        } else if ($request->no_kp != null && $request->negeri == "null" && $request->jenis_permohonan == "null") {
            $permohonans = Permohonan::where([
                ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'disenarai hitam']
            ])->get();
        } else if ($request->no_kp != null && $request->negeri == "null" && $request->jenis_permohonan != "null") {
            $permohonans = Permohonan::where([
                ['no_kp', '=', $request->no_kp], ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'disenarai hitam']
            ])->get();
        } else if ($request->no_kp != null && $request->negeri != "null" && $request->jenis_permohonan == "null") {
            $permohonans = Permohonan::where([
                ['no_kp', '=', $request->no_kp], ['negeri', '=', $request->negeri], ['status_permohonan', '=', 'disenarai hitam']
            ])->get();
        } else {
            $permohonans = Permohonan::where([
                ['no_kp', '=', $request->no_kp], ['negeri', '=', $request->negeri], ['jenis_permohonan', '=', $request->jenis_permohonan], ['status_permohonan', '=', 'disenarai hitam']
            ])->get();
        }
        return view('pegawai.hq.hq-senarai-hitam', [
            'permohonan' => $permohonans,
        ]);
    }

    public function caritambahsenaraihitam(Request $request){
        $permohonans = Permohonan::where([
            ['no_kp', '=', $request->no_kp], ['status_permohonan', '=', 'Diluluskan']
        ])->get();

        return view('pegawai.hq.hq-tambah-senarai-hitam', [
            'permohonan' => $permohonans,
        ]);
    }

    // public function cariSenaraiDiluluskan(Request $request)
    // {

    //     $permohonans = Permohonan::where([
    //         ['no_kp', '=', $request->no_kp],
    //         ['status_permohonan', '=', 'disenarai hitam']
    //     ])->get();

    //     return view('pegawai.hq.hq-tambah-senarai-hitam', [
    //         'permohonan' => $permohonans,
    //     ]);
    // }
}
