<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;

class SenaraiHitamController extends Controller
{
    public function index(Request $request)
    {
        $permohonan = Permohonan::where('status_permohonan', 'disenarai hitam')->get();

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

    public function cariIndex(Request $request){

    }

    public function cariSenaraiDiluluskan(Request $request){

        $permohonans = Permohonan::where([
            ['no_kp', '=', $request->no_kp],
            ['status_permohonan', '=', 'disenarai hitam']
        ])->get();

        return view('pegawai.hq.hq-tambah-senarai-hitam', [
            'permohonan' => $permohonans,
        ]);
    }
}
