<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;

class UserSeeder extends Seeder
{

    public function run()
    {
        //
        User::create([
            'name'=> 'pentadbir',
            'email'=> 'iszmael97@gmail.com',
            'no_kp'=> '123456789012',
            'password'=> Hash::make('password'),
            'no_telefon_pejabat'=>'0123456789',
            'no_telefon_bimbit'=>'0123456789',
            'alamat1'=>'sunway',
            'alamat2'=>'lagoon',
            'role'=> 'pentadbir',
            'negeri'=>'Selangor'
            
        ]);

        User::create([
            'name'=> 'Mohd Norhadi bin Mohd Said',
            'email'=> 'mnorhadi@kpdnhep.gov.my',
            'no_kp'=> '810419015207',
            'password'=> Hash::make('password'),
            'no_telefon_pejabat'=>'054010471',
            'no_telefon_bimbit'=>'054010471',
            'alamat1'=>'No. 15',
            'alamat2'=>'PERSIARAN DESA JAYA 2, TAMAN DESA JAYA',
            'role'=> 'pegawai_hq',
            'negeri'=>'WP Putrajaya'
            
        ]);

        User::create([
            'name'=> 'Ramanan A/l Ragupathy',
            'email'=> 'ramanan@kpdnhep.gov.my',
            'no_kp'=> '800622086407',
            'password'=> Hash::make('password'),
            'no_telefon_pejabat'=>'0388825589',
            'no_telefon_bimbit'=>'0192637396',
            'alamat1'=>'No. 2, Jalan SP 6/3, ',
            'alamat2'=>'Taman Saujana Puchong',
            'role'=> 'pegawai_negeri',
            'negeri'=>'Selangor'
            
        ]);

        User::create([
            'name'=> 'Noorhaslizawati Binti Zukilfi',
            'email'=> 'haslizawati@kpdnhep.gov.my',
            'no_kp'=> '860516295736',
            'password'=> Hash::make('password'),
            'no_telefon_pejabat'=>'0388826993',
            'no_telefon_bimbit'=>'0192637396',
            'alamat1'=>'No. 2, Jalan SP 6/3, ',
            'alamat2'=>'Taman Saujana Puchong',
            'role'=> 'pegawai_negeri',
            'negeri'=>'Kedah'
        ]);

    }
}
