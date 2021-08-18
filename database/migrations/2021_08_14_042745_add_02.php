<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Add02 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role');
            $table->timestamps();            
        });

        Schema::create('user_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('role_id');
            $table->timestamps();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

     /*
                'pemproses_negeri',
                'penyokong_negeri',
                'pelulus_negeri',
                'pemproses_hq',
                'penyokong_hq',
                'pelulus_hq',                
                'penguatkuasa',
                'pentadbir_sistem',
                'pentadbir_pengurusan_maklumat',     
     */
    public function down()
    {
        //
    }
}
