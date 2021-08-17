<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArkibdokumensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arkibdokumens', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ms', 255);
            $table->string('nama_en', 255);
            $table->string('status', 255);
            $table->string('jalan', 255);
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
        Schema::dropIfExists('arkibdokumens');
    }
}
