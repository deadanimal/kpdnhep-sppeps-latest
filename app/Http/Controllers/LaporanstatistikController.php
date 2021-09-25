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
            $kelulusan = Permohonan::where('status_permohonan', '=', 'Diluluskan')
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                // ->whereBetween('created_at', [$start, $end])
                ->get();
        } else {
            $kelulusan = Permohonan::where('status_permohonan', '=', 'Diluluskan')
                ->get();
        }

        //utk bil jantina
        if (($request->startdate && $request->enddate) != null) {
            // $kelulusanjantina = Permohonan::where('status_permohonan', 'Diluluskan')
            //     ->whereDate('created_at', '>=', $start)
            //     ->whereDate('created_at', '<=', $end)
            //     ->select('jantina', DB::raw('count(*) as jumlah'))
            //     ->groupBy('jantina')
            //     ->get();

            $kelulusanjantinalelaki = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['jantina', '=', 'Lelaki']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $kelulusanjantinaperempuan = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['jantina', '=', 'Perempuan']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();
        } else {
            // $kelulusanjantina = Permohonan::where('status_permohonan', 'Diluluskan')
            //     ->select('jantina', DB::raw('count(*) as jumlah'))
            //     ->groupBy('jantina')
            //     ->get();

            $kelulusanjantinalelaki = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['jantina', '=', 'Lelaki']
            ])
                ->count();

            $kelulusanjantinaperempuan = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['jantina', '=', 'Perempuan']
            ])
                ->count();
        }

        //utk bil negeri
        if (($request->startdate && $request->enddate) != null) {
            // $kelulusannegeri = Permohonan::where('status_permohonan', 'Diluluskan')
            //     ->whereDate('created_at', '>=', $start)
            //     ->whereDate('created_at', '<=', $end)
            //     ->select('negeri_kutipan_permit', DB::raw('count(*) as jumlah'))
            //     ->groupBy('negeri_kutipan_permit')
            //     ->get();

            $kelulusannegerijohor = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['negeri_kutipan_permit', '=', 'Johor']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $kelulusannegerikedah = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['negeri_kutipan_permit', '=', 'Kedah']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $kelulusannegerikelantan = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['negeri_kutipan_permit', '=', 'Kelantan']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $kelulusannegerimelaka = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['negeri_kutipan_permit', '=', 'Melaka']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $kelulusannegerinegerisembilan = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['negeri_kutipan_permit', '=', 'Negeri Sembilan']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $kelulusannegeripahang = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['negeri_kutipan_permit', '=', 'Pahang']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $kelulusannegeripulaupinang = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['negeri_kutipan_permit', '=', 'Pulau Pinang']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $kelulusannegeriperak = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['negeri_kutipan_permit', '=', 'Perak']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $kelulusannegeriperlis = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['negeri_kutipan_permit', '=', 'Perlis']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $kelulusannegeriselangor = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['negeri_kutipan_permit', '=', 'Selangor']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $kelulusannegeriterengganu = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['negeri_kutipan_permit', '=', 'Terengganu']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $kelulusannegerisabah = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['negeri_kutipan_permit', '=', 'Sabah']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $kelulusannegerisarawak = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['negeri_kutipan_permit', '=', 'Sarawak']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $kelulusannegerikualalumpur = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['negeri_kutipan_permit', '=', 'WP Kuala Lumpur']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $kelulusannegerilabuan = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['negeri_kutipan_permit', '=', 'WP Labuan']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $kelulusannegeriputrajaya = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['negeri_kutipan_permit', '=', 'WP Putrajaya']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();
        } else {
            // $kelulusannegeri = Permohonan::where('status_permohonan', 'Diluluskan')
            //     ->select('negeri_kutipan_permit', DB::raw('count(*) as jumlah'))
            //     ->groupBy('negeri_kutipan_permit')
            //     ->get();

            $kelulusannegerijohor = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['negeri_kutipan_permit', '=', 'Johor']
            ])
                ->count();

            $kelulusannegerikedah = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['negeri_kutipan_permit', '=', 'Kedah']
            ])
                ->count();

            $kelulusannegerikelantan = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['negeri_kutipan_permit', '=', 'Kelantan']
            ])
                ->count();

            $kelulusannegerimelaka = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['negeri_kutipan_permit', '=', 'Melaka']
            ])
                ->count();

            $kelulusannegerinegerisembilan = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['negeri_kutipan_permit', '=', 'Negeri Sembilan']
            ])
                ->count();

            $kelulusannegeripahang = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['negeri_kutipan_permit', '=', 'Pahang']
            ])
                ->count();

            $kelulusannegeripulaupinang = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['negeri_kutipan_permit', '=', 'Pulau Pinang']
            ])
                ->count();

            $kelulusannegeriperak = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['negeri_kutipan_permit', '=', 'Perak']
            ])
                ->count();

            $kelulusannegeriperlis = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['negeri_kutipan_permit', '=', 'Perlis']
            ])
                ->count();

            $kelulusannegeriselangor = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['negeri_kutipan_permit', '=', 'Selangor']
            ])
                ->count();

            $kelulusannegeriterengganu = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['negeri_kutipan_permit', '=', 'Terengganu']
            ])
                ->count();

            $kelulusannegerisabah = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['negeri_kutipan_permit', '=', 'Sabah']
            ])
                ->count();

            $kelulusannegerisarawak = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['negeri_kutipan_permit', '=', 'Sarawak']
            ])
                ->count();

            $kelulusannegerikualalumpur = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['negeri_kutipan_permit', '=', 'WP Kuala Lumpur']
            ])
                ->count();

            $kelulusannegerilabuan = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['negeri_kutipan_permit', '=', 'WP Labuan']
            ])
                ->count();

            $kelulusannegeriputrajaya = Permohonan::where([
                ['status_permohonan', '=', 'Diluluskan'], ['negeri_kutipan_permit', '=', 'WP Putrajaya']
            ])
                ->count();
        }

        //graf negeri
        $mohon = Permohonan::where('status_permohonan', 'Diluluskan')
            ->select(DB::raw("CONCAT_WS('-',MONTHNAME(created_at),YEAR(created_at)) as monthname"), 'negeri_kutipan_permit', DB::raw('count(*) as jumlah'))
            ->whereYear('created_at', date('Y'))
            ->groupBy('monthname', 'negeri_kutipan_permit')
            ->orderBy('monthname')
            ->get();

        $arraynegeri = [];
        foreach ($mohon as $mohons) {
            $arraynegeri[] = ['monthname' => $mohons->monthname, $mohons->negeri_kutipan_permit => $mohons->jumlah];
        }

        //graf jantina
        $kel = Permohonan::where('status_permohonan', '=', 'Diluluskan')
            ->select('jantina',  DB::raw('count(*) as jumlah'))
            ->whereYear('created_at', date('Y'))
            ->groupBy('jantina')
            ->get()->toArray();

        return view('laporan-statistik.peratusan-kelulusan-permit', [
            'kelulusans' => $kelulusan,
            'kelulus' => $arraynegeri,
            'klels' => $kel,
            // 'kelulusanjantinas' => $kelulusanjantina,
            'kelulusanjantinalelakis' => $kelulusanjantinalelaki,
            'kelulusanjantinaperempuans' => $kelulusanjantinaperempuan,
            // 'kelulusannegeris' => $kelulusannegeri,
            'kelulusannegerijohor' => $kelulusannegerijohor,
            'kelulusannegerikedah' => $kelulusannegerikedah,
            'kelulusannegerikelantan' => $kelulusannegerikelantan,
            'kelulusannegerimelaka' => $kelulusannegerimelaka,
            'kelulusannegerinegerisembilan' => $kelulusannegerinegerisembilan,
            'kelulusannegeripahang' => $kelulusannegeripahang,
            'kelulusannegeripulaupinang' => $kelulusannegeripulaupinang,
            'kelulusannegeriperak' => $kelulusannegeriperak,
            'kelulusannegeriperlis' => $kelulusannegeriperlis,
            'kelulusannegeriselangor' => $kelulusannegeriselangor,
            'kelulusannegeriterengganu' => $kelulusannegeriterengganu,
            'kelulusannegerisabah' => $kelulusannegerisabah,
            'kelulusannegerisarawak' => $kelulusannegerisarawak,
            'kelulusannegerikualalumpur' => $kelulusannegerikualalumpur,
            'kelulusannegerilabuan' => $kelulusannegerilabuan,
            'kelulusannegeriputrajaya' => $kelulusannegeriputrajaya,
        ]);
    }

    public function permitditolak(Request $request)
    {
        // $penolakan = Permohonan::where('status_permohonan', '=', 'Tidak Diluluskan')->get();

        $start = Carbon::parse($request->startdate)->format('Y-m-d');
        $end = Carbon::parse($request->enddate)->format('Y-m-d');

        //utk senarai semua
        if (($request->startdate && $request->enddate) != null) {
            $penolakan = Permohonan::where('status_permohonan', '=', 'Tidak Diluluskan')
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->get();
        } else {
            $penolakan = Permohonan::where('status_permohonan', '=', 'Tidak Diluluskan')
                ->get();
        }

        //utk bil jantina
        if (($request->startdate && $request->enddate) != null) {

            $penolakanjantinalelaki = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['jantina', '=', 'Lelaki']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $penolakanjantinaperempuan = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['jantina', '=', 'Perempuan']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();
        } else {

            $penolakanjantinalelaki = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['jantina', '=', 'Lelaki']
            ])
                ->count();

            $penolakanjantinaperempuan = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['jantina', '=', 'Perempuan']
            ])
                ->count();
        }

        //utk bil negeri
        if (($request->startdate && $request->enddate) != null) {

            $penolakannegerijohor = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['negeri_kutipan_permit', '=', 'Johor']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $penolakannegerikedah = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['negeri_kutipan_permit', '=', 'Kedah']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $penolakannegerikelantan = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['negeri_kutipan_permit', '=', 'Kelantan']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $penolakannegerimelaka = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['negeri_kutipan_permit', '=', 'Melaka']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $penolakannegerinegerisembilan = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['negeri_kutipan_permit', '=', 'Negeri Sembilan']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $penolakannegeripahang = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['negeri_kutipan_permit', '=', 'Pahang']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $penolakannegeripulaupinang = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['negeri_kutipan_permit', '=', 'Pulau Pinang']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $penolakannegeriperak = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['negeri_kutipan_permit', '=', 'Perak']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $penolakannegeriperlis = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['negeri_kutipan_permit', '=', 'Perlis']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $penolakannegeriselangor = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['negeri_kutipan_permit', '=', 'Selangor']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $penolakannegeriterengganu = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['negeri_kutipan_permit', '=', 'Terengganu']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $penolakannegerisabah = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['negeri_kutipan_permit', '=', 'Sabah']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $penolakannegerisarawak = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['negeri_kutipan_permit', '=', 'Sarawak']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $penolakannegerikualalumpur = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['negeri_kutipan_permit', '=', 'WP Kuala Lumpur']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $penolakannegerilabuan = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['negeri_kutipan_permit', '=', 'WP Labuan']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $penolakannegeriputrajaya = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['negeri_kutipan_permit', '=', 'WP Putrajaya']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();
        } else {

            $penolakannegerijohor = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['negeri_kutipan_permit', '=', 'Johor']
            ])
                ->count();

            $penolakannegerikedah = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['negeri_kutipan_permit', '=', 'Kedah']
            ])
                ->count();

            $penolakannegerikelantan = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['negeri_kutipan_permit', '=', 'Kelantan']
            ])
                ->count();

            $penolakannegerimelaka = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['negeri_kutipan_permit', '=', 'Melaka']
            ])
                ->count();

            $penolakannegerinegerisembilan = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['negeri_kutipan_permit', '=', 'Negeri Sembilan']
            ])
                ->count();

            $penolakannegeripahang = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['negeri_kutipan_permit', '=', 'Pahang']
            ])
                ->count();

            $penolakannegeripulaupinang = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['negeri_kutipan_permit', '=', 'Pulau Pinang']
            ])
                ->count();

            $penolakannegeriperak = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['negeri_kutipan_permit', '=', 'Perak']
            ])
                ->count();

            $penolakannegeriperlis = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['negeri_kutipan_permit', '=', 'Perlis']
            ])
                ->count();

            $penolakannegeriselangor = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['negeri_kutipan_permit', '=', 'Selangor']
            ])
                ->count();

            $penolakannegeriterengganu = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['negeri_kutipan_permit', '=', 'Terengganu']
            ])
                ->count();

            $penolakannegerisabah = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['negeri_kutipan_permit', '=', 'Sabah']
            ])
                ->count();

            $penolakannegerisarawak = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['negeri_kutipan_permit', '=', 'Sarawak']
            ])
                ->count();

            $penolakannegerikualalumpur = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['negeri_kutipan_permit', '=', 'WP Kuala Lumpur']
            ])
                ->count();

            $penolakannegerilabuan = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['negeri_kutipan_permit', '=', 'WP Labuan']
            ])
                ->count();

            $penolakannegeriputrajaya = Permohonan::where([
                ['status_permohonan', '=', 'Tidak Diluluskan'], ['negeri_kutipan_permit', '=', 'WP Putrajaya']
            ])
                ->count();
        }

        //graf negeri
        $tolak = Permohonan::where('status_permohonan', '=', 'Tidak Diluluskan')
            ->select(DB::raw("CONCAT_WS('-',MONTHNAME(created_at),YEAR(created_at)) as monthname"), 'negeri_kutipan_permit', DB::raw('count(*) as jumlah'))
            ->whereYear('created_at', date('Y'))
            ->groupBy('monthname', 'negeri_kutipan_permit')
            ->orderBy('monthname')
            ->get();

        $arraynegeri = [];
        foreach ($tolak as $tolaks) {
            $arraynegeri[] = ['monthname' => $tolaks->monthname, $tolaks->negeri_kutipan_permit => $tolaks->jumlah];
        }

        //graf jantina
        $tol = Permohonan::where('status_permohonan', '=', 'Tidak Diluluskan')
            ->select('jantina',  DB::raw('count(*) as jumlah'))
            ->whereYear('created_at', date('Y'))
            ->groupBy('jantina')
            ->get()->toArray();

        return view('laporan-statistik.peratusan-permit-ditolak', [
            'penolakans' => $penolakan,
            'penolaks' => $arraynegeri,
            'penollaks' => $tol,
            'penolakanjantinalelaki' => $penolakanjantinalelaki,
            'penolakanjantinaperempuan' => $penolakanjantinaperempuan,
            'penolakannegerijohor' => $penolakannegerijohor,
            'penolakannegerikedah' => $penolakannegerikedah,
            'penolakannegerikelantan' => $penolakannegerikelantan,
            'penolakannegerimelaka' => $penolakannegerimelaka,
            'penolakannegerinegerisembilan' => $penolakannegerinegerisembilan,
            'penolakannegeripahang' => $penolakannegeripahang,
            'penolakannegeripulaupinang' => $penolakannegeripulaupinang,
            'penolakannegeriperak' => $penolakannegeriperak,
            'penolakannegeriperlis' => $penolakannegeriperlis,
            'penolakannegeriselangor' => $penolakannegeriselangor,
            'penolakannegeriterengganu' => $penolakannegeriterengganu,
            'penolakannegerisabah' => $penolakannegerisabah,
            'penolakannegerisarawak' => $penolakannegerisarawak,
            'penolakannegerikualalumpur' => $penolakannegerikualalumpur,
            'penolakannegerilabuan' => $penolakannegerilabuan,
            'penolakannegeriputrajaya' => $penolakannegeriputrajaya,
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

            $sejarahjantinalelaki = Permohonan::where('jantina', '=', 'Lelaki')
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $sejarahjantinaperempuan = Permohonan::where('jantina', '=', 'Perempuan')
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();
        } else {

            $sejarahjantinalelaki = Permohonan::where('jantina', '=', 'Lelaki')
                ->count();

            $sejarahjantinaperempuan = Permohonan::where('jantina', '=', 'Perempuan')
                ->count();
        }

        //utk bil negeri
        if (($request->startdate && $request->enddate) != null) {

            $sejarahnegerijohor = Permohonan::where('negeri_kutipan_permit', '=', 'Johor')
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $sejarahnegerikedah = Permohonan::where('negeri_kutipan_permit', '=', 'Kedah')
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $sejarahnegerikelantan = Permohonan::where('negeri_kutipan_permit', '=', 'Kelantan')
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $sejarahnegerimelaka = Permohonan::where('negeri_kutipan_permit', '=', 'Melaka')
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $sejarahnegerinegerisembilan = Permohonan::where('negeri_kutipan_permit', '=', 'Negeri Sembilan')
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $sejarahnegeripahang = Permohonan::where('negeri_kutipan_permit', '=', 'Pahang')
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $sejarahnegeripulaupinang = Permohonan::where('negeri_kutipan_permit', '=', 'Pulau Pinang')
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $sejarahnegeriperak = Permohonan::where('negeri_kutipan_permit', '=', 'Perak')
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $sejarahnegeriperlis = Permohonan::where('negeri_kutipan_permit', '=', 'Perlis')
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $sejarahnegeriselangor = Permohonan::where('negeri_kutipan_permit', '=', 'Selangor')
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $sejarahnegeriterengganu = Permohonan::where('negeri_kutipan_permit', '=', 'Terengganu')
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $sejarahnegerisabah = Permohonan::where('negeri_kutipan_permit', '=', 'Sabah')
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $sejarahnegerisarawak = Permohonan::where('negeri_kutipan_permit', '=', 'Sarawak')
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $sejarahnegerikualalumpur = Permohonan::where('negeri_kutipan_permit', '=', 'WP Kuala Lumpur')
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $sejarahnegerilabuan = Permohonan::where('negeri_kutipan_permit', '=', 'WP Labuan')
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $sejarahnegeriputrajaya = Permohonan::where('negeri_kutipan_permit', '=', 'WP Putrajaya')
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();
        } else {

            $sejarahnegerijohor = Permohonan::where('negeri_kutipan_permit', '=', 'Johor')
                ->count();

            $sejarahnegerikedah = Permohonan::where('negeri_kutipan_permit', '=', 'Kedah')
                ->count();

            $sejarahnegerikelantan = Permohonan::where('negeri_kutipan_permit', '=', 'Kelantan')
                ->count();

            $sejarahnegerimelaka = Permohonan::where('negeri_kutipan_permit', '=', 'Melaka')
                ->count();

            $sejarahnegerinegerisembilan = Permohonan::where('negeri_kutipan_permit', '=', 'Negeri Sembilan')
                ->count();

            $sejarahnegeripahang = Permohonan::where('negeri_kutipan_permit', '=', 'Pahang')
                ->count();

            $sejarahnegeripulaupinang = Permohonan::where('negeri_kutipan_permit', '=', 'Pulau Pinang')
                ->count();

            $sejarahnegeriperak = Permohonan::where('negeri_kutipan_permit', '=', 'Perak')
                ->count();

            $sejarahnegeriperlis = Permohonan::where('negeri_kutipan_permit', '=', 'Perlis')
                ->count();

            $sejarahnegeriselangor = Permohonan::where('negeri_kutipan_permit', '=', 'Selangor')
                ->count();

            $sejarahnegeriterengganu = Permohonan::where('negeri_kutipan_permit', '=', 'Terengganu')
                ->count();

            $sejarahnegerisabah = Permohonan::where('negeri_kutipan_permit', '=', 'Sabah')
                ->count();

            $sejarahnegerisarawak = Permohonan::where('negeri_kutipan_permit', '=', 'Sarawak')
                ->count();

            $sejarahnegerikualalumpur = Permohonan::where('negeri_kutipan_permit', '=', 'WP Kuala Lumpur')
                ->count();

            $sejarahnegerilabuan = Permohonan::where('negeri_kutipan_permit', '=', 'WP Labuan')
                ->count();

            $sejarahnegeriputrajaya = Permohonan::where('negeri_kutipan_permit', '=', 'WP Putrajaya')
                ->count();
        }

        //graf negeri
        $grafsejarahnegeri = Permohonan::whereYear('created_at', date('Y'))
            ->select(DB::raw("CONCAT_WS('-',MONTHNAME(created_at),YEAR(created_at)) as monthname"), 'negeri_kutipan_permit', DB::raw('count(*) as jumlah'))
            ->groupBy('monthname', 'negeri_kutipan_permit')
            ->orderBy('monthname')
            ->get();

        $arraynegeri = [];
        foreach ($grafsejarahnegeri as $grafsejarahnegeris) {
            $arraynegeri[] = ['monthname' => $grafsejarahnegeris->monthname, $grafsejarahnegeris->negeri_kutipan_permit => $grafsejarahnegeris->jumlah];
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
            'sejarahjantinalelakis' => $sejarahjantinalelaki,
            'sejarahjantinaperempuans' => $sejarahjantinaperempuan,
            'sejarahnegerijohor' => $sejarahnegerijohor,
            'sejarahnegerikedah' => $sejarahnegerikedah,
            'sejarahnegerikelantan' => $sejarahnegerikelantan,
            'sejarahnegerimelaka' => $sejarahnegerimelaka,
            'sejarahnegerinegerisembilan' => $sejarahnegerinegerisembilan,
            'sejarahnegeripahang' => $sejarahnegeripahang,
            'sejarahnegeripulaupinang' => $sejarahnegeripulaupinang,
            'sejarahnegeriperak' => $sejarahnegeriperak,
            'sejarahnegeriperlis' => $sejarahnegeriperlis,
            'sejarahnegeriselangor' => $sejarahnegeriselangor,
            'sejarahnegeriterengganu' => $sejarahnegeriterengganu,
            'sejarahnegerisabah' => $sejarahnegerisabah,
            'sejarahnegerisarawak' => $sejarahnegerisarawak,
            'sejarahnegerikualalumpur' => $sejarahnegerikualalumpur,
            'sejarahnegerilabuan' => $sejarahnegerilabuan,
            'sejarahnegeriputrajaya' => $sejarahnegeriputrajaya,
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

            $senaraihitamjantinalelaki = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['jantina', '=', 'Lelaki']])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $senaraihitamjantinaperempuan = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['jantina', '=', 'Perempuan']])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();
        } else {

            $senaraihitamjantinalelaki = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['jantina', '=', 'Lelaki']])
                ->count();

            $senaraihitamjantinaperempuan = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['jantina', '=', 'Perempuan']])
                ->count();
        }

        //utk bil negeri
        if (($request->startdate && $request->enddate) != null) {

            $senaraihitamnegerijohor = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['negeri', '=', 'Johor']])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $senaraihitamnegerikedah = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['negeri', '=', 'Kedah']])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $senaraihitamnegerikelantan = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['negeri', '=', 'Kelantan']])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $senaraihitamnegerimelaka = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['negeri', '=', 'Melaka']])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $senaraihitamnegerinegerisembilan = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['negeri', '=', 'Negeri Sembilan']])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $senaraihitamnegeripahang = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['negeri', '=', 'Pahang']])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $senaraihitamnegeripulaupinang = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['negeri', '=', 'Pulau Pinang']])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $senaraihitamnegeriperak = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['negeri', '=', 'Perak']])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $senaraihitamnegeriperlis = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['negeri', '=', 'Perlis']])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $senaraihitamnegeriselangor = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['negeri', '=', 'Selangor']])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $senaraihitamnegeriterengganu = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['negeri', '=', 'Terengganu']])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $senaraihitamnegerisabah = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['negeri', '=', 'Sabah']])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $senaraihitamnegerisarawak = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['negeri', '=', 'Sarawak']])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $senaraihitamnegerikualalumpur = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['negeri', '=', 'WP Kuala Lumpur']])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $senaraihitamnegerilabuan = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['negeri', '=', 'WP Labuan']])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $senaraihitamnegeriputrajaya = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['negeri', '=', 'WP Putrajaya']])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();
        } else {

            $senaraihitamnegerijohor = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['negeri', '=', 'Johor']])
                ->count();

            $senaraihitamnegerikedah = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['negeri', '=', 'Kedah']])
                ->count();

            $senaraihitamnegerikelantan = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['negeri', '=', 'Kelantan']])
                ->count();

            $senaraihitamnegerimelaka = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['negeri', '=', 'Melaka']])
                ->count();

            $senaraihitamnegerinegerisembilan = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['negeri', '=', 'Negeri Sembilan']])
                ->count();

            $senaraihitamnegeripahang = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['negeri', '=', 'Pahang']])
                ->count();

            $senaraihitamnegeripulaupinang = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['negeri', '=', 'Pulau Pinang']])
                ->count();

            $senaraihitamnegeriperak = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['negeri', '=', 'Perak']])
                ->count();

            $senaraihitamnegeriperlis = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['negeri', '=', 'Perlis']])
                ->count();

            $senaraihitamnegeriselangor = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['negeri', '=', 'Selangor']])
                ->count();

            $senaraihitamnegeriterengganu = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['negeri', '=', 'Terengganu']])
                ->count();

            $senaraihitamnegerisabah = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['negeri', '=', 'Sabah']])
                ->count();

            $senaraihitamnegerisarawak = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['negeri', '=', 'Sarawak']])
                ->count();

            $senaraihitamnegerikualalumpur = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['negeri', '=', 'WP Kuala Lumpur']])
                ->count();

            $senaraihitamnegerilabuan = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['negeri', '=', 'WP Labuan']])
                ->count();

            $senaraihitamnegeriputrajaya = User::where([['status_permohonan', '=', 'disenarai_hitam'], ['role', '=', 'pemohon'], ['negeri', '=', 'WP Putrajaya']])
                ->count();
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
        $senhit = User::where('status_permohonan', '=', 'disenarai_hitam')
            ->select('jantina',  DB::raw('count(*) as jumlah'))
            ->whereYear('created_at', date('Y'))
            ->groupBy('jantina')
            ->get()->toArray();

        return view('laporan-statistik.laporan-senarai-hitam', [
            'senaraihitams' => $senaraihitam,
            'senarhits' => $arraynegeri,
            'sentam' => $senhit,
            'senaraihitamjantinalelakis' => $senaraihitamjantinalelaki,
            'senaraihitamjantinaperempuans' => $senaraihitamjantinaperempuan,
            'senaraihitamnegerijohor' => $senaraihitamnegerijohor,
            'senaraihitamnegerikedah' => $senaraihitamnegerikedah,
            'senaraihitamnegerikelantan' => $senaraihitamnegerikelantan,
            'senaraihitamnegerimelaka' => $senaraihitamnegerimelaka,
            'senaraihitamnegerinegerisembilan' => $senaraihitamnegerinegerisembilan,
            'senaraihitamnegeripahang' => $senaraihitamnegeripahang,
            'senaraihitamnegeripulaupinang' => $senaraihitamnegeripulaupinang,
            'senaraihitamnegeriperak' => $senaraihitamnegeriperak,
            'senaraihitamnegeriperlis' => $senaraihitamnegeriperlis,
            'senaraihitamnegeriselangor' => $senaraihitamnegeriselangor,
            'senaraihitamnegeriterengganu' => $senaraihitamnegeriterengganu,
            'senaraihitamnegerisabah' => $senaraihitamnegerisabah,
            'senaraihitamnegerisarawak' => $senaraihitamnegerisarawak,
            'senaraihitamnegerikualalumpur' => $senaraihitamnegerikualalumpur,
            'senaraihitamnegerilabuan' => $senaraihitamnegerilabuan,
            'senaraihitamnegeriputrajaya' => $senaraihitamnegeriputrajaya,
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

            $pegangpermitjantinalelaki = Permohonan::where([
                ['cetak_status', '=', '1'], ['jantina', '=', 'Lelaki']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $pegangpermitjantinaperempuan = Permohonan::where([
                ['cetak_status', '=', '1'], ['jantina', '=', 'Perempuan']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();
        } else {

            $pegangpermitjantinalelaki = Permohonan::where([
                ['cetak_status', '=', '1'], ['jantina', '=', 'Lelaki']
            ])
                ->count();

            $pegangpermitjantinaperempuan = Permohonan::where([
                ['cetak_status', '=', '1'], ['jantina', '=', 'Perempuan']
            ])
                ->count();
        }

        //utk bil negeri
        if (($request->startdate && $request->enddate) != null) {

            $pegangpermitnegerijohor = Permohonan::where([
                ['cetak_status', '=', '1'], ['negeri_kutipan_permit', '=', 'Johor']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $pegangpermitnegerikedah = Permohonan::where([
                ['cetak_status', '=', '1'], ['negeri_kutipan_permit', '=', 'Kedah']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $pegangpermitnegerikelantan = Permohonan::where([
                ['cetak_status', '=', '1'], ['negeri_kutipan_permit', '=', 'Kelantan']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $pegangpermitnegerimelaka = Permohonan::where([
                ['cetak_status', '=', '1'], ['negeri_kutipan_permit', '=', 'Melaka']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $pegangpermitnegerinegerisembilan = Permohonan::where([
                ['cetak_status', '=', '1'], ['negeri_kutipan_permit', '=', 'Negeri Sembilan']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $pegangpermitnegeripahang = Permohonan::where([
                ['cetak_status', '=', '1'], ['negeri_kutipan_permit', '=', 'Pahang']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $pegangpermitnegeripulaupinang = Permohonan::where([
                ['cetak_status', '=', '1'], ['negeri_kutipan_permit', '=', 'Pulau Pinang']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $pegangpermitnegeriperak = Permohonan::where([
                ['cetak_status', '=', '1'], ['negeri_kutipan_permit', '=', 'Perak']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $pegangpermitnegeriperlis = Permohonan::where([
                ['cetak_status', '=', '1'], ['negeri_kutipan_permit', '=', 'Perlis']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $pegangpermitnegeriselangor = Permohonan::where([
                ['cetak_status', '=', '1'], ['negeri_kutipan_permit', '=', 'Selangor']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $pegangpermitnegeriterengganu = Permohonan::where([
                ['cetak_status', '=', '1'], ['negeri_kutipan_permit', '=', 'Terengganu']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $pegangpermitnegerisabah = Permohonan::where([
                ['cetak_status', '=', '1'], ['negeri_kutipan_permit', '=', 'Sabah']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $pegangpermitnegerisarawak = Permohonan::where([
                ['cetak_status', '=', '1'], ['negeri_kutipan_permit', '=', 'Sarawak']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $pegangpermitnegerikualalumpur = Permohonan::where([
                ['cetak_status', '=', '1'], ['negeri_kutipan_permit', '=', 'WP Kuala Lumpur']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $pegangpermitnegerilabuan = Permohonan::where([
                ['cetak_status', '=', '1'], ['negeri_kutipan_permit', '=', 'WP Labuan']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();

            $pegangpermitnegeriputrajaya = Permohonan::where([
                ['cetak_status', '=', '1'], ['negeri_kutipan_permit', '=', 'WP Putrajaya']
            ])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->count();
        } else {

            $pegangpermitnegerijohor = Permohonan::where([
                ['cetak_status', '=', '1'], ['negeri_kutipan_permit', '=', 'Johor']
            ])
                ->count();

            $pegangpermitnegerikedah = Permohonan::where([
                ['cetak_status', '=', '1'], ['negeri_kutipan_permit', '=', 'Kedah']
            ])
                ->count();

            $pegangpermitnegerikelantan = Permohonan::where([
                ['cetak_status', '=', '1'], ['negeri_kutipan_permit', '=', 'Kelantan']
            ])
                ->count();

            $pegangpermitnegerimelaka = Permohonan::where([
                ['cetak_status', '=', '1'], ['negeri_kutipan_permit', '=', 'Melaka']
            ])
                ->count();

            $pegangpermitnegerinegerisembilan = Permohonan::where([
                ['cetak_status', '=', '1'], ['negeri_kutipan_permit', '=', 'Negeri Sembilan']
            ])
                ->count();

            $pegangpermitnegeripahang = Permohonan::where([
                ['cetak_status', '=', '1'], ['negeri_kutipan_permit', '=', 'Pahang']
            ])
                ->count();

            $pegangpermitnegeripulaupinang = Permohonan::where([
                ['cetak_status', '=', '1'], ['negeri_kutipan_permit', '=', 'Pulau Pinang']
            ])
                ->count();

            $pegangpermitnegeriperak = Permohonan::where([
                ['cetak_status', '=', '1'], ['negeri_kutipan_permit', '=', 'Perak']
            ])
                ->count();

            $pegangpermitnegeriperlis = Permohonan::where([
                ['cetak_status', '=', '1'], ['negeri_kutipan_permit', '=', 'Perlis']
            ])
                ->count();

            $pegangpermitnegeriselangor = Permohonan::where([
                ['cetak_status', '=', '1'], ['negeri_kutipan_permit', '=', 'Selangor']
            ])
                ->count();

            $pegangpermitnegeriterengganu = Permohonan::where([
                ['cetak_status', '=', '1'], ['negeri_kutipan_permit', '=', 'Terengganu']
            ])
                ->count();

            $pegangpermitnegerisabah = Permohonan::where([
                ['cetak_status', '=', '1'], ['negeri_kutipan_permit', '=', 'Sabah']
            ])
                ->count();

            $pegangpermitnegerisarawak = Permohonan::where([
                ['cetak_status', '=', '1'], ['negeri_kutipan_permit', '=', 'Sarawak']
            ])
                ->count();

            $pegangpermitnegerikualalumpur = Permohonan::where([
                ['cetak_status', '=', '1'], ['negeri_kutipan_permit', '=', 'WP Kuala Lumpur']
            ])
                ->count();

            $pegangpermitnegerilabuan = Permohonan::where([
                ['cetak_status', '=', '1'], ['negeri_kutipan_permit', '=', 'WP Labuan']
            ])
                ->count();

            $pegangpermitnegeriputrajaya = Permohonan::where([
                ['cetak_status', '=', '1'], ['negeri_kutipan_permit', '=', 'WP Putrajaya']
            ])
                ->count();
        }

        //graf negeri
        $peggpermit = DB::table('permohonans')
            ->where('cetak_status', '=', '1')
            ->select(DB::raw("CONCAT_WS('-',MONTHNAME(created_at),YEAR(created_at)) as monthname"), 'negeri_kutipan_permit', DB::raw('count(*) as jumlah'))
            ->whereYear('created_at', date('Y'))
            ->groupBy('monthname', 'negeri_kutipan_permit')
            ->orderBy('monthname')
            ->get();

        $arraynegeri = [];
        foreach ($peggpermit as $peggpermits) {
            $arraynegeri[] = ['monthname' => $peggpermits->monthname, $peggpermits->negeri_kutipan_permit => $peggpermits->jumlah];
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
            'pegangpermitjantinalelakis' => $pegangpermitjantinalelaki,
            'pegangpermitjantinaperempuans' => $pegangpermitjantinaperempuan,
            'pegangpermitnegerijohor' => $pegangpermitnegerijohor,
            'pegangpermitnegerikedah' => $pegangpermitnegerikedah,
            'pegangpermitnegerikelantan' => $pegangpermitnegerikelantan,
            'pegangpermitnegerimelaka' => $pegangpermitnegerimelaka,
            'pegangpermitnegerinegerisembilan' => $pegangpermitnegerinegerisembilan,
            'pegangpermitnegeripahang' => $pegangpermitnegeripahang,
            'pegangpermitnegeripulaupinang' => $pegangpermitnegeripulaupinang,
            'pegangpermitnegeriperak' => $pegangpermitnegeriperak,
            'pegangpermitnegeriperlis' => $pegangpermitnegeriperlis,
            'pegangpermitnegeriselangor' => $pegangpermitnegeriselangor,
            'pegangpermitnegeriterengganu' => $pegangpermitnegeriterengganu,
            'pegangpermitnegerisabah' => $pegangpermitnegerisabah,
            'pegangpermitnegerisarawak' => $pegangpermitnegerisarawak,
            'pegangpermitnegerikualalumpur' => $pegangpermitnegerikualalumpur,
            'pegangpermitnegerilabuan' => $pegangpermitnegerilabuan,
            'pegangpermitnegeriputrajaya' => $pegangpermitnegeriputrajaya,
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
                ->where('bayaran_fi', '!=', null)
                ->get();
        } else {
            $kutipanfi = Permohonan::where('bayaran_fi', '!=', null)
                ->get();
        }

        //utk bil jantina
        if (($request->startdate && $request->enddate) != null) {

            $kutipanfijantinalelaki = Permohonan::where([['jantina', '=', 'Lelaki'], ['bayaran_fi', '!=', null]])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->sum('bayaran_fi');

            $kutipanfijantinaperempuan = Permohonan::where([['jantina', '=', 'Perempuan'], ['bayaran_fi', '!=', null]])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->sum('bayaran_fi');
        } else {

            $kutipanfijantinalelaki = Permohonan::where([['jantina', '=', 'Lelaki'], ['bayaran_fi', '!=', null]])
                ->sum('bayaran_fi');

            $kutipanfijantinaperempuan = Permohonan::where([['jantina', '=', 'Perempuan'], ['bayaran_fi', '!=', null]])
                ->sum('bayaran_fi');
        }

        //utk bil negeri
        if (($request->startdate && $request->enddate) != null) {

            $kutipanfinegerijohor = Permohonan::where([['negeri_kutipan_permit', '=', 'Johor'], ['bayaran_fi', '!=', null]])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->sum('bayaran_fi');

            $kutipanfinegerikedah = Permohonan::where([['negeri_kutipan_permit', '=', 'Kedah'], ['bayaran_fi', '!=', null]])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->sum('bayaran_fi');

            $kutipanfinegerikelantan = Permohonan::where([['negeri_kutipan_permit', '=', 'Kelantan'], ['bayaran_fi', '!=', null]])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->sum('bayaran_fi');

            $kutipanfinegerimelaka = Permohonan::where([['negeri_kutipan_permit', '=', 'Melaka'], ['bayaran_fi', '!=', null]])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->sum('bayaran_fi');

            $kutipanfinegerinegerisembilan = Permohonan::where([['negeri_kutipan_permit', '=', 'Negeri Sembilan'], ['bayaran_fi', '!=', null]])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->sum('bayaran_fi');

            $kutipanfinegeripahang = Permohonan::where([['negeri_kutipan_permit', '=', 'Pahang'], ['bayaran_fi', '!=', null]])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->sum('bayaran_fi');

            $kutipanfinegeripulaupinang = Permohonan::where([['negeri_kutipan_permit', 'Pulau Pinang'], ['bayaran_fi', '!=', null]])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->sum('bayaran_fi');

            $kutipanfinegeriperak = Permohonan::where([['negeri_kutipan_permit', 'Perak'], ['bayaran_fi', '!=', null]])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->sum('bayaran_fi');

            $kutipanfinegeriperlis = Permohonan::where([['negeri_kutipan_permit', 'Perlis'], ['bayaran_fi', '!=', null]])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->sum('bayaran_fi');

            $kutipanfinegeriselangor = Permohonan::where([['negeri_kutipan_permit', 'Selangor'], ['bayaran_fi', '!=', null]])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->sum('bayaran_fi');

            $kutipanfinegeriterengganu = Permohonan::where([['negeri_kutipan_permit', 'Terengganu'], ['bayaran_fi', '!=', null]])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->sum('bayaran_fi');

            $kutipanfinegerisabah = Permohonan::where([['negeri_kutipan_permit', 'Sabah'], ['bayaran_fi', '!=', null]])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->sum('bayaran_fi');

            $kutipanfinegerisarawak = Permohonan::where([['negeri_kutipan_permit', 'Sarawak'], ['bayaran_fi', '!=', null]])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->sum('bayaran_fi');

            $kutipanfinegerikualalumpur = Permohonan::where([['negeri_kutipan_permit', 'WP Kuala Lumpur'], ['bayaran_fi', '!=', null]])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->sum('bayaran_fi');

            $kutipanfinegerilabuan = Permohonan::where([['negeri_kutipan_permit', 'WP Labuan'], ['bayaran_fi', '!=', null]])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->sum('bayaran_fi');

            $kutipanfinegeriputrajaya = Permohonan::where([['negeri_kutipan_permit', 'WP Putrajaya'], ['bayaran_fi', '!=', null]])
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->sum('bayaran_fi');
        } else {

            $kutipanfinegerijohor = Permohonan::where([['negeri_kutipan_permit', '=', 'Johor'], ['bayaran_fi', '!=', null]])
                ->sum('bayaran_fi');

            $kutipanfinegerikedah = Permohonan::where([['negeri_kutipan_permit', '=', 'Kedah'], ['bayaran_fi', '!=', null]])
                ->sum('bayaran_fi');

            $kutipanfinegerikelantan = Permohonan::where([['negeri_kutipan_permit', '=', 'Kelantan'], ['bayaran_fi', '!=', null]])
                ->sum('bayaran_fi');

            $kutipanfinegerimelaka = Permohonan::where([['negeri_kutipan_permit', '=', 'Melaka'], ['bayaran_fi', '!=', null]])
                ->sum('bayaran_fi');

            $kutipanfinegerinegerisembilan = Permohonan::where([['negeri_kutipan_permit', '=', 'Negeri Sembilan'], ['bayaran_fi', '!=', null]])
                ->sum('bayaran_fi');

            $kutipanfinegeripahang = Permohonan::where([['negeri_kutipan_permit', '=', 'Pahang'], ['bayaran_fi', '!=', null]])
                ->sum('bayaran_fi');

            $kutipanfinegeripulaupinang = Permohonan::where([['negeri_kutipan_permit', 'Pulau Pinang'], ['bayaran_fi', '!=', null]])
                ->sum('bayaran_fi');

            $kutipanfinegeriperak = Permohonan::where([['negeri_kutipan_permit', 'Perak'], ['bayaran_fi', '!=', null]])
                ->sum('bayaran_fi');

            $kutipanfinegeriperlis = Permohonan::where([['negeri_kutipan_permit', 'Perlis'], ['bayaran_fi', '!=', null]])
                ->sum('bayaran_fi');

            $kutipanfinegeriselangor = Permohonan::where([['negeri_kutipan_permit', 'Selangor'], ['bayaran_fi', '!=', null]])
                ->sum('bayaran_fi');

            $kutipanfinegeriterengganu = Permohonan::where([['negeri_kutipan_permit', 'Terengganu'], ['bayaran_fi', '!=', null]])
                ->sum('bayaran_fi');

            $kutipanfinegerisabah = Permohonan::where([['negeri_kutipan_permit', 'Sabah'], ['bayaran_fi', '!=', null]])
                ->sum('bayaran_fi');

            $kutipanfinegerisarawak = Permohonan::where([['negeri_kutipan_permit', 'Sarawak'], ['bayaran_fi', '!=', null]])
                ->sum('bayaran_fi');

            $kutipanfinegerikualalumpur = Permohonan::where([['negeri_kutipan_permit', 'WP Kuala Lumpur'], ['bayaran_fi', '!=', null]])
                ->sum('bayaran_fi');

            $kutipanfinegerilabuan = Permohonan::where([['negeri_kutipan_permit', 'WP Labuan'], ['bayaran_fi', '!=', null]])
                ->sum('bayaran_fi');

            $kutipanfinegeriputrajaya = Permohonan::where([['negeri_kutipan_permit', 'WP Putrajaya'], ['bayaran_fi', '!=', null]])
                ->sum('bayaran_fi');
        }

        //graf negeri
        $kutipan = DB::table('permohonans')
            ->where('bayaran_fi', '!=', null)
            ->select(DB::raw("CONCAT_WS('-',MONTHNAME(created_at),YEAR(created_at)) as monthname"), 'negeri_kutipan_permit', DB::raw('sum(bayaran_fi) as jumlah'))
            ->whereYear('created_at', date('Y'))
            ->groupBy('monthname', 'negeri_kutipan_permit')
            ->orderBy('monthname')
            ->get();

        $arraynegeri = [];
        foreach ($kutipan as $kutipans) {
            $arraynegeri[] = ['monthname' => $kutipans->monthname, $kutipans->negeri_kutipan_permit => $kutipans->jumlah];
        }

        //graf jantina
        $kutipfis = DB::table('permohonans')
            ->where('bayaran_fi', '!=', null)
            ->whereYear('created_at', date('Y'))
            ->select('jantina', DB::raw('sum(bayaran_fi) as jumlah'))
            ->groupBy('jantina')
            ->get();

        return view('laporan-statistik.statistik-kutipan-fi', [
            'kutipanfis' => $kutipanfi,
            'kutipfis' => $arraynegeri,
            'kutips' => $kutipfis,
            'kutipanfijantinalelakis' => $kutipanfijantinalelaki,
            'kutipanfijantinaperempuans' => $kutipanfijantinaperempuan,
            'kutipanfinegerijohor' => $kutipanfinegerijohor,
            'kutipanfinegerikedah' => $kutipanfinegerikedah,
            'kutipanfinegerikelantan' => $kutipanfinegerikelantan,
            'kutipanfinegerimelaka' => $kutipanfinegerimelaka,
            'kutipanfinegerinegerisembilan' => $kutipanfinegerinegerisembilan,
            'kutipanfinegeripahang' => $kutipanfinegeripahang,
            'kutipanfinegeripulaupinang' => $kutipanfinegeripulaupinang,
            'kutipanfinegeriperak' => $kutipanfinegeriperak,
            'kutipanfinegeriperlis' => $kutipanfinegeriperlis,
            'kutipanfinegeriselangor' => $kutipanfinegeriselangor,
            'kutipanfinegeriterengganu' => $kutipanfinegeriterengganu,
            'kutipanfinegerisabah' => $kutipanfinegerisabah,
            'kutipanfinegerisarawak' => $kutipanfinegerisarawak,
            'kutipanfinegerikualalumpur' => $kutipanfinegerikualalumpur,
            'kutipanfinegerilabuan' => $kutipanfinegerilabuan,
            'kutipanfinegeriputrajaya' => $kutipanfinegeriputrajaya,
        ]);
    }
}
