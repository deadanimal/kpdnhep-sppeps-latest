<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanstatistikController extends Controller
{
    public function kelulusanpermit()
    {
        $kelulusan = Permohonan::where('status_permohonan', 'Diluluskan')->get();

        // $mohons = DB::table('Permohonans')
        $mohons = Permohonan::where('status_permohonan', 'Diluluskan')
            ->select('negeri', DB::raw('YEAR(created_at) year'), DB::raw('count(*) as total'))
            ->groupBy('negeri', DB::raw('YEAR(created_at)'))
            ->orderBy('year', 'desc')
            ->get();

        $years = ['2021', '2020'];

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
            ->select('jantina', DB::raw('YEAR(created_at) year, MONTH(created_at) month'), DB::raw('count(*) as total'))
            ->groupBy('jantina', DB::raw('MONTH(created_at), YEAR(created_at)'))
            ->get();

        $years = ['2021'];
        $months = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];

        // if ($year == '2021') {
        foreach ($months as $mon) {
            $arr2 = [];
            $arr2['month'] = $mon;
            foreach ($kel as $k) {
                if ($mon == $k->month)
                    $arr2[$k->jantina] = $k->total;
            }
            $arrays2[] = $arr2;
        }
        // }

        return view('laporan-statistik.peratusan-kelulusan-permit', [
            'kelulusans' => $kelulusan,
            'kelulus' => $arrays1,
            'klulusass' => $arrays2,
        ]);
    }

    public function permitditolak()
    {
        $penolakan = Permohonan::where('status_permohonan', 'Tidak Diluluskan')->get();

        $tolaks = Permohonan::where('status_permohonan', 'Tidak Diluluskan')
            ->select('negeri', DB::raw('YEAR(created_at) year'), DB::raw('count(*) as total'))
            ->groupBy('negeri', DB::raw('YEAR(created_at)'))
            ->orderBy('year', 'desc')
            ->get();

        $years = ['2021', '2020'];

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
            ->select('jantina', DB::raw('YEAR(created_at) year, MONTH(created_at) month'), DB::raw('count(*) as total'))
            ->groupBy('jantina', DB::raw('MONTH(created_at), YEAR(created_at)'))
            ->get();

        $years = ['2021'];
        $months = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];

        // if ($year == '2021') {
        foreach ($months as $mon) {
            $arr2 = [];
            $arr2['month'] = $mon;
            foreach ($tol as $k) {
                if ($mon == $k->month)
                    $arr2[$k->jantina] = $k->total;
            }
            $arrays2[] = $arr2;
        }
        // }

        // dd($penolakan);
        return view('laporan-statistik.peratusan-permit-ditolak', [
            'penolakans' => $penolakan,
            'penolaks' => $arrays1,
            'penollaks' => $arrays2,
        ]);
    }

    public function sejarahpermohonan()
    {
        $sejarah = Permohonan::all();

        $sejar = DB::table('Permohonans')
            ->select('negeri', DB::raw('YEAR(created_at) year'), 'status_permohonan', DB::raw('count(*) as total'))
            ->groupBy('negeri', DB::raw('YEAR(created_at)'), 'status_permohonan')
            ->orderBy('year', 'desc')
            ->get();

        $years = ['2021', '2020'];

        foreach ($years as $year) {
            $arr1 = [];
            $arr1['year'] = $year;
            foreach ($sejar as $m) {
                if ($year == $m->year)
                    $arr1[$m->negeri] = $m->total;
            }
            $arrays1[] = $arr1;
        }

        $sej = DB::table('Permohonans')
            ->select('jantina', DB::raw('YEAR(created_at) year, MONTH(created_at) month'), DB::raw('count(*) as total'))
            ->groupBy('jantina', DB::raw('MONTH(created_at), YEAR(created_at)'))
            ->get();

        $years = ['2021'];
        $months = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];

        // if ($year == '2021') {
        foreach ($months as $mon) {
            $arr2 = [];
            $arr2['month'] = $mon;
            foreach ($sej as $k) {
                if ($mon == $k->month)
                    $arr2[$k->jantina] = $k->total;
            }
            $arrays2[] = $arr2;
        }
        // }
        return view('laporan-statistik.laporan-sejarah-permohonan', [
            'sejarahs' => $sejarah,
            'sejahs' => $arrays1,
            'sejs' => $arrays2,
        ]);
    }

    public function senaraihitam()
    {

        $senaraihitam = Permohonan::all();

        $senaraihits = Permohonan::where('status_permohonan', 'disenarai hitam')
            ->select('negeri', DB::raw('YEAR(created_at) year'), DB::raw('count(*) as total'))
            ->groupBy('negeri', DB::raw('YEAR(created_at)'))
            ->orderBy('year', 'desc')
            ->get();

        $years = ['2021', '2020'];

        foreach ($years as $year) {
            $arr1 = [];
            $arr1['year'] = $year;
            foreach ($senaraihits as $m) {
                if ($year == $m->year)
                    $arr1[$m->negeri] = $m->total;
            }
            $arrays1[] = $arr1;
        }

        $senhit = Permohonan::where('status_permohonan', 'disenarai hitam')
            ->select('jantina', DB::raw('YEAR(created_at) year, MONTH(created_at) month'), DB::raw('count(*) as total'))
            ->groupBy('jantina', DB::raw('MONTH(created_at), YEAR(created_at)'))
            ->get();

        $years = ['2021'];
        $months = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];

        // if ($year == '2021') {
        foreach ($months as $mon) {
            $arr2 = [];
            $arr2['month'] = $mon;
            foreach ($senhit as $k) {
                if ($mon == $k->month)
                    $arr2[$k->jantina] = $k->total;
            }
            $arrays2[] = $arr2;
        }
        // }

        return view('laporan-statistik.laporan-senarai-hitam', [
            'senaraihitams' => $senaraihitam,
            'senarhits' => $arrays1,
            'sentam' => $arrays2,
        ]);
    }

    public function pegangpermit()
    {

        $pegangpermit = Permohonan::all();

        $pegangpermit = DB::table('Permohonans')
            ->select('negeri', DB::raw('YEAR(created_at) year'), DB::raw('count(*) as total'))
            ->groupBy('negeri', DB::raw('YEAR(created_at)'))
            ->orderBy('year', 'desc')
            ->get();

        $years = ['2021', '2020'];

        foreach ($years as $year) {
            $arr1 = [];
            $arr1['year'] = $year;
            foreach ($pegangpermit as $m) {
                if ($year == $m->year)
                    $arr1[$m->negeri] = $m->total;
            }
            $arrays1[] = $arr1;
        }

        $pegpermit = DB::table('Permohonans')
            ->select('jantina', DB::raw('YEAR(created_at) year, MONTH(created_at) month'), DB::raw('count(*) as total'))
            ->groupBy('jantina', DB::raw('MONTH(created_at), YEAR(created_at)'))
            ->get();

        $years = ['2021'];
        $months = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];

        // if ($year == '2021') {
        foreach ($months as $mon) {
            $arr2 = [];
            $arr2['month'] = $mon;
            foreach ($pegpermit as $k) {
                if ($mon == $k->month)
                    $arr2[$k->jantina] = $k->total;
            }
            $arrays2[] = $arr2;
        }
        // }

        return view('laporan-statistik.statistik-pemegang-permit', [
            'pegangpermits' => $pegangpermit,
            'pegangpermit' => $arrays1,
            'pegpermit' => $arrays2,
        ]);
    }

    public function kutipanfi()
    {

        $kutipanfi = Permohonan::all();

        $kutipanfi = DB::table('Permohonans')
            ->select('negeri', DB::raw('YEAR(created_at) year'), DB::raw('count(*) as total'))
            ->groupBy('negeri', DB::raw('YEAR(created_at)'))
            ->orderBy('year', 'desc')
            ->get();

        $years = ['2021', '2020'];

        foreach ($years as $year) {
            $arr1 = [];
            $arr1['year'] = $year;
            foreach ($kutipanfi as $m) {
                if ($year == $m->year)
                    $arr1[$m->negeri] = $m->total;
            }
            $arrays1[] = $arr1;
        }

        $kutipfis = DB::table('Permohonans')
            ->select('jantina', DB::raw('YEAR(created_at) year, MONTH(created_at) month'), DB::raw('count(*) as total'))
            ->groupBy('jantina', DB::raw('MONTH(created_at), YEAR(created_at)'))
            ->get();

        $years = ['2021'];
        $months = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];

        // if ($year == '2021') {
        foreach ($months as $mon) {
            $arr2 = [];
            $arr2['month'] = $mon;
            foreach ($kutipfis as $k) {
                if ($mon == $k->month)
                    $arr2[$k->jantina] = $k->total;
            }
            $arrays2[] = $arr2;
        }
        // }

        return view('laporan-statistik.statistik-kutipan-fi', [
            'kutipanfis' => $kutipanfi,
            'kutipfis' => $arrays1,
            'kutips' => $arrays2,
        ]);
    }
}
