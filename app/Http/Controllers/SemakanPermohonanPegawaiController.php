<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use App\Models\Audit;

use Illuminate\Http\Request;

class SemakanPermohonanPegawaiController extends Controller
{
    public function index(Request $request)
    {
        $permohonan = Permohonan::all();

        return view('pegawai.semakan-status-permohonan', [
            'permohonan' => $permohonan
        ]);
    }

    public function show($permohonan)
    {
        // dd($permohonan);
        $permohonans = Permohonan::find($permohonan);

        // $audits = Audit::where([
        //     ['model_id', '=', $permohonan]
        // ])->get();
        // dd($audits);
        
        return view('pegawai.maklumat-status', [
            'permohonan' => $permohonans
        ]);
    }

    public function carian(Request $request){

        $permohonan = Permohonan::where([
            ['no_kp', $request->no_kp]
        ])->orderBy('updated_at', 'DESC')->get();

        return view('pegawai.semakan-status-permohonan', [
            'permohonan' => $permohonan
        ]);

    }

}
