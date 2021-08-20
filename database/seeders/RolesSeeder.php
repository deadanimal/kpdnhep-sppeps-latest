<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\Role;
use FontLib\Table\Type\name;

class RolesSeeder extends Seeder
{

    public function run()
    {
        //

        Role::create([
            'name'=> 'pemproses_negeri' 
        ]);

        Role::create([
            'name'=> 'penyokong_negeri' 
        ]);

        Role::create([
            'name'=> 'pelulus_negeri' 
        ]);

        Role::create([
            'name'=> 'pemproses_hq' 
        ]);

        Role::create([
            'name'=> 'penyokong_hq' 
        ]);

        Role::create([
            'name'=> 'pelulus_hq' 
        ]);

        Role::create([
            'name'=> 'pentadbir_sistem' 
        ]);

        Role::create([
            'name'=> 'pentadbir_pengurusan_maklumat' 
        ]);

        Role::create([
            'name'=> 'penguatkuasa' 
        ]);
    }
}
