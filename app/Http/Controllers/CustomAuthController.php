<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Http;
// use Illuminate\Contracts\Session\Session;

class CustomAuthController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }


    public function customLogin(Request $request)
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
            $user = User::where('no_kp', '=', $request->no_kp)->first();
            // dd($user);
            if (empty($user)) {
                abort(404);
            }
            if (Auth::loginUsingId($user->id)) {
                // dd('s');
                return redirect()->intended(RouteServiceProvider::HOME);
            }

            return redirect("/login_")->withErrors('Login details are not valid');

        } else {
            // return redirect('/login')->withErrors('Salah username/kata laluan');
            return back()->with('error', 'Salah username/kata laluan');
        }
    }



    public function registration()
    {
        return view('auth.registration');
    }


    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('You have signed-in');
    }


    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }


    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }


    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
