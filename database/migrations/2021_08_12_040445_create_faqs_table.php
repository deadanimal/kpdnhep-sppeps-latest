<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('tajuk_bm', 255);
            $table->string('tajuk_en', 255);
            $table->text('kandungan_bm');
            $table->text('kandungan_en');
            $table->integer('turutan');
            // $table->string('kategori', 255);
            // $table->date('tarikh_kemaskini');
            $table->string('status', 255);
            $table->foreignId('kategori_id');
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
        Schema::dropIfExists('faqs');
    }
}
