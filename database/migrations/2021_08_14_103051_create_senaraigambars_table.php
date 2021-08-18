<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSenaraigambarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('senaraigambars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('tajuk_ms', 255);
            $table->string('tajuk_en', 255);
            $table->text('kandungan_ms');
            $table->text('kandungan_en');
            $table->string('status', 255);
            $table->string('lokasi', 255);
            $table->date('tarikh_mula');
            $table->date('tarikh_akhir');
            $table->string('jalan1', 255)->nullable();
            $table->string('jalan2', 255)->nullable();
            $table->string('jalan3', 255)->nullable();
            $table->string('jalan4', 255)->nullable();
            $table->string('jalan5', 255)->nullable();

            $table->foreignId('id_arkibgambar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('senaraigambars');
    }
}
