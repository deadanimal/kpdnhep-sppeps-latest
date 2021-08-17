<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arkibdokumen;
use App\Models\Senaraidokumen;

class ArkibdokumenlandingController extends Controller
{
    public function index(){
        
        $arkibdokumen = Arkibdokumen::where('status', 'aktif')->get();

        return view('global.arkib-dokumen', [
            'arkibdokumens' => $arkibdokumen,
        ]);
    }

    public function dokumenshow($dokumen){

        $senaraidokumen = Senaraidokumen::where('id',$dokumen)->get();

        return view('global.arkib-dokumen-senarai', [
            'infodokumens' => $senaraidokumen,
        ]);
    }
}
