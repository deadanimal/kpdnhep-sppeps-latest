<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;
use App\Models\User;
use PDF;

class CetakanPermitController extends Controller
{
    public function index(){
        $permohonan = Permohonan::where('status_permohonan', 'Diluluskan')->get();

        // dd($permohonan);
        
        return view( 'pegawai.negeri.negeri-bayaran-permohonan', [
            'permohonan' => $permohonan,
        ]);
    }

    public function update(Request $request, $id){

        // dd($id);
       
        $permohonan = Permohonan::find($request->id);

        if ($permohonan->negeri_kutipan_permit == "Johor"){
            $no_permit  = $request->no_permit." (JHR)";
        } else if($permohonan->negeri_kutipan_permit == "Kedah"){
            $no_permit  = $request->no_permit." (KDH)";
        } else if($permohonan->negeri_kutipan_permit == "Kelantan"){
            $no_permit  = $request->no_permit." (KEL)";
        } else if($permohonan->negeri_kutipan_permit == "Melaka"){
            $no_permit  = $request->no_permit." (MLK)";
        } else if($permohonan->negeri_kutipan_permit == "Negeri Sembilan"){
            $no_permit  = $request->no_permit." (NS)";
        } else if($permohonan->negeri_kutipan_permit == "Pahang"){
            $no_permit  = $request->no_permit." (PHG)";
        } else if($permohonan->negeri_kutipan_permit == "Pulau Pinang"){
            $no_permit  = $request->no_permit." (PNG)";
        } else if($permohonan->negeri_kutipan_permit == "Perak"){
            $no_permit  = $request->no_permit." (PRK)";
        } else if($permohonan->negeri_kutipan_permit == "Perlis"){
            $no_permit  = $request->no_permit." (PLS)";
        } else if($permohonan->negeri_kutipan_permit == "Selangor"){
            $no_permit  = $request->no_permit." (SEL)";
        } else if($permohonan->negeri_kutipan_permit == "Terengganu"){
            $no_permit  = $request->no_permit." (TRG)";
        } else if($permohonan->negeri_kutipan_permit == "Sabah"){
            $no_permit  = $request->no_permit." (SBH)";
        } else if($permohonan->negeri_kutipan_permit == "Sarawak"){
            $no_permit  = $request->no_permit." (SWK)";
        } else if($permohonan->negeri_kutipan_permit == "WP Kuala Lumpur"){
            $no_permit  = $request->no_permit." (WPKL)";
        } else if($permohonan->negeri_kutipan_permit == "WP Putrajaya"){
            $no_permit  = $request->no_permit." (WPL)";
        } else if($permohonan->negeri_kutipan_permit == "WP Labuan"){
            $no_permit  = $request->no_permit." (WPPJ)";
        }

        $user = User::find($permohonan->user_id);
       
        if($permohonan->jenis_permohonan == "Baharu"){
            // dd($permohonan->jenis_permohonan);
            $permohonan->no_permit = $no_permit;
            $permohonan->no_siri = $request->no_siri;
            $permohonan->save();

            $user->no_permit = $no_permit;
            $user->save();
            // dd($permohonan);;
        }else{
            $permohonan->no_siri = $request->no_siri;
            $permohonan->save();
        }
        // $permohonan->save();
        
        return redirect('/cetakan_permit');
    }


    public function cetakpermit($id){
        $permohonan = Permohonan::find($id);
        
        $permohonan->cetak_status = 1;
        $permohonan->save();

        $user = User::find($permohonan->user_id);
        $user->status_permohonan = "diluluskan";
        $user->save();
        // dd($user);

        $pdf = PDF::loadView('pdf.cetak_permit', [
            'masa' => time(),
            'permohonan' => $permohonan
        ]);
        $nama_lesen = time() . '-permohonan_baharu';
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
