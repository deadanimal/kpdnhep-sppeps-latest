<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengumumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengumumen', function (Blueprint $table) {
            $table->id();
            $table->string('tajuk_bm', 255);
            $table->string('tajuk_en', 255);
            $table->text('kandungan_bm');
            $table->text('kandungan_en');
            $table->string('status', 255);
            $table->date('tarikh_mula');
            $table->date('tarikh_akhir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengumumen');
    }
}
