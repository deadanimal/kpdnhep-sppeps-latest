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

    public function caripermohonan(Request $request){

        // dd($request);
        if ($request->no_kp_or_permit != null){
            $permohonans = Permohonan::where([
                ['no_kp', '=', $request->no_kp_or_permit]
            ])->orWhere([
                ['no_permit', '=', $request->no_kp_or_permit]
            ])->get();
    
            $currentDate = date("Y-m-d");
    
            return view('global.semakan-status-eps-keputusan', [
                'keputusans' => $permohonans,
                'currentDate'=> $currentDate
            ]);
        }
        else{
            return redirect('/semakan-status-eps');
        }

        
    }
}
