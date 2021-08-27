<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\Permohonan;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengumuman = Pengumuman::all();
        return view('pegawai.admin-hq.tetapan-pengumuman', [
            'anoouces' => $pengumuman,
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
        $pengumuman = new Pengumuman();

        $pengumuman->tajuk_bm = $request->tajuk_bm;
        $pengumuman->tajuk_en = $request->tajuk_en;
        $pengumuman->kandungan_bm = $request->kandungan_bm;
        $pengumuman->kandungan_en = $request->kandungan_en;
        $pengumuman->status = $request->status;
        $pengumuman->tarikh_mula = $request->tarikh_mula;
        $pengumuman->tarikh_akhir = $request->tarikh_akhir;

        $pengumuman->save();

        return redirect('/tetapan-pengumuman')->with('success', 'Berjaya disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function show(Pengumuman $pengumuman)
    {
        return view('pegawai.admin-hq.tetapan-pengumuman', [
            'pengumumans' => $pengumuman,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengumuman $pengumuman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $pengumuman = Pengumuman::find($request->id);
        // dd($pengumuman);
        $pengumuman->tajuk_bm = $request->tajuk_bm;
        $pengumuman->tajuk_en = $request->tajuk_en;
        $pengumuman->kandungan_bm = $request->kandungan_bm;
        $pengumuman->kandungan_en = $request->kandungan_en;
        $pengumuman->status = $request->status;
        $pengumuman->tarikh_mula = $request->tarikh_mula;
        $pengumuman->tarikh_akhir = $request->tarikh_akhir;

        $pengumuman->save();

        return redirect('tetapan-pengumuman')->with('success', 'Berjaya disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengumuman $pengumuman)
    {
        $pengumuman->delete();
        return redirect('/tetapan-pengumuman');
    }
}
