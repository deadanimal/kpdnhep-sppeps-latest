<?php

namespace App\Http\Controllers\Auth;

use App\Models\Audit;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        // dd($request);
        $pemohon = User::where([
            ['no_kp', $request->no_kp], ['role', 'pemohon']
        ])->orWhere([
            ['no_kp', '123456789012']
        ])->get()->first();
        // dd($pemohon);
        if ($pemohon == null){
            return Redirect::back()->withErrors('No. kad pengenalan atau kata laluan tidak sah');
        }


        $request->authenticate();

        $request->session()->regenerate();

        $user = $request->user();
        if ($user->role != 'pemohon') {
            $audit = new Audit;
            $audit->id_pegawai = $user->id;
            $audit->description = $user->name. ' loggedin.';
            
            $audit->save();   
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {

        $user = $request->user();
        if ($user->role != 'pemohon') {
            $audit = new Audit;
            $audit->id_pegawai = $user->id;
            $audit->description = $user->name. ' logged out.';
            
            $audit->save();   
        }

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login_');
    }
}
