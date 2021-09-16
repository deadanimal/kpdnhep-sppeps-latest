<?php

namespace App\Http\Controllers;

use App\Models\Senaraigambar;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

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
        if (!empty($request->file('gambar5'))) {
            $jalan1 = $request->file('gambar1')->store('banner');
            $jalan2 = $request->file('gambar2')->store('banner');
            $jalan3 = $request->file('gambar3')->store('banner');
            $jalan4 = $request->file('gambar4')->store('banner');
            $jalan5 = $request->file('gambar5')->store('banner');
        } else if (!empty($request->file('gambar4'))) {
            $jalan1 = $request->file('gambar1')->store('banner');
            $jalan2 = $request->file('gambar2')->store('banner');
            $jalan3 = $request->file('gambar3')->store('banner');
            $jalan4 = $request->file('gambar4')->store('banner');
        } else if (!empty($request->file('gambar3'))) {
            $jalan1 = $request->file('gambar1')->store('banner');
            $jalan2 = $request->file('gambar2')->store('banner');
            $jalan3 = $request->file('gambar3')->store('banner');
        } else if (!empty($request->file('gambar2'))) {
            $jalan1 = $request->file('gambar1')->store('banner');
            $jalan2 = $request->file('gambar2')->store('banner');
        } else if (!empty($request->file('gambar1'))) {
            $jalan1 = $request->file('gambar1')->store('banner');
        }

        $senaraigambar = new Senaraigambar();

        $senaraigambar->tajuk_ms = $request->tajuk_ms;
        $senaraigambar->tajuk_en = $request->tajuk_en;
        $senaraigambar->kandungan_ms = $request->kandungan_ms;
        $senaraigambar->kandungan_en = $request->kandungan_en;
        $senaraigambar->status = $request->status;
        $senaraigambar->lokasi = $request->lokasi;
        $senaraigambar->tarikh_mula = $request->tarikh_mula;
        $senaraigambar->tarikh_akhir = $request->tarikh_akhir;

        if (!empty($request->file('gambar5'))) {
            $senaraigambar->jalan1 = $jalan1;
            $senaraigambar->jalan2 = $jalan2;
            $senaraigambar->jalan3 = $jalan3;
            $senaraigambar->jalan4 = $jalan4;
            $senaraigambar->jalan5 = $jalan5;
        } else if (!empty($request->file('gambar4'))) {
            $senaraigambar->jalan1 = $jalan1;
            $senaraigambar->jalan2 = $jalan2;
            $senaraigambar->jalan3 = $jalan3;
            $senaraigambar->jalan4 = $jalan4;
        } else if (!empty($request->file('gambar3'))) {
            $senaraigambar->jalan1 = $jalan1;
            $senaraigambar->jalan2 = $jalan2;
            $senaraigambar->jalan3 = $jalan3;
        } else if (!empty($request->file('gambar2'))) {
            $senaraigambar->jalan1 = $jalan1;
            $senaraigambar->jalan2 = $jalan2;
        } else if (!empty($request->file('gambar1'))) {
            $senaraigambar->jalan1 = $jalan1;
        }

        $senaraigambar->id_arkibgambar = $request->id_arkibgambar;

        $senaraigambar->save();

        $senaraigambars = Senaraigambar::where('id_arkibgambar', $request->id_arkibgambar)->get();

        return redirect('/tetapan-arkib-bergambar/'.$request->id_arkibgambar)->with('success', 'Berjaya disimpan!');
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
        $senaraigambar->tajuk_ms = $request->tajuk_ms;
        $senaraigambar->tajuk_en = $request->tajuk_en;
        $senaraigambar->kandungan_ms = $request->kandungan_ms;
        $senaraigambar->kandungan_en = $request->kandungan_en;
        $senaraigambar->status = $request->status;
        $senaraigambar->lokasi = $request->lokasi;
        $senaraigambar->tarikh_mula = $request->tarikh_mula;
        $senaraigambar->tarikh_akhir = $request->tarikh_akhir;

        if ($request->file('gambar5')) {
            $jalan1 = $request->file('gambar1')->store('banner');
            $jalan2 = $request->file('gambar2')->store('banner');
            $jalan3 = $request->file('gambar3')->store('banner');
            $jalan4 = $request->file('gambar4')->store('banner');
            $jalan5 = $request->file('gambar5')->store('banner');

            $senaraigambar->jalan1 = $jalan1;
            $senaraigambar->jalan2 = $jalan2;
            $senaraigambar->jalan3 = $jalan3;
            $senaraigambar->jalan4 = $jalan4;
            $senaraigambar->jalan5 = $jalan5;
        } else if ($request->file('gambar4')) {
            $jalan1 = $request->file('gambar1')->store('banner');
            $jalan2 = $request->file('gambar2')->store('banner');
            $jalan3 = $request->file('gambar3')->store('banner');
            $jalan4 = $request->file('gambar4')->store('banner');

            $senaraigambar->jalan1 = $jalan1;
            $senaraigambar->jalan2 = $jalan2;
            $senaraigambar->jalan3 = $jalan3;
            $senaraigambar->jalan4 = $jalan4;
        } else if ($request->file('gambar3')) {
            $jalan1 = $request->file('gambar1')->store('banner');
            $jalan2 = $request->file('gambar2')->store('banner');
            $jalan3 = $request->file('gambar3')->store('banner');

            $senaraigambar->jalan1 = $jalan1;
            $senaraigambar->jalan2 = $jalan2;
            $senaraigambar->jalan3 = $jalan3;
        } else if ($request->file('gambar2')) {
            $jalan1 = $request->file('gambar1')->store('banner');
            $jalan2 = $request->file('gambar2')->store('banner');

            $senaraigambar->jalan1 = $jalan1;
            $senaraigambar->jalan2 = $jalan2;
        } else if ($request->file('gambar1')) {
            $jalan1 = $request->file('gambar1')->store('banner');

            $senaraigambar->jalan1 = $jalan1;
        }

        $senaraigambar->id_arkibgambar = $request->id_arkibgambar;

        $senaraigambar->save();

        $senaraigambars = Senaraigambar::where('id_arkibgambar', $request->id_arkibgambar)->get();

       
        return redirect('/tetapan-arkib-bergambar/'.$request->id_arkibgambar)->with('success', 'Berjaya disimpan!');
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
        return redirect('/tetapan-arkib-bergambar/'.$senaraigambar->id_arkibgambar)->with('success', 'Berjaya dipadam');
    }
}
