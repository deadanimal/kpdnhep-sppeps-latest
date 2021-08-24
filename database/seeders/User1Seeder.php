<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class User1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'wan',
            'email' => 'wan@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'pentadbir',
        ]);
    }
}