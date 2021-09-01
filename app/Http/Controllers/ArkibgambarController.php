<?php

namespace App\Http\Controllers;

use App\Models\Arkibgambar;
use Illuminate\Http\Request;
use App\Models\Senaraigambar;

class ArkibgambarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arkibgambar = Arkibgambar::all();
        return view('pegawai.admin-hq.tetapan-arkib-bergambar', [
            'arkibgambars' => $arkibgambar,
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
        $jalan = $request->file('gambar')->store('banner');

        $arkibgambar = new Arkibgambar();

        $arkibgambar->nama_ms = $request->nama_ms;
        $arkibgambar->nama_en = $request->nama_en;
        $arkibgambar->status = $request->status;
        $arkibgambar->jalan = $jalan;

        $arkibgambar->save();

        return redirect('/tetapan-arkib-bergambar')->with('success', 'Berjaya disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Arkibgambar  $arkibgambar
     * @return \Illuminate\Http\Response
     */
    public function show($arkibgambar)
    {
        $senaraigambar = Senaraigambar::where('id_arkibgambar',$arkibgambar)->get();

        return view('pegawai.admin-hq.tetapan-arkib-bergambar-senarai', [
            'senaraigambars' => $senaraigambar,
            'arkibgambarid'=>$arkibgambar
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Arkibgambar  $arkibgambar
     * @return \Illuminate\Http\Response
     */
    public function edit(Arkibgambar $arkibgambar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Arkibgambar  $arkibgambar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Arkibgambar $arkibgambar)
    {
        $arkibgambar = Arkibgambar::find($request->id);

        $arkibgambar->nama_ms = $request->nama_ms;
        $arkibgambar->nama_en = $request->nama_en;
        $arkibgambar->status = $request->status;

        if($request->file('gambar')) {
            $jalan = $request->file('gambar')->store('banner');
            $arkibgambar->jalan = $jalan;
        }

        $arkibgambar->save();

        return redirect('/tetapan-arkib-bergambar')->with('success', 'Berjaya disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Arkibgambar  $arkibgambar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Arkibgambar $arkibgambar)
    {
        $arkibgambar->delete();
        return redirect('/tetapan-arkib-bergambar')->with('success', 'Berjaya dipadam');
    }
}
