<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Http;
use App\Models\User;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class SemakanIcController extends Controller
{
    public function semakanIc(Request $request)
    {

        // $request->validate([
        //     'no_kp' => 'required',
        //     'captcha' => 'required|captcha'
        // ]);

        $rules = [
            'no_kp' => 'required|min:12|max:12',
            'captcha' => 'required|captcha'
        ];

        $validator = Validator::make($request->all(), $rules, $messages = [
            'no_kp.required' => 'No kad pengenalan perlu diisi',
            'captcha.required' => 'captcha perlu diisi',
            'captcha' => 'captcha tidak betul',
            'max' => 'No kad pengenalan tidak boleh melebihi atau kurang dari 12 digit',
            'min' => 'No kad pengenalan tidak boleh melebihi atau kurang dari 12 digit',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator->errors());
        };

        $no_kp = $request->no_kp;
        $user = User::where('no_kp', $no_kp)->get()->first();
        // dd($user);
        if($user != null){
            return Redirect::back()->withErrors('No kad pengenalan telah wujud');
        }

        $year = substr($request->no_kp, 0, 2);
        $month = substr($request->no_kp, 2, 2);
        $day = substr($request->no_kp, 4, 2);

        $year_int = (int)$year;
        $month_int = (int)$month;
        $day_int = (int)$day;
        // dd($year_int);
        if ($year_int >= 30) {
            $year_int += 1900;
        } else {
            $year_int += 2000;
        }

        $current_year = (int)date("Y");
        $current_month = (int)date("m");
        $current_day = (int)date("d");

        $age = $current_year - $year_int;

        $birth_date = date("Y-m-d H:i:s", strtotime("$year_int-$month_int-$day_int"));

        $no_kp = $request->no_kp;

        if ($age > 21) {

            return $this->check_myidentity($no_kp, $age, $birth_date);

            //dd($pengguna);
            // return view('auth.register_', [

            //     'no_kp' => $no_kp,
            //     'age' => $age,
            //     'tarikh_lahir' => $birth_date,
            // ]);
            //
        } else if ($age == 21) {

            if ($month_int < $current_month) {

                return $this->check_myidentity($no_kp, $age, $birth_date);
                // return view('auth.register_', [

                //     'no_kp' => $no_kp,
                //     'age' => $age,
                //     'tarikh_lahir' => $birth_date,
                // ]);
                //
            } else if ($month_int == $current_month) {
                if ($day_int <= $current_day) {

                    return $this->check_myidentity($no_kp, $age, $birth_date);

                    // return view('auth.register_', [

                    //     'no_kp' => $no_kp,
                    //     'age' => $age,
                    //     'tarikh_lahir' => $birth_date,
                    // ]);
                    //
                } else {
                    return back()->with('error', 'Harap Maaf! Warganegara Malaysia yang berumur 21 tahun ke bawah tidak boleh memohon permit ejen pemilikan semula.');
                }
            } else {
                return back()->with('error', 'Harap Maaf! Warganegara Malaysia yang berumur 21 tahun ke bawah tidak boleh memohon permit ejen pemilikan semula.');
            }
        } else {
            return back()->with('error', 'Harap Maaf! Warganegara Malaysia yang berumur 21 tahun ke bawah tidak boleh memohon permit ejen pemilikan semula.');
        }
    }

    public function check_myidentity($no_kp, $age, $birth_date)
    {

        $idpengguna = $no_kp;

        $url = 'http://datajpndev.kpdnhep.gov.my/jwtapi/';

        $token_janaan = Http::post($url, [
            "name" => "generateToken",
            "param" => [
                "user_id" => "No_Kad_Pengenalan",
                "app_id" => "SPPEPSdev",
                "app_secret" => "[SPPEPSdev@bpm123]",
            ]
        ])->json()['response']['result']['token'];

        //$token = $token_janaan['response']['result']['token'];
        //dd($token_janaan);

        $pengguna = Http::withToken($token_janaan)->post($url, [
            "name" => "getMyIdentity",
            "param" => [
                "nokp" => $idpengguna,
            ]
        ])->json()['response'];

        // $response = Http::withToken($token_janaan)->post($url, [
        //     "name" => "getMyIdentity",
        //     "param" => [
        //         "nokp" => $idpengguna,
        //     ]
        // ])->object();


        //$respond = [ $response = 200,];
        $respond = $pengguna['status'];
        $pemohon = $pengguna['result'];

        $ReplyIndicator = $pengguna['result']['ReplyIndicator'];

        if ($respond == 200 && $ReplyIndicator != 0) {
            return view('auth.register_', [
                'pengguna' => $pemohon,
                'no_kp' => $no_kp,
                'age' => $age,
                'tarikh_lahir' => $birth_date,
            ]);
        } else {
            return Redirect::back()->withErrors('No. kad pengenalan tidak wujud');
            // return redirect('/semak-ic')->withErrors('No. kad pengenalan tidak wujud');
        }
        return back()->with('error', 'No. kad pengenalan tidak wujud');
    }
    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }
}
