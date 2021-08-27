<?php

namespace App\Http\Controllers;

use App\Models\Arkibdokumen;
use App\Models\Senaraidokumen;
use Illuminate\Http\Request;

class ArkibdokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arkibdokumen = Arkibdokumen::all();
        return view('pegawai.admin-hq.tetapan-arkib-dokumen', [
            'arkibdokumens' => $arkibdokumen,
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

        $arkibdokumen = new Arkibdokumen();

        $arkibdokumen->nama_ms = $request->nama_ms;
        $arkibdokumen->nama_en = $request->nama_en;
        $arkibdokumen->status = $request->status;
        $arkibdokumen->jalan = $jalan;

        $arkibdokumen->save();

        return redirect('/tetapan-arkib-dokumen')->with('success', 'Berjaya disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Arkibdokumen  $arkibdokumen
     * @return \Illuminate\Http\Response
     */
    public function show($arkibdokumen)
    {
        $senaraidokumen = Senaraidokumen::where('id_arkibdokumen',$arkibdokumen)->get();

        return view('pegawai.admin-hq.tetapan-arkib-dokumen-senarai', [
            'senaraidokumens' => $senaraidokumen,
            'arkibdokumenid' => $arkibdokumen
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Arkibdokumen  $arkibdokumen
     * @return \Illuminate\Http\Response
     */
    public function edit(Arkibdokumen $arkibdokumen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Arkibdokumen  $arkibdokumen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Arkibdokumen $arkibdokumen)
    {
        $arkibdokumen = Arkibdokumen::find($request->id);

        $arkibdokumen->nama_ms = $request->nama_ms;
        $arkibdokumen->nama_en = $request->nama_en;
        $arkibdokumen->status = $request->status;

        if($request->file('gambar')) {
            $jalan = $request->file('gambar')->store('banner');
            $arkibdokumen->jalan = $jalan;
        }

        $arkibdokumen->save();

        return redirect('/tetapan-arkib-dokumen')->with('success', 'Berjaya disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Arkibdokumen  $arkibdokumen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Arkibdokumen $arkibdokumen)
    {
        $arkibdokumen->delete();
        return redirect('/tetapan-arkib-dokumen');
    }
}
