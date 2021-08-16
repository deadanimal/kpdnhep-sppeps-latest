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

        // dd($penolakan);
        return view('laporan-statistik.peratusan-permit-ditolak', [
            'penolakans' => $penolakan,
        ]);
    }

    public function sejarahpermohonan()
    {
        $sejarah = Permohonan::all();

        return view('laporan-statistik.laporan-sejarah-permohonan', [
            'sejarahs' => $sejarah,
        ]);
    }

    public function senaraihitam()
    {

        $senaraihitam = Permohonan::all();

        return view('laporan-statistik.laporan-senarai-hitam', [
            'senaraihitams' => $senaraihitam,
        ]);
    }

    public function pegangpermit()
    {

        $pegangpermit = Permohonan::all();

        return view('laporan-statistik.statistik-pemegang-permit', [
            'pegangpermits' => $pegangpermit,
        ]);
    }

    public function kutipanfi()
    {

        $kutipanfi = Permohonan::all();

        return view('laporan-statistik.statistik-kutipan-fi', [
            'kutipanfis' => $kutipanfi,
        ]);
    }
}
