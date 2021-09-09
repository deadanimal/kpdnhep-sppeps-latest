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

    public function cari_pegawai(Request $request)
    {
        $no_kp = $request->no_kp;
        $negeri = $request->negeri;

        if ($no_kp != null && $negeri == "null") {

            $pegawai = User::where([
                ['no_kp', '=', $no_kp],
            ])->get();
            //
        } else if ($no_kp == null && $negeri != "null") {

            $pegawai = User::where([
                ['negeri', '=', $negeri],
            ])->get();
            //
        } else {

            $pegawai = User::where([
                ['no_kp', '=', $no_kp],
                ['negeri', '=', $negeri],
            ])->get();
        }

        return view('pegawai.admin-hq.peranan-pegawai', [
            'pegawais' => $pegawai
        ]);
        
    }


    public function senarai_pegawai(Request $request)
    {
        $pegawai = User::where('role', '=', 'tiada')->get();
        // dd($pegawai);
        // dd($pegawai);
        return view('pegawai.admin-hq.tambah-peranan-pegawai', [
            'pegawais' => $pegawai
        ]);
    }

    public function cari_pegawai_insid(Request $request){
        // dd($request);

        $no_kp = $request->no_kp;
        
        $url = 'http://apidev.kpdnhep.gov.my/api/staf';

        $token_janaan = Http::post($url, [
            "name" => "janaToken",
            "param" => [
                "app_id" => "sppeps",
                "app_secret" => "[sppeps@bpm7]",
                "scope" => "staf",
            ]
        ])->json()['result']['token'];


        $url = 'http://apidev.kpdnhep.gov.my/api/staf';

        $pegawai = Http::withToken($token_janaan)->post($url, [
            "name" => "carian",
            "param" => [
                "no_kp" => $no_kp,
            ]
        ]);

        if ($pegawai->successful()) {

            return view('pegawai.admin-hq.tambah-peranan-pegawai', [
                'pegawais' => $pegawai
            ]);

        } else {
            return redirect('/senarai_pegawai')->withErrors('No. kad pengenalan tidak wujud');
        }
    }

    public function show_pegawai_insid($no_kp)
    {
        
        $url = 'http://apidev.kpdnhep.gov.my/api/staf';

        $token_janaan = Http::post($url, [
            "name" => "janaToken",
            "param" => [
                "app_id" => "sppeps",
                "app_secret" => "[sppeps@bpm7]",
                "scope" => "staf",
            ]
        ])->json()['result']['token'];


        $url = 'http://apidev.kpdnhep.gov.my/api/staf';

        $pegawai = Http::withToken($token_janaan)->post($url, [
            "name" => "carian",
            "param" => [
                "no_kp" => $no_kp,
            ]
        ]);

        if ($pegawai->successful()) {

            return view('pegawai.admin-hq.tambah-peranan-pegawai-2', [
                'pegawais' => $pegawai
            ]);

        } else {
            return redirect('/senarai_pegawai')->withErrors('No. kad pengenalan tidak wujud');
        }
        
    }

    public function tambah_pegawai(Request $request){

        $user = new User;

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
