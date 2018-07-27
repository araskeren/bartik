<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelasiPengirim extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('relasi_pengirim', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('id_penjual')->unsigned();
      $table->foreign('id_penjual')->references('id')->on('users')->onUpdate('cascade');
      $table->integer('id_jasapengiriman')->unsigned();
      $table->foreign('id_jasapengiriman')->references('id')->on('jasa_pengiriman')->onUpdate('cascade');
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
        Schema::dropIfExists('relasi_pengirim');
    }
}
