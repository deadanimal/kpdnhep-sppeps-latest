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
        $kelulusan = Permohonan::where('status_permohonan', 'Diluluskan')->get();

        // if ($request) {
        $start = Carbon::parse($request->startdate)->format('Y-m-d');
        $end = Carbon::parse($request->enddate)->format('Y-m-d');
        // }

        $year_start = Carbon::parse($request->startdate)->format('Y');
        $year_end = Carbon::parse($request->enddate)->format('Y');

        $years = [];
        if ($year_start == $year_end) {
            array_push($years, $year_start);
        } else {
            $int_start = (int)$year_start;
            $int_end = (int)$year_end;
            $range = $int_end - $int_start;
            for ($i = 0; $i <= $range; $i++) {
                array_push($years, $int_start);
                $int_start++;
            }
        }

        if (($request->startdate && $request->enddate) != null) {
            $mohons = Permohonan::where('status_permohonan', 'Diluluskan')
                ->whereBetween('created_at', [$start, $end])
                ->select('negeri', DB::raw('YEAR(created_at) year'), DB::raw('count(*) as total'))
                ->groupBy('negeri', DB::raw('YEAR(created_at)'))
                ->orderBy('year', 'desc')
                ->get();
        } else {
            $mohons = Permohonan::where('status_permohonan', 'Diluluskan')
                // ->whereBetween('created_at', [$start, $end])
                ->select('negeri', DB::raw('YEAR(created_at) year'), DB::raw('count(*) as total'))
                ->groupBy('negeri', DB::raw('YEAR(created_at)'))
                ->orderBy('year', 'desc')
                ->get();
        }

        foreach ($years as $year) {
            $arr1 = [];
            $arr1['year'] = $year;
            foreach ($mohons as $m) {
                if ($year == $m->year)
                    $arr1[$m->negeri] = $m->total;
            }
            $arrays1[] = $arr1;
        }

        $kel = Permohonan::where('status_permohonan', 'Diluluskan')
            // ->whereBetween('created_at', [$start, $end])
            // ->select('jantina', DB::raw('YEAR(created_at) year'), DB::raw('count(*) as total'))
            // ->groupBy('jantina', DB::raw('YEAR(created_at)'))
            ->select('jantina',  DB::raw('count(*) as total'))
            ->groupBy('jantina')
            ->get()->toArray();

        return view('laporan-statistik.peratusan-kelulusan-permit', [
            'kelulusans' => $kelulusan,
            'kelulus' => $arrays1,
            'klels' => $kel,
        ]);
    }

    public function permitditolak(Request $request)
    {
        $penolakan = Permohonan::where('status_permohonan', 'Tidak Diluluskan')->get();

        $start = Carbon::parse($request->startdate)->format('Y-m-d');
        $end = Carbon::parse($request->enddate)->format('Y-m-d');

        $year_start = Carbon::parse($request->startdate)->format('Y');
        $year_end = Carbon::parse($request->enddate)->format('Y');

        $years = [];
        if ($year_start == $year_end) {
            array_push($years, $year_start);
        } else {
            $int_start = (int)$year_start;
            $int_end = (int)$year_end;
            $range = $int_end - $int_start;
            for ($i = 0; $i <= $range; $i++) {
                array_push($years, $int_start);
                $int_start++;
            }
        }

        if (($request->startdate && $request->enddate) != null) {
            $tolaks = Permohonan::where('status_permohonan', 'Tidak Diluluskan')
                ->whereBetween('created_at', [$start, $end])
                ->select('negeri', DB::raw('YEAR(created_at) year'), DB::raw('count(*) as total'))
                ->groupBy('negeri', DB::raw('YEAR(created_at)'))
                ->orderBy('year', 'desc')
                ->get();
        } else {
            $tolaks = Permohonan::where('status_permohonan', 'Tidak Diluluskan')
                ->select('negeri', DB::raw('YEAR(created_at) year'), DB::raw('count(*) as total'))
                ->groupBy('negeri', DB::raw('YEAR(created_at)'))
                ->orderBy('year', 'desc')
                ->get();
        }

        foreach ($years as $year) {
            $arr1 = [];
            $arr1['year'] = $year;
            foreach ($tolaks as $m) {
                if ($year == $m->year)
                    $arr1[$m->negeri] = $m->total;
            }
            $arrays1[] = $arr1;
        }

        $tol = Permohonan::where('status_permohonan', 'Diluluskan')
            ->select('jantina',  DB::raw('count(*) as total'))
            ->groupBy('jantina')
            ->get()->toArray();

        return view('laporan-statistik.peratusan-permit-ditolak', [
            'penolakans' => $penolakan,
            'penolaks' => $arrays1,
            'penollaks' => $tol,
        ]);
    }

    public function sejarahpermohonan(Request $request)
    {
        $sejarah = Permohonan::all();

        $start = Carbon::parse($request->startdate)->format('Y-m-d');
        $end = Carbon::parse($request->enddate)->format('Y-m-d');

        $year_start = Carbon::parse($request->startdate)->format('Y');
        $year_end = Carbon::parse($request->enddate)->format('Y');

        $years = [];
        if ($year_start == $year_end) {
            array_push($years, $year_start);
        } else {
            $int_start = (int)$year_start;
            $int_end = (int)$year_end;
            $range = $int_end - $int_start;
            for ($i = 0; $i <= $range; $i++) {
                array_push($years, $int_start);
                $int_start++;
            }
        }

        if (($request->startdate && $request->enddate) != null) {
            $sejar = DB::table('permohonans')
                ->whereBetween('created_at', [$start, $end])
                ->select('negeri', DB::raw('YEAR(created_at) year'), DB::raw('count(*) as total'))
                ->groupBy('negeri', DB::raw('YEAR(created_at)'))
                ->orderBy('year', 'desc')
                ->get();
        } else {
            $sejar = DB::table('permohonans')
                ->select('negeri', DB::raw('YEAR(created_at) year'), DB::raw('count(*) as total'))
                ->groupBy('negeri', DB::raw('YEAR(created_at)'))
                ->orderBy('year', 'desc')
                ->get();
        }

        foreach ($years as $year) {
            $arr1 = [];
            $arr1['year'] = $year;
            foreach ($sejar as $m) {
                if ($year == $m->year)
                    $arr1[$m->negeri] = $m->total;
            }
            $arrays1[] = $arr1;
        }

        $sej = DB::table('permohonans')
            ->select('jantina',  DB::raw('count(*) as total'))
            ->groupBy('jantina')
            ->get()->toArray();

        return view('laporan-statistik.laporan-sejarah-permohonan', [
            'sejarahs' => $sejarah,
            'sejahs' => $arrays1,
            'sejs' => $sej,
        ]);
    }

    public function senaraihitam(Request $request)
    {

        $senaraihitam = User::where([
            ['status_permohonan', '=', 'disenarai_hitam'],
            ['role', '=', 'pemohon']
        ])->get();

        $start = Carbon::parse($request->startdate)->format('Y-m-d');
        $end = Carbon::parse($request->enddate)->format('Y-m-d');

        $year_start = Carbon::parse($request->startdate)->format('Y');
        $year_end = Carbon::parse($request->enddate)->format('Y');

        $years = [];
        if ($year_start == $year_end) {
            array_push($years, $year_start);
        } else {
            $int_start = (int)$year_start;
            $int_end = (int)$year_end;
            $range = $int_end - $int_start;
            for ($i = 0; $i <= $range; $i++) {
                array_push($years, $int_start);
                $int_start++;
            }
        }

        if (($request->startdate && $request->enddate) != null) {
            $senaraihits = User::where([
                ['status_permohonan', '=', 'disenarai_hitam'],
                ['role', '=', 'pemohon']
            ])
                ->whereBetween('created_at', [$start, $end])
                ->select('negeri', DB::raw('YEAR(created_at) year'), DB::raw('count(*) as total'))
                ->groupBy('negeri', DB::raw('YEAR(created_at)'))
                ->orderBy('year', 'desc')
                ->get();
        } else {
            $senaraihits = User::where('status_permohonan', 'disenarai_hitam')
                ->select('negeri', DB::raw('YEAR(created_at) year'), DB::raw('count(*) as total'))
                ->groupBy('negeri', DB::raw('YEAR(created_at)'))
                ->orderBy('year', 'desc')
                ->get();
        }

        foreach ($years as $year) {
            $arr1 = [];
            $arr1['year'] = $year;
            foreach ($senaraihits as $m) {
                if ($year == $m->year)
                    $arr1[$m->negeri] = $m->total;
            }
            $arrays1[] = $arr1;
        }

        $senhit = User::where('status_permohonan', 'disenarai_hitam')
            ->select('jantina',  DB::raw('count(*) as total'))
            ->groupBy('jantina')
            ->get()->toArray();

        return view('laporan-statistik.laporan-senarai-hitam', [
            'senaraihitams' => $senaraihitam,
            'senarhits' => $arrays1,
            'sentam' => $senhit,
        ]);
    }

    public function pegangpermit(Request $request)
    {

        $pegangpermit = Permohonan::all();

        $start = Carbon::parse($request->startdate)->format('Y-m-d');
        $end = Carbon::parse($request->enddate)->format('Y-m-d');

        $year_start = Carbon::parse($request->startdate)->format('Y');
        $year_end = Carbon::parse($request->enddate)->format('Y');

        $years = [];
        if ($year_start == $year_end) {
            array_push($years, $year_start);
        } else {
            $int_start = (int)$year_start;
            $int_end = (int)$year_end;
            $range = $int_end - $int_start;
            for ($i = 0; $i <= $range; $i++) {
                array_push($years, $int_start);
                $int_start++;
            }
        }

        if (($request->startdate && $request->enddate) != null) {
            $peggpermit = DB::table('permohonans')
                ->where('cetak_status', '=', 1)
                ->whereBetween('created_at', [$start, $end])
                ->select('negeri', DB::raw('YEAR(created_at) year'), DB::raw('count(*) as total'))
                ->groupBy('negeri', DB::raw('YEAR(created_at)'))
                ->orderBy('year', 'desc')
                ->get();
        } else {
            $peggpermit = DB::table('permohonans')
                ->where('cetak_status', '=', '1')
                ->select('negeri', DB::raw('YEAR(created_at) year'), DB::raw('count(*) as total'))
                ->groupBy('negeri', DB::raw('YEAR(created_at)'))
                ->orderBy('year', 'desc')
                ->get();
        }

        foreach ($years as $year) {
            $arr1 = [];
            $arr1['year'] = $year;
            foreach ($peggpermit as $m) {
                if ($year == $m->year)
                    $arr1[$m->negeri] = $m->total;
            }
            $arrays1[] = $arr1;
        }

        $pegpermits = DB::table('permohonans')
            ->select('jantina',  DB::raw('count(*) as total'))
            ->groupBy('jantina')
            ->get()->toArray();

        return view('laporan-statistik.statistik-pemegang-permit', [
            'pegangpermits' => $pegangpermit,
            'pegapermit' => $arrays1,
            'pegpermit' => $pegpermits,
        ]);
    }

    public function kutipanfi(Request $request)
    {

        $kutipanfi = Permohonan::all();

        $start = Carbon::parse($request->startdate)->format('Y-m-d');
        $end = Carbon::parse($request->enddate)->format('Y-m-d');

        $year_start = Carbon::parse($request->startdate)->format('Y');
        $year_end = Carbon::parse($request->enddate)->format('Y');

        $years = [];
        if ($year_start == $year_end) {
            array_push($years, $year_start);
        } else {
            $int_start = (int)$year_start;
            $int_end = (int)$year_end;
            $range = $int_end - $int_start;
            for ($i = 0; $i <= $range; $i++) {
                array_push($years, $int_start);
                $int_start++;
            }
        }

        if (($request->startdate && $request->enddate) != null) {
            $kutipan = DB::table('permohonans')
                ->whereBetween('created_at', [$start, $end])
                ->select('negeri', DB::raw('YEAR(created_at) year'), DB::raw('sum(bayaran_fi) as total'))
                ->groupBy('negeri', DB::raw('YEAR(created_at)'))
                ->orderBy('year', 'desc')
                ->get();
        } else {
            $kutipan = DB::table('permohonans')
                ->select('negeri', DB::raw('YEAR(created_at) year'), DB::raw('sum(bayaran_fi) as total'))
                ->groupBy('negeri', DB::raw('YEAR(created_at)'))
                ->orderBy('year', 'desc')
                ->get();
        }

        foreach ($years as $year) {
            $arr1 = [];
            $arr1['year'] = $year;
            foreach ($kutipan as $m) {
                if ($year == $m->year)
                    $arr1[$m->negeri] = $m->total;
            }
            $arrays1[] = $arr1;
        }

        $kutipfis = DB::table('permohonans')
            ->select('jantina',  DB::raw('count(*) as total'))
            ->groupBy('jantina')
            ->get()->toArray();

        return view('laporan-statistik.statistik-kutipan-fi', [
            'kutipanfis' => $kutipanfi,
            'kutipfis' => $arrays1,
            'kutips' => $kutipfis,
        ]);
    }
}
