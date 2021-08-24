<?php

namespace App\Http\Controllers;

use App\Models\Arkibgambar;
use App\Models\Senaraigambar;
use Illuminate\Http\Request;

class ArkibgambarlandingController extends Controller
{
    public function arkibgambarland(){

        $arkgamland = Arkibgambar::where('status', 'aktif')->get();
        $senaraigamland = Senaraigambar::where('status', 'aktif')->get();

        return view('global.arkib-bergambar', [
            'arkgamlans' => $arkgamland,
            'senaraigamlands' => $senaraigamland,
        ]);
    }

    public function arkibgambarlandshow($arkgamland){

        $senaraigamland = Senaraigambar::where('id_arkibgambar',$arkgamland)->get();

        return view('global.arkib-bergambar-show', [
            'arkgamlans' => $arkgamland,
            'senaraigamlands' => $senaraigamland,
        ]);
    }

    public function arkibgambarlaninfolandshow($info){
        
        $infogambar = Senaraigambar::where('id',$info)->get();

        return view('global.arkib-bergambar-info', [
            'infogambars' => $infogambar,
        ]);
    }

}
