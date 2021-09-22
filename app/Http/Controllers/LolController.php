<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

use PDF;

class LolController extends Controller
{

    public function asd()
    {
        $permohonan = Permohonan::find(1);
        // dd($permohonan);
        $user = User::find($permohonan->user_id);

        $lesen_memandus = explode(",", $permohonan->lesen_memandu);

        //    dd($user);
        // dd("print");

        // $userrole = Auth::user()->roles;


        // foreach($userrole as $user){
        //     if($user->name == "pemproses_negeri"){
        //         dd("success");
        //     }
        // }


        $pdf = PDF::loadView('pdf.permohonan_rayuan', [
            'masa' => time(),
            'permohonan' => $permohonan,
            'user' => $user,
            'lesen' => $lesen_memandus
        ]);
        $nama_lesen = time() . '-permohonan_baharu';
        return $pdf->download($nama_lesen . '.pdf');
    }
}
