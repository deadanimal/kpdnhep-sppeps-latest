<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;
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

    public function update(Request $request, Permohonan $permohonan){

        // dd($request->id);
       
        $permohonan = Permohonan::find($request->id);
        // dd($permohonan->jenis_permohonan);
        if($permohonan->jenis_permohonan == "Baharu"){
            $permohonan->no_permit == $request->no_permit;
            $permohonan->no_siri == $request->no_siri;
        }else{
            $permohonan->no_siri == $request->no_siri;
        }
        $permohonan->save();
        // dd($permohonan);
        return redirect('/cetakan_permit');
    }


    public function cetakpermit($id){
        $permohonans = Permohonan::where([
            ['id', '=', $id]
        ])->get();

        // dd($permohonans);

        $data = '';

        $pdf = PDF::loadView('pdf.cetak_permit', [
            'masa' => time(),
            'permohonan' => $permohonans
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
