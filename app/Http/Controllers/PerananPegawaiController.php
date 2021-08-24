<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;
use App\Models\User;

use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class PerananPegawaiController extends Controller
{
    public function index(Request $request)
    {
        $user = User::where('role', 'pegawai_pdrm')->get();
        // dd($user);

        return view('pegawai.admin-hq.peranan-pdrm', [
            'pdrms' => $user
        ]);
    }

    public function store(Request $request)
    {

        $user = new User();

        $user->name = $request->name;
        $user->no_kp = $request->nric;
        $user->password = Hash::make($request->password);
        $user->jawatan = $request->jawatan;
        $user->agensi = $request->agensi;
        $user->email = $request->email;
        $user->no_telefon_bimbit = $request->no_telefon;
        $user->status = $request->status;
        $user->role = $request->peranan;

        // dd($request);

        $user->save();

        return redirect("/peranan_pdrm");
    }

    public function update(Request $request, User $user)
    {
        $user = User::find($request->id);
        // dd($user);
        $user->name = $request->name;
        $user->no_kp = $request->nric;
        // $user->password = Hash::make($request->password);
        $user->jawatan = $request->jawatan;
        $user->agensi = $request->agensi;
        $user->email = $request->email;
        $user->no_telefon_bimbit = $request->no_telefon_bimbit;
        $user->status = $request->status;
        $user->role = $request->peranan;

        $user->save();

        return redirect("/peranan_pdrm");
    }

    public function cari(Request $request)
    {
        // dd($request);
        $user = User::where([
            ['role', 'pegawai_pdrm'],
            ['no_kp', $request->no_kp],
        ])->get();

        return view('pegawai.admin-hq.peranan-pdrm', [
            'pdrms' => $user
        ]);
    }
}
