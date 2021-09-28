<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Add11 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permohonans', function (Blueprint $table) {
            $table->dateTime('tarikh_pengesahan')->nullable()->change();
            $table->dateTime('tarikh_semakan_pdrm')->nullable()->change();
            $table->dateTime('tarikh_sokongan')->nullable()->change();
            $table->dateTime('tarikh_diluluskan')->nullable()->change();
            $table->dateTime('tarikh_bayaran')->nullable()->change();
            $table->dateTime('tarikh_cetakan')->nullable()->change();
            $table->dateTime('tarikh_tamat_permit')->nullable()->change();
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
