<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Audit;
use App\Models\User;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $role = $user->role;

        if ($role == 'pemohon') {
            $user = User::find($user->id);
            // dd($user);
            if ($user->profil_update == 0) {
                return redirect("/profil/" . $user->id);
            } else {

                $user = User::find($user->id);
                // dd($user);
                return view('dashboard.dashboard', [
                    'user' => $user
                ]);
            }
        } else {

            $permohonan = Permohonan::all();

            $semuapermohonan = DB::table('permohonans')
                ->count();

            $permohonanbaharu = DB::table('permohonans')
                ->where('jenis_permohonan', '=', 'Baharu')
                ->count();

            $permohonanpembaharuan = DB::table('permohonans')
                ->where('jenis_permohonan', '=', 'Pembaharuan')
                ->count();

            $permohonanpendua = DB::table('permohonans')
                ->where('jenis_permohonan', '=', 'Pendua')
                ->count();

            $permohonanrayuan = DB::table('permohonans')
                ->where('jenis_permohonan', '=', 'Rayuan')
                ->count();

            $dalamproses = DB::table('permohonans')
                ->where('status_permohonan', '!=', 'Diluluskan')
                ->orWhere('status_permohonan', '!=', 'Tidak Diluluskan')
                ->count();

            $dalamprosesbaharu = DB::table('permohonans')
                ->where([
                    ['status_permohonan', '!=', 'Diluluskan'], ['jenis_permohonan', '=', 'Baharu']
                ])->orWhere([
                    ['status_permohonan', '!=', 'Tidak Diluluskan'], ['jenis_permohonan', '=', 'Baharu']
                ])->count();

            $dalamprosespembaharuan = DB::table('permohonans')
                ->where('status_permohonan', '!=', 'Diluluskan')
                ->orWhere('status_permohonan', '!=', 'Tidak Diluluskan')
                ->orWhere('status_permohonan', '=', 'Pembaharuan')
                ->count();

            $dalamprosespendua = DB::table('permohonans')
                ->where('status_permohonan', '!=', 'Diluluskan')
                ->orWhere('status_permohonan', '!=', 'Tidak Diluluskan')
                ->orWhere('status_permohonan', '=', 'Pendua')
                ->count();

            $dalamprosesrayuan = DB::table('permohonans')
                ->where('status_permohonan', '!=', 'Diluluskan')
                ->orWhere('status_permohonan', '!=', 'Tidak Diluluskan')
                ->orWhere('status_permohonan', '=', 'Rayuan')
                ->count();

            $selesai = DB::table('permohonans')
                ->where('status_permohonan', '=', 'Diluluskan')
                ->orWhere('status_permohonan', '=', 'Tidak Diluluskan')
                ->count();

            $selesaibaharu = DB::table('permohonans')
                ->where('status_permohonan', '=', 'Diluluskan')
                ->orWhere('status_permohonan', '=', 'Tidak Diluluskan')
                ->orWhere('jenis_permohonan', '=', 'Baharu')
                ->count();

            $selesaibaharululus = DB::table('permohonans')
                ->where('status_permohonan', '=', 'Diluluskan')
                ->orWhere('jenis_permohonan', '=', 'Baharu')
                ->count();

            $selesaibaharutaklulus = DB::table('permohonans')
                ->where('status_permohonan', '=', 'Tidak Diluluskan')
                ->orWhere('jenis_permohonan', '=', 'Baharu')
                ->count();

            $selesaipembaharuan = DB::table('permohonans')
                ->where('status_permohonan', '=', 'Diluluskan')
                ->orWhere('status_permohonan', '=', 'Tidak Diluluskan')
                ->orWhere('jenis_permohonan', '=', 'Pembaharuan')
                ->count();

            $selesaipembaharuanlulus = DB::table('permohonans')
                ->where('status_permohonan', '=', 'Diluluskan')
                ->orWhere('jenis_permohonan', '=', 'Pembaharuan')
                ->count();

            $selesaipembaharuantaklulus = DB::table('permohonans')
                ->where('status_permohonan', '=', 'Tidak Diluluskan')
                ->orWhere('jenis_permohonan', '=', 'Pembaharuan')
                ->count();

            $selesaipendua = DB::table('permohonans')
                ->where('status_permohonan', '=', 'Diluluskan')
                ->orWhere('status_permohonan', '=', 'Tidak Diluluskan')
                ->orWhere('jenis_permohonan', '=', 'Pendua')
                ->count();

            $selesaipendualulus = DB::table('permohonans')
                ->where('status_permohonan', '=', 'Diluluskan')
                ->orWhere('jenis_permohonan', '=', 'Pendua')
                ->count();

            $selesaipenduataklulus = DB::table('permohonans')
                ->where('status_permohonan', '=', 'Tidak Diluluskan')
                ->orWhere('jenis_permohonan', '=', 'Pendua')
                ->count();

            $selesairayuan = DB::table('permohonans')
                ->where('status_permohonan', '=', 'Diluluskan')
                ->orWhere('status_permohonan', '=', 'Tidak Diluluskan')
                ->orWhere('jenis_permohonan', '=', 'Rayuan')
                ->count();

            $selesairayuanlulus = DB::table('permohonans')
                ->where('status_permohonan', '=', 'Diluluskan')
                ->orWhere('jenis_permohonan', '=', 'Rayuan')
                ->count();

            $selesairayuantaklulus = DB::table('permohonans')
                ->where('status_permohonan', '=', 'Tidak Diluluskan')
                ->orWhere('jenis_permohonan', '=', 'Rayuan')
                ->count();

            // dd($permohonanbaharu);
            return view('dashboard.dashboard-pegawai', [
                'bilpermohonan' => $semuapermohonan,
                'permohonanbaharus' => $permohonanbaharu,
                'permohonanpembaharuans' => $permohonanpembaharuan,
                'permohonanpenduas' => $permohonanpendua,
                'permohonanrayuans' => $permohonanrayuan,
                'bildalamproses' => $dalamproses,
                'prosesbaharus' => $dalamprosesbaharu,
                'prosespembaharuans' => $dalamprosespembaharuan,
                'prosespenduas' => $dalamprosespendua,
                'prosesrayuans' => $dalamprosesrayuan,
                'bilselesai' => $selesai,
                'bilbaharu' => $selesaibaharu,
                'baharululus' => $selesaibaharululus,
                'baharutaklulus' => $selesaibaharutaklulus,
                'bilpembaharuan' => $selesaipembaharuan,
                'pembaharuanlulus' => $selesaipembaharuanlulus,
                'pembaharuantaklulus' => $selesaipembaharuantaklulus,
                'bilpendua' => $selesaipendua,
                'pendualulus' => $selesaipendualulus,
                'penduataklulus' => $selesaipenduataklulus,
                'bilrayuan' => $selesairayuan,
                'rayuanlulus' => $selesairayuanlulus,
                'rayuantaklulus' => $selesairayuantaklulus,
            ]);
        }
    }
}
