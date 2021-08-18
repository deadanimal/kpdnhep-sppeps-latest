<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function landing(){

        $pengland = Pengumuman::where('status', 'aktif')->get();
        $bannerland = Banner::where('status', 'aktif')->get();

        // dd($bannerland);
        return view('global.landing-page',[
            'penglands' => $pengland,
            'banlands' => $bannerland
        ]);
    }
}
