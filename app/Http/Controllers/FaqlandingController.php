<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Kategorifaq;
use App\Models\Faq;

class FaqlandingController extends Controller
{
    public function faqlanding()
    {

        $katfaqland = Kategorifaq::where('status', 'aktif')->get();
        // $faqland = Faq::where('status', 'aktif')->get();

        $faqland = DB::table('kategorifaqs')
            ->rightJoin('faqs', 'kategorifaqs.id', '=', 'faqs.kategori_id')
            ->select('kategorifaqs.id', 'kategorifaqs.nama_kategori_bm', 'kategorifaqs.nama_kategori_en', 'faqs.*')
            ->where('faqs.status', 'aktif')
            ->orderBy('faqs.turutan')
            ->get();

            // dd($faq);

        return view('global.faq', [
            'faqls' => $faqland,
            'katefaqls' => $katfaqland
        ]);
    }
}
