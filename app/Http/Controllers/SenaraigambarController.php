<?php

namespace App\Http\Controllers;

use App\Models\Senaraigambar;
use Illuminate\Http\Request;

class SenaraigambarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $senaraigambar = Senaraigambar::all();

        return view('pegawai.admin-hq.tetapan-arkib-bergambar-senarai', [
            'senaraigambars' => $senaraigambar,
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
        
        // $jalan1 = $request->file('jalan1')->store('banner');
        // $jalan2 = $request->file('jalan2')->store('banner');
        // $jalan3 = $request->file('jalan3')->store('banner');
        // $jalan4 = $request->file('jalan4')->store('banner');
        // $jalan5 = $request->file('jalan5')->store('banner');

        $senaraigambar = new Senaraigambar();

        $senaraigambar->tajuk_ms = $request->tajuk_ms;
        $senaraigambar->tajuk_en = $request->tajuk_en;
        $senaraigambar->kandungan_ms = $request->kandungan_ms;
        $senaraigambar->kandungan_en = $request->kandungan_en;
        $senaraigambar->status = $request->status;
        $senaraigambar->lokasi = $request->lokasi;
        $senaraigambar->tarikh_mula = $request->tarikh_mula;
        $senaraigambar->tarikh_akhir = $request->tarikh_akhir;
        // $senaraigambar->jalan1 = $jalan1;
        // $senaraigambar->jalan1 = $jalan2;
        // $senaraigambar->jalan1 = $jalan3;
        // $senaraigambar->jalan1 = $jalan4;
        // $senaraigambar->jalan1 = $jalan5;
        $senaraigambar->id_arkibgambar =$request->id_arkibgambar;

        $senaraigambar->save();


        $senaraigambars = Senaraigambar::where('id_arkibgambar', $request->id_arkibgambar)->get();

        return redirect('/tetapan-arkib-bergambar/'.$request->id_arkibgambar);

        // return view('pegawai.admin-hq.tetapan-arkib-bergambar-senarai', [
        //     'senaraigambars' => $senaraigambars,
        //     'arkibgambarid'=>$request->id_arkibgambar
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Senaraigambar  $senaraigambar
     * @return \Illuminate\Http\Response
     */
    public function show(Senaraigambar $senaraigambar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Senaraigambar  $senaraigambar
     * @return \Illuminate\Http\Response
     */
    public function edit(Senaraigambar $senaraigambar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Senaraigambar  $senaraigambar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Senaraigambar $senaraigambar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Senaraigambar  $senaraigambar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Senaraigambar $senaraigambar)
    {
        $senaraigambar->delete();
        return redirect('/tetapan-arkib-bergambar-senarai');
    }
}
