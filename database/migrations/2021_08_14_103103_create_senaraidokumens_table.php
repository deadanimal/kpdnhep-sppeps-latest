<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSenaraidokumensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('senaraidokumens', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('tajuk_ms', 255);
            $table->string('tajuk_en', 255);
            $table->text('kandungan_ms');
            $table->text('kandungan_en');
            $table->string('status', 255);
            $table->string('jalan1', 255)->nullable();

            $table->foreignId('id_arkibdokumen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('senaraidokumens');
    }
}
