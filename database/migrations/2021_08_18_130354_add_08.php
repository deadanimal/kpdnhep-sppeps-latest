<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Add08 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('gambar_profil')->default('/assets/img/icons/default_profile.png');
        });

        Schema::table('permohonans', function (Blueprint $table) {
            $table->string('gambar_pemohon')->nullable();
            $table->integer('cetak_status')->default(0);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
