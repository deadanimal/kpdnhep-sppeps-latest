<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;
use App\Models\User;

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
