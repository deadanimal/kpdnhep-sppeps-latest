<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;
use App\Models\User;

class SenaraiHitamController extends Controller
{
    public function index(Request $request)
    {
        $pemohon = User::where([
            ['status_permohonan', 'disenarai_hitam'],
            ['role', 'pemohon'],
        ])->get();

        return view('pegawai.hq.hq-senarai-hitam', [
            'pemohon' => $pemohon
        ]);
    }

    public function update(Request $request, $id)
    {
        $pemohon = User::find($id);

        if ($request->jenis_tindakan == "tambah_senarai_hitam") {

            $pemohon->status_permohonan = "disenarai_hitam";
            $pemohon->catatan_senarai_hitam = $request->catatan_senarai_hitam;
            $pemohon->save();

            return redirect('/senarai-hitam')->with('success', 'Berjaya senarai hitam!');

        } else {
            $pemohon->catatan_senarai_hitam = $request->catatan_senarai_hitam;
            $pemohon->save();

            return redirect('/senarai-hitam')->with('success', 'Catatan berjaya disimpan!');
        }
    }

    public function carisenaraihitam(Request $request)
    {
        $negeri = $request->negeri;
        $no_kp = $request->no_kp;

        if ($no_kp != null && $negeri == "null") {
            $pemohon = User::where([
                ['no_kp', '=', $no_kp], ['role', '=', 'pemohon'], ['status_permohonan', '=', 'disenarai_hitam']
            ])->get();
        } else if ($no_kp == null && $negeri != "null") {
            $pemohon = User::where([
                ['negeri', '=', $negeri], ['role', '=', 'pemohon'], ['status_permohonan', '=', 'disenarai_hitam']
            ])->get();
        } else {
            $pemohon = User::where([
                ['negeri', '=', $negeri], ['no_kp', '=', $no_kp], ['status_permohonan', '=', 'disenarai_hitam']
            ])->get();
        }

        return view('pegawai.hq.hq-senarai-hitam', [
            'pemohon' => $pemohon,
        ]);
    }

    public function senaraiDiluluskan(Request $request)
    {
        
        $pemohon = User::where([
            ['status_permohonan', '=' , 'diluluskan'],
            ['role', 'pemohon'],
        ])->get();

         //dd($pemohon);

        return view('pegawai.hq.hq-tambah-senarai-hitam', [
            'pemohon' => $pemohon
        ]);
    }

    public function caritambahsenaraihitam(Request $request)
    {
        $pemohon = User::where([
            ['no_kp', '=', $request->no_kp]
        ])->get();

        return view('pegawai.hq.hq-tambah-senarai-hitam', [
            'pemohon' => $pemohon,
        ]);
    }
}
