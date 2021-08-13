<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfilController extends Controller
{
    public function index(Request $request)
    {
        // dd($request);

        $user = $request->user();
        $user_role = $user->role;
        $user_id = $user->id;

        $pemohon = User::where('id', $user_id)->get();

        return view('auth.profile_', [
            'pemohon' => $pemohon
        ]);

    }

    public function show(User $user, Request $request)
    {

        $user = $request->user();
        $user_role = $user->role;
        $user_id = $user->id;

        // $pemohon = User::where('id', $user_id)->get();

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

        $user->save();

        return redirect('/profil');
    }

}
