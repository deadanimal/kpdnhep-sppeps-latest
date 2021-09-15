<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;

class TetapanPerananController extends Controller
{
    public function index(Request $request)
    {
        $pegawai = User::where('role','!=', 'pemohon')->get();
        //dd($pegawai);
        //dd($pegawai);
        return view('pegawai.admin-hq.peranan-pegawai', [
            'pegawais' => $pegawai
        ]);
    }
	
	 public function store(Request $request)
    {
		//dd($request);
		$user = New User();
		
		$user->no_kp = $request->nokp;
		$user->negeri = $request->negeri;
		$user->name= $request->nama;
		$user->email= $request->email;
		$user->jawatan= $request->jawatan;
		$user->no_telefon_pejabat= $request->no_tel;
		
		$user->password = Hash::make('password');
		$user->role = $request->role;
		
		$user->status = $request->status;
		
		$user->save();
		
		if($request->pemproses_negeri != null){
			$user->roles()->attach($request->pemproses_negeri);
		} 
		if($request->pemproses_hq != null){
			$user->roles()->attach($request->pemproses_hq);
		} 
		if($request->penyokong != null){
			$user->roles()->attach($request->penyokong);
		} 
		if($request->pelulus != null){
			$user->roles()->attach($request->pelulus);
		} 
		if($request->pentadbir != null){
			$user->roles()->attach($request->pentadbir);
		} 
		if($request->pengurusan_maklumat != null){
			$user->roles()->attach($request->pengurusan_maklumat);
		} 
		if($request->penguatkuasa != null){
			$user->roles()->attach($request->penguatkuasa);
		} 
		
        return redirect('/peranan_pegawai');
    }
	

    public function show($user)
    {
        $pegawai = User::find($user);

        //dd($pegawai);
        return view('pegawai.admin-hq.kemaskini-peranan-pegawai', [
            'pegawai' => $pegawai
        ]);
    }

    public function update(Request $request, $user)
    {
        //dd($request);

        $user = User::find($user);
		
		$user->roles()->detach([1, 2, 3, 4, 5, 6, 7, 8, 9]);

        $user->status = $request->status;
		
        if($request->pemproses_negeri != null){
			$user->roles()->attach($request->pemproses_negeri);
		} 
		if($request->pemproses_hq != null){
			$user->roles()->attach($request->pemproses_hq);
		} 
		if($request->penyokong != null){
			$user->roles()->attach($request->penyokong);
		} 
		if($request->pelulus != null){
			$user->roles()->attach($request->pelulus);
		} 
		if($request->pentadbir != null){
			$user->roles()->attach($request->pentadbir);
		} 
		if($request->pengurusan_maklumat != null){
			$user->roles()->attach($request->pengurusan_maklumat);
		} 
		if($request->penguatkuasa != null){
			$user->roles()->attach($request->penguatkuasa);
		} 
		
		$user->save();
		
        return redirect('/peranan_pegawai');

        
    }

    public function cari_pegawai(Request $request)
    {
        $no_kp = $request->no_kp;
        $negeri = $request->negeri;

        if ($no_kp != null && $negeri == "null") {

            $pegawai = User::where([
                ['no_kp', '=', $no_kp], ['role', '!=', 'pemohon'],
            ])->get();
            //
        } else if ($no_kp == null && $negeri != "null") {

            $pegawai = User::where([
                ['negeri', '=', $negeri], ['role', '!=', 'pemohon'],
            ])->get();
            //
        } else {

            $pegawai = User::where([
                ['no_kp', '=', $no_kp],
                ['negeri', '=', $negeri],
                ['role', '!=', 'pemohon'],
            ])->get();
        }

        return view('pegawai.admin-hq.peranan-pegawai', [
            'pegawais' => $pegawai
        ]);
        
    }


    public function senarai_pegawai(Request $request)
    {
        $pegawai = User::where('role', '=', 'tiada')->get();
        // dd($pegawai);
        // dd($pegawai);
        return view('pegawai.admin-hq.tambah-peranan-pegawai', [
            'pegawais' => $pegawai
        ]);
    }

    public function cari_pegawai_insid(Request $request){
        // dd($request);

        $no_kp = $request->no_kp;
        
        $url = 'http://apidev.kpdnhep.gov.my/api/staf';

        $token_janaan = Http::post($url, [
            "name" => "janaToken",
            "param" => [
                "app_id" => "sppeps",
                "app_secret" => "[sppepsdev@bpm7]",
                "scope" => "staf",
            ]
        ])->json()['response']['result']['token'];
		//dd($token_janaan);
        $url = 'http://apidev.kpdnhep.gov.my/api/staf';

        $pegawai = Http::withToken($token_janaan)->post($url, [
            "name" => "carian",
            "param" => [
                "keyword" => $no_kp,
            ]
        ])->json()['response'];
		
		$respond = $pegawai['status'];
		$pegawais = $pegawai['result'][0];
		//dd($pegawais);
		
		if ($pegawais['idnegeri'] == 1 || $pegawais['idnegeri'] == 21 || $pegawais['idnegeri'] == 22 || $pegawais['idnegeri'] == 23 || $pegawais['idnegeri'] == 24){
			$negeri = "Johor";
		} else if ($pegawais['idnegeri'] == 2 || $pegawais['idnegeri'] == 25 || $pegawais['idnegeri'] == 26 || $pegawais['idnegeri'] == 27 ){
			$negeri = "Kedah";
		} else if ($pegawais['idnegeri'] == 3 || $pegawais['idnegeri'] == 28 || $pegawais['idnegeri'] == 29 ){
			$negeri = "Kelantan";
		} else if ($pegawais['idnegeri'] == 4 || $pegawais['idnegeri'] == 30 ){
			$negeri = "Melaka";
		} else if ($pegawais['idnegeri'] == 5 || $pegawais['idnegeri'] == 31 || $pegawais['idnegeri'] == 59 ){
			$negeri = "Negeri Sembilan";
		} else if ($pegawais['idnegeri'] == 6 || $pegawais['idnegeri'] == 32 || $pegawais['idnegeri'] == 33 ){
			$negeri = "Pahang";
		} else if ($pegawais['idnegeri'] == 7 || $pegawais['idnegeri'] == 34 || $pegawais['idnegeri'] == 35 ){
			$negeri = "Pulau Pinang";
		} else if ($pegawais['idnegeri'] == 8 || $pegawais['idnegeri'] == 36 || $pegawais['idnegeri'] == 37 || $pegawais['idnegeri'] == 38 || $pegawais['idnegeri'] == 39){
			$negeri = "Perak";
		} else if ($pegawais['idnegeri'] == 9 || $pegawais['idnegeri'] == 40){
			$negeri = "Perlis";
		} else if ($pegawais['idnegeri'] == 10 || $pegawais['idnegeri'] == 41 || $pegawais['idnegeri'] == 42 || $pegawais['idnegeri'] == 43 || $pegawais['idnegeri'] == 44 ){
			$negeri = "Selangor";
		} else if ($pegawais['idnegeri'] == 11 || $pegawais['idnegeri'] == 45 || $pegawais['idnegeri'] == 46 ){
			$negeri = "Terengganu";
		} else if ($pegawais['idnegeri'] == 12 || $pegawais['idnegeri'] == 47 || $pegawais['idnegeri'] == 48 || $pegawais['idnegeri'] == 49 ){
			$negeri = "Sabah";
		} else if ($pegawais['idnegeri'] == 13 || $pegawais['idnegeri'] == 50 || $pegawais['idnegeri'] == 51 || $pegawais['idnegeri'] == 52 || $pegawais['idnegeri'] == 53){
			$negeri = "Sarawak";
		} else if ($pegawais['idnegeri'] == 14 || $pegawais['idnegeri'] == 54 || $pegawais['idnegeri'] == 55 || $pegawais['idnegeri'] == 56 || $pegawais['idnegeri'] == 57){
			$negeri = "WP Kuala Lumpur";
		} else if ($pegawais['idnegeri'] == 15 || $pegawais['idnegeri'] == 58){
			$negeri = "WP Labuan";
		} else if ($pegawais['idnegeri'] == 16){
			$negeri = "WP Putrajaya";
		} else {
			$negeri = "Tidak Diketahui";
		}
		
       if ($respond == 200) {

            return view('pegawai.admin-hq.tambah-peranan-pegawai-2', [
                'pegawai' => $pegawais,
				'negeri'=> $negeri
            ]);

        } else {
            return redirect('/senarai_pegawai')->withErrors('No. kad pengenalan tidak wujud');
        }
    }

    public function show_pegawai_insid($no_kp)
    {
        
        $url = 'http://apidev.kpdnhep.gov.my/api/staf';

        $token_janaan = Http::post($url, [
            "name" => "janaToken",
            "param" => [
                "app_id" => "sppeps",
                "app_secret" => "[sppeps@bpm7]",
                "scope" => "staf",
            ]
        ])->json()['result']['token'];


        $url = 'http://apidev.kpdnhep.gov.my/api/staf';

        $pegawai = Http::withToken($token_janaan)->post($url, [
            "name" => "carian",
            "param" => [
                "no_kp" => $no_kp,
            ]
        ]);
		

        if ($pegawai->successful()) {

            return view('pegawai.admin-hq.tambah-peranan-pegawai-2', [
                'pegawais' => $pegawai
            ]);

        } else {
            return redirect('/senarai_pegawai')->withErrors('No. kad pengenalan tidak wujud');
        }
        
    }

    public function tambah_pegawai(Request $request){

        $user = new User;

        $user->status = $request->status;
        if ($user->negeri == "WP Putrajaya") {
            $user->roles()->attach($request->peranan1);
            $user->roles()->attach($request->peranan2);
            $user->roles()->attach($request->peranan3);
            $user->roles()->attach($request->peranan4);
            $user->roles()->attach($request->peranan5);
            $user->roles()->attach($request->peranan6);
            $user->roles()->attach($request->peranan7);
        } else {
            $user->roles()->attach($request->peranan1);
            $user->roles()->attach($request->peranan2);
            $user->roles()->attach($request->peranan3);
            $user->roles()->attach($request->peranan4);
        }
        $user->save();

        return redirect('/peranan_pegawai');

    }
}
