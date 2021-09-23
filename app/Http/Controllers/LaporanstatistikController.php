<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LaporanstatistikController extends Controller
{
    public function kelulusanpermit(Request $request)
    {
        // $kelulusan = Permohonan::where('status_permohonan', 'Diluluskan')->get();

        $start = Carbon::parse($request->startdate)->format('Y-m-d');
        $end = Carbon::parse($request->enddate)->format('Y-m-d');

        //utk senarai semua
        if (($request->startdate && $request->enddate) != null) {
            $kelulusan = Permohonan::where('status_permohonan', 'Diluluskan')
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                // ->whereBetween('created_at', [$start, $end])
                ->get();
        } else {
            $kelulusan = Permohonan::where('status_permohonan', 'Diluluskan')
                ->get();
        }

        //utk bil jantina
        if (($request->startdate && $request->enddate) != null) {
            $kelulusanjantina = Permohonan::where('status_permohonan', 'Diluluskan')
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->select('jantina', DB::raw('count(*) as jumlah'))
                ->groupBy('jantina')
                ->get();
        } else {
            $kelulusanjantina = Permohonan::where('status_permohonan', 'Diluluskan')
                ->select('jantina', DB::raw('count(*) as jumlah'))
                ->groupBy('jantina')
                ->get();
        }

        //utk bil negeri
        if (($request->startdate && $request->enddate) != null) {
            $kelulusannegeri = Permohonan::where('status_permohonan', 'Diluluskan')
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->select('negeri', DB::raw('count(*) as jumlah'))
                ->groupBy('negeri')
                ->get();
        } else {
            $kelulusannegeri = Permohonan::where('status_permohonan', 'Diluluskan')
                ->select('negeri', DB::raw('count(*) as jumlah'))
                ->groupBy('negeri')
                ->get();
        }

        //graf negeri
        $mohon = Permohonan::where('status_permohonan', 'Diluluskan')
            ->select(DB::raw("CONCAT_WS('-',MONTHNAME(created_at),YEAR(created_at)) as monthname"), 'negeri', DB::raw('count(*) as jumlah'))
            ->whereYear('created_at', date('Y'))
            ->groupBy('monthname', 'negeri')
            ->orderBy('monthname')
            ->get();

        $arraynegeri = [];
        foreach ($mohon as $mohons) {
            $arraynegeri[] = ['monthname' => $mohons->monthname, $mohons->negeri => $mohons->jumlah];
        }

        //graf jantina
        $kel = Permohonan::where('status_permohonan', 'Diluluskan')
            ->select('jantina',  DB::raw('count(*) as jumlah'))
            ->whereYear('created_at', date('Y'))
            ->groupBy('jantina')
            ->get()->toArray();

        return view('laporan-statistik.peratusan-kelulusan-permit', [
            'kelulusans' => $kelulusan,
            'kelulus' => $arraynegeri,
            'klels' => $kel,
            'kelulusanjantinas' => $kelulusanjantina,
            'kelulusannegeris' => $kelulusannegeri,
        ]);
    }

    public function permitditolak(Request $request)
    {
        // $penolakan = Permohonan::where('status_permohonan', 'Tidak Diluluskan')->get();

        $start = Carbon::parse($request->startdate)->format('Y-m-d');
        $end = Carbon::parse($request->enddate)->format('Y-m-d');

        //utk senarai semua
        if (($request->startdate && $request->enddate) != null) {
            $penolakan = Permohonan::where('status_permohonan', 'Tidak Diluluskan')
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->get();
        } else {
            $penolakan = Permohonan::where('status_permohonan', 'Tidak Diluluskan')
                ->get();
        }

        //utk bil jantina
        if (($request->startdate && $request->enddate) != null) {
            $penolakanjantina = Permohonan::where('status_permohonan', 'Tidak Diluluskan')
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->select('jantina', DB::raw('count(*) as jumlah'))
                ->groupBy('jantina')
                ->get();
        } else {
            $penolakanjantina = Permohonan::where('status_permohonan', 'Tidak Diluluskan')
                ->select('jantina', DB::raw('count(*) as jumlah'))
                ->groupBy('jantina')
                ->get();
        }

        //utk bil negeri
        if (($request->startdate && $request->enddate) != null) {
            $penolakannegeri = Permohonan::where('status_permohonan', 'Tidak Diluluskan')
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->select('negeri', DB::raw('count(*) as jumlah'))
                ->groupBy('negeri')
                ->get();
        } else {
            $penolakannegeri = Permohonan::where('status_permohonan', 'Tidak Diluluskan')
                ->select('negeri', DB::raw('count(*) as jumlah'))
                ->groupBy('negeri')
                ->get();
        }

        //graf negeri
        $tolak = Permohonan::where('status_permohonan', 'Tidak Diluluskan')
            ->select(DB::raw("CONCAT_WS('-',MONTHNAME(created_at),YEAR(created_at)) as monthname"), 'negeri', DB::raw('count(*) as jumlah'))
            ->whereYear('created_at', date('Y'))
            ->groupBy('monthname', 'negeri')
            ->orderBy('monthname')
            ->get();

        $arraynegeri = [];
        foreach ($tolak as $tolaks) {
            $arraynegeri[] = ['monthname' => $tolaks->monthname, $tolaks->negeri => $tolaks->jumlah];
        }

        //graf jantina
        $tol = Permohonan::where('status_permohonan', 'Tidak Diluluskan')
            ->select('jantina',  DB::raw('count(*) as jumlah'))
            ->whereYear('created_at', date('Y'))
            ->groupBy('jantina')
            ->get()->toArray();

        return view('laporan-statistik.peratusan-permit-ditolak', [
            'penolakans' => $penolakan,
            'penolaks' => $arraynegeri,
            'penollaks' => $tol,
            'penolakanjantinas' => $penolakanjantina,
            'penolakannegeris' => $penolakannegeri,
        ]);
    }

    public function sejarahpermohonan(Request $request)
    {
        // $sejarah = Permohonan::all();

        $start = Carbon::parse($request->startdate)->format('Y-m-d');
        $end = Carbon::parse($request->enddate)->format('Y-m-d');

        //utk senarai semua
        if (($request->startdate && $request->enddate) != null) {
            $sejarah = Permohonan::whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->get();
        } else {
            $sejarah = Permohonan::all();
        }

        //utk bil jantina
        if (($request->startdate && $request->enddate) != null) {
            $sejarahjantina = Permohonan::whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->select('jantina', DB::raw('count(*) as jumlah'))
                ->groupBy('jantina')
                ->get();
        } else {
            $sejarahjantina = Permohonan::select('jantina', DB::raw('count(*) as jumlah'))
                ->groupBy('jantina')
                ->get();
        }

        //utk bil negeri
        if (($request->startdate && $request->enddate) != null) {
            $sejarahnegeri = Permohonan::whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->select('negeri', DB::raw('count(*) as jumlah'))
                ->groupBy('negeri')
                ->get();
        } else {
            $sejarahnegeri = Permohonan::select('negeri', DB::raw('count(*) as jumlah'))
                ->groupBy('negeri')
                ->get();
        }

        //graf negeri
        $grafsejarahnegeri = Permohonan::whereYear('created_at', date('Y'))
            ->select(DB::raw("CONCAT_WS('-',MONTHNAME(created_at),YEAR(created_at)) as monthname"), 'negeri', DB::raw('count(*) as jumlah'))
            ->groupBy('monthname', 'negeri')
            ->orderBy('monthname')
            ->get();

        $arraynegeri = [];
        foreach ($grafsejarahnegeri as $grafsejarahnegeris) {
            $arraynegeri[] = ['monthname' => $grafsejarahnegeris->monthname, $grafsejarahnegeris->negeri => $grafsejarahnegeris->jumlah];
        }

        //graf jantina
        $sej = DB::table('permohonans')
            ->select('jantina',  DB::raw('count(*) as jumlah'))
            ->whereYear('created_at', date('Y'))
            ->groupBy('jantina')
            ->get()->toArray();

        return view('laporan-statistik.laporan-sejarah-permohonan', [
            'sejarahs' => $sejarah,
            'sejahs' => $arraynegeri,
            'sejs' => $sej,
            'sejarahjantinas' => $sejarahjantina,
            'sejarahnegeris' => $sejarahnegeri,
        ]);
    }

    public function senaraihitam(Request $request)
    {

        // $senaraihitam = User::where([
        //     ['status_permohonan', '=', 'disenarai_hitam'],
        //     ['role', '=', 'pemohon']
        // ])->get();

        $start = Carbon::parse($request->startdate)->format('Y-m-d');
        $end = Carbon::parse($request->enddate)->format('Y-m-d');

        //utk senarai semua
        if (($request->startdate && $request->enddate) != null) {
            $senaraihitam = User::where([
                ['status_permohonan', '=', 'disenarai_hitam'],
                ['role', '=', 'pemohon']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->get();
        } else {
            $senaraihitam = User::where([
                ['status_permohonan', '=', 'disenarai_hitam'],
                ['role', '=', 'pemohon']
            ])
                ->get();
        }

        //utk bil jantina
        if (($request->startdate && $request->enddate) != null) {
            $senaraihitamjantina = User::where([
                ['status_permohonan', '=', 'disenarai_hitam'],
                ['role', '=', 'pemohon']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->select('jantina', DB::raw('count(*) as jumlah'))
                ->groupBy('jantina')
                ->get();
        } else {
            $senaraihitamjantina = User::where([
                ['status_permohonan', '=', 'disenarai_hitam'],
                ['role', '=', 'pemohon']
            ])
                ->select('jantina', DB::raw('count(*) as jumlah'))
                ->groupBy('jantina')
                ->get();
        }

        //utk bil negeri
        if (($request->startdate && $request->enddate) != null) {
            $senaraihitamnegeri = User::where([
                ['status_permohonan', '=', 'disenarai_hitam'],
                ['role', '=', 'pemohon']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->select('negeri', DB::raw('count(*) as jumlah'))
                ->groupBy('negeri')
                ->get();
        } else {
            $senaraihitamnegeri = User::where([
                ['status_permohonan', '=', 'disenarai_hitam'],
                ['role', '=', 'pemohon']
            ])
                ->select('negeri', DB::raw('count(*) as jumlah'))
                ->groupBy('negeri')
                ->get();
        }

        //graf negeri
        $senaraihits = User::where([
            ['status_permohonan', '=', 'disenarai_hitam'],
            ['role', '=', 'pemohon']
        ])
            ->select(DB::raw("CONCAT_WS('-',MONTHNAME(created_at),YEAR(created_at)) as monthname"), 'negeri', DB::raw('count(*) as jumlah'))
            ->whereYear('created_at', date('Y'))
            ->groupBy('monthname', 'negeri')
            ->orderBy('monthname')
            ->get();

        $arraynegeri = [];
        foreach ($senaraihits as $senaraihit) {
            $arraynegeri[] = ['monthname' => $senaraihit->monthname, $senaraihit->negeri => $senaraihit->jumlah];
        }

        //graf jantina
        $senhit = User::where('status_permohonan', 'disenarai_hitam')
            ->select('jantina',  DB::raw('count(*) as jumlah'))
            ->whereYear('created_at', date('Y'))
            ->groupBy('jantina')
            ->get()->toArray();

        return view('laporan-statistik.laporan-senarai-hitam', [
            'senaraihitams' => $senaraihitam,
            'senarhits' => $arraynegeri,
            'sentam' => $senhit,
            'senaraihitamjantinas' => $senaraihitamjantina,
            'senaraihitamnegeris' => $senaraihitamnegeri,
        ]);
    }

    public function pegangpermit(Request $request)
    {

        // $pegangpermit = Permohonan::all();

        $start = Carbon::parse($request->startdate)->format('Y-m-d');
        $end = Carbon::parse($request->enddate)->format('Y-m-d');

        //utk senarai semua
        if (($request->startdate && $request->enddate) != null) {
            $pegangpermit = Permohonan::where('cetak_status', '=', '1')
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->get();
        } else {
            $pegangpermit = Permohonan::where('cetak_status', '=', '1')
                ->get();
        }

        //utk bil jantina
        if (($request->startdate && $request->enddate) != null) {
            $pegangpermitjantina = Permohonan::where('cetak_status', '=', '1')
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->select('jantina', DB::raw('count(*) as jumlah'))
                ->groupBy('jantina')
                ->get();
        } else {
            $pegangpermitjantina = Permohonan::where('cetak_status', '=', '1')
                ->select('jantina', DB::raw('count(*) as jumlah'))
                ->groupBy('jantina')
                ->get();
        }

        //utk bil negeri
        if (($request->startdate && $request->enddate) != null) {
            $pegangpermitnegeri = Permohonan::where('cetak_status', '=', '1')
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->select('negeri', DB::raw('count(*) as jumlah'))
                ->groupBy('negeri')
                ->get();
        } else {
            $pegangpermitnegeri = Permohonan::where('cetak_status', '=', '1')
                ->select('negeri', DB::raw('count(*) as jumlah'))
                ->groupBy('negeri')
                ->get();
        }

        //graf negeri
        $peggpermit = DB::table('permohonans')
            ->where('cetak_status', '=', '1')
            ->select(DB::raw("CONCAT_WS('-',MONTHNAME(created_at),YEAR(created_at)) as monthname"), 'negeri', DB::raw('count(*) as jumlah'))
            ->whereYear('created_at', date('Y'))
            ->groupBy('monthname', 'negeri')
            ->orderBy('monthname')
            ->get();

        $arraynegeri = [];
        foreach ($peggpermit as $peggpermits) {
            $arraynegeri[] = ['monthname' => $peggpermits->monthname, $peggpermits->negeri => $peggpermits->jumlah];
        }

        //graf jantina
        $pegpermits = DB::table('permohonans')
            ->where('cetak_status', '=', '1')
            ->whereYear('created_at', date('Y'))
            ->select('jantina',  DB::raw('count(*) as jumlah'))
            ->groupBy('jantina')
            ->get()->toArray();

        return view('laporan-statistik.statistik-pemegang-permit', [
            'pegangpermits' => $pegangpermit,
            'pegapermit' => $arraynegeri,
            'pegpermit' => $pegpermits,
            'pegangpermitjantinas' => $pegangpermitjantina,
            'pegangpermitnegeris' => $pegangpermitnegeri,
        ]);
    }

    public function kutipanfi(Request $request)
    {

        // $kutipanfi = Permohonan::all();

        $start = Carbon::parse($request->startdate)->format('Y-m-d');
        $end = Carbon::parse($request->enddate)->format('Y-m-d');

        //utk senarai semua
        if (($request->startdate && $request->enddate) != null) {
            $kutipanfi = Permohonan::whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->get();
        } else {
            $kutipanfi = Permohonan::all();
        }

        //utk bil jantina
        if (($request->startdate && $request->enddate) != null) {
            $kutipanfijantina = Permohonan::whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->select('jantina', DB::raw('sum(bayaran_fi) as jumlah'))
                ->groupBy('jantina')
                ->get();
        } else {
            $kutipanfijantina = Permohonan::select('jantina', DB::raw('sum(bayaran_fi) as jumlah'))
                ->groupBy('jantina')
                ->get();
        }

        //utk bil negeri
        if (($request->startdate && $request->enddate) != null) {
            $kutipanfinegeri = Permohonan::whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->select('negeri', DB::raw('sum(bayaran_fi) as jumlah'))
                ->groupBy('negeri')
                ->get();
        } else {
            $kutipanfinegeri = Permohonan::select('negeri', DB::raw('sum(bayaran_fi) as jumlah'))
                ->groupBy('negeri')
                ->get();
        }

        //graf negeri
        $kutipan = DB::table('permohonans')
            ->select(DB::raw("CONCAT_WS('-',MONTHNAME(created_at),YEAR(created_at)) as monthname"), 'negeri', DB::raw('sum(bayaran_fi) as jumlah'))
            ->whereYear('created_at', date('Y'))
            ->groupBy('monthname', 'negeri')
            ->orderBy('monthname')
            ->get();

        $arraynegeri = [];
        foreach ($kutipan as $kutipans) {
            $arraynegeri[] = ['monthname' => $kutipans->monthname, $kutipans->negeri => $kutipans->jumlah];
        }

        //graf jantina
        $kutipfis = DB::table('permohonans')
            ->whereYear('created_at', date('Y'))
            ->select('jantina', DB::raw('sum(bayaran_fi) as jumlah'))
            ->groupBy('jantina')
            ->get();
            // ->sum('bayaran_fi');
        
        return view('laporan-statistik.statistik-kutipan-fi', [
            'kutipanfis' => $kutipanfi,
            'kutipfis' => $arraynegeri,
            'kutips' => $kutipfis,
            'kutipanfiantinas' => $kutipanfijantina,
            'kutipanfinegeris' => $kutipanfinegeri,
        ]);
    }
}
