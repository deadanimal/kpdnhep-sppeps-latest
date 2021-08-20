<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Kategorifaq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faq = Faq::all();
        $kategorifaq = Kategorifaq::all();
        // dd($kategorifaq);
        return view('pegawai.admin-hq.tetapan-faq', [
            'faqs' => $faq,
            'kategorifaqs' => $kategorifaq,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        if ($request->jenis == 'category') {

            $kategorifaqs = new Kategorifaq();

            $kategorifaqs->nama_kategori_bm = $request->nama_kategori_bm;
            $kategorifaqs->nama_kategori_en = $request->nama_kategori_en;
            $kategorifaqs->status = $request->status;

            $kategorifaqs->save();
        } else {
            $faq = new Faq;

            $faq->tajuk_bm = $request->tajuk_bm;
            $faq->tajuk_en = $request->tajuk_en;
            $faq->kandungan_bm = $request->kandungan_bm;
            $faq->kandungan_en = $request->kandungan_en;
            $faq->turutan = $request->turutan;
            $faq->kategori = $request->kategori;
            $faq->status = $request->status;

            $faq->save();
        }

        return redirect('/tetapan-faq');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq, Kategorifaq $kategorifaq)
    {
        return view('pegawai.admin-hq.tetapan-faq', [
            'faqs' => $faq,
            'kategorifaqs' => $kategorifaq,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq, Kategorifaq $kategorifaq)
    {
        $faq = Faq::find($request->id);
        $faq->tajuk_bm = $request->tajuk_bm;
        $faq->tajuk_en = $request->tajuk_en;
        $faq->kandungan_bm = $request->kandungan_bm;
        $faq->kandungan_en = $request->kandungan_en;
        $faq->turutan = $request->turutan;
        $faq->kategori = $request->kategori;
        $faq->status = $request->status;

        $faq->save();

        return redirect('/tetapan-faq');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq, Kategorifaq $kategorifaq)
    {
        {
            if ($kategorifaq){
                $kategorifaq->delete();
            }
            else{
                $faq->delete();
            }
            return redirect('/tetapan-faq');
        }
    }
}
