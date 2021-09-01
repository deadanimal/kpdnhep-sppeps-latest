<?php

namespace App\Http\Controllers;

use App\Models\Kategorifaq;
use Illuminate\Http\Request;

class KategorifaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
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
        $kategorifaqs = new Kategorifaq();

        $kategorifaqs->nama_kategori_bm = $request->nama_kategori_bm;
        $kategorifaqs->nama_kategori_en = $request->nama_kategori_en;
        $kategorifaqs->status = $request->status;

        $kategorifaqs-> save();

        return redirect('/tetapan-faq');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategorifaq  $kategorifaq
     * @return \Illuminate\Http\Response
     */
    public function show(Kategorifaq $kategorifaq)
    {
        $kategorifaq = Kategorifaq::all();
        return view('pegawai.admin-hq.tetapan-faq',[
            'kategorifaqs'=>$kategorifaq,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategorifaq  $kategorifaq
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategorifaq $kategorifaq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategorifaq  $kategorifaq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategorifaq $kategorifaq)
    {
        $kategorifaq->nama_kategori_bm = $request->tajuk_bm;
        $kategorifaq->nama_kategori_en = $request->tajuk_en;
        $kategorifaq->status = $request->status;

        $kategorifaq-> save();

        return redirect('/tetapan-faq');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategorifaq  $kategorifaq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategorifaq $kategorifaq)
    {
        $kategorifaq->delete();
        return redirect('/tetapan-faq')->with('success', 'Berjaya dipadam');
    }
}
