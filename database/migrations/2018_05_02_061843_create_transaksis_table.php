<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade');
            $table->integer('id_penjual')->unsigned();
            $table->integer('id_jasapengiriman')->unsigned();
            $table->foreign('id_jasapengiriman')->references('id')->on('jasa_pengiriman')->onUpdate('cascade');
            $table->string('metode_pembayaran',50);
            $table->bigInteger('total_pembayaran')->unsigned();
            $table->string('status_pembayaran',50);
            $table->string('status_pemesanan',50);
            $table->string('no_resi',50);

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
        Schema::dropIfExists('transaksi');
    }
}
