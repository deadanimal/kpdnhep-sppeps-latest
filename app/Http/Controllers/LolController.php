<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use PDF;

class LolController extends Controller
{

    public function asd()
    {
        // $permohonan = Permohonan::find(1);
        // // dd($permohonan);
        // $user = User::find($permohonan->user_id);

        // $lesen_memandus = explode(",", $permohonan->lesen_memandu);

        // //    dd($user);
        // // dd("print");

        $ldate = date('Y-m-d');
        dd($ldate);

        $permohonan = Permohonan::find(84);
        
        // $permohonan->cetak_status = 1;
        // $permohonan->save();

        $user = User::find($permohonan->user_id);

        $pdf = PDF::loadView('pdf.cetak_permit', [
            'masa' => time(),
            'permohonan' => $permohonan,
            'user' => $user,
            // 'lesen'=>$lesen_memandus
        ])->setPaper('a5', 'landscape');
        $nama_lesen = time() . '-Cetakan_permit';
        return $pdf->download($nama_lesen . '.pdf');
    }
}
