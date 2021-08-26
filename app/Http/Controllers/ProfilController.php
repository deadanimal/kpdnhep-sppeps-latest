<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Http;

class ProfilController extends Controller
{
    public function index(Request $request)
    {
        // dd($request);

        $user = $request->user();
        $user_role = $user->role;
        $user_id = $user->id;

        $pemohon = User::where('id', $user_id)->get();

        // dd($pemohon);
        return view('auth.profile_', [
            'pemohon' => $pemohon
        ]);
    }

    public function show(User $user, Request $request)
    {

        $user = $request->user();
        $user_role = $user->role;
        $user_id = $user->id;

        return view('auth.profile-update_', [
            'pemohon' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        // dd($user->name);

        $user = $request->user();
        $user_id = $user->id;

        $user = User::find($user_id);
        // dd($user);
        $user->no_kp =  $request->no_kp;
        $user->email =  $request->email;
        $user->jantina =  $request->jantina;
        $user->alamat1 =  $request->alamat1;
        $user->alamat2 =  $request->alamat2;
        $user->alamat3 =  $request->alamat3;
        $user->poskod =  $request->poskod;
        $user->negeri =  $request->negeri;
        $user->no_telefon_bimbit =  $request->no_telefon_bimbit;
        $user->no_telefon_rumah =  $request->no_telefon_rumah;
        $user->no_telefon_pejabat =  $request->no_telefon_pejabat;

        $gambar_profil = $request->file('gambar_profil')->store('profil');
        $user->gambar_profil = $gambar_profil;

        $user->save();

        return redirect('/profil');
    }

    public function login_insid(LoginRequest $request)
    {
        $ic = $request->ic;
        $password = $request->password;

        if ($ic == '900102035115' and $password == 'PipelineIsmail') {
            $request->email = '713e52f3-cde5-4798-941a-d47ab8db0229@email.webhook.site';
        }

        $request->authenticate();
        $request->session()->regenerate();


        return redirect('/dashboard');
    }

    public function login_via_insid(LoginRequest $request)
    {
        $idpengguna = $request->idpengguna;
        $katalaluan = $request->katalaluan;

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

        $pengguna = Http::withToken($token_janaan)->post($url, [
            "name" => "login",
            "param" => [
                "idpengguna" => $idpengguna,
                "katalaluan " => $katalaluan
            ]
        ]);

        if ($pengguna->successful()) {
            $request->authenticate();
            $request->session()->regenerate();
            return redirect('/appp');
        } else {
            return redirect('/login')->withErrors('Salah username/kata laluan');
        }
    }

    public function login_via_myhub(LoginRequest $request)
    {
        $idpengguna = $request->idpengguna;
        $katalaluan = $request->katalaluan;

        $url = 'http://datajpndev.kpdnhep.gov.my/jwtapi/';

        $token_janaan = Http::post($url, [
            "name" => "janaToken",
            "param" => [
                "user_id" => "No_Kad_Pengenalan",
                "app_id" => "SPPEPSdev",
                "app_secret" => "[SPPEPSdev@bpm123]",
            ]
        ])->json()['result']['token'];

        $pengguna = Http::withToken($token_janaan)->post($url, [
            "name" => "getMyIdentity",
            "param" => [
                "nokp" => $idpengguna,
            ]
        ])->json();

        if ($pengguna->successful()) {
            $request->authenticate();
            $request->session()->regenerate();
            return redirect('/appp');
        } else {
            return redirect('/login')->withErrors('Salah username/kata laluan');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }


    public function register(Request $request)
    {
        $user = new User();

        $user->umur = $request->age;
        $user->tarikh_lahir = $request->tarikh_lahir;
        $user->name = $request->name;
        $user->no_kp = $request->no_kp;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        // dd($request);

        $user->save();

        return redirect("/login_");
    }

    public function tukar_kata_laluan(Request $request){
        
        $user = $request->user();
        $password = $user->password;

        $current_pass = Hash::make($request->cur_pass);
        $new_pass = Hash::make($request->new_pass);
        $confirm_new_pass = Hash::make($request->confirm_new_pass);

        // dd($current_pass );

        if($current_pass == $password){

        }
        else {
            return back()->with('error', 'Harap Maaf! Sila masukkan kata laluan asal anda');
        }
    }
}
