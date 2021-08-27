<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::all();
        return view('pegawai.admin-hq.tetapan-banner', [
            'banners' => $banner,
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

        $banner = new Banner();

        $banner->tajuk = $request->tajuk;
        $banner->keterangan = $request->keterangan;
        $banner->status = $request->status;
        $banner->jalan = $jalan;

        $banner->save();

        return redirect('/tetapan-banner')->with('success', 'Berjaya disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $banner = Banner::find($request->id);

        $banner->tajuk = $request->tajuk;
        $banner->keterangan = $request->keterangan;
        $banner->status = $request->status;

        if($request->file('gambar')) {
            $jalan = $request->file('gambar')->store('banner');
            $banner->jalan = $jalan;
        }

    
        $banner->save();
        
        return redirect('/tetapan-banner')->with('success', 'Berjaya disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect('/tetapan-banner');
    }
}
