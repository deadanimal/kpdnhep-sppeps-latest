<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class TetapanPerananController extends Controller
{
    public function index(Request $request)
    {
        $pegawai = User::whereIn('role', ['pegawai_negeri', 'pegawai_hq', 'pentadbir'])->get();
        // dd($pegawai);
        // dd($pegawai);
        return view('pegawai.admin-hq.peranan-pegawai', [
            'pegawais' => $pegawai
        ]);
    }

    public function senarai_pegawai(Request $request)
    {
        $pegawai = User::where('role', '!=', 'pemohon')->get();
        // dd($pegawai);
        // dd($pegawai);
        return view('pegawai.admin-hq.tambah-peranan-pegawai', [
            'pegawais' => $pegawai
        ]);
    }

    public function show($user)
    {
        $pegawai = User::where('id', '=', $user)->get();

        // dd($pegawai);
        return view('pegawai.admin-hq.tambah-peranan-pegawai-2', [
            'pegawais' => $pegawai
        ]);
    }

    public function update(Request $request, $user)
    {
        // dd($request);

        $user = User::find($user);

        $user->status = $request->status;
        if ($user->negeri == "WP Putrajaya") {
            $user->roles()->attach($request->peranan1);
            $user->roles()->attach($request->peranan2);
            $user->roles()->attach($request->peranan3);
            $user->roles()->attach($request->peranan4);
            $user->roles()->attach($request->peranan5);
            $user->roles()->attach($request->peranan6);
            $user->roles()->attach($request->peranan7);
        } else {
            $user->roles()->attach($request->peranan1);
            $user->roles()->attach($request->peranan2);
            $user->roles()->attach($request->peranan3);
            $user->roles()->attach($request->peranan4);
        }
        $user->save();
        
        return redirect('/peranan_pegawai');
    }
}
