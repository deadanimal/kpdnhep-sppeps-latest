<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\User;
use Illuminate\Http\Request;

class AuditController extends Controller
{

    public function index()
    {
        $pegawais = User::where('role', "!=", 'pemohon')->get();

        return view('pegawai.admin-hq.at-log-pengguna', [
            'pegawais' => $pegawais,
        ]);
    }

    public function show($id)
    {

        $pegawais = User::where('id', "=", $id)->get();
        $audit = Audit::where('id_pegawai', $id)->get();

        return view('pegawai.admin-hq.at-lihat-log-pengguna', [
            'pegawais' => $pegawais,
            'audits' => $audit
        ]);
    }


    public function log_pemohon()
    {
        $pemohon = User::where('role', "=", 'pemohon')->get();

        return view('pegawai.admin-hq.at-log-pemohon', [
            'pemohon' => $pemohon,
        ]);
    }

    public function lihat_log_pemohon($id)
    {

        $pemohon = User::where('id', "=", $id)->get();
        $audit = Audit::where('id_pemohon', $id)->get();
        // dd($pemohon);

        return view('pegawai.admin-hq.at-lihat-log-pemohon', [
            'pemohon' => $pemohon,
            'audit' => $audit,
        ]);
    }

    public function cari_log_pemohon(Request $request)
    {
        $no_kp = $request->no_kp;
        // dd($request);
        $pemohon = User::where('no_kp', "=", $no_kp)->get();
        // dd($pemohon);

        return view('pegawai.admin-hq.at-log-pemohon', [
            'pemohon' => $pemohon,
        ]);
    }
}
