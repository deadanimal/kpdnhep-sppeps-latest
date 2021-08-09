<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;
use App\Models\User;

class BorangPermohonan extends Controller
{
    public function index(Request $request)
    {
        dd($request);

        $user = $request->user();
        $user_role = $user->role;
        $user_id = $user->id;

        // $pemohons = User::where('id', $user_id)->get();
        // if ($request->borang == "baharu"){
        //     return view('pemohon.permohonan-baru', [
        //         'pemohon' => $pemohons
        //     ]);
        // }

    }

    public function borang(Request $request)
    {
        // dd($request);
        $user = $request->user();
        $user_role = $user->role;
        $user_id = $user->id;

        $pemohons = User::where('id', $user_id)->get();

        // dd($pemohons);
        if ($request->jenis == "baharu") {
            return view('pemohon.permohonan-baru', [
                'pemohon' => $pemohons
            ]);
        } else if ($request->jenis == "pembaharuan") {
            return view('pemohon.permohonan-pembaharuan', [
                'pemohon' => $pemohons
            ]);
        } else if ($request->jenis == "pendua") {
            return view('pemohon.permohonan-pendua', [
                'pemohon' => $pemohons
            ]);
        } else if ($request->jenis == "rayuan") {
            return view('pemohon.permohonan-rayuan', [
                'pemohon' => $pemohons
            ]);
        }
    }
}
