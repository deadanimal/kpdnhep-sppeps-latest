<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;

class SemakanStatusController extends Controller
{
    public function index(Request $request)
    {
        $permohonan = Permohonan::where('status_permohonan', 'disenarai hitam')->get();

        return view('pegawai.hq.hq-senarai-hitam', [
            'permohonan' => $permohonan
        ]);
    }

    public function caripermohonan(Request $request)
    {

        // dd($request);
        if ($request->no_kp_or_permit != null) {
            $permohonans = Permohonan::where([
                ['no_kp', '=', $request->no_kp_or_permit]
            ])->orWhere([
                ['no_permit', '=', $request->no_kp_or_permit]
            ])->get();

            $currentDate = date("Y-m-d");

            return view('global.semakan-status-eps-keputusan', [
                'keputusan' => $permohonans,
                'currentDate' => $currentDate,
                'carian' => 'kp'
            ]);
        } else {
            return redirect('/semakan-status-eps');
        }
    }

    public function keputusan_qr(Request $request)
    {
        // dd($request);
        $qr = $request->query('qr');
        //    dd($qr);
        $permohonans = Permohonan::find($qr);
        $currentDate = date("Y-m-d");
        return view('global.semakan-status-eps-keputusan', [
            'keputusan' => $permohonans,
            'currentDate' => $currentDate,
            'carian' => 'qr'
        ]);
    }

    public function keputusan_qr_penguatkuasa(Request $request)
    {
        // dd($request);
        $qr = $request->query('qr');
        //    dd($qr);
        $permohonans = Permohonan::find($qr);

        // dd($permohonans);
        $currentDate = date("Y-m-d");
        return view('pegawai.keputusan_qr', [
            'keputusan' => $permohonans,
            'currentDate' => $currentDate,
            
        ]);
    }
}
