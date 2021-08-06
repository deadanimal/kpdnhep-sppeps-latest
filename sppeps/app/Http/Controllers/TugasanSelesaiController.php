<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;

class TugasanSelesaiController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $user_role = $user->role;

        if ($user_role == 'pegawai_negeri') {
            $permohonan = Permohonan::whereIn('status_permohonan', ['Permohonan Lengkap', 'Permohonan Tidak Lengkap', 'disemak pdrm', 'Disokong', 'hantar ke pdrm', 'Dalam Proses', 'Diluluskan', 'Telah Diluluskan'])->get();

            return view('pegawai.negeri.negeri-tugasan-selesai', [
                'permohonan' => $permohonan
            ]);
        } else if ($user_role == 'pegawai_hq') {
            $permohonan = Permohonan::whereIn('status_permohonan', ['hantar ke pdrm', 'Dalam Proses','Diluluskan', 'Tidak Diluluskan',])->get();

            return view('pegawai.hq.hq-tugasan-baru', [
                'permohonan' => $permohonan
            ]);
        } else if ($user_role == 'pegawai_pdrm') {
            $permohonan = Permohonan::whereIn('status_permohonan', [''])->get();
            // $permohonan = Permohonan::whereIn('status_permohonan', ['hantar', 'Permohonan Lengkap'])->get();

            return view('pegawai.pdrm.pdrm-tugasan-baru', [
                'permohonan' => $permohonan
            ]);
        } else if ($user_role == 'pentadbir') {
            // $permohonan = Permohonan::where('status_permohonan', 'disemak')->get();
        }
    }
}
