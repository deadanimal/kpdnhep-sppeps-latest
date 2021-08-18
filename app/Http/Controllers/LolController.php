<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;

class LolController extends Controller
{
    
    public function asd()
    {
        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Test</h1>');
        $data = '';
        $pdf = PDF::loadView('pdf.borang_permohonan', [
            'masa'=>time()
        ]);
        $nama_lesen = time().'-lesen';
        return $pdf->download($nama_lesen.'.pdf');        
    }
}
