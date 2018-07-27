<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBantuTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bantu_transaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_checkout')->unsigned();
            $table->foreign('id_checkout')->references('id')->on('checkout')->onUpdate('cascade');
            $table->integer('no_invoice')->unsigned();
            $table->foreign('no_invoice')->references('id')->on('transaksi')->onUpdate('cascade');
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
        Schema::dropIfExists('bantu_transaksi');
    }
}
