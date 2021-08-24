<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

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
        $kategorifaq = Kategorifaq::all();
        $faq = DB::table('kategorifaqs')
                ->rightJoin('faqs', 'kategorifaqs.id', '=', 'faqs.kategori_id')
                ->select('kategorifaqs.id', 'kategorifaqs.nama_kategori_bm', 'kategorifaqs.nama_kategori_en', 'faqs.*' )
                ->get();
                
        // dd($faq);
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
        if ($request->jenis == 'category') {

            $kategorifaq = new Kategorifaq();

            $kategorifaq->nama_kategori_bm = $request->nama_kategori_bm;
            $kategorifaq->nama_kategori_en = $request->nama_kategori_en;
            $kategorifaq->status = $request->status;

            $kategorifaq->save();
        } else {
            $faq = new Faq();

            $faq->tajuk_bm = $request->tajuk_bm;
            $faq->tajuk_en = $request->tajuk_en;
            $faq->kandungan_bm = $request->kandungan_bm;
            $faq->kandungan_en = $request->kandungan_en;
            $faq->turutan = $request->turutan;
            // $faq->kategori = $request->kategori;
            $faq->status = $request->status;
            $faq->kategori_id = $request->kategori_id;
            // dd($faq);
            $faq->save();

            // $faq = Faq::where('kategori_id', $request->kategori_id)->get();
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
        return view('global.faq', [
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
    public function update(Request $request, $id_)
    {

        if ($request->jenis == 'category') {

            $kategorifaq = Kategorifaq::find($id_);

            $kategorifaq->nama_kategori_bm = $request->nama_kategori_bm;
            $kategorifaq->nama_kategori_en = $request->nama_kategori_en;
            $kategorifaq->status = $request->status;

            $kategorifaq->save();
        } 
        else {

            $faq = Faq::find($id_);

            $faq->tajuk_bm = $request->tajuk_bm;
            $faq->tajuk_en = $request->tajuk_en;
            $faq->kandungan_bm = $request->kandungan_bm;
            $faq->kandungan_en = $request->kandungan_en;
            $faq->turutan = $request->turutan;
            // $faq->kategori = $request->kategori;
            $faq->status = $request->status;
            $faq->kategori_id = $request->kategori_id;

            $faq->save();
        }

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
        $faq->delete();
        return redirect('/tetapan-faq');
    }
}
