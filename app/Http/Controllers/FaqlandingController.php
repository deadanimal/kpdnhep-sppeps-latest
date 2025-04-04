<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategorifaq;
use App\Models\Faq;

class FaqlandingController extends Controller
{
    public function faqlanding($kategori_id){

        $katfaqland = Kategorifaq::where('status', 'aktif')->get();
        $faqland = Faq::where('status', 'aktif')->get();

        return view('global.faq', [
            'faqls' => $faqland,
            'katefaqls' => $katfaqland
        ]);
    }
}
