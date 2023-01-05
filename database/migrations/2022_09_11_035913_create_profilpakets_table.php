<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profilpakets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_urut');
            $table->string('nama_paket');
            $table->integer('harga');
            $table->integer('harga_seller');
            $table->integer('lama_paket');
            $table->string('satuan_lama_paket');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profilpakets');
    }
};
