<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arkibdokumen;
use App\Models\Senaraidokumen;

class ArkibdokumenlandingController extends Controller
{
    public function dokumenland(){
        
        $arkibdokumen = Arkibdokumen::where('status', 'aktif')->get();
        $senaraidokumen = Senaraidokumen::where('status', 'aktif')->get();

        // dd($senaraidokumen);
        return view('global.arkib-dokumen', [
            'arkibdokumens' => $arkibdokumen,
            'infodokumens' => $senaraidokumen,
        ]);
    }

    public function dokumenshow($arkibdokumen){

        $senaraidokumen = Senaraidokumen::where('id_arkibdokumen',$arkibdokumen)->get();

        return view('global.arkib-dokumen-senarai', [
            'infodokumens' => $senaraidokumen,
            'arkibdokumens' => $arkibdokumen
        ]);
    }
}
