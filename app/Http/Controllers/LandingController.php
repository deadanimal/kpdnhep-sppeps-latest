<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use App;

class LandingController extends Controller
{
    public function landing(){

        $now = date('Y-m-d');
        $pengland = Pengumuman::where('status', 'aktif')
        ->whereDate('tarikh_mula', '<', $now)
        ->whereDate('tarikh_akhir', '>', $now)
        ->get();

        $bannerland = Banner::where('status', 'aktif')->get();

        // dd($pengland);
        return view('global.landing-page',[
            'penglands' => $pengland,
            'banlands' => $bannerland
        ]);
    }
}
