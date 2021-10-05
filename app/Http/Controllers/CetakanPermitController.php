<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;
use App\Models\User;
use PDF;
use Illuminate\Support\Facades\Http;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
// use BaconQrCode\Encoder\QrCode;
use Illuminate\Support\Facades\Storage;

class CetakanPermitController extends Controller
{
    public function index()
    {
        $permohonan = Permohonan::where('status_permohonan', 'Diluluskan')->get();

        // dd($permohonan);
        // QrCode::size(500)
        //     ->format('png')
        //     ->generate('ItSolutionStuff.com', public_path('images/qrcode.png'));

        return view('pegawai.negeri.negeri-bayaran-permohonan', [
            'permohonan' => $permohonan,
        ]);
    }

    public function update(Request $request, $id)
    {

        // dd($id);

        $permohonan = Permohonan::find($request->id);


        if ($permohonan->negeri_kutipan_permit == "Johor") {
            $no_permit  = $request->no_permit . " (JHR)";
        } else if ($permohonan->negeri_kutipan_permit == "Kedah") {
            $no_permit  = $request->no_permit . " (KDH)";
        } else if ($permohonan->negeri_kutipan_permit == "Kelantan") {
            $no_permit  = $request->no_permit . " (KEL)";
        } else if ($permohonan->negeri_kutipan_permit == "Melaka") {
            $no_permit  = $request->no_permit . " (MLK)";
        } else if ($permohonan->negeri_kutipan_permit == "Negeri Sembilan") {
            $no_permit  = $request->no_permit . " (NS)";
        } else if ($permohonan->negeri_kutipan_permit == "Pahang") {
            $no_permit  = $request->no_permit . " (PHG)";
        } else if ($permohonan->negeri_kutipan_permit == "Pulau Pinang") {
            $no_permit  = $request->no_permit . " (PNG)";
        } else if ($permohonan->negeri_kutipan_permit == "Perak") {
            $no_permit  = $request->no_permit . " (PRK)";
        } else if ($permohonan->negeri_kutipan_permit == "Perlis") {
            $no_permit  = $request->no_permit . " (PLS)";
        } else if ($permohonan->negeri_kutipan_permit == "Selangor") {
            $no_permit  = $request->no_permit . " (SEL)";
        } else if ($permohonan->negeri_kutipan_permit == "Terengganu") {
            $no_permit  = $request->no_permit . " (TRG)";
        } else if ($permohonan->negeri_kutipan_permit == "Sabah") {
            $no_permit  = $request->no_permit . " (SBH)";
        } else if ($permohonan->negeri_kutipan_permit == "Sarawak") {
            $no_permit  = $request->no_permit . " (SWK)";
        } else if ($permohonan->negeri_kutipan_permit == "WP Kuala Lumpur") {
            $no_permit  = $request->no_permit . " (WPKL)";
        } else if ($permohonan->negeri_kutipan_permit == "WP Putrajaya") {
            $no_permit  = $request->no_permit . " (WPPJ)";
        } else if ($permohonan->negeri_kutipan_permit == "WP Labuan") {
            $no_permit  = $request->no_permit . " (WPL)";
        }

        $user = User::find($permohonan->user_id);

        if ($permohonan->jenis_permohonan == "Baharu") {
            // dd($permohonan->jenis_permohonan);
            $permohonan->no_permit = $no_permit;
            $permohonan->no_siri = $request->no_siri;
            $permohonan->save();

            $user->no_permit = $no_permit;
            $user->save();
            // dd($permohonan);;
        } else {
            $permohonan->no_siri = $request->no_siri;
            $permohonan->save();
        }
        // $permohonan->save();

        return redirect('/cetakan_permit');
    }


    public function cetakpermit($id)
    {
        $permohonan = Permohonan::find($id);

        if ($permohonan->tempoh_kelulusan == "1 tahun") {
            $permohonan->tarikh_cetakan = date("Y-m-d H:i:s");
            $permohonan->tarikh_tamat_permit = date('Y-m-d H:i:s', strtotime('+1 years -1 days'));
        } else if ($permohonan->tempoh_kelulusan == "2 tahun") {
            $permohonan->tarikh_cetakan = date("Y-m-d H:i:s");
            $permohonan->tarikh_tamat_permit = date('Y-m-d H:i:s', strtotime('+2 years -1 days'));
        }

        $permohonan->cetak_status = 1;
        $permohonan->save();

        // dd($permohonan);

        $user = User::find($permohonan->user_id);
        $user->status_permohonan = "diluluskan";
        $user->save();

        // dd($user);

        $response = Http::get('https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . $permohonan->id)->body();
        $lol = base64_encode($response);

        $pdf = PDF::loadView('pdf.cetak_permit', [
            'masa' => time(),
            'lol' => $lol,
            'permohonan' => $permohonan,
            'user' => $user,
            // 'lesen'=>$lesen_memandus
        ])->setPaper('a5', 'landscape');
        $nama_lesen = time() . '-Cetakan_permit';
        return $pdf->download($nama_lesen . '.pdf');
    }

    public function cari(Request $request)
    {
        // dd($request);
        // dd($permohonan);
        // $permohonans = Permohonan::find($permohonan);

        $permohonans = Permohonan::where([
            ['no_kp', '=', $request->no_kp]
        ])->get();
        // dd($permohonans);

        return view('pegawai.negeri.negeri-bayaran-permohonan', [
            'permohonan' => $permohonans
        ]);
    }
}
