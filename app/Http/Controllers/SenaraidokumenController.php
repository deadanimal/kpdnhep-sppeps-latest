<?php

namespace App\Http\Controllers;

use App\Models\Senaraidokumen;
use Illuminate\Http\Request;

class SenaraidokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $senaraidokumen = Senaraidokumen::all();

        return view('pegawai.admin-hq.tetapan-arkib-dokumen-senarai', [
            'senaraidokumens' => $senaraidokumen,
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
        $jalan1 = $request->file('gambar')->store('banner');

        $senaraidokumen = new Senaraidokumen();

        $senaraidokumen->tajuk_ms = $request->tajuk_ms;
        $senaraidokumen->tajuk_en = $request->tajuk_en;
        $senaraidokumen->kandungan_ms = $request->kandungan_ms;
        $senaraidokumen->kandungan_en = $request->kandungan_en;
        $senaraidokumen->status = $request->status;
        $senaraidokumen->jalan1 = $jalan1;

        $senaraidokumen->id_arkibdokumen = $request->id_arkibdokumen;
        // dd($senaraidokumen);
        $senaraidokumen->save();


        $senaraidokumens = Senaraidokumen::where('id_arkibdokumen', $request->id_arkibdokumen)->get();

        return redirect('/tetapan-arkib-dokumen/'.$request->id_arkibdokumen)->with('success', 'Berjaya disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Senaraidokumen  $senaraidokumen
     * @return \Illuminate\Http\Response
     */
    public function show(Senaraidokumen $senaraidokumen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Senaraidokumen  $senaraidokumen
     * @return \Illuminate\Http\Response
     */
    public function edit(Senaraidokumen $senaraidokumen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Senaraidokumen  $senaraidokumen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Senaraidokumen $senaraidokumen)
    {
        $senaraidokumen->tajuk_ms = $request->tajuk_ms;
        $senaraidokumen->tajuk_en = $request->tajuk_en;
        $senaraidokumen->kandungan_ms = $request->kandungan_ms;
        $senaraidokumen->kandungan_en = $request->kandungan_en;
        $senaraidokumen->status = $request->status;
        if ($request->file('gambar')) {
            $jalan1 = $request->file('gambar')->store('banner');
            $senaraidokumen->jalan1 = $jalan1;
        }

        $senaraidokumen->id_arkibdokumen = $request->id_arkibdokumen;
        
        $senaraidokumen->save();

        $senaraidokumens = Senaraidokumen::where('id_arkibdokumen', $request->id_arkibdokumen)->get();

        return redirect('/tetapan-arkib-dokumen/'.$request->id_arkibdokumen)->with('success', 'Berjaya disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Senaraidokumen  $senaraidokumen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Senaraidokumen $senaraidokumen)
    {
        $senaraidokumen->delete();
        return redirect('/tetapan-arkib-dokumen/' . $senaraidokumen->id_arkibdokumen)->with('success', 'Berjaya dipadam');
    }
}
